<?php
include dirname(__FILE__) . '/.private/config.php';
$page_id = 1;
include 'header.php';
?>

<!-- main-area -->
<main class="fix">
    <!-- slider-area -->

    <section class="slider__area position-relative container-fluid">
        <div class="row">
            <!-- Left Column -->
            <?php
            $sqlhome = "SELECT * from tbl_page where page_id=32";
            $resulthome = $cn->selectdb($sqlhome);
            if ($cn->numRows($resulthome) > 0) 
                {
                $rowhome = $cn->fetchAssoc($resulthome);
                $multi_img = explode(",", $rowhome['multi_images']);
            ?>
                <div class="col-lg-12 px-0 d-flex align-items-center justify-content-center">
                    <div class="row w-100 h-100 mx-0">
                        <!-- Background image with text overlay -->
                        <div class="col-12 d-flex align-items-center"
                            style="background: url('page/big_img/<?php echo $rowhome['image']; ?>') center center / cover no-repeat; min-height: 500px;">

                            <div class="col-lg-6">
                                <div class="relative-logo">
                                    <img src="pageF/big_img/<?php echo $multi_img[0]; ?>" alt="Voxbednbody">
                                </div>
                            </div> <!-- empty left side -->

                            <!-- Right side text -->
                            <div class="col-lg-6 bg-white bg-opacity-75 p-4">
                                <div class="text-black text-justify">
                                    <?php echo $rowhome['page_desc']; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            <?php } ?>

        </div>
    </section>

    <?php
    $extended_slider_query = $cn->selectdb("SELECT * FROM `tbl_addmore` WHERE page_id=33");
    if ($cn->numRows($extended_slider_query) > 0) {
        $i = 1;
    ?>
        <!-- slider-area-end -->
        <section class="py-5 bg-black text-white" style="">
            <div class="container">
                <div class="row text-center justify-content-center">
                    <?php while ($extended_slider = $cn->fetchAssoc($extended_slider_query)) { ?>
                        <?php if ($i % 2 != 0) { ?>
                            <!-- Box 1 -->
                            <div class="col-6 col-md-3 mb-4">
                                <div>
                                    <i class="fas <?php echo strip_tags($extended_slider['small_desc']); ?> fa-lg fa-2x d-none d-md-inline mb-2"></i>
                                    <i class="fas <?php echo strip_tags($extended_slider['small_desc']); ?> fa-sm d-inline d-md-none mb-1"></i>
                                    <p class="mb-0 text-white fs-6 d-none d-md-block"><?php echo $extended_slider['title']; ?></p>
                                    <p class="mb-0 text-white fs-7 d-block d-md-none" style="font-size: 0.8rem;"><?php echo $extended_slider['title']; ?></p>
                                </div>
                            </div>
                        <?php } else { ?>
                            <!-- Box 2 -->
                            <div class="col-6 col-md-3 mb-4">
                                <div>
                                    <i class="fas <?php echo strip_tags($extended_slider['small_desc']); ?> fa-lg fa-2x d-none d-md-inline mb-2"></i>
                                    <i class="fas <?php echo strip_tags($extended_slider['small_desc']); ?> fa-sm d-inline d-md-none mb-1"></i>
                                    <p class="mb-0 text-white fs-6 d-none d-md-block"><?php echo $extended_slider['title']; ?></p>
                                    <p class="mb-0 text-white fs-7 d-block d-md-none" style="font-size: 0.8rem;"><?php echo $extended_slider['title']; ?></p>
                                </div>
                            </div>
                        <?php } ?>
                    <?php } ?>
                </div>
            </div>
        </section>
    <?php } ?>

    <!-- Product Grid Section -->
    <section class="project__area mt-5 mb-5">
        <?php
        $sqlproduct = "SELECT * from tbl_page where page_id=15";
        $resultproduct = $cn->selectdb($sqlproduct);
        if ($cn->numRows($resultproduct) > 0) {
            $rowproduct = $cn->fetchAssoc($resultproduct);
        ?>
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <h2 class="title pb-2"><?php echo $rowproduct['page_name']; ?></h2>
                        <p class="mb-5"><?php echo strip_tags($rowproduct['page_desc']); ?></p>
                    </div>
                </div>
            </div>
        <?php } ?>

        <div class="container">
            <div class="row g-4">
                <?php
                $sqlcat = "SELECT * FROM tbl_category LIMIT 3"; // limit to 4 products
                $resultcat = $cn->selectdb($sqlcat);
                if ($cn->numRows($resultcat) > 0) {
                    while ($rowpr = $cn->fetchAssoc($resultcat)) {
                ?>
                        <div class="col-lg-4 col-md-6 col-sm-12 text-center">
                            <a href="Product-Detail/<?php echo $rowpr['slug']; ?>" class="d-block">
                                <img src="category/big_img/<?php echo $rowpr['cat_image'] ?>"
                                    alt="<?php echo $rowpr['cat_name']; ?>"
                                    class="img-fluid w-100 pb-4"
                                    style="height: 360px; object-fit: cover;">
                            </a>
                            <a href="Products/<?php echo $rowpr['slug']; ?>/"
                                class="px-4 py-2 text-uppercase btn video-btn border">
                                <?php echo $rowpr['cat_name']; ?>
                            </a>
                        </div>

                <?php }
                } ?>
            </div>
        </div>
    </section>

    <!-- work-area -->
    <?php
    $sqllet = "SELECT * from tbl_page where page_id=4";
    $resultlet = $cn->selectdb($sqllet);
    if ($cn->numRows($resultlet) > 0) {
        $rowlet = $cn->fetchAssoc($resultlet);
        // $Img = explode(',', $rowlet['multi_images']);
    ?>
        <!-- Features Section -->
        <section>
            <div class="container-fluid">
                <div class="row align-items-center" style="background-color:#f5f5f5;">

                    <!-- Left Side: Full Height Image -->
                    <div class="col-lg-6 p-0">
                        <img src="page/big_img/<?php echo $rowlet['image']; ?>" class="img-fluid w-100 h-100 object-fit-cover" alt="Features Image">
                    </div>

                    <!-- Right Side: Text Content Centered Horizontally & Vertically -->
                    <div class="col-lg-6 d-flex justify-content-center align-items-center px-5">
                        <div class="text-center">
                            <h2 class="mb-4 text-uppercase"><?php echo $rowlet['page_name']; ?></h2>

                            <?php echo strip_tags($rowlet['page_desc']); ?>

                            <div class="d-flex justify-content-center gap-3 mt-4">
                                <a href="Contact/" class="btn home-btn border">SHOP NOW</a>
                                <a href="Contact/" class="btn home-btn border">COMPARE TOPPER</a>

                            </div>

                        </div>

                    </div>
                </div>
        </section>
    <?php } ?>

    <?php
    $next_generation_query = $cn->selectdb("SELECT * FROM `tbl_page` WHERE page_id=34");
    if ($cn->numRows($next_generation_query) > 0) {
        $next_generation = $cn->fetchAssoc($next_generation_query);
    ?>
        <!-- Best-selling Futons & Toppers Section (Dynamic from tbl_service1) -->
        <section class="container-fluid py-5">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <h2 class="title pb-2 text-uppercase"><?php echo $next_generation['page_name']; ?><br /> </h2>
                        <p class="mb-4"><?php echo strip_tags($next_generation['page_desc']); ?></p>
                    </div>
                </div>
                <div class="row g-4">
                    <?php
                    $targetCatId = 1; // Your desired category ID
                    // $sqlcat = "SELECT * FROM tbl_service1 WHERE FIND_IN_SET($targetCatId, cat_id) LIMIT 2";
                    $sqlcat = "SELECT a1.*, (SELECT a2.extra_icon FROM tbl_addmore a2 WHERE a2.title = a1.title AND a2.addmore_id <> a1.addmore_id ORDER BY a2.addmore_id ASC LIMIT 1) AS hover_icon FROM tbl_addmore a1 WHERE a1.page_id = 34 GROUP BY a1.title ORDER BY a1.addmore_id;";
                    $resultcat = $cn->selectdb($sqlcat);
                    $previousTitle = "";
                    $previousImg = "";
                    if ($cn->numRows($resultcat) > 0) {
                        while ($rowpr = $cn->fetchAssoc($resultcat)) {
                            if ($rowpr["title"] = $rowpr["title"]) {
                                $mainImg  = $rowpr['extra_icon'];
                                // hover image only from a2.extra_icon (if available)
                                $hoverImg = !empty($rowpr['hover_icon']) ? $rowpr['hover_icon'] : $mainImg;
                            }
                            if ($previousTitle == $rowpr['title'] && $previousImg != "") {
                                $hoverImg = $previousImg; // use previous row's image as hover
                            }
                            $previousTitle = $rowpr['title'];
                            $previousImg = $mainImg;
                    ?>
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <div class="position-relative overflow-hidden">
                                    <!-- Image Container -->
                                    <div class="position-relative w-100 image-wrapper" style="aspect-ratio: 4/3;">
                                        <!-- Main Image -->
                                        <img src="icon/big_img/<?php echo $mainImg; ?>"
                                            class="img-fluid w-100 h-100 object-fit-cover main-img"
                                            alt="<?php echo $rowpr['title']; ?>">

                                        <!-- Hover Image -->
                                        <img src="icon/big_img/<?php echo $hoverImg; ?>"
                                            class="img-fluid w-100 h-100 position-absolute top-0 start-0 object-fit-cover hover-img"
                                            alt="<?php echo $rowpr['title']; ?> Hover">

                                        <!-- Plus Icon (shown on hover) -->
                                        <div class="plus-icon">+</div>
                                    </div>

                                    <!-- Service Title -->
                                    <div class="text-center text-uppercase small mt-3">
                                        <a href="Product-Detail/<?php echo strip_tags($rowpr['small_desc']); ?>" class="text-dark text-decoration-none fw-bold">
                                            <?php echo $rowpr['title']; ?>
                                        </a>
                                    </div>

                                    <!-- Description -->
                                    <div class="text-center text-uppercase small mt-1">
                                        <span><?php echo strip_tags($rowpr['extra_desc']); ?></span>
                                    </div>
                                </div>
                            </div>
                    <?php
                        }
                    }
                    ?>
                </div>
            </div>
        </section>
    <?php } ?>

    <!-- Best-selling Futons & Toppers Section (Dynamic from tbl_service1) -->
    <section class="container-fluid py-3">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2 class="title pb-4 text-uppercase">Vox Mattress Collection</h2>
                </div>
            </div>

            <div class="row g-4">
                <?php
                $targetCatId = 2; // Your desired category ID
                $sqlcat = "SELECT * FROM `tbl_page` where page_parent_id=25";
                $resultcat = $cn->selectdb($sqlcat);

                if ($cn->numRows($resultcat) > 0) {
                    while ($rowpr = $cn->fetchAssoc($resultcat)) {
                        $multiImgs = explode(",", $rowpr['multi_images']);
                        $mainImg = isset($multiImgs[0]) ? $multiImgs[0] : '';
                        $hoverImg = isset($multiImgs[1]) ? $multiImgs[1] : $mainImg;
                ?>
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="position-relative overflow-hidden">
                                <!-- Image Container -->
                                <div class="position-relative w-100 image-wrapper" style="aspect-ratio: 4/3;">
                                    <!-- Main Image -->
                                    <img src="page/big_img/<?php echo $rowpr['image']; ?>"
                                        class="img-fluid w-100 h-100 object-fit-cover main-img"
                                        alt="<?php echo $rowpr['page_name']; ?>">

                                    <!-- Hover Image -->
                                    <img src="pageF/big_img/<?php echo $mainImg; ?>"
                                        class="img-fluid w-100 h-100 position-absolute top-0 start-0 object-fit-cover hover-img"
                                        alt="<?php echo $rowpr['page_name']; ?> Hover">

                                    <!-- Plus Icon (shown on hover) -->
                                    <div class="plus-icon">+</div>
                                </div>

                                <!-- Service Title -->
                                <div class="text-center text-uppercase small mt-3">
                                    <a href="Product-Detail/<?php echo $rowpr['slug']; ?>" class="text-dark text-decoration-none fw-bold">
                                        <?php echo $rowpr['page_name']; ?>
                                    </a>
                                </div>

                                <!-- Description -->
                                <div class="text-center text-uppercase small mt-1">
                                    <span><?php echo strip_tags(substr($rowpr['page_desc'], 0, 120)); ?>...</span>
                                </div>
                            </div>
                        </div>
                <?php
                    }
                }
                ?>
            </div>
        </div>
    </section>


    <?php
    $testimonial_image_query = $cn->selectdb("SELECT * FROM `tbl_page` WHERE page_id=24");
    if ($cn->numRows($testimonial_image_query) > 0) {
        $testimonial_image = $cn->fetchAssoc($testimonial_image_query);
    ?>
        <!-- testimonial-area -->
        <section class="testimonial-area">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <h2 class="title pb-4 text-uppercase">Review on Editions</h2>
                    </div>
                </div>


                <!-- one -->
                <div class="row align-items-center justify-content-center">
                    <?php
                    $testimonial_query = $cn->selectdb("SELECT * FROM `tbl_testimonial` WHERE `meta_tag_description` = 'Relax Natural Latex Mattresses'");
                    if ($cn->numRows($testimonial_query) > 0) {
                    ?>

                        <div class="col-lg-6 order-0">
                            <div class="swiper-container testimonial-active">
                                <div class="swiper-wrapper">
                                    <?php while ($testimonial = $cn->fetchAssoc($testimonial_query)) { ?>
                                        <div class="swiper-slide">
                                            <div class="testimonial-item">
                                                <div class="testimonial-info">
                                                    <h4 class="title"><?php echo $testimonial['image_title']; ?></h4>
                                                    <span><?php echo $testimonial['meta_tag_title']; ?></span>
                                                </div>
                                                <div class="testimonial__rating">
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star" style="color:#ffb930;"></i>
                                                </div>
                                                <div class="testimonial-content">
                                                    <p>“ <?php echo strip_tags($testimonial['description']); ?>”</p>
                                                    <!--<div class="icon"><i class="fas fa-quote-right"></i></div>-->
                                                </div>
                                            </div>
                                        </div>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    <?php } ?>

                    <?php
                    $sqlcoun = "SELECT * FROM tbl_page where page_id = 35";
                    $resultcoun = $cn->selectdb($sqlcoun);
                    if ($cn->numRows($resultcoun) > 0) {
                        while ($rowcoun = $cn->fetchAssoc($resultcoun)) {
                    ?>
                            <div class="col-lg-6 col-md-8">
                                <div class="testimonial-img-wrap">
                                    <img src="page/big_img/<?php echo $rowcoun['image']; ?>" alt="Testimonial" />
                                </div>
                            </div>
                    <?php }
                    } ?>
                </div>


                <!-- two -->
                <div class="row align-items-center justify-content-center mt-4">
                    <?php
                    $testimonial_query = $cn->selectdb("SELECT * FROM `tbl_testimonial` WHERE `meta_tag_description` = 'Ultima Memory Foam Mattress'");
                    if ($cn->numRows($testimonial_query) > 0) {
                    ?>

                        <div class="col-lg-6 order-2">
                            <div class="swiper-container testimonial-active">
                                <div class="swiper-wrapper">
                                    <?php while ($testimonial = $cn->fetchAssoc($testimonial_query)) { ?>
                                        <div class="swiper-slide">
                                            <div class="testimonial-item">
                                                <div class="testimonial-info">
                                                    <h4 class="title"><?php echo $testimonial['image_title']; ?></h4>
                                                    <span><?php echo $testimonial['meta_tag_title']; ?></span>
                                                </div>
                                                <div class="testimonial__rating">
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star" style="color:#ffb930;"></i>
                                                </div>
                                                <div class="testimonial-content">
                                                    <p>“ <?php echo strip_tags($testimonial['description']); ?>”</p>
                                                    <!--<div class="icon"><i class="fas fa-quote-right"></i></div>-->
                                                </div>
                                            </div>
                                        </div>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                    <?php
                    $sqlcoun = "SELECT * FROM tbl_page where page_id = 36";
                    $resultcoun = $cn->selectdb($sqlcoun);
                    if ($cn->numRows($resultcoun) > 0) {
                        while ($rowcoun = $cn->fetchAssoc($resultcoun)) {
                    ?>
                            <div class="col-lg-6 col-md-8">
                                <div class="testimonial-img-wrap">
                                    <img src="page/big_img/<?php echo $rowcoun['image']; ?>" alt="Testimonial" />
                                </div>
                            </div>
                    <?php }
                    } ?>
                </div>

                <!-- three -->

                <div class="row align-items-center justify-content-center mt-4">
                    <?php
                    $testimonial_query = $cn->selectdb("SELECT * FROM `tbl_testimonial` WHERE `meta_tag_description` = 'Twin Air Fiber Mattress'");
                    if ($cn->numRows($testimonial_query) > 0) {
                    ?>

                        <div class="col-lg-6 order-0">
                            <div class="swiper-container testimonial-active">
                                <div class="swiper-wrapper">
                                    <?php while ($testimonial = $cn->fetchAssoc($testimonial_query)) { ?>
                                        <div class="swiper-slide">
                                            <div class="testimonial-item">
                                                <div class="testimonial-info">
                                                    <h4 class="title"><?php echo $testimonial['image_title']; ?></h4>
                                                    <span><?php echo $testimonial['meta_tag_title']; ?></span>
                                                </div>
                                                <div class="testimonial__rating">
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star" style="color:#ffb930;"></i>
                                                </div>
                                                <div class="testimonial-content">
                                                    <p>“ <?php echo strip_tags($testimonial['description']); ?>”</p>
                                                    <!--<div class="icon"><i class="fas fa-quote-right"></i></div>-->
                                                </div>
                                            </div>
                                        </div>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                    <?php
                    $sqlcoun = "SELECT * FROM tbl_page where page_id = 37";
                    $resultcoun = $cn->selectdb($sqlcoun);
                    if ($cn->numRows($resultcoun) > 0) {
                        while ($rowcoun = $cn->fetchAssoc($resultcoun)) {
                    ?>
                            <div class="col-lg-6 col-md-8">
                                <div class="testimonial-img-wrap">
                                    <img src="page/big_img/<?php echo $rowcoun['image']; ?>" alt="Testimonial" />
                                </div>
                            </div>
                    <?php }
                    } ?>
                </div>



                <!-- four -->
                <div class="row align-items-center justify-content-center mt-4 mb-4">
                    <?php
                    $sqlcoun = "SELECT * FROM tbl_page where page_id = 38";
                    $resultcoun = $cn->selectdb($sqlcoun);
                    if ($cn->numRows($resultcoun) > 0) {
                        while ($rowcoun = $cn->fetchAssoc($resultcoun)) {
                    ?>
                            <div class="col-lg-6 col-md-8">
                                <div class="testimonial-img-wrap">
                                    <img src="page/big_img/<?php echo $rowcoun['image']; ?>" alt="Testimonial" />
                                </div>
                            </div>
                    <?php }
                    } ?>
                    <?php
                    $testimonial_query = $cn->selectdb("SELECT * FROM `tbl_testimonial` WHERE `meta_tag_description` = 'Air topper'");
                    if ($cn->numRows($testimonial_query) > 0) {
                    ?>
                        <div class="col-lg-6 order-0">
                            <div class="swiper-container testimonial-active">
                                <div class="swiper-wrapper">
                                    <?php while ($testimonial = $cn->fetchAssoc($testimonial_query)) { ?>
                                        <div class="swiper-slide">
                                            <div class="testimonial-item">
                                                <div class="testimonial-info">
                                                    <h4 class="title"><?php echo $testimonial['image_title']; ?></h4>
                                                    <span><?php echo $testimonial['meta_tag_title']; ?></span>
                                                </div>
                                                <div class="testimonial__rating">
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star" style="color:#ffb930;"></i>
                                                </div>
                                                <div class="testimonial-content">
                                                    <p>“ <?php echo strip_tags($testimonial['description']); ?>”</p>
                                                    <!--<div class="icon"><i class="fas fa-quote-right"></i></div>-->
                                                </div>
                                            </div>
                                        </div>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>

                      <!-- five -->
                 <div class="row align-items-center justify-content-center mt-4">
                    <?php
                    $testimonial_query = $cn->selectdb("SELECT * FROM `tbl_testimonial` WHERE `meta_tag_description` = 'Latex Firm cushion'");
                    if ($cn->numRows($testimonial_query) > 0) {
                    ?>

                        <div class="col-lg-6 order-0">
                            <div class="swiper-container testimonial-active">
                                <div class="swiper-wrapper">
                                    <?php while ($testimonial = $cn->fetchAssoc($testimonial_query)) { ?>
                                        <div class="swiper-slide">
                                            <div class="testimonial-item">
                                                <div class="testimonial-info">
                                                    <h4 class="title"><?php echo $testimonial['image_title']; ?></h4>
                                                    <span><?php echo $testimonial['meta_tag_title']; ?></span>
                                                </div>
                                                <div class="testimonial__rating">
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star" style="color:#ffb930;"></i>
                                                </div>
                                                <div class="testimonial-content">
                                                    <p>“ <?php echo strip_tags($testimonial['description']); ?>”</p>
                                                    <!--<div class="icon"><i class="fas fa-quote-right"></i></div>-->
                                                </div>
                                            </div>
                                        </div>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                    <?php
                    $sqlcoun = "SELECT * FROM tbl_page where page_id = 39";
                    $resultcoun = $cn->selectdb($sqlcoun);
                    if ($cn->numRows($resultcoun) > 0) {
                        while ($rowcoun = $cn->fetchAssoc($resultcoun)) {
                    ?>
                            <div class="col-lg-6 col-md-8">
                                <div class="testimonial-img-wrap">
                                    <img src="page/big_img/<?php echo $rowcoun['image']; ?>" alt="Testimonial" />
                                </div>
                            </div>
                    <?php }
                    } ?>
                </div>

                   <!-- six -->
                <div class="row align-items-center justify-content-center mt-4 mb-4">
                    <?php
                    $sqlcoun = "SELECT * FROM tbl_page where page_id = 40";
                    $resultcoun = $cn->selectdb($sqlcoun);
                    if ($cn->numRows($resultcoun) > 0) {
                        while ($rowcoun = $cn->fetchAssoc($resultcoun)) {
                    ?>
                            <div class="col-lg-6 col-md-8">
                                <div class="testimonial-img-wrap">
                                    <img src="page/big_img/<?php echo $rowcoun['image']; ?>" alt="Testimonial" />
                                </div>
                            </div>
                    <?php }
                    } ?>
                    <?php
                    $testimonial_query = $cn->selectdb("SELECT * FROM `tbl_testimonial` WHERE `meta_tag_description` = 'Regular Latex Cushion'");
                    if ($cn->numRows($testimonial_query) > 0) {
                    ?>
                        <div class="col-lg-6 order-0">
                            <div class="swiper-container testimonial-active">
                                <div class="swiper-wrapper">
                                    <?php while ($testimonial = $cn->fetchAssoc($testimonial_query)) { ?>
                                        <div class="swiper-slide">
                                            <div class="testimonial-item">
                                                <div class="testimonial-info">
                                                    <h4 class="title"><?php echo $testimonial['image_title']; ?></h4>
                                                    <span><?php echo $testimonial['meta_tag_title']; ?></span>
                                                </div>
                                                <div class="testimonial__rating">
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star" style="color:#ffb930;"></i>
                                                </div>
                                                <div class="testimonial-content">
                                                    <p>“ <?php echo strip_tags($testimonial['description']); ?>”</p>
                                                    <!--<div class="icon"><i class="fas fa-quote-right"></i></div>-->
                                                </div>
                                            </div>
                                        </div>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>

                      <!-- seven -->
                 <div class="row align-items-center justify-content-center mt-4">
                    <?php
                    $testimonial_query = $cn->selectdb("SELECT * FROM `tbl_testimonial` WHERE `meta_tag_description` = 'Memory Foam Pillow'");
                    if ($cn->numRows($testimonial_query) > 0) {
                    ?>

                        <div class="col-lg-6 order-0">
                            <div class="swiper-container testimonial-active">
                                <div class="swiper-wrapper">
                                    <?php while ($testimonial = $cn->fetchAssoc($testimonial_query)) { ?>
                                        <div class="swiper-slide">
                                            <div class="testimonial-item">
                                                <div class="testimonial-info">
                                                    <h4 class="title"><?php echo $testimonial['image_title']; ?></h4>
                                                    <span><?php echo $testimonial['meta_tag_title']; ?></span>
                                                </div>
                                                <div class="testimonial__rating">
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star" style="color:#ffb930;"></i>
                                                </div>
                                                <div class="testimonial-content">
                                                    <p>“ <?php echo strip_tags($testimonial['description']); ?>”</p>
                                                    <!--<div class="icon"><i class="fas fa-quote-right"></i></div>-->
                                                </div>
                                            </div>
                                        </div>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                    <?php
                    $sqlcoun = "SELECT * FROM tbl_page where page_id = 41";
                    $resultcoun = $cn->selectdb($sqlcoun);
                    if ($cn->numRows($resultcoun) > 0) {
                        while ($rowcoun = $cn->fetchAssoc($resultcoun)) {
                    ?>
                            <div class="col-lg-6 col-md-8">
                                <div class="testimonial-img-wrap">
                                    <img src="page/big_img/<?php echo $rowcoun['image']; ?>" alt="Testimonial" />
                                </div>
                            </div>
                    <?php }
                    } ?>
                </div>


            </div>
        </section>
        <!-- testimonial-area-end -->
    <?php } ?>

</main>
<!-- main-area-end -->

<?php include 'footer.php' ?>
<style>
    .slider__area {
        height: 500px;
    }

    .relative-logo img {
        position: relative;
        height: 110px;
        top: -140px;
        left: 315px;
    }

    @media screen and (max-width:414px) {
        .relative-logo img {
            display: none;
        }
    }

    .hover-img {
        opacity: 0;
        transition: opacity 0.4s ease-in-out;
        pointer-events: none;
    }

    .position-relative:hover .hover-img {
        opacity: 1;
    }

    .image-wrapper {
        position: relative;
        overflow: hidden;
    }

    .hover-img {
        opacity: 0;
        transition: opacity 0.5s ease-in-out;
        z-index: 2;
    }

    .image-wrapper:hover .hover-img {
        opacity: 1;
        animation: flicker 0.4s ease-in-out;
    }

    /* Plus icon hidden by default */
    .plus-icon {
        position: absolute;
        bottom: 10px;
        right: 10px;
        /* changed from left to right */
        background: #fff;
        color: #000;
        font-size: 20px;
        font-weight: bold;
        width: 30px;
        height: 30px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 4px;
        z-index: 3;
        box-shadow: 0 1px 4px rgba(0, 0, 0, 0.2);
        opacity: 0;
        /* hidden initially */
        transition: opacity 0.3s ease;
    }

    /* Show on hover */
    .image-wrapper:hover .plus-icon {
        opacity: 1;
    }

    /* Flicker animation */
    @keyframes flicker {
        0% {
            opacity: 0.2;
        }

        25% {
            opacity: 0.6;
        }

        50% {
            opacity: 0.3;
        }

        75% {
            opacity: 0.8;
        }

        100% {
            opacity: 1;
        }
    }


    .collection-card {
        border-radius: 16px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        padding: 2rem;
        background-color: #fff;
        margin: 2rem 0;
    }

    .logo-img {
        max-width: 100px;
        height: auto;
    }

    .highlight {
        font-size: 1.8rem;
        font-weight: 600;
    }


    .newsletter-section {
        background-color: #f4f4f4;
        padding: 3rem 1rem;
        text-align: center;
    }

    .newsletter-section h2 {
        font-weight: 600;
        letter-spacing: 2px;
        font-size: 1.8rem;
    }

    .newsletter-section p {
        margin: 1rem 0 2rem;
        color: #333;
    }

    .newsletter-form input[type="email"] {
        max-width: 300px;
        width: 100%;
        height: 50px;
        border: 1px solid #ccc;
        border-radius: 0;
    }

    .newsletter-form button {
        height: 50px;
        border-radius: 25px;
        padding: 0 30px;
        background-color: #000;
        color: #fff;
        border: none;
    }

    @media (max-width: 576px) {
        .newsletter-form {
            flex-direction: column;
            gap: 1rem;
        }

        .newsletter-form button {
            width: 100%;
        }
    }
    
    .text-justify p{
        text-align:justify;
    }
    
    @media screen and (max-width: 414px) {
      .order-0 {
        order: 2 !important;
      }
      .testimonial-img-wrap {
        margin-top: 50px;
        margin-bottom: 20px;
      }
}
</style>
<script>
    // Custom fade carousel without sliding
    const carouselElement = document.getElementById('testimonialCarousel');
    const carousel = new bootstrap.Carousel(carouselElement, {
        interval: 2000,
        wrap: true,
        pause: 'false'
    });

    // Override default slide behavior with fade
    carouselElement.addEventListener('slide.bs.carousel', function(e) {
        const activeItem = carouselElement.querySelector('.carousel-item.active');
        const nextItem = e.relatedTarget;

        // Add custom fade out class to current item
        activeItem.style.transition = 'opacity 0.8s ease-in-out, transform 0.8s ease-in-out';
        activeItem.style.opacity = '0';
        activeItem.style.transform = 'scale(0.95)';

        // Prepare next item for fade in
        nextItem.style.transition = 'opacity 0.8s ease-in-out, transform 0.8s ease-in-out';
        nextItem.style.opacity = '0';
        nextItem.style.transform = 'scale(0.95)';

        setTimeout(() => {
            nextItem.style.opacity = '1';
            nextItem.style.transform = 'scale(1)';
        }, 100);
    });

    // Add subtle animation to text content
    const observerOptions = {
        threshold: 0.1,
        rootMargin: '0px 0px -50px 0px'
    };

    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.style.animation = 'fadeInUp 1s ease-out';
            }
        });
    }, observerOptions);

    document.querySelectorAll('.testimonial-content').forEach(el => {
        observer.observe(el);
    });

    // Add fade in animation keyframes
    const style = document.createElement('style');
    style.textContent = `
            @keyframes fadeInUp {
                from {
                    opacity: 0;
                    transform: translateY(30px);
                }
                to {
                    opacity: 1;
                    transform: translateY(0);
                }
            }
        `;
    document.head.appendChild(style);
</script>
<script>
    var testimonialSwiper = new Swiper(".testimonial-active", {
        loop: true,
        autoplay: {
            delay: 300000,
            disableOnInteraction: false,
        },
        pagination: {
            el: ".swiper-pagination",
            clickable: true,
        },
        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
        },
        slidesPerView: 1,
        spaceBetween: 30,
        speed: 800,
    });
</script>
