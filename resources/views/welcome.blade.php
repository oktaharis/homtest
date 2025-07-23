<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>HealthCare Management System</title>
        
        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600,700" rel="stylesheet" />
        
        <!-- Tailwind CSS CDN -->
        <script src="https://cdn.tailwindcss.com"></script>
        <style>
            /* Custom Styles for Parallax and Text Visibility */
            .hero-bg {
                background: linear-gradient(135deg, #3b82f6 0%, #1e40af 100%);
            }
            
            .smooth-scroll {
                scroll-behavior: smooth;
            }
            
            /* Parallax Styles (Restored from Original) */
            .parallax-container {
                position: relative;
                overflow: hidden;
            }
            
            .parallax-element {
                position: absolute;
                will-change: transform;
                pointer-events: none;
                opacity: 0.2; /* Reduced opacity for better text contrast */
            }
            
            /* Ensure text readability in white mode */
            .hero-text {
                text-shadow: 0 2px 6px rgba(0, 0, 0, 0.5); /* Stronger shadow for contrast */
            }
            
            /* Reduce motion for accessibility */
            @media (prefers-reduced-motion: reduce) {
                .parallax-element {
                    transform: none !important;
                }
                .smooth-scroll {
                    scroll-behavior: auto;
                }
            }
        </style>
    </head>
    <body class="bg-gray-50 text-gray-900 smooth-scroll">
        <!-- Navigation -->
        <nav class="fixed top-0 left-0 right-0 z-50 bg-white/90 backdrop-blur-md border-b border-gray-200">
            <div class="max-w-7xl mx-auto px-4 md:px-8">
                <div class="flex items-center justify-between h-16">
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <h1 class="text-xl font-bold text-gray-900">HealthCare MS</h1>
                        </div>
                    </div>
                    <div class="hidden md:block">
                        <div class="ml-10 flex items-baseline gap-8">
                            <a href="#home" class="text-gray-700 hover:text-blue-600 px-3 py-2 text-sm font-medium transition-colors">Home</a>
                            <a href="#features" class="text-gray-700 hover:text-blue-600 px-3 py-2 text-sm font-medium transition-colors">Features</a>
                            <a href="#about" class="text-gray-700 hover:text-blue-600 px-3 py-2 text-sm font-medium transition-colors">About</a>
                            <a href="#contact" class="text-gray-700 hover:text-blue-600 px-3 py-2 text-sm font-medium transition-colors">Contact</a>
                        </div>
                    </div>
                    <div class="flex items-center gap-4">
                        @if (Route::has('login'))
                            @auth
                                <a href="{{ url('/dashboard') }}" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg text-sm font-medium transition-colors">
                                    Dashboard
                                </a>
                            @else
                                <a href="{{ route('login') }}" class="text-gray-700 hover:text-blue-600 px-3 py-2 text-sm font-medium transition-colors">
                                    Login
                                </a>
                                @if (Route::has('register'))
                                    <a href="{{ route('register') }}" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg text-sm font-medium transition-colors">
                                        Register
                                    </a>
                                @endif
                            @endauth
                        @endif
                    </div>
                </div>
            </div>
        </nav>

        <!-- Hero Section -->
        <section id="home" class="relative min-h-screen flex items-center justify-center parallax-container hero-bg overflow-hidden">
            <!-- Restored Parallax Background Elements -->
            <div class="parallax-element bg-white/10 rounded-full w-64 h-64 top-20 right-20 opacity-20" data-speed="0.1"></div>
            <div class="parallax-element bg-white/15 w-48 h-48 top-16 left-16 opacity-25 transform rotate-45" data-speed="0.15"></div>
            <div class="parallax-element bg-white/10 rounded-xl w-32 h-32 bottom-20 right-32 opacity-30 transform rotate-12" data-speed="0.2"></div>
            
            <div class="relative z-10 text-center text-white px-4 max-w-5xl mx-auto hero-text">
                <h1 class="text-4xl md:text-5xl lg:text-6xl font-extrabold mb-6 tracking-tight">
                    Modern Healthcare
                    <span class="block text-transparent bg-clip-text bg-gradient-to-r from-yellow-400 to-orange-500">
                        Management System
                    </span>
                </h1>
                <p class="text-lg md:text-xl mb-8 text-gray-100 max-w-3xl mx-auto leading-relaxed">
                    Comprehensive solution for managing patients, treatments, medications, and healthcare operations with modern technology and intuitive design.
                </p>
                <div class="flex flex-col md:flex-row gap-4 justify-center items-center">
                    <a href="#features" class="bg-white text-blue-600 px-8 py-4 rounded-xl font-semibold text-lg hover:bg-gray-100 transition-all duration-300 hover:scale-105 shadow-xl">
                        Explore Features
                    </a>
                    <a href="#about" class="border-2 border-white text-white px-8 py-4 rounded-xl font-semibold text-lg hover:bg-white hover:text-blue-600 transition-all duration-300">
                        Learn More
                    </a>
                </div>
            </div>
        </section>

        <!-- Features Section -->
        <section id="features" class="py-16 md:py-20 relative">
            <div class="max-w-7xl mx-auto px-4 md:px-8">
                <div class="text-center mb-16">
                    <h2 class="text-3xl md:text-4xl font-bold mb-6 text-gray-900">
                        Powerful Features for
                        <span class="text-blue-600">Healthcare Management</span>
                    </h2>
                    <p class="text-lg text-gray-600 max-w-3xl mx-auto">
                        Our comprehensive system provides all the tools you need to manage healthcare operations efficiently and effectively.
                    </p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    <!-- Patient Management -->
                    <div class="bg-white p-8 rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300 hover:scale-105">
                        <div class="w-16 h-16 bg-blue-100 rounded-xl flex items-center justify-center mb-6">
                            <svg class="w-8 h-8 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                            </svg>
                        </div>
                        <h3 class="text-xl font-semibold mb-4 text-gray-900">Patient Management</h3>
                        <p class="text-gray-600 mb-4">Complete patient records management with personal information, medical history, and treatment tracking.</p>
                        <ul class="text-sm text-gray-600 space-y-2">
                            <li>• Patient registration and profiles</li>
                            <li>• Medical history tracking</li>
                            <li>• Appointment scheduling</li>
                        </ul>
                    </div>

                    <!-- Treatment & Medication -->
                    <div class="bg-white p-8 rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300 hover:scale-105">
                        <div class="w-16 h-16 bg-emerald-100 rounded-xl flex items-center justify-center mb-6">
                            <svg class="w-8 h-8 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z"></path>
                            </svg>
                        </div>
                        <h3 class="text-xl font-semibold mb-4 text-gray-900">Treatment & Medication</h3>
                        <p class="text-gray-600 mb-4">Comprehensive treatment planning and medication management with dosage tracking and inventory control.</p>
                        <ul class="text-sm text-gray-600 space-y-2">
                            <li>• Treatment protocols</li>
                            <li>• Medication inventory</li>
                            <li>• Dosage management</li>
                        </ul>
                    </div>

                    <!-- Staff Management -->
                    <div class="bg-white p-8 rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300 hover:scale-105">
                        <div class="w-16 h-16 bg-purple-100 rounded-xl flex items-center justify-center mb-6">
                            <svg class="w-8 h-8 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                            </svg>
                        </div>
                        <h3 class="text-xl font-semibold mb-4 text-gray-900">Staff Management</h3>
                        <p class="text-gray-600 mb-4">Efficient healthcare staff management with role-based access control and scheduling capabilities.</p>
                        <ul class="text-sm text-gray-600 space-y-2">
                            <li>• Employee profiles</li>
                            <li>• Role-based permissions</li>
                            <li>• Schedule management</li>
                        </ul>
                    </div>

                    <!-- Financial Management -->
                    <div class="bg-white p-8 rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300 hover:scale-105">
                        <div class="w-16 h-16 bg-amber-100 rounded-xl flex items-center justify-center mb-6">
                            <svg class="w-8 h-8 text-amber-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                        <h3 class="text-xl font-semibold mb-4 text-gray-900">Financial Management</h3>
                        <p class="text-gray-600 mb-4">Complete billing and payment processing with transaction tracking and financial reporting.</p>
                        <ul class="text-sm text-gray-600 space-y-2">
                            <li>• Payment processing</li>
                            <li>• Transaction history</li>
                            <li>• Financial reports</li>
                        </ul>
                    </div>

                    <!-- Regional Management -->
                    <div class="bg-white p-8 rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300 hover:scale-105">
                        <div class="w-16 h-16 bg-red-100 rounded-xl flex items-center justify-center mb-6">
                            <svg class="w-8 h-8 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            </svg>
                        </div>
                        <h3 class="text-xl font-semibold mb-4 text-gray-900">Regional Management</h3>
                        <p class="text-gray-600 mb-4">Multi-location healthcare facility management with hierarchical organization structure.</p>
                        <ul class="text-sm text-gray-600 space-y-2">
                            <li>• Multi-location support</li>
                            <li>• Regional hierarchies</li>
                            <li>• Location-based reporting</li>
                        </ul>
                    </div>

                    <!-- Analytics & Reporting -->
                    <div class="bg-white p-8 rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300 hover:scale-105">
                        <div class="w-16 h-16 bg-emerald-100 rounded-xl flex items-center justify-center mb-6">
                            <svg class="w-8 h-8 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                            </svg>
                        </div>
                        <h3 class="text-xl font-semibold mb-4 text-gray-900">Analytics & Reporting</h3>
                        <p class="text-gray-600 mb-4">Comprehensive reporting and analytics dashboard for data-driven healthcare decisions.</p>
                        <ul class="text-sm text-gray-600 space-y-2">
                            <li>• Real-time analytics</li>
                            <li>• Custom reports</li>
                            <li>• Performance metrics</li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>

        <!-- About Section -->
        <section id="about" class="py-16 md:py-20 bg-gray-100 relative">
            <div class="max-w-7xl mx-auto px-4 md:px-8">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-12 items-center">
                    <div>
                        <h2 class="text-3xl md:text-4xl font-bold mb-6 text-gray-900">
                            Built for Modern
                            <span class="text-emerald-600">Healthcare</span>
                        </h2>
                        <p class="text-lg text-gray-600 mb-8 leading-relaxed">
                            Our Healthcare Management System is designed with modern technology stack using Laravel framework, 
                            providing a robust, scalable, and secure solution for healthcare facilities of all sizes.
                        </p>
                        <div class="space-y-4">
                            <div class="flex items-start gap-4">
                                <div class="w-6 h-6 bg-emerald-600 rounded-full flex items-center justify-center flex-shrink-0 mt-1">
                                    <svg class="w-3 h-3 text-white" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                                    </svg>
                                </div>
                                <div>
                                    <h3 class="font-semibold text-gray-900 mb-1">Secure & Compliant</h3>
                                    <p class="text-gray-600">Built with healthcare data security and privacy compliance in mind.</p>
                                </div>
                            </div>
                            <div class="flex items-start gap-4">
                                <div class="w-6 h-6 bg-emerald-600 rounded-full flex items-center justify-center flex-shrink-0 mt-1">
                                    <svg class="w-3 h-3 text-white" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                                    </svg>
                                </div>
                                <div>
                                    <h3 class="font-semibold text-gray-900 mb-1">Scalable Architecture</h3>
                                    <p class="text-gray-600">Designed to grow with your healthcare organization's needs.</p>
                                </div>
                            </div>
                            <div class="flex items-start gap-4">
                                <div class="w-6 h-6 bg-emerald-600 rounded-full flex items-center justify-center flex-shrink-0 mt-1">
                                    <svg class="w-3 h-3 text-white" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                                    </svg>
                                </div>
                                <div>
                                    <h3 class="font-semibold text-gray-900 mb-1">User-Friendly Interface</h3>
                                    <p class="text-gray-600">Intuitive design that reduces training time and improves efficiency.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="relative">
                        <div class="bg-gradient-to-br from-blue-600 to-emerald-600 rounded-2xl p-8 text-white">
                            <h3 class="text-2xl font-bold mb-6">System Modules</h3>
                            <div class="grid grid-cols-2 gap-4">
                                <div class="bg-white/20 rounded-lg p-4">
                                    <h4 class="font-semibold mb-2">Master Data</h4>
                                    <ul class="text-sm space-y-1 opacity-90">
                                        <li>• Users</li>
                                        <li>• Regions</li>
                                        <li>• Employees</li>
                                        <li>• Patients</li>
                                    </ul>
                                </div>
                                <div class="bg-white/20 rounded-lg p-4">
                                    <h4 class="font-semibold mb-2">Medical</h4>
                                    <ul class="text-sm space-y-1 opacity-90">
                                        <li>• Treatments</li>
                                        <li>• Medications</li>
                                        <li>• Visits</li>
                                        <li>• Transactions</li>
                                    </ul>
                                </div>
                                <div class="bg-white/20 rounded-lg p-4">
                                    <h4 class="font-semibold mb-2">Financial</h4>
                                    <ul class="text-sm space-y-1 opacity-90">
                                        <li>• Payments</li>
                                        <li>• Billing</li>
                                        <li>• Reports</li>
                                        <li>• Analytics</li>
                                    </ul>
                                </div>
                                <div class="bg-white/20 rounded-lg p-4">
                                    <h4 class="font-semibold mb-2">System</h4>
                                    <ul class="text-sm space-y-1 opacity-90">
                                        <li>• Security</li>
                                        <li>• Backup</li>
                                        <li>• Audit</li>
                                        <li>• Settings</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Contact Section -->
        <section id="contact" class="py-16 md:py-20 relative">
            <div class="max-w-4xl mx-auto px-4 md:px-8 text-center">
                <h2 class="text-3xl md:text-4xl font-bold mb-6 text-gray-900">
                    Ready to Get Started?
                </h2>
                <p class="text-lg text-gray-600 mb-12 max-w-2xl mx-auto">
                    Transform your healthcare operations with our comprehensive management system. 
                    Contact us today to learn more or schedule a demo.
                </p>
                <div class="flex flex-col md:flex-row gap-6 justify-center items-center">
                    @if (Route::has('login'))
                        @auth
                            <a href="{{ url('/dashboard') }}" class="bg-gradient-to-r from-blue-600 to-emerald-600 text-white px-8 py-4 rounded-xl font-semibold text-lg hover:shadow-xl transition-all duration-300 hover:scale-105">
                                Go to Dashboard
                            </a>
                        @else
                            <a href="{{ route('register') }}" class="bg-gradient-to-r from-blue-600 to-emerald-600 text-white px-8 py-4 rounded-xl font-semibold text-lg hover:shadow-xl transition-all duration-300 hover:scale-105">
                                Start Free Trial
                            </a>
                            <a href="{{ route('login') }}" class="border-2 border-gray-700 text-gray-700 px-8 py-4 rounded-xl font-semibold text-lg hover:bg-gray-700 hover:text-white transition-all duration-300">
                                Login to System
                            </a>
                        @endauth
                    @endif
                </div>
            </div>
        </section>

        <!-- Footer -->
        <footer class="bg-gray-900 text-white py-12">
            <div class="max-w-7xl mx-auto px-4 md:px-8">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    <div>
                        <h3 class="text-xl font-bold mb-4">HealthCare MS</h3>
                        <p class="text-gray-100 mb-4">
                            Modern healthcare management system built with Laravel framework for comprehensive healthcare operations.
                        </p>
                    </div>
                    <div>
                        <h4 class="font-semibold mb-4">Features</h4>
                        <ul class="space-y-2 text-gray-100">
                            <li>Patient Management</li>
                            <li>Treatment & Medication</li>
                            <li>Staff Management</li>
                            <li>Financial Management</li>
                        </ul>
                    </div>
                    <div>
                        <h4 class="font-semibold mb-4">Technology</h4>
                        <ul class="space-y-2 text-gray-100">
                            <li>Laravel Framework</li>
                            <li>Modern PHP</li>
                            <li>Responsive Design</li>
                            <li>Secure Architecture</li>
                        </ul>
                    </div>
                </div>
                <div class="border-t border-gray-700 mt-8 pt-8 text-center text-gray-100">
                    <p>© {{ date('Y') }} HealthCare Management System. Built with Laravel.</p>
                </div>
            </div>
        </footer>

        <!-- Restored Parallax JavaScript -->
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const parallaxElements = document.querySelectorAll('.parallax-element');
                let ticking = false;
                
                function updateParallax() {
                    const scrollTop = window.pageYOffset;
                    
                    parallaxElements.forEach(element => {
                        const speed = parseFloat(element.dataset.speed) || 0.1;
                        const yPos = -(scrollTop * speed);
                        element.style.transform = `translate3d(0, ${yPos}px, 0)`;
                    });
                    
                    ticking = false;
                }
                
                function requestTick() {
                    if (!ticking) {
                        requestAnimationFrame(updateParallax);
                        ticking = true;
                    }
                }
                
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
                
                // Throttled scroll event
                window.addEventListener('scroll', requestTick, { passive: true });
                
                // Initial parallax update
                updateParallax();
            });
        </script>
    </body>
</html>