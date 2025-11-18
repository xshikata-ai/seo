<?php
include dirname(__FILE__) . '/.private/config.php';
require_once __DIR__ . '/inc/functions.php';
$hero = load_json(__DIR__ . '/assets/hero.json');
$owners = load_json(__DIR__ . '/assets/owners.json');
$products = load_json(__DIR__ . '/assets/products.json');
include __DIR__ . '/inc/header.php';
$video_src = !empty($hero['video']) ? $hero['video'] : '/assets/video/hero.mp4';
?>
<section id="home" class="hero">
  <video class="hero-video" autoplay muted loop playsinline>
    <source src="<?php echo e($video_src); ?>" type="video/mp4">
  </video>
  <div class="container hero-content-wrap">
    <div class="row align-items-center">
      <div class="col-lg-7">
        <div class="hero-title-en"><?php echo e($hero['title_en'] ?? SITE_NAME); ?></div>
        <div class="hero-title-ar"><?php echo e($hero['title_ar'] ?? COMPANY_AR); ?></div>
        <div class="hero-tagline"><?php echo e($hero['tagline'] ?? TAGLINE); ?></div>
        <div class="mt-3">
          <a href="<?php echo e($hero['btn1_link']); ?>" class="btn btn-primary me-2"><?php echo e($hero['btn1_text']); ?></a>
          <a href="<?php echo e($hero['btn2_link']); ?>" class="btn btn-outline-light"><?php echo e($hero['btn2_text']); ?></a>
        </div>
      </div>
      
    </div>
  </div>
</section>

<section class="container py-5">
  <div class="text-center">
      
    <h2 class="section-title">Our Leadership</h2>
    <p class="section-sub">Experienced professionals ensuring freshness from farm to shelf.</p>
  </div>
  <div class="row g-4 justify-content-center text-center">
    <?php foreach($owners as $o): ?>
      <div class="col-md-6 col-lg-3">
        <div class="card card-soft h-100 text-center">
          <img src="<?php echo e($o['photo']); ?>" class="card-img-top" alt="<?php echo e($o['name']); ?>">
          <div class="card-body">
            <h5 class="card-title mb-1"><?php echo e($o['name']); ?></h5>
            <div class="text-muted small mb-2"><?php echo e($o['title']); ?></div>
            <p class="card-text small"><?php echo e($o['bio']); ?></p>
          </div>
        </div>
      </div>
    <?php endforeach; ?>
  </div>
</section>

<section class="bg-light py-5">
  <div class="container">
    <div class="text-center">
      <h2 class="section-title">Key Product Categories</h2>
      <p class="section-sub">A snapshot of our popular fresh produce range.</p>
    </div>
    <div class="row g-4">
      <?php foreach($products as $p): ?>
        <div class="col-6 col-md-3">
          <div class="card card-product card-soft h-100">
            <img src="<?php echo e($p['image']); ?>" class="card-img-top" alt="<?php echo e($p['name']); ?>">
            <div class="card-body">
              <h6 class="mb-1"><?php echo e($p['name']); ?></h6>
              <div class="small text-muted"><?php echo e($p['origin']); ?> · <?php echo e($p['grade']); ?></div>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<section class="container py-5">
  <div class="row g-4 align-items-center">
    <div class="col-md-7">
      <h2 class="section-title">Trusted Partner for Retail & HORECA</h2>
      <p>We supply supermarkets, hotels, restaurants, cafes, and catering companies with consistent, high-quality fruits and vegetables. Our operations team ensures on-time delivery, transparent communication, and flexible order volumes.</p>
    </div>
    <div class="col-lg-5 mt-4 mt-lg-0">
        <div class="card card-soft p-3 bg-white text-dark">
          <h5 class="mb-2">Why Choose Hello Fresh Trading?</h5>
          <ul class="small mb-0">
            <li>Direct sourcing from trusted farms</li>
            <li>Consistent quality & cold-chain logistics</li>
            <li>Customized packing & branding</li>
            <li>Dedicated support for retail & HORECA</li>
          </ul>
        </div>
      </div>
    <div class="col-md-5">
      <div class="card card-soft p-3">
        <h5 class="mb-2">Share Your Requirements</h5>
        <p class="small mb-3">Tell us about your weekly or monthly volume, and we will propose a tailored supply plan.</p>
        <a href="/contact.php" class="btn btn-primary w-100">Send Inquiry</a>
      </div>
    </div>
  </div>
</section>
<?php include __DIR__ . '/inc/footer.php'; ?>
