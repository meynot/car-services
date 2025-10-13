<?php

use Illuminate\Support\Facades\Route;
use Laravel\Fortify\Features;
use Livewire\Volt\Volt;

Route::get('/', function () {
    return view('welcome');
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
    Route::redirect('settings', 'settings/profile');

    Volt::route('settings/profile', 'settings.profile')->name('profile.edit');
    Volt::route('settings/password', 'settings.password')->name('password.edit');
    Volt::route('settings/appearance', 'settings.appearance')->name('appearance.edit');

    // Invoice Management Routes
    Route::resource('invoices', App\Http\Controllers\InvoiceController::class);
    Route::resource('services', App\Http\Controllers\ServiceController::class);
    Route::resource('invoice-payments', App\Http\Controllers\InvoicePaymentController::class);
    Route::resource('expenses', App\Http\Controllers\ExpenseController::class);
});

require __DIR__.'/auth.php';
