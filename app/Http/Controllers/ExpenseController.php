<?php

namespace App\Http\Controllers;

use App\Models\Expense;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ExpenseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $expenses = Expense::orderBy('date', 'desc')->paginate(15);
        return view('expenses.index', compact('expenses'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('expenses.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'date' => 'required|date',
            'reference' => 'nullable|string|max:255',
            'amount' => 'required|numeric|min:0',
            'description' => 'nullable|string',
            'is_confirmed' => 'boolean',
        ]);

        Expense::create($validated);

        return redirect()->route('expenses.index')
            ->with('success', __('expenses.created_successfully'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Expense $expense): View
    {
        return view('expenses.show', compact('expense'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Expense $expense): View
    {
        return view('expenses.edit', compact('expense'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Expense $expense): RedirectResponse
    {
        // Prevent editing confirmed expenses
        if ($expense->is_confirmed) {
            return redirect()->route('expenses.show', $expense)
                ->with('error', __('expenses.cannot_edit_confirmed'));
        }

        $validated = $request->validate([
            'date' => 'required|date',
            'reference' => 'nullable|string|max:255',
            'amount' => 'required|numeric|min:0',
            'description' => 'nullable|string',
            'is_confirmed' => 'boolean',
        ]);

        $expense->update($validated);

        return redirect()->route('expenses.show', $expense)
            ->with('success', __('expenses.updated_successfully'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Expense $expense): RedirectResponse
    {
        // Prevent deleting confirmed expenses
        if ($expense->is_confirmed) {
            return redirect()->route('expenses.index')
                ->with('error', __('expenses.cannot_delete_confirmed'));
        }

        $expense->delete();

        return redirect()->route('expenses.index')
            ->with('success', __('expenses.deleted_successfully'));
    }
}
