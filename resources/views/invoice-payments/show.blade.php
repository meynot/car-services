<x-app-layout>
    <div class="mb-8">
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between">
            <div>
                <h1 class="text-2xl font-bold text-gray-900 dark:text-white">
                    <i class="fas fa-credit-card me-2"></i>
                    {{ __('payments.payment_details') }}
                </h1>
                <p class="mt-2 text-sm text-gray-700 dark:text-gray-300">
                    {{ __('payments.payment_information') }}
                </p>
            </div>
            <div class="mt-4 sm:mt-0">
                <div class="flex space-x-2">
                    <a href="{{ route('invoice-payments.edit', $invoicePayment) }}" 
                       class="inline-flex items-center px-4 py-2 bg-indigo-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-indigo-700 focus:bg-indigo-700 active:bg-indigo-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
                        <i class="fas fa-edit me-2"></i>
                        {{ __('payments.edit_payment') }}
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <!-- Payment Details -->
        <div class="lg:col-span-2">
            <div class="bg-white dark:bg-gray-800 shadow rounded-lg">
                <div class="px-4 py-5 sm:p-6">
                    <h3 class="text-lg font-medium text-gray-900 dark:text-white mb-4">
                        {{ __('payments.payment_information') }}
                    </h3>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">
                                {{ __('invoice.invoice') }}
                            </dt>
                            <dd class="mt-1 text-sm text-gray-900 dark:text-white">
                                <a href="{{ route('invoices.show', $invoicePayment->invoice) }}" 
                                   class="text-blue-600 hover:text-blue-900 dark:text-blue-400 dark:hover:text-blue-300">
                                    #{{ $invoicePayment->invoice->id }} - {{ $invoicePayment->invoice->client_name }}
                                </a>
                            </dd>
                        </div>
                        <div>
                            <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">
                                {{ __('payments.date') }}
                            </dt>
                            <dd class="mt-1 text-sm text-gray-900 dark:text-white">
                                {{ $invoicePayment->date->format('M d, Y') }}
                            </dd>
                        </div>
                        <div>
                            <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">
                                {{ __('payments.amount') }}
                            </dt>
                            <dd class="mt-1 text-lg font-semibold text-gray-900 dark:text-white">
                                ${{ number_format($invoicePayment->amount, 2) }}
                            </dd>
                        </div>
                        <div>
                            <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">
                                {{ __('payments.payment_method') }}
                            </dt>
                            <dd class="mt-1 text-sm text-gray-900 dark:text-white">
                                <span class="inline-flex items-center">
                                    <i class="{{ $invoicePayment->payment_method->icon() }} me-2"></i>
                                    {{ $invoicePayment->payment_method->label() }}
                                </span>
                            </dd>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Invoice Information -->
        <div>
            <div class="bg-white dark:bg-gray-800 shadow rounded-lg">
                <div class="px-4 py-5 sm:p-6">
                    <h3 class="text-lg font-medium text-gray-900 dark:text-white mb-4">
                        {{ __('invoice.invoice_information') }}
                    </h3>
                    
                    <div class="space-y-4">
                        <div class="flex justify-between items-center">
                            <span class="text-sm font-medium text-gray-500 dark:text-gray-400">
                                {{ __('invoice.client_name') }}
                            </span>
                            <span class="text-sm text-gray-900 dark:text-white">
                                {{ $invoicePayment->invoice->client_name }}
                            </span>
                        </div>
                        
                        <div class="flex justify-between items-center">
                            <span class="text-sm font-medium text-gray-500 dark:text-gray-400">
                                {{ __('invoice.date') }}
                            </span>
                            <span class="text-sm text-gray-900 dark:text-white">
                                {{ $invoicePayment->invoice->date->format('M d, Y') }}
                            </span>
                        </div>
                        
                        <div class="flex justify-between items-center">
                            <span class="text-sm font-medium text-gray-500 dark:text-gray-400">
                                {{ __('invoice.total_after_discount') }}
                            </span>
                            <span class="text-sm text-gray-900 dark:text-white">
                                ${{ number_format($invoicePayment->invoice->total_after_discount, 2) }}
                            </span>
                        </div>
                        
                        <div class="flex justify-between items-center">
                            <span class="text-sm font-medium text-gray-500 dark:text-gray-400">
                                {{ __('invoice.amount_paid') }}
                            </span>
                            <span class="text-sm text-gray-900 dark:text-white">
                                ${{ number_format($invoicePayment->invoice->amount_paid, 2) }}
                            </span>
                        </div>
                        
                        <div class="flex justify-between items-center border-t border-gray-200 dark:border-gray-600 pt-2">
                            <span class="text-sm font-medium text-gray-500 dark:text-gray-400">
                                {{ __('invoice.remaining_balance') }}
                            </span>
                            <span class="text-sm font-medium {{ $invoicePayment->invoice->remaining_balance > 0 ? 'text-red-600 dark:text-red-400' : 'text-green-600 dark:text-green-400' }}">
                                ${{ number_format($invoicePayment->invoice->remaining_balance, 2) }}
                            </span>
                        </div>
                        
                        <div class="mt-4">
                            @if($invoicePayment->invoice->is_fully_paid)
                                <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-300">
                                    <i class="fas fa-check-circle me-2"></i>
                                    {{ __('invoice.paid') }}
                                </span>
                            @else
                                <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-yellow-100 text-yellow-800 dark:bg-yellow-900 dark:text-yellow-300">
                                    <i class="fas fa-clock me-2"></i>
                                    {{ __('invoice.outstanding') }}
                                </span>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Payment History for this Invoice -->
    @if($invoicePayment->invoice->payments->count() > 1)
        <div class="mt-6">
            <div class="bg-white dark:bg-gray-800 shadow rounded-lg">
                <div class="px-4 py-5 sm:p-6">
                    <h3 class="text-lg font-medium text-gray-900 dark:text-white mb-4">
                        {{ __('invoice.payment_history') }}
                    </h3>
                    
                    <div class="space-y-3">
                        @foreach($invoicePayment->invoice->payments->sortBy('date') as $payment)
                            <div class="flex items-center justify-between p-3 {{ $payment->id === $invoicePayment->id ? 'bg-blue-50 dark:bg-blue-900' : 'bg-gray-50 dark:bg-gray-700' }} rounded-lg">
                                <div class="flex items-center">
                                    <div class="flex-shrink-0">
                                        <i class="{{ $payment->payment_method->icon() }} text-gray-400"></i>
                                    </div>
                                    <div class="ms-3">
                                        <p class="text-sm font-medium text-gray-900 dark:text-white">
                                            {{ $payment->payment_method->label() }}
                                            @if($payment->id === $invoicePayment->id)
                                                <span class="ms-2 inline-flex items-center px-2 py-0.5 rounded text-xs font-medium bg-blue-100 text-blue-800 dark:bg-blue-900 dark:text-blue-300">
                                                    {{ __('payments.current_payment') }}
                                                </span>
                                            @endif
                                        </p>
                                        <p class="text-sm text-gray-500 dark:text-gray-400">
                                            {{ $payment->date->format('M d, Y') }}
                                        </p>
                                    </div>
                                </div>
                                <div class="text-end">
                                    <p class="text-sm font-medium text-gray-900 dark:text-white">
                                        ${{ number_format($payment->amount, 2) }}
                                    </p>
                                    @if($payment->id !== $invoicePayment->id)
                                        <div class="flex space-x-1">
                                            <a href="{{ route('invoice-payments.edit', $payment) }}" 
                                               class="text-indigo-600 hover:text-indigo-900 dark:text-indigo-400 dark:hover:text-indigo-300">
                                                <i class="fas fa-edit text-xs"></i>
                                            </a>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    @endif
</x-app-layout>
