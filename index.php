<?php
include dirname(__FILE__) . '/.private/config.php';
?>
<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zenwana.com - Empowering Your Growth</title>

    <script src="https://cdn.tailwindcss.com"></script>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <link rel="stylesheet" href="https://unpkg.com/flickity@2/dist/flickity.min.css">

    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['Inter', 'sans-serif'],
                    },
                    colors: {
                        'brand-blue': '#002a54',    
                        'brand-pink': '#1abc9c',   
                        'dark-text': '#2C3E50',     
                        'light': '#FFFFFF',         
                        'footer-bg': '#1D2939'      
                    }
                }
            }
        }
    </script>
<style>
       @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-10px); }
        }
        
        @keyframes glow {
            from { box-shadow: 0 0 20px rgba(255, 107, 157, 0.3); }
            to { box-shadow: 0 0 40px rgba(255, 107, 157, 0.6); }
        }
        
        @keyframes slideUp {
            from { 
                opacity: 0; 
                transform: translateY(50px); 
            }
            to { 
                opacity: 1; 
                transform: translateY(0); 
            }
        }
        
        @keyframes scaleBounce {
            0% { transform: scale(0.8) rotate(-5deg); opacity: 0; }
            50% { transform: scale(1.05) rotate(0deg); }
            100% { transform: scale(1) rotate(0deg); opacity: 1; }
        }
        
        @keyframes shimmer {
            0% { transform: translateX(-100%); }
            100% { transform: translateX(100%); }
        }
        
        .glassmorphism {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }
        
        .gradient-border {
            background: linear-gradient(45deg, #ff6b9d, #4338ca, #06d6a0);
            padding: 2px;
            border-radius: 1rem;
            position: relative;
            overflow: hidden;
        }
        
        .gradient-border::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.4), transparent);
            animation: shimmer 2.5s infinite;
        }
        
        .card-inner {
            background: white;
            border-radius: calc(1rem - 2px);
            height: 100%;
        }
        
        .animated-gradient {
            background: linear-gradient(-45deg, #ff6b9d, #4338ca, #06d6a0, #ff8c42);
            background-size: 400% 400%;
            animation: gradientShift 4s ease infinite;
        }
        
        @keyframes gradientShift {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }
        
        .service-card {
            transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        }
        
        .service-card:hover {
            transform: translateY(-20px) scale(1.02);
        }
        
        .service-card:hover .service-icon {
            transform: scale(1.2) rotate(360deg);
        }
        
        .service-icon {
            transition: all 0.6s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        }
        
        .floating-elements {
            position: absolute;
            width: 100%;
            height: 100%;
            overflow: hidden;
            pointer-events: none;
        }
        
        .floating-circle {
            position: absolute;
            border-radius: 50%;
            background: linear-gradient(45deg, rgba(255, 107, 157, 0.1), rgba(67, 56, 202, 0.1));
            animation: float 6s ease-in-out infinite;
        }
        
        .floating-circle:nth-child(1) {
            width: 80px;
            height: 80px;
            top: 10%;
            left: 10%;
            animation-delay: 0s;
        }
        
        .floating-circle:nth-child(2) {
            width: 60px;
            height: 60px;
            top: 60%;
            right: 15%;
            animation-delay: 2s;
        }
        
        .floating-circle:nth-child(3) {
            width: 100px;
            height: 100px;
            bottom: 20%;
            left: 20%;
            animation-delay: 4s;
        }
   
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        @keyframes staggerFade {
            from { opacity: 0; transform: translateY(30px) scale(0.95); }
            to { opacity: 1; transform: translateY(0) scale(1); }
        }

        @keyframes scaleRotate {
            0% { transform: scale(1) rotate(0deg); }
            50% { transform: scale(1.1) rotate(5deg); }
            100% { transform: scale(1) rotate(0deg); }
        }

        @keyframes parallax {
            0% { background-position: 50% 0; }
            100% { background-position: 50% 100px; }
        }

        @keyframes pulseGlow {
            0% { box-shadow: 0 0 0 0 rgba(26, 188, 156, 0.4); }
            70% { box-shadow: 0 0 0 10px rgba(26, 188, 156, 0); }
            100% { box-shadow: 0 0 0 0 rgba(26, 188, 156, 0); }
        }

        .fade-in-element {
            animation: fadeIn 0.8s ease-out forwards;
        }

        .stagger-card {
            opacity: 0;
            animation: staggerFade 0.6s ease-out forwards;
        }

        .stagger-card:nth-child(1) { animation-delay: 0.1s; }
        .stagger-card:nth-child(2) { animation-delay: 0.2s; }
        .stagger-card:nth-child(3) { animation-delay: 0.3s; }
        .stagger-card:nth-child(4) { animation-delay: 0.4s; }
        .stagger-card:nth-child(5) { animation-delay: 0.5s; }
        .stagger-card:nth-child(6) { animation-delay: 0.6s; }

        .nav-link-active {
            color: #002a54;
            font-weight: 600;
        }

        .hero-slide {
            width: 100%;
            height: 600px;
            background-size: cover;
            background-position: center;
            animation: parallax 10s ease-in-out infinite alternate;
        }

        .hero-overlay {
            background-color: rgba(0, 42, 84, 0.7);
        }

        .fab-container {
            position: fixed;
            bottom: 2rem;
            right: 2rem;
            z-index: 100;
            display: flex;
            flex-direction: column;
            gap: 1rem;
        }

        .fab {
            background-color: #002a54;
            color: white;
            width: 60px;
            height: 60px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 4px 12px rgba(0,0,0,0.2);
            transition: all 0.3s ease;
            text-decoration: none;
        }

        .fab:hover {
            background-color: #001f3f;
            transform: scale(1.1) rotate(360deg);
            animation: pulseGlow 1.5s infinite;
        }

        .fab.whatsapp {
            background-color: #25D366;
        }

        .fab.whatsapp:hover {
            background-color: #1DA851;
        }

        .ai-modal-overlay {
            background: rgba(0,0,0,0.5);
        }

        .animated-gradient {
            background: linear-gradient(-45deg, #002a54, #003f7f, #002a54, #1abc9c);
            background-size: 400% 400%;
            animation: gradient-animation 15s ease infinite;
        }

        @keyframes gradient-animation {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }

        .btn-animated {
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px 0 rgba(26, 188, 156, 0.75);
        }

        .btn-animated:hover {
            transform: translateY(-3px) scale(1.05) rotate(2deg);
            box-shadow: 0 10px 20px rgba(26, 188, 156, 0.4);
            animation: scaleRotate 0.5s ease-in-out;
        }

        .btn-animated:active {
            transform: translateY(-1px) scale(1);
        }

        .shimmer-card {
            position: relative;
            overflow: hidden;
        }

        .shimmer-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(120deg, rgba(255,255,255,0) 20%, rgba(255,255,255,0.15) 50%, rgba(255,255,255,0) 80%);
            transition: left 0.6s ease;
        }

        .shimmer-card:hover::before {
            left: 100%;
        }

        .bubbles-container {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            overflow: hidden;
            z-index: -1;
        }

        .bubble {
            position: absolute;
            bottom: -150px;
            background-color: rgba(26, 188, 156, 0.2);
            border-radius: 50%;
            animation: rise 12s infinite ease-in;
            box-shadow: 0 0 20px rgba(26, 188, 156, 0.3);
        }

        @keyframes rise {
            0% {
                transform: translateY(0) scale(1);
                opacity: 0.8;
            }
            50% {
                opacity: 0.4;
            }
            100% {
                transform: translateY(-1200px) scale(0.5);
                opacity: 0;
            }
        }

        .footer-link {
            position: relative;
            transition: all 0.3s ease;
        }

        .footer-link::after {
            content: '';
            position: absolute;
            width: 0;
            height: 2px;
            bottom: -2px;
            left: 0;
            background-color: #1abc9c;
            transition: width 0.3s ease;
        }

        .footer-link:hover::after {
            width: 100%;
        }
        
        /* Dropdown styles */
        .dropdown-menu {
            display: none;
        }
        .group:hover .dropdown-menu {
            display: block;
        }
        
</style>
</head>
<body class="bg-light text-dark-text font-sans antialiased" x-data="{ aiModalOpen: false }">

    <header x-data="{ mobileMenuOpen: false }" class="bg-brand-blue text-white sticky top-0 z-50 shadow-lg">
        <nav class="container mx-auto px-6 py-4 flex justify-between items-center">
            <div class="flex items-center space-x-4">
<a href="#home" class="flex items-center">
    <!-- Mobile Logo -->
    <img src="/images/Zenwana Logomobile.png" alt="Zenwana Logo Mobile" 
         class="h-auto w-auto max-w-[120px] block sm:hidden">
    
    <!-- Tablet Logo -->
    <img src="/images/Zenwana Logomobile.png" alt="Zenwana Logo Tablet" 
         class="h-12 w-auto max-w-[150px] hidden sm:block md:hidden">
    
    <!-- Desktop Logo -->
    <img src="/images/ZenwanaLogo.png" alt="Zenwana Logo Desktop" 
         class="h-14 w-auto max-w-[180px] hidden md:block">
</a>

                <div class="w-px h-8 bg-white/30 hidden md:block"></div>
            
                <span class="text-sm hidden md:block" style="font-size:16px;">Is Where Lives Evolve</span>
            </div>
            
            <div class="hidden md:flex items-center space-x-8">
                <!-- What We Do Dropdown -->
                <div class="relative group" x-data="{ open: false }">
                    <button @click="open = !open" @mouseover="open = true" class="flex items-center space-x-1 hover:text-brand-pink transition duration-300">
                        <span>What We Do</span>
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                    </button>
                    <div x-show="open" @mouseleave="open = false" x-transition class="absolute mt-2 w-48 bg-white text-dark-text rounded-md shadow-lg py-1 z-20" style="display:none;">
                        <a href="/services.html#recruitment" class="block px-4 py-2 text-sm hover:bg-gray-100">Recruitment</a>
                        <a href="/services.html#financial" class="block px-4 py-2 text-sm hover:bg-gray-100">Financial & Payroll</a>
                        <a href="/services.html#training" class="block px-4 py-2 text-sm hover:bg-gray-100">Corporate Training</a>
                        <a href="/services.html#imports" class="block px-4 py-2 text-sm hover:bg-gray-100">Luxury Imports</a>
                        <a href="/services.html#pet" class="block px-4 py-2 text-sm hover:bg-gray-100">Pet Relocation</a>
                    </div>
                </div>

                <!-- Who We Serve Dropdown -->
                <div class="relative group" x-data="{ open: false }">
                    <button @click="open = !open" @mouseover="open = true" class="flex items-center space-x-1 hover:text-brand-pink transition duration-300">
                        <span>Who We Serve</span>
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                    </button>
                    <div x-show="open" @mouseleave="open = false" x-transition class="absolute mt-2 w-48 bg-white text-dark-text rounded-md shadow-lg py-1 z-20" style="display:none;">
                        <a href="#" class="block px-4 py-2 text-sm hover:bg-gray-100">IT and Tech</a>
                        <a href="#" class="block px-4 py-2 text-sm hover:bg-gray-100">BPO</a>
                        <a href="#" class="block px-4 py-2 text-sm hover:bg-gray-100">Finance and Accounting</a>
                        <a href="#" class="block px-4 py-2 text-sm hover:bg-gray-100">Legal</a>
                        <a href="#" class="block px-4 py-2 text-sm hover:bg-gray-100">Customer Experience</a>
                        <a href="#" class="block px-4 py-2 text-sm hover:bg-gray-100">Insurance</a>
                        <a href="#" class="block px-4 py-2 text-sm hover:bg-gray-100">Operations</a>
                        <a href="#" class="block px-4 py-2 text-sm hover:bg-gray-100">Support Services</a>
                
                    </div>
                </div>

                <!-- Who We Are Dropdown -->
                <div class="relative group" x-data="{ open: false }">
                    <button @click="open = !open" @mouseover="open = true" class="flex items-center space-x-1 hover:text-brand-pink transition duration-300">
                        <span>Who We Are</span>
                         <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                    </button>
                    <div x-show="open" @mouseleave="open = false" x-transition class="absolute mt-2 w-48 bg-white text-dark-text rounded-md shadow-lg py-1 z-20" style="display:none;">
                        <a href="/about.html" class="block px-4 py-2 text-sm hover:bg-gray-100">About Us</a>
                 <!--       <a href="#" class="block px-4 py-2 text-sm hover:bg-gray-100">Our Team</a>  -->
                <!--        <a href="#" class="block px-4 py-2 text-sm hover:bg-gray-100">Careers</a> -->
                    </div>
                </div>
                
                <a href="contact.html" class="hover:text-brand-pink transition duration-300">Contact</a>
                <a href="https://wa.me/94717872749" class="bg-brand-pink text-white font-semibold px-5 py-2 rounded-lg btn-animated">Free Consultation</a>
            </div>

            <div class="md:hidden">
                <button @click="mobileMenuOpen = !mobileMenuOpen" class="text-white focus:outline-none">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path :class="{'hidden': mobileMenuOpen, 'block': !mobileMenuOpen }" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path>
                        <path :class="{'block': mobileMenuOpen, 'hidden': !mobileMenuOpen }" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>
        </nav>

        <div x-show="mobileMenuOpen" x-transition class="md:hidden bg-brand-blue border-t border-white/20">
            <div class="px-6 pt-2 pb-4 space-y-2">
                <a href="#home" @click="mobileMenuOpen = false" class="block hover:text-brand-pink transition duration-300 py-2">Home</a>
                <a href="/services.html" @click="mobileMenuOpen = false" class="block hover:text-brand-pink transition duration-300 py-2">Services</a>
                <a href="/about.html" @click="mobileMenuOpen = false" class="block hover:text-brand-pink transition duration-300 py-2">About Us</a>
                <a href="#contact" @click="mobileMenuOpen = false" class="block hover:text-brand-pink transition duration-300 py-2">Contact</a>
                <a href="#contact" @click="mobileMenuOpen = false" class="block bg-brand-pink text-white text-center font-semibold mt-4 px-5 py-3 rounded-lg btn-animated">Free Consultation</a>
            </div>
        </div>
    </header>

    <main>
        <section id="home" class="relative">
            <div class="main-carousel" data-flickity='{ "cellAlign": "left", "contain": true, "autoPlay": 5000, "wrapAround": true, "prevNextButtons": true, "pageDots": true }'>
                <div class="hero-slide" style="background-image: url('https://images.unsplash.com/photo-1556742212-5b321f3c261b?q=80&w=2070&auto=format&fit=crop');">
                    <div class="hero-overlay w-full h-full flex items-center justify-center">
                        <div class="container mx-auto px-6 text-center text-white relative z-10">
                            <h3 class="text-4xl md:text-4xl font-extrabold leading-tight mb-4 fade-in-element">From boardrooms to heartbeats, Zenwana is your partner </br>in achieving what matters most</h3>
                            <p class="text-lg md:text-xl text-gray-200 max-w-3xl mx-auto mb-8 fade-in-element">Expert recruitment services to build your dream team and advance your career.</p>
                            <a href="#services" class="bg-brand-pink text-white font-bold px-8 py-4 rounded-lg btn-animated fade-in-element">Discover Recruitment</a>
                        </div>
                    </div>
                </div>
                <div class="hero-slide" style="background-image: url('https://images.unsplash.com/photo-1553729459-efe14ef6055d?q=80&w=2070&auto=format&fit=crop');">
                    <div class="hero-overlay w-full h-full flex items-center justify-center">
                        <div class="container mx-auto px-6 text-center text-white relative z-10">
                            <h1 class="text-4xl md:text-4xl font-extrabold leading-tight mb-4 fade-in-element">Financial Clarity for Your Business</h1>
                            <p class="text-lg md:text-xl text-gray-200 max-w-3xl mx-auto mb-8 fade-in-element">Comprehensive payroll and accounting solutions to streamline your finances.</p>
                            <a href="#services" class="bg-brand-pink text-white font-bold px-8 py-4 rounded-lg btn-animated fade-in-element">Explore Financial Services</a>
                        </div>
                    </div>
                </div>
                <div class="hero-slide" style="background-image: url('https://images.unsplash.com/photo-1543466835-00a7907e9de1?q=80&w=1974&auto=format&fit=crop');">
                    <div class="hero-overlay w-full h-full flex items-center justify-center">
                        <div class="container mx-auto px-6 text-center text-white relative z-10">
                            <h1 class="text-4xl md:text-4xl font-extrabold leading-tight mb-4 fade-in-element">Seamless Journeys for Your Pets</h1>
                            <p class="text-lg md:text-xl text-gray-200 max-w-3xl mx-auto mb-8 fade-in-element">Safe and stress-free international relocation for your beloved companions.</p>
                            <a href="#services" class="bg-brand-pink text-white font-bold px-8 py-4 rounded-lg btn-animated fade-in-element">Learn About Pet Travel</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

      <section id="services" class="py-24 bg-gradient-to-br from-gray-50 via-blue-50 to-pink-50 relative overflow-hidden">
        <!-- Floating Background Elements -->
        <div class="floating-elements">
            <div class="floating-circle"></div>
            <div class="floating-circle"></div>
            <div class="floating-circle"></div>
        </div>
        
        <div class="container mx-auto px-6 relative z-10">
            <!-- Section Header -->
            <div class="text-center mb-20">
                <div class="inline-block mb-6">
                    <span class="px-4 py-2 bg-gradient-to-r from-brand-pink to-brand-blue text-white text-sm font-semibold rounded-full animate-pulse">
                        OUR SERVICES
                    </span>
                </div>
               
                <p class="text-xl text-gray-700 max-w-2xl mx-auto leading-relaxed animate-slide-up" style="animation-delay: 0.2s;">
                    From boardrooms to heartbeats, Zenwana is your partner in achieving what matters most.
                </p>
            </div>

            <!-- Services Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 mb-12">
                <!-- Recruitment & Career -->
                <div class="gradient-border service-card animate-scale-bounce" style="animation-delay: 0.1s;">
                    <div class="card-inner overflow-hidden group">
                        <div class="relative h-64 overflow-hidden">
                            <img src="/images/career.png" 
                                 class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-125" 
                                 alt="Recruitment Professionals">
                            <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/20 to-transparent"></div>
                            <div class="absolute top-4 right-4 service-icon">
                                <div class="w-14 h-14 bg-gradient-to-r from-brand-pink to-purple-500 rounded-2xl flex items-center justify-center shadow-lg">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0zM10 7v3m0 0v3m0-3h3m-3 0H7" />
                                    </svg>
                                </div>
                            </div>
                        </div>
                        <div class="p-8">
                            <h3 class="text-2xl font-bold text-dark-text mb-4 group-hover:text-brand-pink transition-colors">
                                Recruitment & Career
                            </h3>
                            <p class="text-gray-600 mb-6 leading-relaxed">
                                Connecting exceptional talent with visionary companies while empowering transformative career journeys.
                            </p>
                            <button> <a href="https://zenwana.com/services.html#recruitment" class="group/btn bg-gradient-to-r from-brand-pink to-purple-500 text-white px-6 py-3 rounded-full font-semibold hover:shadow-lg hover:scale-105 transition-all duration-300 flex items-center">
                                Explore 
                                <svg class="ml-2 w-4 h-4 group-hover/btn:translate-x-2 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                                </svg>
                                </a>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Financial & Payroll -->
                <div class="gradient-border service-card animate-scale-bounce" style="animation-delay: 0.2s;">
                    <div class="card-inner overflow-hidden group">
                        <div class="relative h-64 overflow-hidden">
                            <img src="images/finance.jpeg" 
                                 class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-125" 
                                 alt="Financial Documents">
                            <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/20 to-transparent"></div>
                            <div class="absolute top-4 right-4 service-icon">
                                <div class="w-14 h-14 bg-gradient-to-r from-blue-500 to-cyan-400 rounded-2xl flex items-center justify-center shadow-lg">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                    </svg>
                                </div>
                            </div>
                        </div>
                        <div class="p-8">
                            <h3 class="text-2xl font-bold text-dark-text mb-4 group-hover:text-brand-blue transition-colors">
                                Financial & Payroll
                            </h3>
                            <p class="text-gray-600 mb-6 leading-relaxed">
                                Streamlining business finances with precision bookkeeping, payroll management, and strategic accounting.
                            </p>
                           <button> <a href="https://zenwana.com/services.html#financial" class="group/btn bg-gradient-to-r from-blue-500 to-cyan-400 text-white px-6 py-3 rounded-full font-semibold hover:shadow-lg hover:scale-105 transition-all duration-300 flex items-center">
                                Explore 
                                <svg class="ml-2 w-4 h-4 group-hover/btn:translate-x-2 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                                </svg>
                            </a>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Corporate Training -->
                <div class="gradient-border service-card animate-scale-bounce" style="animation-delay: 0.3s;">
                    <div class="card-inner overflow-hidden group">
                        <div class="relative h-64 overflow-hidden">
                            <img src="images/training.jpeg" 
                                 class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-125" 
                                 alt="Corporate Training Session">
                            <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/20 to-transparent"></div>
                            <div class="absolute top-4 right-4 service-icon">
                                <div class="w-14 h-14 bg-gradient-to-r from-green-500 to-teal-400 rounded-2xl flex items-center justify-center shadow-lg">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                                    </svg>
                                </div>
                            </div>
                        </div>
                        <div class="p-8">
                            <h3 class="text-2xl font-bold text-dark-text mb-4 group-hover:text-green-500 transition-colors">
                                Corporate Training
                            </h3>
                            <p class="text-gray-600 mb-6 leading-relaxed">
                                Elevating team potential through immersive training programs in sales excellence and customer care mastery.
                            </p>
                            <button> <a href="https://zenwana.com/services.html#training" class="group/btn bg-gradient-to-r from-green-500 to-teal-400 text-white px-6 py-3 rounded-full font-semibold hover:shadow-lg hover:scale-105 transition-all duration-300 flex items-center">
                                Explore 
                                <svg class="ml-2 w-4 h-4 group-hover/btn:translate-x-2 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                                </svg>
                                </a>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Luxury Product Imports -->
                <div class="gradient-border service-card animate-scale-bounce" style="animation-delay: 0.4s;">
                    <div class="card-inner overflow-hidden group">
                        <div class="relative h-64 overflow-hidden">
                            <img src="/images/luxury imports.png" 
                                 class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-125" 
                                 alt="Luxury Perfumes">
                            <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/20 to-transparent"></div>
                            <div class="absolute top-4 right-4 service-icon">
                                <div class="w-14 h-14 bg-gradient-to-r from-yellow-500 to-orange-400 rounded-2xl flex items-center justify-center shadow-lg">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M5 8h14M5 8a2 2 0 110-4h14a2 2 0 110 4M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8m-9 4h4" />
                                    </svg>
                                </div>
                            </div>
                        </div>
                        <div class="p-8">
                            <h3 class="text-2xl font-bold text-dark-text mb-4 group-hover:text-yellow-500 transition-colors">
                                Luxury Product Imports
                            </h3>
                            <p class="text-gray-600 mb-6 leading-relaxed">
                                Curating and delivering the world's most exquisite perfumes and premium skincare collections.
                            </p>
                            <button> <a href="https://zenwana.com/services.html#imports" class="group/btn bg-gradient-to-r from-yellow-500 to-orange-400 text-white px-6 py-3 rounded-full font-semibold hover:shadow-lg hover:scale-105 transition-all duration-300 flex items-center">
                                Explore 
                                <svg class="ml-2 w-4 h-4 group-hover/btn:translate-x-2 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                                </svg>
                                </a>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Pet Relocation -->
                <div class="gradient-border service-card animate-scale-bounce" style="animation-delay: 0.5s;">
                    <div class="card-inner overflow-hidden group">
                        <div class="relative h-64 overflow-hidden">
                            <img src="/images/pet relocation.png" 
                                 class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-125" 
                                 alt="Cat in a Carrier">
                            <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/20 to-transparent"></div>
                            <div class="absolute top-4 right-4 service-icon">
                                <div class="w-14 h-14 bg-gradient-to-r from-purple-500 to-pink-400 rounded-2xl flex items-center justify-center shadow-lg">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M14.828 14.828a4 4 0 01-5.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                </div>
                            </div>
                        </div>
                        <div class="p-8">
                            <h3 class="text-2xl font-bold text-dark-text mb-4 group-hover:text-purple-500 transition-colors">
                                Pet Relocation
                            </h3>
                            <p class="text-gray-600 mb-6 leading-relaxed">
                                Ensuring safe, seamless, and stress-free international journeys for your cherished companions.
                            </p>
                            <button> <a href="https://zenwana.com/services.html#pet" class="group/btn bg-gradient-to-r from-purple-500 to-pink-400 text-white px-6 py-3 rounded-full font-semibold hover:shadow-lg hover:scale-105 transition-all duration-300 flex items-center">
                                Explore 
                                <svg class="ml-2 w-4 h-4 group-hover/btn:translate-x-2 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                                </svg>
                                </a>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Custom Solutions -->
                <div class="animated-gradient service-card text-white rounded-xl shadow-2xl overflow-hidden group animate-scale-bounce" style="animation-delay: 0.6s;">
                    <div class="p-10 flex flex-col items-center justify-center text-center h-full relative">
                        <!-- Glassmorphism overlay -->
                        <div class="absolute inset-0 glassmorphism"></div>
                        
                        <div class="relative z-10">
                            <div class="w-24 h-24 rounded-3xl bg-white/20 backdrop-blur-sm flex items-center justify-center mb-8 service-icon border border-white/30">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.546-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </div>
                            
                            <h3 class="text-3xl font-bold mb-6">Got Something Unique?</h3>
                            <p class="text-white/90 mb-8 text-lg leading-relaxed">
                                We excel at turning complex challenges into innovative solutions. Let's create something extraordinary together.
                            </p>
                            
                            <button class="group/btn bg-white/20 backdrop-blur-sm border border-white/30 text-white px-8 py-4 rounded-full font-semibold hover:bg-white hover:text-gray-900 transition-all duration-300 flex items-center mx-auto">
                                Let's Talk 
                                <svg class="ml-3 w-5 h-5 group-hover/btn:translate-x-2 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Call to Action -->
            <div class="text-center mt-16">
                <div class="inline-flex items-center justify-center p-1 rounded-full bg-gradient-to-r from-brand-pink to-brand-blue">
                    <a href="https://zenwana.com/services.html">
    <button class="bg-white text-gray-900 px-8 py-4 rounded-full font-bold text-lg hover:bg-gray-50 transition-colors duration-300 flex items-center">
        View All Services
        <svg class="ml-3 w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"></path>
        </svg>
    </button>
</a>

                </div>
            </div>
        </div>
    </section>

        <section id="about" class="py-20 bg-white relative">
            <div class="bubbles-container"></div>
            <div class="container mx-auto px-6 relative">
                <div class="text-center mb-12">
                     <h5 class="text-3xl md:text-3xl font-black text-transparent bg-clip-text bg-gradient-to-r from-brand-pink to-brand-blue mb-6 animate-slide-up">
                    The Zenwana Advantage
                </h5>
                 
                    <p class="text-lg text-gray-600 mt-2 fade-in-element"></p>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-10 text-center">
                    <div class="p-6 stagger-card">
                        <div class="flex justify-center mb-4">
                            <div class="bg-brand-blue/10 text-brand-blue w-20 h-20 rounded-full flex items-center justify-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                            </div>
                        </div>
                        <h3 class="text-xl font-bold text-dark-text mb-2">Proven Experience</h3>
                        <p class="text-gray-600">Our team consists of industry veterans with a track record of delivering exceptional results across all our service areas.</p>
                    </div>
                    <div class="p-6 stagger-card">
                        <div class="flex justify-center mb-4">
                            <div class="bg-brand-blue/10 text-brand-blue w-20 h-20 rounded-full flex items-center justify-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9V3m0 18a9 9 0 009-9m-9 9a9 9 0 00-9-9" /></svg>
                            </div>
                        </div>
                        <h3 class="text-xl font-bold text-dark-text mb-2">Global & Local Reach</h3>
                        <p class="text-gray-600">Whether you're sourcing talent internationally or need local business support, we have the network to help you succeed.</p>
                    </div>
                    <div class="p-6 stagger-card">
                        <div class="flex justify-center mb-4">
                            <div class="bg-brand-blue/10 text-brand-blue w-20 h-20 rounded-full flex items-center justify-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M13 10V3L4 14h7v7l9-11h-7z" /></svg>
                            </div>
                        </div>
                        <h3 class="text-xl font-bold text-dark-text mb-2">Client-Centric Approach</h3>
                        <p class="text-gray-600">Your goals are our priority. We provide tailored solutions and dedicated support to ensure your complete satisfaction.</p>
                    </div>
                </div>
            </div>
        </section>

       <section id="contact" class="text-light animated-gradient">
            <div class="container mx-auto px-6 py-20 text-center">
                <h2 class="text-3xl md:text-4xl font-bold mb-4 fade-in-element">Ready to take the next step?</h2>
                <p class="text-lg text-gray-300 max-w-2xl mx-auto mb-8 fade-in-element">Let's discuss how Zenwana can help you achieve your goals. Get in touch for a no-obligation consultation.</p>
                <a href="#contact" class="bg-brand-pink text-white font-bold px-8 py-4 rounded-lg btn-animated fade-in-element">Get a Free Consultation</a>
            </div>
        </section>
    </main>

    <footer class="bg-footer-bg text-gray-300">
        <div class="container mx-auto px-6 py-12">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                <div class="col-span-1 md:col-span-2">
                  <h3 class="mb-2 fade-in-element">
    <img src="/images/Zenwana Logofooter.png" alt="Zenwana Logo" class="h-12 w-auto">
</h3>

                    <p class="max-w-md fade-in-element">Your trusted partner for professional services, corporate solutions, and bespoke imports. We are committed to excellence and your success.</p>
                </div>
                <div>
                    <h4 class="text-lg font-semibold text-white mb-4 fade-in-element">Quick Links</h4>
                    <ul class="space-y-2">
                        <li><a href="#about" class="footer-link hover:text-brand-pink transition-colors">About Us</a></li>
                        <li><a href="#services" class="footer-link hover:text-brand-pink transition-colors">Services</a></li>
                        <li><a href="#contact" class="footer-link hover:text-brand-pink transition-colors">Contact</a></li>
                        <li><a href="#" class="footer-link hover:text-brand-pink transition-colors">Privacy Policy</a></li>
                    </ul>
                </div>
             <div>
                <h4 class="text-xl font-semibold mb-4">Contact Us</h4>
                <ul class="space-y-3 text-gray-300">
                    <li class="flex items-center space-x-3">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-brand-turquoise" viewBox="0 0 20 20" fill="currentColor">
                            <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z" />
                            <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z" />
                        </svg>
                        <a href="mailto:info@zenwana.com" class="hover:text-primary transition">info@zenwana.com</a>
                    </li>
                    <li class="flex items-center space-x-3">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-brand-turquoise" viewBox="0 0 20 20" fill="currentColor">
                            <path d="M2 3a1 1 0 011-1h2.153a1 1 0 01.986.836l.74 4.435a1 1 0 01-.54 1.06l-1.518.76a11.034 11.034 0 006.364 6.364l.76-1.518a1 1 0 011.06-.54l4.435.74a1 1 0 01.836.986V17a1 1 0 01-1 1h-2C7.82 18 2 12.18 2 5V3z" />
                        </svg>
                        <a href="tel:+974 7005 3053" class="hover:text-primary transition">Call: +974 7005 3053</a>
                    </li>
                    <li class="flex items-center space-x-3">
                         <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-brand-turquoise" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.894 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.452-4.433-9.888-9.888-9.888-5.451 0-9.887 4.436-9.888 9.888-.001 2.225.651 4.315 1.731 6.086l.474.852-.352 2.054.496.498zM9.232 8.219c-.219-.484-.442-.484-.638-.492-.182-.012-.39-.012-.596-.012-2.225.012-3.323 1.343-3.323 2.946 0 1.603 1.144 3.254 1.309 3.469.165.215.216.316.304.469.246.42.927 1.46 2.225 2.036 1.299.576 2.14.864 2.862.864.722 0 1.299-.18 1.494-.42.195-.24.786-.965.899-1.291.113-.326.113-.596.088-.71-.025-.114-.113-.18-.24-.304-.127-.124-.27-.18-.418-.24-.149-.06-.316-.088-.469-.088-.152 0-.368.062-.519.24-.152.18-.546.638-.663.756-.117.117-.216.141-.38.059-.165-.082-.663-.24-1.262-.765-.48-.42-.786-.81-.874-.965-.088-.152-.025-.24.062-.326.088-.086.195-.215.292-.326.098-.111.127-.18.19-.304.062-.124.037-.24-.013-.326-.05-.086-.24-.576-.326-.787z"/>
                        </svg>
                        <a href="https://wa.me/+97470053053" target="_blank" class="hover:text-primary transition">WhatsApp: +974 7005 3053</a>
                    </li>
                    <li class="flex items-start space-x-3">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-brand-turquoise flex-shrink-0 mt-1" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd" />
                        </svg>
                        <span>Doha, Qatar</span>
                    </li>
                </ul>
            </div>
            </div>
            <div class="mt-12 border-t border-gray-700 pt-8 text-center text-gray-400">
                <p class="fade-in-element">&copy; 2025 Zenwana.com. All Rights Reserved.</p>
            </div>
        </div>
    </footer>

    <div class="fab-container">
        <button @click="aiModalOpen = true" class="fab" title="Ask AI Assistant">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-6-3a2 2 0 11-4 0 2 2 0 014 0zm-2 4a5 5 0 00-4.546 2.916A5.986 5.986 0 0010 16a5.986 5.986 0 004.546-2.084A5 5 0 0010 11z" clip-rule="evenodd" />
            </svg>
        </button>
        <a href="https://wa.me/94717872749" target="_blank" class="fab whatsapp" title="Chat on WhatsApp">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" viewBox="0 0 24 24" fill="currentColor">
                <path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.894 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.452-4.433-9.888-9.888-9.888-5.451 0-9.887 4.436-9.888 9.888-.001 2.225.651 4.315 1.731 6.086l.474.852-.352 2.054.496.498zM9.232 8.219c-.219-.484-.442-.484-.638-.492-.182-.012-.39-.012-.596-.012-2.225.012-3.323 1.343-3.323 2.946 0 1.603 1.144 3.254 1.309 3.469.165.215.216.316.304.469.246.42.927 1.46 2.225 2.036 1.299.576 2.14.864 2.862.864.722 0 1.299-.18 1.494-.42.195-.24.786-.965.899-1.291.113-.326.113-.596.088-.71-.025-.114-.113-.18-.24-.304-.127-.124-.27-.18-.418-.24-.149-.06-.316-.088-.469-.088-.152 0-.368.062-.519.24-.152.18-.546.638-.663.756-.117.117-.216.141-.38.059-.165-.082-.663-.24-1.262-.765-.48-.42-.786-.81-.874-.965-.088-.152-.025-.24.062-.326.088-.086.195-.215.292-.326.098-.111.127-.18.19-.304.062-.124.037-.24-.013-.326-.05-.086-.24-.576-.326-.787z"/>
            </svg>
        </a>
    </div>

    <div x-show="aiModalOpen" @click.away="aiModalOpen = false" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-200" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" class="fixed inset-0 z-[101] flex items-center justify-center p-4 ai-modal-overlay" style="display: none;">
        <div @click.stop class="bg-white rounded-2xl shadow-2xl w-full max-w-lg p-6 md:p-8 transform transition-all" x-show="aiModalOpen" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100" x-transition:leave="transition ease-in duration-200" x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-95">
            <div class="flex justify-between items-center mb-4">
                <h3 class="text-2xl font-bold text-dark-text">Ask AI Assistant</h3>
                <button @click="aiModalOpen = false" class="text-gray-400 hover:text-gray-600">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                </button>
            </div>
            <div class="space-y-4">
                <p class="text-gray-600">I'm here to help! What can I assist you with today regarding our services?</p>
                <textarea id="ai-prompt" rows="4" class="w-full border border-gray-300 rounded-lg p-3 focus:ring-2 focus:ring-brand-blue focus:border-brand-blue transition" placeholder="e.g., 'Tell me more about pet relocation to the UK'"></textarea>
                <div id="ai-response" class="bg-gray-50 rounded-lg p-3 min-h-[50px] text-gray-700 hidden"></div>
                <button id="ai-submit" class="w-full bg-brand-pink text-white font-bold py-3 px-4 rounded-lg btn-animated flex items-center justify-center">
                    <span id="ai-submit-text">Ask Question</span>
                    <svg id="ai-loading-spinner" class="animate-spin -ml-1 mr-3 h-5 w-5 text-white hidden" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <script src="https://unpkg.com/flickity@2/dist/flickity.pkgd.min.js"></script>
    
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Intersection Observer for fade-in animations
            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('fade-in-element');
                        observer.unobserve(entry.target);
                    }
                });
            }, { threshold: 0.1 });

            document.querySelectorAll('section h2, section p, .grid > div:not(.stagger-card)').forEach(elem => {
                elem.style.opacity = '0';
                observer.observe(elem);
            });

            // Smooth scrolling for anchor links
            document.querySelectorAll('a[href^="#"]').forEach(anchor => {
                anchor.addEventListener('click', function (e) {
                    e.preventDefault();
                    document.querySelector(this.getAttribute('href')).scrollIntoView({
                        behavior: 'smooth'
                    });
                });
            });

            const aiSubmitButton = document.getElementById('ai-submit');
            const aiPromptInput = document.getElementById('ai-prompt');
            const aiResponseContainer = document.getElementById('ai-response');
            const aiSubmitText = document.getElementById('ai-submit-text');
            const aiLoadingSpinner = document.getElementById('ai-loading-spinner');

            aiSubmitButton.addEventListener('click', async () => {
                const prompt = aiPromptInput.value.trim();
                if (!prompt) {
                    aiResponseContainer.textContent = "Please enter a question.";
                    aiResponseContainer.classList.remove('hidden');
                    return;
                }

                aiSubmitText.classList.add('hidden');
                aiLoadingSpinner.classList.remove('hidden');
                aiSubmitButton.disabled = true;
                aiResponseContainer.classList.add('hidden');

                try {
                    const chatHistory = [{ role: "user", parts: [{ text: `You are a helpful AI assistant for Zenwana.com, a company providing services in Recruitment, Finance & Payroll, Corporate Training, Luxury Imports, and Pet Relocation. Based on the website's context, answer the following user question concisely and helpfully. User question: "${prompt}"` }] }];
                    const payload = { contents: chatHistory };
                    const apiKey = "AIzaSyBBXN_8ISEOU0srdILhW5t73yfUinhYj1k"; // API Key is left empty to be securely injected by the environment
                    const apiUrl = `https://generativelanguage.googleapis.com/v1beta/models/gemini-2.5-flash-preview-05-20:generateContent?key=${apiKey}`;
                    
                    const response = await fetch(apiUrl, {
                        method: 'POST',
                        headers: { 'Content-Type': 'application/json' },
                        body: JSON.stringify(payload)
                    });

                    if (!response.ok) {
                        throw new Error(`API error: ${response.statusText}`);
                    }

                    const result = await response.json();
                    
                    let text = "Sorry, I couldn't generate a response. Please try again.";
                    if (result.candidates && result.candidates.length > 0 &&
                        result.candidates[0].content && result.candidates[0].content.parts &&
                        result.candidates[0].content.parts.length > 0) {
                        text = result.candidates[0].content.parts[0].text;
                    }
                    
                    aiResponseContainer.textContent = text;
                    aiResponseContainer.classList.remove('hidden');
                } catch (error) {
                    console.error("AI Assistant Error:", error);
                    aiResponseContainer.textContent = "There was an error connecting to the AI assistant. Please check your connection or try again later.";
                    aiResponseContainer.classList.remove('hidden');
                } finally {
                    aiSubmitText.classList.remove('hidden');
                    aiLoadingSpinner.classList.add('hidden');
                    aiSubmitButton.disabled = false;
                }
            });

            // Contact Form Logic
            const form = document.getElementById('contactForm');
            const submitButton = form.querySelector('button[type="submit"]');
            const submitText = document.getElementById('submitText');
            const submitSpinner = document.getElementById('submitSpinner');
            const successMessage = document.getElementById('formSuccess');
            const errorMessage = document.getElementById('formError');

            const validateEmail = (email) => /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email);
            const validatePhone = (phone) => phone === '' || /^\+?\d{10,14}$/.test(phone.replace(/\s/g, ''));

            const showError = (field, message) => {
                const errorElement = document.getElementById(`${field}Error`);
                if(errorElement) {
                    errorElement.textContent = message;
                    errorElement.classList.remove('hidden');
                }
            };

            const clearErrors = () => {
                ['name', 'email', 'phone', 'service', 'message'].forEach(field => {
                    const errorElement = document.getElementById(`${field}Error`);
                    if (errorElement) errorElement.classList.add('hidden');
                });
                successMessage.classList.add('hidden');
                errorMessage.classList.add('hidden');
            };

            form.addEventListener('submit', async (e) => {
                e.preventDefault();
                clearErrors();

                const formData = new FormData(form);
                const data = Object.fromEntries(formData.entries());
                
                let isValid = true;

                if (!data.name.trim()) {
                    showError('name', 'Please enter your full name');
                    isValid = false;
                }
                if (!data.email.trim() || !validateEmail(data.email)) {
                    showError('email', 'Please enter a valid email address');
                    isValid = false;
                }
                if (data.phone.trim() && !validatePhone(data.phone)) {
                    showError('phone', 'Please enter a valid phone number');
                    isValid = false;
                }
                if (!data.service) {
                    showError('service', 'Please select a service');
                    isValid = false;
                }
                if (!data.message.trim()) {
                    showError('message', 'Please enter your message');
                    isValid = false;
                }

                if (!isValid) return;

                submitText.classList.add('hidden');
                submitSpinner.classList.remove('hidden');
                submitButton.disabled = true;

                try {
                    // Simulate API call
                    await new Promise(resolve => setTimeout(resolve, 1500));
                    console.log("Form Submitted:", data);
                    // In a real application, you would fetch to your backend here.
                    // For example:
                    // const response = await fetch('YOUR_API_ENDPOINT', {
                    //     method: 'POST',
                    //     headers: { 'Content-Type': 'application/json' },
                    //     body: JSON.stringify(data)
                    // });
                    // if (!response.ok) throw new Error('Network response was not ok.');
                    
                    form.reset();
                    successMessage.classList.remove('hidden');

                } catch (error) {
                    console.error('Form submission error:', error);
                    errorMessage.classList.remove('hidden');
                } finally {
                    submitText.classList.remove('hidden');
                    submitSpinner.classList.add('hidden');
                    submitButton.disabled = false;
                }
            });

            // Create bubbles for the background
            const bubblesContainer = document.querySelector('.bubbles-container');
            if(bubblesContainer) {
                const numberOfBubbles = 20;
                for (let i = 0; i < numberOfBubbles; i++) {
                    const bubble = document.createElement('div');
                    bubble.classList.add('bubble');
                    const size = Math.random() * 80 + 20;
                    bubble.style.width = `${size}px`;
                    bubble.style.height = `${size}px`;
                    bubble.style.left = `${Math.random() * 100}%`;
                    bubble.style.animationDuration = `${Math.random() * 10 + 8}s`;
                    bubble.style.animationDelay = `${Math.random() * 5}s`;
                    bubblesContainer.appendChild(bubble);
                }
            }
        });
    </script>
</body>
</html>
