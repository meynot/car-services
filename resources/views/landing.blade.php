<!DOCTYPE html>
<html lang="{{ $currentLocale ?? 'en' }}" dir="{{ $isRTL ?? false ? 'rtl' : 'ltr' }}" class="{{ $currentTheme ?? 'light' === 'dark' ? 'dark' : '' }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'AutoCare Pro') }} - Professional Car Services</title>
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700&display=swap" rel="stylesheet" />
    
    <!-- FontAwesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <style>
        /* Custom styles for landing page */
        .hero-gradient {
            background: linear-gradient(135deg, #1e3a8a 0%, #3b82f6 50%, #06b6d4 100%);
        }
        
        .service-card {
            transition: all 0.3s ease;
        }
        
        .service-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
        }
        
        .floating-animation {
            animation: float 6s ease-in-out infinite;
        }
        
        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-20px); }
        }
        
        .pulse-animation {
            animation: pulse 2s infinite;
        }
        
        /* Responsive breakpoints */
        @media (min-width: 1920px) {
            .container { max-width: 1600px; }
            .hero-title { font-size: 4.5rem; }
            .hero-subtitle { font-size: 1.5rem; }
        }
        
        @media (min-width: 2560px) {
            .container { max-width: 2000px; }
            .hero-title { font-size: 6rem; }
            .hero-subtitle { font-size: 2rem; }
        }
        
        @media (min-width: 3840px) {
            .container { max-width: 3000px; }
            .hero-title { font-size: 8rem; }
            .hero-subtitle { font-size: 2.5rem; }
        }
    </style>
</head>
<body class="font-sans antialiased bg-gray-50 dark:bg-gray-900">
    <!-- Navigation -->
    <nav class="fixed top-0 w-full z-50 bg-white/95 dark:bg-gray-900/95 backdrop-blur-sm border-b border-gray-200 dark:border-gray-700">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-16 lg:h-20">
                <!-- Logo -->
                <div class="flex items-center">
                    <div class="flex-shrink-0">
                        <i class="fas fa-car text-3xl lg:text-4xl text-blue-600"></i>
                    </div>
                    <div class="ml-3">
                        <h1 class="text-xl lg:text-2xl font-bold text-gray-900 dark:text-white">AutoCare Pro</h1>
                    </div>
                </div>
                
                <!-- Desktop Navigation -->
                <div class="hidden lg:flex items-center space-x-8">
                    <a href="#home" class="text-gray-700 dark:text-gray-300 hover:text-blue-600 dark:hover:text-blue-400 transition-colors">Home</a>
                    <a href="#services" class="text-gray-700 dark:text-gray-300 hover:text-blue-600 dark:hover:text-blue-400 transition-colors">Services</a>
                    <a href="#about" class="text-gray-700 dark:text-gray-300 hover:text-blue-600 dark:hover:text-blue-400 transition-colors">About</a>
                    <a href="#contact" class="text-gray-700 dark:text-gray-300 hover:text-blue-600 dark:hover:text-blue-400 transition-colors">Contact</a>
                    <a href="{{ route('login') }}" class="bg-blue-600 text-white px-6 py-2 rounded-lg hover:bg-blue-700 transition-colors">Login</a>
                </div>
                
                <!-- Mobile menu button -->
                <div class="lg:hidden">
                    <button id="mobile-menu-button" class="text-gray-700 dark:text-gray-300 hover:text-blue-600 dark:hover:text-blue-400">
                        <i class="fas fa-bars text-xl"></i>
                    </button>
                </div>
            </div>
        </div>
        
        <!-- Mobile Navigation -->
        <div id="mobile-menu" class="lg:hidden hidden bg-white dark:bg-gray-900 border-t border-gray-200 dark:border-gray-700">
            <div class="px-4 py-2 space-y-2">
                <a href="#home" class="block py-2 text-gray-700 dark:text-gray-300 hover:text-blue-600 dark:hover:text-blue-400">Home</a>
                <a href="#services" class="block py-2 text-gray-700 dark:text-gray-300 hover:text-blue-600 dark:hover:text-blue-400">Services</a>
                <a href="#about" class="block py-2 text-gray-700 dark:text-gray-300 hover:text-blue-600 dark:hover:text-blue-400">About</a>
                <a href="#contact" class="block py-2 text-gray-700 dark:text-gray-300 hover:text-blue-600 dark:hover:text-blue-400">Contact</a>
                <a href="{{ route('login') }}" class="block py-2 bg-blue-600 text-white rounded-lg text-center hover:bg-blue-700">Login</a>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section id="home" class="hero-gradient min-h-screen flex items-center justify-center relative overflow-hidden">
        <!-- Background Elements -->
        <div class="absolute inset-0">
            <div class="absolute top-20 left-10 w-20 h-20 bg-white/10 rounded-full floating-animation"></div>
            <div class="absolute top-40 right-20 w-16 h-16 bg-white/10 rounded-full floating-animation" style="animation-delay: -2s;"></div>
            <div class="absolute bottom-20 left-20 w-24 h-24 bg-white/10 rounded-full floating-animation" style="animation-delay: -4s;"></div>
            <div class="absolute bottom-40 right-10 w-18 h-18 bg-white/10 rounded-full floating-animation" style="animation-delay: -1s;"></div>
        </div>
        
        <div class="container mx-auto px-4 sm:px-6 lg:px-8 text-center relative z-10">
            <div class="max-w-4xl mx-auto">
                <h1 class="hero-title text-4xl sm:text-5xl lg:text-6xl xl:text-7xl font-bold text-white mb-6 leading-tight">
                    Professional Car Services
                    <span class="block text-cyan-300">You Can Trust</span>
                </h1>
                <p class="hero-subtitle text-lg sm:text-xl lg:text-2xl text-white/90 mb-8 max-w-2xl mx-auto">
                    Expert automotive repair, maintenance, and diagnostic services with state-of-the-art equipment and certified technicians.
                </p>
                <div class="flex flex-col sm:flex-row gap-4 justify-center items-center">
                    <a href="#contact" class="bg-white text-blue-600 px-8 py-4 rounded-lg font-semibold text-lg hover:bg-gray-100 transition-colors shadow-lg">
                        <i class="fas fa-phone mr-2"></i>
                        Get Quote Now
                    </a>
                    <a href="#services" class="border-2 border-white text-white px-8 py-4 rounded-lg font-semibold text-lg hover:bg-white hover:text-blue-600 transition-colors">
                        <i class="fas fa-wrench mr-2"></i>
                        Our Services
                    </a>
                </div>
            </div>
        </div>
        
        <!-- Scroll indicator -->
        <div class="absolute bottom-8 left-1/2 transform -translate-x-1/2 text-white animate-bounce">
            <i class="fas fa-chevron-down text-2xl"></i>
        </div>
    </section>

    <!-- Services Section -->
    <section id="services" class="py-16 lg:py-24 bg-white dark:bg-gray-800">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-3xl sm:text-4xl lg:text-5xl font-bold text-gray-900 dark:text-white mb-4">
                    Our Services
                </h2>
                <p class="text-lg sm:text-xl text-gray-600 dark:text-gray-300 max-w-2xl mx-auto">
                    Comprehensive automotive services to keep your vehicle running smoothly and safely.
                </p>
            </div>
            
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6 lg:gap-8">
                <!-- Engine Repair -->
                <div class="service-card bg-white dark:bg-gray-700 p-6 rounded-xl shadow-lg">
                    <div class="text-center">
                        <div class="w-16 h-16 bg-blue-100 dark:bg-blue-900 rounded-full flex items-center justify-center mx-auto mb-4">
                            <i class="fas fa-cog text-2xl text-blue-600"></i>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-2">Engine Repair</h3>
                        <p class="text-gray-600 dark:text-gray-300 text-sm">Complete engine diagnostics, repair, and maintenance services.</p>
                    </div>
                </div>
                
                <!-- Brake Service -->
                <div class="service-card bg-white dark:bg-gray-700 p-6 rounded-xl shadow-lg">
                    <div class="text-center">
                        <div class="w-16 h-16 bg-red-100 dark:bg-red-900 rounded-full flex items-center justify-center mx-auto mb-4">
                            <i class="fas fa-stop-circle text-2xl text-red-600"></i>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-2">Brake Service</h3>
                        <p class="text-gray-600 dark:text-gray-300 text-sm">Brake inspection, repair, and replacement for optimal safety.</p>
                    </div>
                </div>
                
                <!-- Oil Change -->
                <div class="service-card bg-white dark:bg-gray-700 p-6 rounded-xl shadow-lg">
                    <div class="text-center">
                        <div class="w-16 h-16 bg-yellow-100 dark:bg-yellow-900 rounded-full flex items-center justify-center mx-auto mb-4">
                            <i class="fas fa-oil-can text-2xl text-yellow-600"></i>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-2">Oil Change</h3>
                        <p class="text-gray-600 dark:text-gray-300 text-sm">Regular oil changes with premium quality oils and filters.</p>
                    </div>
                </div>
                
                <!-- Tire Service -->
                <div class="service-card bg-white dark:bg-gray-700 p-6 rounded-xl shadow-lg">
                    <div class="text-center">
                        <div class="w-16 h-16 bg-green-100 dark:bg-green-900 rounded-full flex items-center justify-center mx-auto mb-4">
                            <i class="fas fa-circle text-2xl text-green-600"></i>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-2">Tire Service</h3>
                        <p class="text-gray-600 dark:text-gray-300 text-sm">Tire rotation, balancing, alignment, and replacement services.</p>
                    </div>
                </div>
                
                <!-- AC Service -->
                <div class="service-card bg-white dark:bg-gray-700 p-6 rounded-xl shadow-lg">
                    <div class="text-center">
                        <div class="w-16 h-16 bg-cyan-100 dark:bg-cyan-900 rounded-full flex items-center justify-center mx-auto mb-4">
                            <i class="fas fa-snowflake text-2xl text-cyan-600"></i>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-2">AC Service</h3>
                        <p class="text-gray-600 dark:text-gray-300 text-sm">Air conditioning repair, maintenance, and refrigerant services.</p>
                    </div>
                </div>
                
                <!-- Transmission -->
                <div class="service-card bg-white dark:bg-gray-700 p-6 rounded-xl shadow-lg">
                    <div class="text-center">
                        <div class="w-16 h-16 bg-purple-100 dark:bg-purple-900 rounded-full flex items-center justify-center mx-auto mb-4">
                            <i class="fas fa-cogs text-2xl text-purple-600"></i>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-2">Transmission</h3>
                        <p class="text-gray-600 dark:text-gray-300 text-sm">Transmission repair, rebuild, and maintenance services.</p>
                    </div>
                </div>
                
                <!-- Electrical -->
                <div class="service-card bg-white dark:bg-gray-700 p-6 rounded-xl shadow-lg">
                    <div class="text-center">
                        <div class="w-16 h-16 bg-orange-100 dark:bg-orange-900 rounded-full flex items-center justify-center mx-auto mb-4">
                            <i class="fas fa-bolt text-2xl text-orange-600"></i>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-2">Electrical</h3>
                        <p class="text-gray-600 dark:text-gray-300 text-sm">Electrical system diagnosis, repair, and component replacement.</p>
                    </div>
                </div>
                
                <!-- Diagnostics -->
                <div class="service-card bg-white dark:bg-gray-700 p-6 rounded-xl shadow-lg">
                    <div class="text-center">
                        <div class="w-16 h-16 bg-indigo-100 dark:bg-indigo-900 rounded-full flex items-center justify-center mx-auto mb-4">
                            <i class="fas fa-search text-2xl text-indigo-600"></i>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-2">Diagnostics</h3>
                        <p class="text-gray-600 dark:text-gray-300 text-sm">Advanced computer diagnostics and trouble code analysis.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- About Section -->
    <section id="about" class="py-16 lg:py-24 bg-gray-50 dark:bg-gray-900">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                <div>
                    <h2 class="text-3xl sm:text-4xl lg:text-5xl font-bold text-gray-900 dark:text-white mb-6">
                        Why Choose AutoCare Pro?
                    </h2>
                    <p class="text-lg text-gray-600 dark:text-gray-300 mb-8">
                        With over 15 years of experience in automotive repair, we've built a reputation for excellence, reliability, and customer satisfaction. Our certified technicians use the latest diagnostic equipment and genuine parts to ensure your vehicle receives the best care possible.
                    </p>
                    
                    <div class="space-y-6">
                        <div class="flex items-start">
                            <div class="flex-shrink-0 w-12 h-12 bg-blue-100 dark:bg-blue-900 rounded-full flex items-center justify-center">
                                <i class="fas fa-certificate text-blue-600"></i>
                            </div>
                            <div class="ml-4">
                                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Certified Technicians</h3>
                                <p class="text-gray-600 dark:text-gray-300">ASE certified professionals with ongoing training</p>
                            </div>
                        </div>
                        
                        <div class="flex items-start">
                            <div class="flex-shrink-0 w-12 h-12 bg-green-100 dark:bg-green-900 rounded-full flex items-center justify-center">
                                <i class="fas fa-tools text-green-600"></i>
                            </div>
                            <div class="ml-4">
                                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Modern Equipment</h3>
                                <p class="text-gray-600 dark:text-gray-300">State-of-the-art diagnostic and repair equipment</p>
                            </div>
                        </div>
                        
                        <div class="flex items-start">
                            <div class="flex-shrink-0 w-12 h-12 bg-purple-100 dark:bg-purple-900 rounded-full flex items-center justify-center">
                                <i class="fas fa-shield-alt text-purple-600"></i>
                            </div>
                            <div class="ml-4">
                                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Warranty</h3>
                                <p class="text-gray-600 dark:text-gray-300">Comprehensive warranty on all parts and labor</p>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="relative">
                    <div class="bg-blue-600 rounded-2xl p-8 text-white">
                        <h3 class="text-2xl font-bold mb-6">Our Statistics</h3>
                        <div class="grid grid-cols-2 gap-6">
                            <div class="text-center">
                                <div class="text-3xl font-bold mb-2">15+</div>
                                <div class="text-blue-200">Years Experience</div>
                            </div>
                            <div class="text-center">
                                <div class="text-3xl font-bold mb-2">5000+</div>
                                <div class="text-blue-200">Cars Serviced</div>
                            </div>
                            <div class="text-center">
                                <div class="text-3xl font-bold mb-2">98%</div>
                                <div class="text-blue-200">Customer Satisfaction</div>
                            </div>
                            <div class="text-center">
                                <div class="text-3xl font-bold mb-2">24/7</div>
                                <div class="text-blue-200">Emergency Service</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section id="contact" class="py-16 lg:py-24 bg-white dark:bg-gray-800">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-3xl sm:text-4xl lg:text-5xl font-bold text-gray-900 dark:text-white mb-4">
                    Get In Touch
                </h2>
                <p class="text-lg sm:text-xl text-gray-600 dark:text-gray-300 max-w-2xl mx-auto">
                    Ready to schedule your next service? Contact us today for a free estimate.
                </p>
            </div>
            
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
                <!-- Contact Information -->
                <div>
                    <h3 class="text-2xl font-bold text-gray-900 dark:text-white mb-6">Contact Information</h3>
                    
                    <div class="space-y-6">
                        <div class="flex items-start">
                            <div class="flex-shrink-0 w-12 h-12 bg-blue-100 dark:bg-blue-900 rounded-full flex items-center justify-center">
                                <i class="fas fa-map-marker-alt text-blue-600"></i>
                            </div>
                            <div class="ml-4">
                                <h4 class="text-lg font-semibold text-gray-900 dark:text-white">Address</h4>
                                <p class="text-gray-600 dark:text-gray-300">123 Auto Care Street<br>Mechanic City, MC 12345</p>
                            </div>
                        </div>
                        
                        <div class="flex items-start">
                            <div class="flex-shrink-0 w-12 h-12 bg-green-100 dark:bg-green-900 rounded-full flex items-center justify-center">
                                <i class="fas fa-phone text-green-600"></i>
                            </div>
                            <div class="ml-4">
                                <h4 class="text-lg font-semibold text-gray-900 dark:text-white">Phone</h4>
                                <p class="text-gray-600 dark:text-gray-300">(555) 123-4567</p>
                            </div>
                        </div>
                        
                        <div class="flex items-start">
                            <div class="flex-shrink-0 w-12 h-12 bg-purple-100 dark:bg-purple-900 rounded-full flex items-center justify-center">
                                <i class="fas fa-envelope text-purple-600"></i>
                            </div>
                            <div class="ml-4">
                                <h4 class="text-lg font-semibold text-gray-900 dark:text-white">Email</h4>
                                <p class="text-gray-600 dark:text-gray-300">info@autocarepro.com</p>
                            </div>
                        </div>
                        
                        <div class="flex items-start">
                            <div class="flex-shrink-0 w-12 h-12 bg-orange-100 dark:bg-orange-900 rounded-full flex items-center justify-center">
                                <i class="fas fa-clock text-orange-600"></i>
                            </div>
                            <div class="ml-4">
                                <h4 class="text-lg font-semibold text-gray-900 dark:text-white">Hours</h4>
                                <p class="text-gray-600 dark:text-gray-300">
                                    Mon-Fri: 7:00 AM - 6:00 PM<br>
                                    Sat: 8:00 AM - 4:00 PM<br>
                                    Sun: Emergency Only
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Contact Form -->
                <div>
                    <h3 class="text-2xl font-bold text-gray-900 dark:text-white mb-6">Request a Quote</h3>
                    <form class="space-y-6">
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">First Name</label>
                                <input type="text" class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent dark:bg-gray-700 dark:text-white" placeholder="John">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Last Name</label>
                                <input type="text" class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent dark:bg-gray-700 dark:text-white" placeholder="Doe">
                            </div>
                        </div>
                        
                        <div>
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Email</label>
                            <input type="email" class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent dark:bg-gray-700 dark:text-white" placeholder="john@example.com">
                        </div>
                        
                        <div>
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Phone</label>
                            <input type="tel" class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent dark:bg-gray-700 dark:text-white" placeholder="(555) 123-4567">
                        </div>
                        
                        <div>
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Service Needed</label>
                            <select class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent dark:bg-gray-700 dark:text-white">
                                <option>Select a service</option>
                                <option>Engine Repair</option>
                                <option>Brake Service</option>
                                <option>Oil Change</option>
                                <option>Tire Service</option>
                                <option>AC Service</option>
                                <option>Transmission</option>
                                <option>Electrical</option>
                                <option>Diagnostics</option>
                                <option>Other</option>
                            </select>
                        </div>
                        
                        <div>
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Message</label>
                            <textarea rows="4" class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent dark:bg-gray-700 dark:text-white" placeholder="Tell us about your vehicle and the service you need..."></textarea>
                        </div>
                        
                        <button type="submit" class="w-full bg-blue-600 text-white py-3 px-6 rounded-lg font-semibold hover:bg-blue-700 transition-colors">
                            <i class="fas fa-paper-plane mr-2"></i>
                            Send Message
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-gray-900 text-white py-12">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                <div>
                    <div class="flex items-center mb-4">
                        <i class="fas fa-car text-2xl text-blue-400 mr-3"></i>
                        <h3 class="text-xl font-bold">AutoCare Pro</h3>
                    </div>
                    <p class="text-gray-400 mb-4">Professional automotive services you can trust. Quality repairs, fair prices, and exceptional customer service.</p>
                    <div class="flex space-x-4">
                        <a href="#" class="text-gray-400 hover:text-white transition-colors">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="#" class="text-gray-400 hover:text-white transition-colors">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a href="#" class="text-gray-400 hover:text-white transition-colors">
                            <i class="fab fa-instagram"></i>
                        </a>
                        <a href="#" class="text-gray-400 hover:text-white transition-colors">
                            <i class="fab fa-linkedin-in"></i>
                        </a>
                    </div>
                </div>
                
                <div>
                    <h4 class="text-lg font-semibold mb-4">Services</h4>
                    <ul class="space-y-2 text-gray-400">
                        <li><a href="#" class="hover:text-white transition-colors">Engine Repair</a></li>
                        <li><a href="#" class="hover:text-white transition-colors">Brake Service</a></li>
                        <li><a href="#" class="hover:text-white transition-colors">Oil Change</a></li>
                        <li><a href="#" class="hover:text-white transition-colors">Tire Service</a></li>
                    </ul>
                </div>
                
                <div>
                    <h4 class="text-lg font-semibold mb-4">Company</h4>
                    <ul class="space-y-2 text-gray-400">
                        <li><a href="#about" class="hover:text-white transition-colors">About Us</a></li>
                        <li><a href="#contact" class="hover:text-white transition-colors">Contact</a></li>
                        <li><a href="#" class="hover:text-white transition-colors">Careers</a></li>
                        <li><a href="#" class="hover:text-white transition-colors">Privacy Policy</a></li>
                    </ul>
                </div>
                
                <div>
                    <h4 class="text-lg font-semibold mb-4">Contact Info</h4>
                    <div class="space-y-2 text-gray-400">
                        <p><i class="fas fa-map-marker-alt mr-2"></i>123 Auto Care Street</p>
                        <p><i class="fas fa-phone mr-2"></i>(555) 123-4567</p>
                        <p><i class="fas fa-envelope mr-2"></i>info@autocarepro.com</p>
                    </div>
                </div>
            </div>
            
            <div class="border-t border-gray-800 mt-8 pt-8 text-center text-gray-400">
                <p>&copy; 2024 AutoCare Pro. All rights reserved.</p>
            </div>
        </div>
    </footer>

    <!-- JavaScript -->
    <script>
        // Mobile menu toggle
        document.getElementById('mobile-menu-button').addEventListener('click', function() {
            const mobileMenu = document.getElementById('mobile-menu');
            mobileMenu.classList.toggle('hidden');
        });

        // Smooth scrolling for navigation links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            });
        });

        // Add scroll effect to navigation
        window.addEventListener('scroll', function() {
            const nav = document.querySelector('nav');
            if (window.scrollY > 100) {
                nav.classList.add('bg-white/98', 'dark:bg-gray-900/98');
            } else {
                nav.classList.remove('bg-white/98', 'dark:bg-gray-900/98');
            }
        });

        // Form submission
        document.querySelector('form').addEventListener('submit', function(e) {
            e.preventDefault();
            alert('Thank you for your message! We will contact you soon.');
        });
    </script>
</body>
</html>
