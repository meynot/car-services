<?php

use Illuminate\Support\Facades\Route;
use Laravel\Fortify\Features;
use Livewire\Volt\Volt;

Route::get('/', function () {
    return view('landing');
})->name('home');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

// Language and Theme switching routes (no auth required)
Route::post('/language/switch', [App\Http\Controllers\LanguageController::class, 'switch'])->name('language.switch');
Route::post('/theme/switch', [App\Http\Controllers\ThemeController::class, 'switch'])->name('theme.switch');

// Debug route for language switching
Route::get('/debug/language', function () {
    return response()->json([
        'current_locale' => app()->getLocale(),
        'session_locale' => session('locale'),
        'session_id' => session()->getId(),
        'session_data' => session()->all()
    ]);
});

Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile')
        ->middleware('editor.permissions');

    Volt::route('settings/profile', 'settings.profile')->name('profile.edit')
        ->middleware('editor.permissions');
    Volt::route('settings/password', 'settings.password')->name('password.edit')
        ->middleware('editor.permissions');
    Volt::route('settings/appearance', 'settings.appearance')->name('appearance.edit')
        ->middleware('editor.permissions');

    // User Management Routes (Admin Only)
    Route::resource('users', App\Http\Controllers\UserController::class)
        ->middleware('admin.only');

    // Invoice Management Routes
    Route::resource('invoices', App\Http\Controllers\InvoiceController::class)
        ->middleware('editor.permissions');
    Route::resource('services', App\Http\Controllers\ServiceController::class)
        ->middleware('editor.permissions');
    Route::resource('invoice-payments', App\Http\Controllers\InvoicePaymentController::class)
        ->middleware('editor.permissions');
    Route::resource('expenses', App\Http\Controllers\ExpenseController::class)
        ->middleware('editor.permissions');
    
    // Export Routes
    Route::prefix('export')->name('export.')->middleware('editor.permissions')->group(function () {
        Route::get('invoices', [App\Http\Controllers\ExportController::class, 'exportInvoices'])->name('invoices');
        Route::get('payments', [App\Http\Controllers\ExportController::class, 'exportPayments'])->name('payments');
        Route::get('expenses', [App\Http\Controllers\ExportController::class, 'exportExpenses'])->name('expenses');
        Route::get('all', [App\Http\Controllers\ExportController::class, 'exportAll'])->name('all');
    });
});

require __DIR__.'/auth.php';
