<x-app-layout>
    <div class="mb-8">
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between">
            <div>
                <h1 class="text-2xl font-bold text-gray-900 dark:text-white">
                    <i class="fas fa-edit me-2"></i>
                    {{ __('invoice.edit') }} #{{ $invoice->id }}
                </h1>
                <p class="mt-2 text-sm text-gray-700 dark:text-gray-300">
                    {{ __('invoice.edit_invoice') }}
                </p>
            </div>
        </div>
    </div>

    <div class="bg-white dark:bg-gray-800 shadow rounded-lg">
        <div class="px-4 py-5 sm:p-6">
            <form method="POST" action="{{ route('invoices.update', $invoice) }}">
                @csrf
                @method('PUT')

                <!-- Client Information -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
                    <div>
                        <label for="client_name" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                            {{ __('invoice.client_name') }} <span class="text-red-500">*</span>
                        </label>
                        <input type="text" 
                               name="client_name" 
                               id="client_name" 
                               value="{{ old('client_name', $invoice->client_name) }}"
                               class="w-full rounded-md border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
                               required>
                        @error('client_name')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="phone" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                            {{ __('invoice.phone') }} <span class="text-red-500">*</span>
                        </label>
                        <input type="text" 
                               name="phone" 
                               id="phone" 
                               value="{{ old('phone', $invoice->phone) }}"
                               class="w-full rounded-md border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
                               required>
                        @error('phone')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="date" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                            {{ __('invoice.date') }} <span class="text-red-500">*</span>
                        </label>
                        <input type="date" 
                               name="date" 
                               id="date" 
                               value="{{ old('date', $invoice->date->format('Y-m-d')) }}"
                               class="w-full rounded-md border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
                               required>
                        @error('date')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="total_amount" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                            {{ __('invoice.total_amount') }} <span class="text-red-500">*</span>
                        </label>
                        <input type="number" 
                               name="total_amount" 
                               id="total_amount" 
                               step="0.01" 
                               min="0"
                               value="{{ old('total_amount', $invoice->total_amount) }}"
                               class="w-full rounded-md border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
                               required>
                        @error('total_amount')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="discount" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                            {{ __('invoice.discount') }}
                        </label>
                        <input type="number" 
                               name="discount" 
                               id="discount" 
                               step="0.01" 
                               min="0"
                               value="{{ old('discount', $invoice->discount) }}"
                               class="w-full rounded-md border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                        @error('discount')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <!-- Invoice Items -->
                <div class="mb-8">
                    <div class="flex items-center justify-between mb-4">
                        <h3 class="text-lg font-medium text-gray-900 dark:text-white">
                            {{ __('invoice.items') }}
                        </h3>
                        <button type="button" 
                                onclick="addItem()" 
                                class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                            <i class="fas fa-plus me-1"></i>
                            {{ __('invoice.add_item') }}
                        </button>
                    </div>
                    
                    <div id="items-container" class="space-y-4">
                        @foreach($invoice->items as $index => $item)
                            <div class="item-row bg-gray-50 dark:bg-gray-700 p-4 rounded-lg">
                                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                            {{ __('invoice.service') }} <span class="text-red-500">*</span>
                                        </label>
                                        <select name="items[{{ $index }}][service_id]" 
                                                class="w-full rounded-md border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
                                                required>
                                            <option value="">{{ __('invoice.select_service') }}</option>
                                            @foreach($services as $service)
                                                <option value="{{ $service->id }}" {{ $item->service_id == $service->id ? 'selected' : '' }}>
                                                    {{ $service->name }} - ${{ number_format($service->price, 2) }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                            {{ __('invoice.service_price') }} <span class="text-red-500">*</span>
                                        </label>
                                        <input type="number" 
                                               name="items[{{ $index }}][price]" 
                                               step="0.01" 
                                               min="0"
                                               value="{{ $item->price }}"
                                               class="w-full rounded-md border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
                                               required>
                                    </div>
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                            {{ __('invoice.parts_price') }}
                                        </label>
                                        <input type="number" 
                                               name="items[{{ $index }}][parts_price]" 
                                               step="0.01" 
                                               min="0"
                                               value="{{ $item->parts_price }}"
                                               class="w-full rounded-md border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

                <!-- Invoice Total Display -->
                <div class="mt-8 p-4 bg-gray-50 dark:bg-gray-700 rounded-lg">
                    <div class="flex justify-between items-center">
                        <span class="text-lg font-medium text-gray-900 dark:text-white">
                            {{ __('invoice.total_amount') }}:
                        </span>
                        <span id="invoice-total" class="text-2xl font-bold text-gray-900 dark:text-white">
                            ${{ number_format($invoice->total_amount, 2) }}
                        </span>
                    </div>
                    <div class="mt-2 text-sm text-gray-500 dark:text-gray-400">
                        {{ __('invoice.total_calculated_from_items') }}
                    </div>
                </div>

                <!-- Form Actions -->
                <div class="flex flex-col sm:flex-row gap-4 justify-end mt-6">
                    <a href="{{ route('invoices.show', $invoice) }}" 
                       class="inline-flex items-center justify-center px-4 py-2 bg-gray-300 dark:bg-gray-600 border border-transparent rounded-md font-semibold text-xs text-gray-700 dark:text-gray-300 uppercase tracking-widest hover:bg-gray-400 dark:hover:bg-gray-500 focus:bg-gray-400 dark:focus:bg-gray-500 active:bg-gray-500 dark:active:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
                        <i class="fas fa-times me-2"></i>
                        {{ __('invoice.cancel') }}
                    </a>
                    <button type="submit" 
                            class="inline-flex items-center justify-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700 focus:bg-blue-700 active:bg-blue-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
                        <i class="fas fa-save me-2"></i>
                        {{ __('invoice.update') }}
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script>
        let itemIndex = {{ $invoice->items->count() }};

        function addItem() {
            const container = document.getElementById('items-container');
            const newItem = document.createElement('div');
            newItem.className = 'item-row bg-gray-50 dark:bg-gray-700 p-4 rounded-lg';
            newItem.innerHTML = `
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                            {{ __('invoice.service') }} <span class="text-red-500">*</span>
                        </label>
                        <select name="items[${itemIndex}][service_id]" 
                                class="w-full rounded-md border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
                                required>
                            <option value="">{{ __('invoice.select_service') }}</option>
                            @foreach($services as $service)
                                <option value="{{ $service->id }}">{{ $service->name }} - ${{ number_format($service->price, 2) }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                            {{ __('invoice.service_price') }} <span class="text-red-500">*</span>
                        </label>
                        <input type="number" 
                               name="items[${itemIndex}][price]" 
                               step="0.01" 
                               min="0"
                               class="w-full rounded-md border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
                               required>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                            {{ __('invoice.parts_price') }}
                        </label>
                        <input type="number" 
                               name="items[${itemIndex}][parts_price]" 
                               step="0.01" 
                               min="0"
                               value="0"
                               class="w-full rounded-md border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                    </div>
                </div>
            `;
            container.appendChild(newItem);
            itemIndex++;
        }
    </script>
</x-app-layout>
