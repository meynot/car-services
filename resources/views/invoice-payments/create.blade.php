<x-app-layout>
    <div class="mb-8">
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between">
            <div>
                <h1 class="text-2xl font-bold text-gray-900 dark:text-white">
                    <i class="fas fa-plus me-2"></i>
                    {{ __('payments.record_payment') }}
                </h1>
                <p class="mt-2 text-sm text-gray-700 dark:text-gray-300">
                    {{ __('payments.record_new_payment') }}
                </p>
            </div>
        </div>
    </div>

    <div class="bg-white dark:bg-gray-800 shadow rounded-lg">
        <div class="px-4 py-5 sm:p-6">
            <form method="POST" action="{{ route('invoice-payments.store') }}">
                @csrf

                <div class="space-y-6">
                    <div>
                        <label for="invoice_id" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                            {{ __('invoice.invoice') }} <span class="text-red-500">*</span>
                        </label>
                        <select name="invoice_id" 
                                id="invoice_id" 
                                class="w-full rounded-md border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
                                required
                                onchange="updateInvoiceInfo()"
                                {{ $invoice ? 'disabled' : '' }}>
                            <option value="">{{ __('payments.select_invoice') }}</option>
                            @foreach($invoices as $invoiceOption)
                                <option value="{{ $invoiceOption->id }}" 
                                        data-total="{{ $invoiceOption->total_after_discount }}"
                                        data-paid="{{ $invoiceOption->amount_paid }}"
                                        data-remaining="{{ $invoiceOption->remaining_balance }}"
                                        {{ (old('invoice_id') == $invoiceOption->id || ($invoice && $invoice->id == $invoiceOption->id)) ? 'selected' : '' }}>
                                    #{{ $invoiceOption->id }} - {{ $invoiceOption->client_name }} 
                                    ({{ __('invoice.remaining_balance') }}: ${{ number_format($invoiceOption->remaining_balance, 2) }})
                                </option>
                            @endforeach
                        </select>
                        @if($invoice)
                            <input type="hidden" name="invoice_id" value="{{ $invoice->id }}">
                            <p class="mt-1 text-sm text-blue-600 dark:text-blue-400">
                                <i class="fas fa-lock me-1"></i>
                                {{ __('payments.invoice_locked_for_payment') }}
                            </p>
                        @endif
                        @error('invoice_id')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="date" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                            {{ __('payments.date') }} <span class="text-red-500">*</span>
                        </label>
                        <input type="date" 
                               name="date" 
                               id="date" 
                               value="{{ old('date', date('Y-m-d')) }}"
                               class="w-full rounded-md border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
                               required>
                        @error('date')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="amount" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                            {{ __('payments.amount') }} <span class="text-red-500">*</span>
                        </label>
                        <input type="number" 
                               name="amount" 
                               id="amount" 
                               step="0.01" 
                               min="0.01"
                               value="{{ old('amount', $defaultAmount) }}"
                               class="w-full rounded-md border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
                               required>
                        <p id="max-amount-text" class="mt-1 text-sm text-gray-500 dark:text-gray-400 hidden">
                            {{ __('payments.maximum_amount', ['amount' => '0.00']) }}
                        </p>
                        @error('amount')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="payment_method" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                            {{ __('payments.payment_method') }} <span class="text-red-500">*</span>
                        </label>
                        <select name="payment_method" 
                                id="payment_method" 
                                class="w-full rounded-md border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
                                required>
                            <option value="">{{ __('payments.select_method') }}</option>
                            <option value="cash" {{ old('payment_method') == 'cash' ? 'selected' : '' }}>
                                <i class="fas fa-money-bill-wave me-2"></i>
                                {{ __('payments.cash') }}
                            </option>
                            <option value="visa" {{ old('payment_method') == 'visa' ? 'selected' : '' }}>
                                <i class="fab fa-cc-visa me-2"></i>
                                {{ __('payments.visa') }}
                            </option>
                            <option value="bank_transfer" {{ old('payment_method') == 'bank_transfer' ? 'selected' : '' }}>
                                <i class="fas fa-university me-2"></i>
                                {{ __('payments.bank_transfer') }}
                            </option>
                        </select>
                        @error('payment_method')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <!-- Invoice Information Display -->
                <div id="invoice-info" class="mt-6 p-4 bg-gray-50 dark:bg-gray-700 rounded-lg hidden">
                    <h3 class="text-lg font-medium text-gray-900 dark:text-white mb-3">
                        {{ __('invoice.invoice_information') }}
                    </h3>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                        <div>
                            <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">
                                {{ __('invoice.total_after_discount') }}
                            </dt>
                            <dd id="invoice-total" class="text-sm text-gray-900 dark:text-white">
                                $0.00
                            </dd>
                        </div>
                        <div>
                            <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">
                                {{ __('invoice.amount_paid') }}
                            </dt>
                            <dd id="invoice-paid" class="text-sm text-gray-900 dark:text-white">
                                $0.00
                            </dd>
                        </div>
                        <div>
                            <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">
                                {{ __('invoice.remaining_balance') }}
                            </dt>
                            <dd id="invoice-remaining" class="text-sm font-medium text-gray-900 dark:text-white">
                                $0.00
                            </dd>
                        </div>
                    </div>
                </div>

                <!-- Form Actions -->
                <div class="flex flex-col sm:flex-row gap-4 justify-end mt-8">
                    <a href="{{ request()->get('invoice_id') ? route('invoices.show', request()->get('invoice_id')) : route('invoice-payments.index') }}" 
                       class="inline-flex items-center justify-center px-4 py-2 bg-gray-300 dark:bg-gray-600 border border-transparent rounded-md font-semibold text-xs text-gray-700 dark:text-gray-300 uppercase tracking-widest hover:bg-gray-400 dark:hover:bg-gray-500 focus:bg-gray-400 dark:focus:bg-gray-500 active:bg-gray-500 dark:active:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
                        <i class="fas fa-times me-2"></i>
                        {{ __('payments.cancel') }}
                    </a>
                    <button type="submit" 
                            class="inline-flex items-center justify-center px-4 py-2 bg-green-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-green-700 focus:bg-green-700 active:bg-green-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
                        <i class="fas fa-save me-2"></i>
                        {{ __('payments.record_payment') }}
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script>
        function updateInvoiceInfo() {
            const select = document.getElementById('invoice_id');
            const selectedOption = select.options[select.selectedIndex];
            const invoiceInfo = document.getElementById('invoice-info');
            const maxAmountText = document.getElementById('max-amount-text');
            const amountInput = document.getElementById('amount');

            if (selectedOption.value) {
                const total = parseFloat(selectedOption.dataset.total);
                const paid = parseFloat(selectedOption.dataset.paid);
                const remaining = parseFloat(selectedOption.dataset.remaining);

                document.getElementById('invoice-total').textContent = '$' + total.toFixed(2);
                document.getElementById('invoice-paid').textContent = '$' + paid.toFixed(2);
                document.getElementById('invoice-remaining').textContent = '$' + remaining.toFixed(2);

                invoiceInfo.classList.remove('hidden');
                maxAmountText.textContent = '{{ __("payments.maximum_amount") }}'.replace(':amount', remaining.toFixed(2));
                maxAmountText.classList.remove('hidden');
                amountInput.max = remaining;
            } else {
                invoiceInfo.classList.add('hidden');
                maxAmountText.classList.add('hidden');
                amountInput.max = '';
            }
        }

        // Initialize on page load if an invoice is pre-selected
        document.addEventListener('DOMContentLoaded', function() {
            updateInvoiceInfo();
            
            // If an invoice is pre-selected, show the invoice info panel
            const select = document.getElementById('invoice_id');
            if (select.value) {
                updateInvoiceInfo();
            }
        });
    </script>
</x-app-layout>
