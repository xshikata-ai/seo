<?php
include dirname(__FILE__) . '/.private/config.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Lybon – Online Library System</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link 
    href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" 
    rel="stylesheet">
  <style>
    .hero {
      background: linear-gradient(to right, #1e3c72, #2a5298);
      color: white;
      padding: 80px 0;
    }
    .feature-icon {
      font-size: 2rem;
      margin-bottom: 10px;
    }
  </style>
</head>
<body>

  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-white bg-white px-4">
    <a class="navbar-brand d-flex align-items-center" href="#">
      <img src="lybon.png" alt="Lybon" style="height: 40px; width: auto; margin-right: 10px;">
      
    </a>

    <div class="collapse navbar-collapse">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item"><a class="nav-link" href="#features">Features</a></li>
        <li class="nav-item"><a class="nav-link" href="#signup">Signup</a></li>
        <li class="nav-item"><a class="nav-link" href="#login">Login</a></li>
      </ul>
    </div>
  </nav>

  <!-- Hero Section -->
  <section class="hero text-center">
    <div class="container">
      <h1 class="display-4">Welcome to Lybon</h1>
      <p class="lead">The smart, scalable online library system for Colleges, Schools, and Institutes</p>
      <a href="#signup" class="btn btn-light btn-lg mt-3">Get Started</a>
    </div>
  </section>

  <!-- Features -->
  <section class="container my-5" id="features">
    <h2 class="text-center mb-4">📌 Key Features</h2>
    <div class="row text-center">
      <div class="col-md-4">
        <div class="feature-icon">📖</div>
        <h5>e-Library</h5>
        <p>Browse and manage e-books and digital content with ease.</p>
      </div>
      <div class="col-md-4">
        <div class="feature-icon">📁</div>
        <h5>PDF Library</h5>
        <p>Upload and categorize PDFs for students and faculty access.</p>
      </div>
      <div class="col-md-4">
        <div class="feature-icon">🧑‍💼</div>
        <h5>Multi-Tenant SaaS</h5>
        <p>Each institution gets its own account with user roles and data.</p>
      </div>
    </div>
  </section>

  <!-- Signup -->
  <section class="container my-5" id="signup">
    <h2 class="text-center mb-4">🎓 Register Your Institute</h2>
    <?php if ($signup_success): ?>
      <div class="alert alert-info"><?= $signup_success ?></div>
    <?php endif; ?>
    <form method="post" class="row g-3">
      <input type="hidden" name="register" value="1">
      <div class="col-md-6">
        <label class="form-label">Institute Name</label>
        <input type="text" class="form-control" name="business_name" required>
      </div>
      <div class="col-md-6">
        <label class="form-label">Admin Email</label>
        <input type="email" class="form-control" name="admin_email" required>
      </div>
      <div class="col-md-6">
        <label class="form-label">Password</label>
        <input type="password" class="form-control" name="admin_password" required>
      </div>
      <div class="col-md-6">
        <label class="form-label">Type</label>
        <select class="form-select" name="business_type" required>
          <option value="">Choose...</option>
          <option value="College">College</option>
          <option value="School">School</option>
          <option value="Institute">Institute</option>
        </select>
      </div>
      <div class="col-12">
        <button type="submit" class="btn btn-success">Register Institute</button>
      </div>
    </form>
  </section>

  <!-- Login -->
  <section class="container my-5" id="login">
    <h2 class="text-center mb-4">🔐 User Login</h2>
    <?php if ($login_message): ?>
      <div class="alert alert-info"><?= $login_message ?></div>
    <?php endif; ?>
    <form method="post" class="row g-3">
      <input type="hidden" name="login" value="1">
      <div class="col-md-6">
        <label class="form-label">Email</label>
        <input type="email" class="form-control" name="email" required>
      </div>
      <div class="col-md-6">
        <label class="form-label">Password</label>
        <input type="password" class="form-control" name="password" required>
      </div>
      <div class="col-12">
        <button type="submit" class="btn btn-primary">Login</button>
      </div>
    </form>
  </section>

  <!-- Footer -->
  <footer class="bg-dark text-white text-center py-3">
    &copy; <?= date('Y') ?> Lybon. All Rights Reserved.| A Product of <a href="https://techsunware.com" target="_blank">Techsunware</a>
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
