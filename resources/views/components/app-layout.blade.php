<!DOCTYPE html>
<html lang="{{ $currentLocale }}" dir="{{ $isRTL ? 'rtl' : 'ltr' }}" class="{{ $currentTheme === 'dark' ? 'dark' : '' }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    
    <!-- FontAwesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <style>
        [dir="rtl"] {
            text-align: right;
        }
        [dir="rtl"] .rtl\:space-x-reverse > :not([hidden]) ~ :not([hidden]) {
            --tw-space-x-reverse: 1;
        }
    </style>
</head>
<body class="font-sans antialiased bg-gray-50 dark:bg-gray-900">
    <div class="min-h-screen">
        <!-- Desktop Sidebar -->
        <div class="hidden lg:fixed lg:inset-y-0 lg:z-50 lg:flex lg:w-72 lg:flex-col">
            <div class="flex grow flex-col gap-y-5 overflow-y-auto bg-white dark:bg-gray-800 px-6 pb-4 shadow-lg">
                <div class="flex h-16 shrink-0 items-center">
                    <h1 class="text-xl font-bold text-gray-900 dark:text-white">
                        <i class="fas fa-file-invoice-dollar me-2"></i>
                        {{ __('common.invoices') }}
                    </h1>
                </div>
                <nav class="flex flex-1 flex-col">
                    <ul role="list" class="flex flex-1 flex-col gap-y-7">
                        <li>
                            <ul role="list" class="-mx-2 space-y-1">
                                <li>
                                    <a href="{{ route('dashboard') }}" class="group flex gap-x-3 rounded-md p-2 text-sm leading-6 font-semibold {{ request()->routeIs('dashboard') ? 'bg-gray-50 dark:bg-gray-700 text-gray-900 dark:text-white' : 'text-gray-700 dark:text-gray-300 hover:text-gray-900 dark:hover:text-white hover:bg-gray-50 dark:hover:bg-gray-700' }}">
                                        <i class="fas fa-home h-6 w-6 shrink-0"></i>
                                        {{ __('common.dashboard') }}
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('invoices.index') }}" class="group flex gap-x-3 rounded-md p-2 text-sm leading-6 font-semibold {{ request()->routeIs('invoices.*') ? 'bg-gray-50 dark:bg-gray-700 text-gray-900 dark:text-white' : 'text-gray-700 dark:text-gray-300 hover:text-gray-900 dark:hover:text-white hover:bg-gray-50 dark:hover:bg-gray-700' }}">
                                        <i class="fas fa-file-invoice h-6 w-6 shrink-0"></i>
                                        {{ __('common.invoices') }}
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('services.index') }}" class="group flex gap-x-3 rounded-md p-2 text-sm leading-6 font-semibold {{ request()->routeIs('services.*') ? 'bg-gray-50 dark:bg-gray-700 text-gray-900 dark:text-white' : 'text-gray-700 dark:text-gray-300 hover:text-gray-900 dark:hover:text-white hover:bg-gray-50 dark:hover:bg-gray-700' }}">
                                        <i class="fas fa-tools h-6 w-6 shrink-0"></i>
                                        {{ __('common.services') }}
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('invoice-payments.index') }}" class="group flex gap-x-3 rounded-md p-2 text-sm leading-6 font-semibold {{ request()->routeIs('invoice-payments.*') ? 'bg-gray-50 dark:bg-gray-700 text-gray-900 dark:text-white' : 'text-gray-700 dark:text-gray-300 hover:text-gray-900 dark:hover:text-white hover:bg-gray-50 dark:hover:bg-gray-700' }}">
                                        <i class="fas fa-credit-card h-6 w-6 shrink-0"></i>
                                        {{ __('common.payments') }}
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('expenses.index') }}" class="group flex gap-x-3 rounded-md p-2 text-sm leading-6 font-semibold {{ request()->routeIs('expenses.*') ? 'bg-gray-50 dark:bg-gray-700 text-gray-900 dark:text-white' : 'text-gray-700 dark:text-gray-300 hover:text-gray-900 dark:hover:text-white hover:bg-gray-50 dark:hover:bg-gray-700' }}">
                                        <i class="fas fa-receipt h-6 w-6 shrink-0"></i>
                                        {{ __('expenses.title') }}
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="mt-auto">
                            <div class="space-y-2">
                                <!-- Language Switcher -->
                                <div class="relative">
                                    <form method="POST" action="{{ route('language.switch') }}" class="inline">
                                        @csrf
                                        <select name="language" onchange="this.form.submit()" class="w-full rounded-md border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white text-sm">
                                            <option value="en" {{ $currentLocale === 'en' ? 'selected' : '' }}>🇺🇸 English</option>
                                            <option value="ar" {{ $currentLocale === 'ar' ? 'selected' : '' }}>🇸🇦 العربية</option>
                                            <option value="es" {{ $currentLocale === 'es' ? 'selected' : '' }}>🇪🇸 Español</option>
                                            <option value="nl" {{ $currentLocale === 'nl' ? 'selected' : '' }}>🇳🇱 Nederlands</option>
                                        </select>
                                    </form>
                                </div>
                                
                                <!-- Theme Switcher -->
                                <form method="POST" action="{{ route('theme.switch') }}" class="inline">
                                    @csrf
                                    <button type="submit" name="theme" value="{{ $currentTheme === 'dark' ? 'light' : 'dark' }}" class="w-full flex items-center justify-center gap-x-2 rounded-md bg-gray-50 dark:bg-gray-700 px-3 py-2 text-sm font-semibold text-gray-900 dark:text-white shadow-sm hover:bg-gray-100 dark:hover:bg-gray-600">
                                        <i class="fas {{ $currentTheme === 'dark' ? 'fa-sun' : 'fa-moon' }}"></i>
                                        {{ $currentTheme === 'dark' ? __('common.light_mode') : __('common.dark_mode') }}
                                    </button>
                                </form>
                                
                                <!-- User Menu -->
                                <div class="relative">
                                    <div class="flex items-center gap-x-4 px-6 py-3 text-sm font-semibold leading-6 text-gray-900 dark:text-white">
                                        <div class="h-8 w-8 rounded-full bg-gray-200 dark:bg-gray-600 flex items-center justify-center">
                                            <i class="fas fa-user"></i>
                                        </div>
                                        <span class="sr-only">Your profile</span>
                                        <span>{{ auth()->user()->name }}</span>
                                    </div>
                                    <form method="POST" action="{{ route('logout') }}" class="w-full">
                                        @csrf
                                        <button type="submit" class="w-full flex items-center gap-x-2 rounded-md px-3 py-2 text-sm font-semibold text-gray-700 dark:text-gray-300 hover:bg-gray-50 dark:hover:bg-gray-700">
                                            <i class="fas fa-sign-out-alt"></i>
                                            {{ __('common.logout') }}
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>

        <!-- Mobile menu button -->
        <div class="sticky top-0 z-40 flex h-16 shrink-0 items-center gap-x-4 border-b border-gray-200 dark:border-gray-700 bg-white dark:bg-gray-800 px-4 shadow-sm sm:gap-x-6 sm:px-6 lg:hidden">
            <button type="button" class="-m-2.5 p-2.5 text-gray-700 dark:text-gray-300 lg:hidden" onclick="toggleMobileMenu()">
                <span class="sr-only">Open sidebar</span>
                <i class="fas fa-bars h-6 w-6" aria-hidden="true"></i>
            </button>
            
            <div class="flex flex-1 gap-x-4 self-stretch lg:gap-x-6">
                <div class="flex flex-1"></div>
                <div class="flex items-center gap-x-4 lg:gap-x-6">
                    <!-- Mobile Language Switcher -->
                    <form method="POST" action="{{ route('language.switch') }}" class="inline">
                        @csrf
                        <select name="language" onchange="this.form.submit()" class="rounded-md border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white text-sm">
                            <option value="en" {{ $currentLocale === 'en' ? 'selected' : '' }}>🇺🇸</option>
                            <option value="ar" {{ $currentLocale === 'ar' ? 'selected' : '' }}>🇸🇦</option>
                            <option value="es" {{ $currentLocale === 'es' ? 'selected' : '' }}>🇪🇸</option>
                            <option value="nl" {{ $currentLocale === 'nl' ? 'selected' : '' }}>🇳🇱</option>
                        </select>
                    </form>
                    
                    <!-- Mobile Theme Switcher -->
                    <form method="POST" action="{{ route('theme.switch') }}" class="inline">
                        @csrf
                        <button type="submit" name="theme" value="{{ $currentTheme === 'dark' ? 'light' : 'dark' }}" class="rounded-md bg-gray-50 dark:bg-gray-700 p-2 text-gray-400 hover:text-gray-500 dark:hover:text-gray-300">
                            <i class="fas {{ $currentTheme === 'dark' ? 'fa-sun' : 'fa-moon' }} h-5 w-5"></i>
                        </button>
                    </form>
                </div>
            </div>
        </div>

        <!-- Mobile sidebar -->
        <div id="mobile-menu" class="fixed inset-0 z-50 lg:hidden hidden">
            <div class="fixed inset-0 bg-gray-900/80" onclick="toggleMobileMenu()"></div>
            <div class="fixed inset-y-0 start-0 z-50 w-full overflow-y-auto bg-white dark:bg-gray-800 px-6 py-6 sm:max-w-sm sm:ring-1 sm:ring-gray-900/10 dark:sm:ring-gray-100/10">
                <div class="flex items-center justify-between">
                    <h1 class="text-xl font-bold text-gray-900 dark:text-white">
                        <i class="fas fa-file-invoice-dollar me-2"></i>
                        {{ __('common.invoices') }}
                    </h1>
                    <button type="button" class="-m-2.5 rounded-md p-2.5 text-gray-700 dark:text-gray-300" onclick="toggleMobileMenu()">
                        <span class="sr-only">Close menu</span>
                        <i class="fas fa-times h-6 w-6" aria-hidden="true"></i>
                    </button>
                </div>
                <div class="mt-6 flow-root">
                    <div class="-my-6 divide-y divide-gray-500/10 dark:divide-gray-400/10">
                        <div class="space-y-2 py-6">
                            <a href="{{ route('dashboard') }}" class="-mx-3 block rounded-lg px-3 py-2 text-base font-semibold leading-7 text-gray-900 dark:text-white hover:bg-gray-50 dark:hover:bg-gray-700">
                                <i class="fas fa-home me-2"></i>
                                {{ __('common.dashboard') }}
                            </a>
                            <a href="{{ route('invoices.index') }}" class="-mx-3 block rounded-lg px-3 py-2 text-base font-semibold leading-7 text-gray-900 dark:text-white hover:bg-gray-50 dark:hover:bg-gray-700">
                                <i class="fas fa-file-invoice me-2"></i>
                                {{ __('common.invoices') }}
                            </a>
                            <a href="{{ route('services.index') }}" class="-mx-3 block rounded-lg px-3 py-2 text-base font-semibold leading-7 text-gray-900 dark:text-white hover:bg-gray-50 dark:hover:bg-gray-700">
                                <i class="fas fa-tools me-2"></i>
                                {{ __('common.services') }}
                            </a>
                            <a href="{{ route('invoice-payments.index') }}" class="-mx-3 block rounded-lg px-3 py-2 text-base font-semibold leading-7 text-gray-900 dark:text-white hover:bg-gray-50 dark:hover:bg-gray-700">
                                <i class="fas fa-credit-card me-2"></i>
                                {{ __('common.payments') }}
                            </a>
                            <a href="{{ route('expenses.index') }}" class="-mx-3 block rounded-lg px-3 py-2 text-base font-semibold leading-7 text-gray-900 dark:text-white hover:bg-gray-50 dark:hover:bg-gray-700">
                                <i class="fas fa-receipt me-2"></i>
                                {{ __('expenses.title') }}
                            </a>
                        </div>
                        <div class="py-6">
                            <div class="flex items-center gap-x-4 px-3 py-3 text-base font-semibold leading-7 text-gray-900 dark:text-white">
                                <div class="h-8 w-8 rounded-full bg-gray-200 dark:bg-gray-600 flex items-center justify-center">
                                    <i class="fas fa-user"></i>
                                </div>
                                {{ auth()->user()->name }}
                            </div>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="-mx-3 block rounded-lg px-3 py-2 text-base font-semibold leading-7 text-gray-700 dark:text-gray-300 hover:bg-gray-50 dark:hover:bg-gray-700 w-full text-start">
                                    <i class="fas fa-sign-out-alt me-2"></i>
                                    {{ __('common.logout') }}
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Main content -->
        <div class="lg:ps-72">
            <main class="py-10">
                <div class="px-4 sm:px-6 lg:px-8">
                    {{ $slot }}
                </div>
            </main>
        </div>

        <!-- Bottom Mobile Navigation -->
        <div class="lg:hidden fixed bottom-0 start-0 end-0 bg-white dark:bg-gray-800 border-t border-gray-200 dark:border-gray-700 px-4 py-2">
            <div class="flex justify-around">
                <a href="{{ route('dashboard') }}" class="flex flex-col items-center py-2 px-3 {{ request()->routeIs('dashboard') ? 'text-blue-600 dark:text-blue-400' : 'text-gray-500 dark:text-gray-400' }}">
                    <i class="fas fa-home text-xl mb-1"></i>
                    <span class="text-xs">{{ __('common.dashboard') }}</span>
                </a>
                <a href="{{ route('invoices.index') }}" class="flex flex-col items-center py-2 px-3 {{ request()->routeIs('invoices.*') ? 'text-blue-600 dark:text-blue-400' : 'text-gray-500 dark:text-gray-400' }}">
                    <i class="fas fa-file-invoice text-xl mb-1"></i>
                    <span class="text-xs">{{ __('common.invoices') }}</span>
                </a>
                <a href="{{ route('services.index') }}" class="flex flex-col items-center py-2 px-3 {{ request()->routeIs('services.*') ? 'text-blue-600 dark:text-blue-400' : 'text-gray-500 dark:text-gray-400' }}">
                    <i class="fas fa-tools text-xl mb-1"></i>
                    <span class="text-xs">{{ __('common.services') }}</span>
                </a>
                <a href="{{ route('invoice-payments.index') }}" class="flex flex-col items-center py-2 px-3 {{ request()->routeIs('invoice-payments.*') ? 'text-blue-600 dark:text-blue-400' : 'text-gray-500 dark:text-gray-400' }}">
                    <i class="fas fa-credit-card text-xl mb-1"></i>
                    <span class="text-xs">{{ __('common.payments') }}</span>
                </a>
                <a href="{{ route('expenses.index') }}" class="flex flex-col items-center py-2 px-3 {{ request()->routeIs('expenses.*') ? 'text-blue-600 dark:text-blue-400' : 'text-gray-500 dark:text-gray-400' }}">
                    <i class="fas fa-receipt text-xl mb-1"></i>
                    <span class="text-xs">{{ __('expenses.title') }}</span>
                </a>
            </div>
        </div>

        <!-- Add bottom padding for mobile navigation -->
        <div class="lg:hidden h-20"></div>
    </div>

    <script>
        function toggleMobileMenu() {
            const menu = document.getElementById('mobile-menu');
            menu.classList.toggle('hidden');
        }
    </script>
</body>
</html>
