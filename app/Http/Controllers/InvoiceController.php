<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class InvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $invoices = Invoice::with(['items', 'payments'])
            ->orderBy('created_at', 'desc')
            ->paginate(15);

        return view('invoices.index', compact('invoices'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $services = Service::enabled()->get();
        return view('invoices.create', compact('services'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'client_name' => 'required|string|max:255',
            'phone' => 'nullable|string|max:20',
            'date' => 'required|date',
            'total_amount' => 'required|numeric|min:0',
            'discount' => 'nullable|numeric|min:0',
            'items' => 'required|array|min:1',
            'items.*.service_id' => 'required|exists:services,id',
            'items.*.price' => 'required|numeric|min:0',
            'items.*.parts_price' => 'nullable|numeric|min:0',
            'items.*.description' => 'nullable|string',
        ]);

        $invoice = Invoice::create([
            'client_name' => $validated['client_name'],
            'phone' => $validated['phone'],
            'date' => $validated['date'],
            'total_amount' => $validated['total_amount'],
            'discount' => $validated['discount'] ?? 0,
        ]);

        foreach ($validated['items'] as $item) {
            $invoice->items()->create([
                'service_id' => $item['service_id'],
                'price' => $item['price'],
                'parts_price' => $item['parts_price'] ?? 0,
                'description' => $item['description'] ?? null,
            ]);
        }

        return redirect()->route('invoices.show', $invoice)
            ->with('success', __('invoice.created_successfully'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Invoice $invoice): View
    {
        $invoice->load(['items.service', 'payments']);
        return view('invoices.show', compact('invoice'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Invoice $invoice): View|RedirectResponse
    {
        // Prevent editing fully paid invoices
        if ($invoice->is_fully_paid) {
            return redirect()->route('invoices.show', $invoice)
                ->with('error', __('invoice.cannot_edit_paid'));
        }

        $services = Service::enabled()->get();
        $invoice->load('items');
        return view('invoices.edit', compact('invoice', 'services'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Invoice $invoice): RedirectResponse
    {
        // Prevent updating fully paid invoices
        if ($invoice->is_fully_paid) {
            return redirect()->route('invoices.show', $invoice)
                ->with('error', __('invoice.cannot_edit_paid'));
        }

        $validated = $request->validate([
            'client_name' => 'required|string|max:255',
            'phone' => 'nullable|string|max:20',
            'date' => 'required|date',
            'total_amount' => 'required|numeric|min:0',
            'discount' => 'nullable|numeric|min:0',
            'items' => 'required|array|min:1',
            'items.*.service_id' => 'required|exists:services,id',
            'items.*.price' => 'required|numeric|min:0',
            'items.*.parts_price' => 'nullable|numeric|min:0',
            'items.*.description' => 'nullable|string',
        ]);

        $invoice->update([
            'client_name' => $validated['client_name'],
            'phone' => $validated['phone'],
            'date' => $validated['date'],
            'total_amount' => $validated['total_amount'],
            'discount' => $validated['discount'] ?? 0,
        ]);

        // Delete existing items and create new ones
        $invoice->items()->delete();
        foreach ($validated['items'] as $item) {
            $invoice->items()->create([
                'service_id' => $item['service_id'],
                'price' => $item['price'],
                'parts_price' => $item['parts_price'] ?? 0,
                'description' => $item['description'] ?? null,
            ]);
        }

        return redirect()->route('invoices.show', $invoice)
            ->with('success', __('invoice.updated_successfully'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Invoice $invoice): RedirectResponse
    {
        $invoice->delete();

        return redirect()->route('invoices.index')
            ->with('success', __('invoice.deleted_successfully'));
    }
}