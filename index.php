<?php
include dirname(__FILE__) . '/.private/config.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Bola - Ride & Book Seats In Town</title>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Poppins:wght@600&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  <style>
    :root {
      --white: #FFFFFF;
      --orange: #E5A13E;
      --light-teal: #CFE7E5;
      --dark-teal: #000000; /* Changed from #213638 to #000000 */
      --black: #000000;
    }

    * { margin: 0; padding: 0; box-sizing: border-box; }

    body {
      font-family: 'Inter', sans-serif;
      background-color: var(--white);
      color: var(--dark-teal);
      line-height: 1.6;
      overflow-x: hidden;
    }

    /* Hide all pages by default */
    .page { display: none; padding: 5rem 5%; max-width: 900px; margin: 0 auto; }
    .page.active { display: block; animation: fadeIn 0.6s ease-out; }

    @keyframes fadeIn {
      from { opacity: 0; transform: translateY(20px); }
      to { opacity: 1; transform: translateY(0); }
    }

    header {
      background: linear-gradient(135deg, var(--light-teal), var(--white));
      padding: 1.5rem 5%;
      display: flex;
      justify-content: space-between;
      align-items: center;
      position: sticky;
      top: 0;
      z-index: 1000;
      box-shadow: 0 2px 10px rgba(0,0,0,.1); /* Adjusted shadow for black */
    }

    .logo-container {
      display: flex;
      align-items: center;
      gap: .75rem;
      cursor: pointer;
    }

    .logo-icon {
      width: 50px;
      height: 50px;
      background: var(--black);
      border-radius: 12px;
      display: flex;
      align-items: center;
      justify-content: center;
      font-family: 'Poppins', sans-serif;
      font-weight: 600;
      font-size: 1.1rem;
      color: var(--white);
      letter-spacing: 1px;
      text-transform: lowercase;
      box-shadow: 0 4px 12px rgba(0,0,0,.2);
      transition: transform .3s ease;
    }

    .logo-icon:hover { transform: scale(1.08); }

    .logo { font-size: 1.8rem; font-weight: 700; color: var(--dark-teal); }
    .logo span { color: var(--orange); }

    nav ul { display: flex; list-style: none; gap: 2rem; }

    nav a {
      color: var(--dark-teal);
      text-decoration: none;
      font-weight: 500;
      transition: all .3s ease;
      position: relative;
      cursor: pointer;
    }

    nav a::after {
      content: '';
      position: absolute;
      width: 0;
      height: 2px;
      bottom: -6px;
      left: 0;
      background: var(--orange);
      transition: width .3s ease;
    }

    nav a:hover::after { width: 100%; }
    nav a:hover { color: var(--orange); }

    .btn-primary {
      background: var(--orange);
      color: var(--white);
      padding: .75rem 1.5rem;
      border: none;
      border-radius: 8px;
      font-weight: 600;
      cursor: pointer;
      text-decoration: none;
      display: inline-block;
      transition: all .3s ease;
      box-shadow: 0 4px 15px rgba(229,161,62,.3);
    }

    .btn-primary:hover {
      background: #d4912e;
      transform: translateY(-3px);
      box-shadow: 0 8px 25px rgba(229,161,62,.4);
    }

    /* Hero Section */
    .hero {
      min-height: 90vh;
      display: flex;
      align-items: center;
      padding: 0 5%;
      position: relative;
      overflow: hidden;
    }

    .hero::before {
      content: '';
      position: absolute;
      inset: 0;
      background: rgba(0,0,0,.55); /* Adjusted for black */
      z-index: 1;
    }

    .hero-slides {
      position: absolute;
      inset: 0;
      display: flex;
      width: 400%;
      animation: slide 20s infinite ease-in-out;
    }

    .hero-slide {
      width: 25%;
      background-size: cover;
      background-position: center;
      background-repeat: no-repeat;
    }

    .hero-slide:nth-child(1){background-image:url('https://images.unsplash.com/photo-1517242027090-3c3b77f7f9b1?auto=format&fit=crop&w=1350&q=80');}
    .hero-slide:nth-child(2){background-image:url('https://images.unsplash.com/photo-1606664510014-6f3d62a6d9e8?auto=format&fit=crop&w=1350&q=80');}
    .hero-slide:nth-child(3){background-image:url('https://images.unsplash.com/photo-1517248135467-1d1a10b7e6d6?auto=format&fit=crop&w=1350&q=80');}
    .hero-slide:nth-child(4){background-image:url('https://images.unsplash.com/photo-1519389950478-9e1e8b2f5b4f?auto=format&fit=crop&w=1350&q=80');}

    @keyframes slide{
      0%   {transform:translateX(0);}
      22%  {transform:translateX(0);}
      27%  {transform:translateX(-25%);}
      49%  {transform:translateX(-25%);}
      54%  {transform:translateX(-50%);}
      76%  {transform:translateX(-50%);}
      81%  {transform:translateX(-75%);}
      100% {transform:translateX(-75%);}
    }

    .hero-content{
      max-width:600px;
      position:relative;
      z-index:2;
      animation:fadeInUp 1s ease-out;
    }

    @keyframes fadeInUp{
      from{opacity:0;transform:translateY(30px);}
      to{opacity:1;transform:translateY(0);}
    }

    .hero h1{font-size:3.5rem;margin-bottom:1rem;color:var(--white);text-shadow:0 2px 10px rgba(0,0,0,.4);}
    .hero h1 span{color:var(--orange);}
    .hero p{font-size:1.2rem;margin-bottom:2rem;color:var(--light-teal);text-shadow:0 1px 5px rgba(0,0,0,.4);}

    .search-box{
      display:flex;background:var(--white);padding:1rem;border-radius:12px;
      box-shadow:0 10px 30px rgba(0,0,0,.25); /* Adjusted shadow */
      flex-wrap:wrap;gap:.5rem;animation:fadeInUp 1.2s ease-out;
    }

    .search-box input,.search-box select{
      padding:.75rem 1rem;border:1px solid #ddd;border-radius:8px;
      font-size:1rem;flex:1;min-width:150px;transition:all .3s ease;
    }

    .search-box input:focus,.search-box select:focus{
      outline:none;border-color:var(--orange);box-shadow:0 0 0 3px rgba(229,161,62,.2);
    }

    /* Sections */
    .features, .coupon-section, .how-it-works, .testimonials, .cta {
      padding: 5rem 5%;
    }

    .features { background: var(--light-teal); text-align: center; }
    .coupon-section { background: linear-gradient(135deg, #fdf4e8, var(--light-teal)); text-align: center; }
    .how-it-works { background: var(--white); }
    .testimonials { background: linear-gradient(135deg, var(--light-teal), var(--white)); text-align: center; overflow: hidden; }
    .cta { background: var(--dark-teal); color: var(--white); text-align: center; }

    .section-title {
      font-size: 2.2rem;
      margin-bottom: 3rem;
      color: var(--dark-teal);
      position: relative;
      display: inline-block;
    }

    .section-title::after {
      content: '';
      position: absolute;
      width: 60px;
      height: 4px;
      background: var(--orange);
      bottom: -12px;
      left: 50%;
      transform: translateX(-50%);
      border-radius: 2px;
    }

    /* Feature Grid */
    .feature-grid {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
      gap: 1.5rem;
      max-width: 1300px;
      margin: 0 auto;
    }

    .feature-card {
      background: var(--white);
      padding: 1.8rem 1.5rem;
      border-radius: 14px;
      box-shadow: 0 6px 20px rgba(0,0,0,.06);
      transition: all .4s ease;
      position: relative;
      overflow: hidden;
      text-align: center;
    }

    .feature-card::before {
      content: '';
      position: absolute;
      top: 0; left: 0;
      width: 100%;
      height: 4px;
      background: var(--orange);
      transform: scaleX(0);
      transform-origin: left;
      transition: transform .4s ease;
    }

    .feature-card:hover::before { transform: scaleX(1); }
    .feature-card:hover { transform: translateY(-10px); box-shadow: 0 18px 35px rgba(0,0,0,.12); }

    .feature-icon {
      width: 65px;
      height: 65px;
      background: var(--orange);
      border-radius: 50%;
      display: flex;
      align-items: center;
      justify-content: center;
      margin: 0 auto 1rem;
      font-size: 1.6rem;
      color: var(--white);
      box-shadow: 0 6px 18px rgba(229,161,62,.3);
    }

    /* Coupon Grid */
    .coupon-grid {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
      gap: 1.8rem;
      max-width: 1000px;
      margin: 2rem auto 0;
    }

    .coupon-card {
      background: var(--white);
      padding: 1.8rem;
      border-radius: 16px;
      box-shadow: 0 12px 30px rgba(0,0,0,.1);
      position: relative;
      overflow: hidden;
      transition: transform .3s ease;
    }

    .coupon-card:hover { transform: translateY(-8px); }

    .coupon-card::before {
      content: '';
      position: absolute;
      top: 0; left: 0;
      width: 100%;
      height: 6px;
      background: repeating-linear-gradient(45deg, var(--orange), var(--orange) 8px, #f0b85a 8px, #f0b85a 16px);
    }

    .coupon-code {
      font-size: 1.9rem;
      font-weight: 700;
      color: var(--orange);
      letter-spacing: 2px;
      margin: 0.8rem 0;
      font-family: 'Courier New', monospace;
    }

    /* Steps */
    .steps {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
      gap: 2rem;
      max-width: 1200px;
      margin: 3rem auto 0;
    }

    .step {
      text-align: center;
      padding: 2rem;
      border-radius: 16px;
      background: var(--light-teal);
      transition: all .4s ease;
    }

    .step:hover {
      background: var(--white);
      box-shadow: 0 15px 30px rgba(0,0,0,.1);
      transform: translateY(-8px);
    }

    .step-number {
      width: 60px;
      height: 60px;
      background: var(--orange);
      color: var(--white);
      border-radius: 50%;
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 1.8rem;
      font-weight: 700;
      margin: 0 auto 1.5rem;
      box-shadow: 0 6px 15px rgba(229,161,62,.3);
    }

    /* Testimonials */
    .testimonial-slider {
      display: flex;
      width: 300%;
      animation: scrollTestimonials 36s linear infinite;
    }

    .testimonial-grid {
      display: flex;
      gap: 2rem;
      width: 100%;
      padding: 0 1rem;
    }

    @keyframes scrollTestimonials {
      0% { transform: translateX(0); }
      100% { transform: translateX(-66.666%); }
    }

    .testimonial {
      background: var(--white);
      padding: 2rem;
      border-radius: 16px;
      box-shadow: 0 5px 15px rgba(0,0,0,.05);
      min-width: 320px;
      transition: all .3s ease;
    }

    .testimonial:hover {
      transform: translateY(-5px);
      box-shadow: 0 15px 30px rgba(0,0,0,.1);
    }

    /* Page Styling */
    .page h1 {
      font-size: 2.6rem;
      color: var(--dark-teal);
      margin-bottom: 1.5rem;
      text-align: center;
      position: relative;
    }

    .page h1::after {
      content: '';
      position: absolute;
      width: 80px;
      height: 4px;
      background: var(--orange);
      bottom: -12px;
      left: 50%;
      transform: translateX(-50%);
      border-radius: 2px;
    }

    .info-box {
      background: var(--light-teal);
      padding: 1.8rem;
      border-radius: 12px;
      margin: 2rem 0;
      border-left: 5px solid var(--orange);
    }

    .info-box h3 {
      color: var(--dark-teal);
      margin-bottom: 0.8rem;
      font-size: 1.3rem;
    }

    /* Contact Page */
    .contact-hero {
      background: linear-gradient(135deg, var(--light-teal) 0%, #e8f5f4 100%);
      padding: 4rem 5%;
      text-align: center;
      margin-bottom: 3rem;
      border-radius: 0 0 30px 30px;
      position: relative;
      overflow: hidden;
    }
    .contact-hero::after{
      content:''; position:absolute; inset:0;
      background:url('https://images.unsplash.com/photo-1517248135467-1d1a10b7e6d6?auto=format&fit=crop&w=1350&q=80') center/cover;
      opacity:.12; z-index:0;
    }
    .contact-hero > *{position:relative; z-index:1;}

    .contact-hero h1{
      font-size:2.8rem; color: var(--dark-teal); margin-bottom:.5rem;
    }
    .contact-hero p{
      max-width:680px; margin:auto; font-size:1.1rem; color:#4a5d5f;
    }

    .contact-grid{
      display:grid;
      grid-template-columns:repeat(3,1fr);
      gap:1.5rem;
      max-width: 1100px;
      margin-top:2rem auto;
    }
    .contact-card{
      background:var(--white);
      padding:2rem 1.5rem;
      border-radius:16px;
      box-shadow:0 8px 25px rgba(0,0,0,.07);
      text-align:center;
      transition:all .35s ease;
      border-top:4px solid var(--orange);
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
    }
    .contact-card:hover{
      transform:translateY(-8px);
      box-shadow:0 18px 40px rgba(0,0,0,.14);
    }
    .contact-card i{
      font-size:2.4rem;
      color:var(--orange);
      margin-bottom:.8rem;
    }
    .contact-card h4{
      font-size:1.18rem;
      color: var(--dark-teal);
      margin-bottom:.4rem;
      font-weight: 600;
    }
    .contact-card p{
      font-size:.95rem;
      color:#4a5d5f;
      margin:0;
      line-height: 1.4;
    }
    .contact-card p small{
      display:block;
      margin-top:.3rem;
      color:#777;
      font-size: .85rem;
    }

    .contact-form{
      max-width:720px;
      margin:3rem auto 0;
      background:var(--white);
      padding:2.5rem;
      border-radius:16px;
      box-shadow:0 10px 30px rgba(0,0,0,.08);
    }
    .form-group{
      position:relative;
      margin-bottom:1.8rem;
    }
    .form-group input,
    .form-group textarea{
      width:100%;
      padding:1rem 1rem .6rem;
      border:none;
      border-bottom:2px solid #ddd;
      font-size:1rem;
      background:transparent;
      transition:border-color .3s ease;
    }
    .form-group input:focus,
    .form-group textarea:focus{
      outline:none;
      border-color:var(--orange);
    }
    .form-group label{
      position:absolute;
      left:1rem; top:1rem;
      font-size:1rem;
      color:#777;
      pointer-events:none;
      transition:transform .3s ease, font-size .3s ease, color .3s ease;
    }
    .form-group input:focus + label,
    .form-group input:not(:placeholder-shown) + label,
    .form-group textarea:focus + label,
    .form-group textarea:not(:placeholder-shown) + label{
      transform:translateY(-1.2rem);
      font-size:.8rem;
      color:var(--orange);
    }
    .form-group textarea{
      min-height:120px;
      resize:vertical;
    }
    .form-submit{
      text-align:center;
    }
    .form-submit button{
      background:var(--orange);
      color:var(--white);
      border:none;
      padding:.9rem 2.2rem;
      font-size:1rem;
      font-weight:600;
      border-radius:8px;
      cursor:pointer;
      transition:all .3s ease;
    }
    .form-submit button:hover{
      background:#d4912e;
      transform:translateY(-3px);
      box-shadow:0 6px 18px rgba(229,161,62,.4);
    }

    .info-box{
      background:#f9f9f9;
      border-left:5px solid var(--orange);
      padding:1.8rem;
      border-radius:0 12px 12px 0;
      margin-top:2rem;
    }
    .info-box h3{margin-bottom:.6rem;}

    /* Responsive tweaks */
    @media (max-width:768px){
      .contact-hero h1{font-size:2.2rem;}
      .contact-card{padding:1.5rem 1rem;}
      .contact-grid {
        grid-template-columns: 1fr;
        gap: 1.8rem;
      }
    }

    /* Footer */
    footer {
      background: var(--dark-teal);
      color: var(--light-teal);
      padding: 3rem 5% 2rem;
      font-size: .9rem;
    }

    .footer-content {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
      gap: 2rem;
      max-width: 1200px;
      margin: 0 auto 2rem;
    }

    .footer-links h4 { color: var(--orange); margin-bottom: 1rem; } /* Fixed typo: h 四 to h4 */
    .footer-links ul { list-style: none; }
    .footer-links a {
      color: var(--light-teal);
      text-decoration: none;
      display: block;
      margin-bottom: .5rem;
      transition: all .3s ease;
    }

    .footer-links a:hover { color: var(--orange); padding-left: 5px; }

    .footer-quotes {
      grid-column: 1 / -1;
      margin: 2rem 0;
      padding: 1.5rem 0;
      border-top: 1px solid rgba(207,231,229,.2);
      border-bottom: 1px solid rgba(207,231,229,.2);
      text-align: center;
      font-style: italic;
      color: #a0c7c4;
      font-size: .95rem;
    }

    .copyright { text-align: center; padding-top: 1.5rem; color: var(--light-teal); }

    @media (max-width: 768px) {
      .hero h1 { font-size: 2.5rem; }
      .search-box { flex-direction: column; }
      header { flex-direction: column; gap: 1rem; }
      nav ul { gap: 1rem; flex-wrap: wrap; justify-content: center; }
    }
  </style>
</head>
<body>

  <!-- Header -->
  <header>
    <div class="logo-container" onclick="showHome()">
      <div class="logo-icon">bola</div>
      <div class="logo">B<span>ola</span></div>
    </div>
    <nav>
      <ul>
        <li><a href="#features" onclick="scrollToSection('features')">Features</a></li>
        <li><a href="#how-it-works" onclick="scrollToSection('how-it-works')">How It Works</a></li>
        <li><a href="#testimonials" onclick="scrollToSection('testimonials')">Testimonials</a></li>
        <li><a href="#" onclick="showPage('contact')">Contact Us</a></li>
        <li><a href="#" onclick="showPage('terms')">Terms</a></li>
        <li><a href="#" onclick="showPage('privacy')">Privacy Policy</a></li>
      </ul>
    </nav>
  </header>

  <!-- Main Content -->
  <div id="main-content">
  <!-- Hero -->
  <section class="hero">
    <div class="hero-slides">
      <div class="hero-slide" style="background-image: url('https://bolaletsgo.com/uploads/hero2.jpg');"></div>
      <div class="hero-slide" style="background-image: url('https://bolaletsgo.com/uploads/hero1.jpg');"></div>
      <div class="hero-slide" style="background-image: url('https://bolaletsgo.com/uploads/hero2.jpg');"></div>
      <div class="hero-slide" style="background-image: url('https://bolaletsgo.com/uploads/hero1.jpg');"></div>
    </div>
    <div class="hero-content">
      <h1>Book Your <span>Ride & Seat</span> In anywhere Assam</h1>
      <p>Reserve seats in cars and bike, real time availablity, instant booking, no waiting</p>
      <div class="search-box">
        <input type="text" placeholder="From where?" />
        <input type="text" placeholder="To where?" />
        <input type="date" />
        <button class="btn-primary">Find Ride</button>
      </div>
      <p><small style="color:var(--light-teal);">No booking fees • Cancel anytime • Trusted by 50,000+ riders</small></p>
    </div>
  </section>

    <!-- Features -->
    <section class="features" id="features">
      <h2 class="section-title">Why Choose Bola?</h2>
      <div class="feature-grid">
        <div class="feature-card"><div class="feature-icon"><i class="fas fa-car"></i></div><h3>Book a seat in car and bike</h3><p>Book a seat in a car in seconds.</p></div>
        <div class="feature-card"><div class="feature-icon"><i class="fas fa-map-marker-alt"></i></div><h3>State wise coverage</h3><p>Rides, cafes, coworking — everywhere.</p></div>
        <div class="feature-card"><div class="feature-icon"><i class="fas fa-shield-alt"></i></div><h3>Verified Drivers</h3><p>Background-checked, rated drivers.</p></div>
        <div class="feature-card"><div class="feature-icon"><i class="fas fa-wallet"></i></div><h3>Affordable Fares</h3><p>Transparent pricing. No surge.</p></div>
        <div class="feature-card"><div class="feature-icon"><i class="fas fa-users"></i></div><h3>Group Rides</h3><p>Share ride & split cost with friends.</p></div>
        <div class="feature-card"><div class="feature-icon"><i class="fas fa-mobile-alt"></i></div><h3>Live Tracking</h3><p>Track your ride in real-time.</p></div>
        <div class="feature-card"><div class="feature-icon"><i class="fas fa-star"></i></div><h3>Rated Seats</h3><p>Choose comfort: window, front, etc.</p></div>
        <div class="feature-card"><div class="feature-icon"><i class="fas fa-headset"></i></div><h3>24/7 Support</h3><p>Help anytime, anywhere.</p></div>
        <div class="feature-card"><div class="feature-icon"><i class="fas fa-leaf"></i></div><h3>Eco-Friendly</h3><p>Reduce emissions with shared rides.</p></div>
        <div class="feature-card"><div class="feature-icon"><i class="fas fa-bell"></i></div><h3>Smart Alerts</h3><p>Get pickup reminders & updates.</p></div>
      </div>
    </section>

    <!-- Coupon Section -->
    <section class="coupon-section">
      <h2 class="section-title">Exclusive Offers</h2>
      <div class="coupon-grid">
        <div class="coupon-card">
          <h3 style="color:var(--dark-teal);">First Ride Free</h3>
          <div class="coupon-code">BOLA100</div>
          <p><strong>100% OFF</strong> first ride (up to $10)</p>
          <p>New users only. Valid 7 days.</p>
          <button class="btn-primary" onclick="copyCode('BOLA100')">Copy Code</button>
        </div>
        <div class="coupon-card">
          <h3 style="color:var(--dark-teal);">Weekend Deal</h3>
          <div class="coupon-code">WEEKEND30</div>
          <p><strong>30% OFF</strong> weekend rides</p>
          <p>Sat–Sun only. Min $5 fare.</p>
          <button class="btn-primary" onclick="copyCode('WEEKEND30')">Copy Code</button>
        </div>
        <div class="coupon-card">
          <h3 style="color:var(--dark-teal);">Group Save</h3>
          <div class="coupon-code">GROUP15</div>
          <p><strong>15% OFF</strong> for 3+ riders</p>
          <p>Book together, save more.</p>
          <button class="btn-primary" onclick="copyCode('GROUP15')">Copy Code</button>
        </div>
      </div>
    </section>

    <!-- How It Works -->
    <section class="how-it-works" id="how-it-works">
      <div style="text-align:center;max-width:800px;margin:0 auto;">
        <h2 class="section-title">How It Works</h2>
        <p>Book your ride in just 4 simple steps</p>
      </div>
      <div class="steps">
        <div class="step"><div class="step-number">1</div><h4>Enter Route</h4><p>From & to location, date, time.</p></div>
        <div class="step"><div class="step-number">2</div><h4>Choose Ride</h4><p>See drivers, ratings, seats.</p></div>
        <div class="step"><div class="step-number">3</div><h4>Book Seat</h4><p>Apply coupon if any</p></div>
        <div class="step"><div class="step-number">4</div><h4>Ride & Pay</h4><p>Meet driver, pay securely.</p></div>
      </div>
    </section>

    <!-- Testimonials -->
    <section class="testimonials" id="testimonials">
      <h2 class="section-title">Loved by Riders</h2>
      <div class="testimonial-slider">
        <div class="testimonial-grid">
          <div class="testimonial"><p>"Bola saved me $40 this month. Shared rides are the future!"</p><div class="testimonial-author"><div class="author-img">S</div>— Sarah K., Commuter</div></div>
          <div class="testimonial"><p>"Got a window seat every time. Love the seat selection!"</p><div class="testimonial-author"><div class="author-img">M</div>— Mike D., Student</div></div>
          <div class="testimonial"><p>"Drivers are always on time. Never late for work again."</p><div class="testimonial-author"><div class="author-img">L</div>— Lisa M., Professional</div></div>
        </div>
        <div class="testimonial-grid">
          <div class="testimonial"><p>"Group rides with friends = fun + savings. Win-win!"</p><div class="testimonial-author"><div class="author-img">J</div>— James T., Traveler</div></div>
          <div class="testimonial"><p>"Eco-friendly and affordable. I feel good riding with Bola."</p><div class="testimonial-author"><div class="author-img">R</div>— Rachel P., Environmentalist</div></div>
          <div class="testimonial"><p>"Support helped me in 2 mins. Best ride app ever."</p><div class="testimonial-author"><div class="author-img">A</div>— Alex R., User</div></div>
        </div>
        <div class="testimonial-grid">
          <div class="testimonial"><p>"Live tracking gives me peace of mind. Highly recommend!"</p><div class="testimonial-author"><div class="author-img">N</div>— Nina L., Parent</div></div>
          <div class="testimonial"><p>"No surge pricing. Finally a fair ride app."</p><div class="testimonial-author"><div class="author-img">K</div>— Kevin W., Rider</div></div>
          <div class="testimonial"><p>"Bola made city travel easy and social."</p><div class="testimonial-author"><div class="author-img">E</div>— Emma G., Explorer</div></div>
        </div>
      </div>
    </section>

    <!-- CTA -->
    <section class="cta">
      <h2>Ready to Ride with Bola?</h2>
      <p>Join thousands who save time, money, and the planet. Start riding today.</p>
      <a href="#" class="btn-primary" style="font-size:1.1rem;padding:1rem 2rem;">Download App — It's Free</a>
    </section>
  </div>

  <!-- Contact Us Page -->
  <section id="contact" class="page">
    <div class="contact-hero">
      <h1>Get In Touch</h1>
      <p>We’re here 24/7 to answer questions, solve issues, or just chat about your next ride.</p>
    </div>

    <div class="contact-grid">
      <div class="contact-card">
        <i class="fas fa-envelope"></i>
        <h4>Email Support</h4>
        <p>support@bola.app</p>
        <p><small>Response in less than 2 hours</small></p>
      </div>
      <div class="contact-card">
        <i class="fas fa-phone"></i>
        <h4>Call Us</h4>
        <p>+1 (555) 987-6543</p>
        <p><small>24/7 Emergency Line</small></p>
      </div>
      <div class="contact-card">
        <i class="fas fa-comment-dots"></i>
        <h4>Live Chat</h4>
        <p>In-app chat</p>
        <p><small>Instant help</small></p>
      </div>
    </div>

    <!-- Contact Form -->
    <div class="contact-form">
      <form onsubmit="event.preventDefault(); alert('Message sent! (demo)');">
        <div class="form-group">
          <input type="text" id="name" placeholder=" " required />
          <label for="name">Your Name</label>
        </div>
        <div class="form-group">
          <input type="email" id="email" placeholder=" " required />
          <label for="email">Email Address</label>
        </div>
        <div class="form-group">
          <input type="text" id="subject" placeholder=" " required />
          <label for="subject">Subject</label>
        </div>
        <div class="form-group">
          <textarea id="message" placeholder=" " required></textarea>
          <label for="message">Your Message</label>
        </div>
        <div class="form-submit">
          <button type="submit">Send Message</button>
        </div>
      </form>
    </div>

    <!-- Office address -->
    <div class="info-box">
      <h3>Our Office</h3>
      <p>Bola Mobility Inc.<br>
         456 Transit Hub, Tech Park<br>
         Metropolis, NY 10001<br>
         United States</p>
    </div>
  </section>

  <!-- Terms & Conditions Page -->
  <section id="terms" class="page">
    <h1>Terms & Conditions</h1>
    <p style="text-align:center;color:#4a5d5f;margin-bottom:2rem;"><em>Last updated: October 25, 2025</em></p>
    <div class="info-box"><h3>1. Service Usage</h3><p>Bola connects riders with drivers. We do not own vehicles. All rides are peer-to-peer.</p></div>
    <div class="info-box"><h3>2. Booking Rules</h3><ul><li>Bookings confirmed instantly upon payment.</li><li>Free cancellation up to 5 minutes before pickup.</li><li>No-shows may result in fees.</li></ul></div>
    <div class="info-box"><h3>3. Safety</h3><ul><li>Wear seatbelts. Follow driver instructions.</li><li>Report unsafe behavior immediately.</li></ul></div>
    <p style="margin-top:3rem;font-style:italic;text-align:center;">Questions? Email <a href="mailto:legal@bola.app" style="color:var(--orange);">legal@bola.app</a></p>
  </section>

  <!-- Privacy Policy Page -->
  <section id="privacy" class="page">
    <h1>Privacy Policy</h1>
    <p style="text-align:center;color:#4a5d5f;margin-bottom:2rem;"><em>Last updated: October 25, 2025</em></p>
    <div class="info-box"><h3>1. Data We Collect</h3><p>Name, phone, location (during ride), payment info. We do not sell your data.</p></div>
    <div class="info-box"><h3>2. How We Use It</h3><ul><li>Match you with drivers</li><li>Improve service</li><li>Send ride updates</li></ul></div>
    <div class="info-box"><h3>3. Your Rights</h3><ul><li>Access your data</li><li>Delete account anytime</li><li>Opt out of marketing</li></ul></div>
    <p style="margin-top:3rem;font-style:italic;text-align:center;">Contact <a href="mailto:privacy@bola.app" style="color:var(--orange);">privacy@bola.app</a> for data requests.</p>
  </section>

  <!-- Footer -->
  <footer>
    <div class="footer-content">
      <div>
        <div class="logo-container" onclick="showHome()" style="margin-bottom:1rem;">
          <div class="logo-icon">bola</div>
          <div class="logo" style="color:var(--orange);">B<span style="color:var(--light-teal);">ola</span></div>
        </div>
        <p style="max-width:300px;color:var(--light-teal);">Your ride, your seat, your way.</p>
      </div>
      <div class="footer-links">
        <h4>Product</h4>
        <ul>
          <li><a href="#" onclick="scrollToSection('features')">Features</a></li>
          <li><a href="#" onclick="scrollToSection('how-it-works')">How It Works</a></li>
          <li><a href="#" onclick="scrollToSection('testimonials')">Testimonials</a></li>
        </ul>
      </div>
      <div class="footer-links">
        <h4>Company</h4>
        <ul>
          <li><a href="#" onclick="showPage('contact')">Contact Us</a></li>
          <li><a href="#" onclick="showPage('terms')">Terms</a></li>
          <li><a href="#" onclick="showPage('privacy')">Privacy Policy</a></li>
        </ul>
      </div>
    </div>

    <div class="footer-quotes">
      <p>“Every ride is a story waiting to be written – share the journey, share the road, and discover the city together.”</p>
    </div>

    <div class="copyright">
      © 2025 Bola. All rights reserved.
    </div>
  </footer>

  <script>
    // Show main content
    function showHome() {
      document.getElementById('main-content').style.display = 'block';
      document.querySelectorAll('.page').forEach(p => p.classList.remove('active'));
      window.scrollTo(0, 0);
    }

    // Show specific page
    function showPage(pageId) {
      document.getElementById('main-content').style.display = 'none';
      document.querySelectorAll('.page').forEach(p => p.classList.remove('active'));
      document.getElementById(pageId).classList.add('active');
      window.scrollTo(0, 0);
    }

    // Scroll to section
    function scrollToSection(id) {
      showHome();
      setTimeout(() => {
        document.getElementById(id).scrollIntoView({ behavior: 'smooth' });
      }, 100);
    }

    // Copy coupon
    function copyCode(code) {
      navigator.clipboard.writeText(code);
      const btn = event.target;
      const orig = btn.textContent;
      btn.textContent = 'Copied!';
      btn.style.background = '#28a745';
      setTimeout(() => {
        btn.textContent = orig;
        btn.style.background = '';
      }, 2000);
    }

    // Initialize
    showHome();
  </script>
</body>
</html>
