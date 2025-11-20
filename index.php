<?php
include dirname(__FILE__) . '/.private/config.php';
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($company['company_name']); ?></title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="https://cdn.tailwindcss.com"></script>
        <script src="https://cdn.tailwindcss.com"></script>

    <?php require 'include/meta.php'; ?>


    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        'basecrete-red': '#E30613',
                    },
                    animation: {
                        'fade-in': 'fadeIn 0.5s ease-in forwards',
                        'slide-up': 'slideUp 0.8s ease-out forwards',
                    }
                }
            }
        }
    </script>
    <style type="text/css">
        /* Hero Slider */
        .hero-slider {
            overflow: hidden;
        }
        .hero-slide {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            opacity: 0;
            transition: opacity 1s ease;
            background-size: cover;
            background-position: center;
        }
        .hero-slide.active {
            opacity: 1;
        }

        /* Product Card Hover Effect */
        .product-card {
            position: relative;
            overflow: hidden;
        }
        .product-card img {
            transition: transform 0.5s ease;
        }
        .product-card:hover img {
            transform: scale(1.1);
        }
        .product-card:hover .overlay-icon {
            opacity: 1;
            transform: translateY(0);
        }

        .overlay-icon {
            transition: all 0.4s ease;
            opacity: 0;
            transform: translateY(20px);
        }

        /* Custom Animations */
        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }
        @keyframes slideUp {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        /* Animation on scroll */
        .animate-on-scroll {
            opacity: 0;
            transform: translateY(20px);
            transition: all 0.8s ease;
        }
        .animate-on-scroll.active {
            opacity: 1;
            transform: translateY(0);
        }

        /* Smooth Scrolling */
        html {
            scroll-behavior: smooth;
        }
    </style>
</head>
<body class="font-sans bg-gray-50">
    <?php require 'include/header.php'; ?>


    <?php require 'include/hero.php'; ?>

    <!-- About Section -->
    <section id="about" class="py-20 bg-white">
        <div class="container mx-auto px-4">
            <div class="animate-on-scroll flex flex-col md:flex-row items-center justify-between">
                <!-- Image -->
                <div class="md:w-1/2 mb-10 md:mb-0">
                    <div class="relative overflow-hidden rounded-xl shadow-xl">
                        <img src="assets/img/home/<?php echo htmlspecialchars($company['about_image']); ?>" 
                             alt="About <?php echo htmlspecialchars($company['company_name']); ?>" class="w-full h-auto">
                    </div>
                </div>
                
                <!-- Text Content -->
                <div class="md:w-1/2 md:pl-10">
                    <h2 class="text-3xl font-bold mb-4">Mengapa Memilih <?php echo htmlspecialchars($company['company_name']); ?>?</h2>
                    <?php echo ($company['about_description']); ?>
                    <a href="about" class="bg-basecrete-red text-white py-3 px-6 rounded-md inline-block hover:bg-red-800 transition font-medium">
                        Tentang Kami <i class="fas fa-arrow-right ml-2"></i>
                    </a>

                </div>
            </div>
        </div>
    </section>

    <!-- News Section -->
    <section id="news" class="py-20 bg-gray-100">
        <div class="container mx-auto px-4">
            <div class="text-center mb-16">
                <h2 class="text-3xl font-bold">Apakabar Basecretemortar</h2>
                <p class="text-gray-600 mt-4 max-w-2xl mx-auto">Ikuti perkembangan dan berita terbaru dari kami</p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-6">
            <?php foreach ($blogs as $blog): ?>
                <a href="blog_details?slug=<?php echo $blog['slug']; ?>" class="news-card animate-on-scroll block bg-white rounded-lg shadow-md overflow-hidden transition-all duration-300 hover:shadow-xl">
                    <div class="p-5 border-b border-gray-200">
                        <span class="text-basecrete-red font-medium">
                                <?php
                                    // Array bulan dalam Bahasa Indonesia
                                    $months = array(
                                        1 => 'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni',
                                        'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'
                                    );

                                    // Mendapatkan tanggal dan bulan
                                    $date = new DateTime($blog['updated_at']);
                                    $day = $date->format('d');
                                    $month = $months[(int)$date->format('m')]; // Mengambil nama bulan dalam Bahasa Indonesia
                                    $year = $date->format('Y');

                                    // Menampilkan tanggal dalam format "15 Februari 2025"
                                    echo "$day $month $year";
                                ?>

                        </span>
                    </div>
                    <div class="p-5">
                        <h3 class="font-bold text-lg mb-3"><?php echo $blog['title']; ?></h3>
                            <?php 
                                $content = $blog['content']; 
                                $words = explode(' ', $content); // Memisahkan konten berdasarkan spasi
                                $content = implode(' ', array_slice($words, 0, 15)); // Mengambil 8 kata pertama
                                echo $content;
                            ?>
                    </div>
                </a>
            <?php endforeach; ?>

            </div>
        </div>
    </section>


    <!-- Products Section -->
    <section id="products" class="py-20 bg-gray-100">
        <div class="container mx-auto px-4">
            <div class="text-center mb-16">
                <h2 class="text-3xl font-bold">Produk Unggulan Kami</h2>
                <p class="text-gray-600 mt-4 max-w-2xl mx-auto">Solusi mortar untuk segala kebutuhan konstruksi</p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-4 gap-8">

            <?php foreach ($products as $product): ?>
                <a href="product_details?slug=<?php echo $product['slug']; ?>" class="product-card animate-on-scroll block overflow-hidden shadow-lg">
                    <div class="relative overflow-hidden aspect-w-1 aspect-h-1">
                        <img src="assets/img/products/<?php echo $product['image']; ?>" 
                             alt="Mortar Perekat" class="w-full h-full object-contain">
                        <div class="overlay-icon absolute bottom-4 right-4 bg-basecrete-red rounded-full w-12 h-12 flex items-center justify-center">
                            <i class="fas fa-arrow-right text-white text-xl"></i>
                        </div>
                    </div>
                    <div class="bg-white p-5">
                        <h3 class="font-bold text-xl text-black mb-2"><?php echo $product['product_name']; ?></h3>
                        <p class="text-gray-600 text-sm mb-4"><?php echo $product['description']; ?></p>
                    </div>
                </a>
            <?php endforeach; ?>


            </div>
                        <div class="text-center mt-12">
                <a href="products" class="inline-block bg-basecrete-red text-white py-3 px-6 rounded-md hover:bg-red-800 transition font-medium">
                    Lihat Produk Lainnya <i class="fas fa-arrow-right ml-2"></i>
                </a>
            </div>

        </div>
    </section>

<!-- CTA Section -->
<section id="cta" class="py-20 bg-basecrete-red text-white text-center">
  <div class="container mx-auto px-4">
    <h2 class="text-3xl font-bold mb-4">Siap untuk Membangun dengan <?php echo htmlspecialchars($company['company_name']); ?>?</h2>
    <p class="mb-6 text-lg">Kami siap membantu Anda dalam setiap proyek konstruksi.</p>
    <a href="https://wa.me/<?php echo htmlspecialchars($company['whatsapp']); ?>" class="bg-white text-basecrete-red py-3 px-8 rounded-md font-bold hover:bg-gray-100 transition inline-block">Hubungi Kami</a>
  </div>
</section>

    <?php require 'include/footer.php'; ?>

    <script>
        // Navbar scroll effect
        const navbar = document.getElementById('navbar');
        window.addEventListener('scroll', () => {
            if (window.scrollY > 50) {
                navbar.classList.add('bg-white', 'text-gray-900', 'shadow-md');
                navbar.classList.remove('text-white');
            } else {
                navbar.classList.remove('bg-white', 'text-gray-900', 'shadow-md');
                navbar.classList.add('text-white');
            }
        });

        // Mobile menu toggle
        const mobileMenuButton = document.getElementById('mobile-menu-button');
        const mobileMenu = document.getElementById('mobile-menu');
        
        mobileMenuButton.addEventListener('click', () => {
            mobileMenu.classList.toggle('hidden');
        });

        // Hero slider functionality
        const slides = document.querySelectorAll('.hero-slide');
        let currentIndex = 0;
        
        function showNextSlide() {
            slides[currentIndex].classList.remove('active');
            currentIndex = (currentIndex + 1) % slides.length;
            slides[currentIndex].classList.add('active');
        }
        
        // Auto slide every 10 seconds
        setInterval(showNextSlide, 10000);
        
        // Back to top button
        const backToTopButton = document.getElementById('back-to-top');
        
        window.addEventListener('scroll', () => {
            if (window.scrollY > 300) {
                backToTopButton.classList.remove('hidden');
            } else {
                backToTopButton.classList.add('hidden');
            }
        });
        
        backToTopButton.addEventListener('click', () => {
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        });
        
        // Animation on scroll
        function handleScroll() {
            const elements = document.querySelectorAll('.animate-on-scroll');
            
            elements.forEach(el => {
                const elementTop = el.getBoundingClientRect().top;
                const elementVisible = 150;
                
                if (elementTop < window.innerHeight - elementVisible) {
                    el.classList.add('active');
                }
            });
        }
        
        window.addEventListener('scroll', handleScroll);
        // Initial check in case elements are already in view
        handleScroll();
        
        // Menu scroll effect
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function(e) {
                e.preventDefault();
                const targetId = this.getAttribute('href');
                if (targetId === '#') return;
                
                const targetElement = document.querySelector(targetId);
                if (targetElement) {
                    window.scrollTo({
                        top: targetElement.offsetTop - 80,
                        behavior: 'smooth'
                    });
                    
                    // Close mobile menu if open
                    if (!mobileMenu.classList.contains('hidden')) {
                        mobileMenu.classList.add('hidden');
                    }
                }
            });
        });
    </script>
</body>
</html>
