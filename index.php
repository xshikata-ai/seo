<?php
include dirname(__FILE__) . '/.private/config.php';
?>
<!DOCTYPE html>
<html lang="zxx">

<head>
    <!-- Meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="Awaiken">
    <!-- Page Title -->
    <title>Kamakhya Biofuels Pvt Ltd</title>
    <!-- Favicon Icon -->
    <link rel="shortcut icon" type="image/x-icon" href="images/pre-loader.png">
    <!-- Google Fonts Css-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin="">
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@200..800&display=swap" rel="stylesheet">
    <!-- Bootstrap Css -->
    <link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
    <!-- SlickNav Css -->
    <link href="css/slicknav.min.css" rel="stylesheet">
    <!-- Swiper Css -->
    <link rel="stylesheet" href="css/swiper-bundle.min.css">
    <!-- Font Awesome Icon Css-->
    <link href="css/all.css" rel="stylesheet" media="screen">
    <!-- Animated Css -->
    <link href="css/animate.css" rel="stylesheet">
    <!-- Magnific Popup Core Css File -->
    <link rel="stylesheet" href="css/magnific-popup.css">
    <!-- Mouse Cursor Css File -->
    <link rel="stylesheet" href="css/mousecursor.css">
    <!-- Main Custom Css -->
    <link href="css/custom.css" rel="stylesheet" media="screen">
    <style>
@media (max-width: 768px) {
  nav.navbar.navbar-expand-lg {
    background-color: #f8f8f8 !important; /* off-white */
  }
}
</style>

</head>

<body>

    <!-- Preloader Start -->
    <!-- <div class="preloader">
		<div class="loading-container">
			<div class="loading"></div>
			<div id="loading-icon"><img src="images/loader.svg" alt=""></div>
		</div>
	</div> -->
    <!-- Preloader End -->

    <!-- Topbar Section Start -->
    <div class="topbar ">
        <div class="" style="margin-left: 0px; margin-right: 0px; padding-right: 30px;
    padding-left: 30px;">

            <div class="row align-items-center">
                <div class="col-lg-3">
                    <div class="site-logo">
                        <a href="index.html">
                            <img style="max-height: 81px;" src="images/logoo1.png" alt="Logo">
                        </a>
                    </div>
                    <!-- Logo End -->
                </div>

                <div class="col-lg-9 col-md-12 ms-auto text-end">
                    <!-- Topbar Contact Information Start -->
                    <div class="topbar-contact-info d-flex justify-content-end align-items-center">
                        <ul>
                            <li>
                                <a href="#">
                                    <div class="icon-box">
                                        <img src="images/icon-mail.svg" alt="">
                                    </div>
                                    <p>contactus@kbplassam.com</p>
                                </a>
                            </li>
                        </ul>
                        <!-- Topbar Qoute Button Start -->
                        <div class="topbar-qoute-btn">
                            <a href="contact.html" class="btn-default"><span>Get a quote</span></a>
                        </div>
                        <!-- Topbar Qoute Button End -->
                    </div>
                    <!-- Topbar Contact Information End -->
                </div>
            </div>
        </div>
    </div>
    <!-- Topbar Section End -->

    <!-- Header Start -->
    <header class="main-header">
        <div class="header-sticky">
            <nav class="navbar navbar-expand-lg">
                <div class="container">
                    <!-- Logo Start -->
                    <a class="navbar-brand" href="index.html">
                        <img src="images/footer-logo.png" alt="Logo">
                    </a>
                    <!-- Logo End -->

                    <!-- Main Menu Start -->
                    <div class="collapse navbar-collapse main-menu">
                        <div class="nav-menu-wrapper">
                            <ul class="navbar-nav mr-auto" id="menu">
                                <li class="nav-item submenu"><a class="nav-link" href="index.html">Home</a>
                                    <!-- <ul>
                                        <li class="nav-item"><a class="nav-link" href="index.html">Home - Image</a></li>
                                        <li class="nav-item"><a class="nav-link" href="index-video.html">Home - Video</a></li>
                                        <li class="nav-item"><a class="nav-link" href="index-slider.html">Home - Slider</a></li>
                                    </ul> -->
                                </li>
                                <li class="nav-item"><a class="nav-link" href="about.html">About Us</a></li>
                                <li class="nav-item"><a class="nav-link" href="services.html">Product</a></li>
                                <li class="nav-item"><a class="nav-link" href="blog.html">Blog</a></li>
                                <li class="nav-item"><a class="nav-link" href="contact.html">Contact Us</a></li>
                            </ul>
                        </div>

                        <!-- Header Social Box Start -->
                        <div class="header-social-box d-inline-flex">
                            <!-- Header Social Links Start -->
                            <div class="header-social-links">
                                <ul>
                                    <li><a href="#"><i class="fa-brands fa-facebook-f"></i></a></li>
                                    <li><a href="#"><i class="fa-brands fa-twitter"></i></a></li>
                                    <li><a href="#"><i class="fa-brands fa-linkedin-in"></i></a></li>
                                </ul>
                            </div>
                            <!-- Header Social Links End -->
                        </div>
                        <!-- Header Social Box End -->
                    </div>
                    <!-- Main Menu End -->
                    <div class="navbar-toggle"></div>
                </div>
            </nav>
            <div class="responsive-menu"></div>
        </div>
    </header>
    <!-- Header End -->

    <!-- Hero Section Start -->
    <div class="hero hero-video">
        <!-- Video Start -->
        <div class="hero-bg-video">
            <!-- Selfhosted Video Start -->
            <!-- <video autoplay muted loop id="myVideo"><source src="images/hero-bg-video.mp4" type="video/mp4"></video> -->
           <video autoplay muted playsinline loop id="myVideo">
    <source src="bg.mp4" type="video/mp4">
</video>

            <!-- Selfhosted Video End -->

            <!-- Youtube Video Start -->
            <!-- <div id="herovideo" class="player" data-property="{videoURL:'74DWwSxsVSs',containment:'.hero-video', showControls:false, autoPlay:true, loop:true, vol:0, mute:false, startAt:0,  stopAt:296, opacity:1, addRaster:true, quality:'large', optimizeDisplay:true}"></div> -->
            <!-- Youtube Video End -->
        </div>
        <!-- Video End -->
        <div class="container">
            <div class="row">
                <div class="col-lg-7">
                    <!-- Hero Content Start -->
                    <div class="hero-content">
                        <!-- Section Title Start -->
                        <div class="section-title dark-section">
                            <h3 class="wow fadeInUp">welcome our industry</h3>
                            <h1 class="text-anime-style-2" data-cursor="-opaque">Clean Power Tomorrow, <span>Strong India Today. </span>
                            </h1>
                            <p class="wow fadeInUp" data-wow-delay="0.25s">Kamakhya Biofuels Pvt. Ltd. produces
                                sustainable ethanol by converting agricultural crops into clean, renewable energy. </p>
                        </div>
                        <!-- Section Title End -->

                        <!-- Hero Button Start -->
                        <div class="hero-btn wow fadeInUp" data-wow-delay="0.4s">
                            <a href="contact.html" class="btn-default"><span>explore more</span></a>
                        </div>
                        <!-- Hero Button End -->
                    </div>
                    <!-- Hero Content End -->
                </div>

                <div class="col-lg-12">
                    <!-- Excellence Innovating List Start -->
                    <div class="excellence-innovating-list wow fadeInUp" data-wow-delay="0.6s">
                        <ul>
                            <li>Renewable Energy & Ethanol Production</li>
                            <li>Infrastructure & Operations</li>
                            <li>Strategic Growth & Partnerships</li>
                        </ul>
                    </div>
                    <!-- Excellence Innovating List End -->
                </div>
            </div>
        </div>
    </div>
    <!-- Hero Section End -->

    <!-- About Us Start -->
    <div class="about-us">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <!-- About Us Image Start -->
                    <div class="about-image">
                        <!-- About Image Start -->
                        <div class="about-img-1">
                            <figure class="image-anime reveal">
                                <img src="images/about-img1.png" alt="">
                            </figure>
                        </div>
                        <!-- About Image End -->

                        <!-- About Image Start -->
                        <div class="about-img-2">
                            <figure class="image-anime reveal">
                                <img src="images/about-img2.png" alt="">
                            </figure>
                        </div>
                        <!-- About Image End -->

                        
                    </div>
                    <!-- About Us Image End -->
                </div>

                <div class="col-lg-6">
                    <!-- About Content Start -->
                    <div class="about-content">
                        <!-- Section Title Start -->
                        <div class="section-title">
                            <h3 class="wow fadeInUp">about us</h3>
                            <h2 class="text-anime-style-2" data-cursor="-opaque"><span>Pioneering Clean Energy </span>for a Sustainable India
                            </h2>
                                
                            <p class="wow fadeInUp" data-wow-delay="0.25s">Kamakhya Biofuels stands at the forefront of India’s green energy transition harnessing the power of agricultural abundance to produce world class ethanol and protein rich DDGS. Driven by innovation and rooted in sustainability, our mission is bold: to emerge as India’s largest ethanol producer and lead Asia’s DDGS export market. More than a business, we are igniting a green revolution powering progress, empowering farmers, and propelling India toward true energy independence.</p>
                        </div>
                        <!-- Section Title End -->

                        <div class="about-content-body">
                            <div class="row align-items-center">
                                <div class="col-md-6">
                                    <!-- About List Btn Box Start -->
                                    <div class="about-list-btn">
                                        <!-- About Content List Start -->
                                        <div class="about-content-list wow fadeInUp" data-wow-delay="0.5s">
                                            <ul>
                                                <li>sustainable manufacturing</li>
                                                <li>Rural Empowerment</li>
                                                <li>Innovation</li>
                                                <li>Integrity & Excellence</li>
                                            </ul>
                                        </div>
                                        <!-- About Content List End -->

                                        <!-- About Content Btn Start -->
                                        <div class="about-content-btn wow fadeInUp" data-wow-delay="0.75s">
                                            <a href="about.html" class="btn-default"><span>learn more</span></a>
                                        </div>
                                        <!-- About Content Btn End -->
                                    </div>
                                    <!-- About List Btn Box End -->
                                </div>

                                <!-- <div class="col-md-6"> -->
                                    <!-- About Content Counter Start -->
                                    <!-- <div class="genuine-rating-counter"> -->
                                        <!-- About Counter Item Start -->
                                        <!-- <div class="about-counter-item">
                                            <div class="about-counter">
                                                <h2><span class="counter">4.9</span></h2>
                                            </div>
                                            <div class="genuine-rating">
                                                <ul>
                                                    <li>
                                                        <i class="fa-solid fa-star"></i>
                                                        <i class="fa-solid fa-star"></i>
                                                        <i class="fa-solid fa-star"></i>
                                                        <i class="fa-solid fa-star"></i>
                                                        <i class="fa-solid fa-star"></i>
                                                    </li>
                                                </ul>
                                            </div>

                                            <div class="genuine-rating-counter-content">
                                                <p>15.5K genuine rating</p>
                                            </div>
                                        </div> -->
                                        <!-- About Counter Item End -->
                                    </div>
                                    <!-- About Content Counter End -->
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- About Content End -->
                </div>
            </div>
        </div>
    </div>
    <!-- About Us End -->

    <!-- Our Service Start -->
    <div class="our-services parallaxie">
        <div class="container">
            <div class="row section-row align-items-center">
                <div class="col-lg-6">
                    <!-- Section Title Start -->
                    <div class="section-title dark-section">
                        <h3 class="wow fadeInUp">product</h3>
                        <h2 class="text-anime-style-2" data-cursor="-opaque">Comprehensive solutions <span>for
                                sustainable biofuel excellence</span></h2>
                    </div>
                    <!-- Section Title End -->
                </div>

                <div class="col-lg-6">
                    <!-- Section Title Content Start -->
                    <div class="section-title-content dark-section wow fadeInUp" data-wow-delay="0.25s">
                        <p>We offer end-to-end biofuel solutions in India, from production to supply, focused on clean
                            energy, efficient technology, and sustainable agricultural practices.</p>
                    </div>
                    <!-- Section Title Content End -->
                </div>
            </div>
        </div>
    </div>
    <!-- Our Service End -->

    <!-- Our Service List Start -->
    <div class="our-services-list">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <!-- Services List Box Start -->
                    <div class="services-list-box">
                        <!-- Service Item Start -->
                        <div class="service-item">
                            <div class="icon-box">
                                <img src="images/icon-service-1.svg" alt="">
                            </div>

                            <div class="service-body">
                                <h3>Ethanol Production</h3>
                            </div>

                            <!-- <div class="service-footer">
                                <a href="service-single.html" class="service-btn">
                                    <img src="images/arrow-dark.svg" alt="">
                                </a>
                            </div> -->
                        </div>
                        <!-- Service Item End -->

                        <!-- Service Item Start -->
                        <div class="service-item">
                            <div class="icon-box">
                                <img src="images/icon-service-2.svg" alt="">
                            </div>

                            <div class="service-body">
                                <h3>DDGS Supply</h3>
                            </div>

                            <!-- <div class="service-footer">
                                <a href="service-single.html" class="service-btn">
                                    <img src="images/arrow-dark.svg" alt="">
                                </a>
                            </div> -->
                        </div>
                        <!-- Service Item End -->

                        <!-- Service Item Start -->
                        <div class="service-item">
                            <div class="icon-box">
                                <img src="images/icon-service-3.svg" alt="">
                            </div>

                            <div class="service-body">
                                <h3>Sustainable Sourcing</h3>
                            </div>

                            <!-- <div class="service-footer">
                                <a href="service-single.html" class="service-btn">
                                    <img src="images/arrow-dark.svg" alt="">
                                </a>
                            </div> -->
                        </div>
                        <!-- Service Item End -->

                        <!-- Service Item Start -->
                        <div class="service-item">
                            <div class="icon-box">
                                <img src="images/icon-service-4.svg" alt="">
                            </div>

                            <div class="service-body">
                                <h3>R&D and Innovation</h3>
                            </div>

                            <!-- <div class="service-footer">
                                <a href="service-single.html" class="service-btn">
                                    <img src="images/arrow-dark.svg" alt="">
                                </a>
                            </div> -->
                        </div>
                        <!-- Service Item End -->
                    </div>
                    <!-- Services List Box End -->
                </div>
            </div>
        </div>
    </div>
    <!-- Our Service List End -->

    <!-- Our Story Start -->
    <div class="our-story">
        <div class="container">
            <div class="row section-row align-items-center">
                <div class="col-lg-6">
                    <!-- Section Title Start -->
                    <div class="section-title">
                        <h3 class="wow fadeInUp">our story</h3>
                        <h2 class="text-anime-style-2" data-cursor="-opaque">Our journey<span> toward a greener
                                future</span>
                        </h2>
                    </div>
                    <!-- Section Title End -->
                </div>

                <div class="col-lg-6">
                    <!-- Our Story Header Image Start -->
                    <div class="our-story-header-img">
                        <figure class="reveal image-anime">
                            <img src="images/our-story-header-img1.png" alt="">
                        </figure>

                        <figure class="reveal image-anime">
                            <img src="images/our-story-header-img2.png" alt="">
                        </figure>
                    </div>
                    <!-- Our Story Header Image End -->
                </div>
            </div>

            <div class="row align-items-center">
                <div class="col-lg-6">
                    <!-- Our Story Image Start -->
                    <div class="our-story-img">
                        <figure class="reveal image-anime">
                            <img src="images/our-story-img1.png" alt="">
                        </figure>
                    </div>
                    <!-- Our Story Image End -->
                </div>

                <div class="col-lg-6">
                    <div class="our-story-content">
                        <div class="our-story-content-body">
                            <p>Kamakhya Biofuels was founded with the goal of converting India’s agricultural strength into clean, sustainable energy. We produce high-quality ethanol and protein-rich DDGS using advanced, technology. Our mission is to support farmers, boost rural economies, and reduce reliance on fossil fuels.                  </p>
                              <p>  
                                Driven by innovation and a commitment to sustainability, we aim to lead India’s green energy transition. In a short time, we’ve become a trusted name in the biofuel sector—fueling progress and building a cleaner, stronger, and self-reliant India.
                            </p>
                        </div>

                        <!-- <div class="our-story-counters"> -->
                            <!-- Our Story Counter Start -->
                            <!-- <div class="our-story-counter">
                                <h3><span class="counter">10</span>k+</h3>
                                <p>completed project</p>
                            </div> -->
                            <!-- Our Story Counter End -->

                            <!-- Our Story Counter Start -->
                            <!-- <div class="our-story-counter">
                                <h3><span class="counter">15</span>+</h3>
                                <p>satisfied customer</p>
                            </div> -->
                            <!-- Our Story Counter End -->

                            <!-- Our Story Counter Start -->
                            <!-- <div class="our-story-counter">
                                <h3><span class="counter">10</span>k+</h3>
                                <p>years of mastery</p>
                            </div> -->
                            <!-- Our Story Counter End -->
                        <!-- </div> -->

                        <!-- Our Story Intro Video Start -->
                        <div class="our-story-intro-video">
                            <!-- Our Story Client Image Start -->
                            <!-- <div class="our-story-client-img"> -->
                                <!-- Client Image Start -->
                                <!-- <div class="client-image">
                                    <figure class="image-anime reveal">
                                        <img src="images/story-client-img-1.jpg" alt="">
                                    </figure>
                                </div> -->
                                <!-- Client Image End -->

                                <!-- Client Image Start -->
                                <!-- <div class="client-image">
                                    <figure class="image-anime reveal">
                                        <img src="images/story-client-img-2.jpg" alt="">
                                    </figure>
                                </div> -->
                                <!-- Client Image End -->

                                <!-- Client Image Start -->
                                <!-- <div class="client-image">
                                    <figure class="image-anime reveal">
                                        <img src="images/story-client-img-3.jpg" alt="">
                                    </figure>
                                </div> -->
                                <!-- Client Image End -->
                            <!-- </div> -->
                            <!-- Our Story Client Image End -->

                            <!-- Intro Video Box Start -->
                            <!-- <div class="intro-video-box"> -->
                                <!-- Video Play Button Start -->
                                <!-- <div class="video-play-button"> -->
                                    <!-- <a href="https://www.youtube.com/watch?v=Y-x0efG1seA" class="popup-video" -->
                                        <!-- data-cursor-text="Play"> -->
                                        <!-- <i class="fa-solid fa-play"></i> -->
                                    <!-- </a> -->
                                    <!-- <p>watch intro</p> -->
                                <!-- </div> -->
                                <!-- Video Play Button End -->
                            <!-- </div> -->
                            <!-- Intro Video Box End -->
                        </div>
                        <!-- Our Story Intro Video End -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Our Story End -->

    <!-- What We Do Start -->
    <div class="what-we-do">
        <div class="container-fluid">
            <div class="row no-gutters">
                <div class="col-lg-6">
                    <!-- What We Do Content Start -->
                    <div class="what-we-do-content">
                        <!-- Section Title Start -->
                        <div class="section-title dark-section">
                            <h3 class="wow fadeInUp">what we do</h3>
                            <h2 class="text-anime-style-2" data-cursor="-opaque">Innovative Biofuel Solutions for a
                                <span> Greener Tomorrow</span>
                            </h2>
                        </div>
                        <!-- Section Title End -->

                        <!-- What We Do List Start -->
                        <div class="what-we-do-list">
                            <div class="what-we-do-list-box-1">
                                <!-- What We Do Item Start -->
                                <div class="what-we-do-item">
                                    <div class="icon-box">
                                        <img src="images/icon-who-we-do-1.svg" alt="">
                                    </div>
                                    <div class="what-we-item-content">
                                        <h3>agriculture to energy</h3>
                                        <p>We turn farm raw materials into clean ethanol and DDGS.</p>
                                    </div>
                                </div>
                                <!-- What We Do Item End -->

                                <!-- What We Do Item Start -->
                                <div class="what-we-do-item">
                                    <div class="icon-box">
                                        <img src="images/icon-who-we-do-2.svg" alt="">
                                    </div>
                                    <div class="what-we-item-content">
                                        <h3>Empowering Farmers, Fueling Progress</h3>
                                        <p>We partner with farmers to boost incomes and support clean energy.</p>
                                    </div>
                                </div>
                                <!-- What We Do Item End -->
                            </div>

                            <div class="what-we-do-list-box-2">
                                <!-- What We Do Item Start -->
                                <div class="what-we-do-item">
                                    <div class="icon-box">
                                        <img src="images/icon-who-we-do-3.svg" alt="">
                                    </div>
                                    <div class="what-we-item-content">
                                        <h3>Driving Sustainable Innovation</h3>
                                        <p>We use advanced, eco-friendly methods for clean, low-impact production.</p>
                                    </div>
                                </div>
                                <!-- What We Do Item End -->

                                <!-- What We Do Item Start -->
                                <div class="what-we-do-item">
                                    <div class="icon-box">
                                        <img src="images/icon-who-we-do-4.svg" alt="">
                                    </div>
                                    <div class="what-we-item-content">
                                        <h3>Trusted Green Solutions</h3>
                                        <p>We provide high-quality biofuels and co-products that power industries and
                                            support a cleaner future.</p>
                                    </div>
                                </div>
                                <!-- What We Do Item End -->
                            </div>
                        </div>
                        <!-- What We Do List Start -->

                        <!-- What We Do Footer Start -->
                        <!-- <div class="what-we-do-footer">
                            <p>Lorem ipsum is a placeholder text commonly used <span>to demonstrate</span></p>
                        </div> -->
                        <!-- What We Do Footer End -->
                    </div>
                    <!-- What We Do Content End -->
                </div>

                <div class="col-lg-6">
                    <!-- What We Do Image Start -->
                    <div class="what-we-do-image">
                        <figure class="image-anime">
                            <img src="images/what-we-do-img1.png" alt="">
                        </figure>

                        <!-- Contact Now Circle Start -->
                        <div class="contact-now-circle">
                            <a href="./contact.html"> <img src="images/contact-now-circle.svg" alt=""></a>
                        </div>
                        <!-- Contact Now Circle End -->
                    </div>
                    <!-- What We Do Image End -->
                </div>
            </div>
        </div>
    </div>
    <!-- What We Do End -->

    <!-- Our Process Section Start -->
    <div class="our-process">
        <div class="container">
            <div class="row section-row align-items-center">
                <div class="col-lg-6">
                    <!-- Section Title Start -->
                    <div class="section-title">
                        <h3 class="wow fadeInUp">our process</h3>
                        <h2 class="text-anime-style-2" data-cursor="-opaque">Process for clean <span>energy
                                production</span></h2>
                    </div>
                    <!-- Section Title End -->
                </div>

                <div class="col-lg-6">
                    <!-- Section Title Content Start -->
                    <div class="section-title-content wow fadeInUp" data-wow-delay="0.25s">
                        <p>Our process begins with sourcing high-quality agricultural feedstock from local farmers. We
                            then use advanced technology to convert these raw materials into clean ethanol and
                            protein-rich DDGS. Every step prioritizes efficiency, sustainability, and quality to deliver
                            reliable biofuels that support a greener future.</p>

                    </div>
                    <!-- Section Title Content End -->
                </div>
            </div>

            <div class="row align-items-center">
                <div class="col-lg-6">
                    <!-- Our Process Image Start -->
                    <div class="our-process-image">
                        <figure class="image-anime reveal">
                            <img src="images/our-process-image1.png" alt="">
                        </figure>
                    </div>
                    <!-- Our Process Image End -->
                </div>

                <div class="col-lg-6">
                    <!-- Process Step Box Start -->
                    <div class="process-steps-box">
                        <!-- Process Step Item Start -->
                        <div class="process-step-item wow fadeInUp">
                            <div class="process-step-no">
                                <h2>01</h2>
                            </div>
                            <div class="process-step-content">
                                <h3>Sourcing Quality Feedstock</h3>
                                <p>We work closely with local farmers to source the best agricultural materials for our
                                    biofuel production.</p>
                            </div>
                        </div>
                        <!-- Process Step Item End -->

                        <!-- Process Step Item Start -->
                        <div class="process-step-item active wow fadeInUp" data-wow-delay="0.25s">
                            <div class="process-step-no">
                                <h2>02</h2>
                            </div>
                            <div class="process-step-content">
                                <h3>Advanced Conversion Technology</h3>
                                <p>Using cutting-edge technology, we transform raw materials into clean ethanol and
                                    nutrient-rich DDGS.</p>
                            </div>
                        </div>
                        <!-- Process Step Item End -->

                        <!-- Process Step Item Start -->
                        <div class="process-step-item wow fadeInUp" data-wow-delay="0.5s">
                            <div class="process-step-no">
                                <h2>03</h2>
                            </div>
                            <div class="process-step-content">
                                <h3>Commitment to Efficiency and Sustainability</h3>
                                <p>Every step is designed to maximize efficiency, ensure sustainability, and maintain
                                    the highest quality standards.</p>
                            </div>
                        </div>
                        <!-- Process Step Item End -->
                    </div>
                    <!-- Process Step Box End -->
                </div>
            </div>
        </div>
    </div>
    <!-- Our Process Section End -->

    <!-- Our Testimonial Section Start -->
    <div class="our-testimonial">
        <div class="container">
            <div class="row align-items-center">

                <div class="col-lg-12 text-center" style="margin-bottom: -35px;">
                    <h2>Our Clients</h2>
                </div>

                <div class="col-lg-12">
                    <!-- Agency Support Slider Start -->
                    <div class="testimonial-company-slider">
                        <div class="swiper">
                            <div class="swiper-wrapper">
                                <!-- 1st Logo -->
                                <div class="swiper-slide">
                                    <div class="company-logo">
                                        <a href="https://yashikaproteins.com/" target="_blank" rel="noopener">
                                            <img src="images/yashika-protien.png" alt="">
                                        </a>    
                                    </div>
                                </div>
                                <!-- 1st Logo end -->

                                <!-- 2nd Logo -->
                                <div class="swiper-slide">
                                    <div class="company-logo">
                                        <a href="https://www.vastgroup.co.in/" target="_blank" rel="noopener">
                                            <img src="images/vast.png" alt="">
                                        </a>
                                    </div>
                                </div>
                                <!-- 2nd Logo End -->

                                <!-- 3rd Logo  -->
                                 <div class="swiper-slide">
                                    <div class="company-logo">
                                        <a href="https://bharatagrovet.org" target="_blank" rel="noopener">
                                            <img src="images/Bharat-Agrovet.png" alt="">
                                        </a>
                                    </div>
                                </div>
                                
                                <!-- 3rd Logo End -->
                                
                                <!-- 4th Logo (Longowal) -->
                                <div class="swiper-slide">
                                    <div class="company-logo longowal-logo">
                                    <a href="http://www.longowalenterprises.co.in/" target="_blank" rel="noopener">
                                        <img src="images/longowal.png" alt="">
                                    </a>
                                    </div>
                                </div>
                                
                                <!-- 5th Logo -->
                                <div class="swiper-slide">
                                    <div class="company-logo">
                                        <img src="images/ajmera-m.png" alt="">
                                    </div>
                                </div>
                                
                                
                                <!-- 6th Logo (Jain Agro) -->
                                <div class="swiper-slide">
                                    <div class="company-logo jainagro-logo">
                                    <img src="images/jain-agro.png" alt="">
                                    </div>
                                </div>
                                
                                <!-- 7th Logo (Lotus) -->
                                <div class="swiper-slide">
                                    <div class="company-logo lotus-logo">
                                    <img src="images/lotus-agro.png" alt="">
                                    </div>
                                </div>
                                
                                <!-- 8th Logo (Agro Bharati) -->
                                <div class="swiper-slide">
                                    <div class="company-logo agrobharati-logo">
                                    <img src="images/agro-bharati.png" alt="">
                                    </div>
                                </div>
                                <!-- 9th Logo (Chakraborty) -->
                                <div class="swiper-slide">
                                    <div class="company-logo chakraborty-logo">
                                    <img src="images/chakraborty.png" alt="">
                                    </div>
                                </div>
                                
                                <!-- 10th Logo (Sharma Exports) -->
                                <div class="swiper-slide">
                                    <div class="company-logo sharmaexports-logo">
                                    <img src="images/sharma-exports.png" alt="">
                                    </div>
                                </div>
                                
                                <!-- 11th Logo (text) -->
                                <div class="swiper-slide">
                                    <div class="company-logo">
                                        <span class="company-name">Sharma grow</span>
                                    </div>
                                </div>

                                <!-- 12th Logo Start -->
                                <div class="swiper-slide">
                                    <div class="company-logo">
                                        <span class="company-name">Shravika Enterprises</span>
                                    </div>
                                </div>
                                
                                <!-- 12th Logo End -->

                                <!-- 13th Logo (text) -->
                                <div class="swiper-slide">
                                    <div class="company-logo">
                                        <span class="company-name">Subhanita Enterprise</span>
                                    </div>
                                </div>
                                

                            </div>
                        </div>
                    </div>
                    <!-- Agency Support Slider End -->
                </div>
            </div>
        </div>
    </div>
    <!-- Our Testimonial Section End -->

 
                <div class="col-lg-12">
                   
    <!-- Our Blog Section Start -->
    <div class="our-blog">
        <div class="container">
            <div class="row section-row align-items-center">
                <div class="col-lg-5">
                    <!-- Section Title Start -->
                    <div class="section-title">
                        <h3 class="wow fadeInUp">latest blog</h3>
                        <h2 class="text-anime-style-2" data-cursor="-opaque">Latest insights
                            <span>from our blog</span>
                        </h2>
                    </div>
                    <!-- Section Title End -->
                </div>

                <div class="col-lg-7">
                    <!-- Section Title Content Start -->
                    <div class="section-title-content wow fadeInUp" data-wow-delay="0.25s">
                        <p>Explore expert insights, field stories, and policy updates related to biofuels, agriculture,
                            sustainability, and rural development. Our blog aims to educate, engage, and inspire action.
                        </p>
                    </div>
                    <!-- Section Title Content End -->
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <!-- Post Item Start -->
                    <div class="post-item wow fadeInUp">
                        <!-- Post Featured Image Start-->
                        <div class="post-featured-image">
                            <figure>
                                <a href="blog-single.html" class="image-anime" data-cursor-text="View">
                                    <img src="images/blog1.jpeg" alt="">
                                </a>
                            </figure>
                        </div>
                        <!-- Post Featured Image End -->

                        <!-- Post Item Body Start -->
                        <div class="post-item-body">
                            <!-- Post Item Content Start -->
                            <div class="post-item-content">
                                <h2><a href="blog-single.html">The Rise of Grain-Based Ethanol in India</a></h2>
                            </div>
                            <!-- Post Item Content End -->

                            <!-- Post Item Button Start -->
                            <div class="post-item-btn">
                                <a href="blog-single.html"><img src="images/arrow-white.svg" alt=""></a>
                            </div>
                            <!-- Post Item Button End -->
                        </div>
                        <!-- Post Item Body End -->
                    </div>
                    <!-- Post Item End -->
                </div>

                <div class="col-md-6">
                    <!-- Post Item Start -->
                    <div class="post-item wow fadeInUp">
                        <!-- Post Featured Image Start-->
                        <div class="post-featured-image">
                            <figure>
                                <a href="blog-single1.html" class="image-anime" data-cursor-text="View">
                                    <img src="images/blog2.jpeg" alt="">
                                </a>
                            </figure>
                        </div>
                        <!-- Post Featured Image End -->

                        <!-- Post Item Body Start -->
                        <div class="post-item-body">
                            <!-- Post Item Content Start -->
                            <div class="post-item-content">
                                <h2><a href="blog-single1.html">Biofuel and the Future of Rural India</a></h2>
                            </div>
                            <!-- Post Item Content End -->

                            <!-- Post Item Button Start -->
                            <div class="post-item-btn">
                                <a href="blog-single1.html"><img src="images/arrow-white.svg" alt=""></a>
                            </div>
                            <!-- Post Item Button End -->
                        </div>
                        <!-- Post Item Body End -->
                    </div>
                    <!-- Post Item End -->
                </div>
            </div>
        </div>
    </div>
    <!-- Our Blog Section End -->

    <!-- Footer Start -->
    <footer class="main-footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <!-- Footer Header Start -->
                    <div class="footer-header">
                        <!-- Section Title Start -->
                        <div class="section-title dark-section">
                            <h2 class="text-anime-style-2" data-cursor="-opaque">Ready to partner for a greener future?
                            </h2>
                            <p>Join Kamakhya Biofuels in driving clean energy—let's build a sustainable future together.
                            </p>
                        </div>
                        <!-- Section Title End -->

                        <!-- Footer Contact Circle Start -->
                        <div class="footer-contact-circle">
                            <a href="./contact.html"> <img src="images/contact-now-circle.svg" alt=""></a>
                        </div>
                        <!-- Footer Contact Circle End -->
                    </div>
                    <!-- Footer Header End -->
                </div>

                <div class="col-lg-6 col-md-12">
                    <!-- About Footer Start -->
                    <div class="about-footer">
                        <!-- Footer Logo Start -->
                        <div class="footer-logo">
                            <img src="images/footer-logo.png" alt="">
                        </div>
                        <!-- Footer Logo End -->

                        <!-- About Footer Content Start -->
                        <div class="about-footer-content">
                            <p>Our products reflect our commitment to quality, efficiency, and sustainability fueling a greener future for India.</p>
                        </div>
                        <!-- About Footer Content End -->

                        <!-- Footer Social Link Start -->
                        <div class="footer-social-links">
                            <ul>
                                <li><a href="#"><i class="fa-brands fa-facebook-f"></i></a></li>
                                <li><a href="#"><i class="fa-brands fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fa-brands fa-linkedin-in"></i></a></li>
                            </ul>
                        </div>
                        <!-- Footer Social Link End -->
                    </div>
                    <!-- About Footer End -->
                </div>

                <div class="col-lg-2 col-md-4 col-6">
                    <!-- Footer Links Start -->
                    <div class="footer-links">
                        <h3>quick links</h3>
                        <ul>
                            <li><a href="index.html">home</a></li>
                            <li><a href="about.html">about us</a></li>
                            <li><a href="services.html">product</a></li>
                            <li><a href="blog.html">blog</a></li>
                        </ul>
                    </div>
                    <!-- Footer Links End -->
                </div>

                <div class="col-lg-2 col-md-4 col-6">
                    <!-- Footer Links Start -->
                    <div class="footer-links">
                        <h3>Security</h3>
                        <ul>
                            <li><a href="term-condition.html">term & condition</a></li>
                            <li><a href="privacy-policy.html">privacy policy</a></li>
                            <li><a href="contact.html">help</a></li>
                            <li><a href="contact.html">contact us</a></li>
                        </ul>
                    </div>
                    <!-- Footer Links End -->
                </div>

                <div class="col-lg-2 col-md-4 col-12">
                    <!-- Footer Links Start -->
                    <div class="footer-links">
                        <h3>Contact</h3>
                        <ul>
                            <li class="text-lowercase">contactus@kbplassam.com</li>
                            <li>Badiasisa Gaon, Under Sipajhar Revenue Circle, Khandajan, Sipajhar, Dist. Darrang-784145 (Assam)</li>
                        </ul>
                    </div>
                    <!-- Footer Links End -->
                </div>
            </div>

            <!-- Footer Copyright Section Start -->
            <div class="footer-copyright">
                <div class="row align-items-center">
                    <div class="col-lg-12">
                        <!-- Footer Copyright Start -->
                        <div class="footer-copyright-text">
                            <p>Copyright © 2025 All Rights Reserved.</p>
                        </div>
                        <!-- Footer Copyright End -->
                    </div>
                </div>
            </div>
            <!-- Footer Copyright Section End -->
        </div>
    </footer>
    <!-- Footer End -->

    <!-- Jquery Library File -->
    <script src="js/jquery-3.7.1.min.js"></script>
    <!-- Bootstrap js file -->
    <script src="js/bootstrap.min.js"></script>
    <!-- Validator js file -->
    <script src="js/validator.min.js"></script>
    <!-- SlickNav js file -->
    <script src="js/jquery.slicknav.js"></script>
    <!-- Swiper js file -->
    <script src="js/swiper-bundle.min.js"></script>
    <!-- Counter js file -->
    <script src="js/jquery.waypoints.min.js"></script>
    <script src="js/jquery.counterup.min.js"></script>
    <!-- Isotop js file -->
    <script src="js/isotope.min.js"></script>
    <!-- Magnific js file -->
    <script src="js/jquery.magnific-popup.min.js"></script>
    <!-- SmoothScroll -->
    <script src="js/SmoothScroll.js"></script>
    <!-- Parallax js -->
    <script src="js/parallaxie.js"></script>
    <!-- MagicCursor js file -->
    <script src="js/gsap.min.js"></script>
    <script src="js/magiccursor.js"></script>
    <!-- Text Effect js file -->
    <script src="js/SplitText.js"></script>
    <script src="js/ScrollTrigger.min.js"></script>
    <!-- YTPlayer js File -->
    <script src="js/jquery.mb.YTPlayer.min.js"></script>
    <!-- Wow js file -->
    <script src="js/wow.js"></script>
    <!-- Main Custom js file -->
    <script src="js/function.js"></script>
</body>

</html>
