<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    <!-- SEO Meta Tags -->
    <title>@yield('title', 'الموقع الرسمي - حلول مبتكرة وخدمات عالية الجودة')</title>
    <meta name="description" content="@yield('description', 'نقدم حلولاً مبتكرة وخدمات عالية الجودة تساعدك على تحقيق أهدافك ونمو أعمالك. تواصل معنا اليوم.')">
    <meta name="keywords" content="@yield('keywords', 'خدمات, حلول, أعمال, استشارات, تطوير')">
    <meta name="author" content="@yield('author', 'Your Company Name')">
    <meta name="robots" content="index, follow">
    <link rel="canonical" href="{{ url('/') }}">
    
    <!-- Open Graph Meta Tags -->
    <meta property="og:title" content="@yield('og_title', 'الموقع الرسمي - حلول مبتكرة وخدمات عالية الجودة')">
    <meta property="og:description" content="@yield('og_description', 'نقدم حلولاً مبتكرة وخدمات عالية الجودة تساعدك على تحقيق أهدافك ونمو أعمالك. تواصل معنا اليوم.')">
    <meta property="og:image" content="{{ asset('images/og-image.jpg') }}">
    <meta property="og:url" content="{{ url('/') }}">
    <meta property="og:type" content="website">
    <meta property="og:locale" content="ar_SA">
    <meta property="og:site_name" content="@yield('site_name', 'Your Company Name')">
    
    <!-- Twitter Card Meta Tags -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="@yield('twitter_title', 'الموقع الرسمي - حلول مبتكرة وخدمات عالية الجودة')">
    <meta name="twitter:description" content="@yield('twitter_description', 'نقدم حلولاً مبتكرة وخدمات عالية الجودة تساعدك على تحقيق أهدافك ونمو أعمالك.')">
    <meta name="twitter:image" content="{{ asset('images/og-image.jpg') }}">
    
    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">
    
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <!-- Fonts - Arabic Support -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@300;400;500;700;900&family=Cairo:wght@300;400;600;700;900&display=swap" rel="stylesheet">
    
    <!-- Styles -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <!-- Structured Data (JSON-LD) -->
    @php
        $companyName = config('app.name', 'Your Company Name');
        $siteUrl = url('/');
        $logoUrl = asset('images/logo.png');
        $contactEmail = env('CONTACT_EMAIL', 'info@domain.com');
        $structuredData = json_encode([
            '@context' => 'https://schema.org',
            '@type' => 'Organization',
            'name' => $companyName,
            'url' => $siteUrl,
            'logo' => $logoUrl,
            'description' => 'نقدم حلولاً مبتكرة وخدمات عالية الجودة',
            'address' => [
                '@type' => 'PostalAddress',
                'addressCountry' => 'SA'
            ],
            'contactPoint' => [
                '@type' => 'ContactPoint',
                'email' => $contactEmail,
                'contactType' => 'customer service'
            ]
        ], JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
    @endphp
    <script type="application/ld+json">
    {!! $structuredData !!}
    </script>
    
    @stack('styles')
</head>
<body class="bg-white text-gray-900 antialiased">
    <!-- Navigation -->
    <nav class="fixed top-0 w-full bg-white/95 backdrop-blur-sm shadow-md z-50 transition-all duration-300"
         x-data="{ scrolled: false, mobileMenuOpen: false }"
         x-init="window.addEventListener('scroll', () => scrolled = window.scrollY > 50)"
         :class="{ 'shadow-lg': scrolled }">
        <div class="container mx-auto px-4">
            <div class="flex items-center justify-between h-16 md:h-20">
                <!-- Logo -->
                <div class="flex items-center">
                    <a href="/" class="text-2xl font-bold text-blue-600 hover:text-blue-700 transition-colors">
                        <!-- Replace with your logo -->
                        <img src="{{ asset('images/logo.png') }}" alt="Logo" class="h-10 md:h-12" onerror="this.style.display='none'; this.nextElementSibling.style.display='inline';">
                        <span class="hidden">الشعار</span>
                    </a>
                </div>
                
                <!-- Desktop Menu -->
                <div class="hidden md:flex items-center gap-8">
                    <a href="#features" class="text-gray-700 hover:text-blue-600 transition-colors font-medium">المميزات</a>
                    <a href="#testimonials" class="text-gray-700 hover:text-blue-600 transition-colors font-medium">آراء العملاء</a>
                    <a href="#contact" class="bg-blue-600 text-white px-6 py-2 rounded-lg hover:bg-blue-700 transition-colors font-medium">اتصل بنا</a>
                </div>
                
                <!-- Mobile Menu Button -->
                <button @click="mobileMenuOpen = !mobileMenuOpen" 
                        class="md:hidden text-gray-700 hover:text-blue-600 transition-colors"
                        aria-label="القائمة">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path x-show="!mobileMenuOpen" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                        <path x-show="mobileMenuOpen" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>
            
            <!-- Mobile Menu -->
            <div x-show="mobileMenuOpen" 
                 x-transition:enter="transition ease-out duration-200"
                 x-transition:enter-start="opacity-0 transform translate-y-2"
                 x-transition:enter-end="opacity-100 transform translate-y-0"
                 x-transition:leave="transition ease-in duration-150"
                 x-transition:leave-start="opacity-100 transform translate-y-0"
                 x-transition:leave-end="opacity-0 transform translate-y-2"
                 class="md:hidden pb-4 space-y-3">
                <a href="#features" @click="mobileMenuOpen = false" class="block text-gray-700 hover:text-blue-600 transition-colors font-medium py-2">المميزات</a>
                <a href="#testimonials" @click="mobileMenuOpen = false" class="block text-gray-700 hover:text-blue-600 transition-colors font-medium py-2">آراء العملاء</a>
                <a href="#contact" @click="mobileMenuOpen = false" class="block bg-blue-600 text-white px-6 py-2 rounded-lg hover:bg-blue-700 transition-colors font-medium text-center">اتصل بنا</a>
            </div>
        </div>
    </nav>
    
    <!-- Main Content -->
    <main>
        @yield('content')
    </main>
    
    <!-- Smooth Scroll Behavior -->
    <style>
        html {
            scroll-behavior: smooth;
        }
        
        /* Custom scrollbar for RTL */
        ::-webkit-scrollbar {
            width: 10px;
        }
        
        ::-webkit-scrollbar-track {
            background: #f1f1f1;
        }
        
        ::-webkit-scrollbar-thumb {
            background: #2563eb;
            border-radius: 5px;
        }
        
        ::-webkit-scrollbar-thumb:hover {
            background: #1d4ed8;
        }
    </style>
    
    @stack('scripts')
</body>
</html>