<?php
include dirname(__FILE__) . '/.private/config.php';
<?php include __DIR__ . '/inc/header.php'; ?>
<section id="home" class="hero">
  <video autoplay muted loop playsinline poster="/assets/img/hero_poster.jpg">
    <source src="/assets/video/hero.mp4" type="video/mp4">
  </video>
  <div class="overlay container">
    <h1 class="display-5 fw-bold"><?php echo SITE_NAME; ?></h1>
    <p class="lead mb-4"><?php echo TAGLINE; ?></p>
    <a href="/products.php" class="btn btn-primary btn-lg me-2">Our Products</a>
    <a href="/contact.php" class="btn btn-outline-light btn-lg">Get a Quote</a>
  </div>
</section>

<section class="container py-5">
  <div class="row g-4 align-items-center">
    <div class="col-md-6">
      <h2 class="section-title">Trusted by Retailers & Horeca</h2>
      <p>We source premium fresh produce from trusted farms across the globe. With strict cold-chain handling, we deliver consistent quality at the right price.</p>
      <ul>
        <li>Premium & Class 1 grades</li>
        <li>Temperature‑controlled logistics</li>
        <li>Custom packing & labeling</li>
      </ul>
      <a href="/about.php" class="btn btn-primary">About Us</a>
    </div>
    <div class="col-md-6">
      <img class="img-fluid rounded" src="/assets/img/prod_grapes.jpg" alt="Fresh produce">
    </div>
  </div>
</section>

<section class="bg-light py-5">
  <div class="container">
    <h2 class="section-title text-center mb-4">Owner Profiles</h2>
    <div class="row g-4">
      <?php
      $owners = json_decode(file_get_contents(__DIR__ . '/assets/data/owners.json'), true);
      foreach($owners as $o): ?>
      <div class="col-md-6">
        <div class="card h-100 shadow-sm">
          <img src="<?php echo htmlspecialchars($o['photo']); ?>" class="card-img-top" alt="<?php echo htmlspecialchars($o['name']); ?>">
          <div class="card-body">
            <h5 class="card-title mb-1"><?php echo htmlspecialchars($o['name']); ?></h5>
            <div class="text-muted mb-2"><?php echo htmlspecialchars($o['title']); ?></div>
            <p class="card-text"><?php echo htmlspecialchars($o['bio']); ?></p>
          </div>
        </div>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<section class="container py-5">
  <div class="text-center mb-4">
    <h2 class="section-title">Popular Products</h2>
    <p class="text-muted">Hand‑picked weekly highlights</p>
  </div>
  <div class="row g-4">
    <?php
    $products = json_decode(file_get_contents(__DIR__ . '/assets/data/products.json'), true);
    foreach($products as $p): ?>
      <div class="col-6 col-md-3">
        <div class="card card-product h-100 shadow-sm">
          <img src="<?php echo htmlspecialchars($p['image']); ?>" class="card-img-top" alt="<?php echo htmlspecialchars($p['name']); ?>">
          <div class="card-body">
            <h6 class="mb-1"><?php echo htmlspecialchars($p['name']); ?></h6>
            <div class="small text-muted"><?php echo htmlspecialchars($p['origin']); ?> · <?php echo htmlspecialchars($p['grade']); ?></div>
          </div>
        </div>
      </div>
    <?php endforeach; ?>
  </div>
</section>
<?php include __DIR__ . '/inc/footer.php'; ?>
