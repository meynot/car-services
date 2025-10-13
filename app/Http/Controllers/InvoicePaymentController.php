<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use App\Models\InvoicePayment;
use App\Enums\PaymentMethod;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class InvoicePaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $payments = InvoicePayment::with('invoice')
            ->orderBy('created_at', 'desc')
            ->paginate(15);

        return view('invoice-payments.index', compact('payments'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request): View
    {
        $invoiceId = $request->get('invoice_id');
        $defaultAmount = $request->get('amount');
        $invoice = $invoiceId ? Invoice::findOrFail($invoiceId) : null;
        $invoices = Invoice::with(['items', 'payments'])->get();
        $paymentMethods = PaymentMethod::cases();

        return view('invoice-payments.create', compact('invoice', 'invoices', 'paymentMethods', 'defaultAmount'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'invoice_id' => 'required|exists:invoices,id',
            'date' => 'required|date',
            'amount' => 'required|numeric|min:0.01',
            'payment_method' => 'required|in:cash,visa,bank_transfer',
        ]);

        $invoice = Invoice::findOrFail($validated['invoice_id']);
        
        // Check if payment amount doesn't exceed remaining balance
        $remainingBalance = $invoice->remaining_balance;
        if ($validated['amount'] > $remainingBalance) {
            return back()->withErrors(['amount' => 'Payment amount cannot exceed remaining balance of $' . number_format($remainingBalance, 2)]);
        }

        InvoicePayment::create($validated);

        return redirect()->route('invoices.show', $invoice)
            ->with('success', 'Payment recorded successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(InvoicePayment $invoicePayment): View
    {
        $invoicePayment->load('invoice');
        return view('invoice-payments.show', compact('invoicePayment'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(InvoicePayment $invoicePayment): View
    {
        $invoices = Invoice::with(['items', 'payments'])->get();
        $paymentMethods = PaymentMethod::cases();
        return view('invoice-payments.edit', compact('invoicePayment', 'invoices', 'paymentMethods'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, InvoicePayment $invoicePayment): RedirectResponse
    {
        $validated = $request->validate([
            'date' => 'required|date',
            'amount' => 'required|numeric|min:0.01',
            'payment_method' => 'required|in:cash,visa,bank_transfer',
        ]);

        $invoicePayment->update($validated);

        return redirect()->route('invoices.show', $invoicePayment->invoice)
            ->with('success', 'Payment updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(InvoicePayment $invoicePayment): RedirectResponse
    {
        $invoice = $invoicePayment->invoice;
        $invoicePayment->delete();

        return redirect()->route('invoices.show', $invoice)
            ->with('success', 'Payment deleted successfully.');
    }
}