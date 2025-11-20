<?php
include dirname(__FILE__) . '/.private/config.php';
?>
<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Banan International | Modern MEP, Fire & Automation Solutions in Doha, Qatar</title>
    <meta name="description" content="Banan International is a premier, one-stop solution provider in Doha for advanced MEP (HVAC, Electrical, Plumbing), Fire Safety, Automation, Generator Systems, and 24/7 Maintenance.">
    <meta name="keywords" content="MEP Qatar, Fire Safety Doha, Building Automation, Generator Maintenance, HVAC Qatar, Electrical Contractor, Plumbing Services, CCTV, Smart Buildings, Banan International">
    
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    
    <!-- Google Fonts: Inter & Space Grotesk -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&family=Space+Grotesk:wght@400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Font Awesome for Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

    <style>
        /* Custom Styles */
        :root {
            --gradient-accent: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);
        }
        
        html { -webkit-font-smoothing: antialiased; -moz-osx-font-smoothing: grayscale; }
        * { font-family: 'Inter', sans-serif; }
        .font-display { font-family: 'Space Grotesk', sans-serif; }
        
        body { background: #0a0a0f; overflow-x: hidden; position: relative; }

        /* Blueprint Background Overlay */
        .blueprint-overlay {
            position: fixed; top: 0; left: 0; width: 100%; height: 100%;
            background-image: url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" width="100" height="100"><defs><pattern id="grid" width="100" height="100" patternUnits="userSpaceOnUse"><path d="M 100 0 L 0 0 0 100" fill="none" stroke="%234facfe" stroke-width="0.2" opacity="0.07"/></pattern></defs><rect width="100%" height="100%" fill="url(%23grid)"/></svg>');
            pointer-events: none; z-index: -2;
        }

        /* Glassmorphism Effect */
        .glass-dark {
            background: rgba(16, 19, 34, 0.5);
            backdrop-filter: blur(15px);
            -webkit-backdrop-filter: blur(15px);
            border: 1px solid rgba(255, 255, 255, 0.1);
        }

        /* Animated Background */
        .animated-bg {
            background: linear-gradient(-45deg, #0a0a0f, #1a1a2e, #16213e, #0f3460);
            background-size: 400% 400%;
            animation: gradientShift 15s ease infinite;
        }
        @keyframes gradientShift {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }

        /* Floating Particles */
        .particles { position: fixed; width: 100%; height: 100%; overflow: hidden; pointer-events: none; z-index: -1; }
        .particle {
            position: absolute; width: 2px; height: 2px;
            background: #4facfe; border-radius: 50%;
            animation: float 8s infinite linear;
            opacity: 0;
        }
        @keyframes float {
            0% { transform: translateY(100vh) rotate(0deg); opacity: 0; }
            10%, 90% { opacity: 0.7; }
            100% { transform: translateY(-10vh) rotate(360deg); opacity: 0; }
        }

        /* Text Styles */
        .text-gradient {
            background: var(--gradient-accent);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            color: transparent; /* Fallback */
        }
        .glow-text { text-shadow: 0 0 20px rgba(79, 172, 254, 0.4); }

        /* Card Hover Effects */
        .card-3d {
            transform-style: preserve-3d;
            transition: all 0.4s cubic-bezier(0.23, 1, 0.320, 1);
        }
        .card-3d:hover {
            transform: perspective(1000px) rotateY(2deg) rotateX(2deg) translateZ(15px);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.25), 0 0 30px rgba(79, 172, 254, 0.15);
        }

        /* Morphing Shapes */
        .morphing-shape {
            border-radius: 60% 40% 30% 70% / 60% 30% 70% 40%;
            animation: morph 10s ease-in-out infinite;
        }
        @keyframes morph {
            0%, 100% { border-radius: 60% 40% 30% 70% / 60% 30% 70% 40%; }
            50% { border-radius: 30% 60% 70% 40% / 50% 60% 30% 60%; transform: rotate(3deg); }
        }

        /* Loader */
        .loader-container {
            transition: opacity 0.3s ease-in;
        }
        .loader {
            width: 50px; height: 50px;
            border: 3px solid rgba(79, 172, 254, 0.3);
            border-top-color: #4facfe; border-radius: 50%;
            animation: spin 1s linear infinite;
        }
        @keyframes spin { from { transform: rotate(0deg); } to { transform: rotate(360deg); } }
        
        /* Custom Scroll Bar */
        ::-webkit-scrollbar { width: 8px; }
        ::-webkit-scrollbar-track { background: #1a1a2e; }
        ::-webkit-scrollbar-thumb { background: var(--gradient-accent); border-radius: 4px; }
        ::-webkit-scrollbar-thumb:hover { background: linear-gradient(135deg, #6ac1fe 0%, #2af5fe 100%); }

        /* Buttons */
        .btn-primary {
            background: var(--gradient-accent); position: relative;
            overflow: hidden; transition: all 0.3s ease;
        }
        .btn-primary::before {
            content: ''; position: absolute; top: 0; left: -100%;
            width: 100%; height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.25), transparent);
            transition: left 0.6s ease;
        }
        .btn-primary:hover::before { left: 100%; }

        /* Navigation */
        .nav-glass {
            background: rgba(10, 10, 15, 0.7);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        }
        
        /* Typing Animation */
        .typing-cursor { border-right: 2px solid #4facfe; animation: blink 1s step-end infinite; }
        @keyframes blink { from, to { border-color: transparent; } 50% { border-color: #4facfe; } }

        /* AI Chat Widget Specifics */
        .ai-chat-body { scrollbar-width: thin; scrollbar-color: #4facfe #2a2a4e; }
        .ai-chat-body::-webkit-scrollbar { width: 5px; }
        .ai-chat-body::-webkit-scrollbar-track { background: #2a2a4e; }
        .ai-chat-body::-webkit-scrollbar-thumb { background-color: #4facfe; border-radius: 3px; }
        
        /* 3D Model Viewer */
        .model-viewer { width: 100%; height: 180px; border-radius: 10px; overflow: hidden; margin-bottom: 1rem; cursor: grab; }
        .model-viewer:active { cursor: grabbing; }

        /* Animated Circuit Lines */
        .circuit-bg { position: absolute; top: 0; left: 0; width: 100%; height: 100%; pointer-events: none; z-index: 0; }
        .circuit-bg path {
            stroke: url(#circuit-gradient); stroke-width: 1; fill: none;
            stroke-dasharray: 1000; stroke-dashoffset: 1000;
            animation: draw-circuit 15s ease-in-out infinite alternate;
        }
        @keyframes draw-circuit { to { stroke-dashoffset: 0; } }

        /* Engineering Process Section */
        .process-line {
            position: absolute;
            left: 50%;
            top: 4rem; /* Start below the icon */
            height: calc(100% - 2rem);
            width: 2px;
            background: linear-gradient(to bottom, transparent, #4facfe, transparent);
            transform: translateX(-50%);
            opacity: 0.5;
        }
        .process-item:last-child .process-line {
            display: none;
        }

        /* Animated Gears on Service Icons */
        .service-icon-wrapper {
            position: relative;
            width: 80px;
            height: 80px;
        }
        .animated-gear {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 100%;
            height: 100%;
            color: rgba(79, 172, 254, 0.1);
            animation: spin 20s linear infinite;
            transition: color 0.3s;
        }
        .card-3d:hover .animated-gear {
            color: rgba(79, 172, 254, 0.25);
            animation-duration: 5s;
        }
        @keyframes spin-reverse { from { transform: translate(-50%,-50%) rotate(360deg); } to { transform: translate(-50%,-50%) rotate(0deg); } }
        .animated-gear.reverse {
            animation: spin-reverse 25s linear infinite;
        }

        /* Utility classes for JS */
        .hidden { display: none !important; }
        .fade-out { opacity: 0; }
        .animate-in {
            opacity: 1 !important;
            transform: translateY(0) !important;
        }

        /* FIX for Nav Menu */
        .desktop-nav {
            display: none; /* Hidden by default */
        }
        @media (min-width: 768px) { /* md breakpoint */
            .desktop-nav {
                display: flex; /* Visible on medium screens and up */
            }
            .mobile-nav-button {
                display: none; /* Hide hamburger on medium screens and up */
            }
        }
    </style>
</head>
<body>

    <!-- Background Elements -->
    <div class="blueprint-overlay"></div>
    <div class="particles" id="particles-container"></div>

    <!-- Loading Screen -->
    <div id="loader" class="loader-container fixed inset-0 z-[100] flex items-center justify-center animated-bg">
        <div class="text-center">
            <div class="loader mx-auto mb-4"></div>
            <h2 class="text-white text-xl font-light">Loading Excellence...</h2>
        </div>
    </div>

    <!-- ===== WIDGETS ===== -->
    <!-- WhatsApp Chat Widget -->
    <div class="fixed bottom-5 right-5 z-50">
        <div class="relative">
            <button id="whatsapp-btn" aria-label="Open WhatsApp Chat" class="bg-[#25D366] w-14 h-14 rounded-full flex items-center justify-center shadow-lg transition-transform hover:scale-110">
                <i class="fab fa-whatsapp text-2xl text-white"></i>
            </button>
            <div id="whatsapp-popup" class="hidden absolute bottom-16 right-0 w-72 bg-white rounded-lg shadow-2xl overflow-hidden transition-all duration-300 opacity-0 -translate-y-4">
                <div class="bg-[#128C7E] text-white p-3 flex justify-between items-center">
                    <span class="font-semibold">Banan Support</span>
                    <button id="whatsapp-close-btn" aria-label="Close WhatsApp Chat"><i class="fas fa-times"></i></button>
                </div>
                <div class="p-4 bg-[#ECE5DD]">
                    <p class="text-sm text-gray-700 mb-2">Chat with us on WhatsApp!</p>
                    <input type="text" id="whatsapp-input" class="w-full px-3 py-2 text-sm border border-gray-300 rounded-full outline-none focus:ring-2 focus:ring-[#128C7E]" placeholder="Type a message...">
                </div>
            </div>
        </div>
    </div>

    <!-- AI Chat Widget -->
    <div class="fixed bottom-24 right-5 z-50">
        <button id="ai-chat-btn" aria-label="Open AI Assistant" class="bg-gradient-to-br from-cyan-400 to-blue-500 w-14 h-14 rounded-full flex items-center justify-center shadow-lg transition-transform hover:scale-110">
            <i class="fas fa-robot text-2xl text-white"></i>
        </button>
        <div id="ai-chat-popup" class="hidden absolute bottom-16 right-0 w-80 glass-dark rounded-xl shadow-2xl flex flex-col transition-all duration-300 opacity-0 -translate-y-4" style="height: 500px;">
            <div class="bg-gradient-to-r from-cyan-500 to-blue-600 text-white p-3 flex justify-between items-center flex-shrink-0">
                <span class="font-semibold">AI Assistant</span>
                <button id="ai-chat-close-btn" aria-label="Close AI Assistant"><i class="fas fa-times"></i></button>
            </div>
            <div id="ai-chat-body" class="ai-chat-body flex-grow p-4 space-y-4 overflow-y-auto">
                <!-- Messages will be injected here by JS -->
            </div>
            <div class="p-4 flex-shrink-0 border-t border-white/10">
                <form id="ai-chat-form">
                    <input type="text" id="ai-chat-input" class="w-full bg-gray-900/50 border border-cyan-400/50 rounded-full px-4 py-2 text-white outline-none focus:ring-2 focus:ring-cyan-400" placeholder="Ask about our services..." autocomplete="off">
                </form>
            </div>
        </div>
    </div>
    
    <!-- Header & Navigation -->
    <header id="header" class="fixed top-0 left-0 right-0 z-40 transition-all duration-300 text-white">
        <div class="container mx-auto px-6 py-4 flex justify-between items-center">
            <a href="#home" class="text-2xl font-display font-bold text-gradient glow-text">Banan Int'l</a>
            <nav class="desktop-nav space-x-8 items-center text-sm font-medium">
                <a href="#about" class="hover:text-cyan-400 transition-colors relative group">About <span class="absolute -bottom-1 left-0 w-0 h-0.5 bg-cyan-400 transition-all duration-300 group-hover:w-full"></span></a>
                <a href="#services" class="hover:text-cyan-400 transition-colors relative group">Services <span class="absolute -bottom-1 left-0 w-0 h-0.5 bg-cyan-400 transition-all duration-300 group-hover:w-full"></span></a>
                <a href="#projects" class="hover:text-cyan-400 transition-colors relative group">Projects <span class="absolute -bottom-1 left-0 w-0 h-0.5 bg-cyan-400 transition-all duration-300 group-hover:w-full"></span></a>
                <a href="#contact" class="btn-primary text-white font-semibold py-2 px-5 rounded-full transform hover:scale-105">Contact Us</a>
            </nav>
            <div class="mobile-nav-button">
                <button id="mobile-menu-btn" class="text-2xl" aria-label="Toggle mobile menu">
                    <i id="mobile-menu-icon" class="fa-solid fa-bars transition-transform duration-300"></i>
                </button>
            </div>
        </div>
        <!-- Mobile Menu -->
        <div id="mobile-menu" class="hidden md:hidden glass-dark text-white">
            <a href="#about" class="block py-3 px-6 hover:bg-white/10">About</a>
            <a href="#services" class="block py-3 px-6 hover:bg-white/10">Services</a>
            <a href="#projects" class="block py-3 px-6 hover:bg-white/10">Projects</a>
            <a href="#contact" class="block py-3 px-6 hover:bg-white/10">Contact Us</a>
        </div>
    </header>

    <!-- Main Content -->
    <main class="relative z-10">
        <!-- 1. Hero Section -->
        <section id="home" class="relative h-screen flex items-center justify-center text-white text-center animated-bg overflow-hidden">
            <!-- Animated Circuits -->
            <svg class="circuit-bg" preserveAspectRatio="xMidYMid slice" viewBox="0 0 1920 1080">
                <defs>
                    <linearGradient id="circuit-gradient" x1="0%" y1="0%" x2="100%" y2="100%">
                        <stop offset="0%" style="stop-color: #4facfe; stop-opacity: 0.3" />
                        <stop offset="100%" style="stop-color: #00f2fe; stop-opacity: 0.1" />
                    </linearGradient>
                </defs>
                <path d="M 0 500 Q 200 450, 400 550 T 800 500 T 1200 600 T 1600 550 T 1920 650" />
                <path d="M 0 200 Q 300 300, 500 200 T 900 300 T 1300 250 T 1700 350 L 1920 300" style="animation-delay: 2s;"/>
                <path d="M 1920 900 Q 1700 800, 1500 900 T 1100 800 T 700 850 T 300 950 L 0 900" style="animation-delay: 4s;"/>
            </svg>

            <div class="absolute top-20 left-10 w-72 h-72 bg-gradient-to-br from-cyan-400/20 to-blue-500/20 morphing-shape"></div>
            <div class="absolute bottom-20 right-10 w-96 h-96 bg-gradient-to-br from-purple-400/20 to-pink-500/20 morphing-shape" style="animation-delay: 4s;"></div>
            
            <div class="container mx-auto px-6 z-10">
                <div class="animate-on-scroll opacity-0 -translate-y-10 transition-all duration-1000">
                    <h1 class="text-5xl md:text-7xl font-display font-black leading-tight mb-4 text-gradient glow-text">
                        Delivering MEP Excellence
                    </h1>
                    <div class="text-2xl md:text-3xl font-light mb-6 min-h-[40px]">
                        <span id="typing-effect"></span><span class="typing-cursor"></span>
                    </div>
                    <p class="text-xl md:text-2xl font-light mb-10 text-gray-300">Fire | Automation | Generator | 24/7 Maintenance</p>
                    <a href="#contact" class="btn-primary text-white font-bold py-4 px-8 rounded-full text-lg transition-all duration-300 transform hover:scale-110 shadow-2xl shadow-blue-500/20">
                        Start Your Project
                    </a>
                </div>
            </div>
        </section>

        <!-- 2. About Us Section -->
        <section id="about" class="py-24 bg-black/80">
            <div class="container mx-auto px-6">
                <div class="grid md:grid-cols-2 gap-12 items-center">
                    <div class="animate-on-scroll opacity-0 -translate-y-10 transition-all duration-1000">
                        <h2 class="text-4xl md:text-5xl font-display font-bold text-white mb-4 text-center md:text-left">About <span class="text-gradient">Banan International</span></h2>
                        <div class="w-20 h-1 bg-gradient-to-r from-cyan-400 to-blue-500 mx-auto md:mx-0 mb-10 rounded-full"></div>
                        <p class="text-gray-300 text-lg leading-relaxed glass-dark p-8 rounded-2xl">
                            A one-stop, internationally certified solution provider for MEP (HVAC, Electrical, Plumbing), Fire Alarm & Fighting, Generators, Water Treatment, CCTV and Automation systems. Based in Doha, we are committed to excellence, integrity, and reliability.
                        </p>
                    </div>
                    <div class="animate-on-scroll opacity-0 translate-y-10 transition-all duration-1000 delay-200">
                        <img src="https://images.unsplash.com/photo-1581092446327-9b52bd4a7dc5?auto=format&fit=crop&q=80&w=800"
                             onerror="this.onerror=null;this.src='https://placehold.co/800x600/0a0a0f/FFF?text=Our+Team';"
                             alt="Engineering team collaborating" loading="lazy" class="rounded-2xl shadow-2xl w-full h-auto object-cover card-3d">
                    </div>
                </div>
            </div>
        </section>

        <!-- NEW: Our Process Section -->
        <section id="process" class="py-24 animated-bg">
            <div class="container mx-auto px-6">
                <div class="animate-on-scroll opacity-0 -translate-y-10 transition-all duration-1000 text-center mb-16">
                    <h2 class="text-4xl md:text-5xl font-display font-bold text-white mb-4">Our Engineering Process</h2>
                    <div class="w-20 h-1 bg-gradient-to-r from-cyan-400 to-blue-500 mx-auto rounded-full"></div>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-4 gap-8 text-white text-center">
                    <!-- Process Item 1 -->
                    <div class="process-item relative animate-on-scroll opacity-0 -translate-y-10 transition-all duration-1000" style="transition-delay: 100ms;">
                        <div class="glass-dark rounded-full w-32 h-32 flex items-center justify-center mx-auto mb-4 border-2 border-cyan-400/50">
                            <i class="fas fa-comments text-5xl text-cyan-300"></i>
                        </div>
                        <h3 class="text-xl font-bold mb-2">Consultation</h3>
                        <p class="text-gray-300 text-sm">Understanding your vision and requirements.</p>
                        <div class="process-line hidden md:block"></div>
                    </div>
                    <!-- Process Item 2 -->
                    <div class="process-item relative animate-on-scroll opacity-0 -translate-y-10 transition-all duration-1000" style="transition-delay: 200ms;">
                        <div class="glass-dark rounded-full w-32 h-32 flex items-center justify-center mx-auto mb-4 border-2 border-cyan-400/50">
                            <i class="fas fa-drafting-compass text-5xl text-cyan-300"></i>
                        </div>
                        <h3 class="text-xl font-bold mb-2">Design & Planning</h3>
                        <p class="text-gray-300 text-sm">Creating detailed blueprints and strategies.</p>
                        <div class="process-line hidden md:block"></div>
                    </div>
                    <!-- Process Item 3 -->
                    <div class="process-item relative animate-on-scroll opacity-0 -translate-y-10 transition-all duration-1000" style="transition-delay: 300ms;">
                        <div class="glass-dark rounded-full w-32 h-32 flex items-center justify-center mx-auto mb-4 border-2 border-cyan-400/50">
                            <i class="fas fa-cogs text-5xl text-cyan-300"></i>
                        </div>
                        <h3 class="text-xl font-bold mb-2">Implementation</h3>
                        <p class="text-gray-300 text-sm">Executing the plan with precision and quality.</p>
                        <div class="process-line hidden md:block"></div>
                    </div>
                    <!-- Process Item 4 -->
                    <div class="process-item relative animate-on-scroll opacity-0 -translate-y-10 transition-all duration-1000" style="transition-delay: 400ms;">
                        <div class="glass-dark rounded-full w-32 h-32 flex items-center justify-center mx-auto mb-4 border-2 border-cyan-400/50">
                            <i class="fas fa-headset text-5xl text-cyan-300"></i>
                        </div>
                        <h3 class="text-xl font-bold mb-2">Support & Maintenance</h3>
                        <p class="text-gray-300 text-sm">Providing ongoing 24/7 support for all systems.</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- 2.5. Animated Stats Section -->
        <section id="stats" class="py-20 bg-black/80">
            <div class="container mx-auto px-6">
                <div class="animate-on-scroll opacity-0 -translate-y-10 transition-all duration-1000 text-center mb-12">
                    <h2 class="text-3xl md:text-4xl font-display font-bold text-white mb-4">Our Achievements in Numbers</h2>
                    <div class="w-20 h-1 bg-gradient-to-r from-cyan-400 to-blue-500 mx-auto rounded-full"></div>
                </div>
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8 text-white">
                    <div class="glass-dark p-6 rounded-xl text-center">
                        <i class="fas fa-hard-hat text-4xl text-cyan-400 mb-3"></i>
                        <p class="text-4xl font-display font-bold" data-counter="150">0</p>
                        <p class="text-gray-300">Projects Completed</p>
                    </div>
                    <div class="glass-dark p-6 rounded-xl text-center">
                        <i class="fas fa-users text-4xl text-cyan-400 mb-3"></i>
                        <p class="text-4xl font-display font-bold" data-counter="25">0</p>
                        <p class="text-gray-300">Years of Experience</p>
                    </div>
                    <div class="glass-dark p-6 rounded-xl text-center">
                        <i class="fas fa-headset text-4xl text-cyan-400 mb-3"></i>
                        <p class="text-4xl font-display font-bold" data-counter="300">0</p>
                        <p class="text-gray-300">Systems Maintained</p>
                    </div>
                    <div class="glass-dark p-6 rounded-xl text-center">
                        <i class="fas fa-smile text-4xl text-cyan-400 mb-3"></i>
                        <p class="text-4xl font-display font-bold"><span data-counter="99">0</span>%</p>
                        <p class="text-gray-300">Client Satisfaction</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- 3. Services Section -->
        <section id="services" class="py-24 bg-black/80">
            <div class="container mx-auto px-6">
                <div class="animate-on-scroll opacity-0 -translate-y-10 transition-all duration-1000 text-center mb-16">
                    <h2 class="text-4xl md:text-5xl font-display font-bold text-white mb-4">Our Core Services</h2>
                    <div class="w-20 h-1 bg-gradient-to-r from-cyan-400 to-blue-500 mx-auto rounded-full"></div>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    <!-- Service Cards -->
                    <div class="glass-dark p-8 rounded-2xl text-center card-3d">
                        <div class="service-icon-wrapper mx-auto mb-6">
                            <svg class="animated-gear" viewBox="0 0 100 100" xmlns="http://www.w3.org/2000/svg"><path d="M50,2.5A47.5,47.5,0,0,1,97.5,50,47.5,47.5,0,0,1,50,97.5,47.5,47.5,0,0,1,2.5,50,47.5,47.5,0,0,1,50,2.5Zm0,10A37.5,37.5,0,1,0,87.5,50,37.5,37.5,0,0,0,50,12.5ZM50,4.69l3.4,10.45h11l-8.9,6.47,3.4,10.45-8.9-6.47-8.9,6.47,3.4-10.45-8.9-6.47h11Z" transform="translate(0,0)" fill="currentColor"/></svg>
                            <div class="bg-gradient-to-br from-cyan-500 to-blue-600 text-white rounded-full w-20 h-20 flex items-center justify-center shadow-lg absolute inset-0"><i class="fas fa-cogs fa-2x"></i></div>
                        </div>
                        <h3 class="text-xl font-bold mb-3 text-white">Generator & Fuel Systems</h3>
                        <p class="text-gray-300 mb-4 text-sm">Reliable power solutions and automated fuel systems for uninterrupted operations.</p>
                        <div class="model-viewer" data-model-type="box"></div>
                    </div>
                    <div class="glass-dark p-8 rounded-2xl text-center card-3d">
                        <div class="service-icon-wrapper mx-auto mb-6">
                            <svg class="animated-gear reverse" viewBox="0 0 100 100" xmlns="http://www.w3.org/2000/svg"><path d="M50,2.5A47.5,47.5,0,0,1,97.5,50,47.5,47.5,0,0,1,50,97.5,47.5,47.5,0,0,1,2.5,50,47.5,47.5,0,0,1,50,2.5Zm0,10A37.5,37.5,0,1,0,87.5,50,37.5,37.5,0,0,0,50,12.5ZM50,4.69l3.4,10.45h11l-8.9,6.47,3.4,10.45-8.9-6.47-8.9,6.47,3.4-10.45-8.9-6.47h11Z" transform="translate(0,0)" fill="currentColor"/></svg>
                            <div class="bg-gradient-to-br from-red-500 to-pink-600 text-white rounded-full w-20 h-20 flex items-center justify-center shadow-lg absolute inset-0"><i class="fas fa-fire-extinguisher fa-2x"></i></div>
                        </div>
                        <h3 class="text-xl font-bold mb-3 text-white">Fire Alarm & Fighting</h3>
                        <p class="text-gray-300 mb-4 text-sm">Advanced fire detection and suppression systems compliant with international standards.</p>
                        <div class="model-viewer" data-model-type="sphere"></div>
                    </div>
                    <div class="glass-dark p-8 rounded-2xl text-center card-3d">
                        <div class="service-icon-wrapper mx-auto mb-6">
                            <svg class="animated-gear" viewBox="0 0 100 100" xmlns="http://www.w3.org/2000/svg"><path d="M50,2.5A47.5,47.5,0,0,1,97.5,50,47.5,47.5,0,0,1,50,97.5,47.5,47.5,0,0,1,2.5,50,47.5,47.5,0,0,1,50,2.5Zm0,10A37.5,37.5,0,1,0,87.5,50,37.5,37.5,0,0,0,50,12.5ZM50,4.69l3.4,10.45h11l-8.9,6.47,3.4,10.45-8.9-6.47-8.9,6.47,3.4-10.45-8.9-6.47h11Z" transform="translate(0,0)" fill="currentColor"/></svg>
                            <div class="bg-gradient-to-br from-green-500 to-emerald-600 text-white rounded-full w-20 h-20 flex items-center justify-center shadow-lg absolute inset-0"><i class="fas fa-headset fa-2x"></i></div>
                        </div>
                        <h3 class="text-xl font-bold mb-3 text-white">24/7 Maintenance</h3>
                        <p class="text-gray-300 mb-4 text-sm">Comprehensive maintenance packages with round-the-clock support to ensure system longevity.</p>
                        <div class="model-viewer" data-model-type="torus"></div>
                    </div>
                    <div class="glass-dark p-8 rounded-2xl text-center card-3d">
                        <div class="service-icon-wrapper mx-auto mb-6">
                            <svg class="animated-gear reverse" viewBox="0 0 100 100" xmlns="http://www.w3.org/2000/svg"><path d="M50,2.5A47.5,47.5,0,0,1,97.5,50,47.5,47.5,0,0,1,50,97.5,47.5,47.5,0,0,1,2.5,50,47.5,47.5,0,0,1,50,2.5Zm0,10A37.5,37.5,0,1,0,87.5,50,37.5,37.5,0,0,0,50,12.5ZM50,4.69l3.4,10.45h11l-8.9,6.47,3.4,10.45-8.9-6.47-8.9,6.47,3.4-10.45-8.9-6.47h11Z" transform="translate(0,0)" fill="currentColor"/></svg>
                            <div class="bg-gradient-to-br from-purple-500 to-indigo-600 text-white rounded-full w-20 h-20 flex items-center justify-center shadow-lg absolute inset-0"><i class="fas fa-microchip fa-2x"></i></div>
                        </div>
                        <h3 class="text-xl font-bold mb-3 text-white">Automation & Control</h3>
                        <p class="text-gray-300 mb-4 text-sm">Smart automation and custom control panels for efficient system management.</p>
                        <div class="model-viewer" data-model-type="cone"></div>
                    </div>
                    <div class="glass-dark p-8 rounded-2xl text-center card-3d">
                        <div class="service-icon-wrapper mx-auto mb-6">
                             <svg class="animated-gear" viewBox="0 0 100 100" xmlns="http://www.w3.org/2000/svg"><path d="M50,2.5A47.5,47.5,0,0,1,97.5,50,47.5,47.5,0,0,1,50,97.5,47.5,47.5,0,0,1,2.5,50,47.5,47.5,0,0,1,50,2.5Zm0,10A37.5,37.5,0,1,0,87.5,50,37.5,37.5,0,0,0,50,12.5ZM50,4.69l3.4,10.45h11l-8.9,6.47,3.4,10.45-8.9-6.47-8.9,6.47,3.4-10.45-8.9-6.47h11Z" transform="translate(0,0)" fill="currentColor"/></svg>
                            <div class="bg-gradient-to-br from-sky-500 to-cyan-600 text-white rounded-full w-20 h-20 flex items-center justify-center shadow-lg absolute inset-0"><i class="fas fa-water fa-2x"></i></div>
                        </div>
                        <h3 class="text-xl font-bold mb-3 text-white">Water Treatment & CCTV</h3>
                        <p class="text-gray-300 mb-4 text-sm">Effective water treatment and high-definition CCTV for security and safety.</p>
                        <div class="model-viewer" data-model-type="cylinder"></div>
                    </div>
                    <div class="glass-dark p-8 rounded-2xl text-center card-3d">
                        <div class="service-icon-wrapper mx-auto mb-6">
                            <svg class="animated-gear reverse" viewBox="0 0 100 100" xmlns="http://www.w3.org/2000/svg"><path d="M50,2.5A47.5,47.5,0,0,1,97.5,50,47.5,47.5,0,0,1,50,97.5,47.5,47.5,0,0,1,2.5,50,47.5,47.5,0,0,1,50,2.5Zm0,10A37.5,37.5,0,1,0,87.5,50,37.5,37.5,0,0,0,50,12.5ZM50,4.69l3.4,10.45h11l-8.9,6.47,3.4,10.45-8.9-6.47-8.9,6.47,3.4-10.45-8.9-6.47h11Z" transform="translate(0,0)" fill="currentColor"/></svg>
                            <div class="bg-gradient-to-br from-orange-500 to-amber-600 text-white rounded-full w-20 h-20 flex items-center justify-center shadow-lg absolute inset-0"><i class="fas fa-hard-hat fa-2x"></i></div>
                        </div>
                        <h3 class="text-xl font-bold mb-3 text-white">MEP Solutions</h3>
                        <p class="text-gray-300 mb-4 text-sm">Full-scope Mechanical, Electrical, and Plumbing services for projects of all sizes.</p>
                        <div class="model-viewer" data-model-type="dodecahedron"></div>
                    </div>
                </div>
            </div>
        </section>

        <!-- 4. Projects Section -->
        <section id="projects" class="py-24 animated-bg">
            <div class="container mx-auto px-6">
                <div class="animate-on-scroll opacity-0 -translate-y-10 transition-all duration-1000 text-center mb-16">
                    <h2 class="text-4xl md:text-5xl font-display font-bold text-white mb-4">Featured Projects</h2>
                    <div class="w-20 h-1 bg-gradient-to-r from-cyan-400 to-blue-500 mx-auto rounded-full"></div>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    <div class="group relative overflow-hidden rounded-2xl shadow-2xl card-3d">
                        <img src="https://images.unsplash.com/photo-1511882150382-421059c8143f?auto=format&fit=crop&q=80&w=800"
                             onerror="this.onerror=null;this.src='https://placehold.co/800x960/0a0a0f/FFF?text=Project+Image';"
                             alt="Large scale industrial plant" loading="lazy" class="w-full h-96 object-cover transform group-hover:scale-110 transition-transform duration-700">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-transparent"></div>
                        <div class="absolute bottom-0 p-6">
                            <h3 class="text-white text-2xl font-bold">Industrial Power Plant</h3>
                            <p class="text-gray-300 opacity-0 group-hover:opacity-100 transition-opacity duration-500">Full MEP and automated generator backup system installation.</p>
                        </div>
                    </div>
                    <div class="group relative overflow-hidden rounded-2xl shadow-2xl card-3d">
                        <img src="https://images.unsplash.com/photo-1579543944358-a9a7e051794b?auto=format&fit=crop&q=80&w=800"
                             onerror="this.onerror=null;this.src='https://placehold.co/800x960/0a0a0f/FFF?text=Project+Image';"
                             alt="Modern skyscraper with complex facade" loading="lazy" class="w-full h-96 object-cover transform group-hover:scale-110 transition-transform duration-700">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-transparent"></div>
                        <div class="absolute bottom-0 p-6">
                            <h3 class="text-white text-2xl font-bold">Commercial High-Rise</h3>
                            <p class="text-gray-300 opacity-0 group-hover:opacity-100 transition-opacity duration-500">Advanced fire safety and building automation systems.</p>
                        </div>
                    </div>
                    <div class="group relative overflow-hidden rounded-2xl shadow-2xl card-3d">
                        <img src="https://images.unsplash.com/photo-1621905251189-08b45d6a269e?auto=format&fit=crop&q=80&w=800"
                             onerror="this.onerror=null;this.src='https://placehold.co/800x960/0a0a0f/FFF?text=Project+Image';"
                             alt="Luxury hotel interior" loading="lazy" class="w-full h-96 object-cover transform group-hover:scale-110 transition-transform duration-700">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-transparent"></div>
                        <div class="absolute bottom-0 p-6">
                            <h3 class="text-white text-2xl font-bold">5-Star Hotel Complex</h3>
                            <p class="text-gray-300 opacity-0 group-hover:opacity-100 transition-opacity duration-500">24/7 maintenance contract and smart HVAC upgrades.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- 5. Testimonials Section -->
        <section id="testimonials" class="py-24 bg-black/80">
            <div class="container mx-auto px-6">
                <div class="animate-on-scroll opacity-0 -translate-y-10 transition-all duration-1000 text-center mb-16">
                    <h2 class="text-4xl md:text-5xl font-display font-bold text-white mb-4">What Our Clients Say</h2>
                    <div class="w-20 h-1 bg-gradient-to-r from-cyan-400 to-blue-500 mx-auto rounded-full"></div>
                </div>
                <div id="testimonial-slider" class="relative max-w-4xl mx-auto">
                    <div class="overflow-hidden">
                        <div id="testimonial-track" class="flex transition-transform duration-500 ease-in-out">
                            <!-- Testimonials will be injected here by JS -->
                        </div>
                    </div>
                    <button id="testimonial-prev" aria-label="Previous testimonial" class="absolute top-1/2 -left-4 md:-left-16 -translate-y-1/2 bg-white/10 hover:bg-white/20 w-12 h-12 rounded-full flex items-center justify-center transition-all"><i class="fas fa-chevron-left text-white"></i></button>
                    <button id="testimonial-next" aria-label="Next testimonial" class="absolute top-1/2 -right-4 md:-right-16 -translate-y-1/2 bg-white/10 hover:bg-white/20 w-12 h-12 rounded-full flex items-center justify-center transition-all"><i class="fas fa-chevron-right text-white"></i></button>
                </div>
            </div>
        </section>
        
        <!-- 6. Contact & Footer -->
        <footer id="contact" class="animated-bg pt-24">
            <div class="container mx-auto px-6">
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-12 text-white">
                    <!-- About & Contact Info -->
                    <div class="lg:col-span-1">
                        <h3 class="text-2xl font-display font-bold mb-4 text-gradient">Banan Int'l</h3>
                        <p class="text-gray-300 mb-6 text-sm leading-relaxed">Your trusted partner for integrated engineering solutions in Doha, Qatar.</p>
                        <div class="space-y-3 text-sm">
                            <p class="flex items-start"><i class="fas fa-map-marker-alt text-cyan-400 mt-1 mr-3"></i><span>Doha, Qatar</span></p>
                            <p class="flex items-center"><i class="fas fa-phone text-cyan-400 mr-3"></i><span>+974 5512 3456</span></p>
                            <p class="flex items-center"><i class="fas fa-envelope text-cyan-400 mr-3"></i><span>info@banan-intl.com</span></p>
                        </div>
                    </div>
                    
                    <!-- Contact Form -->
                    <div class="lg:col-span-2">
                        <h3 class="text-xl font-display font-bold mb-4">Request a Quote</h3>
                        <div id="contact-form-success" class="hidden glass-dark p-4 rounded-lg text-center">
                            <p class="font-semibold text-green-400">Thank you! Your message has been sent.</p>
                            <p class="text-sm text-gray-300">Our team will get back to you shortly.</p>
                        </div>
                        <form id="contact-form" class="space-y-4">
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div>
                                    <label for="name" class="sr-only">Your Name</label>
                                    <input type="text" id="name" placeholder="Your Name" required class="glass-dark text-white placeholder-gray-400 rounded-lg p-3 w-full focus:outline-none focus:ring-2 focus:ring-cyan-400">
                                </div>
                                <div>
                                    <label for="email" class="sr-only">Your Email</label>
                                    <input type="email" id="email" placeholder="Your Email" required class="glass-dark text-white placeholder-gray-400 rounded-lg p-3 w-full focus:outline-none focus:ring-2 focus:ring-cyan-400">
                                </div>
                            </div>
                            <div>
                                <label for="subject" class="sr-only">Subject</label>
                                <input type="text" id="subject" placeholder="Subject" required class="glass-dark text-white placeholder-gray-400 rounded-lg p-3 w-full focus:outline-none focus:ring-2 focus:ring-cyan-400">
                            </div>
                            <div>
                                <label for="message" class="sr-only">Your Message</label>
                                <textarea id="message" placeholder="Your Message" rows="4" required class="glass-dark text-white placeholder-gray-400 rounded-lg p-3 w-full focus:outline-none focus:ring-2 focus:ring-cyan-400 resize-none"></textarea>
                            </div>
                            <button type="submit" class="w-full btn-primary text-white font-bold py-3 px-6 rounded-lg transform hover:scale-105">Send Message <i class="fas fa-paper-plane ml-2"></i></button>
                        </form>
                    </div>

                    <!-- Social & Certifications -->
                    <div class="lg:col-span-1">
                        <h3 class="text-xl font-display font-bold mb-4">Connect With Us</h3>
                        <div class="flex space-x-3 mb-6">
                            <a href="javascript:void(0);" aria-label="Facebook" class="w-10 h-10 bg-white/10 rounded-full flex items-center justify-center hover:bg-white/20 transition-all"><i class="fab fa-facebook-f"></i></a>
                            <a href="javascript:void(0);" aria-label="LinkedIn" class="w-10 h-10 bg-white/10 rounded-full flex items-center justify-center hover:bg-white/20 transition-all"><i class="fab fa-linkedin-in"></i></a>
                            <a href="javascript:void(0);" aria-label="Twitter" class="w-10 h-10 bg-white/10 rounded-full flex items-center justify-center hover:bg-white/20 transition-all"><i class="fab fa-twitter"></i></a>
                        </div>
                        <h3 class="text-xl font-display font-bold mb-4">Certifications</h3>
                        <div class="flex space-x-4">
                            <div class="glass-dark rounded-lg p-3 text-center flex-1">
                                <i class="fas fa-certificate text-2xl text-cyan-400 mb-1"></i>
                                <p class="text-xs font-semibold">ISO 9001:2015</p>
                            </div>
                            <div class="glass-dark rounded-lg p-3 text-center flex-1">
                                <i class="fas fa-shield-alt text-2xl text-green-400 mb-1"></i>
                                <p class="text-xs font-semibold">QCDD Approved</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Footer Bottom -->
                <div class="border-t border-white/10 mt-12 py-6 text-center text-gray-400 text-sm">
                    <p>&copy; <span id="year"></span> Banan International. All Rights Reserved.</p>
                </div>
            </div>
        </footer>
    </main>

<!-- Three.js for 3D models (moved here for reliable loading order) -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/three.js/0.165.0/three.min.js"></script>

<script>
document.addEventListener('DOMContentLoaded', () => {

    // --- UTILITY FUNCTIONS ---
    
    // Helper function for exponential backoff retry mechanism for API calls
    const exponentialBackoff = async (apiCall, maxRetries = 5) => {
        let delay = 1000; // Start with 1 second
        for (let i = 0; i < maxRetries; i++) {
            try {
                const response = await apiCall();
                // If response is ok, or a client-side error we shouldn't retry, return it
                if (response.ok || (response.status >= 400 && response.status < 500)) {
                    return response;
                }
            } catch (error) {
                console.error("Network or other error during fetch:", error);
            }
            // Wait for the delay and then double it for the next retry
            if (i < maxRetries - 1) {
                await new Promise(resolve => setTimeout(resolve, delay));
                delay *= 2;
            }
        }
        console.error("API call failed after multiple retries.");
        return null; // Indicate failure after all retries
    };

    // --- INITIALIZATION ---
    
    // Set current year in footer
    document.getElementById('year').textContent = new Date().getFullYear();

    // Hide loader and show page content
    setTimeout(() => {
        const loader = document.getElementById('loader');
        loader.classList.add('fade-out');
        loader.addEventListener('transitionend', () => loader.classList.add('hidden'));
    }, 500);

    // Initialize floating particles
    const particlesContainer = document.getElementById('particles-container');
    const particleCount = 25;
    for (let i = 0; i < particleCount; i++) {
        const p = document.createElement('div');
        p.className = 'particle';
        p.style.left = `${Math.random() * 100}%`;
        p.style.animationDelay = `${Math.random() * 8}s`;
        p.style.animationDuration = `${Math.random() * 5 + 5}s`;
        particlesContainer.appendChild(p);
    }

    // --- HEADER & NAVIGATION ---

    const header = document.getElementById('header');
    const mobileMenuBtn = document.getElementById('mobile-menu-btn');
    const mobileMenu = document.getElementById('mobile-menu');
    const mobileMenuIcon = document.getElementById('mobile-menu-icon');

    // Sticky header on scroll
    window.addEventListener('scroll', () => {
        if (window.scrollY > 50) {
            header.classList.add('nav-glass');
        } else {
            header.classList.remove('nav-glass');
        }
    });

    // Toggle mobile menu
    mobileMenuBtn.addEventListener('click', () => {
        const isMenuOpen = !mobileMenu.classList.contains('hidden');
        mobileMenu.classList.toggle('hidden');
        mobileMenuIcon.classList.toggle('fa-bars', isMenuOpen);
        mobileMenuIcon.classList.toggle('fa-xmark', !isMenuOpen);
    });

    // Close mobile menu when a link is clicked
    mobileMenu.addEventListener('click', (e) => {
        if (e.target.tagName === 'A') {
            mobileMenuBtn.click();
        }
    });

    // --- POPUP WIDGETS (WhatsApp & AI Chat) ---

    function setupPopup(btnId, popupId, closeBtnId) {
        const btn = document.getElementById(btnId);
        const popup = document.getElementById(popupId);
        const closeBtn = document.getElementById(closeBtnId);

        const openPopup = () => {
            popup.classList.remove('hidden');
            setTimeout(() => { // Allow display property to apply before starting transition
                popup.classList.remove('opacity-0', '-translate-y-4');
            }, 10);
        };

        const closePopup = () => {
            popup.classList.add('opacity-0', '-translate-y-4');
            popup.addEventListener('transitionend', () => {
                popup.classList.add('hidden');
            }, { once: true });
        };

        btn.addEventListener('click', (e) => {
            e.stopPropagation();
            const isHidden = popup.classList.contains('hidden');
            if (isHidden) openPopup();
            else closePopup();
        });

        if (closeBtn) {
            closeBtn.addEventListener('click', (e) => {
                e.stopPropagation();
                closePopup();
            });
        }
        
        // Close when clicking outside
        document.addEventListener('click', (e) => {
            if (!popup.contains(e.target) && !btn.contains(e.target)) {
                if (!popup.classList.contains('hidden')) {
                    closePopup();
                }
            }
        });
    }

    setupPopup('whatsapp-btn', 'whatsapp-popup', 'whatsapp-close-btn');
    setupPopup('ai-chat-btn', 'ai-chat-popup', 'ai-chat-close-btn');

    // WhatsApp input functionality
    const whatsappInput = document.getElementById('whatsapp-input');
    whatsappInput.addEventListener('keyup', (e) => {
        if (e.key === 'Enter') {
            const message = whatsappInput.value.trim();
            if (message) {
                window.open(`https://wa.me/+97455123456?text=${encodeURIComponent(message)}`, '_blank');
                whatsappInput.value = '';
            }
        }
    });

    // --- AI CHAT WIDGET LOGIC ---

    const aiChat = {
        form: document.getElementById('ai-chat-form'),
        input: document.getElementById('ai-chat-input'),
        body: document.getElementById('ai-chat-body'),
        history: [],
        isTyping: false,

        init() {
            this.addMessage("Hello! How can I assist you with your engineering needs today?", false);
            this.form.addEventListener('submit', (e) => {
                e.preventDefault();
                this.sendMessage();
            });
        },

        addMessage(text, isUser) {
            const wrapper = document.createElement('div');
            wrapper.className = `flex ${isUser ? 'justify-end' : 'justify-start'}`;
            
            const messageDiv = document.createElement('div');
            messageDiv.className = `p-3 rounded-xl max-w-[85%] text-white ${isUser ? 'bg-blue-500 rounded-br-none' : 'bg-gray-700 rounded-bl-none'}`;
            messageDiv.innerHTML = text; // Use innerHTML to render markdown line breaks etc.
            
            wrapper.appendChild(messageDiv);
            this.body.appendChild(wrapper);
            this.scrollToBottom();
        },
        
        showTypingIndicator() {
            if (document.getElementById('typing-indicator')) return;
            const typingIndicatorHTML = `
                <div id="typing-indicator" class="flex justify-start">
                    <div class="bg-gray-700 rounded-xl rounded-bl-none p-3 text-white flex items-center space-x-2">
                        <span class="w-2 h-2 bg-cyan-300 rounded-full animate-pulse" style="animation-delay: -0.3s;"></span>
                        <span class="w-2 h-2 bg-cyan-300 rounded-full animate-pulse" style="animation-delay: -0.15s;"></span>
                        <span class="w-2 h-2 bg-cyan-300 rounded-full animate-pulse"></span>
                    </div>
                </div>`;
            this.body.insertAdjacentHTML('beforeend', typingIndicatorHTML);
            this.scrollToBottom();
        },

        hideTypingIndicator() {
            const indicator = document.getElementById('typing-indicator');
            if (indicator) indicator.remove();
        },

        scrollToBottom() {
            this.body.scrollTop = this.body.scrollHeight;
        },

        async sendMessage() {
            const userMessage = this.input.value.trim();
            if (!userMessage || this.isTyping) return;

            this.isTyping = true;
            this.input.disabled = true;
            
            this.addMessage(userMessage, true);
            this.history.push({ role: "user", parts: [{ text: userMessage }] });
            this.input.value = '';
            this.showTypingIndicator();

            const apiKey = ""; // API key is handled by the environment
            const apiUrl = `https://generativelanguage.googleapis.com/v1beta/models/gemini-2.5-flash-preview-05-20:generateContent?key=${apiKey}`;
            
            const systemInstruction = "You are a friendly and professional AI assistant for Banan International, a leading engineering company in Doha, Qatar specializing in MEP, Fire Safety, Automation, and Maintenance. Keep your answers concise and helpful. If asked about services, briefly mention the relevant ones (like Generator Systems, Fire Alarm & Fighting, 24/7 Maintenance, Automation, Water Treatment, CCTV, and full MEP solutions). If asked for contact details, provide them (Phone: +974 5512 3456, Email: info@banan-intl.com). Do not make up information you don't have. Format lists using markdown-style unordered lists (e.g., using '*' or '-') for readability.";

            const payload = {
                contents: [
                    ...this.history
                ],
                systemInstruction: {
                    role: "system",
                    parts: [{ text: systemInstruction }]
                },
                generationConfig: {
                    temperature: 0.7,
                    topP: 0.95,
                }
            };

            const apiCall = () => fetch(apiUrl, {
                method: 'POST',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify(payload)
            });

            try {
                const response = await exponentialBackoff(apiCall);
                if (!response) throw new Error("API response was null after retries.");

                const result = await response.json();
                let botResponse = "Sorry, I couldn't process that. Please try rephrasing your question.";

                if (!response.ok) {
                    botResponse = `Error: ${result.error?.message || `API error (Status: ${response.status})`}`;
                    console.error("Gemini API Error:", result.error);
                } else if (result.candidates && result.candidates[0]?.content?.parts[0]?.text) {
                    botResponse = result.candidates[0].content.parts[0].text;
                }
                
                this.history.push({ role: "model", parts: [{ text: botResponse }] });
                const formattedResponse = botResponse.replace(/\n/g, '<br>').replace(/\* /g, '&bull; ').replace(/- /g, '&bull; ');
                this.addMessage(formattedResponse, false);

            } catch (error) {
                console.error("Error calling Gemini API:", error);
                this.addMessage("I'm having trouble connecting. Please try again in a moment.", false);
            } finally {
                this.isTyping = false;
                this.input.disabled = false;
                this.hideTypingIndicator();
                this.input.focus();
            }
        }
    };
    aiChat.init();

    // --- HERO TYPING EFFECT ---
    
    const typingElement = document.getElementById('typing-effect');
    const textToType = "Engineering Excellence in Qatar";
    let typeIndex = 0;
    function typeEffect() {
        if (typeIndex < textToType.length) {
            typingElement.textContent += textToType.charAt(typeIndex);
            typeIndex++;
            setTimeout(typeEffect, 80);
        }
    }
    typeEffect();

    // --- ANIMATIONS ON SCROLL (Intersection Observer) ---

    const animatedElements = document.querySelectorAll('.animate-on-scroll');
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('animate-in');
                observer.unobserve(entry.target); // Animate only once
            }
        });
    }, { threshold: 0.25 });
    animatedElements.forEach(el => observer.observe(el));

    // --- ANIMATED STATS COUNTER ---

    const counters = document.querySelectorAll('[data-counter]');
    const counterObserver = new IntersectionObserver((entries, observer) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                const el = entry.target;
                const target = +el.getAttribute('data-counter');
                animateCounter(el, target);
                observer.unobserve(el);
            }
        });
    }, { threshold: 0.5 });
    counters.forEach(counter => counterObserver.observe(counter));

    function animateCounter(element, target, duration = 2000) {
        let start = 0;
        const stepTime = Math.abs(Math.floor(duration / target));
        const timer = setInterval(() => {
            start += 1;
            element.innerText = start;
            if (start === target) {
                clearInterval(timer);
            }
        }, stepTime);
    }

    // --- TESTIMONIAL SLIDER ---

    const testimonialSlider = {
        track: document.getElementById('testimonial-track'),
        prevBtn: document.getElementById('testimonial-prev'),
        nextBtn: document.getElementById('testimonial-next'),
        container: document.getElementById('testimonial-slider'),
        currentIndex: 0,
        autoplayInterval: null,
        testimonials: [
            { quote: 'Banan International delivered beyond our expectations. Their professionalism and 24/7 support for our generator systems have been invaluable.', name: 'Ahmed Al-Baker', title: 'Facilities Manager, Mannai Corporation' },
            { quote: 'The fire safety system overhaul at our tower was seamless. The team is knowledgeable and committed to the highest safety standards.', name: 'Fatima Al-Kuwari', title: 'Operations Director, Al Mathaf Tower' },
            { quote: 'From design to commissioning, the MEP work was handled with exceptional skill. We highly recommend their integrated services.', name: 'John Smith', title: 'Chief Engineer, Sheraton Hotel Qatar' }
        ],

        init() {
            this.render();
            this.nextBtn.addEventListener('click', () => this.next());
            this.prevBtn.addEventListener('click', () => this.prev());
            this.startAutoplay();
            this.container.addEventListener('mouseenter', () => this.stopAutoplay());
            this.container.addEventListener('mouseleave', () => this.startAutoplay());
        },
        
        render() {
            this.track.innerHTML = this.testimonials.map(t => `
                <div class="w-full flex-shrink-0 px-4">
                    <div class="glass-dark p-10 md:p-12 rounded-2xl text-center">
                        <i class="fas fa-quote-left text-4xl text-cyan-400/50 mb-6"></i>
                        <p class="text-lg italic mb-8 text-gray-200">${t.quote}</p>
                        <div>
                            <p class="font-bold text-cyan-400 text-lg">${t.name}</p>
                            <p class="text-gray-400 text-sm">${t.title}</p>
                        </div>
                    </div>
                </div>
            `).join('');
        },

        updatePosition() {
            this.track.style.transform = `translateX(-${this.currentIndex * 100}%)`;
        },
        
        next() {
            this.currentIndex = (this.currentIndex + 1) % this.testimonials.length;
            this.updatePosition();
        },
        
        prev() {
            this.currentIndex = (this.currentIndex - 1 + this.testimonials.length) % this.testimonials.length;
            this.updatePosition();
        },
        
        startAutoplay() {
            if (this.autoplayInterval) clearInterval(this.autoplayInterval);
            this.autoplayInterval = setInterval(() => this.next(), 5000);
        },
        
        stopAutoplay() {
            clearInterval(this.autoplayInterval);
        }
    };
    testimonialSlider.init();

    // --- CONTACT FORM ---
    
    const contactForm = document.getElementById('contact-form');
    const formSuccessMessage = document.getElementById('contact-form-success');
    contactForm.addEventListener('submit', (e) => {
        e.preventDefault();
        // Here you would typically send the form data to a server
        // For this demo, we'll just show the success message
        contactForm.classList.add('hidden');
        formSuccessMessage.classList.remove('hidden');
    });

    // --- 3D MODELS (THREE.JS) ---

    function initThreeModel(container) {
        if (typeof THREE === 'undefined') {
            console.error("THREE.js is not loaded.");
            container.textContent = 'Error: 3D library not found.';
            return;
        }

        const modelType = container.dataset.modelType || 'box';
        const scene = new THREE.Scene();
        const renderer = new THREE.WebGLRenderer({ alpha: true, antialias: true });
        container.appendChild(renderer.domElement);
        
        const camera = new THREE.PerspectiveCamera(50, container.clientWidth / container.clientHeight, 0.1, 1000);
        camera.position.z = 3.5;

        scene.add(new THREE.AmbientLight(0xffffff, 1.5));
        const directionalLight = new THREE.DirectionalLight(0xffffff, 2.5);
        directionalLight.position.set(3, 5, 4);
        scene.add(directionalLight);

        let geometry;
        switch (modelType) {
            case 'sphere': geometry = new THREE.SphereGeometry(1, 32, 32); break;
            case 'torus': geometry = new THREE.TorusGeometry(0.8, 0.3, 16, 100); break;
            case 'cone': geometry = new THREE.ConeGeometry(1, 1.5, 32); break;
            case 'cylinder': geometry = new THREE.CylinderGeometry(0.8, 0.8, 1.5, 32); break;
            case 'dodecahedron': geometry = new THREE.DodecahedronGeometry(1.2); break;
            default: geometry = new THREE.BoxGeometry(1.5, 1.5, 1.5); break;
        }
        
        const material = new THREE.MeshStandardMaterial({ color: 0x4facfe, metalness: 0.3, roughness: 0.6 });
        const mesh = new THREE.Mesh(geometry, material);
        scene.add(mesh);

        const onResize = () => {
            if (!container.clientWidth || !container.clientHeight) return;
            renderer.setSize(container.clientWidth, container.clientHeight);
            camera.aspect = container.clientWidth / container.clientHeight;
            camera.updateProjectionMatrix();
        };

        const resizeObserver = new ResizeObserver(onResize);
        resizeObserver.observe(container);
        onResize(); // Initial size set

        const animate = () => {
            requestAnimationFrame(animate);
            mesh.rotation.x += 0.005;
            mesh.rotation.y += 0.007;
            renderer.render(scene, camera);
        };
        animate();

        let isMouseDown = false, lastMouseX = 0, lastMouseY = 0;
        const onMouseDown = (e) => { isMouseDown = true; lastMouseX = e.clientX; lastMouseY = e.clientY; };
        const onMouseUp = () => { isMouseDown = false; };
        const onMouseMove = (e) => {
            if (!isMouseDown) return;
            mesh.rotation.y += (e.clientX - lastMouseX) * 0.01;
            mesh.rotation.x += (e.clientY - lastMouseY) * 0.01;
            lastMouseX = e.clientX; lastMouseY = e.clientY;
        };

        container.addEventListener('mousedown', onMouseDown);
        window.addEventListener('mouseup', onMouseUp); // Listen on window to catch mouseup outside the element
        container.addEventListener('mouseleave', onMouseUp);
        container.addEventListener('mousemove', onMouseMove);
    }

    document.querySelectorAll('.model-viewer').forEach(initThreeModel);

});
</script>
</body>
</html>
