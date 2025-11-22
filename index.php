<?php
include dirname(__FILE__) . '/.private/config.php';
?>
<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <title><?php echo $row['title']; ?> – Premium Silk Sarees, Kurtis & Ethnic Wear Online | Chennai</title>
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <!-- Primary Meta Tags -->
    <meta name="title" content="<?php echo $row['title']; ?> | Subakaaviya Silks">
    <meta name="description" content="<?php echo !empty($row['meta_description']) ? $row['meta_description'] : 'Shop premium sarees and kurtis online at Subakaaviya Silks. Explore exclusive collections of ethnic wear, traditional designs, and modern styles.'; ?>">
    <meta name="keywords" content="Subakaaviya Silks, buy sarees online, buy kurtis online, silk sarees, designer kurtis, textiles ecommerce, indian ethnic wear, women fashion">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="google-site-verification" content="qDdGnYtdPwMY7rJoXgioJ4AVyoBk9jO4liF1PIE8FQA" />

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="https://subakaaviyasilks.com/<?php echo basename($_SERVER['REQUEST_URI']); ?>">
    <meta property="og:title" content="<?php echo $row['title']; ?> | Subakaaviya Silks">
    <meta property="og:description" content="<?php echo !empty($row['meta_description']) ? $row['meta_description'] : 'Shop premium sarees and kurtis online at Subakaaviya Silks.'; ?>">
    <meta property="og:image" content="https://subakaaviyasilks.com/admin/<?php echo $row['share_image'] ?? $row['favicon']; ?>">

    <!-- Twitter -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:url" content="https://subakaaviyasilks.com/<?php echo basename($_SERVER['REQUEST_URI']); ?>">
    <meta name="twitter:title" content="<?php echo $row['title']; ?> | Subakaaviya Silks">
    <meta name="twitter:description" content="<?php echo !empty($row['meta_description']) ? $row['meta_description'] : 'Shop premium sarees and kurtis online at Subakaaviya Silks.'; ?>">
    <meta name="twitter:image" content="https://subakaaviyasilks.com/admin/<?php echo $row['share_image'] ?? $row['favicon']; ?>">

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="admin/<?php echo $row['favicon']; ?>">

    <!-- Template CSS -->
    <link rel="stylesheet" href="assets/css/maind134.css?v=3.4">

    <style>
        /* WhatsApp Floating Button - Left Side */
        #whatsapp-button {
        position: fixed;
        bottom: 30px;
        left: 20px;
        z-index: 9999;
        background-color: #25D366;
        border-radius: 50%;
        padding: 10px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.3);
        transition: transform 0.3s ease;
        }

        #whatsapp-button img {
        width: 50px;
        height: 50px;
        display: block;
        }

        #whatsapp-button:hover {
        transform: scale(1.1);
        }

        .shopping-cart-list {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .shopping-cart-item {
            display: flex;
            align-items: center;
            justify-content: space-between; /* space between title and delete */
            padding: 10px 0;
            border-bottom: 1px solid #eee;
        }

        .shopping-cart-img img {
            width: 60px;
            height: 60px;
            object-fit: cover;
            border-radius: 5px;
        }

        .shopping-cart-title {
            flex: 1;
            margin-left: 15px;
        }

        .shopping-cart-title h4 {
            font-size: 14px;
            margin: 0 0 5px;
        }

        .shopping-cart-delete a {
            color: #999;
            font-size: 18px;
            text-decoration: none;
        }

        .shopping-cart-delete a:hover {
            color: red;
        }
        .main-categori-wrap .categori-dropdown-wrap {
            background: #fff;
            border-radius: 8px;
            padding: 10px;
            width: 280px;
        }
        .main-categori-wrap ul li a:hover {
            background-color: #e3cfcf;
            color: #710f10 !important;
        }
        .main-categori-wrap .dropdown-menu a:hover {
            color: #710f10 !important;
        }
        .hover-bg-secondary:hover {
            background-color: #e3cfcf !important;
        }
    </style>
    
</head>

<body>

    <!-- Modal -->
    <?php
        // Example: Offer ends on 2025-09-30 23:59:59
        $offerEnd = "2025-09-30 23:59:59";
    ?>
    <!-- <div class="modal fade custom-modal" id="onloadModal" tabindex="-1" aria-labelledby="onloadModalLabel" aria-hidden="true">
        <div class="modal-dialog">
        <div class="modal-content">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                <div class="modal-body">
                    <div class="deal" style="background-image: url('assets/imgs/banner/menu-banner-7.png')">
                        <div class="deal-top">
                            <h2 class="text-brand">Deal of the Day</h2>
                            <h5>Limited quantities.</h5>
                        </div>
                        <div class="deal-content">
                            <h6 class="product-title"><a href="#">Summer Collection New Morden Design</a></h6>
                            <div class="product-price"><span class="new-price">$139.00</span><span class="old-price">$160.99</span></div>
                        </div>
                        <div class="deal-bottom">
                            <p>Hurry Up! Offer End In:</p>
                            <div id="countdown" class="deals-countdown">
                                <span class="countdown-section">
                                    <span id="days" class="countdown-amount hover-up">00</span>
                                    <span class="countdown-period"> days </span>
                                </span>
                                    <span class="countdown-section">
                                        <span id="hours" class="countdown-amount hover-up">00</span>
                                        <span class="countdown-period"> hours </span>
                                    </span>
                                    <span class="countdown-section">
                                        <span id="minutes" class="countdown-amount hover-up">00</span>
                                        <span class="countdown-period"> mins </span>
                                    </span>
                                    <span class="countdown-section">
                                        <span id="seconds" class="countdown-amount hover-up">00</span>
                                        <span class="countdown-period"> sec </span>
                                    </span>
                                </div>
                            <a href="#" class="btn hover-up">Shop Now <i class="fi-rs-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
        </div>
        </div>
    </div> -->

    <header class="header-area header-style-1 header-height-2">
        <div class="header-top header-top-ptb-1 d-none d-lg-block">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-xl-6 col-lg-6">
                        <div class="header-info">
                            <ul>
                                <li><i class="fi-rs-smartphone"></i> <a href="tel:<?php echo $row['phone']; ?>"><?php echo $row['phone']; ?></a></li>
                                <li><i class="fi-rs-marker"></i><a  href="mailto:<?php echo $row['email']; ?>"><?php echo $row['email']; ?></a></li>
                            </ul>
                        </div>
                    </div>
                    
                    <div class="col-xl-6 col-lg-6">
                        <div class="header-info header-info-right">
                            <ul>
                                <li><i class="fi-rs-info"></i><a href="faq.php"> Need Help</a></li>
                                <li>
                                    <i class="fi-rs-user"></i>
                                    <?php if (isset($_SESSION['user_id']) && isset($urow['name'])): ?>
                                        <a href="my-account.php">
                                            <?php echo htmlspecialchars($urow['name']); ?>
                                        </a>
                                    <?php else: ?>
                                        <a href="login.php">Log In</a>
                                    <?php endif; ?>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="header-middle header-middle-ptb-1 d-none d-lg-block">
            <div class="container">
                <div class="header-wrap">
                    <div class="logo logo-width-1">
                        <a href="https://subakaaviyasilks.com/"><img src="admin/<?php echo $row['logo'] ?>" alt="logo"></a>
                    </div>
                    <div class="header-right">
                        <div class="search-style-2">
                            <form action="#">
                                <input type="text" placeholder="Search for items...">
                            </form>
                        </div>
                        <div class="header-action-right">
                            <div class="header-action-2">

                                <div class="header-action-icon-2">
                                    <a class="mini-cart-icon" href="cartlist.php">
                                        <i class="fi-rs-shopping-cart" style="
                                              font-size: 20px;
                                              height: 40px;
                                              width: 40px;
                                              display: flex;
                                              align-items: center;
                                              justify-content: center;
                                              background: #e8e8e8;
                                              border-radius: 50%;
                                              color: #088178;
                                           "></i>
                                        <span class="pro-count blue" id="cart-count">0</span>
                                    </a>
                                    <div class="cart-dropdown-wrap cart-dropdown-hm2" id="cart-dropdown-container">
                                        <?php include('load_cart_dropdown.php'); ?>
                                    </div>
                                </div>



                                <div class="header-action-icon-2">
                                    <a href="my-account.php">
                                        <i class="fi-rs-user"
                                           style="
                                              font-size: 20px;
                                              height: 40px;
                                              width: 40px;
                                              display: flex;
                                              align-items: center;
                                              justify-content: center;
                                              background: #e8e8e8;
                                              border-radius: 50%;
                                              color: #088178;
                                           ">
                                        </i>
                                    </a>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="header-bottom header-bottom-bg-color sticky-bar">
            <div class="container">
                <div class="header-wrap header-space-between position-relative">
                    <div class="logo logo-width-1 d-block d-lg-none">
                        <a href="https://subakaaviyasilks.com/"><img src="admin/<?php echo $row['logo'] ?>" alt="logo"></a>
                    </div>
                    <div class="header-nav d-none d-lg-flex">

                        <!-- <div class="main-categori-wrap d-none d-lg-block">
                            <a class="categori-button-active" href="#">
                                <span class="fi-rs-apps"></span> Browse Categories
                            </a>
                            <div class="categori-dropdown-wrap categori-dropdown-active-large">
                                <ul>
                                    <?php
                                        $catsql = "SELECT * FROM `category` WHERE `du_id` = 1 AND `cstatus` = 1";
                                        $catquery = mysqli_query($conn, $catsql);
                                        while ($catrow = mysqli_fetch_array($catquery)) {
                                            $catid = $catrow['cat_id'];
                                    ?>
                                    <li class="has-children">
                                        <a href="all-products.php"><i class="evara-font-dress"></i><?php echo $catrow['cname']; ?></a>
                                        <div class="dropdown-menu">
                                            <ul class="mega-menu d-lg-flex">
                                                <li class="mega-menu-col col-lg-4">
                                                    <ul class="d-lg-flex">
                                                        <li class="mega-menu-col col-lg-12">
                                                            <ul>
                                <?php
                                $subRes = mysqli_query($conn, "SELECT * FROM subcategory WHERE subcat_status=1 AND du_id=1 AND `cat_id` = $catid");
                                while($ssub = mysqli_fetch_assoc($subRes)):
                                ?>
                                                                <li><a class="dropdown-item nav-link nav_item" href="subcategory-products.php?subcat_id=<?php echo $ssub['subcat_id']; ?>"><?php echo $ssub['subcat_name']; ?></a></li>
                                                                <?php endwhile; ?>
                                                            </ul>
                                                        </li>
                                                    </ul>
                                                </li>
                                            </ul>
                                        </div>
                                    </li>
                                    <?php } ?>
                                    
                                
                                </ul>
                                <div class="more_categories">Show more...</div>
                            </div>
                        </div> -->
                        <div class="main-categori-wrap d-none d-lg-block">
                            <a class="categori-button-active" href="#">
                                <span class="fi-rs-apps"></span> Browse Categories
                            </a>

                            <div class="categori-dropdown-wrap categori-dropdown-active-large shadow-lg rounded">
                                <ul class="list-unstyled m-0">
                                    <?php
                                        $catsql = "SELECT * FROM `category` WHERE `du_id` = 1 AND `cstatus` = 1 ORDER BY cname ASC";
                                        $catquery = mysqli_query($conn, $catsql);
                                        while ($catrow = mysqli_fetch_array($catquery)) {
                                            $catid = $catrow['cat_id'];
                                    ?>
                                    <li class="has-children position-relative mb-1">
                                        <a href="all-products.php?cat_id=<?php echo $catid; ?>" class="d-flex align-items-center justify-content-between p-2 bg-light rounded hover-bg-secondary text-dark text-decoration-none">
                                            <span><i class="evara-font-dress me-2 text-primary"></i><?php echo htmlspecialchars($catrow['cname']); ?></span>
                                            <i class="fi-rs-angle-right small"></i>
                                        </a>

                                        <!-- Subcategories Dropdown -->
                                        <div class="dropdown-menu border-0 shadow-lg rounded mt-1 p-3" style="display:none; position:absolute; left:100%; top:0; min-width:250px; background:#fff; z-index:1000;">
                                            <h6 class="fw-bold mb-2 text-dark border-bottom pb-1"><?php echo htmlspecialchars($catrow['cname']); ?></h6>
                                            <ul class="list-unstyled">
                                                <?php
                                                $subRes = mysqli_query($conn, "SELECT * FROM subcategory WHERE subcat_status=1 AND du_id=1 AND `cat_id` = $catid ORDER BY subcat_name ASC");
                                                if (mysqli_num_rows($subRes) > 0) {
                                                    while ($ssub = mysqli_fetch_assoc($subRes)) {
                                                ?>
                                                    <li><a class="dropdown-item py-1 px-2 d-block text-secondary hover-text-primary" href="subcategory-products.php?subcat_id=<?php echo $ssub['subcat_id']; ?>"><?php echo htmlspecialchars($ssub['subcat_name']); ?></a></li>
                                                <?php
                                                    }
                                                } else {
                                                    echo '<li><span class="text-muted small">No subcategories</span></li>';
                                                }
                                                ?>
                                            </ul>
                                        </div>
                                    </li>
                                    <?php } ?>
                                </ul>
                            </div>
                        </div>
                        <div class="main-menu main-menu-padding-1 main-menu-lh-2 d-none d-lg-block">
                            <nav>
                                <ul>
                                    <li><a class="active" href="https://subakaaviyasilks.com/">Home</a></li>
                                    <li><a href="about.php">About</a></li>
                                    <li><a href="contact.php">Contact</a></li>
                                    <li><a href="my-account.php">My Account</a></li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                    <div class="hotline d-none d-lg-block">
                        <p><i class="fi-rs-headset"></i><span>Call Us</span><a href="tel:<?php echo $row['phone']; ?>"><?php echo $row['phone']; ?></a></p>
                    </div>
                    
                    <p class="mobile-promotion">Happy <span class="text-brand">Diwali Offer</span>. Big Sale Up to 20%</p>
                    <div class="header-action-right d-block d-lg-none">
                        <div class="header-action-2">
                            <div class="header-action-icon-2">
                                <a href="my-account.php">
                                    <!-- <img alt="Evara" src="assets/imgs/theme/icons/icon-heart.svg"> -->
                                    <i class="fi-rs-user"
                                       style="
                                          font-size: 20px;
                                          height: 40px;
                                          width: 40px;
                                          display: flex;
                                          align-items: center;
                                          justify-content: center;
                                          background: #e8e8e8;
                                          border-radius: 50%;
                                          color: #088178;
                                       ">
                                    </i>
                                </a>
                            </div>
                            <div class="header-action-icon-2">
                                <a class="mini-cart-icon" href="cartlist.php">
                                    <!-- <img alt="Evara" src="assets/imgs/theme/icons/icon-cart.svg"> -->
                                    <i class="fi-rs-shopping-cart" style="
                                      font-size: 20px;
                                      height: 40px;
                                      width: 40px;
                                      display: flex;
                                      align-items: center;
                                      justify-content: center;
                                      background: #e8e8e8;
                                      border-radius: 50%;
                                      color: #088178;
                                   "></i>
                                    <span class="pro-count white" id="cart-count-mobile">0</span>
                                </a>
                            </div>
                            <div class="header-action-icon-2 d-block d-lg-none">
                                <div class="burger-icon burger-icon-white">
                                    <span class="burger-icon-top"></span>
                                    <span class="burger-icon-mid"></span>
                                    <span class="burger-icon-bottom"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <div class="mobile-header-active mobile-header-wrapper-style">
        <div class="mobile-header-wrapper-inner">
            <div class="mobile-header-top">
                <div class="mobile-header-logo">
                    <a href="https://subakaaviyasilks.com/"><img src="admin/<?php echo $row['logo'] ?>" alt="logo"></a>
                </div>
                <div class="mobile-menu-close close-style-wrap close-style-position-inherit">
                    <button class="close-style search-close">
                        <i class="icon-top"></i>
                        <i class="icon-bottom"></i>
                    </button>
                </div>
            </div>
            <div class="mobile-header-content-area">
                <div class="mobile-search search-style-3 mobile-header-border">
                    <form action="#">
                        <input type="text" placeholder="Search for items…">
                        <button type="submit"><i class="fi-rs-search"></i></button>
                    </form>
                </div>
                <div class="mobile-menu-wrap mobile-header-border">
                    <div class="main-categori-wrap mobile-header-border">
                        <a class="categori-button-active-2" href="#">
                            <span class="fi-rs-apps"></span> Browse Categories
                        </a>
                        <div class="categori-dropdown-wrap categori-dropdown-active-small">
                            <ul>
                                <?php
                                    $catsql = "SELECT * FROM `category` WHERE `du_id` = 1 AND `cstatus` = 1";
                                    $catquery = mysqli_query($conn, $catsql);
                                    while ($catrow = mysqli_fetch_array($catquery)) {
                                        $catid = $catrow['cat_id'];
                                ?>
                                <li><a href="sub-category.php?id=<?php echo $catid; ?>"><i class="evara-font-dress"></i><?php echo $catrow['cname']; ?></a></li>
                                <?php } ?>
                            </ul>
                        </div>
                    </div>
                    <!-- mobile menu start -->
                    <nav>
                        <ul class="mobile-menu">
                            <li><a href="https://subakaaviyasilks.com/">Home</a></li>
                            <li><a href="about.php">About</a></li>
                            <li><a href="contact.php">Contact</a></li>
                            <li>
                                <i class="fi-rs-user"></i>&nbsp;
                                <?php if (isset($_SESSION['user_id']) && isset($urow['name'])): ?>
                                    <a href="my-account.php">
                                        <?php echo htmlspecialchars($urow['name']); ?>
                                    </a>
                                <?php else: ?>
                                    <a href="login.php">My Account</a>
                                <?php endif; ?>
                            </li>
                        </ul>
                    </nav>
                    <!-- mobile menu end -->
                </div>
                <div class="mobile-header-info-wrap mobile-header-border">
                    <div class="single-mobile-header-info mt-30">
                        <a  href="contact.php"><i class="fi-rs-marker"></i>&nbsp;<?php echo $row['address']; ?></a>
                    </div>
                    <div class="single-mobile-header-info">
                        <a href="tel:<?php echo $row['phone']; ?>"><i class="fi-rs-smartphone"></i>&nbsp;<?php echo $row['phone']; ?></a>
                    </div>
                    <div class="single-mobile-header-info">
                        <a href="mailto:<?php echo $row['email']; ?>"><i class="fi-rs-envelope"></i>&nbsp;<?php echo $row['email']; ?></a>
                    </div>
                </div>
                <div class="mobile-social-icon">
                    <h5 class="mb-15">Follow Us</h5>
                    <a href=""><img src="admin/assets/upload/settings/google.png" alt=""></a>
                    <a href="https://www.facebook.com/share/1Jf6oxAB5f/"><img src="admin/assets/upload/settings/Facebook.png" alt=""></a>
                    <a href="https://www.instagram.com/sareeskp_official/"><img src="admin/assets/upload/settings/Instagram.png" alt=""></a>
                    <a href="https://wa.me/917358357740?text=Hi%20there!%20I%20would%20like%20to%20know%20more%20about%20your%20services."><img src="admin/assets/upload/settings/Whatsapp.png" alt=""></a>
                </div>
            </div>
        </div>
    </div>

<!-- Main Content start -->
    
    <main class="main">

        <!--=====================================
                    BANNER PART START
        =======================================-->

<section class="banner-slider">
  <div id="diwaliCarousel" class="carousel slide carousel-fade" data-bs-ride="carousel" data-bs-interval="3000">
    <div class="carousel-inner">
      <?php
      $bansql = "SELECT * FROM `banner` WHERE `du_id` = 1 AND `ban_status` = 1";
      $banquery = mysqli_query($conn, $bansql);
      $i = 0;

      while ($banrow = mysqli_fetch_array($banquery)) {
          $active = ($i == 0) ? 'active' : '';

          $desktop_img = htmlspecialchars($banrow['ban_image']);
          $mobile_img = htmlspecialchars($banrow['ban_image_mobile']);
      ?>
        <div class="carousel-item <?php echo $active; ?>">
          <!-- Desktop Image -->
          <img src="admin/<?php echo $desktop_img; ?>" 
               class="d-none d-md-block w-100 img-fluid" 
               alt="Banner <?php echo $i+1; ?>">

          <!-- Mobile Image -->
          <img src="admin/<?php echo $mobile_img; ?>" 
               class="d-block d-md-none w-100 img-fluid" 
               alt="Banner Mobile <?php echo $i+1; ?>">
        </div>
      <?php
          $i++;
      }
      ?>
    </div>

    <!-- Carousel Controls -->
    <button class="carousel-control-prev" type="button" data-bs-target="#diwaliCarousel" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>

    <button class="carousel-control-next" type="button" data-bs-target="#diwaliCarousel" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>

    <!-- Carousel Indicators -->
    <div class="carousel-indicators">
      <?php
      $banquery2 = mysqli_query($conn, $bansql);
      $j = 0;
      while ($banrow2 = mysqli_fetch_array($banquery2)) {
          $activeClass = ($j == 0) ? 'active' : '';
          echo '<button type="button" data-bs-target="#diwaliCarousel" data-bs-slide-to="'.$j.'" class="'.$activeClass.'" aria-label="Slide '.($j+1).'"></button>';
          $j++;
      }
      ?>
    </div>
  </div>
</section>

<!-- Bootstrap JS -->
<!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script> -->


        <!--=====================================
                    BANNER PART END
        =======================================-->

        <!-- =====================================
                Product Category Start
        ========================================== -->

        <section class="popular-categories section-padding mt-15 mb-25">
            <div class="container wow fadeIn animated">
                <h3 class="section-title mb-20"><span>Popular</span> Categories</h3>
                <div class="carausel-6-columns-cover position-relative">
                    <div class="slider-arrow slider-arrow-2 carausel-6-columns-arrow" id="carausel-6-columns-arrows"></div>
                    <div class="carausel-6-columns" id="carausel-6-columns">
                    <?php
                        $catsql = "SELECT * FROM `category` WHERE `du_id` = 1 AND `cstatus` = 1";
                        $catquery = mysqli_query($conn, $catsql);

                        while ($catrow = mysqli_fetch_array($catquery)) {
                            $catId = $catrow['cat_id'];

                            // Count items in this category
                            $countsql = "SELECT COUNT(*) AS item_count FROM `item` WHERE `du_id` = 1 AND `status` = 1 AND `category` = $catId";
                            $countquery = mysqli_query($conn, $countsql);
                            $countrow = mysqli_fetch_assoc($countquery);
                            $itemCount = $countrow['item_count'];
                    ?>
                        <div class="card-1">
                            <figure class=" img-hover-scale overflow-hidden">
                                <a href="sub-category.php?id=<?php echo $catId; ?>"><img src="admin/<?php echo $catrow['cimage']; ?>" alt=""></a>
                            </figure>
                            <h5><a href="sub-category.php?id=<?php echo $catId; ?>"><?php echo $catrow['cname'] ?></a></h5>
                        </div>
                    <?php } ?>
                    </div>
                </div>
            </div>
        </section>

        <!-- =====================================
                Product Category End
        ========================================== -->

        <!-- Promo banner 1 -->

        <section class="mb-50">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="banner-bg wow fadeIn animated" style="background-image: url('assets/imgs/banner/banner-8.jpg')">
                            <div class="banner-content">
                                <h5 class="text-grey-4 mb-15">Shop Today’s Deals</h5>
                                <h2 class="fw-600">Happy <span class="text-brand">Diwali Offer</span>. Big Sale Up to 20%</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Promo banner 1 -->

        <!-- ========================

            Products list start

        ============================= -->


        <section class="product-tabs section-padding position-relative wow fadeIn animated">
            <div class="bg-square"></div>
            <div class="container">
                <div class="tab-header">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <?php
                            // Define tab types
                            $tabTypes = [
                                1 => 'Featured',
                                2 => 'Popular',
                                3 => 'New Arrivals'
                            ];

                            $isFirst = true;
                            foreach ($tabTypes as $type => $label) {
                                ?>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link <?php if ($isFirst) echo 'active'; ?>" 
                                            id="nav-tab-<?php echo $type; ?>" 
                                            data-bs-toggle="tab" 
                                            data-bs-target="#tab-<?php echo $type; ?>" 
                                            type="button" role="tab" 
                                            aria-controls="tab-<?php echo $type; ?>" 
                                            aria-selected="<?php echo $isFirst ? 'true' : 'false'; ?>">
                                        <?php echo $label; ?>
                                    </button>
                                </li>
                                <?php
                                $isFirst = false;
                            }
                            ?>
                        </ul>
                    <a href="all-products.php?id=0" class="view-more d-none d-md-flex">View More<i class="fi-rs-angle-double-small-right"></i></a>
                </div>
                <!--End nav-tabs-->
                <div class="tab-content wow fadeIn animated" id="myTabContent">
                    <?php
                    $isFirstTab = true;
                    foreach ($tabTypes as $type => $label) {
                        ?>
                        <div class="tab-pane fade <?php if ($isFirstTab) echo 'show active'; ?>" 
                             id="tab-<?php echo $type; ?>" role="tabpanel" 
                             aria-labelledby="nav-tab-<?php echo $type; ?>">
                            <div class="row row-cols-2 row-cols-md-3 row-cols-lg-4 row-cols-xl-4">
                                <?php
                                // Fetch items for this type
                                $itemsql = "
    SELECT 
        i.item_id,
        i.name,
        i.type,
        i.description,
        i.status,
        i.category,
        c.cat_id,
        c.cname,
        iv.color,
        iv.size,
        iv.price,
        iv.discount_price,
        (
            SELECT image_path 
            FROM item_images 
            WHERE item_id = i.item_id 
            ORDER BY image_id ASC LIMIT 1
        ) AS image1,
        (
            SELECT image_path 
            FROM item_images 
            WHERE item_id = i.item_id 
            ORDER BY image_id ASC LIMIT 1,1
        ) AS image2
    FROM item i
    INNER JOIN category c ON c.cat_id = i.category AND c.cstatus = 1
    LEFT JOIN (
        SELECT item_id, color, size, price, discount_price
        FROM item_variants
        WHERE (item_id, variant_id) IN (
            SELECT item_id, MIN(variant_id)
            FROM item_variants
            GROUP BY item_id
        )
    ) iv ON iv.item_id = i.item_id
    WHERE i.du_id = 1 AND i.status = 1 AND i.type = $type
    GROUP BY i.item_id
";

                                $itemquery = mysqli_query($conn, $itemsql);
                                while ($itemrow = mysqli_fetch_array($itemquery)) {
                                    $fullName = $itemrow['name'];

                                    // Split the name into words
                                    $words = explode(' ', $fullName);

                                    // Show only the first 3 words initially
                                    $shortName = implode(' ', array_slice($words, 0, 3));

                                    // Check if there are more than 3 words
                                    $hasMore = count($words) > 3;
                                    ?>
                                    <div class="col">
                                        <div class="product-cart-wrap mb-30">
                                            <div class="product-img-action-wrap">
                                                <div class="product-img product-img-zoom">
                                                    <a href="product-details.php?id=<?php echo $itemrow['item_id']; ?>">
                                                        <img class="default-img" src="admin/<?php echo $itemrow['image1']; ?>" alt="">
                                                        <img class="hover-img" src="admin/<?php echo $itemrow['image2'] ?: $itemrow['image1']; ?>" alt="">
                                                    </a>
                                                </div>
                                                <!-- <div class="product-action-1">
                                                    <a aria-label="Quick view" class="action-btn hover-up" data-bs-toggle="modal" data-bs-target="#quickViewModal" onclick="loadProductModal(<?php echo $itemrow['item_id']; ?>)"><i class="fi-rs-eye"></i></a>
                                                </div> -->
                                                <div class="product-badges product-badges-position product-badges-mrg">
                                                    <span class="hot">Hot</span>
                                                </div>
                                            </div>
                                            <div class="product-content-wrap">
                                                <div class="product-category">
                                                    <a href="all-products.php?id=<?php echo $itemrow['cat_id']; ?>"><?php echo htmlspecialchars($itemrow['cname']); ?></a>
                                                </div>
                                                
                                                <h2>
                                                    <a href="product-details.php?id=<?php echo $itemrow['item_id']; ?>">
                                                        <span class="short-name"><?php echo htmlspecialchars($shortName); ?></span>
                                                        <?php if ($hasMore): ?>
                                                            <span class="full-name" style="display:none;"><?php echo htmlspecialchars($fullName); ?></span>
                                                        <?php endif; ?>
                                                    </a>

                                                    <?php if ($hasMore): ?>
                                                        <a href="javascript:void(0);" style="font-size: 15px;" class="text-brand" onclick="toggleName(this)"> -Read more</a>
                                                    <?php endif; ?>
                                                </h2>
                                                
                                                <div class="rating-result" title="90%">
                                                    <span><span>90%</span></span>
                                                </div>
                                                <div class="product-price">
                                                    <span>₹ <?php echo $itemrow['price']; ?></span>
                                                    <span class="old-price">₹ <?php echo $itemrow['discount_price']; ?></span>
                                                </div>
                                                <div class="product-action-1 show">
                                                    <a aria-label="Add To Cart" class="action-btn hover-up" href="product-details.php?id=<?php echo $itemrow['item_id']; ?>"><i class="fi-rs-shopping-bag-add"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php
                                } // end while
                                ?>
                            </div>
                        </div>
                        <?php
                        $isFirstTab = false;
                    } // end foreach
                    ?>
                </div>
                <!--End tab-content-->
            </div>
        </section>

        <!-- ========================

            Products list end

        ============================= -->


        <!-- ========================

          Promo three banners start

        ============================= -->
        
        <section class="banners mb-15">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-md-6">
                        <div class="banner-img wow fadeIn animated">
                            <img src="assets/imgs/banner/Churidar.jpg" alt="">
                            <div class="banner-text">
                                <span>Smart Offer</span>
                                <h4>Save 20% on <br>Woman dresses</h4>
                                <a href="all-products.php?id=0">Shop Now <i class="fi-rs-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="banner-img wow fadeIn animated">
                            <img src="assets/imgs/banner/Saree.jpg" alt="">
                            <div class="banner-text">
                                <span>Sale off</span>
                                <h4>Great Summer <br>Collection</h4>
                                <a href="all-products.php?id=0">Shop Now <i class="fi-rs-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 d-md-none d-lg-flex">
                        <div class="banner-img wow fadeIn animated  mb-sm-0">
                            <img src="assets/imgs/banner/banner-3.png" alt="">
                            <div class="banner-text">
                                <span>New Arrivals</span>
                                <h4>Shop Today’s <br>Deals & Offers</h4>
                                <a href="all-products.php?id=0">Shop Now <i class="fi-rs-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- ========================

          Promo three banners end

        ============================= -->


        <!-- =====================================
                New Arrival Product Start
        ========================================== -->


        <section class="section-padding">
            <div class="container wow fadeIn animated">
                <h3 class="section-title mb-20"><span>New</span> Arrivals</h3>
                <div class="carausel-6-columns-cover position-relative">
                    <div class="slider-arrow slider-arrow-2 carausel-6-columns-arrow" id="carausel-6-columns-2-arrows"></div>
                    <div class="carausel-6-columns carausel-arrow-center" id="carausel-6-columns-2">
                        <?php
                                // Fetch items for this type
                                $itemsql1 = "
    SELECT 
        i.item_id,
        i.name,
        i.type,
        i.description,
        i.status,
        i.category,
        c.cat_id,
        c.cname,
        iv.color,
        iv.size,
        iv.price,
        iv.discount_price,
        (
            SELECT image_path 
            FROM item_images 
            WHERE item_id = i.item_id 
            ORDER BY image_id ASC LIMIT 1
        ) AS image1,
        (
            SELECT image_path 
            FROM item_images 
            WHERE item_id = i.item_id 
            ORDER BY image_id ASC LIMIT 1,1
        ) AS image2
    FROM item i
    LEFT JOIN category c ON c.cat_id = i.category
    LEFT JOIN (
        SELECT item_id, color, size, price, discount_price
        FROM item_variants
        WHERE (item_id, variant_id) IN (
            SELECT item_id, MIN(variant_id)
            FROM item_variants
            GROUP BY item_id
        )
    ) iv ON iv.item_id = i.item_id
    WHERE i.du_id = 1 AND i.status = 1 AND i.type = 3
    GROUP BY i.item_id
";

                                $itemquery1 = mysqli_query($conn, $itemsql1);
                                while ($itemrow1 = mysqli_fetch_array($itemquery1)) {
                                    ?>
                        <div class="product-cart-wrap small hover-up">
                            <div class="product-img-action-wrap">
                                <div class="product-img product-img-zoom">
                                    <a href="product-details.php?id=<?php echo $itemrow1['item_id']; ?>">
                                        <img class="default-img" src="admin/<?php echo $itemrow1['image1']; ?>" alt="">
                                        <img class="hover-img" src="admin/<?php echo $itemrow1['image2']; ?>" alt="">
                                    </a>
                                </div>
                                <div class="product-action-1">
                                    <!-- <a aria-label="Quick view" class="action-btn hover-up" data-bs-toggle="modal" data-bs-target="#quickViewModal" onclick="loadProductModal(<?php echo $itemrow1['item_id']; ?>)"><i class="fi-rs-eye"></i></a> -->
                                    <!-- <a aria-label="Add To Wishlist" class="action-btn small hover-up" href="#" tabindex="0"><i class="fi-rs-heart"></i></a>
                                    <a aria-label="Compare" class="action-btn small hover-up" href="#" tabindex="0"><i class="fi-rs-shuffle"></i></a> -->
                                </div>
                                <div class="product-badges product-badges-position product-badges-mrg">
                                    <span class="hot">Hot</span>
                                </div>
                            </div>
                            <div class="product-content-wrap">
                                <h2><a href="product-details.php?id=<?php echo $itemrow1['item_id']; ?>"><?php echo $itemrow1['name']; ?></a></h2>
                                <div class="rating-result" title="90%">
                                    <span>
                                    </span>
                                </div>
                                <div class="product-price">
                                    <span>₹ <?php echo $itemrow1['price']; ?></span>
                                    <span class="old-price">₹ <?php echo $itemrow1['discount_price']; ?></span>
                                </div>
                            </div>
                        </div>
                        <?php
                            } //while condition
                        ?>
                        <!--End product-cart-wrap-2-->
                    </div>
                </div>
            </div>
        </section>

        <!-- =====================================
                New Arrival Product End
        ========================================== -->


        <!-- Features start -->

        <section class="featured section-padding position-relative">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-3 mb-md-3 mb-lg-0">
                        <div class="banner-features wow fadeIn animated hover-up">
                            <img src="assets/imgs/theme/icons/feature-1.png" alt="">
                            <h4 class="bg-1">Fast Shipping</h4>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 mb-md-3 mb-lg-0">
                        <div class="banner-features wow fadeIn animated hover-up">
                            <img src="assets/imgs/theme/icons/feature-2.png" alt="">
                            <h4 class="bg-3">Online Order</h4>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 mb-md-3 mb-lg-0">
                        <div class="banner-features wow fadeIn animated hover-up">
                            <img src="assets/imgs/theme/icons/feature-3.png" alt="">
                            <h4 class="bg-2">Save Money</h4>
                        </div>
                    </div>
                    <!-- <div class="col-lg-2 col-md-4 mb-md-3 mb-lg-0">
                        <div class="banner-features wow fadeIn animated hover-up">
                            <img src="assets/imgs/theme/icons/feature-4.png" alt="">
                            <h4 class="bg-4">Promotions</h4>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-4 mb-md-3 mb-lg-0">
                        <div class="banner-features wow fadeIn animated hover-up">
                            <img src="assets/imgs/theme/icons/feature-5.png" alt="">
                            <h4 class="bg-5">Happy Sell</h4>
                        </div>
                    </div> -->
                    <div class="col-lg-3 col-md-3 mb-md-3 mb-lg-0">
                        <div class="banner-features wow fadeIn animated hover-up">
                            <img src="assets/imgs/theme/icons/feature-6.png" alt="">
                            <h4 class="bg-6">24/7 Support</h4>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Features end -->

</main>

    <footer class="main">
        <section class="p-30 text-white wow fadeIn animated" style="background-color: #f1e7e7;">
            <div class="container my-4">
                <div class="row">
                  
                  <!-- Box 1 -->
                  <div class="col-lg-3 col-md-6 mb-4">
                    <div class="d-flex align-items-start">
                      <div class="icon-circle me-3">
                        <i class="fi-rs-shopping-cart"></i>
                      </div>
                      <div>
                        <h5 class="fw-bold">Fast Delivery</h5>
                        <p class="mb-0 mt-2" style="color: darkgoldenrod;">
                          Get your order delivered fresh to your doorstep within 3-7 business days — fast, reliable, and hassle-free!
                        </p>
                      </div>
                    </div>
                  </div>

                  <!-- Box 2 -->
                  <div class="col-lg-3 col-md-6 mb-4">
                    <div class="d-flex align-items-start">
                      <div class="icon-circle me-3">
                        <i class="fi-rs-refresh"></i>
                      </div>
                      <div>
                        <h5 class="fw-bold">Quality Sarees</h5>
                        <p class="mb-0 mt-2" style="color: darkgoldenrod;">
                          Each saree is crafted with premium quality and care.
                        </p>
                      </div>
                    </div>
                  </div>

                  <!-- Box 3 -->
                  <div class="col-lg-3 col-md-6 mb-4">
                    <div class="d-flex align-items-start">
                      <div class="icon-circle me-3">
                        <i class="fi-rs-headphones"></i>
                      </div>
                      <div>
                        <h5 class="fw-bold">Quick Support System</h5>
                        <p class="mb-0 mt-2" style="color: darkgoldenrod;">
                          Our Instant Support Team is here to assist you 24/7 — quick responses, real solutions!
                        </p>
                      </div>
                    </div>
                  </div>

                  <!-- Box 4 -->
                  <div class="col-lg-3 col-md-6 mb-4">
                    <div class="d-flex align-items-start">
                      <div class="icon-circle me-3">
                        <i class="fi-rs-lock"></i>
                      </div>
                      <div>
                        <h5 class="fw-bold">Secure Payment Way</h5>
                        <p class="mb-0 mt-2" style="color: darkgoldenrod;">
                          Shop with Confidence — Secure Payment Guaranteed!
                        </p>
                      </div>
                    </div>
                  </div>

                </div>
              </div>
        </section>
        <section class="section-padding footer-mid">
            <div class="container pt-15 pb-20">
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <div class="widget-about font-md mb-md-5 mb-lg-0">
                            <div class="logo logo-width-1 wow fadeIn animated">
                                <a href="https://subakaaviyasilks.com/"><img src="admin/<?php echo $row['logo']; ?>" alt="logo"></a>
                            </div>
                            <h5 class="mt-20 mb-10 fw-600 text-dark-4 wow fadeIn animated" style="text-indent: 2em;">At Subakaaviya Silks, we bring together the richness of Indian tradition and the charm of modern design. From timeless sarees to graceful kurta sets, each piece is crafted with precision, care, and a touch of heritage. Our collections are designed to celebrate your elegance in every moment—whether it’s a festive occasion, a family gathering, or your everyday style.</h5>
                            
                            <h5 class="mb-10 mt-30 fw-600 wow fadeIn animated">Follow Us</h5>
                            <div class="mobile-social-icon wow fadeIn animated mb-sm-5 mb-md-0">
                                <a href=""><img src="admin/assets/upload/settings/google.png" alt=""></a>
                                <a href="https://www.facebook.com/share/1Jf6oxAB5f/"><img src="admin/assets/upload/settings/Facebook.png" alt=""></a>
                                <a href="https://www.instagram.com/sareeskp_official/"><img src="admin/assets/upload/settings/Instagram.png" alt=""></a>
                                <a href="https://wa.me/917358357740?text=Hi%20there!%20I%20would%20like%20to%20know%20more%20about%20your%20services."><img src="admin/assets/upload/settings/Whatsapp.png" alt=""></a>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-4">
                        <h5 class="widget-title wow fadeIn animated">Contact Us</h5>
                        <ul class="footer-list wow fadeIn animated mb-sm-5 mb-md-0">
                            <li><strong>Address: </strong><a href="#"><?php echo $row['address']; ?></a></li>
                            <li><strong>Email: </strong><a href="mailto:<?php echo $row['email']; ?>"><?php echo $row['email']; ?></a></li>
                            <li><strong>Phone: </strong><a href="tel:<?php echo $row['phone']; ?>"><?php echo $row['phone']; ?></a></li>
                        </ul>
                    </div>

                    <div class="col-lg-2 col-md-2">
                        <h5 class="widget-title wow fadeIn animated">Quick Links</h5>
                        <ul class="footer-list wow fadeIn animated mb-sm-5 mb-md-0">
                            <li><a href="privacy-policy.php">Privacy Policy</a></li>
                            <li><a href="return-policy.php">ReturnPolicy</a></li>
                            <li><a href="shipping-policy.php">ShippingPolicy</a></li>
                            <li><a href="terms.php">Terms &amp; Conditions</a></li>
                        </ul>
                    </div>

                    <!-- <div class="col-lg-2  col-md-3">
                        <h5 class="widget-title wow fadeIn animated">Useful Links</h5>
                        <ul class="footer-list wow fadeIn animated">
                            <li><a href="my-account.php">My Account</a></li>
                            <li><a href="about.php">About Us</a></li>
                            <li><a href="contact.php">Contact Us</a></li>
                            <li><a href="faq.php">Need Help</a></li>
                        </ul>
                    </div> -->

                </div>
            </div>
        </section>
        <div class="container pb-20 wow fadeIn animated">
            <div class="row">
                <div class="col-12 mb-20">
                    <div class="footer-bottom"></div>
                </div>
                <!-- Left -->
                <div class="col-lg-4 text-start">
                    <p class="font-sm text-muted mb-0">
                        &copy; 2025 <strong class="text-brand"><?php echo $row['title']; ?></strong> - All rights reserved
                    </p>
                </div>

                <!-- Center -->
                <div class="col-lg-4 text-center">
                    <p class="text-lg-end text-start font-sm text-muted mb-0">
                        Designed & Developed by <a href="https://www.haptrendmedia.com/" target="_blank"><strong class="text-brand">Haptrend Media</strong></a>.
                    </p>
                </div>

                <!-- Right -->
                <div class="col-lg-4 text-end">
                    <img class="wow fadeIn animated" src="assets/imgs/theme/payment-method.png" alt="">
                </div>
            </div>
        </div>
    </footer>
    <!-- Preloader Start -->
    <div id="preloader-active">
        <div class="preloader d-flex align-items-center justify-content-center">
            <div class="preloader-inner position-relative">
                <div class="text-center">
                    <h5 class="mb-10">Now Loading</h5>
                    <div class="loader">
                        <div class="bar bar1"></div>
                        <div class="bar bar2"></div>
                        <div class="bar bar3"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Vendor JS-->
    <script src="assets/js/vendor/modernizr-3.6.0.min.js"></script>
    <script src="assets/js/vendor/jquery-3.6.0.min.js"></script>
    <script src="assets/js/vendor/jquery-migrate-3.3.0.min.js"></script>
    <script src="assets/js/vendor/bootstrap.bundle.min.js"></script>
    <script src="assets/js/plugins/slick.js"></script>
    <script src="assets/js/plugins/jquery.syotimer.min.js"></script>
    <script src="assets/js/plugins/wow.js"></script>
    <script src="assets/js/plugins/jquery-ui.js"></script>
    <script src="assets/js/plugins/perfect-scrollbar.js"></script>
    <script src="assets/js/plugins/magnific-popup.js"></script>
    <script src="assets/js/plugins/select2.min.js"></script>
    <script src="assets/js/plugins/waypoints.js"></script>
    <script src="assets/js/plugins/counterup.js"></script>
    <script src="assets/js/plugins/jquery.countdown.min.js"></script>
    <script src="assets/js/plugins/images-loaded.js"></script>
    <script src="assets/js/plugins/isotope.js"></script>
    <script src="assets/js/plugins/scrollup.js"></script>
    <script src="assets/js/plugins/jquery.vticker-min.js"></script>
    <script src="assets/js/plugins/jquery.theia.sticky.js"></script>
    <script src="assets/js/plugins/jquery.elevatezoom.js"></script>
    <!-- Template  JS -->
    <script src="assets/js/maind134.js?v=3.4"></script>
    <script src="assets/js/shopd134.js?v=3.4"></script>


<script defer src="https://static.cloudflareinsights.com/beacon.min.js/vcd15cbe7772f49c399c6a5babf22c1241717689176015" integrity="sha512-ZpsOmlRQV6y907TI0dKBHq9Md29nnaEIPlkf84rnaERnq6zvWvPUqr2ft8M1aS28oN72PdrCzSjY4U6VaAw1EQ==" data-cf-beacon='{"version":"2024.11.0","token":"3aa9a3481f734e94bceb8bb1bd648ba1","r":1,"server_timing":{"name":{"cfCacheStatus":true,"cfEdge":true,"cfExtPri":true,"cfL4":true,"cfOrigin":true,"cfSpeedBrain":true},"location_startswith":null}}' crossorigin="anonymous"></script>


<script>

        // --- Remove Cart Item (delegated event for dynamic content) ---
    $(document).on('click', '.remove-cart-item', function (e) {
        e.preventDefault();
        let variantId = $(this).data('id');

        $.post('cart.php', { action: 'remove', variant_id: variantId }, function () {
            // Remove from DOM
            $('#row-' + variantId).remove();
            updateCartCount();
            loadCartDropdown();
            checkCartEmpty();
        });
    });

    // --- Load Mini Cart Dropdown ---
    function loadCartDropdown() {
        $.ajax({
            url: 'load_cart_dropdown.php',
            type: 'GET',
            success: function (html) {
                $('#cart-dropdown-container').html(html);
            }
        });
    }

    // --- Update Cart Count ---
    function updateCartCount() {
        $.post('cart.php', { action: 'count' }, function (count) {
            $('#cart-count').text(count);
            $('#cart-count-mobile').text(count);
        });
    }

    // --- Check Empty Cart ---
    function checkCartEmpty() {
        $.post('cart.php', { action: 'count' }, function (count) {
            if (parseInt(count) === 0) {
                $('#cart-dropdown-container').html('<p class="text-center">Your cart is empty!</p>');
            }
        });
    }

    // Initial load
    updateCartCount();
    loadCartDropdown();

    </script>

    <script>
        function toggleName(btn) {
            const short = btn.parentElement.querySelector('.short-name');
            const full = btn.parentElement.querySelector('.full-name');

            if (full.style.display === 'none') {
                full.style.display = 'inline';
                short.style.display = 'none';
                btn.innerHTML = ' <span style="color:#710f10; font-weight:600; font-size: 15px;"> -Show less</span>';
            } else {
                full.style.display = 'none';
                short.style.display = 'inline';
                btn.innerHTML = ' <span style="color:#710f10; font-weight:600; font-size: 15px;"> -Read more</span>';
            }
        }   
    </script>


<script>
  // Get end date from PHP
  var countDownDate = new Date("<?php echo $offerEnd; ?>").getTime();

  var x = setInterval(function () {
    var now = new Date().getTime();
    var distance = countDownDate - now;

    if (distance < 0) {
      clearInterval(x);
      document.getElementById("countdown").innerHTML = "<strong>Offer Expired!</strong>";
    } else {
      var days = Math.floor(distance / (1000 * 60 * 60 * 24));
      var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
      var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
      var seconds = Math.floor((distance % (1000 * 60)) / 1000);

      document.getElementById("days").innerHTML = days.toString().padStart(2, '0');
      document.getElementById("hours").innerHTML = hours.toString().padStart(2, '0');
      document.getElementById("minutes").innerHTML = minutes.toString().padStart(2, '0');
      document.getElementById("seconds").innerHTML = seconds.toString().padStart(2, '0');
    }
  }, 1000);
</script>

<!-- Small hover script -->
<script>
document.addEventListener("DOMContentLoaded", function() {
    const catItems = document.querySelectorAll(".main-categori-wrap .has-children");
    catItems.forEach(item => {
        item.addEventListener("mouseenter", () => {
            const menu = item.querySelector(".dropdown-menu");
            if (menu) menu.style.display = "block";
        });
        item.addEventListener("mouseleave", () => {
            const menu = item.querySelector(".dropdown-menu");
            if (menu) menu.style.display = "none";
        });
    });
});
</script>

<!-- Floating WhatsApp Button -->
<a href="https://wa.me/917358357740?text=Hi%20there!%20I%20would%20like%20to%20know%20more%20about%20your%20services." 
   target="_blank" 
   id="whatsapp-button" 
   title="Chat with us on WhatsApp">
    <img src="https://upload.wikimedia.org/wikipedia/commons/6/6b/WhatsApp.svg" alt="WhatsApp Chat">
</a>

</body>

</html>
