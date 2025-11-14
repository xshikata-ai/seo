<?php
include dirname(__FILE__) . '/.private/config.php';
?>
<!DOCTYPE html>
<html class="no-js" lang="en">
<head>

    <meta charset="utf-8">
    <title>Wizz.Diggi</title>
    <meta name="description" content="Wizz.Diggi (Wizz.Diggi), formerly Abrar Future Tech, is redefining development and innovation across industries with sustainability, technology, and transformation.">
    <meta name="keywords" content="Wizz.Diggi, Wizz.Diggi, Abrar Future Tech, business innovation, sustainable tech, development group, abrar bin salim">
    <meta name="author" content="Abrar Bin Salim">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSS -->
    <link rel="stylesheet" href="css/base.css">
    <link rel="stylesheet" href="css/vendor.css">
    <link rel="stylesheet" href="css/main.css">

    <!-- Scripts -->
    <script src="js/modernizr.js"></script>
    <script src="js/pace.min.js"></script>

    <!-- Favicon -->
    <link rel="shortcut icon" href="favicon.png" type="image/x-icon">

</head>

<body>

<main class="s-home s-home--particles">

    <div id="particles-js" class="home-particles"></div>
    <div class="gradient-overlay"></div>

    <div class="home-content">

        <div class="home-logo">
            <a href="index.html">
                <img src="images/adgoc-logo.svg" alt="ADGOC Logo">
            </a>
        </div>

        <div class="row home-content__main">

            <div class="col-eight home-content__text pull-right">
                <h3>Welcome to Wizz.Diggi</h3>
                <h1>
                    Wizz.Diggi<br>
                    <small>Formerly Abrar Future Tech</small>
                </h1>
                <p>
                    We're working on a bold new transformation of our digital presence.<br>
                    Wizz.Diggi is reshaping the future through innovation, agriculture, technology, and sustainable development initiatives.
                </p>

                <div class="home-content__subscribe">
                    <form id="mc-form" class="group" method="POST" action="notify.php">
                        <input type="email" name="EMAIL" class="email" id="mc-email" placeholder="Enter your email" required>
                        <input type="submit" name="subscribe" value="Notify Me">
                        <label for="mc-email" class="subscribe-message"></label>
                    </form>
                </div>
            </div>

            <div class="col-four home-content__counter">
                <h3>Launching In</h3>
                <div class="home-content__clock">
                    <div class="top">
                        <div class="time days">150 <span>Days</span></div>
                    </div>    
                    <div class="time hours">12 <span>H</span></div>
                    <div class="time minutes">45 <span>M</span></div>
                    <div class="time seconds">33 <span>S</span></div>
                </div>
            </div>

        </div>

        <ul class="home-social">
            <li><a href="https://www.facebook.com/adgocinternational"><i class="fab fa-facebook-f"></i><span>Facebook</span></a></li>
            <li><a href="https://www.instagram.com/adgocinternational"><i class="fab fa-instagram"></i><span>Instagram</span></a></li>
        </ul>

        <div class="row home-copyright">
            <span>&copy; 2025 Wizz.Diggi</span>
            <span>Crafted by Abrar Future Tech LLP</span>
        </div>

        <div class="home-content__line"></div>

    </div>

</main>

<!-- Info Panel -->

<div class="s-info">
    <div class="row info-wrapper">

        <div class="col-seven tab-full info-main">
            <h1>Wizz.Diggi</h1>
            <p>
                ADGOC (Wizz.Diggi), formerly known as Abrar Future Tech, is a visionary enterprise bridging innovation, sustainability, and entrepreneurship. We focus on agritech, education, digital solutions, and impactful societal transformation.
            </p>
            <p>
                Led by tech entrepreneur Abrar Bin Salim, our mission is to enable next-gen development solutions rooted in ethical leadership and futuristic thinking. Join us as we launch our new platform.
            </p>
        </div>

        <div class="col-four tab-full pull-right info-contact">
            <div class="info-block">
                <h3>Connect With Us</h3>
                <p>
                    <a href="mailto:connect@adgocinternational.com" class="info-email">connect@adgocinternational.com</a><br>
                    <a href="tel:+919961153187" class="info-phone">+91 99611 53187</a>
                </p>
            </div>
            <div class="info-block">
                <h3>Visit Us</h3>
                <p class="info-address">
                    ADGOC HQ<br>
                    Thookkupalam, Idukki, Kerala<br>
                    India – 685515
                </p>
            </div>
            <div class="info-block">
                <h3>Follow Us</h3>
                <ul class="info-social">
                    <li><a href="#"><i class="fab fa-facebook"></i><span>Facebook</span></a></li>
                    <li><a href="#"><i class="fab fa-twitter"></i><span>Twitter</span></a></li>
                    <li><a href="#"><i class="fab fa-linkedin-in"></i><span>LinkedIn</span></a></li>
                    <li><a href="#"><i class="fab fa-instagram"></i><span>Instagram</span></a></li>
                </ul>
            </div>
        </div>

    </div>
</div>

<script>
    // Set launch date/time here
    const launchDate = new Date("2026-05-12T00:00:00").getTime();

    function updateClock() {
        const now = new Date().getTime();
        const distance = launchDate - now;

        if (distance < 0) return;

        const days = Math.floor(distance / (1000 * 60 * 60 * 24));
        const hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
        const seconds = Math.floor((distance % (1000 * 60)) / 1000);

        document.querySelector(".home-content__clock .days").innerHTML = `${days}<span>Days</span>`;
        document.querySelector(".home-content__clock .hours").innerHTML = `${hours.toString().padStart(2, '0')}<span>H</span>`;
        document.querySelector(".home-content__clock .minutes").innerHTML = `${minutes.toString().padStart(2, '0')}<span>M</span>`;
        document.querySelector(".home-content__clock .seconds").innerHTML = `${seconds.toString().padStart(2, '0')}<span>S</span>`;
    }

    updateClock();
    setInterval(updateClock, 1000);
</script>

<!-- JS -->
<script src="js/jquery-3.2.1.min.js"></script>
<script src="js/plugins.js"></script>
<script src="js/polygons.js"></script>
<script src="js/main.js"></script>

</body>
</html>

