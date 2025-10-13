<x-app-layout>
    <div class="mb-8">
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between">
            <div>
                <h1 class="text-2xl font-bold text-gray-900 dark:text-white">
                    <i class="fas fa-file-invoice me-2"></i>
                    {{ __('invoice.invoice') }} #{{ $invoice->id }}
                </h1>
                <p class="mt-2 text-sm text-gray-700 dark:text-gray-300">
                    {{ __('invoice.invoice_details') }}
                </p>
            </div>
            <div class="mt-4 sm:mt-0">
                <div class="flex space-x-2">
                    @if($invoice->payments->count() > 0)

                    @else
                    <a href="{{ route('invoices.edit', $invoice) }}" 
                       class="inline-flex items-center px-4 py-2 bg-indigo-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-indigo-700 focus:bg-indigo-700 active:bg-indigo-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
                        <i class="fas fa-edit me-2"></i>
                        {{ __('invoice.edit') }}
                    </a>
                    @endif
                    @if($invoice->remaining_balance > 0)
                        <a href="{{ route('invoice-payments.create', ['invoice_id' => $invoice->id, 'amount' => $invoice->remaining_balance]) }}" 
                           class="inline-flex items-center px-4 py-2 bg-green-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-green-700 focus:bg-green-700 active:bg-green-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
                            <i class="fas fa-plus me-2"></i>
                            {{ __('invoice.record_payment') }}
                        </a>
                    @endif
                </div>
            </div>
        </div>
    </div>

    @if(session('success'))
        <div class="mb-6 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded dark:bg-green-900 dark:border-green-600 dark:text-green-300">
            <i class="fas fa-check-circle me-2"></i>
            {{ session('success') }}
        </div>
    @endif

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <!-- Invoice Details -->
        <div class="lg:col-span-2">
            <div class="bg-white dark:bg-gray-800 shadow rounded-lg">
                <div class="px-4 py-5 sm:p-6">
                    <h3 class="text-lg font-medium text-gray-900 dark:text-white mb-4">
                        {{ __('invoice.invoice_information') }}
                    </h3>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">
                                {{ __('invoice.client_name') }}
                            </dt>
                            <dd class="mt-1 text-sm text-gray-900 dark:text-white">
                                {{ $invoice->client_name }}
                            </dd>
                        </div>
                        <div>
                            <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">
                                {{ __('invoice.phone') }}
                            </dt>
                            <dd class="mt-1 text-sm text-gray-900 dark:text-white">
                                {{ $invoice->phone }}
                            </dd>
                        </div>
                        <div>
                            <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">
                                {{ __('invoice.date') }}
                            </dt>
                            <dd class="mt-1 text-sm text-gray-900 dark:text-white">
                                {{ $invoice->date->format('M d, Y') }}
                            </dd>
                        </div>
                        <div>
                            <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">
                                {{ __('invoice.total_amount') }}
                            </dt>
                            <dd class="mt-1 text-sm text-gray-900 dark:text-white">
                                ${{ number_format($invoice->total_amount, 2) }}
                            </dd>
                        </div>
                        <div>
                            <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">
                                {{ __('invoice.discount') }}
                            </dt>
                            <dd class="mt-1 text-sm text-gray-900 dark:text-white">
                                ${{ number_format($invoice->discount, 2) }}
                            </dd>
                        </div>
                        <div>
                            <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">
                                {{ __('invoice.total_after_discount') }}
                            </dt>
                            <dd class="mt-1 text-sm font-medium text-gray-900 dark:text-white">
                                ${{ number_format($invoice->total_after_discount, 2) }}
                            </dd>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Invoice Items -->
            <div class="mt-6 bg-white dark:bg-gray-800 shadow rounded-lg">
                <div class="px-4 py-5 sm:p-6">
                    <h3 class="text-lg font-medium text-gray-900 dark:text-white mb-4">
                        {{ __('invoice.items') }}
                    </h3>
                    
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                            <thead class="bg-gray-50 dark:bg-gray-700">
                                <tr>
                                    <th class="px-6 py-3 text-start text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                        {{ __('invoice.service') }}
                                    </th>
                                    <th class="px-6 py-3 text-start text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                        {{ __('invoice.service_price') }}
                                    </th>
                                    <th class="px-6 py-3 text-start text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                        {{ __('invoice.parts_price') }}
                                    </th>
                                    <th class="px-6 py-3 text-start text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                        {{ __('invoice.subtotal') }}
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-200 dark:divide-gray-700">
                                @foreach($invoice->items as $item)
                                    <tr class="hover:bg-gray-50 dark:hover:bg-gray-700">
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 dark:text-gray-100">
                                            {{ $item->service->name }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-300">
                                            ${{ number_format($item->price, 2) }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-300">
                                            ${{ number_format($item->parts_price, 2) }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 dark:text-gray-100">
                                            ${{ number_format($item->price + $item->parts_price, 2) }}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot class="bg-gray-50 dark:bg-gray-700">
                                <tr>
                                    <td colspan="3" class="px-6 py-4 text-end text-sm font-medium text-gray-900 dark:text-gray-100">
                                        {{ __('invoice.total') }}:
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-bold text-gray-900 dark:text-gray-100">
                                        ${{ number_format($invoice->total_amount, 2) }}
                                    </td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <!-- Payment Status & History -->
        <div>
            <!-- Payment Status -->
            <div class="bg-white dark:bg-gray-800 shadow rounded-lg">
                <div class="px-4 py-5 sm:p-6">
                    <h3 class="text-lg font-medium text-gray-900 dark:text-white mb-4">
                        {{ __('invoice.payment_status') }}
                    </h3>
                    
                    <div class="space-y-4">
                        <div class="flex justify-between items-center">
                            <span class="text-sm font-medium text-gray-500 dark:text-gray-400">
                                {{ __('invoice.total_amount') }}
                            </span>
                            <span class="text-lg font-semibold text-gray-900 dark:text-white">
                                ${{ number_format($invoice->total_amount, 2) }}
                            </span>
                        </div>
                        
                        <div class="flex justify-between items-center">
                            <span class="text-sm font-medium text-gray-500 dark:text-gray-400">
                                {{ __('invoice.discount') }}
                            </span>
                            <span class="text-lg font-semibold text-gray-900 dark:text-white">
                                -${{ number_format($invoice->discount, 2) }}
                            </span>
                        </div>
                        
                        <div class="flex justify-between items-center border-t border-gray-200 dark:border-gray-600 pt-2">
                            <span class="text-sm font-medium text-gray-500 dark:text-gray-400">
                                {{ __('invoice.total_after_discount') }}
                            </span>
                            <span class="text-lg font-semibold text-gray-900 dark:text-white">
                                ${{ number_format($invoice->total_after_discount, 2) }}
                            </span>
                        </div>
                        
                        <div class="flex justify-between items-center">
                            <span class="text-sm font-medium text-gray-500 dark:text-gray-400">
                                {{ __('invoice.amount_paid') }}
                            </span>
                            <span class="text-lg font-semibold text-green-600 dark:text-green-400">
                                ${{ number_format($invoice->amount_paid, 2) }}
                            </span>
                        </div>
                        
                        <div class="flex justify-between items-center border-t border-gray-200 dark:border-gray-600 pt-2">
                            <span class="text-sm font-medium text-gray-500 dark:text-gray-400">
                                {{ __('invoice.remaining_balance') }}
                            </span>
                            <span class="text-lg font-semibold {{ $invoice->remaining_balance > 0 ? 'text-red-600 dark:text-red-400' : 'text-green-600 dark:text-green-400' }}">
                                ${{ number_format($invoice->remaining_balance, 2) }}
                            </span>
                        </div>
                        
                        <div class="mt-4">
                            @if($invoice->is_fully_paid)
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

            <!-- Payment History -->
            @if($invoice->payments->count() > 0)
                <div class="mt-6 bg-white dark:bg-gray-800 shadow rounded-lg">
                    <div class="px-4 py-5 sm:p-6">
                        <h3 class="text-lg font-medium text-gray-900 dark:text-white mb-4">
                            {{ __('invoice.payment_history') }}
                        </h3>
                        
                        <div class="space-y-3">
                            @foreach($invoice->payments as $payment)
                                <div class="flex items-center justify-between p-3 bg-gray-50 dark:bg-gray-700 rounded-lg">
                                    <div class="flex items-center">
                                        <div class="flex-shrink-0">
                                            <i class="{{ $payment->payment_method->icon() }} text-gray-400"></i>
                                        </div>
                                        <div class="ms-3">
                                            <p class="text-sm font-medium text-gray-900 dark:text-white">
                                                {{ $payment->payment_method->label() }}
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
                                        <div class="flex space-x-1">
                                            <a data-payment-id="{{ $payment->id }}" data-invoice-id="{{ $invoice->id }}" data-href="{{ route('invoice-payments.edit', $payment) }}" 
                                               class="text-indigo-600 hover:text-indigo-900 dark:text-indigo-400 dark:hover:text-indigo-300">
                                                <i class="fas fa-edit text-xs"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            @else
                <div class="mt-6 bg-white dark:bg-gray-800 shadow rounded-lg">
                    <div class="px-4 py-5 sm:p-6 text-center">
                        <i class="fas fa-credit-card text-4xl text-gray-300 dark:text-gray-600 mb-2"></i>
                        <p class="text-gray-500 dark:text-gray-400">{{ __('invoice.no_payments_yet') }}</p>
                    </div>
                </div>
            @endif
        </div>
    </div>
</x-app-layout>
