<?php
include dirname(__FILE__) . '/.private/config.php';
include "database/config.php"; // Include the database connection file

// Define success message
$successMsg = '';

// Check if the form is submitted
if (isset($_POST["submit"])) {
    // Retrieve form data
    $name = $_POST["name"];
    $email = $_POST["email"];
    $message = $_POST["message"];

    // Validate and sanitize the data
    $name = htmlspecialchars($name);
    $email = filter_var($email, FILTER_SANITIZE_EMAIL);
    $message = htmlspecialchars($message);

    // Check if all fields are filled
    if (empty($name) || empty($email) || empty($message)) {
        $errorMsg = "Please fill in all the fields.";
    } else {
        // Insert the data into the database
        $query = "INSERT INTO contact(CustomerName, CustomerEmail, Comment) VALUES (?, ?, ?)";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("sss", $name, $email, $message);

        if ($stmt->execute()) {
            $successMsg = "Message sent successfully.";
        } else {
            $errorMsg = "Error occurred while sending the message. Please try again.";
        }

        $stmt->close();
    }
}

// Prevent displaying empty alert on refresh
if ($_SERVER["REQUEST_METHOD"] !== "POST" && empty($successMsg) && empty($errorMsg)) {
    $successMsg = '';
    $errorMsg = '';
}



 include "head.php";?>
	<body>
   <div id="videoModal" class="modal fade" role="dialog" style="z-index:99999999999;"> 
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title"></h4>
                </div>
                <div class="modal-body">
    <div class="embed-responsive embed-responsive-16by9">
  
                  
                        <iframe class="embed-responsive-item" src="video/videoplayback.mp4" frameborder="0" allowfullscreen></iframe>

    </div>
</div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

<script>
  $(document).ready(function(){
            $('#videoModal').modal('show');
        });
</script>


<!-- Display success message -->
<?php if (!empty($successMsg)) { ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <?php echo $successMsg; ?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
<?php } ?>

<!-- Display error message -->
<?php if (!empty($errorMsg)) { ?>
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <?php echo $errorMsg; ?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
<?php } ?>
	<?php include "nav.php"; ?>


<!-- Main Banner Start Here -->
<div class="main-banner banner_up">
    <div id="rev_slider_34_1_wrapper" class="rev_slider_wrapper" data-alias="news-gallery34">
        <!-- START REVOLUTION SLIDER 5.0.7 fullwidth mode -->
        <div id="rev_slider_34_1" class="rev_slider" data-version="5.0.7">
            <ul>
                <!-- SLIDE -->
                <li data-index="rs-129">
                    <!-- MAIN IMAGE -->
                    <img src="./images/IMG_3099-min.JPG" alt="" class="rev-slidebg" />
                    <!-- LAYERS -->
                    <!-- LAYER NR. 2 -->
                    <div class="tp-caption Newspaper-Title tp-resizeme mt-5" id="slide-129-layer-1"
                        data-x="['left','left','left','left']" data-hoffset="['100','50','50','30']"
                        data-y="['top','top','top','center']" data-voffset="['165','135','105','0']"
                        data-fontsize="['50','50','50','30']" data-lineheight="['55','55','55','35']"
                        data-width="['600','600','600','420']" data-height="none" data-whitespace="normal"
                        data-transform_idle="o:1;"
                        data-transform_in="y:[-100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;s:1500;e:Power3.easeInOut;"
                        data-transform_out="auto:auto;s:1000;e:Power3.easeInOut;" data-mask_in="x:0px;y:0px;s:inherit;e:inherit;"
                        data-mask_out="x:0;y:0;s:inherit;e:inherit;" data-start="1000" data-splitin="none"
                        data-splitout="none" data-responsive_offset="on">
                        <div class="banner-text">
                            <h2>STAGE <span>DECORATION</span></h2>
                            <h5>
                                Wedding stage decoration sets the tone and theme for the entire wedding celebration. It aims
                                to create a visually captivating space that reflects the couple's style, preferences, and the
                                overall ambiance they desire for their special day.
                            </h5>
                            <a class="btn-text mt-3" href="barat">Gallery</a>
                        </div>
                    </div>
                </li>
                <!-- SLIDE -->
                <li data-index="rs-130" data-title="" data-description="">
                    <!-- MAIN IMAGE -->
                    <img src="./images/slider3.jpg" loading="lazy" alt="" class="rev-slidebg" />
                    <!-- LAYERS -->
                    <!-- LAYER NR. 2 -->
                    <div class="tp-caption Newspaper-Title tp-resizeme mt-5" id="slide-130-layer-1"
                        data-x="['left','left','left','left']" data-hoffset="['100','50','50','30']"
                        data-y="['top','top','top','center']" data-voffset="['165','135','105','0']"
                        data-fontsize="['50','50','50','30']" data-lineheight="['55','55','55','35']"
                        data-width="['600','600','600','420']" data-height="none" data-whitespace="normal"
                        data-transform_idle="o:1;"
                        data-transform_in="y:[-100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;s:1500;e:Power3.easeInOut;"
                        data-transform_out="auto:auto;s:1000;e:Power3.easeInOut;" data-mask_in="x:0px;y:0px;s:inherit;e:inherit;"
                        data-mask_out="x:0;y:0;s:inherit;e:inherit;" data-start="1000" data-splitin="none"
                        data-splitout="none" data-responsive_offset="on">
                        <div class="banner-text">
                            <h2>DELICIOUS <span>RECIPES</span></h2>
                            <h5>
                                Delicious recipes encompass a wide range of culinary creations that are known for their flavors,
                                appeal, and enjoyment. These recipes are carefully crafted to incorporate a combination of
                                ingredients, cooking techniques, and seasonings to create dishes that are both satisfying and
                                memorable.
                            </h5>
                            <a class="btn-text mt-3" href="menu.php">Menu</a>
                        </div>
                    </div>
                </li>
            </ul>
            <div class="tp-bannertimer tp-bottom"></div>
        </div>
    </div>
</div>
<!-- Main Banner End Here -->
<!-- Main Banner End Here -->
<section class="ptb-40 bottom-section" id="download_pdf">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12">
                <div class="contact_block-text center-respons text-center fw-bold text-white">
                    <div class="fade-in-up">
                        <h1>Nafees Marquee and Hall</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
	
	

		<!-- about-comp -->
		<div id="choose" class="padding ptb-xs-40">
    <div class="container">
        <div class="row text-center">
            <div class="col-sm-12 mb-20">
                <div class="fade-in-left">
                    <h2>Welcome to Nafees <br>Marquee & Hall</h2>
                    <span class="b-line fade-in-left"></span>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 col-lg-6 mt-sm-30 mt-xs-30">
                <div class="text-content">
                    <h4 class="fade-in-left">Quality and Performance from a family-owned company.</h4>
                    <p class="fade-in-left">
                        We are a tight-knit family-run company who prides ourselves on employee retention and creating an enjoyable work environment. Nafees believes this is the best way to achieve results and keep our clients happy.
                    </p>
                </div>
                <div class="poins fade-in-left">
                    <ul>
                        <li>
                            <i class="fa fa-suitcase" aria-hidden="true"></i><span>EXPERT &amp; PROFESSIONAL</span>
                        </li>
                        <li>
                            <i class="fa fa-university" aria-hidden="true"></i><span>HIGH QUALITY WORK</span>
                        </li>
                        <li>
                            <i class="fa fa-hand-peace-o" aria-hidden="true"></i><span>SATISFACTION GUARANTEE</span>
                        </li>
                        <li>
                            <i class="fa fa-paper-plane" aria-hidden="true"></i><span>QUICK IN RESPONSE</span>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-md-6 col-lg-6">
                <img src="./images/slider3.jpg" alt="" style="margin-top: -140px;" class="about  pr-4 fade-in-right" />
            </div>
        </div>
    </div>
</div>

		<!-- about-comp -->

		<div id="services" class="padding bg-lighter">
  <div class="container pb-30 pb-sm-0">
    <div class="row pb-30 text-center">
      <div class="col-sm-12 mb-20">
        <div class="fade-in-up">
          <h2 class="text-center"><span>Our </span>Services</h2>
          <span class="b-line-2-center"></span>
        </div>
      </div>
    </div>
    <div class="section-content text-center">
      <div class="row mt-30">
        <div class="col-sm-4">
          <div class="fade-in-left">
            <div class="ico-box ico-box-new p-40 mb-sm-50 bg-white">
              <a class="ico ico-top ico-gray ico-circled ico-border-effect effect-circled" href="#">
                <img src="./images/s1.png" loading="lazy" alt="construction" />
              </a>
              <h5 class="ico-box-title pb-2">Wedding Events</h5>
              <p class="text-gray">Our wedding events service specializes in planning and managing every aspect of a couple's special day, from venue selection and vendor coordination to décor and entertainment. We work closely with our clients to bring their vision to life, creating a seamless and unforgettable wedding experience for the happy couple and their guests.</p>
            </div>
          </div>
        </div>
        <div class="col-sm-4">
          <div class="fade-in-up">
            <div class="ico-box ico-box-new p-40 mb-sm-50 bg-white">
              <a class="ico ico-top ico-gray ico-circled ico-border-effect effect-circled" href="#">
                <img src="./images/s2.png" loading="lazy" alt="construction" />
              </a>
              <h5 class="ico-box-title">Corporate Events</h5>
              <p class="text-gray pb-5">Our corporate events service provides comprehensive event planning and management for companies and organizations. From product launches and conferences to team building activities and company retreats, we offer tailored solutions to meet the unique needs of each client and ensure a successful event.</p>
            </div>
          </div>
        </div>
        <div class="col-sm-4">
          <div class="fade-in-right">
            <div class="ico-box ico-box-new p-40 mb-sm-50 bg-white">
              <a class="ico ico-top ico-gray ico-circled ico-border-effect effect-circled" href="#">
                <img src="./images/s3.png"loading="lazy" alt="" />
              </a>
              <h5 class="icon-box-title">Special Events</h5>
              <p class="text-gray">Our special events service is designed for individuals and organizations hosting celebrations or events that require a touch of creativity and customization. From birthday parties and baby showers to product launches and gala dinners, we offer bespoke event planning and management services that cater to the unique needs and preferences of our clients.</p>
            </div>
          </div>
        </div>
      </div>
      <div class="row mt-30">
        <div class="col-sm-4">
          <div class="fade-in-left">
            <div class="ico-box ico-box-new p-40 mb-sm-50 bg-white">
              <a class="ico ico-top ico-gray ico-circled ico-border-effect effect-circled" href="#">
                <img src="./images/s4.png"  loading="lazy" alt="" />
              </a>
              <h5 class="ico-box-title">Food Cuisine</h5>
              <p class="text-gray">Our food cuisine service offers a wide range of culinary options to suit every taste and preference. We specialize in creating menus that reflect the client's vision and theme, whether it's a formal dinner or a casual cocktail party. Our team works with top-rated chefs and caterers to provide an exceptional dining experience, including options for specialized diets and allergies.</p>
            </div>
          </div>
        </div>
        <div class="col-sm-4">
          <div class="fade-in-up">
            <div class="ico-box ico-box-new p-40 mb-sm-50 bg-white">
              <a class="ico ico-top ico-gray ico-circled ico-border-effect effect-circled" href="#">
                <img src="./images/s5.png" loading="lazy" alt="" />
              </a>
              <h5 class="ico-box-title">Social Events</h5>
              <p class="text-gray">Our social events service is tailored for those hosting intimate gatherings and parties, such as anniversaries, engagements, and private dinners. We take care of all the details, from selecting the perfect venue and coordinating with vendors to designing the theme and ambiance of the event. Our team ensures that the event runs smoothly, allowing our clients to relax and enjoy their time with friends and loved ones.</p>
            </div>
          </div>
        </div>
        <div class="col-sm-4">
          <div class="fade-in-right">
            <div class="ico-box ico-box-new p-40 mb-sm-50 bg-white">
              <a class="ico ico-top ico-gray ico-circled ico-border-effect effect-circled" href="#">
                <img src="./images/s6.png" loading="lazy" alt="" />
              </a>
              <h5 class="ico-box-title">Private Parties</h5>
              <p class="text-gray">Our private parties service is dedicated to planning and managing events that are exclusive and personalized, such as cocktail parties, dinner parties, and holiday gatherings. We work with our clients to create a unique and intimate experience that reflects their taste and preferences. From selecting the perfect menu and drinks to setting up the décor and ambiance, our team ensures that every detail is taken care of.</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="bg-image-oo">
    <div class="row">
        <div class="col-sm-12">
            <h3 class="fade-in-up text-center text-white">Unleash the Ultimate Celebration Experience with Flawless Execution and Impeccable Attention to Detail!</h3>
            <hr style="border-color: white;" class="w-100 fade-in-up">
            <p class="fade-in-up">Nafees Marquee: Elevating Your Celebrations to Extraordinary Heights. We are a premier event planning and execution service, specializing in exquisite wedding services, personalized celebrations, luxurious Lexus transport, captivating photo and film services, skilled makeup artists, and professional female waitstaff for women-only events.
            </p>
            <p class="fade-in-up">Our commitment to excellence shines through as we go beyond expectations to create unforgettable experiences. From weddings and engagement parties to corporate events and product launches, our dedicated team of experienced event planners and staff flawlessly bring your vision to life. Trust us to deliver impeccable attention to detail and exceptional service that sets your event apart.</p>
        </div>
    </div>
</div>


	
<div id="" class="projct_profyl">
    <div class="container">
        <div class="row pb-30 text-center">
            <div class="col-sm-12 mb-20 mt-5 pt-3">
                <div class="fade-in-up">
                    <h2 class="text-center"><span>Project </span>Profiles</h2>
                    <span class="b-line-2-center"></span>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12 col-lg-6 mb-30">
                <div class="img-scale about-block gray-bg hover-bg d-flex align-items-center flex-column flex-sm-row">
                    <div class="fl half-width">
                        <img class="img-" src="./images/p1.jpg" loading="lazy" alt="Photo" />
                    </div>
                    <div class="text-box padding-20 d-flex flex-column half-width">
                        <div class="box-title">
                            <h3 class="mt-0">Conference & Meetings</a></h3>
                        </div>
                        <div>
                            <p>
                                Our Conference & Meeting service ensures successful business events. We offer venue selection, catering, and logistics management for smooth and professional execution.
                            </p>
                           
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-lg-6 mb-30">
                <div class="img-scale about-block gray-bg hover-bg d-flex align-items-center flex-column flex-sm-row">
                    <div class="fl float-right-sm half-width">
                        <img class="img-" src="./images/p2.jpg" loading="lazy" alt="Photo" />
                    </div>
                    <div class="text-box padding-20 d-flex flex-column half-width">
                        <div class="box-title">
                            <h3 class="mt-0">School Welfare Parties</a></h3>
                        </div>
                        <div>
                            <p>
                                We collaborate with schools and PTAs to plan parties promoting student well-being. Our services include entertainment and healthy food options for positive experiences.
                            </p>
                           
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-lg-6 mb-30">
                <div class="img-scale about-block gray-bg hover-bg d-flex align-items-center flex-column flex-sm-row">
                    <div class="fr float-left-sm half-width">
                        <img class="img-" src="./images/p3.jpg" loading="lazy" alt="Photo" />
                    </div>
                    <div class="text-box padding-20 d-flex flex-column half-width">
                        <div class="box-title">
                            <h3 class="mt-0">Product Launching</a></h3>
                        </div>
                        <div>
                            <p>
                                Our experienced team guarantees memorable and impactful product launches, generating buzz and setting the stage for success. We create engaging events that leave a lasting impression.
                            </p>
                           
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-lg-6">
                <div class="img-scale about-block gray-bg hover-bg d-flex align-items-center flex-column flex-sm-row">
                    <div class="fr half-width">
                        <img class="img-" src="./images/p4.jpg" loading="lazy" alt="Photo" />
                    </div>
                    <div class="text-box padding-20 d-flex flex-column half-width">
                        <div class="box-title">
                            <h3 class="mt-0">Seasonal Parties</a></h3>
                        </div>
                        <div>
                            <p>
                                Whether it's an intimate gathering or a large-scale celebration, our team handles every aspect of party planning, including decor, entertainment, and customized menus, ensuring a memorable event.
                            </p>
                           
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12 col-lg-6 mb-30">
                <div class="img-scale about-block gray-bg hover-bg d-flex align-items-center flex-column flex-sm-row">
                    <div class="fl half-width">
                        <img class="img-" src="./images/p5.jpg" loading="lazy" alt="Photo" />
                    </div>
                    <div class="text-box padding-20 d-flex flex-column half-width">
                        <div class="box-title">
                            <h3 class="mt-0">Thematic Cuisine</a></h3>
                        </div>
                        <div>
                            <p>
                                Our expert chefs and event planners collaborate to create a personalized dining experience, ensuring that every aspect complements your theme.
                            </p>
                           
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-lg-6 mb-30">
                <div class="img-scale about-block gray-bg hover-bg d-flex align-items-center flex-column flex-sm-row">
                    <div class="fl float-right-sm half-width">
                        <img class="img-" src="./images/p6.jpg" loading="lazy" alt="Photo" />
                    </div>
                    <div class="text-box padding-20 d-flex flex-column half-width">
                        <div class="box-title">
                            <h3 class="mt-0">Birthday Parties</a></h3>
                        </div>
                        <div>
                            <p>
                                Our event planners work with you to create an unforgettable birthday party, from venue selection to customized decor and menus.
                            </p>
                           
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-lg-6 mb-30">
                <div class="img-scale about-block gray-bg hover-bg d-flex align-items-center flex-column flex-sm-row">
                    <div class="fr float-left-sm half-width">
                        <img class="img-" src="./images/p7.jpg" loading="lazy" alt="Photo" />
                    </div>
                    <div class="text-box padding-20 d-flex flex-column half-width">
                        <div class="box-title">
                            <h3 class="mt-0">Anniversary Celebration</a></h3>
                        </div>
                        <div>
                            <p>
                                Our event planning solutions include venue selection, customized decor, entertainment, and catering to create a unique and memorable anniversary celebration.
                            </p>
                           
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-lg-6">
                <div class="img-scale about-block gray-bg hover-bg d-flex align-items-center flex-column flex-sm-row">
                    <div class="fr half-width">
                        <img class="img-" src="./images/p8.jpg" loading="lazy" alt="Photo" />
                    </div>
                    <div class="text-box padding-20 d-flex flex-column half-width">
                        <div class="box-title">
                            <h3 class="mt-0">Photo & Film</a></h3>
                        </div>
                        <div>
                            <p>
                                We offer photography and videography services for events such as weddings, corporate events, and product launches, as well as for personal projects such as family portraits and documentaries.
                            </p>
                           
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row justify-content-center ">
            <div class="col-sm-12 col-lg-6 mb-30">
                <div class="img-scale about-block gray-bg hover-bg d-flex align-items-center flex-column flex-sm-row">
                    <div class="fl half-width">
                        <img class="img-" src="./images/p9.jpg" loading="lazy" alt="Photo" />
                    </div>
                    <div class="text-box padding-20 d-flex flex-column half-width">
                        <div class="box-title">
                            <h3 class="mt-0">Luxurious Cars</a></h3>
                        </div>
                        <div>
                            <p>
                                Whether it's for your wedding, corporate events, or special occasions, our Lexus Transportation service guarantees stylish and comfortable transportation experiences.
                            </p>
                           
                        </div>
                    </div>
                </div>
            </div>
			<div class="col-sm-12 col-lg-6 mb-30">
                <div class="img-scale about-block gray-bg hover-bg d-flex align-items-center flex-column flex-sm-row">
                    <div class="fl half-width">
                        <img class="img-" src="./images/catering.jpg" loading="lazy" alt="Photo" />
                    </div>
                    <div class="text-box padding-20 d-flex flex-column half-width">
                        <div class="box-title">
                            <h3 class="mt-0">Catering Services</a></h3>
                        </div>
                        <div>
                            <p>
							Indulge in delectable cuisine and impeccable service. Our catering expertise extends beyond our premises, delivering unforgettable dining experiences at any location you desire.
                            </p>
                           
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<section class="ptb-40 bottom-section" id="download_pdf">
    <div class="container">
        <div class="row">
            <div class="col-md-9 col-sm-12">
                <div class="contact_block-text center-respons">
                    <p class="fade-in-left">
                        Create Unforgettable Moments with Us
                    </p>
                </div>
            </div>
            <div class="col-md-3 d-flex align-items-center">
                <a href="book.php" class="btn btn-styl fade-in-right">Book Now</a>
            </div>
        </div>
    </div>
</section>

		
<div class="contact-container">
    <div class="contact-form">
        <h2>Contact Us</h2>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
    <div class="form-group">
        <label for="name">Name:</label>
        <input type="text" class="form-control " style="background-color: white ;" id="name" name="name" required>
    </div>
    <div class="form-group">
        <label for="email">Email:</label>
        <input type="email" class="form-control" id="email" name="email" required>
    </div>
    <div class="form-group">
        <label for="message">Message:</label>
        <textarea class="form-control" id="message" name="message" rows="4" required></textarea>
    </div>
    <button type="submit" name="submit" class="btn btn-primary">Submit</button>
</form>
    </div>
</div>

<div class="fade-in-up">
    <h2 class="text-center mt-5 pt-5 pb-3">Client Reviews</h2>
    <span class="b-line-2-center mb-3 mt-2"></span>
</div>
<div class="container-fluid pl-5">
    <div class="row mt-5">
        <div class="col-sm-4">
        <iframe width="90%" height="315" src="https://www.youtube.com/embed/b6xSdrcWHLg" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
        </div>
        <div class="col-sm-4">
        <iframe width="90%" height="315" src="https://www.youtube.com/embed/vcwGwwcN0mU" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
        </div>
        <div class="col-sm-4">
        <iframe width="90%" height="315" src="https://www.youtube.com/embed/tpWVyNRNeM8" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
        </div>
    </div>
</div>
<center>
    <a class="btn-text mt-5 fade-in-up" href="feedback.php">Give Review</a>
</center>
</div>
</div>
<div class="container mt-5 pt-3">
    <div class="row my-5">
        <div class="col-sm">
            <img src="images/catering.jpg" loading="lazy" class="img- fade-in-left">
        </div>
        <div class="col-sm pl-5 mt-4">
            <h2 class="fade-in-right">Unleash a Memorable Catering Experience</h2>
            <div class="b-line-2 mt-3 fade-in-right"></div>
            <p class="mt-5 fade-in-right">
                At Nafees Marquee, we believe that food is an art form that brings people together, creating unforgettable moments. We are committed to delivering impeccable service and meticulous attention to detail, ensuring an extraordinary catering experience.

                Our culinary passion drives us to source the finest, freshest ingredients, enabling our team of skilled chefs to craft innovative and delectable menus. Whether it's an intimate gathering or a grand affair, we offer a bespoke approach, customizing every aspect to match our clients' preferences and dietary requirements. Every detail is carefully curated, guaranteeing an exceptional and personalized culinary journey.
            </p>
            <div class="poins fade-in-right">
                <ul>
                    <li>
                        <i class="fa fa-suitcase" aria-hidden="true"></i><span>EXPERT &amp; PROFESSIONAL</span>
                    </li>
                    <li>
                        <i class="fa fa-university" aria-hidden="true"></i><span>HIGH QUALITY WORK</span>
                    </li>
                    <li>
                        <i class="fa fa-hand-peace-o" aria-hidden="true"></i><span>SATISFACTION GUARANTEE</span>
                    </li>
                    <li>
                        <i class="fa fa-paper-plane" aria-hidden="true"></i><span>QUICK IN RESPONSE</span>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>

<div class="fade-in-up">
    <h2 class="text-center mt-5 pt-5 pb-3">Our Gallery</h2>
    <span class="b-line-2-center mb-3 mt-2"></span>
</div>
<div class="container-fluid">
    <div class="row mt-5">
        <div class="col-sm-4">
            <img src="images/215 (3)-min.JPG" class="">
        </div>
        <div class="col-sm-4">
            <img src="images/250 (3)-min.JPG" class="">
        </div>
        <div class="col-sm-4">
            <img src="images/IMG_3131-min.JPG" class="">
        </div>
    </div>
</div>
<center>
    <a class="btn-text mt-5 fade-in-up mb-5" href="barat">View More</a>
</center>
</div>
</div>
	

	


<?php include "footer.php" ; ?> 


 
		<script type="text/javascript" src="./js/jquery.min.js"></script>
		<script type="text/javascript" src="./js/tether.min.js"></script>
		<script type="text/javascript" src="./js/bootstrap.min.js"></script>
		
		<!-- Easing Effect Js -->
		<script src="./js/jquery.easing.js" type="text/javascript"></script>

		<!-- revolution Js -->
		<script type="text/javascript" src="./js/jquery.themepunch.tools.min.js"></script>
		<script type="text/javascript" src="./js/jquery.themepunch.revolution.min.js"></script>
		<script type="text/javascript" src="./js/revolution.extension.slideanims.min.js"></script>
		<script type="text/javascript" src="./js/revolution.extension.layeranimation.min.js"></script>
		<script type="text/javascript" src="./js/revolution.extension.navigation.min.js"></script>
		<script type="text/javascript" src="./js/revolution.extension.parallax.min.js"></script>
		<script type="text/javascript" src="./js/jquery.revolution.js"></script>
	
<!-- custom Js -->
		<script src="./js/custom.js" type="text/javascript"></script>
		<script src="./js/animation.js" type="text/javascript"></script>
	</body>
</html>
