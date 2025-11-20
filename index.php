<?php
include dirname(__FILE__) . '/.private/config.php';
?>
<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- Enhanced SEO Meta Tags -->
    <title>ATB Group Qatar | Road Safety & Traffic Management Solutions | Ashghal Approved</title>
    <meta name="description" content="ATB Group is Qatar's trusted specialist in road safety and traffic management solutions. Ashghal-approved services: Temporary Traffic Management (TTM), TMA rental, Road Opening (RO) permits, Traffic Diversion Plans (TDP), Road Safety Audits, and complete road infrastructure services in Doha.">
    <meta name="keywords" content="Traffic Management Qatar, Road Safety Qatar, ATB Group Qatar, Ashghal Approved Contractor, TMA Rental Qatar, Road Opening Permits Qatar, Traffic Diversion Plans, TDP, WZTMG, Road Safety Audits Qatar, Road Marking Qatar, Interlock Qatar, Construction Company Qatar">
    <meta name="author" content="ATB Group">
    <meta name="robots" content="index, follow">
    <link rel="canonical" href="https://www.atbgroup.qa">
    
    <!-- Open Graph / Social Media Meta Tags -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="https://www.atbgroup.qa">
    <meta property="og:title" content="ATB Group Qatar - Leading Road Safety & Traffic Management Solutions">
    <meta property="og:description" content="Qatar's trusted Ashghal-approved specialist for traffic management, TMA rental, TDP design, and road safety solutions.">
    <meta property="og:image" content="https://images.unsplash.com/photo-1581092918056-0c4c3acd3789?q=80&w=2070&auto=format&fit=crop">
    
    <!-- Twitter Card Meta Tags -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="ATB Group Qatar - Traffic Management & Road Safety Excellence">
    <meta name="twitter:description" content="Leading traffic management and road safety solutions provider in Qatar.">
    <meta name="twitter:image" content="https://images.unsplash.com/photo-1581092918056-0c4c3acd3789?q=80&w=2070&auto=format&fit=crop">
    
    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="images/ATB-01.png">
    
    <!-- Preconnect for Performance -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="preconnect" href="https://unpkg.com">
    <link rel="preconnect" href="https://cdn.tailwindcss.com">
    <link rel="preconnect" href="https://images.unsplash.com">
    <link rel="preconnect" href="https://placehold.co">
    
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800;900&family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    
    <!-- Flickity Slider CSS -->
    <link rel="stylesheet" href="https://unpkg.com/flickity@2/dist/flickity.min.css">
    
    <!-- AlpineJS -->
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    
    <!-- Structured Data for SEO -->
    <script type="application/ld+json">
    {
      "@context": "https://schema.org",
      "@type": "Organization",
      "name": "ATB Group (Allied Techno Builders Group)",
      "alternateName": "ATB Group Qatar",
      "description": "Leading traffic management and road safety solutions company in Qatar. Ashghal approved.",
      "url": "https://www.atbgroup.qa",
      "logo": "https://www.atbgroup.qa/logo.png",
      "address": {
        "@type": "PostalAddress",
        "streetAddress": "Building No. 311, Street 230, Zone 40, C-Ring Road",
        "addressLocality": "Doha",
        "postalCode": "39492",
        "addressCountry": "QA"
      },
      "contactPoint": {
        "@type": "ContactPoint",
        "telephone": "+974-3049-0205",
        "contactType": "Customer Service",
        "areaServed": "QA",
        "availableLanguage": ["English", "Arabic"]
      },
      "sameAs": [
        "https://www.facebook.com/atb.qa/",
        "https://www.linkedin.com/company/atb-qatar",
        "https://x.com/atb_qatar",
        "https://www.instagram.com/atb.qatar/"
      ]
    }
    </script>
    
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['Inter', 'sans-serif'],
                        heading: ['Poppins', 'sans-serif'],
                    },
                    colors: {
                        'brand-dark': '#1a1f2e',
                        'brand-primary': '#0a4d8c', // Blue from logo
                        'brand-accent': '#f59e0b', // Yellow from logo
                        'brand-accent-dark': '#d97706',
                        'brand-light': '#f8fafc',
                        'qatar-maroon': '#8b1538', // Red from logo
                    },
                    animation: {
                        'fade-in-up': 'fadeInUp 0.8s ease-out forwards',
                        'slide-in-left': 'slideInLeft 0.8s ease-out forwards',
                        'slide-in-right': 'slideInRight 0.8s ease-out forwards',
                        'zoom-in': 'zoomIn 0.6s ease-out forwards',
                        'float': 'float 3s ease-in-out infinite',
                    },
                    keyframes: {
                        fadeInUp: {
                            'from': { opacity: '0', transform: 'translateY(40px)' },
                            'to': { opacity: '1', transform: 'translateY(0)' },
                        },
                        slideInLeft: {
                            'from': { opacity: '0', transform: 'translateX(-40px)' },
                            'to': { opacity: '1', transform: 'translateX(0)' },
                        },
                        slideInRight: {
                            'from': { opacity: '0', transform: 'translateX(40px)' },
                            'to': { opacity: '1', transform: 'translateX(0)' },
                        },
                        zoomIn: {
                            'from': { opacity: '0', transform: 'scale(0.9)' },
                            'to': { opacity: '1', transform: 'scale(1)' },
                        },
                        float: {
                            '0%, 100%': { transform: 'translateY(0)' },
                            '50%': { transform: 'translateY(-10px)' },
                        }
                    }
                }
            }
        }
    </script>
    
    <style>
        /* Modern Custom Scrollbar */
        ::-webkit-scrollbar {
            width: 10px;
        }
        ::-webkit-scrollbar-track {
            background: #1a1f2e;
        }
        ::-webkit-scrollbar-thumb {
            background: linear-gradient(180deg, #f59e0b, #d97706);
            border-radius: 10px;
        }
        ::-webkit-scrollbar-thumb:hover {
            background: linear-gradient(180deg, #d97706, #b45309);
        }

        /* Hero Carousel Styles */
        .hero-carousel {
            height: 100vh;
            min-height: 700px;
            max-height: 900px;
        }
        
        .carousel-cell {
            width: 100%;
            height: 100%;
        }
        
        .hero-slide {
            width: 100%;
            height: 100%;
            background-size: cover;
            background-position: center;
            position: relative;
        }
        
        .hero-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(135deg, rgba(26, 31, 46, 0.92) 0%, rgba(10, 77, 140, 0.88) 50%, rgba(139, 21, 56, 0.85) 100%);
            display: flex;
            align-items: center;
            justify-content: center;
        }
        
        /* Animated slide content */
        .hero-content {
            opacity: 0;
        }
        
        .is-selected .hero-content {
            opacity: 1;
        }
        
        .is-selected .slide-label {
            animation: slideInLeft 0.8s ease-out 0.3s forwards;
            opacity: 0;
        }
        
        .is-selected .slide-title {
            animation: zoomIn 0.9s ease-out 0.5s forwards;
            opacity: 0;
        }
        
        .is-selected .slide-description {
            animation: fadeInUp 0.9s ease-out 0.7s forwards;
            opacity: 0;
        }
        
        .is-selected .slide-cta {
            animation: fadeInUp 0.9s ease-out 0.9s forwards;
            opacity: 0;
        }

        /* Modern Flickity UI */
        .flickity-page-dots {
            bottom: 30px;
            z-index: 10;
        }
        
        .flickity-page-dots .dot {
            width: 14px;
            height: 14px;
            background: rgba(255, 255, 255, 0.4);
            border: 2px solid transparent;
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        }
        
        .flickity-page-dots .dot.is-selected {
            background: #f59e0b;
            border-color: #fff;
            width: 40px;
            border-radius: 8px;
            box-shadow: 0 0 20px rgba(245, 158, 11, 0.6);
        }
        
        .flickity-prev-next-button {
            width: 60px;
            height: 60px;
            background: rgba(255, 255, 255, 0.15);
            backdrop-filter: blur(10px);
            border: 2px solid rgba(255, 255, 0.2);
            transition: all 0.3s ease;
        }
        
        .flickity-prev-next-button:hover {
            background: rgba(245, 158, 11, 0.95);
            border-color: #f59e0b;
            transform: scale(1.1);
            box-shadow: 0 8px 25px rgba(245, 158, 11, 0.4);
        }
        
        .flickity-prev-next-button .flickity-button-icon {
            color: white;
        }
        
        .flickity-prev-next-button.previous { left: 30px; }
        .flickity-prev-next-button.next { right: 30px; }

        /* Service Cards - Ultra Modern Design [MODIFIED] */
        .service-card {
            background: linear-gradient(145deg, #ffffff, #f8fafc);
            border: 1px solid rgba(10, 77, 140, 0.1);
            border-radius: 20px;
            padding: 0; /* MODIFIED: Removed padding */
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            position: relative;
            overflow: hidden;
            display: flex; /* Added for layout */
            flex-direction: column; /* Added for layout */
        }

        .service-card-content {
            flex-grow: 1; /* Allows content to grow */
        }
        
        .service-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(135deg, rgba(245, 158, 11, 0.05), rgba(10, 77, 140, 0.05));
            opacity: 0;
            transition: opacity 0.4s ease;
        }
        
        .service-card:hover {
            transform: translateY(-10px); /* MODIFIED: Adjusted transform */
            box-shadow: 0 25px 50px -12px rgba(10, 77, 140, 0.25);
            border-color: #f59e0b;
        }
        
        .service-card:hover::before {
            opacity: 1;
        }
        
        /* REMOVED .service-icon and .service-card:hover .service-icon styles */

        /* Stats Counter */
        .stat-card {
            background: linear-gradient(135deg, rgba(255, 255, 255, 0.1), rgba(255, 255, 255, 0.05));
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
            border-radius: 20px;
            padding: 2rem;
            transition: all 0.3s ease;
        }
        
        .stat-card:hover {
            transform: translateY(-10px);
            background: linear-gradient(135deg, rgba(255, 255, 255, 0.15), rgba(255, 255, 255, 0.1));
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.3);
        }

        /* Project Cards - Modern Gallery */
        .project-card {
            position: relative;
            overflow: hidden;
            border-radius: 20px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
            transition: all 0.4s ease;
        }
        
        .project-card::after {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(135deg, rgba(245, 158, 11, 0.3), rgba(10, 77, 140, 0.3));
            opacity: 0;
            transition: opacity 0.4s ease;
        }
        
        .project-card:hover::after {
            opacity: 1;
        }
        
        .project-card img {
            transition: transform 0.6s cubic-bezier(0.4, 0, 0.2, 1);
        }
        
        .project-card:hover img {
            transform: scale(1.15) rotate(2deg);
        }
        
        .project-overlay {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            background: linear-gradient(to top, rgba(26, 31, 46, 0.98), transparent);
            padding: 2rem;
            transform: translateY(100%);
            transition: transform 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            z-index: 10;
        }
        
        .project-card:hover .project-overlay {
            transform: translateY(0);
        }

        /* Modern Buttons */
        .btn-primary {
            background: linear-gradient(135deg, #f59e0b, #d97706);
            color: #1a1f2e;
            font-weight: 700;
            padding: 1rem 2.5rem;
            border-radius: 50px;
            text-transform: uppercase;
            letter-spacing: 1px;
            box-shadow: 0 10px 25px rgba(245, 158, 11, 0.4);
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            display: inline-block;
            position: relative;
            overflow: hidden;
        }
        
        .btn-primary::before {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            width: 0;
            height: 0;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.3);
            transform: translate(-50%, -50%);
            transition: width 0.6s, height 0.6s;
        }
        
        .btn-primary:hover::before {
            width: 300px;
            height: 300px;
        }
        
        .btn-primary:hover {
            transform: translateY(-3px);
            box-shadow: 0 15px 35px rgba(245, 158, 11, 0.6);
        }
        
        .btn-secondary {
            background: transparent;
            border: 3px solid #f59e0b;
            color: #fff;
            font-weight: 700;
            padding: 1rem 2.5rem;
            border-radius: 50px;
            text-transform: uppercase;
            letter-spacing: 1px;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            display: inline-block;
            position: relative;
            overflow: hidden;
        }
        
        .btn-secondary::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(135deg, #f59e0b, #d97706);
            transition: left 0.4s ease;
            z-index: -1;
        }
        
        .btn-secondary:hover::before {
            left: 0;
        }
        
        .btn-secondary:hover {
            color: #1a1f2e;
            border-color: #f59e0b;
            transform: translateY(-3px);
            box-shadow: 0 10px 25px rgba(245, 158, 11, 0.4);
        }

        /* Form Enhancements */
        input, textarea, select {
            transition: all 0.3s ease;
        }
        
        input:focus, textarea:focus, select:focus {
            outline: none;
            border-color: #f59e0b;
            box-shadow: 0 0 0 4px rgba(245, 158, 11, 0.2);
            transform: translateY(-2px);
        }

        /* Floating Animation for Icons */
        .float-animation {
            animation: float 3s ease-in-out infinite;
        }

        /* Responsive Adjustments */
        @media (max-width: 768px) {
            .hero-carousel {
                height: 80vh;
                min-height: 600px;
            }
            
            .flickity-prev-next-button {
                display: none;
            }
        }

        /* Loading Animation */
        .spinner {
            border: 3px solid rgba(255, 255, 255, 0.3);
            border-top: 3px solid #f59e0b;
            border-radius: 50%;
            width: 24px;
            height: 24px;
            animation: spin 0.8s linear infinite;
        }
        
        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }

        /* Accessibility - Skip to content */
        .skip-to-content {
            position: absolute;
            top: -40px;
            left: 0;
            background: #f59e0b;
            color: #1a1f2e;
            padding: 8px;
            text-decoration: none;
            z-index: 100;
        }
        
        .skip-to-content:focus {
            top: 0;
        }

        /* FIX: Added Keyframes Globally */
        @keyframes fadeInUp {
            from { opacity: 0; transform: translateY(40px); }
            to { opacity: 1; transform: translateY(0); }
        }

        @keyframes slideInLeft {
            from { opacity: 0; transform: translateX(-40px); }
            to { opacity: 1; transform: translateX(0); }
        }

        @keyframes slideInRight {
            from { opacity: 0; transform: translateX(40px); }
            to { opacity: 1; transform: translateX(0); }
        }

        @keyframes zoomIn {
            from { opacity: 0; transform: scale(0.9); }
            to { opacity: 1; transform: scale(1); }
        }

        @keyframes float {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-10px); }
        }
    </style>
    <script src="https://analytics.lmwebvista.com/script.js" data-website-id="8ea30f22-6c93-409e-9953-e72f1e39102b"></script>
</head>
<body class="bg-white text-brand-dark font-sans antialiased">
    <!-- Skip to Content for Accessibility -->
    <a href="#main-content" class="skip-to-content">Skip to content</a>

    <!-- Modern Header with Glass Effect -->
    <header x-data="{ mobileMenuOpen: false, scrolled: false }" 
            @scroll.window="scrolled = window.pageYOffset > 50"
            :class="scrolled ? 'bg-brand-dark/95 backdrop-blur-md shadow-2xl' : 'bg-brand-dark'"
            class="fixed top-0 w-full z-50 transition-all duration-300">
        <nav class="container mx-auto px-4 sm:px-6 lg:px-8 py-4">
            <div class="flex justify-between items-center">
                <!-- Logo -->
               <a href="#home" class="flex items-center group">
    <img src="logo.png" alt="ATB Group Qatar Logo" class="h-20">
</a>
                
                <!-- Desktop Navigation -->
                <div class="hidden lg:flex items-center space-x-8">
                    <a href="#home" class="text-white hover:text-brand-accent transition duration-300 font-semibold">Home</a>
                    <a href="#about" class="text-white hover:text-brand-accent transition duration-300 font-semibold">About Us</a>
                    <a href="#services" class="text-white hover:text-brand-accent transition duration-300 font-semibold">Services</a>
                    <a href="#projects" class="text-white hover:text-brand-accent transition duration-300 font-semibold">Projects</a>
                    <a href="blog-article-moi.html" class="text-white hover:text-brand-accent transition duration-300 font-semibold">Blog</a>
                    <a href="/profile/atbprofile.pdf" class="bg-gradient-to-r from-brand-accent to-brand-accent-dark text-brand-dark font-bold py-3 px-6 rounded-full text-sm uppercase tracking-wider hover:shadow-xl hover:scale-105 transition-all duration-300">
                        Business Profile
                    </a>
                </div>
                
                <!-- Mobile Menu Button -->
                <button @click="mobileMenuOpen = !mobileMenuOpen" 
                        class="lg:hidden text-white focus:outline-none focus:ring-2 focus:ring-brand-accent rounded-lg p-2"
                        aria-label="Toggle mobile menu">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path :class="{'hidden': mobileMenuOpen, 'block': !mobileMenuOpen}" 
                              stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                              d="M4 6h16M4 12h16m-7 6h7"></path>
                        <path :class="{'block': mobileMenuOpen, 'hidden': !mobileMenuOpen}" 
                              stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                              d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>
            
            <!-- Mobile Menu -->
            <div x-show="mobileMenuOpen" 
                 x-transition:enter="transition ease-out duration-200"
                 x-transition:enter-start="opacity-0 transform -translate-y-4"
                 x-transition:enter-end="opacity-100 transform translate-y-0"
                 x-transition:leave="transition ease-in duration-150"
                 x-transition:leave-start="opacity-100 transform translate-y-0"
                 x-transition:leave-end="opacity-0 transform -translate-y-4"
                 class="lg:hidden mt-4 pb-4" 
                 style="display: none;">
                <div class="flex flex-col space-y-4 bg-brand-dark/50 backdrop-blur-lg rounded-2xl p-6">
                    <a href="#home" @click="mobileMenuOpen = false" class="text-white hover:text-brand-accent transition duration-300 font-semibold text-lg">Home</a>
                    <a href="#about" @click="mobileMenuOpen = false" class="text-white hover:text-brand-accent transition duration-300 font-semibold text-lg">About Us</a>
                    <a href="#services" @click="mobileMenuOpen = false" class="text-white hover:text-brand-accent transition duration-300 font-semibold text-lg">Services</a>
                    <a href="#projects" @click="mobileMenuOpen = false" class="text-white hover:text-brand-accent transition duration-300 font-semibold text-lg">Projects</a>
                    <a href="blog-article-moi.html" @click="mobileMenuOpen = false" class="text-white hover:text-brand-accent transition duration-300 font-semibold text-lg">Blog</a>
                    <a href="/profile/atbprofile.pdf" @click="mobileMenuOpen = false" class="bg-gradient-to-r from-brand-accent to-brand-accent-dark text-brand-dark font-bold py-3 px-6 rounded-full text-center uppercase tracking-wider">
                        Business Profile
                    </a>
                </div>
            </div>
        </nav>
    </header>

   <!-- Main Content -->
    <main id="main-content">
        <!-- 
          Hero Carousel Section 
          - data-flickity options control the carousel behavior.
          - We use 'imagesLoaded: true' to prevent layout jank.
          - 'adaptiveHeight: false' is set because our slides are all 100vh.
        -->
        <section id="home" class="hero-carousel" 
                 data-flickity='{ "cellAlign": "left", "contain": true, "autoPlay": 7000, "wrapAround": true, "prevNextButtons": true, "pageDots": true, "pauseAutoPlayOnHover": false, "imagesLoaded": true, "adaptiveHeight": false }'>
            
            <!-- Slide 1: Construction Excellence in Qatar -->
            <div class="carousel-cell hero-slide" 
                 style="background-image: url('https://images.unsplash.com/photo-1581092918056-0c4c3acd3789?q=80&w=2070&auto=format&fit=crop');"
                 role="img" 
                 aria-label="Traffic management and road safety equipment on construction site">
                <div class="hero-overlay">
                    <div class="container mx-auto px-4 sm:px-6 lg:px-8 hero-content text-center text-white">
                        <span class="slide-label inline-block bg-brand-accent/20 backdrop-blur-sm border border-brand-accent text-brand-accent font-bold uppercase tracking-widest text-xs md:text-sm px-4 py-2 rounded-full mb-6">Qatar's #1 in Road Safety</span>
                        <h1 class="slide-title text-4xl md:text-6xl lg:text-7xl font-black font-heading mb-6 leading-tight">
                            Number One in <span class="text-brand-accent">Road Safety</span><br class="hidden md:block"> & Traffic Management
                        </h1>
                        <p class="slide-description text-lg md:text-2xl font-light mb-10 max-w-4xl mx-auto leading-relaxed">
                            Delivering reliable, Ashghal-approved solutions from TDPs and TMA rentals to complete road safety operations and reliable traffic solutions.
                        </p>
                        <div class="slide-cta flex flex-col sm:flex-row justify-center gap-5">
                            <a href="#services" class="btn-primary">Safety Solutions</a>
                            <a href="#contact" class="btn-secondary">Get TMA Rental</a>
                        </div>
                    </div>
                </div>
            </div>
        
            
            <!-- Slide 2: Road Construction & Infrastructure -->
            <div class="carousel-cell hero-slide" 
                 style="background-image: url('https://images.unsplash.com/photo-1581092918484-8313e1f6c196?q=80&w=2070&auto=format&fit=crop');"
                 role="img" 
                 aria-label="Highway road construction project in Qatar with modern equipment">
                <div class="hero-overlay">
                    <div class="container mx-auto px-4 sm:px-6 lg:px-8 hero-content text-center text-white">
                        <span class="slide-label inline-block bg-brand-accent/20 backdrop-blur-sm border border-brand-accent text-brand-accent font-bold uppercase tracking-widest text-xs md:text-sm px-4 py-2 rounded-full mb-6">Road Infrastructure Experts</span>
                        <h1 class="slide-title text-4xl md:text-6xl lg:text-7xl font-black font-heading mb-6 leading-tight">
                            Temporary <span class="text-brand-accent">Traffic</span><br class="hidden md:block"> Management & TMA Rental
                        </h1>
                        <p class="slide-description text-lg md:text-2xl font-light mb-10 max-w-4xl mx-auto leading-relaxed">
                            We also provide Truck Mounted Attenuator (TMA) rental services, helping to protect workers and vehicles while maintaining smooth traffic flow on-site.
                        </p>
                        <div class="slide-cta flex flex-col sm:flex-row justify-center gap-5">
                            <a href="#projects" class="btn-primary">View Projects</a>
                            <a href="#contact" class="btn-secondary">Partner With Us</a>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Slide 3: Traffic Management & Safety [UPDATED IMAGE & TEXT] -->
            <div class="carousel-cell hero-slide" 
                 style="background-image: url('https://images.unsplash.com/photo-1618060931580-5f216061cff5?q=80&w=2070&auto=format&fit=crop');"
                 role="img" 
                 aria-label="A Truck Mounted Attenuator (TMA) vehicle on a highway for road safety">
                <div class="hero-overlay">
                    <div class="container mx-auto px-4 sm:px-6 lg:px-8 hero-content text-center text-white">
                        <span class="slide-label inline-block bg-brand-accent/20 backdrop-blur-sm border border-brand-accent text-brand-accent font-bold uppercase tracking-widest text-xs md:text-sm px-4 py-2 rounded-full mb-6">Ashghal Compliant</span>
                        <h1 class="slide-title text-4xl md:text-6xl lg:text-7xl font-black font-heading mb-6 leading-tight">
                            Traffic Diversion Plan <span class="text-brand-accent">(TDP)</span><br class="hidden md:block"> Design & Approval
                        </h1>
                        <p class="slide-description text-lg md:text-2xl font-light mb-10 max-w-4xl mx-auto leading-relaxed">
                            We provide Temporary Traffic Management (TTM) drawing and design services in full compliance with Ashghal's Work Zone Traffic Management Guidelines (WZTMG).
                        </p>
                        <div class="slide-cta flex flex-col sm:flex-row justify-center gap-5">
                            <a href="#services" class="btn-primary">All Services</a>
                            <a href="#contact" class="btn-secondary">Get a Quote</a>
                        </div>
                    </div>
                </div>
            </div>

        </section>
        
      
    </main>

        <!-- Stats Section -->
        <section class="py-16 bg-gradient-to-r from-brand-dark via-brand-primary to-qatar-maroon text-white">
            <div class="container mx-auto px-4 sm:px-6 lg:px-8">
                <div class="grid grid-cols-2 md:grid-cols-4 gap-6 md:gap-8">
                    <!-- Stat 1 -->
                    <div class="stat-card text-center">
                        <div class="text-4xl md:text-5xl font-black text-brand-accent mb-2" data-count="500">0</div>
                        <div class="text-sm md:text-base font-semibold uppercase tracking-wider">Projects Completed</div>
                    </div>
                    <!-- Stat 2 -->
                    <div class="stat-card text-center">
                        <div class="text-4xl md:text-5xl font-black text-brand-accent mb-2" data-count="5">0</div>
                        <div class="text-sm md:text-base font-semibold uppercase tracking-wider">Years Experience</div>
                    </div>
                    <!-- Stat 3 -->
                    <div class="stat-card text-center">
                        <div class="text-4xl md:text-5xl font-black text-brand-accent mb-2" data-count="100">0</div>
                        <div class="text-sm md:text-base font-semibold uppercase tracking-wider">Happy Clients</div>
                    </div>
                    <!-- Stat 4 -->
                    <div class="stat-card text-center">
                        <div class="text-4xl md:text-5xl font-black text-brand-accent mb-2" data-count="24">0</div>
                        <div class="text-sm md:text-base font-semibold uppercase tracking-wider">24/7 Support</div>
                    </div>
                </div>
            </div>
        </section>

        <!-- NEW: Certifications Section -->
        <section id="certifications" class="py-16 bg-brand-light">
            <div class="container mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center mb-12 animate-on-scroll" data-animation="fade-in-up">
                    <h2 class="text-3xl md:text-4xl font-heading font-black leading-tight">
                        Committed to <span class="text-brand-accent">Quality & Safety</span>
                    </h2>
                    <p class="text-lg text-gray-700 mt-4">We adhere to the highest international standards, certified for quality, environmental, and occupational health & safety management.</p>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    <!-- ISO 9001:2015 -->
                    <div class="flex items-center p-6 bg-white rounded-2xl shadow-lg animate-on-scroll" data-animation="fade-in-up" style="animation-delay: 0.1s;">
                        <svg class="w-12 h-12 text-brand-primary mr-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path></svg>
                        <div>
                            <h3 class="text-xl font-heading font-bold text-brand-dark">ISO 9001:2015</h3>
                            <p class="text-gray-600">Quality Management System</p>
                        </div>
                    </div>
                    <!-- ISO 45001:2018 -->
                    <div class="flex items-center p-6 bg-white rounded-2xl shadow-lg animate-on-scroll" data-animation="fade-in-up" style="animation-delay: 0.2s;">
                        <svg class="w-12 h-12 text-brand-primary mr-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0c-1.11 0-2.08-.402-2.599-1M12 16v1m0-1c-1.657 0-3-.895-3-2s1.343-2 3-2 3-.895 3-2 1.343-2 3-2m0 8c1.11 0 2.08.402 2.599 1M12 16v-1m0 1v-8"></path></svg>
                        <div>
                            <h3 class="text-xl font-heading font-bold text-brand-dark">ISO 45001:2018</h3>
                            <p class="text-gray-600">Occupational Health & Safety</p>
                        </div>
                    </div>
                    <!-- EGAC Accredited -->
                    <div class="flex items-center p-6 bg-white rounded-2xl shadow-lg animate-on-scroll" data-animation="fade-in-up" style="animation-delay: 0.3s;">
                        <svg class="w-12 h-12 text-brand-primary mr-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                        <div>
                            <h3 class="text-xl font-heading font-bold text-brand-dark">EGAC Accredited</h3>
                            <p class="text-gray-600">QMS & OHSAS Certification</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- About Us Section [UPDATED] -->
        <section id="about" class="py-20 md:py-32 bg-white">
            <div class="container mx-auto px-4 sm:px-6 lg:px-8">
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 lg:gap-20 items-center">
                    <!-- Content -->
                    <div class="order-2 lg:order-1 animate-on-scroll" data-animation="slide-in-left">
                        <span class="text-brand-primary font-bold uppercase tracking-wider text-sm">About ATB Group</span>
                        <h2 class="text-4xl md:text-5xl font-heading font-black my-6 leading-tight">
                            Qatar's Specialist in <span class="text-brand-accent">Traffic & Road Safety</span>
                        </h2>
                        <p class="text-lg text-gray-700 mb-6 leading-relaxed">
                            <strong>ATB is a professional engineering firm specializing in Traffic Management and Road Safety solutions.</strong> With a highly experienced and knowledgeable team, we deliver innovative and reliable services that ensure safe and efficient road operations.
                        </p>
                        <p class="text-lg text-gray-700 mb-8 leading-relaxed">
                            Our strong reputation with <strong>Ashghal and the Ministry of Interior (MOI)</strong> reflects our commitment to quality, compliance, and excellence across every project in Qatar.
                        </p>
                        
                        <!-- Mission & Vision Cards [UPDATED] -->
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
                            <div class="bg-gradient-to-br from-brand-light to-white p-6 rounded-2xl border-l-4 border-brand-accent shadow-lg">
                                <h3 class="text-xl font-heading font-bold text-brand-primary mb-3 flex items-center">
                                    <svg class="w-6 h-6 mr-2 text-brand-accent" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                    </svg>
                                    Our Mission
                                </h3>
                                <p class="text-gray-700">Delivering smart and reliable Traffic Management and Road Safety solutions that make every journey safer.</p>
                            </div>
                            <div class="bg-gradient-to-br from-brand-light to-white p-6 rounded-2xl border-l-4 border-qatar-maroon shadow-lg">
                                <h3 class="text-xl font-heading font-bold text-brand-primary mb-3 flex items-center">
                                    <svg class="w-6 h-6 mr-2 text-qatar-maroon" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M10 12a2 2 0 100-4 2 2 0 000 4z"/>
                                        <path fill-rule="evenodd" d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z" clip-rule="evenodd"/>
                                    </svg>
                                    Our Vision
                                </h3>
                                <p class="text-gray-700">To become a trusted leader in Traffic Management and Road Safety across Qatar and the Middle East.</p>
                            </div>
                        </div>

                        <a href="#services" class="btn-primary inline-block">Discover Our Services</a>
                    </div>
                    
                    <!-- Image -->
                    <div class="order-1 lg:order-2 animate-on-scroll" data-animation="zoom-in">
                        <div class="relative">
                            <img src="images/atbgroup16.jpg" 
                                 alt="ATB Group construction team and engineers managing infrastructure project in Qatar" 
                                 class="rounded-3xl shadow-2xl w-full h-auto"
                                 loading="lazy">
                            <div class="absolute -bottom-6 -right-6 bg-gradient-to-br from-brand-accent to-brand-accent-dark text-brand-dark p-6 rounded-2xl shadow-2xl float-animation">
                                <div class="text-3xl font-black">5+</div>
                                <div class="text-sm font-bold uppercase">Years Excellence</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- NEW: Why Choose Us Section -->
        <section id="why-choose-us" class="py-20 md:py-32 bg-gradient-to-b from-brand-light to-white">
            <div class="container mx-auto px-4 sm:px-6 lg:px-8">
                <!-- Section Header -->
                <div class="text-center max-w-4xl mx-auto mb-16 animate-on-scroll" data-animation="fade-in-up">
                    <span class="text-brand-primary font-bold uppercase tracking-wider text-sm">Our Commitment</span>
                    <h2 class="text-4xl md:text-5xl font-heading font-black my-6 leading-tight">
                        Why <span class="text-brand-accent">Choose ATB Group?</span>
                    </h2>
                    <p class="text-lg text-gray-700 leading-relaxed">
                        We stand out through our dedication to excellence and innovation. With years of experience working alongside Ashghal and the Ministry of Interior, we have built a reputation for trust and quality. Our solutions are not just compliant—they are forward-thinking, efficient, and designed to make roads safer for everyone.
                    </p>
                </div>
                <!-- Features Grid -->
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    <!-- Feature 1 -->
                    <div class="bg-white p-8 rounded-2xl shadow-lg border-l-4 border-brand-accent animate-on-scroll" data-animation="fade-in-up" style="animation-delay: 0.1s;">
                        <h3 class="text-xl font-heading font-bold text-brand-dark mb-3">Proven Experience</h3>
                        <p class="text-gray-600">Extensive track record with Ashghal and MOI projects.</p>
                    </div>
                    <!-- Feature 2 -->
                    <div class="bg-white p-8 rounded-2xl shadow-lg border-l-4 border-brand-accent animate-on-scroll" data-animation="fade-in-up" style="animation-delay: 0.2s;">
                        <h3 class="text-xl font-heading font-bold text-brand-dark mb-3">Innovative Solutions</h3>
                        <p class="text-gray-600">Forward-thinking, efficient, and modern traffic solutions.</p>
                    </div>
                    <!-- Feature 3 -->
                    <div class="bg-white p-8 rounded-2xl shadow-lg border-l-4 border-brand-accent animate-on-scroll" data-animation="fade-in-up" style="animation-delay: 0.3s;">
                        <h3 class="text-xl font-heading font-bold text-brand-dark mb-3">Safety First</h3>
                        <p class="text-gray-600">Uncompromising commitment to worker and public safety.</p>
                    </div>
                    <!-- Feature 4 -->
                    <div class="bg-white p-8 rounded-2xl shadow-lg border-l-4 border-brand-accent animate-on-scroll" data-animation="fade-in-up" style="animation-delay: 0.4s;">
                        <h3 class="text-xl font-heading font-bold text-brand-dark mb-3">Local Insight, Regional Impact</h3>
                        <p class="text-gray-600">Deep understanding of Qatar's standards and requirements.</p>
                    </div>
                    <!-- Feature 5 -->
                    <div class="bg-white p-8 rounded-2xl shadow-lg border-l-4 border-brand-accent animate-on-scroll" data-animation="fade-in-up" style="animation-delay: 0.5s;">
                        <h3 class="text-xl font-heading font-bold text-brand-dark mb-3">End-to-End Services</h3>
                        <p class="text-gray-600">From planning and permits to full implementation.</p>
                    </div>
                    <!-- Feature 6 -->
                    <div class="bg-white p-8 rounded-2xl shadow-lg border-l-4 border-brand-accent animate-on-scroll" data-animation="fade-in-up" style="animation-delay: 0.6s;">
                        <h3 class="text-xl font-heading font-bold text-brand-dark mb-3">Sustainable Approach</h3>
                        <p class="text-gray-600">Delivering reliable solutions that last.</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Services Section [MODIFIED] -->
        <section id="services" class="py-20 md:py-32 bg-white">
            <div class="container mx-auto px-4 sm:px-6 lg:px-8">
                <!-- Section Header -->
                <div class="text-center max-w-4xl mx-auto mb-16 animate-on-scroll" data-animation="fade-in-up">
                    <span class="text-brand-primary font-bold uppercase tracking-wider text-sm">Our Traffic & Road Safety Services</span>
                    <h2 class="text-4xl md:text-5xl font-heading font-black my-6 leading-tight">
                        Complete <span class="text-brand-accent">Traffic Management</span> Solutions
                    </h2>
                    <p class="text-lg text-gray-700 leading-relaxed">
                        As an Ashghal-approved specialist, we provide comprehensive, reliable traffic management and road safety services tailored to Qatar's infrastructure needs.
                    </p>
                </div>

                <!-- Services Grid [MODIFIED] -->
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 lg:gap-10">
                    
                    <!-- Service 1: TTM & TMA -->
                    <article class="service-card animate-on-scroll" data-animation="fade-in-up" style="animation-delay: 0.1s;">
                        <img src="images/atbgroup42.jpeg" alt="Temporary Traffic Management & TMA Rental" class="w-full h-48 object-cover rounded-t-2xl">
                        <div class="p-6 md:p-8 flex flex-col flex-grow">
                            <div class="service-card-content">
                                <h3 class="text-2xl font-heading font-bold mb-4 text-brand-dark">Temporary Traffic Management & TMA Rental</h3>
                                <p class="text-gray-600 leading-relaxed mb-4">
                                    Our experienced TTM team ensures safe, efficient traffic control. We also provide <strong>Truck Mounted Attenuator (TMA)</strong> rental to protect workers and maintain smooth traffic flow on-site.
                                </p>
                            </div>
                            <ul class="text-sm text-gray-600 space-y-2 mt-auto">
                                <li class="flex items-start">
                                    <svg class="w-5 h-5 text-brand-accent mr-2 flex-shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                    </svg>
                                    STMS/STMP certified personnel
                                </li>
                                <li class="flex items-start">
                                    <svg class="w-5 h-5 text-brand-accent mr-2 flex-shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                    </svg>
                                    24/7 TMA availability
                                </li>
                            </ul>
                        </div>
                    </article>

                    <!-- Service 2: RO Permit -->
                    <article class="service-card animate-on-scroll" data-animation="fade-in-up" style="animation-delay: 0.2s;">
                        <img src="images/atbgroup43.png" alt="Road Opening (RO) Permit Services" class="w-full h-48 object-cover rounded-t-2xl">
                        <div class="p-6 md:p-8 flex flex-col flex-grow">
                            <div class="service-card-content">
                                <h3 class="text-2xl font-heading font-bold mb-4 text-brand-dark">Road Opening (RO) Permit Services</h3>
                                <p class="text-gray-600 leading-relaxed mb-4">
                                    We specialize in obtaining <strong>Ashghal QPRO</strong> Road Space Booking and <strong>RO Permits</strong> for all sectors in Qatar, ensuring a fast, accurate, and hassle-free approval process.
                                </p>
                            </div>
                            <ul class="text-sm text-gray-600 space-y-2 mt-auto">
                                <li class="flex items-start">
                                    <svg class="w-5 h-5 text-brand-accent mr-2 flex-shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                    </svg>
                                    Ashghal QPRO expertise
                                </li>
                                <li class="flex items-start">
                                    <svg class="w-5 h-5 text-brand-accent mr-2 flex-shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                    </svg>
                                    Fast, hassle-free process
                                </li>
                            </ul>
                        </div>
                    </article>

                    <!-- Service 3: TDP -->
                    <article class="service-card animate-on-scroll" data-animation="fade-in-up" style="animation-delay: 0.3s;">
                        <img src="images/atbgroup29.png" alt="Traffic Diversion Plan (TDP) Service" class="w-full h-48 object-cover rounded-t-2xl">
                        <div class="p-6 md:p-8 flex flex-col flex-grow">
                            <div class="service-card-content">
                                <h3 class="text-2xl font-heading font-bold mb-4 text-brand-dark">Traffic Diversion Plan (TDP) Service</h3>
                                <p class="text-gray-600 leading-relaxed mb-4">
                                    Precision <strong>TDP design</strong> and drawing services in full compliance with <strong>Ashghal's WZTMG</strong>, led by qualified A-Class designers with MOI approval experience.
                                </p>
                            </div>
                            <ul class="text-sm text-gray-600 space-y-2 mt-auto">
                                <li class="flex items-start">
                                    <svg class="w-5 h-5 text-brand-accent mr-2 flex-shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                    </svg>
                                    A-Class certified designers
                                </li>
                                <li class="flex items-start">
                                    <svg class="w-5 h-5 text-brand-accent mr-2 flex-shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                    </svg>
                                    Full WZTMG compliance
                                </li>
                            </ul>
                        </div>
                    </article>

                    <!-- Service 4: School Zone -->
                    <article class="service-card animate-on-scroll" data-animation="fade-in-up" style="animation-delay: 0.4s;">
                        <img src="images/atbgroup15.jpg" alt="School Zone Safety Development" class="w-full h-48 object-cover rounded-t-2xl">
                        <div class="p-6 md:p-8 flex flex-col flex-grow">
                            <div class="service-card-content">
                                <h3 class="text-2xl font-heading font-bold mb-4 text-brand-dark">School Zone Safety Development</h3>
                                <p class="text-gray-600 leading-relaxed mb-4">
                                    We handle complete <strong>school zone safety solutions</strong>—from approvals to on-site implementation—following Ashghal Design Department requirements for schools and nurseries.
                                </p>
                            </div>
                            <ul class="text-sm text-gray-600 space-y-2 mt-auto">
                                <li class="flex items-start">
                                    <svg class="w-5 h-5 text-brand-accent mr-2 flex-shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                    </svg>
                                    Child-focused safety design
                                </li>
                                <li class="flex items-start">
                                    <svg class="w-5 h-5 text-brand-accent mr-2 flex-shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                    </svg>
                                    Full turnkey implementation
                                </li>
                            </ul>
                        </div>
                    </article>

                    <!-- Service 5: Road Marking -->
                    <article class="service-card animate-on-scroll" data-animation="fade-in-up" style="animation-delay: 0.5s;">
                        <img src="images/atbgroup41.jpeg" alt="Road Marking Services" class="w-full h-48 object-cover rounded-t-2xl">
                        <div class="p-6 md:p-8 flex flex-col flex-grow">
                            <div class="service-card-content">
                                <h3 class="text-2xl font-heading font-bold mb-4 text-brand-dark">Road Marking Services</h3>
                                <p class="text-gray-600 leading-relaxed mb-4">
                                    High-quality <strong>road marking</strong> using Thermoplastic Paint, Two-Component Cold Plastic Paint, Cycle Track Coating, and professional Road Marking Removal.
                                </p>
                            </div>
                            <ul class="text-sm text-gray-600 space-y-2 mt-auto">
                                <li class="flex items-start">
                                    <svg class="w-5 h-5 text-brand-accent mr-2 flex-shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                    </svg>
                                    Premium thermoplastic materials
                                </li>
                                <li class="flex items-start">
                                    <svg class="w-5 h-5 text-brand-accent mr-2 flex-shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                    </svg>
                                    High-visibility standards
                                </li>
                            </ul>
                        </div>
                    </article>
                    
                    <!-- Service 6: Road Kerb Painting Service (NEW) -->
                    <article class="service-card animate-on-scroll" data-animation="fade-in-up" style="animation-delay: 0.6s;">
                        <img src="/images/roadkerb.jpg" alt="Road Kerb Painting Service" class="w-full h-48 object-cover rounded-t-2xl">
                        <div class="p-6 md:p-8 flex flex-col flex-grow">
                            <div class="service-card-content">
                                <h3 class="text-2xl font-heading font-bold mb-4 text-brand-dark">Road Kerb Painting Service</h3>
                                <p class="text-gray-600 leading-relaxed mb-4">
                                    We provide <strong>Ashghal-approved kerbstone painting services</strong> across Qatar, ensuring high-quality finishes and long-lasting durability. We follow strict WZTMG standards for safety, visibility, and compliance.
                                </p>
                            </div>
                            <ul class="text-sm text-gray-600 space-y-2 mt-auto">
                                <li class="flex items-start">
                                    <svg class="w-5 h-5 text-brand-accent mr-2 flex-shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                    </svg>
                                    Ashghal-approved materials
                                </li>
                                <li class="flex items-start">
                                    <svg class="w-5 h-5 text-brand-accent mr-2 flex-shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                    </svg>
                                    WZTMG standard compliant
                                </li>
                            </ul>
                        </div>
                    </article>

                  <!-- Service 7: VRS -->
                    <article class="service-card animate-on-scroll" data-animation="fade-in-up" style="animation-delay: 0.7s;">
                        <img src="images/atbgroup6.jpg" alt="Vehicle Restraint Systems" class="w-full h-48 object-cover rounded-t-2xl">
                        <div class="p-6 md:p-8 flex flex-col flex-grow">
                            <div class="service-card-content">
                                <h3 class="text-2xl font-heading font-bold mb-4 text-brand-dark">VEHICLE RESTRAINT
SYSTEMS (VRS)</h3>
                                <p class="text-gray-600 leading-relaxed mb-4">
                                     <strong>ATB Group</strong> Supply and install various safety barriers, crash
cushions, guard rails, fish tails, and terminal systems -
ensuring maximum roadside protection.
                                </p>
                            </div>
                            <ul class="text-sm text-gray-600 space-y-2 mt-auto">
                                <li class="flex items-start">
                                    <svg class="w-5 h-5 text-brand-accent mr-2 flex-shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                    </svg>
                                    Premium, certified barriers
                                </li>
                                <li class="flex items-start">
                                    <svg class="w-5 h-5 text-brand-accent mr-2 flex-shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                    </svg>
                                    Maximum roadside protection
                                </li>
                            </ul>
                        </div>
                    </article>

                    <!-- Service 8: Road Safety Audits -->
                    <article class="service-card animate-on-scroll" data-animation="fade-in-up" style="animation-delay: 0.8s;">
                        <img src="images/atbgroup33.jpg" alt="Road Safety Audits" class="w-full h-48 object-cover rounded-t-2xl">
                        <div class="p-6 md:p-8 flex flex-col flex-grow">
                            <div class="service-card-content">
                                <h3 class="text-2xl font-heading font-bold mb-4 text-brand-dark">Road Safety Audits</h3>
                                <p class="text-gray-600 leading-relaxed mb-4">
                                    We conduct professional <strong>Road Safety Audits</strong> to identify potential hazards, recommend improvements, and ensure full compliance with national safety standards.
                                </p>
                            </div>
                            <ul class="text-sm text-gray-600 space-y-2 mt-auto">
                                <li class="flex items-start">
                                    <svg class="w-5 h-5 text-brand-accent mr-2 flex-shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                    </svg>
                                    Certified Audit Team
                                </li>
                                <li class="flex items-start">
                                    <svg class="w-5 h-5 text-brand-accent mr-2 flex-shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                    </svg>
                                    Ashghal & MOI Compliance
                                </li>
                            </ul>
                        </div>
                    </article>
                    
                    <!-- Service 9: Advice & Consultation -->
                    <article class="service-card animate-on-scroll" data-animation="fade-in-up" style="animation-delay: 0.9s;">
                        <img src="images/atbgroup27.jpg" alt="Traffic Management Advice & Consultation" class="w-full h-48 object-cover rounded-t-2xl">
                        <div class="p-6 md:p-8 flex flex-col flex-grow">
                            <div class="service-card-content">
                                <h3 class="text-2xl font-heading font-bold mb-4 text-brand-dark">Traffic Management
Advice & Consultation</h3>
                                <p class="text-gray-600 leading-relaxed mb-4">
                                    We conduct professional <strong>Traffic Management
Advice & Consultation</strong> for Traffic
Management projects, including planning,
supervision, and site coordination, led by experienced
STMS and STMP personnel.
                                </p>
                            </div>
                            <ul class="text-sm text-gray-600 space-y-2 mt-auto">
                                <li class="flex items-start">
                                    <svg class="w-5 h-5 text-brand-accent mr-2 flex-shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                    </svg>
                                    Expert STMS/STMP coordination
                                </li>
                                <li class="flex items-start">
                                    <svg class="w-5 h-5 text-brand-accent mr-2 flex-shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                    </svg>
                                    Planning and site supervision
                                </li>
                            </ul>
                        </div>
                    </article>

                </div>
            </div>
        </section>

        <!-- Projects Gallery Section -->
        <section id="projects" class="py-20 md:py-32 bg-brand-dark text-white">
            <div class="container mx-auto px-4 sm:px-6 lg:px-8">
                <!-- Section Header -->
                <div class="text-center max-w-4xl mx-auto mb-16 animate-on-scroll" data-animation="fade-in-up">
                    <span class="text-brand-accent font-bold uppercase tracking-wider text-sm">Our Portfolio</span>
                    <h2 class="text-4xl md:text-5xl font-heading font-black my-6 leading-tight">
                        Featured <span class="text-brand-accent">Traffic & Construction</span> Projects
                    </h2>
                    <p class="text-lg text-gray-300 leading-relaxed">
                        Showcasing our commitment to excellence through landmark infrastructure and construction projects across Qatar.
                    </p>
                </div>

                <!-- Projects Grid -->
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    <!-- Project 1: Highway Construction -->
                    <article class="project-card animate-on-scroll" data-animation="zoom-in" style="animation-delay: 0.2s;">
                        <img src="images/atbgroup26.png" 
                             alt="Major highway construction project in Qatar by ATB Group" 
                             class="w-full h-96 object-cover"
                             loading="lazy">
                        <div class="project-overlay">
                            <h3 class="text-2xl font-heading font-bold mb-2">Major Highway Construction</h3>
                            <p class="text-gray-200 mb-3">Multi-lane highway development with complete infrastructure and safety systems.</p>
                            <span class="inline-block bg-brand-accent text-brand-dark px-3 py-1 rounded-full text-sm font-bold">Road Construction</span>
                        </div>
                    </article>

                    <!-- Project 2: Road Marking -->
                    <article class="project-card animate-on-scroll" data-animation="zoom-in" style="animation-delay: 0.4s;">
                        <img src="images/atbgroup45.jpeg" 
                             alt="Thermoplastic road marking project on Qatar highways" 
                             class="w-full h-96 object-cover"
                             loading="lazy">
                        <div class="project-overlay">
                            <h3 class="text-2xl font-heading font-bold mb-2">Internal Road Marking</h3>
                            <p class="text-gray-200 mb-3">High-durability thermoplastic marking installation on Qatar's Internal Roards.</p>
                            <span class="inline-block bg-brand-accent text-brand-dark px-3 py-1 rounded-full text-sm font-bold">Road Marking</span>
                        </div>
                    </article>

                    <!-- Project 3: Building Construction -->
                    <article class="project-card animate-on-scroll" data-animation="zoom-in" style="animation-delay: 0.6s;">
                        <img src="images/atbgroup44.jpeg" 
                             alt="Commercial building construction project in Doha Qatar" 
                             class="w-full h-96 object-cover"
                             loading="lazy">
                        <div class="project-overlay">
                            <h3 class="text-2xl font-heading font-bold mb-2">Safety Fences & Bollards</h3>
                            <p class="text-gray-200 mb-3">We provide strong safety fences and bollards to protect people and property. Ideal for traffic areas, work zones, and public spaces.</p>
                            <span class="inline-block bg-brand-accent text-brand-dark px-3 py-1 rounded-full text-sm font-bold">Road Safety</span>
                        </div>
                    </article>

                    <!-- Project 4: Traffic Diversion -->
                    <article class="project-card animate-on-scroll" data-animation="zoom-in" style="animation-delay: 0.8s;">
                        <img src="images/atbgroup46.jpeg" 
                             alt="Complex traffic diversion plan implementation in Qatar" 
                             class="w-full h-96 object-cover"
                             loading="lazy">
                        <div class="project-overlay">
                            <h3 class="text-2xl font-heading font-bold mb-2">Urban TDP Implementation</h3>
                            <p class="text-gray-200 mb-3">Complex traffic diversion plan for major urban infrastructure development.</p>
                            <span class="inline-block bg-brand-accent text-brand-dark px-3 py-1 rounded-full text-sm font-bold">TDP Service</span>
                        </div>
                    </article>

                    <!-- Project 5: Interlock & Landscaping -->
                    <article class="project-card animate-on-scroll" data-animation="zoom-in" style="animation-delay: 1s;">
                        <img src="images/atbgroup47.jpeg" 
                             alt="Premium interlock and kerb stone installation Qatar" 
                             class="w-full h-96 object-cover"
                             loading="lazy">
                        <div class="project-overlay">
                            <h3 class="text-2xl font-heading font-bold mb-2">Interlock & Kerbstone.</h3>
                            <p class="text-gray-200 mb-3">Premium interlock installation for residential compound with decorative kerb stones.</p>
                            <span class="inline-block bg-brand-accent text-brand-dark px-3 py-1 rounded-full text-sm font-bold">Interlock Works</span>
                        </div>
                    </article>

                    <!-- Project 6: Infrastructure Development -->
                    <article class="project-card animate-on-scroll" data-animation="zoom-in" style="animation-delay: 1.2s;">
                        <img src="images/atbgroup33.jpg" 
                             alt="Complete infrastructure development project in Qatar" 
                             class="w-full h-96 object-cover"
                             loading="lazy">
                        <div class="project-overlay">
                            <h3 class="text-2xl font-heading font-bold mb-2">Complete Infrastructure Package</h3>
                            <p class="text-gray-200 mb-3">Turnkey infrastructure solution including roads, utilities, and safety systems.</p>
                            <span class="inline-block bg-brand-accent text-brand-dark px-3 py-1 rounded-full text-sm font-bold">Full Package</span>
                        </div>
                    </article>
                </div>
            </div>
        </section>

        <!-- Blog Section [NEW] -->
        <section id="blog" class="py-20 md:py-32 bg-brand-light">
            <div class="container mx-auto px-4 sm:px-6 lg:px-8">
                <!-- Section Header -->
                <div class="text-center max-w-4xl mx-auto mb-16 animate-on-scroll" data-animation="fade-in-up">
                    <span class="text-brand-primary font-bold uppercase tracking-wider text-sm">Latest Insights</span>
                    <h2 class="text-4xl md:text-5xl font-heading font-black my-6 leading-tight">
                        Our <span class="text-brand-accent">Industry Blog</span>
                    </h2>
                    <p class="text-lg text-gray-700 leading-relaxed">
                        Stay updated with the latest regulations, safety standards, and project news impacting road infrastructure in Qatar.
                    </p>
                </div>

                <!-- Latest Article Card -->
                <div class="max-w-4xl mx-auto bg-white rounded-3xl shadow-2xl overflow-hidden hover:shadow-xl transition-shadow duration-300 animate-on-scroll" data-animation="fade-in-up" style="animation-delay: 0.2s;">
                    <div class="flex flex-col md:flex-row">
                        <!-- Image -->
                        <div class="md:w-1/3 flex-shrink-0">
                            <img src="/images/blog-1.jpeg" 
                                 alt="Placeholder image for new MOI vehicle rules article" 
                                 class="w-full h-full object-cover">
                        </div>
                        <!-- Content -->
                        <div class="md:w-2/3 p-8 md:p-10">
                            <span class="inline-block bg-qatar-maroon/10 text-qatar-maroon font-bold text-xs uppercase tracking-wider px-3 py-1 rounded-full mb-3">Regulation Update</span>
                            <h3 class="text-3xl font-heading font-black text-brand-dark mb-4 leading-snug">
                                🚧 New MOI Road Work Support Vehicle Rules in Qatar (2025): What Contractors Must Know
                            </h3>
                            <p class="text-gray-600 mb-6 line-clamp-3">
                                The Ministry of Interior – Traffic Department (MOI Qatar) has released updated vehicle specifications for Road Work Support Vehicles (Mosanadat Aamal Al-Toroq). These rules are now mandatory for all contractors, consultants, and companies operating in road works...
                            </p>
                            <a href="blog-article-moi.html" class="btn-primary inline-flex items-center text-sm px-6 py-3">
                                Read Full Article
                                <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- CTA Section [UPDATED] -->
        <section class="py-20 md:py-24 bg-gradient-to-r from-brand-primary via-brand-accent to-qatar-maroon text-white relative overflow-hidden">
            <div class="absolute inset-0 opacity-10">
                <div class="absolute top-10 left-10 w-64 h-64 bg-white rounded-full filter blur-3xl"></div>
                <div class="absolute bottom-10 right-10 w-96 h-96 bg-white rounded-full filter blur-3xl"></div>
            </div>
            <div class="container mx-auto px-4 sm:px-6 lg:px-8 text-center relative z-10">
                <div class="max-w-4xl mx-auto animate-on-scroll" data-animation="fade-in-up">
                    <h2 class="text-4xl md:text-5xl font-heading font-black mb-6 leading-tight">
                        Ready to Start Your <span class="text-brand-dark">Next Project?</span>
                    </h2>
                    <p class="text-xl md:text-2xl text-white/90 mb-10 leading-relaxed">
                        Partner with Qatar's most trusted road safety and traffic management specialist. Our expert team is ready to ensure your project runs safely and efficiently.
                    </p>
                    <div class="flex flex-col sm:flex-row justify-center gap-5">
                        <a href="#contact" class="bg-white text-brand-primary font-bold py-4 px-10 rounded-full text-lg uppercase tracking-wider hover:bg-brand-light hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-1">
                            Get Free Consultation
                        </a>
                        <a href="tel:+97430490205" class="bg-transparent border-3 border-white text-white font-bold py-4 px-10 rounded-full text-lg uppercase tracking-wider hover:bg-white hover:text-brand-primary transition-all duration-300 transform hover:-translate-y-1">
                            Call Us Now
                        </a>
                    </div>
                </div>
            </div>
        </section>

        <!-- Contact Section [UPDATED] -->
        <section id="contact" class="py-20 md:py-32 bg-gradient-to-b from-brand-light to-white">
            <div class="container mx-auto px-4 sm:px-6 lg:px-8">
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 lg:gap-20">
                    <!-- Contact Info -->
                    <div class="animate-on-scroll" data-animation="slide-in-left">
                        <span class="text-brand-primary font-bold uppercase tracking-wider text-sm">Get In Touch</span>
                        <h2 class="text-4xl md:text-5xl font-heading font-black my-6 leading-tight">
                            Request a <span class="text-brand-accent">Quote</span> for Your Project
                        </h2>
                        <p class="text-lg text-gray-700 mb-10 leading-relaxed">
                            Ready to start your traffic management or infrastructure project? Our team of experts is here to provide customized, Ashghal-approved solutions that meet your needs.
                        </p>

                        <!-- Contact Cards -->
                        <div class="space-y-6">
                            <!-- Location [UPDATED] -->
                            <div class="flex items-start p-6 bg-white rounded-2xl shadow-lg hover:shadow-xl transition-shadow duration-300">
                                <div class="flex-shrink-0 w-14 h-14 bg-gradient-to-br from-brand-accent to-brand-accent-dark text-white rounded-xl flex items-center justify-center mr-5">
                                    <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                    </svg>
                                </div>
                                <div>
                                    <h4 class="text-xl font-heading font-bold text-brand-dark mb-1">Our Office</h4>
                                    <p class="text-gray-600 leading-relaxed">Building No. 311, Street 230, Zone 40, P.O. Box: 39492 - C-Ring Road, Doha, Qatar</p>
                                </div>
                            </div>

                            <!-- Email -->
                            <div class="flex items-start p-6 bg-white rounded-2xl shadow-lg hover:shadow-xl transition-shadow duration-300">
                                <div class="flex-shrink-0 w-14 h-14 bg-gradient-to-br from-brand-accent to-brand-accent-dark text-white rounded-xl flex items-center justify-center mr-5">
                                    <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                                    </svg>
                                </div>
                                <div>
                                    <h4 class="text-xl font-heading font-bold text-brand-dark mb-1">Email Us</h4>
                                    <a href="mailto:Info@atbgroup.qa" class="text-gray-600 hover:text-brand-accent transition-colors duration-300">Info@atbgroup.qa</a>
                                </div>
                            </div>

                            <!-- Phone [UPDATED] -->
                            <div class="flex items-start p-6 bg-white rounded-2xl shadow-lg hover:shadow-xl transition-shadow duration-300">
                                <div class="flex-shrink-0 w-14 h-14 bg-gradient-to-br from-brand-accent to-brand-accent-dark text-white rounded-xl flex items-center justify-center mr-5">
                                    <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                                    </svg>
                                </div>
                                <div>
                                    <h4 class="text-xl font-heading font-bold text-brand-dark mb-1">Call Us</h4>
                                    <a href="tel:+97430490205" class="text-gray-600 hover:text-brand-accent transition-colors duration-300">+974 3049 0205</a>
                                    <p class="text-sm text-gray-500 mt-1">Available 24/7</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Contact Form [UPDATED] -->
                    <div class="animate-on-scroll" data-animation="slide-in-right">
                        <form id="contact-form" class="bg-white p-8 md:p-10 rounded-3xl shadow-2xl">
                            <h3 class="text-2xl font-heading font-bold text-brand-dark mb-6">Send Us a Message</h3>
                            
                            <div class="space-y-6">
                                <!-- Full Name -->
                                <div>
                                    <label for="full-name" class="block text-sm font-bold text-gray-700 mb-2">Full Name *</label>
                                    <input type="text" 
                                           name="full-name" 
                                           id="full-name" 
                                           required 
                                           class="w-full px-5 py-4 border-2 border-gray-200 rounded-xl focus:ring-4 focus:ring-brand-accent/20 focus:border-brand-accent transition-all duration-300"
                                           placeholder="Your full name">
                                </div>

                                <!-- Email -->
                                <div>
                                    <label for="email" class="block text-sm font-bold text-gray-700 mb-2">Email Address *</label>
                                    <input type="email" 
                                           name="email" 
                                           id="email" 
                                           required 
                                           class="w-full px-5 py-4 border-2 border-gray-200 rounded-xl focus:ring-4 focus:ring-brand-accent/20 focus:border-brand-accent transition-all duration-300"
                                           placeholder="your@email.com">
                                </div>

                                <!-- Phone -->
                                <div>
                                    <label for="phone" class="block text-sm font-bold text-gray-700 mb-2">Phone Number</label>
                                    <input type="tel" 
                                           name="phone" 
                                           id="phone" 
                                           class="w-full px-5 py-4 border-2 border-gray-200 rounded-xl focus:ring-4 focus:ring-brand-accent/20 focus:border-brand-accent transition-all duration-300"
                                           placeholder="+974 XXXX XXXX">
                                </div>

                                <!-- Service [UPDATED] -->
                                <div>
                                    <label for="subject" class="block text-sm font-bold text-gray-700 mb-2">Service of Interest *</label>
                                    <select id="subject" 
                                            name="subject" 
                                            required
                                            class="w-full px-5 py-4 border-2 border-gray-200 rounded-xl bg-white focus:ring-4 focus:ring-brand-accent/20 focus:border-brand-accent transition-all duration-300">
                                        <option value="">-- Select a Service --</option>
                                        <option value="General Inquiry">General Inquiry</option>
                                        <option value="TTM & TMA Rental">Traffic Management & TMA Rental</option>
                                        <option value="RO Permit">Road Opening Permit Services</option>
                                        <option value="TDP Service">Traffic Diversion Plan (TDP)</option>
                                        <option value="School Zone Safety">School Zone Safety Development</option>
                                        <option value="Road Marking">Road Marking Services</option>
                                        <option value="Road Kerb Painting">Road Kerb Painting Service</option>
                                        <option value="Traffic Signages">Traffic Signage Solutions</option>
                                        <option value="Interlock & Kerb Stone">Interlock & Kerb Stone Works</option>
                                        <option value="VRS">Vehicle Restraint Systems (VRS)</option>
                                        <option value="Road Safety Audits">Road Safety Audits</option>
                                        <option value="Consultation">Traffic Management Consultation</option>
                                        <option value="Road Construction">Road Construction</option>
                                        <option value="Building Construction">Building Construction</option>
                                    </select>
                                </div>

                                <!-- Message -->
                                <div>
                                    <label for="message" class="block text-sm font-bold text-gray-700 mb-2">Your Message *</label>
                                    <textarea id="message" 
                                              name="message" 
                                              rows="5" 
                                              required 
                                              class="w-full px-5 py-4 border-2 border-gray-200 rounded-xl focus:ring-4 focus:ring-brand-accent/20 focus:border-brand-accent transition-all duration-300 resize-none"
                                              placeholder="Tell us about your project requirements..."></textarea>
                                </div>

                                <!-- Submit Button -->
                                <div>
                                    <button type="submit" 
                                            id="form-submit-button" 
                                            class="w-full bg-gradient-to-r from-brand-accent to-brand-accent-dark text-brand-dark font-bold py-5 px-6 rounded-xl shadow-lg hover:shadow-2xl transition-all duration-300 uppercase tracking-wider flex items-center justify-center group">
                                        <span class="button-text">Send Message</span>
                                        <svg class="w-5 h-5 ml-3 group-hover:translate-x-2 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/>
                                        </svg>
                                        <!-- Loading Spinner -->
                                        <div class="spinner ml-3 hidden"></div>
                                    </button>
                                </div>

                                <!-- Form Feedback -->
                                <div id="form-feedback" class="hidden"></div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <!-- Modern Footer [UPDATED] -->
    <footer class="bg-brand-dark text-gray-300 py-16">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-12 mb-12">
                <!-- Brand -->
                <div>
                   <a href="#home" class="flex items-center mb-4 group">
    <img src="logo.png" alt="ATB Group Logo" class="h-12 w-auto">
</a>
                    <p class="text-gray-400 mb-6 leading-relaxed">
                        Qatar's specialist in reliable road safety and traffic management solutions.
                    </p>
                    <!-- Social Links (UPDATED LINKS) -->
                    <div class="flex space-x-4">
                        <a href="https://www.facebook.com/atb.qa/" target="_blank" rel="noopener noreferrer" class="w-10 h-10 bg-white/10 hover:bg-brand-accent rounded-full flex items-center justify-center transition-all duration-300 hover:scale-110" aria-label="Facebook">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/></svg>
                        </a>
                        <a href="https://www.linkedin.com/company/atb-qatar" target="_blank" rel="noopener noreferrer" class="w-10 h-10 bg-white/10 hover:bg-brand-accent rounded-full flex items-center justify-center transition-all duration-300 hover:scale-110" aria-label="LinkedIn">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/></svg>
                        </a>
                        <a href="https://www.instagram.com/atb.qatar/" target="_blank" rel="noopener noreferrer" class="w-10 h-10 bg-white/10 hover:bg-brand-accent rounded-full flex items-center justify-center transition-all duration-300 hover:scale-110" aria-label="Instagram">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/></svg>
                        </a>
                        <a href="https://x.com/atb_qatar" target="_blank" rel="noopener noreferrer" class="w-10 h-10 bg-white/10 hover:bg-brand-accent rounded-full flex items-center justify-center transition-all duration-300 hover:scale-110" aria-label="X (Twitter)">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M18.244 2.25h3.308l-7.227 8.261 8.503 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.719 6.233L18.244 2.25zm-2.88 18.067H18.0l-4.719-6.233-4.717 6.233h-1.63L11.75 9.07l-5.69-6.82h3.308l4.244 5.263 3.65-5.263h3.518l-7.74 8.847 8.503 11.24z"/></svg>
                        </a>
                    </div>
                </div>

                <!-- Quick Links -->
                <div>
                    <h4 class="text-lg font-heading font-bold text-white mb-6">Quick Links</h4>
                    <ul class="space-y-3">
                        <li><a href="#home" class="hover:text-brand-accent transition-colors duration-300 flex items-center group">
                            <svg class="w-4 h-4 mr-2 text-brand-accent group-hover:translate-x-1 transition-transform duration-300" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"/></svg>
                            Home
                        </a></li>
                        <li><a href="#about" class="hover:text-brand-accent transition-colors duration-300 flex items-center group">
                            <svg class="w-4 h-4 mr-2 text-brand-accent group-hover:translate-x-1 transition-transform duration-300" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"/></svg>
                            About Us
                        </a></li>
                        <li><a href="#services" class="hover:text-brand-accent transition-colors duration-300 flex items-center group">
                            <svg class="w-4 h-4 mr-2 text-brand-accent group-hover:translate-x-1 transition-transform duration-300" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"/></svg>
                            Services
                        </a></li>
                        <li><a href="#projects" class="hover:text-brand-accent transition-colors duration-300 flex items-center group">
                            <svg class="w-4 h-4 mr-2 text-brand-accent group-hover:translate-x-1 transition-transform duration-300" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"/></svg>
                            Projects
                        </a></li>
                        <li><a href="blog-article-moi.html" class="hover:text-brand-accent transition-colors duration-300 flex items-center group">
                            <svg class="w-4 h-4 mr-2 text-brand-accent group-hover:translate-x-1 transition-transform duration-300" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"/></svg>
                            Blog
                        </a></li>
                        <li><a href="#contact" class="hover:text-brand-accent transition-colors duration-300 flex items-center group">
                            <svg class="w-4 h-4 mr-2 text-brand-accent group-hover:translate-x-1 transition-transform duration-300" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"/></svg>
                            Contact
                        </a></li>
                    </ul>
                </div>

                <!-- Services -->
                <div>
                    <h4 class="text-lg font-heading font-bold text-white mb-6">Our Services</h4>
                    <ul class="space-y-3 text-sm">
                        <li><a href="#services" class="hover:text-brand-accent transition-colors duration-300">Traffic Management & TMA</a></li>
                        <li><a href="#services" class="hover:text-brand-accent transition-colors duration-300">RO Permit Services</a></li>
                        <li><a href="#services" class="hover:text-brand-accent transition-colors duration-300">Traffic Diversion Plans (TDP)</a></li>
                        <li><a href="#services" class="hover:text-brand-accent transition-colors duration-300">Road Safety Audits</a></li>
                        <li><a href="#services" class="hover:text-brand-accent transition-colors duration-300">Road Marking & Signage</a></li>
                        <li><a href="#services" class="hover:text-brand-accent transition-colors duration-300">Road Kerb Painting</a></li>
                    </ul>
                </div>

                <!-- Contact Info -->
                <div>
                    <h4 class="text-lg font-heading font-bold text-white mb-6">Contact Info</h4>
                    <ul class="space-y-4">
                        <li class="flex items-start group">
                            <span class="text-brand-accent mt-1 mr-3 flex-shrink-0 group-hover:scale-110 transition-transform duration-300">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"/></svg>
                            </span>
                            <span class="text-sm">Bldg No. 311, St 230, Zone 40, C-Ring Road, PO Box: 39492, Doha, Qatar</span>
                        </li>
                        <li class="flex items-start group">
                            <span class="text-brand-accent mt-1 mr-3 flex-shrink-0 group-hover:scale-110 transition-transform duration-300">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z"/><path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z"/></svg>
                            </span>
                            <a href="mailto:Info@atbgroup.qa" class="text-sm hover:text-brand-accent transition-colors duration-300">Info@atbgroup.qa</a>
                        </li>
                        <li class="flex items-start group">
                            <span class="text-brand-accent mt-1 mr-3 flex-shrink-0 group-hover:scale-110 transition-transform duration-300">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><path d="M2 3a1 1 0 011-1h2.153a1 1 0 01.986.836l.74 4.435a1 1 0 01-.54 1.06l-1.518.76a11.034 11.034 0 006.364 6.364l.76-1.518a1 1 0 011.06-.54l4.435.74a1 1 0 01.836.986V17a1 1 0 01-1 1h-2C7.82 18 2 12.18 2 5V3z"/></svg>
                            </span>
                            <div class="text-sm">
                                <a href="tel:+97430490205" class="hover:text-brand-accent transition-colors duration-300">+974 3049 0205</a>
                                <p class="text-xs text-gray-500 mt-1">Available 24/7</p>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- Bottom Bar -->
            <div class="pt-8 mt-8 border-t border-gray-700">
                <div class="flex flex-col md:flex-row justify-between items-center text-sm text-gray-400">
                    <p>&copy; <span id="current-year"></span> ATB Group Qatar. All Rights Reserved.</p>
                    <p class="mt-2 md:mt-0">Reliable Traffic Solutions. <span class="text-brand-accent">Excellence in Safety.</span></p>
                </div>
            </div>
        </div>
    </footer>

    <!-- WhatsApp Chat Widget [ADDED] -->
    <a href="https://wa.me/97430490205" 
       target="_blank" 
       rel="noopener noreferrer" 
       aria-label="Chat with us on WhatsApp"
       class="fixed bottom-6 right-6 z-50 bg-green-500 text-white w-16 h-16 rounded-full flex items-center justify-center shadow-lg transform transition-all duration-300 hover:scale-110 hover:shadow-2xl animate-on-scroll"
       data-animation="zoom-in"
       style="animation-delay: 1s;">
        <svg class="w-9 h-9" fill="currentColor" viewBox="0 0 24 24">
            <path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.0-5.525 4.479-10 10.001-10 2.729 0 5.291 1.056 7.271 2.936s2.935 4.542 2.935 7.271c0 5.525-4.479 10-10.001 10-2.098 0-4.144-.547-5.946-1.587l-6.163 1.687zM5.471 18.581l.333.193c1.621.94 3.482 1.441 5.435 1.441 4.512 0 8.181-3.668 8.181-8.181 0-2.185-.86-4.236-2.39-5.766s-3.58-2.39-5.766-2.39c-4.514 0-8.181 3.668-8.181 8.181 0 1.954.501 3.815 1.441 5.435l.193.333-1.168 4.253 4.253-1.168zM16.561 14.823c-.074-.124-.272-.198-.57-.347-.297-.149-1.758-.868-2.031-.967-.273-.099-.471-.148-.67.149-.198.297-.768.967-.941 1.165-.173.198-.347.223-.644.074-.297-.149-1.255-.462-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.297-.347.446-.521.149-.173.198-.297.297-.495.099-.198.05-.372-.025-.521-.074-.149-.67-1.612-.916-2.207-.242-.58-.485-.501-.669-.51l-.57-.01c-.198 0-.52.074-.792.372s-1.04 1.016-1.04 2.479 1.065 2.876 1.213 3.074c.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.626.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.695.248-1.29.173-1.414z"/>
        </svg>
    </a>

    <!-- Flickity JS -->
    <script src="https://unpkg.com/flickity@2/dist/flickity.pkgd.min.js"></script>

    <!-- Main JavaScript -->
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            // Set current year
            document.getElementById('current-year').textContent = new Date().getFullYear();

            // Initialize Flickity Carousel
            const carousel = document.querySelector('.hero-carousel');
            if (carousel) {
                new Flickity(carousel, {
                    cellAlign: 'left',
                    contain: true,
                    autoPlay: 7000,
                    wrapAround: true,
                    prevNextButtons: true,
                    pageDots: true,
                    pauseAutoPlayOnHover: false,
                    imagesLoaded: true,
                    adaptiveHeight: false
                });
            }

            // Intersection Observer for scroll animations
            const observerOptions = {
                threshold: 0.1, // Start animation a bit earlier
                rootMargin: '0px 0px -50px 0px'
            };

            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        const animation = entry.target.dataset.animation || 'fade-in-up';
                        // Check for 'style' attribute before setting opacity
                        if (entry.target.style) {
                            entry.target.style.opacity = '1';
                            entry.target.style.animation = `${animation} 0.8s ease-out forwards`;
                        } else {
                            // Handle elements that might not have a style property (like SVGs in some browsers)
                            entry.target.setAttribute('style', `opacity: 1; animation: ${animation} 0.8s ease-out forwards;`);
                        }
                        observer.unobserve(entry.target);
                    }
                });
            }, observerOptions);

            // Observe all elements with animate-on-scroll class
            document.querySelectorAll('.animate-on-scroll').forEach(el => {
                if (el.style) {
                    el.style.opacity = '0';
                } else {
                    el.setAttribute('style', 'opacity: 0;');
                }
                observer.observe(el);
            });

            // Stats Counter Animation
            const statCards = document.querySelectorAll('.stat-card div[data-count]');
            const statsObserver = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        const target = parseInt(entry.target.dataset.count);
                        const duration = 2000;
                        const increment = target / (duration / 16);
                        let current = 0;

                        const updateCounter = () => {
                            current += increment;
                            if (current < target) {
                                entry.target.textContent = Math.ceil(current);
                                requestAnimationFrame(updateCounter);
                            } else {
                                entry.target.textContent = target + (target === 24 ? '/7' : '+');
                            }
                        };

                        updateCounter();
                        statsObserver.unobserve(entry.target);
                    }
                });
            }, { threshold: 0.5 });

            statCards.forEach(card => statsObserver.observe(card));

            // Contact Form Submission
            const contactForm = document.getElementById('contact-form');
            if (contactForm) {
                contactForm.addEventListener('submit', function (e) {
                    e.preventDefault();

                    const button = document.getElementById('form-submit-button');
                    const buttonText = button.querySelector('.button-text');
                    const spinner = button.querySelector('.spinner');
                    const feedback = document.getElementById('form-feedback');
                    const formData = new FormData(contactForm);

                    // Show loading state
                    if(buttonText) buttonText.textContent = 'Sending...';
                    if(spinner) spinner.classList.remove('hidden');
                    if(button) button.disabled = true;
                    if(feedback) feedback.classList.add('hidden');

                    // Simulate form submission (replace with actual endpoint)
                    // We'll simulate a success response after 1.5 seconds
                    setTimeout(() => {
                        const mockData = { status: 'success', message: 'Thank you! Your message has been sent successfully. We will contact you soon.' };

                        if (mockData.status === 'success') {
                            if(feedback) {
                                feedback.className = 'p-5 rounded-xl bg-green-50 border-2 border-green-500 text-green-800 font-semibold';
                                feedback.innerHTML = `
                                    <div class="flex items-center">
                                        <svg class="w-6 h-6 mr-3 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                        </svg>
                                        <span>${mockData.message}</span>
                                    </div>
                                `;
                            }
                            contactForm.reset();
                        } else {
                            // This part would run if the mockData.status was 'error'
                            if(feedback) {
                                feedback.className = 'p-5 rounded-xl bg-red-50 border-2 border-red-500 text-red-800 font-semibold';
                                feedback.innerHTML = `
                                    <div class="flex items-center">
                                        <svg class="w-6 h-6 mr-3 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"/>
                                        </svg>
                                        <span>${mockData.message || 'An error occurred. Please try again later.'}</span>
                                    </div>
                                `;
                            }
                        }
                        
                        if(feedback) {
                            feedback.classList.remove('hidden');
                            feedback.scrollIntoView({ behavior: 'smooth', block: 'nearest' });
                        }

                        // Reset button
                        if(buttonText) buttonText.textContent = 'Send Message';
                        if(spinner) spinner.classList.add('hidden');
                        if(button) button.disabled = false;

                    }, 1500);

                    // NOTE: Real-world fetch implementation is commented out below
                    /*
                    fetch('process_form.php', {
                        method: 'POST',
                        body: formData
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.status === 'success') {
                            feedback.className = 'p-5 rounded-xl bg-green-50 border-2 border-green-500 text-green-800 font-semibold';
                            feedback.innerHTML = `... success message ...`;
                            contactForm.reset();
                        } else {
                            feedback.className = 'p-5 rounded-xl bg-red-50 border-2 border-red-500 text-red-800 font-semibold';
                            feedback.innerHTML = `... error message ...`;
                        }
                        feedback.classList.remove('hidden');
                        feedback.scrollIntoView({ behavior: 'smooth', block: 'nearest' });
                    })
                    .catch(error => {
                        console.error('Error:', error);
                        feedback.className = 'p-5 rounded-xl bg-red-50 border-2 border-red-500 text-red-800 font-semibold';
                        feedback.innerHTML = `... network error message ...`;
                        feedback.classList.remove('hidden');
                    })
                    .finally(() => {
                        buttonText.textContent = 'Send Message';
                        spinner.classList.add('hidden');
                        button.disabled = false;
                    });
                    */
                });
            }


            // Smooth scroll for anchor links
            document.querySelectorAll('a[href^="#"]').forEach(anchor => {
                anchor.addEventListener('click', function (e) {
                    const targetId = this.getAttribute('href');
                    if (!targetId || targetId === '#') return;
                    
                    try {
                        const targetElement = document.querySelector(targetId);
                        if (targetElement) {
                            e.preventDefault();
                            const headerOffset = 80;
                            const elementPosition = targetElement.getBoundingClientRect().top;
                            const offsetPosition = elementPosition + window.pageYOffset - headerOffset;

                            window.scrollTo({
                                top: offsetPosition,
                                behavior: 'smooth'
                            });
                        }
                    } catch (error) {
                        console.warn('Error finding element for smooth scroll:', targetId);
                    }
                });
            });
        });
    </script>
</body>
</html>
