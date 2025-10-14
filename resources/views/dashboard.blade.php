<x-layouts.app>
    <div class="mb-8">
        <h1 class="text-2xl font-bold text-gray-900 dark:text-white">
            <i class="fas fa-tachometer-alt me-2"></i>
            {{ __('common.dashboard') }}
        </h1>
        <p class="mt-2 text-sm text-gray-700 dark:text-gray-300">
            {{ __('dashboard.welcome_message') }}
        </p>
    </div>

    <!-- Time Period Selector -->
    <div class="mb-6">
        <div class="bg-white dark:bg-gray-800 shadow rounded-lg p-3 sm:p-4">
            <!-- Mobile: Single column with full-width buttons -->
            <div class="block sm:hidden space-y-2">
                <div class="grid grid-cols-2 gap-2">
                    <button onclick="showPeriod('today')" class="period-btn active px-3 py-2 text-xs font-medium rounded-md bg-blue-600 text-white text-center">
                        {{ __('dashboard.today') }}
                    </button>
                    <button onclick="showPeriod('yesterday')" class="period-btn px-3 py-2 text-xs font-medium rounded-md bg-gray-200 dark:bg-gray-700 text-gray-700 dark:text-gray-300 hover:bg-gray-300 dark:hover:bg-gray-600 text-center">
                        {{ __('dashboard.yesterday') }}
                    </button>
                </div>
                <div class="grid grid-cols-2 gap-2">
                    <button onclick="showPeriod('this-week')" class="period-btn px-3 py-2 text-xs font-medium rounded-md bg-gray-200 dark:bg-gray-700 text-gray-700 dark:text-gray-300 hover:bg-gray-300 dark:hover:bg-gray-600 text-center">
                        {{ __('dashboard.this_week') }}
                    </button>
                    <button onclick="showPeriod('last-week')" class="period-btn px-3 py-2 text-xs font-medium rounded-md bg-gray-200 dark:bg-gray-700 text-gray-700 dark:text-gray-300 hover:bg-gray-300 dark:hover:bg-gray-600 text-center">
                        {{ __('dashboard.last_week') }}
                    </button>
                </div>
                <div class="grid grid-cols-2 gap-2">
                    <button onclick="showPeriod('current-month')" class="period-btn px-3 py-2 text-xs font-medium rounded-md bg-gray-200 dark:bg-gray-700 text-gray-700 dark:text-gray-300 hover:bg-gray-300 dark:hover:bg-gray-600 text-center">
                        {{ __('dashboard.current_month') }}
                    </button>
                    <button onclick="showPeriod('last-month')" class="period-btn px-3 py-2 text-xs font-medium rounded-md bg-gray-200 dark:bg-gray-700 text-gray-700 dark:text-gray-300 hover:bg-gray-300 dark:hover:bg-gray-600 text-center">
                        {{ __('dashboard.last_month') }}
                    </button>
                </div>
                <div class="grid grid-cols-2 gap-2">
                    <button onclick="showPeriod('last-3-months')" class="period-btn px-3 py-2 text-xs font-medium rounded-md bg-gray-200 dark:bg-gray-700 text-gray-700 dark:text-gray-300 hover:bg-gray-300 dark:hover:bg-gray-600 text-center">
                        {{ __('dashboard.last_3_months') }}
                    </button>
                    <button onclick="showPeriod('current-year')" class="period-btn px-3 py-2 text-xs font-medium rounded-md bg-gray-200 dark:bg-gray-700 text-gray-700 dark:text-gray-300 hover:bg-gray-300 dark:hover:bg-gray-600 text-center">
                        {{ __('dashboard.current_year') }}
                    </button>
                </div>
                <div class="grid grid-cols-1 gap-2">
                    <button onclick="showPeriod('last-year')" class="period-btn px-3 py-2 text-xs font-medium rounded-md bg-gray-200 dark:bg-gray-700 text-gray-700 dark:text-gray-300 hover:bg-gray-300 dark:hover:bg-gray-600 text-center">
                        {{ __('dashboard.last_year') }}
                    </button>
                </div>
            </div>
            
            <!-- Tablet: 3 columns -->
            <div class="hidden sm:block lg:hidden">
                <div class="grid grid-cols-3 gap-2">
                    <button onclick="showPeriod('today')" class="period-btn active px-3 py-2 text-sm font-medium rounded-md bg-blue-600 text-white text-center">
                        {{ __('dashboard.today') }}
                    </button>
                    <button onclick="showPeriod('yesterday')" class="period-btn px-3 py-2 text-sm font-medium rounded-md bg-gray-200 dark:bg-gray-700 text-gray-700 dark:text-gray-300 hover:bg-gray-300 dark:hover:bg-gray-600 text-center">
                        {{ __('dashboard.yesterday') }}
                    </button>
                    <button onclick="showPeriod('this-week')" class="period-btn px-3 py-2 text-sm font-medium rounded-md bg-gray-200 dark:bg-gray-700 text-gray-700 dark:text-gray-300 hover:bg-gray-300 dark:hover:bg-gray-600 text-center">
                        {{ __('dashboard.this_week') }}
                    </button>
                    <button onclick="showPeriod('last-week')" class="period-btn px-3 py-2 text-sm font-medium rounded-md bg-gray-200 dark:bg-gray-700 text-gray-700 dark:text-gray-300 hover:bg-gray-300 dark:hover:bg-gray-600 text-center">
                        {{ __('dashboard.last_week') }}
                    </button>
                    <button onclick="showPeriod('current-month')" class="period-btn px-3 py-2 text-sm font-medium rounded-md bg-gray-200 dark:bg-gray-700 text-gray-700 dark:text-gray-300 hover:bg-gray-300 dark:hover:bg-gray-600 text-center">
                        {{ __('dashboard.current_month') }}
                    </button>
                    <button onclick="showPeriod('last-month')" class="period-btn px-3 py-2 text-sm font-medium rounded-md bg-gray-200 dark:bg-gray-700 text-gray-700 dark:text-gray-300 hover:bg-gray-300 dark:hover:bg-gray-600 text-center">
                        {{ __('dashboard.last_month') }}
                    </button>
                    <button onclick="showPeriod('last-3-months')" class="period-btn px-3 py-2 text-sm font-medium rounded-md bg-gray-200 dark:bg-gray-700 text-gray-700 dark:text-gray-300 hover:bg-gray-300 dark:hover:bg-gray-600 text-center">
                        {{ __('dashboard.last_3_months') }}
                    </button>
                    <button onclick="showPeriod('current-year')" class="period-btn px-3 py-2 text-sm font-medium rounded-md bg-gray-200 dark:bg-gray-700 text-gray-700 dark:text-gray-300 hover:bg-gray-300 dark:hover:bg-gray-600 text-center">
                        {{ __('dashboard.current_year') }}
                    </button>
                    <button onclick="showPeriod('last-year')" class="period-btn px-3 py-2 text-sm font-medium rounded-md bg-gray-200 dark:bg-gray-700 text-gray-700 dark:text-gray-300 hover:bg-gray-300 dark:hover:bg-gray-600 text-center">
                        {{ __('dashboard.last_year') }}
                    </button>
                </div>
            </div>
            
            <!-- Desktop: Horizontal flex layout -->
            <div class="hidden lg:block">
                <div class="flex flex-wrap gap-2">
                    <button onclick="showPeriod('today')" class="period-btn active px-4 py-2 text-sm font-medium rounded-md bg-blue-600 text-white">
                        {{ __('dashboard.today') }}
                    </button>
                    <button onclick="showPeriod('yesterday')" class="period-btn px-4 py-2 text-sm font-medium rounded-md bg-gray-200 dark:bg-gray-700 text-gray-700 dark:text-gray-300 hover:bg-gray-300 dark:hover:bg-gray-600">
                        {{ __('dashboard.yesterday') }}
                    </button>
                    <button onclick="showPeriod('this-week')" class="period-btn px-4 py-2 text-sm font-medium rounded-md bg-gray-200 dark:bg-gray-700 text-gray-700 dark:text-gray-300 hover:bg-gray-300 dark:hover:bg-gray-600">
                        {{ __('dashboard.this_week') }}
                    </button>
                    <button onclick="showPeriod('last-week')" class="period-btn px-4 py-2 text-sm font-medium rounded-md bg-gray-200 dark:bg-gray-700 text-gray-700 dark:text-gray-300 hover:bg-gray-300 dark:hover:bg-gray-600">
                        {{ __('dashboard.last_week') }}
                    </button>
                    <button onclick="showPeriod('current-month')" class="period-btn px-4 py-2 text-sm font-medium rounded-md bg-gray-200 dark:bg-gray-700 text-gray-700 dark:text-gray-300 hover:bg-gray-300 dark:hover:bg-gray-600">
                        {{ __('dashboard.current_month') }}
                    </button>
                    <button onclick="showPeriod('last-month')" class="period-btn px-4 py-2 text-sm font-medium rounded-md bg-gray-200 dark:bg-gray-700 text-gray-700 dark:text-gray-300 hover:bg-gray-300 dark:hover:bg-gray-600">
                        {{ __('dashboard.last_month') }}
                    </button>
                    <button onclick="showPeriod('last-3-months')" class="period-btn px-4 py-2 text-sm font-medium rounded-md bg-gray-200 dark:bg-gray-700 text-gray-700 dark:text-gray-300 hover:bg-gray-300 dark:hover:bg-gray-600">
                        {{ __('dashboard.last_3_months') }}
                    </button>
                    <button onclick="showPeriod('current-year')" class="period-btn px-4 py-2 text-sm font-medium rounded-md bg-gray-200 dark:bg-gray-700 text-gray-700 dark:text-gray-300 hover:bg-gray-300 dark:hover:bg-gray-600">
                        {{ __('dashboard.current_year') }}
                    </button>
                    <button onclick="showPeriod('last-year')" class="period-btn px-4 py-2 text-sm font-medium rounded-md bg-gray-200 dark:bg-gray-700 text-gray-700 dark:text-gray-300 hover:bg-gray-300 dark:hover:bg-gray-600">
                        {{ __('dashboard.last_year') }}
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Today Stats -->
    <div id="today" class="period-stats">
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-6 gap-3 sm:gap-4 lg:gap-6 mb-8">
            <!-- Invoices -->
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow rounded-lg">
                <div class="p-3 sm:p-4 lg:p-5">
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <i class="fas fa-file-invoice text-lg sm:text-xl lg:text-2xl text-blue-600"></i>
                        </div>
                        <div class="ms-3 sm:ms-4 lg:ms-5 w-0 flex-1">
                            <dl>
                                <dt class="text-xs sm:text-sm font-medium text-gray-500 dark:text-gray-400 truncate">
                                    {{ __('dashboard.invoices_today') }}
                                </dt>
                                <dd class="text-sm sm:text-base lg:text-lg font-medium text-gray-900 dark:text-white">
                                    {{ \App\Models\Invoice::whereDate('date', today())->count() }}
                                </dd>
                            </dl>
                        </div>
                    </div>
                </div>
            </div>

            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow rounded-lg">
                <div class="p-3 sm:p-4 lg:p-5">
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <i class="fas fa-dollar-sign text-lg sm:text-xl lg:text-2xl text-green-600"></i>
                        </div>
                        <div class="ms-5 w-0 flex-1">
                            <dl>
                                <dt class="text-xs sm:text-sm font-medium text-gray-500 dark:text-gray-400 truncate">
                                    {{ __('dashboard.invoice_total_today') }}
                                </dt>
                                <dd class="text-sm sm:text-base lg:text-lg font-medium text-gray-900 dark:text-white">
                                    ${{ number_format(\App\Models\Invoice::whereDate('date', today())->sum('total_amount'), 2) }}
                                </dd>
                            </dl>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Payments -->
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow rounded-lg">
                <div class="p-3 sm:p-4 lg:p-5">
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <i class="fas fa-credit-card text-lg sm:text-xl lg:text-2xl text-purple-600"></i>
                        </div>
                        <div class="ms-5 w-0 flex-1">
                            <dl>
                                <dt class="text-xs sm:text-sm font-medium text-gray-500 dark:text-gray-400 truncate">
                                    {{ __('dashboard.payments_today') }}
                                </dt>
                                <dd class="text-sm sm:text-base lg:text-lg font-medium text-gray-900 dark:text-white">
                                    {{ \App\Models\InvoicePayment::whereDate('date', today())->count() }}
                                </dd>
                            </dl>
                        </div>
                    </div>
                </div>
            </div>

            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow rounded-lg">
                <div class="p-3 sm:p-4 lg:p-5">
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <i class="fas fa-money-bill-wave text-lg sm:text-xl lg:text-2xl text-emerald-600"></i>
                        </div>
                        <div class="ms-5 w-0 flex-1">
                            <dl>
                                <dt class="text-xs sm:text-sm font-medium text-gray-500 dark:text-gray-400 truncate">
                                    {{ __('dashboard.payment_total_today') }}
                                </dt>
                                <dd class="text-sm sm:text-base lg:text-lg font-medium text-gray-900 dark:text-white">
                                    ${{ number_format(\App\Models\InvoicePayment::whereDate('date', today())->sum('amount'), 2) }}
                                </dd>
                            </dl>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Expenses -->
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow rounded-lg">
                <div class="p-3 sm:p-4 lg:p-5">
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <i class="fas fa-receipt text-lg sm:text-xl lg:text-2xl text-red-600"></i>
                        </div>
                        <div class="ms-5 w-0 flex-1">
                            <dl>
                                <dt class="text-xs sm:text-sm font-medium text-gray-500 dark:text-gray-400 truncate">
                                    {{ __('dashboard.expenses_today') }}
                                </dt>
                                <dd class="text-sm sm:text-base lg:text-lg font-medium text-gray-900 dark:text-white">
                                    {{ \App\Models\Expense::whereDate('date', today())->count() }}
                                </dd>
                            </dl>
                        </div>
                    </div>
                </div>
            </div>

            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow rounded-lg">
                <div class="p-3 sm:p-4 lg:p-5">
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <i class="fas fa-minus-circle text-lg sm:text-xl lg:text-2xl text-orange-600"></i>
                        </div>
                        <div class="ms-5 w-0 flex-1">
                            <dl>
                                <dt class="text-xs sm:text-sm font-medium text-gray-500 dark:text-gray-400 truncate">
                                    {{ __('dashboard.expense_total_today') }}
                                </dt>
                                <dd class="text-sm sm:text-base lg:text-lg font-medium text-gray-900 dark:text-white">
                                    ${{ number_format(\App\Models\Expense::whereDate('date', today())->sum('amount'), 2) }}
                                </dd>
                            </dl>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Yesterday Stats -->
    <div id="yesterday" class="period-stats hidden">
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-6 gap-3 sm:gap-4 lg:gap-6 mb-8">
            <!-- Invoices -->
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow rounded-lg">
                <div class="p-3 sm:p-4 lg:p-5">
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <i class="fas fa-file-invoice text-lg sm:text-xl lg:text-2xl text-blue-600"></i>
                        </div>
                        <div class="ms-3 sm:ms-4 lg:ms-5 w-0 flex-1">
                            <dl>
                                <dt class="text-xs sm:text-sm font-medium text-gray-500 dark:text-gray-400 truncate">
                                    {{ __('dashboard.invoices_yesterday') }}
                                </dt>
                                <dd class="text-sm sm:text-base lg:text-lg font-medium text-gray-900 dark:text-white">
                                    {{ \App\Models\Invoice::whereDate('date', today()->subDay())->count() }}
                                </dd>
                            </dl>
                        </div>
                    </div>
                </div>
            </div>

            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow rounded-lg">
                <div class="p-3 sm:p-4 lg:p-5">
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <i class="fas fa-dollar-sign text-lg sm:text-xl lg:text-2xl text-green-600"></i>
                        </div>
                        <div class="ms-5 w-0 flex-1">
                            <dl>
                                <dt class="text-xs sm:text-sm font-medium text-gray-500 dark:text-gray-400 truncate">
                                    {{ __('dashboard.invoice_total_yesterday') }}
                                </dt>
                                <dd class="text-sm sm:text-base lg:text-lg font-medium text-gray-900 dark:text-white">
                                    ${{ number_format(\App\Models\Invoice::whereDate('date', today()->subDay())->sum('total_amount'), 2) }}
                                </dd>
                            </dl>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Payments -->
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow rounded-lg">
                <div class="p-3 sm:p-4 lg:p-5">
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <i class="fas fa-credit-card text-lg sm:text-xl lg:text-2xl text-purple-600"></i>
                        </div>
                        <div class="ms-5 w-0 flex-1">
                            <dl>
                                <dt class="text-xs sm:text-sm font-medium text-gray-500 dark:text-gray-400 truncate">
                                    {{ __('dashboard.payments_yesterday') }}
                                </dt>
                                <dd class="text-sm sm:text-base lg:text-lg font-medium text-gray-900 dark:text-white">
                                    {{ \App\Models\InvoicePayment::whereDate('date', today()->subDay())->count() }}
                                </dd>
                            </dl>
                        </div>
                    </div>
                </div>
            </div>

            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow rounded-lg">
                <div class="p-3 sm:p-4 lg:p-5">
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <i class="fas fa-money-bill-wave text-lg sm:text-xl lg:text-2xl text-emerald-600"></i>
                        </div>
                        <div class="ms-5 w-0 flex-1">
                            <dl>
                                <dt class="text-xs sm:text-sm font-medium text-gray-500 dark:text-gray-400 truncate">
                                    {{ __('dashboard.payment_total_yesterday') }}
                                </dt>
                                <dd class="text-sm sm:text-base lg:text-lg font-medium text-gray-900 dark:text-white">
                                    ${{ number_format(\App\Models\InvoicePayment::whereDate('date', today()->subDay())->sum('amount'), 2) }}
                                </dd>
                            </dl>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Expenses -->
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow rounded-lg">
                <div class="p-3 sm:p-4 lg:p-5">
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <i class="fas fa-receipt text-lg sm:text-xl lg:text-2xl text-red-600"></i>
                        </div>
                        <div class="ms-5 w-0 flex-1">
                            <dl>
                                <dt class="text-xs sm:text-sm font-medium text-gray-500 dark:text-gray-400 truncate">
                                    {{ __('dashboard.expenses_yesterday') }}
                                </dt>
                                <dd class="text-sm sm:text-base lg:text-lg font-medium text-gray-900 dark:text-white">
                                    {{ \App\Models\Expense::whereDate('date', today()->subDay())->count() }}
                                </dd>
                            </dl>
                        </div>
                    </div>
                </div>
            </div>

            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow rounded-lg">
                <div class="p-3 sm:p-4 lg:p-5">
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <i class="fas fa-minus-circle text-lg sm:text-xl lg:text-2xl text-orange-600"></i>
                        </div>
                        <div class="ms-5 w-0 flex-1">
                            <dl>
                                <dt class="text-xs sm:text-sm font-medium text-gray-500 dark:text-gray-400 truncate">
                                    {{ __('dashboard.expense_total_yesterday') }}
                                </dt>
                                <dd class="text-sm sm:text-base lg:text-lg font-medium text-gray-900 dark:text-white">
                                    ${{ number_format(\App\Models\Expense::whereDate('date', today()->subDay())->sum('amount'), 2) }}
                                </dd>
                            </dl>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- This Week Stats -->
    <div id="this-week" class="period-stats hidden">
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-6 gap-3 sm:gap-4 lg:gap-6 mb-8">
            <!-- Invoices -->
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow rounded-lg">
                <div class="p-3 sm:p-4 lg:p-5">
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <i class="fas fa-file-invoice text-lg sm:text-xl lg:text-2xl text-blue-600"></i>
                        </div>
                        <div class="ms-3 sm:ms-4 lg:ms-5 w-0 flex-1">
                            <dl>
                                <dt class="text-xs sm:text-sm font-medium text-gray-500 dark:text-gray-400 truncate">
                                    {{ __('dashboard.invoices_this_week') }}
                                </dt>
                                <dd class="text-sm sm:text-base lg:text-lg font-medium text-gray-900 dark:text-white">
                                    {{ \App\Models\Invoice::whereBetween('date', [now()->startOfWeek(), now()->endOfWeek()])->count() }}
                                </dd>
                            </dl>
                        </div>
                    </div>
                </div>
            </div>

            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow rounded-lg">
                <div class="p-3 sm:p-4 lg:p-5">
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <i class="fas fa-dollar-sign text-lg sm:text-xl lg:text-2xl text-green-600"></i>
                        </div>
                        <div class="ms-5 w-0 flex-1">
                            <dl>
                                <dt class="text-xs sm:text-sm font-medium text-gray-500 dark:text-gray-400 truncate">
                                    {{ __('dashboard.invoice_total_this_week') }}
                                </dt>
                                <dd class="text-sm sm:text-base lg:text-lg font-medium text-gray-900 dark:text-white">
                                    ${{ number_format(\App\Models\Invoice::whereBetween('date', [now()->startOfWeek(), now()->endOfWeek()])->sum('total_amount'), 2) }}
                                </dd>
                            </dl>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Payments -->
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow rounded-lg">
                <div class="p-3 sm:p-4 lg:p-5">
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <i class="fas fa-credit-card text-lg sm:text-xl lg:text-2xl text-purple-600"></i>
                        </div>
                        <div class="ms-5 w-0 flex-1">
                            <dl>
                                <dt class="text-xs sm:text-sm font-medium text-gray-500 dark:text-gray-400 truncate">
                                    {{ __('dashboard.payments_this_week') }}
                                </dt>
                                <dd class="text-sm sm:text-base lg:text-lg font-medium text-gray-900 dark:text-white">
                                    {{ \App\Models\InvoicePayment::whereBetween('date', [now()->startOfWeek(), now()->endOfWeek()])->count() }}
                                </dd>
                            </dl>
                        </div>
                    </div>
                </div>
            </div>

            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow rounded-lg">
                <div class="p-3 sm:p-4 lg:p-5">
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <i class="fas fa-money-bill-wave text-lg sm:text-xl lg:text-2xl text-emerald-600"></i>
                        </div>
                        <div class="ms-5 w-0 flex-1">
                            <dl>
                                <dt class="text-xs sm:text-sm font-medium text-gray-500 dark:text-gray-400 truncate">
                                    {{ __('dashboard.payment_total_this_week') }}
                                </dt>
                                <dd class="text-sm sm:text-base lg:text-lg font-medium text-gray-900 dark:text-white">
                                    ${{ number_format(\App\Models\InvoicePayment::whereBetween('date', [now()->startOfWeek(), now()->endOfWeek()])->sum('amount'), 2) }}
                                </dd>
                            </dl>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Expenses -->
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow rounded-lg">
                <div class="p-3 sm:p-4 lg:p-5">
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <i class="fas fa-receipt text-lg sm:text-xl lg:text-2xl text-red-600"></i>
                        </div>
                        <div class="ms-5 w-0 flex-1">
                            <dl>
                                <dt class="text-xs sm:text-sm font-medium text-gray-500 dark:text-gray-400 truncate">
                                    {{ __('dashboard.expenses_this_week') }}
                                </dt>
                                <dd class="text-sm sm:text-base lg:text-lg font-medium text-gray-900 dark:text-white">
                                    {{ \App\Models\Expense::whereBetween('date', [now()->startOfWeek(), now()->endOfWeek()])->count() }}
                                </dd>
                            </dl>
                        </div>
                    </div>
                </div>
            </div>

            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow rounded-lg">
                <div class="p-3 sm:p-4 lg:p-5">
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <i class="fas fa-minus-circle text-lg sm:text-xl lg:text-2xl text-orange-600"></i>
                        </div>
                        <div class="ms-5 w-0 flex-1">
                            <dl>
                                <dt class="text-xs sm:text-sm font-medium text-gray-500 dark:text-gray-400 truncate">
                                    {{ __('dashboard.expense_total_this_week') }}
                                </dt>
                                <dd class="text-sm sm:text-base lg:text-lg font-medium text-gray-900 dark:text-white">
                                    ${{ number_format(\App\Models\Expense::whereBetween('date', [now()->startOfWeek(), now()->endOfWeek()])->sum('amount'), 2) }}
                                </dd>
                            </dl>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Last Week Stats -->
    <div id="last-week" class="period-stats hidden">
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-6 gap-3 sm:gap-4 lg:gap-6 mb-8">
            <!-- Invoices -->
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow rounded-lg">
                <div class="p-3 sm:p-4 lg:p-5">
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <i class="fas fa-file-invoice text-lg sm:text-xl lg:text-2xl text-blue-600"></i>
                        </div>
                        <div class="ms-3 sm:ms-4 lg:ms-5 w-0 flex-1">
                            <dl>
                                <dt class="text-xs sm:text-sm font-medium text-gray-500 dark:text-gray-400 truncate">
                                    {{ __('dashboard.invoices_last_week') }}
                                </dt>
                                <dd class="text-sm sm:text-base lg:text-lg font-medium text-gray-900 dark:text-white">
                                    {{ \App\Models\Invoice::whereBetween('date', [now()->subWeek()->startOfWeek(), now()->subWeek()->endOfWeek()])->count() }}
                                </dd>
                            </dl>
                        </div>
                    </div>
                </div>
            </div>

            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow rounded-lg">
                <div class="p-3 sm:p-4 lg:p-5">
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <i class="fas fa-dollar-sign text-lg sm:text-xl lg:text-2xl text-green-600"></i>
                        </div>
                        <div class="ms-5 w-0 flex-1">
                            <dl>
                                <dt class="text-xs sm:text-sm font-medium text-gray-500 dark:text-gray-400 truncate">
                                    {{ __('dashboard.invoice_total_last_week') }}
                                </dt>
                                <dd class="text-sm sm:text-base lg:text-lg font-medium text-gray-900 dark:text-white">
                                    ${{ number_format(\App\Models\Invoice::whereBetween('date', [now()->subWeek()->startOfWeek(), now()->subWeek()->endOfWeek()])->sum('total_amount'), 2) }}
                                </dd>
                            </dl>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Payments -->
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow rounded-lg">
                <div class="p-3 sm:p-4 lg:p-5">
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <i class="fas fa-credit-card text-lg sm:text-xl lg:text-2xl text-purple-600"></i>
                        </div>
                        <div class="ms-5 w-0 flex-1">
                            <dl>
                                <dt class="text-xs sm:text-sm font-medium text-gray-500 dark:text-gray-400 truncate">
                                    {{ __('dashboard.payments_last_week') }}
                                </dt>
                                <dd class="text-sm sm:text-base lg:text-lg font-medium text-gray-900 dark:text-white">
                                    {{ \App\Models\InvoicePayment::whereBetween('date', [now()->subWeek()->startOfWeek(), now()->subWeek()->endOfWeek()])->count() }}
                                </dd>
                            </dl>
                        </div>
                    </div>
                </div>
            </div>

            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow rounded-lg">
                <div class="p-3 sm:p-4 lg:p-5">
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <i class="fas fa-money-bill-wave text-lg sm:text-xl lg:text-2xl text-emerald-600"></i>
                        </div>
                        <div class="ms-5 w-0 flex-1">
                            <dl>
                                <dt class="text-xs sm:text-sm font-medium text-gray-500 dark:text-gray-400 truncate">
                                    {{ __('dashboard.payment_total_last_week') }}
                                </dt>
                                <dd class="text-sm sm:text-base lg:text-lg font-medium text-gray-900 dark:text-white">
                                    ${{ number_format(\App\Models\InvoicePayment::whereBetween('date', [now()->subWeek()->startOfWeek(), now()->subWeek()->endOfWeek()])->sum('amount'), 2) }}
                                </dd>
                            </dl>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Expenses -->
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow rounded-lg">
                <div class="p-3 sm:p-4 lg:p-5">
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <i class="fas fa-receipt text-lg sm:text-xl lg:text-2xl text-red-600"></i>
                        </div>
                        <div class="ms-5 w-0 flex-1">
                            <dl>
                                <dt class="text-xs sm:text-sm font-medium text-gray-500 dark:text-gray-400 truncate">
                                    {{ __('dashboard.expenses_last_week') }}
                                </dt>
                                <dd class="text-sm sm:text-base lg:text-lg font-medium text-gray-900 dark:text-white">
                                    {{ \App\Models\Expense::whereBetween('date', [now()->subWeek()->startOfWeek(), now()->subWeek()->endOfWeek()])->count() }}
                                </dd>
                            </dl>
                        </div>
                    </div>
                </div>
            </div>

            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow rounded-lg">
                <div class="p-3 sm:p-4 lg:p-5">
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <i class="fas fa-minus-circle text-lg sm:text-xl lg:text-2xl text-orange-600"></i>
                        </div>
                        <div class="ms-5 w-0 flex-1">
                            <dl>
                                <dt class="text-xs sm:text-sm font-medium text-gray-500 dark:text-gray-400 truncate">
                                    {{ __('dashboard.expense_total_last_week') }}
                                </dt>
                                <dd class="text-sm sm:text-base lg:text-lg font-medium text-gray-900 dark:text-white">
                                    ${{ number_format(\App\Models\Expense::whereBetween('date', [now()->subWeek()->startOfWeek(), now()->subWeek()->endOfWeek()])->sum('amount'), 2) }}
                                </dd>
                            </dl>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Current Month Stats -->
    <div id="current-month" class="period-stats hidden">
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-6 gap-3 sm:gap-4 lg:gap-6 mb-8">
            <!-- Invoices -->
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow rounded-lg">
                <div class="p-3 sm:p-4 lg:p-5">
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <i class="fas fa-file-invoice text-lg sm:text-xl lg:text-2xl text-blue-600"></i>
                        </div>
                        <div class="ms-3 sm:ms-4 lg:ms-5 w-0 flex-1">
                            <dl>
                                <dt class="text-xs sm:text-sm font-medium text-gray-500 dark:text-gray-400 truncate">
                                    {{ __('dashboard.invoices_this_month') }}
                                </dt>
                                <dd class="text-sm sm:text-base lg:text-lg font-medium text-gray-900 dark:text-white">
                                    {{ \App\Models\Invoice::whereMonth('date', now()->month)->whereYear('date', now()->year)->count() }}
                                </dd>
                            </dl>
                        </div>
                    </div>
                </div>
            </div>

            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow rounded-lg">
                <div class="p-3 sm:p-4 lg:p-5">
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <i class="fas fa-dollar-sign text-lg sm:text-xl lg:text-2xl text-green-600"></i>
                        </div>
                        <div class="ms-5 w-0 flex-1">
                            <dl>
                                <dt class="text-xs sm:text-sm font-medium text-gray-500 dark:text-gray-400 truncate">
                                    {{ __('dashboard.invoice_total_this_month') }}
                                </dt>
                                <dd class="text-sm sm:text-base lg:text-lg font-medium text-gray-900 dark:text-white">
                                    ${{ number_format(\App\Models\Invoice::whereMonth('date', now()->month)->whereYear('date', now()->year)->sum('total_amount'), 2) }}
                                </dd>
                            </dl>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Payments -->
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow rounded-lg">
                <div class="p-3 sm:p-4 lg:p-5">
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <i class="fas fa-credit-card text-lg sm:text-xl lg:text-2xl text-purple-600"></i>
                        </div>
                        <div class="ms-5 w-0 flex-1">
                            <dl>
                                <dt class="text-xs sm:text-sm font-medium text-gray-500 dark:text-gray-400 truncate">
                                    {{ __('dashboard.payments_this_month') }}
                                </dt>
                                <dd class="text-sm sm:text-base lg:text-lg font-medium text-gray-900 dark:text-white">
                                    {{ \App\Models\InvoicePayment::whereMonth('date', now()->month)->whereYear('date', now()->year)->count() }}
                                </dd>
                            </dl>
                        </div>
                    </div>
                </div>
            </div>

            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow rounded-lg">
                <div class="p-3 sm:p-4 lg:p-5">
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <i class="fas fa-money-bill-wave text-lg sm:text-xl lg:text-2xl text-emerald-600"></i>
                        </div>
                        <div class="ms-5 w-0 flex-1">
                            <dl>
                                <dt class="text-xs sm:text-sm font-medium text-gray-500 dark:text-gray-400 truncate">
                                    {{ __('dashboard.payment_total_this_month') }}
                                </dt>
                                <dd class="text-sm sm:text-base lg:text-lg font-medium text-gray-900 dark:text-white">
                                    ${{ number_format(\App\Models\InvoicePayment::whereMonth('date', now()->month)->whereYear('date', now()->year)->sum('amount'), 2) }}
                                </dd>
                            </dl>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Expenses -->
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow rounded-lg">
                <div class="p-3 sm:p-4 lg:p-5">
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <i class="fas fa-receipt text-lg sm:text-xl lg:text-2xl text-red-600"></i>
                        </div>
                        <div class="ms-5 w-0 flex-1">
                            <dl>
                                <dt class="text-xs sm:text-sm font-medium text-gray-500 dark:text-gray-400 truncate">
                                    {{ __('dashboard.expenses_this_month') }}
                                </dt>
                                <dd class="text-sm sm:text-base lg:text-lg font-medium text-gray-900 dark:text-white">
                                    {{ \App\Models\Expense::whereMonth('date', now()->month)->whereYear('date', now()->year)->count() }}
                                </dd>
                            </dl>
                        </div>
                    </div>
                </div>
            </div>

            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow rounded-lg">
                <div class="p-3 sm:p-4 lg:p-5">
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <i class="fas fa-minus-circle text-lg sm:text-xl lg:text-2xl text-orange-600"></i>
                        </div>
                        <div class="ms-5 w-0 flex-1">
                            <dl>
                                <dt class="text-xs sm:text-sm font-medium text-gray-500 dark:text-gray-400 truncate">
                                    {{ __('dashboard.expense_total_this_month') }}
                                </dt>
                                <dd class="text-sm sm:text-base lg:text-lg font-medium text-gray-900 dark:text-white">
                                    ${{ number_format(\App\Models\Expense::whereMonth('date', now()->month)->whereYear('date', now()->year)->sum('amount'), 2) }}
                                </dd>
                            </dl>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Last Month Stats -->
    <div id="last-month" class="period-stats hidden">
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-6 gap-3 sm:gap-4 lg:gap-6 mb-8">
            <!-- Invoices -->
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow rounded-lg">
                <div class="p-3 sm:p-4 lg:p-5">
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <i class="fas fa-file-invoice text-lg sm:text-xl lg:text-2xl text-blue-600"></i>
                        </div>
                        <div class="ms-3 sm:ms-4 lg:ms-5 w-0 flex-1">
                            <dl>
                                <dt class="text-xs sm:text-sm font-medium text-gray-500 dark:text-gray-400 truncate">
                                    {{ __('dashboard.invoices_last_month') }}
                                </dt>
                                <dd class="text-sm sm:text-base lg:text-lg font-medium text-gray-900 dark:text-white">
                                    {{ \App\Models\Invoice::whereMonth('date', now()->subMonth()->month)->whereYear('date', now()->subMonth()->year)->count() }}
                                </dd>
                            </dl>
                        </div>
                    </div>
                </div>
            </div>

            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow rounded-lg">
                <div class="p-3 sm:p-4 lg:p-5">
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <i class="fas fa-dollar-sign text-lg sm:text-xl lg:text-2xl text-green-600"></i>
                        </div>
                        <div class="ms-5 w-0 flex-1">
                            <dl>
                                <dt class="text-xs sm:text-sm font-medium text-gray-500 dark:text-gray-400 truncate">
                                    {{ __('dashboard.invoice_total_last_month') }}
                                </dt>
                                <dd class="text-sm sm:text-base lg:text-lg font-medium text-gray-900 dark:text-white">
                                    ${{ number_format(\App\Models\Invoice::whereMonth('date', now()->subMonth()->month)->whereYear('date', now()->subMonth()->year)->sum('total_amount'), 2) }}
                                </dd>
                            </dl>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Payments -->
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow rounded-lg">
                <div class="p-3 sm:p-4 lg:p-5">
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <i class="fas fa-credit-card text-lg sm:text-xl lg:text-2xl text-purple-600"></i>
                        </div>
                        <div class="ms-5 w-0 flex-1">
                            <dl>
                                <dt class="text-xs sm:text-sm font-medium text-gray-500 dark:text-gray-400 truncate">
                                    {{ __('dashboard.payments_last_month') }}
                                </dt>
                                <dd class="text-sm sm:text-base lg:text-lg font-medium text-gray-900 dark:text-white">
                                    {{ \App\Models\InvoicePayment::whereMonth('date', now()->subMonth()->month)->whereYear('date', now()->subMonth()->year)->count() }}
                                </dd>
                            </dl>
                        </div>
                    </div>
                </div>
            </div>

            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow rounded-lg">
                <div class="p-3 sm:p-4 lg:p-5">
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <i class="fas fa-money-bill-wave text-lg sm:text-xl lg:text-2xl text-emerald-600"></i>
                        </div>
                        <div class="ms-5 w-0 flex-1">
                            <dl>
                                <dt class="text-xs sm:text-sm font-medium text-gray-500 dark:text-gray-400 truncate">
                                    {{ __('dashboard.payment_total_last_month') }}
                                </dt>
                                <dd class="text-sm sm:text-base lg:text-lg font-medium text-gray-900 dark:text-white">
                                    ${{ number_format(\App\Models\InvoicePayment::whereMonth('date', now()->subMonth()->month)->whereYear('date', now()->subMonth()->year)->sum('amount'), 2) }}
                                </dd>
                            </dl>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Expenses -->
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow rounded-lg">
                <div class="p-3 sm:p-4 lg:p-5">
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <i class="fas fa-receipt text-lg sm:text-xl lg:text-2xl text-red-600"></i>
                        </div>
                        <div class="ms-5 w-0 flex-1">
                            <dl>
                                <dt class="text-xs sm:text-sm font-medium text-gray-500 dark:text-gray-400 truncate">
                                    {{ __('dashboard.expenses_last_month') }}
                                </dt>
                                <dd class="text-sm sm:text-base lg:text-lg font-medium text-gray-900 dark:text-white">
                                    {{ \App\Models\Expense::whereMonth('date', now()->subMonth()->month)->whereYear('date', now()->subMonth()->year)->count() }}
                                </dd>
                            </dl>
                        </div>
                    </div>
                </div>
            </div>

            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow rounded-lg">
                <div class="p-3 sm:p-4 lg:p-5">
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <i class="fas fa-minus-circle text-lg sm:text-xl lg:text-2xl text-orange-600"></i>
                        </div>
                        <div class="ms-5 w-0 flex-1">
                            <dl>
                                <dt class="text-xs sm:text-sm font-medium text-gray-500 dark:text-gray-400 truncate">
                                    {{ __('dashboard.expense_total_last_month') }}
                                </dt>
                                <dd class="text-sm sm:text-base lg:text-lg font-medium text-gray-900 dark:text-white">
                                    ${{ number_format(\App\Models\Expense::whereMonth('date', now()->subMonth()->month)->whereYear('date', now()->subMonth()->year)->sum('amount'), 2) }}
                                </dd>
                            </dl>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Last 3 Months Stats -->
    <div id="last-3-months" class="period-stats hidden">
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-6 gap-3 sm:gap-4 lg:gap-6 mb-8">
            <!-- Invoices -->
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow rounded-lg">
                <div class="p-3 sm:p-4 lg:p-5">
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <i class="fas fa-file-invoice text-lg sm:text-xl lg:text-2xl text-blue-600"></i>
                        </div>
                        <div class="ms-3 sm:ms-4 lg:ms-5 w-0 flex-1">
                            <dl>
                                <dt class="text-xs sm:text-sm font-medium text-gray-500 dark:text-gray-400 truncate">
                                    {{ __('dashboard.invoices_last_3_months') }}
                                </dt>
                                <dd class="text-sm sm:text-base lg:text-lg font-medium text-gray-900 dark:text-white">
                                    {{ \App\Models\Invoice::where('date', '>=', now()->subMonths(3)->startOfMonth())->count() }}
                                </dd>
                            </dl>
                        </div>
                    </div>
                </div>
            </div>

            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow rounded-lg">
                <div class="p-3 sm:p-4 lg:p-5">
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <i class="fas fa-dollar-sign text-lg sm:text-xl lg:text-2xl text-green-600"></i>
                        </div>
                        <div class="ms-5 w-0 flex-1">
                            <dl>
                                <dt class="text-xs sm:text-sm font-medium text-gray-500 dark:text-gray-400 truncate">
                                    {{ __('dashboard.invoice_total_last_3_months') }}
                                </dt>
                                <dd class="text-sm sm:text-base lg:text-lg font-medium text-gray-900 dark:text-white">
                                    ${{ number_format(\App\Models\Invoice::where('date', '>=', now()->subMonths(3)->startOfMonth())->sum('total_amount'), 2) }}
                                </dd>
                            </dl>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Payments -->
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow rounded-lg">
                <div class="p-3 sm:p-4 lg:p-5">
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <i class="fas fa-credit-card text-lg sm:text-xl lg:text-2xl text-purple-600"></i>
                        </div>
                        <div class="ms-5 w-0 flex-1">
                            <dl>
                                <dt class="text-xs sm:text-sm font-medium text-gray-500 dark:text-gray-400 truncate">
                                    {{ __('dashboard.payments_last_3_months') }}
                                </dt>
                                <dd class="text-sm sm:text-base lg:text-lg font-medium text-gray-900 dark:text-white">
                                    {{ \App\Models\InvoicePayment::where('date', '>=', now()->subMonths(3)->startOfMonth())->count() }}
                                </dd>
                            </dl>
                        </div>
                    </div>
                </div>
            </div>

            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow rounded-lg">
                <div class="p-3 sm:p-4 lg:p-5">
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <i class="fas fa-money-bill-wave text-lg sm:text-xl lg:text-2xl text-emerald-600"></i>
                        </div>
                        <div class="ms-5 w-0 flex-1">
                            <dl>
                                <dt class="text-xs sm:text-sm font-medium text-gray-500 dark:text-gray-400 truncate">
                                    {{ __('dashboard.payment_total_last_3_months') }}
                                </dt>
                                <dd class="text-sm sm:text-base lg:text-lg font-medium text-gray-900 dark:text-white">
                                    ${{ number_format(\App\Models\InvoicePayment::where('date', '>=', now()->subMonths(3)->startOfMonth())->sum('amount'), 2) }}
                                </dd>
                            </dl>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Expenses -->
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow rounded-lg">
                <div class="p-3 sm:p-4 lg:p-5">
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <i class="fas fa-receipt text-lg sm:text-xl lg:text-2xl text-red-600"></i>
                        </div>
                        <div class="ms-5 w-0 flex-1">
                            <dl>
                                <dt class="text-xs sm:text-sm font-medium text-gray-500 dark:text-gray-400 truncate">
                                    {{ __('dashboard.expenses_last_3_months') }}
                                </dt>
                                <dd class="text-sm sm:text-base lg:text-lg font-medium text-gray-900 dark:text-white">
                                    {{ \App\Models\Expense::where('date', '>=', now()->subMonths(3)->startOfMonth())->count() }}
                                </dd>
                            </dl>
                        </div>
                    </div>
                </div>
            </div>

            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow rounded-lg">
                <div class="p-3 sm:p-4 lg:p-5">
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <i class="fas fa-minus-circle text-lg sm:text-xl lg:text-2xl text-orange-600"></i>
                        </div>
                        <div class="ms-5 w-0 flex-1">
                            <dl>
                                <dt class="text-xs sm:text-sm font-medium text-gray-500 dark:text-gray-400 truncate">
                                    {{ __('dashboard.expense_total_last_3_months') }}
                                </dt>
                                <dd class="text-sm sm:text-base lg:text-lg font-medium text-gray-900 dark:text-white">
                                    ${{ number_format(\App\Models\Expense::where('date', '>=', now()->subMonths(3)->startOfMonth())->sum('amount'), 2) }}
                                </dd>
                            </dl>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Current Year Stats -->
    <div id="current-year" class="period-stats hidden">
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-6 gap-3 sm:gap-4 lg:gap-6 mb-8">
            <!-- Invoices -->
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow rounded-lg">
                <div class="p-3 sm:p-4 lg:p-5">
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <i class="fas fa-file-invoice text-lg sm:text-xl lg:text-2xl text-blue-600"></i>
                        </div>
                        <div class="ms-3 sm:ms-4 lg:ms-5 w-0 flex-1">
                            <dl>
                                <dt class="text-xs sm:text-sm font-medium text-gray-500 dark:text-gray-400 truncate">
                                    {{ __('dashboard.invoices_this_year') }}
                                </dt>
                                <dd class="text-sm sm:text-base lg:text-lg font-medium text-gray-900 dark:text-white">
                                    {{ \App\Models\Invoice::whereYear('date', now()->year)->count() }}
                                </dd>
                            </dl>
                        </div>
                    </div>
                </div>
            </div>

            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow rounded-lg">
                <div class="p-3 sm:p-4 lg:p-5">
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <i class="fas fa-dollar-sign text-lg sm:text-xl lg:text-2xl text-green-600"></i>
                        </div>
                        <div class="ms-5 w-0 flex-1">
                            <dl>
                                <dt class="text-xs sm:text-sm font-medium text-gray-500 dark:text-gray-400 truncate">
                                    {{ __('dashboard.invoice_total_this_year') }}
                                </dt>
                                <dd class="text-sm sm:text-base lg:text-lg font-medium text-gray-900 dark:text-white">
                                    ${{ number_format(\App\Models\Invoice::whereYear('date', now()->year)->sum('total_amount'), 2) }}
                                </dd>
                            </dl>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Payments -->
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow rounded-lg">
                <div class="p-3 sm:p-4 lg:p-5">
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <i class="fas fa-credit-card text-lg sm:text-xl lg:text-2xl text-purple-600"></i>
                        </div>
                        <div class="ms-5 w-0 flex-1">
                            <dl>
                                <dt class="text-xs sm:text-sm font-medium text-gray-500 dark:text-gray-400 truncate">
                                    {{ __('dashboard.payments_this_year') }}
                                </dt>
                                <dd class="text-sm sm:text-base lg:text-lg font-medium text-gray-900 dark:text-white">
                                    {{ \App\Models\InvoicePayment::whereYear('date', now()->year)->count() }}
                                </dd>
                            </dl>
                        </div>
                    </div>
                </div>
            </div>

            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow rounded-lg">
                <div class="p-3 sm:p-4 lg:p-5">
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <i class="fas fa-money-bill-wave text-lg sm:text-xl lg:text-2xl text-emerald-600"></i>
                        </div>
                        <div class="ms-5 w-0 flex-1">
                            <dl>
                                <dt class="text-xs sm:text-sm font-medium text-gray-500 dark:text-gray-400 truncate">
                                    {{ __('dashboard.payment_total_this_year') }}
                                </dt>
                                <dd class="text-sm sm:text-base lg:text-lg font-medium text-gray-900 dark:text-white">
                                    ${{ number_format(\App\Models\InvoicePayment::whereYear('date', now()->year)->sum('amount'), 2) }}
                                </dd>
                            </dl>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Expenses -->
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow rounded-lg">
                <div class="p-3 sm:p-4 lg:p-5">
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <i class="fas fa-receipt text-lg sm:text-xl lg:text-2xl text-red-600"></i>
                        </div>
                        <div class="ms-5 w-0 flex-1">
                            <dl>
                                <dt class="text-xs sm:text-sm font-medium text-gray-500 dark:text-gray-400 truncate">
                                    {{ __('dashboard.expenses_this_year') }}
                                </dt>
                                <dd class="text-sm sm:text-base lg:text-lg font-medium text-gray-900 dark:text-white">
                                    {{ \App\Models\Expense::whereYear('date', now()->year)->count() }}
                                </dd>
                            </dl>
                        </div>
                    </div>
                </div>
            </div>

            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow rounded-lg">
                <div class="p-3 sm:p-4 lg:p-5">
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <i class="fas fa-minus-circle text-lg sm:text-xl lg:text-2xl text-orange-600"></i>
                        </div>
                        <div class="ms-5 w-0 flex-1">
                            <dl>
                                <dt class="text-xs sm:text-sm font-medium text-gray-500 dark:text-gray-400 truncate">
                                    {{ __('dashboard.expense_total_this_year') }}
                                </dt>
                                <dd class="text-sm sm:text-base lg:text-lg font-medium text-gray-900 dark:text-white">
                                    ${{ number_format(\App\Models\Expense::whereYear('date', now()->year)->sum('amount'), 2) }}
                                </dd>
                            </dl>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Last Year Stats -->
    <div id="last-year" class="period-stats hidden">
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-6 gap-3 sm:gap-4 lg:gap-6 mb-8">
            <!-- Invoices -->
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow rounded-lg">
                <div class="p-3 sm:p-4 lg:p-5">
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <i class="fas fa-file-invoice text-lg sm:text-xl lg:text-2xl text-blue-600"></i>
                        </div>
                        <div class="ms-3 sm:ms-4 lg:ms-5 w-0 flex-1">
                            <dl>
                                <dt class="text-xs sm:text-sm font-medium text-gray-500 dark:text-gray-400 truncate">
                                    {{ __('dashboard.invoices_last_year') }}
                                </dt>
                                <dd class="text-sm sm:text-base lg:text-lg font-medium text-gray-900 dark:text-white">
                                    {{ \App\Models\Invoice::whereYear('date', now()->subYear()->year)->count() }}
                                </dd>
                            </dl>
                        </div>
                    </div>
                </div>
            </div>

            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow rounded-lg">
                <div class="p-3 sm:p-4 lg:p-5">
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <i class="fas fa-dollar-sign text-lg sm:text-xl lg:text-2xl text-green-600"></i>
                        </div>
                        <div class="ms-5 w-0 flex-1">
                            <dl>
                                <dt class="text-xs sm:text-sm font-medium text-gray-500 dark:text-gray-400 truncate">
                                    {{ __('dashboard.invoice_total_last_year') }}
                                </dt>
                                <dd class="text-sm sm:text-base lg:text-lg font-medium text-gray-900 dark:text-white">
                                    ${{ number_format(\App\Models\Invoice::whereYear('date', now()->subYear()->year)->sum('total_amount'), 2) }}
                                </dd>
                            </dl>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Payments -->
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow rounded-lg">
                <div class="p-3 sm:p-4 lg:p-5">
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <i class="fas fa-credit-card text-lg sm:text-xl lg:text-2xl text-purple-600"></i>
                        </div>
                        <div class="ms-5 w-0 flex-1">
                            <dl>
                                <dt class="text-xs sm:text-sm font-medium text-gray-500 dark:text-gray-400 truncate">
                                    {{ __('dashboard.payments_last_year') }}
                                </dt>
                                <dd class="text-sm sm:text-base lg:text-lg font-medium text-gray-900 dark:text-white">
                                    {{ \App\Models\InvoicePayment::whereYear('date', now()->subYear()->year)->count() }}
                                </dd>
                            </dl>
                        </div>
                    </div>
                </div>
            </div>

            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow rounded-lg">
                <div class="p-3 sm:p-4 lg:p-5">
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <i class="fas fa-money-bill-wave text-lg sm:text-xl lg:text-2xl text-emerald-600"></i>
                        </div>
                        <div class="ms-5 w-0 flex-1">
                            <dl>
                                <dt class="text-xs sm:text-sm font-medium text-gray-500 dark:text-gray-400 truncate">
                                    {{ __('dashboard.payment_total_last_year') }}
                                </dt>
                                <dd class="text-sm sm:text-base lg:text-lg font-medium text-gray-900 dark:text-white">
                                    ${{ number_format(\App\Models\InvoicePayment::whereYear('date', now()->subYear()->year)->sum('amount'), 2) }}
                                </dd>
                            </dl>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Expenses -->
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow rounded-lg">
                <div class="p-3 sm:p-4 lg:p-5">
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <i class="fas fa-receipt text-lg sm:text-xl lg:text-2xl text-red-600"></i>
                        </div>
                        <div class="ms-5 w-0 flex-1">
                            <dl>
                                <dt class="text-xs sm:text-sm font-medium text-gray-500 dark:text-gray-400 truncate">
                                    {{ __('dashboard.expenses_last_year') }}
                                </dt>
                                <dd class="text-sm sm:text-base lg:text-lg font-medium text-gray-900 dark:text-white">
                                    {{ \App\Models\Expense::whereYear('date', now()->subYear()->year)->count() }}
                                </dd>
                            </dl>
                        </div>
                    </div>
                </div>
            </div>

            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow rounded-lg">
                <div class="p-3 sm:p-4 lg:p-5">
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <i class="fas fa-minus-circle text-lg sm:text-xl lg:text-2xl text-orange-600"></i>
                        </div>
                        <div class="ms-5 w-0 flex-1">
                            <dl>
                                <dt class="text-xs sm:text-sm font-medium text-gray-500 dark:text-gray-400 truncate">
                                    {{ __('dashboard.expense_total_last_year') }}
                                </dt>
                                <dd class="text-sm sm:text-base lg:text-lg font-medium text-gray-900 dark:text-white">
                                    ${{ number_format(\App\Models\Expense::whereYear('date', now()->subYear()->year)->sum('amount'), 2) }}
                                </dd>
                            </dl>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Recent Invoices and Expenses -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
        <!-- Recent Invoices -->
        <div class="bg-white dark:bg-gray-800 shadow rounded-lg">
            <div class="px-4 py-5 sm:p-6">
                <div class="flex items-center justify-between mb-4">
                    <h3 class="text-lg font-medium text-gray-900 dark:text-white">
                        {{ __('dashboard.recent_invoices') }}
                    </h3>
                    <a href="{{ route('invoices.index') }}" class="text-blue-600 hover:text-blue-900 dark:text-blue-400 dark:hover:text-blue-300 text-sm font-medium">
                        {{ __('dashboard.view_all') }}
                    </a>
                </div>
                
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                        <thead class="bg-gray-50 dark:bg-gray-700">
                            <tr>
                                <th class="px-6 py-3 text-start text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                    {{ __('invoice.invoice_number') }}
                                </th>
                                <th class="px-6 py-3 text-start text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                    {{ __('invoice.client_name') }}
                                </th>
                                <th class="px-6 py-3 text-start text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                    {{ __('invoice.date') }}
                                </th>
                                <th class="px-6 py-3 text-start text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                    {{ __('invoice.total_amount') }}
                                </th>
                                <th class="px-6 py-3 text-start text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                    {{ __('invoice.status') }}
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-200 dark:divide-gray-700">
                            @forelse(\App\Models\Invoice::with(['items', 'payments'])->latest()->take(5)->get() as $invoice)
                                <tr class="hover:bg-gray-50 dark:hover:bg-gray-700">
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 dark:text-gray-100">
                                        <a href="{{ route('invoices.show', $invoice) }}" class="text-blue-600 hover:text-blue-900 dark:text-blue-400 dark:hover:text-blue-300">
                                            #{{ $invoice->id }}
                                        </a>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-300">
                                        {{ $invoice->client_name }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-300">
                                        {{ $invoice->date->format('M d, Y') }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-300">
                                        ${{ number_format($invoice->total_after_discount, 2) }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        @if($invoice->is_fully_paid)
                                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-300">
                                                <i class="fas fa-check-circle me-1"></i>
                                                {{ __('invoice.paid') }}
                                            </span>
                                        @else
                                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-yellow-100 text-yellow-800 dark:bg-yellow-900 dark:text-yellow-300">
                                                <i class="fas fa-clock me-1"></i>
                                                {{ __('invoice.outstanding') }}
                                            </span>
                                        @endif
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="px-6 py-4 text-center text-gray-500 dark:text-gray-300">
                                        {{ __('dashboard.no_invoices_yet') }}
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Recent Expenses -->
        <div class="bg-white dark:bg-gray-800 shadow rounded-lg">
            <div class="px-4 py-5 sm:p-6">
                <div class="flex items-center justify-between mb-4">
                    <h3 class="text-lg font-medium text-gray-900 dark:text-white">
                        {{ __('dashboard.recent_expenses') }}
                    </h3>
                    <a href="{{ route('expenses.index') }}" class="text-red-600 hover:text-red-900 dark:text-red-400 dark:hover:text-red-300 text-sm font-medium">
                        {{ __('dashboard.view_all') }}
                    </a>
                </div>
                
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                        <thead class="bg-gray-50 dark:bg-gray-700">
                            <tr>
                                <th class="px-6 py-3 text-start text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                    {{ __('expenses.reference') }}
                                </th>
                                <th class="px-6 py-3 text-start text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                    {{ __('expenses.description') }}
                                </th>
                                <th class="px-6 py-3 text-start text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                    {{ __('expenses.date') }}
                                </th>
                                <th class="px-6 py-3 text-start text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                    {{ __('expenses.amount') }}
                                </th>
                                <th class="px-6 py-3 text-start text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                    {{ __('expenses.is_confirmed') }}
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-200 dark:divide-gray-700">
                            @forelse(\App\Models\Expense::latest()->take(5)->get() as $expense)
                                <tr class="hover:bg-gray-50 dark:hover:bg-gray-700">
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 dark:text-gray-100">
                                        <a href="{{ route('expenses.show', $expense) }}" class="text-red-600 hover:text-red-900 dark:text-red-400 dark:hover:text-red-300">
                                            {{ $expense->reference ?: '#' . $expense->id }}
                                        </a>
                                    </td>
                                    <td class="px-6 py-4 text-sm text-gray-500 dark:text-gray-300">
                                        {{ Str::limit($expense->description, 30) ?: '-' }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-300">
                                        {{ $expense->date->format('M d, Y') }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-red-600 dark:text-red-400">
                                        -${{ number_format($expense->amount, 2) }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        @if($expense->is_confirmed)
                                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-200">
                                                <i class="fas fa-check-circle me-1"></i>
                                                {{ __('expenses.is_confirmed') }}
                                            </span>
                                        @else
                                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-yellow-100 text-yellow-800 dark:bg-yellow-900 dark:text-yellow-200">
                                                <i class="fas fa-clock me-1"></i>
                                                {{ __('common.pending') }}
                                            </span>
                                        @endif
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="px-6 py-4 text-center text-gray-500 dark:text-gray-300">
                                        {{ __('dashboard.no_expenses_yet') }}
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script>
        function showPeriod(period) {
            // Hide all period stats
            document.querySelectorAll('.period-stats').forEach(function(element) {
                element.classList.add('hidden');
            });
            
            // Remove active class from all buttons
            document.querySelectorAll('.period-btn').forEach(function(button) {
                button.classList.remove('active', 'bg-blue-600', 'text-white');
                button.classList.add('bg-gray-200', 'dark:bg-gray-700', 'text-gray-700', 'dark:text-gray-300');
            });
            
            // Show selected period
            document.getElementById(period).classList.remove('hidden');
            
            // Add active class to clicked button
            event.target.classList.add('active', 'bg-blue-600', 'text-white');
            event.target.classList.remove('bg-gray-200', 'dark:bg-gray-700', 'text-gray-700', 'dark:text-gray-300');
        }
    </script>
</x-layouts.app>