<?php
include dirname(__FILE__) . '/.private/config.php';
include "head.php";
include "./modal.php"; 
include "navbar.php";

?>

        <!-- Carousel Start -->
        <div class="carousel">
     
                <div class="owl-carousel">
                    <div class="carousel-item">
                        <div class="carousel-img">
                            <img src="img/whatsapp/IMG-20240807-WA0012.jpg" alt="Image">
                        </div>
                        <div class="carousel-text">
                            <h3>Premium tyres
                       </h3>
                            <h1>Premium Tyres for Ultimate Performance</h1>
                            <p>
                                Experience top-tier driving with our range of high-quality premium tyres, designed for exceptional durability and safety on the road
                            </p>
                            <a class="btn btn-custom" href="">Explore More</a>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="carousel-img">
                            <img src="img/whatsapp/IMG-20240807-WA0009.jpg" alt="Image">
                        </div>
                        <div class="carousel-text">
                            <h3>Wheel Balancing</h3>
                            <h1>Precision Wheel Balancing Services</h1>
                            <p>
                                Ensure a smooth and safe ride with our expert wheel balancing, reducing wear and enhancing vehicle performance
                            </p>
                            <a class="btn btn-custom" href="">Explore More</a>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="carousel-img">
                            <img src="img/homepage/slide-3.jpg" alt="Image">
                        </div>
                        <div class="carousel-text">
                            <h3> MOT </h3>
                            <h1>Comprehensive MOT Services</h1>
                            <p>
                                Keep your vehicle roadworthy with our thorough MOT inspections, ensuring safety and compliance with UK regulations
                            </p>
                            <a class="btn btn-custom" href="">Explore More</a>
                        </div>
                    </div>
                </div>
                
            </div>
   
        <!-- Carousel End -->
        
        <div class="container mt-5">
            <div class="row">
                <div class="col-md-6 d-flex align-items-center section-header" >
                    <h2 class="mb-0">Find the Perfect Car Tyres for Your Vehicle</h2>
                </div>
                <div class="col-md-6">
                    <label for="" class=""><b>Search by car REG</b></label>
                    <form class="d-flex mb-3" id="carRegForm">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1">UK</span>
                            </div>
                   

                            <input type="text" id="carRegInput" class="form-control" placeholder="Enter Car Reg." aria-label="Car Reg" aria-describedby="basic-addon1">
        <div class="input-group-append">
            <button class="btn btn-danger" type="button" id="goButton">GO</button>
        </div>
                        </div>
                    </form>
                    <label for=""><b>Search by tyre size</b></label>
                    <form class="mb-3" method="GET" action="products.php">
   
                <div class="row w-100">
                    <div class="col-md-3 mb-2">
                    <label for="">Width</label>
                    <select name="width" class="form-control form-control-sm">
                            <option value="135">135</option>
                            <option value="145">145</option>
                            <option value="155">155</option>
                            <option value="165">165</option>
                            <option value="175">175</option>
                            <option value="185">185</option>
                            <option value="195">195</option>
                            <option value="205" selected="">205</option>
                            <option value="215">215</option>
                            <option value="225">225</option>
                            <option value="235">235</option>
                            <option value="245">245</option>
                            <option value="255">255</option>
                            <option value="265">265</option>
                            <option value="275">275</option>
                            <option value="285">285</option>
                            <option value="295">295</option>
                            <option value="305">305</option>
                            <option value="315">315</option>
                            <option value="325">325</option>
                            <option value="335">335</option>
                            <option value="345">345</option>
                            <option value="355">355</option>
                        </select>
                    </div>
                    <div class="col-md-3 mb-2">
                    <label for="">Profile</label>
                    <select name="profile" class="form-control form-control-sm">

                            <option value="25">25</option>
                            <option value="30">30</option>
                            <option value="35">35</option>
                            <option value="40">40</option>
                            <option value="45">45</option>
                            <option value="50">50</option>
                            <option value="55" selected="">55</option>
                            <option value="60">60</option>
                            <option value="65">65</option>
                            <option value="70">70</option>
                            <option value="75">75</option>
                            <option value="80">80</option>
                            <option value="85">85</option>
                        </select>
                    </div>
                    <div class="col-md-3 mb-2">
                    <label for="">Rim size</label>
                    <select name="rimSize" class="form-control  form-control-sm">
                            <option value="12">12</option>
                            <option value="13">13</option>
                            <option value="14">14</option>
                            <option value="15">15</option>
                            <option value="16" selected="">16</option>
                            <option value="17">17</option>
                            <option value="18">18</option>
                            <option value="19">19</option>
                            <option value="20">20</option>
                            <option value="21">21</option>
                            <option value="22">22</option>
                            <option value="23">23</option>
                            <option value="24">24</option>
                        </select>
                    </div>
                    <div class="col-md-3 mb-2">
                    <label for="">Speed</label>
                    <select name="speed" class="form-control form-control-sm">
                     
                            <option value="">Any</option>
                            <option value="C">C</option>
                            <option value="G">G</option>
                            <option value="H">H</option>
                            <option value="Q">Q</option>
                            <option value="R">R</option>
                            <option value="S">S</option>
                            <option value="T">T</option>
                            <option value="V">V</option>
                            <option value="W">W</option>
                            <option value="X">X</option>
                            <option value="Y">Y</option>
                            <option value="Z">Z</option>
                            <option value="ZR">ZR</option>
                        </select>
                    </div>
                </div>
                <div class="input-group-append w-100 mt-2">
                <button class="btn btn-danger btn-sm" type="submit">Search</button>
                </div>
            </div>
        </form>
                    <div class="text-center">
            
                    </div>
                </div>
            </div>
        </div>
    
        <!-- About Start -->
        <div class="about">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6">
                        <div class="about-img">
                            <img src="img/whatsapp/IMG-20240807-WA0015.jpg" alt="Image">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="section-header text-left">
                            <p>About Us</p>
                            <h2>Tyre and Auto Service Centre</h2>
                        </div>
                        <div class="about-content">
                            <p>
                             Welcome to our Tyre and Auto Service Centre! We are dedicated to providing top-quality services to keep your vehicle running smoothly and safely. Our team of experienced professionals offers a wide range of services, including premium, budget, and partworn tyres, wheel balancing, alignment, MOT inspections, brakes, batteries, and exhaust repairs.
                                <br><br>
                                At our shop, customer satisfaction is our top priority. We use the latest technology and techniques to ensure your vehicle receives the best care possible. Whether you need new tyres, a routine MOT check, or expert repairs, we are here to help.
                                <br><br>
                                Visit us for reliable and friendly service you can trust. Your safety and comfort on the road are our mission.
                            </p>
                            <ul>
                                <li><i class="far fa-check-circle"></i>tyres</li>
                                <li><i class="far fa-check-circle"></i>MOT</li>
                                <li><i class="far fa-check-circle"></i>Wheel balancing 
                                </li>
                                <li><i class="far fa-check-circle"></i>Alignment 
                                </li>
                                <li><i class="far fa-check-circle"></i>Brakes & betteries 

                                </li>
                                <li><i class="far fa-check-circle"></i>Exhaust
                                </li>
                            </ul>
                            <a class="btn btn-custom" href="">Learn More</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- About End -->


        <!-- Service Start -->
        <div class="service">
            <div class="container">
                <div class="section-header text-center">
                    <p>What We Do?</p>
                    <h2>Premium Services</h2>
                </div>
                <div class="row">
                    <div class="col-lg-3 col-md-6">
                        <div class="service-item">
                            <i class="fi fi-rr-tire"></i>
                            <h3>Premium tyres
                            </h3>
                            <p>High-quality tyres for exceptional durability and superior performance on the road.</p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="service-item">
                            <i class="fi fi-rr-tire"></i>
                            <h3>Budget tyres 
                            </h3>
                            <p>Affordable tyres that offer reliable performance and value for your money.</p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="service-item">
                            <i class="fi fi-rr-tire"></i>
                            <h3>Partworn 
                            </h3>
                            <p>Pre-owned tyres that are inspected and certified for safe and budget-friendly driving</p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="service-item">
                            <img src="img/homepage/icons8-balance-50.png" width="30%">
                            <h3 class="mt-4">Wheel balancing</h3>
                            <p>Ensures smooth driving and reduces tyre wear by evenly distributing wheel weight.</p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="service-item">
                            <img src="img/homepage/icons8-align-50.png" width="30%">
                            <h3 class="mt-4">Alignment 
                            </h3>
                            <p>Adjusts your vehicle's wheels to ensure even tyre wear and improve handling.</p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="service-item">
                            <i class="fi fi-rr-file-medical-alt"></i>
                            <h3>MOT
                            </h3>
                            <p>MOT inspections ensure your vehicle meets safety and environmental standards required by law.</p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="service-item">
                            <img src="img/homepage/icons8-car-battery-50.png" width="30%">
                            <h3 class="mt-4">Brakes &betteries 
                            </h3>
                            <p>Expert services for brakes and batteries to keep your vehicle safe and reliable on the road.</p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="service-item">
                            <img src="img/homepage/icons8-exhaust-pipe-50.png" width="30%">
                            <h3 class="mt-4">Exhaust</h3>
                            <p>Professional exhaust services to ensure optimal performance and efficiency of your vehicle.</p>
                        </div>
                    </div>
                </div>
            </div>
     
            <center>
            <a href="#" class="btn btn-danger" data-toggle="modal" data-target="#bookingModal">Book Service</a>

                    </center>
        </div>
        <!-- Service End -->

        
        
        <!-- Price Start -->
        <div class="price">
            <div class="container-fluid">
                <div class="section-header text-center">
                    <p>products</p>
                    <h2>Low prices on big tyre brands</h2>
                </div>
                <div class="container mt-5">
                    <div class="row text-center">
                        <div class="col-6 col-md-3">
                            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSwdACDKrjM7QpaK9kra5ucfKoI5UdRQbF6-g&s" alt="Accelera" class="brand-logo">
                            <p class="brand-name">Accelera</p>
                        </div>
                        <div class="col-6 col-md-3">
                            <img src="https://upload.wikimedia.org/wikipedia/commons/a/a1/RGB_LOGO_APOLLO_TYRES_COMPACT_POS_GTD.jpg" alt="Apollo" class="brand-logo">
                            <p class="brand-name">Apollo</p>
                        </div>
                        <div class="col-6 col-md-3">
                            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSLoB0zGMNIj2Xef6r8_3vNdcMQD_JlwIAV6w&s" alt="Avon" class="brand-logo">
                            <p class="brand-name">Avon</p>
                        </div>
                        <div class="col-6 col-md-3">
                            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTplPHYWixuBHGDVwwL_T1CjYc5hiccUmsgSw&s" alt="BFGoodrich" class="brand-logo">
                            <p class="brand-name">BFGoodrich</p>
                        </div>
                        <div class="col-6 col-md-3">
                            <img src="https://www.shutterstock.com/image-vector/bridgestone-logo-sign-icon-emblem-600nw-2286811601.jpg" alt="Bridgestone" class="brand-logo">
                            <p class="brand-name">Bridgestone</p>
                        </div>
                        <div class="col-6 col-md-3">
                            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQ1AOeHtJ8rZ692MGZEz7XncV73Aat3JlOtiw&s" alt="Continental" class="brand-logo">
                            <p class="brand-name">Continental</p>
                        </div>
                        <div class="col-6 col-md-3">
                            <img src="https://logowik.com/content/uploads/images/541_dunlop.jpg" alt="Dunlop" class="brand-logo">
                            <p class="brand-name">Dunlop</p>
                        </div>
                        <div class="col-6 col-md-3">
                            <img src="https://etd.nl/sites/default/files/2020-12/European-Tyre-Distributors-brands-logo-Dynamo.jpg" alt="Dynamo" class="brand-logo">
                            <p class="brand-name">Dynamo</p>
                        </div>
                        <!-- Repeat for all other brands -->
                    </div>
                </div>
            </div>
            </div>


        <!-- Price End -->
        
        
        <!-- Location Start -->
        <div class="location">
            <div class="container">
                <div class="row">
                    <div class="col-lg-7">
                        <div class="section-header text-left">
                            <p>Our Location</p>
                            <h2>Tyre And Auto Service Centre</h2>
                        </div>
                        <div class="row">
                       
                            <div class="col-md-6">
                                <div class="location-item">
                                    <i class="fa fa-map-marker-alt"></i>
                                    <div class="location-text">
                                        <h3>RSK Tyres Sittingbourne</h3>
                                        <p>Chalkwell Rd, Sittingbourne ME10 1BJ, United Kingdom</p>
                                        <p><strong>Call:</strong>01795511511</p>
                                    </div>
                                </div>
                            </div>
                            <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d623.0750391309883!2d0.724257!3d51.342391!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47df2b9bf4769ea9%3A0x1691ffb4e6bc4708!2sRSK%20Tyres%20Sittingbourne!5e0!3m2!1sen!2sus!4v1720266455318!5m2!1sen!2sus" width="600" height="200" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                        </div>
                    </div>

                    <div class="col-lg-5 mt-5 mt-lg-0">
                        <div class="location-form">
                            <h3>Get Appointment</h3>
                            <form>
                                <div class="control-group">
                                    <input type="text" class="form-control" placeholder="Name" required="required" />
                                </div>
                                <div class="control-group">
                                    <input type="email" class="form-control" placeholder="Email" required="required" />
                                </div>
                                <div class="control-group">
                                    <textarea class="form-control" placeholder="Description" required="required"></textarea>
                                </div>
                                <div>
                                    <button class="btn btn-custom" type="submit">Send Request</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Location End -->

<!-- Testimonial Start -->
<div class="testimonial">
    <div class="container">
        <div class="section-header text-center">
            <p>Testimonial</p>
            <h2>What our clients say</h2>
        </div>
        <div class="owl-carousel testimonials-carousel">
            <div class="testimonial-item">
                <img src="img/pngegg.png" alt="Image">
                <div class="testimonial-text">
                    <h3>Abdullah Mehar</h3>
                    <h4>Customer</h4>
                    <p>
                        "Really good service and nice staff"
                    </p>
                </div>
            </div>
            <div class="testimonial-item">
            <img src="img/pngegg.png" alt="Image">
                <div class="testimonial-text">
                    <h3>Joanne Harman</h3>
                    <h4>Customer</h4>
                    <p>
                        "I’m a woman needing two new tyres, these guys were much cheaper than I was quoted but F1 up the road AND they had my tyres in stock (on a Sunday) they also said I could come back to get pressure check by them as many times as I like and that would be no problem what so ever (I have dented my wheel)
The waiting room was clean, today and comfortable too.
They said they have newly taken over the business and honestly they could not have been kinder to me - definitely my new tyre place!!"
                    </p>
                </div>
            </div>
            <div class="testimonial-item">
            <img src="img/pngegg.png" alt="Image">
                <div class="testimonial-text">
                    <h3>Lesley Richardson</h3>
                    <h4>Customer</h4>
                    <p>
                        "Visited today EMERGENCY as was pointed out to me at work 2 bad tyres! Popped in here and was pleasantly surprised at how good and value for money. Haseeb and Azhaan very polite and helpful! Fixed me up
                        In less than 15 mins!! Thankyou!!"
                    </p>
                </div>
            </div>
            <div class="testimonial-item">
            <img src="img/pngegg.png" alt="Image">
                <div class="testimonial-text">
                    <h3>Lena</h3>
                    <h4>Customer</h4>
                    <p>
                        "Absolutely fantastic. Very quick. Helped me out for a new tyre as needed to get my car back to the garage to be fixed due to fail on MOT. This was last week. Definitely recommend to others, lovely to talk too. Very accommodating. Will definitely be going back to get the rest of my tyres done. Good prices too"
                    </p>
                </div>
            </div>
            <div class="testimonial-item">
            <img src="img/pngegg.png" alt="Image">
                <div class="testimonial-text">
                    <h3>Joseph Freeney</h3>
                    <h4>Customer</h4>
                    <p>
                        "I had heard that RSK Tyres were very good on their prices, so I called in on Monday got some costings which were indeed very low. So, I returned on Tuesday morning,  the guys remembered what I wanted so set about removing the 3 tyres which I wanted replaced. I was pleasantly surprised at the way 1 guy removed the wheels while another got on with changing the tyres, then the first guy balanced the wheels and cleaned the tyres as he returned them to the car. Great team work, very smooth and speedy. I was also impressed by effort  used to thoroughly cleaned the rims before the replacement tyre went on.
                        Really well done, definitely recommend these guys and use them again and so polite and friendly too."
                    </p>
                </div>
            </div>
            <div class="testimonial-item">
            <img src="img/pngegg.png" alt="Image">
                <div class="testimonial-text">
                    <h3>Inam Hussain</h3>
                    <h4>Customer</h4>
                    <p>
                    Great service and really nice guys. Looks to be recently opened under new owners. These guys are really experienced and know what they are doing. Definitely my go to place for tyres now and I urge everyone in the Sittingbourne area to follow suit!
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Testimonial End -->



        <!-- Blog Start -->
        <?php
include 'backend/config.php';

// Fetch all blog posts
$query = $conn->query("SELECT * FROM blog ORDER BY created_at DESC LIMIT 3");
$blogs = $query->fetch_all(MYSQLI_ASSOC);
?>


    <div class="container">
    <div class="section-header text-center">
    <p>Our Blog</p>
    <h2>Latest news & articles</h2>
        </div>
<div class="row">
     
        <?php 
        if (!empty($blogs)): 
            foreach ($blogs as $blog): ?>
            <div class="col-sm-4">
                <div class="card p-3 shadow">
                <div class="blog-summary">
                    <!-- Display Blog Image if available -->
                    <?php if (!empty($blog['image_path'])): ?>
                        <img src="admin/<?php echo htmlspecialchars($blog['image_path']); ?>" alt="<?php echo htmlspecialchars($blog['title']); ?>" class="blog-image w-100 h-100">
                    <?php endif; ?>

                    <h4><a href="single.php?id=<?php echo $blog['id']; ?>"><?php echo htmlspecialchars($blog['title']); ?></a></h4>
                    <p><?php echo(substr($blog['content'], 0, 150)) ; ?>...</p>
                    <a href="single.php?id=<?php echo $blog['id']; ?>" class="btn btn-sm btn-danger">Read More</a>
                </div>
                </div>  
                </div>  
        <?php 
            endforeach;
        else:
            echo "<p>No blog posts found.</p>";
        endif;
        ?>
    </div>
    </div>
    <center>
<a href="blog.php" class="btn btn-danger mt-5">View more</a>
</center>
        <!-- Blog End -->
        <script>
document.getElementById('goButton').addEventListener('click', function() {
    // Get the value entered in the input field
    var carReg = document.getElementById('carRegInput').value.trim();

    // Check if the input is not empty
    if (carReg) {
        // Encode the input value to be safely included in the URL
        var encodedCarReg = encodeURIComponent(carReg);

        // Construct the new URL with the car reg as a query parameter
        var searchUrl = 'search_by_reg.php?car_reg=' + encodedCarReg;

        // Redirect to the constructed URL
        window.location.href = searchUrl;
    } else {
        alert('Please enter a car registration number.');
    }
});


</script>
<?php
include "footer.php";
?>
