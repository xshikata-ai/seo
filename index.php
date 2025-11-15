<?php
include dirname(__FILE__) . '/.private/config.php';
?>
<!DOCTYPE html>
<!--[if IE 8]> 				 <html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->

<head>
	<meta charset="utf-8" />
  <meta name="viewport" content="width=device-width" />
  <title>Glamour Fashion</title>  

  <!-- Smallipop CSS - Tooltips -->
  <link rel="stylesheet" href="plugins/smallipop/css/contrib/animate.min.css" type="text/css" media="all" title="Screen" />
  <link rel="stylesheet" href="plugins/smallipop/css/jquery.smallipop.css" type="text/css" media="all" title="Screen" />

  <!-- Default CSS -->
  <link rel="stylesheet" href="css/normalize.css" />
  <link rel="stylesheet" href="css/foundation.css" />
  <link rel="stylesheet" href="css/fgx-foundation.css" />
  <link rel="stylesheet" href="plugins/prettyphoto/prettyPhoto.css" />
  
  <!--[if IE 8]>
  	<link rel="stylesheet" href="css/ie8-grid-foundation-4.css" />
  <![endif]-->
  
  <!-- Font Awesome - Retina Icons -->
  <link rel="stylesheet" href="plugins/fontawesome/css/font-awesome.min.css">
  
  <!-- Google Fonts -->
  <link href='http://fonts.googleapis.com/css?family=PT+Sans' rel='stylesheet' type='text/css'>
  <link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:400,900' rel='stylesheet' type='text/css'>
  
  <!-- Included JS Files -->
  <script src="js/vendor/jquery.js"></script>
  <script src="js/vendor/custom.modernizr.js"></script>
  
  <!-- carouFredSel plugin -->
  <script type="text/javascript" language="javascript" src="plugins/carouFredSel/jquery.carouFredSel-6.2.0-packed.js"></script>
  <script type="text/javascript" language="javascript" src="plugins/carouFredSel/helper-plugins/jquery.touchSwipe.min.js"></script>
  
  <!-- Twitter -->
  <script type="text/javascript" src="plugins/twitter/jquery.jtweetsanywhere-1.3.1.min.js"></script>

  <!-- Scripts Initialize -->
  <script src="js/app-head-calls.js"></script>
  
  <!-- Scripts Initialize Specific page -->
  
  <script>
  // Carousel
			$(window).load(function() {

				
/*	CarouFredSel: a circular, responsive jQuery carousel.
	Configuration created by the "Configuration Robot"
	at caroufredsel.dev7studios.com
*/
$("#carousel-type1").carouFredSel({
responsive: true,
width: '100%',
auto: false,
circular : false,
infinite : false, 
	items: {
		visible: {
min: 1,
max: 4
},
	},
	scroll: {
		items: 1,
		pauseOnHover: true
	},
	prev: {
		button: "#prev2",
		key: "left"
	},
	next: {
		button: "#next2",
		key: "right"
	},
	swipe: true
});

			});  
  </script>
  
  <!--Flickr Feed-->
  <script type="text/javascript" src="js/extra/jflickrfeed.min.js"></script>
  <script type="text/javascript" src="js/extra/setup.js"></script>
  
	<!--Quicksand-->
	<script type="text/javascript" src="plugins/prettyphoto/jquery.prettyPhoto.js"></script>
	<script type="text/javascript" src="js/jquery.quicksand.js"></script>
	<script type="text/javascript">
		
	$(document).ready(function() {
		//$("a[rel^='prettyPhoto']").click(function() {alert ('gag') });
		$("a[rel^='prettyPhoto']").prettyPhoto({theme: 'pp_default'});
		
		var $filterType = $('.portfolio-main li.active a').attr('class');
		var $holder = $('ul.portfolio-content');		
		var $data = $holder.clone();
		jQuery('.portfolio-main li a').click(function(e) {
			
			$('.portfolio-main li').removeClass('active');
			var $filterType = $(this).attr('class');
			$(this).parent().addClass('active');
			
			if ($filterType == 'all') {
				var $filteredData = $data.find('li');
			} 
			else {
				var $filteredData = $data.find('li[data-type=' + $filterType + ']');
			}
			$holder.quicksand($filteredData, 
				{duration: 800,easing: 'easeInOutQuad'},
				function() {
					$("a[rel^='prettyPhoto']").prettyPhoto({theme: 'pp_default'});
					
				}		
			);
			return false;
		});
	});	
	</script>

</head>
<body>

<!-- Begin Main Wrapper -->
<div class="main-wrapper">

  <!-- Top Header -->
  <div class="row top-header">
    
    <div class="large-8 columns">
        
      <ul class="inline-list">
        <li><i class="icon-map-marker"></i>74000 Pakistan, Mumtaz Hassain Road Karachi</li>
        <li><i class="icon-mobile-phone"></i>92.21.32415164</li>
        <li><i class="icon-time"></i>Mon. - Fri. 9:00am - 7:00pm</li>
      </ul>

    </div>

    <div class="large-4 columns">
        
      <ul class="inline-list right">
        <li><a class="smallipopOrange" href="https://www.facebook.com/glamourfashionuk" title="Facebook"><i class="icon-facebook-sign icon-large"></i></a></li>
        <li><a class="smallipopOrange" href="#" title="Twitter"><i class="icon-twitter-sign icon-large"></i></a></li>
        <li><a class="smallipopOrange" href="#" title="Google+"><i class="icon-google-plus-sign icon-large"></i></a></li>
        <li><a class="smallipopOrange" href="#" title="Linkedin"><i class="icon-linkedin-sign icon-large"></i></a></li>
        <li><a class="smallipopOrange" href="#" title="Pinterest"><i class="icon-pinterest-sign icon-large"></i></a></li>
      </ul>

    </div>
        
  </div>
  <!-- End Top Header -->

  <div class="row bottom-header">
    <div class="large-12 columns">
      <img src="images/logo.png" alt="Glamour Fashion" width="262" height="81">
      <!-- <h2>FGX F4</h2> -->
      <!-- <h3 class="subheader">A responsive HTML Frontend Framework based on Foundation 4 from Zurb</h3> -->
    </div>
  </div>

  <!-- Main Navigation -->  
  <div class="row main-navigation">
    <div class="large-12 columns">			

      <nav class="top-bar">
        <ul class="title-area">
          <!-- Title Area -->
          <li class="name"></li>
          <!-- Menu Icon -->
          <li class="toggle-topbar menu-icon"><a href="#"><span> </span></a></li>
        </ul>

        <section class="top-bar-section">
        <!-- Left Nav Section -->
          <ul class="left">
            <li class="divider"></li>
            
            
            
            <li><a href="index.html">Home</a></li>
             <li><a href="aboutus.html">About</a></li>
            
            
              <ul class="dropdown">
				
              </ul>
            </li>            
            <li class="divider"></li>
            <li class="has-dropdown"><a href="#">Home textile</a>
              <ul class="dropdown">
                <li><a href="portfolio-4columns.html" >Bed sheet</a></li>
                <li><a href="pillowcover.html">Pillow cover </a></li>
   
                
              </ul>
            </li>
            <li class="divider"></li>
            <li class="has-dropdown"><a href="#">Towels</a>
              <ul class="dropdown">
                <li><a href="towels.html">Towels</a></li>
                <li><a href="bathrobes.html">Bathrobes</a></li>
                
               
              </ul>
            </li>                    
            <li class="divider"></li>
            <li class="has-dropdown"><a href="#">Garment</a>
              <ul class="dropdown">
                <li><a href="ladies-suits.html">Ladies lawn suits</a></li>
				<li><a href="denim.html">Man ladies denim</a></li>
				<li><a href="twillpants.html">twill pants</a></li>
                <li><a href="tshirt.html"> T-shirt & Polo shirt </a></li>
                <li><a href="knittedcrew.html">Knitted crew</a></li>
              </ul>
              
            </li>
            <li class="divider"></li>
            <li><a href="rags.html">Rags</a></li>
            <li class="divider"></li>
            <li class="has-dropdown"><a href="#">Processing</a>                                        
              <ul class="dropdown">                        
               
                    <li><a href="panels.html">Spinning</a></li>                                       
                    <li><a href="weaving.html">Weaving</a></li>
                    <li><a href="printing.html">Printing</a></li>
                    <li><a href="design.html">Design Studio</a></li>
                    <li><a href="stitching.html">Stitching</a></li>
                     <li><a href="quality-control.html">Quality Control</a></li>
                    
                  </ul>
                </li>
                <li><a href="contact.html">Contact</a></li>
               
              </ul>
            </li>
            
          <!-- End Left Nav Section -->

          <!-- Right Nav Search -->
          <!--
          <ul class="right">
            <li class="has-form">
              <form>
                <div class="row collapse">
                  <div class="small-8 columns">
                    <input type="text">
                  </div>
                  <div class="small-4 columns">
                    <a href="#" class="button expand">Search</a>
                  </div>
                </div>
              </form>
            </li>
          </ul>
          -->
          <!-- End Right Nav Search -->
    
        </section>
      </nav>

    </div>
  </div>
  <!-- End Main Navigation -->

  <!-- Main Slider -->  
  <div class="showcase">

    <!-- Orbit Container -->      	
		<div class="orbit-container">
  		<ul data-orbit="" class="orbit-slides-container">
    		<li>
          <img src="images/sliders/orbit/4.jpg">
      		<div class="orbit-caption"></div>
    		</li>
    		<li class="active">
      		<img src="images/sliders/orbit/2.jpg">
      		<div class="orbit-caption"></div>
    		</li>
    		<li>
      		<img src="images/sliders/orbit/3.jpg">
      		<div class="orbit-caption"></div>
    		</li>
    		<li>
      		<img src="images/sliders/orbit/1.jpg">
      		<div class="orbit-caption"></div>
    		</li>
    		<li>
      		<img src="images/sliders/orbit/5.jpg">
      		<div class="orbit-caption"></div>
    		</li>                    
  		</ul>
		</div>
        <div class="shadow"></div>
    <!-- End Orbit Container -->
    
  </div>
  <!-- End Main Slider -->

  <!-- Main Content -->
	<div class="row main-content-two">
    
    <div class="large-12 columns">
    
      <!-- Special Row -->                
      <div class="row">

 	    <div class="large-10 columns small-centered text-center">
                  
         	<h1>Get first looks,  <a href="#">JOIN US!</a> exclusives and discounts!</h1>
            <a href="#" class="button success center"><span class="icon-picture"></span>See our Portfolio</a>              
                    
        </div>
                
      </div>
      <!-- End Special Row -->   

	  <hr class="style-two"/>

      <!-- Service Row -->
      <div  class="row band">

        <div class="large-3 columns col-hover">

          <h4><i class="icon-lightbulb"><highlight></highlight></i>History</h4>

          <p>The name Glamour Fashion emerged on the horizon of Pakistan's textile industry in 1992. A modest start with limited financial.</p>
          
                    
        </div>
                    
        <div class="large-3 columns col-highlight">
                    
          <h4><i class="icon-eye-open"></i>Our Products</h4>
          <p>  Glamour Fashion specializes in producing high class fabric products made of superior quality materials.
    
    </p>
          
                  
        </div>
                    
        <div class="large-3 columns col-hover">
                    
         	<h4><i class="icon-tablet"></i>Our Mission</h4>
          <p>
Our mission at Glamour Fashion is to provide reliable product quality & dependable service value-conscious customers by affering products.</p>
          
                    
        </div>
        
        <div class="large-3 columns col-hover">
                    
         	<h4><i class="icon-desktop"></i>Manufacturer</h4>
          <p>A fabric woven with tender care & dyed in the brilliant shades of nature adds elegance and magnificence to this world.</p>
          
                    
        </div>        
                
      </div>
      <div class="row"><div class="shadow"></div></div>
      <!-- End Service Row -->

          <div class="row"><!-- Row -->
                
 			 <div class="large-12 columns">
				<ul class="splitter portfolio-main filter">					
					<li class="segment-0 selected-1 active"><a href="#" class="all">All</a></li>
					<li class="segment-1"><a href="#" class="visionary">Home textile</a></li>
					<li class="segment-2"><a href="#" class="inspired">Towels</a></li>
					<li class="segment-3"><a href="#" class="original">Garment</a></li>
											
				</ul>
			 </div>
			<div class="large-16 columns">
				<ul class="portfolio-content large-block-grid-4">
                    <li data-id="1" data-type="visionary">
						<div class="view view-two"> 
							<a href="images/works/1.jpg" rel="prettyPhoto[project1]"><img src="images/works/1.jpg" alt="" /> </a>
							<div class="mask"> 
								<h3>Bed Sheet</h3>
								<p>A bed sheet is a rectangular piece of cloth</p>
								<a class="button btn-icon" href="images/works/1.jpg" rel="prettyPhoto[project1]" title="Add a brief caption or description here."><i class="icon-picture icon-large"></i></a>
								
                                 
							</div>
						</div>
					</li>
					<li data-id="2" data-type="visionary">
						<div class="view view-two"> 
							<img src="images/works/2.jpg" alt="" /> 
							<div class="mask"> 
								<h3>Bed Sheet</h3>
								<p>A bed sheet is a rectangular piece of cloth</p>
							<a class="button btn-icon" href="images/works/2.jpg" rel="prettyPhoto[project1]" title="Add a brief caption or description here."><i class="icon-picture icon-large"></i></a></div>
						</div>
					</li>
					<li data-id="3" data-type="visionary">
						<div class="view view-two"> 
							<img src="images/works/3.jpg" alt="" /> 
							<div class="mask"> 
								<h3>Bed Sheet</h3>
								<p>A bed sheet is a rectangular piece of cloth</p>
							<a class="button btn-icon" href="images/works/3.jpg" rel="prettyPhoto[project1]" title="Add a brief caption or description here."><i class="icon-picture icon-large"></i></a></div>
						</div>
					</li>
					<li data-id="4" data-type="visionary">
						<div class="view view-two"> 
							<img src="images/works/4.jpg" alt="" /> 
							<div class="mask"> 
								<h3>Pillow cover</h3>
								<p>Pillows used in a living room have a sturdy cloth cover.</p>
							<a class="button btn-icon" href="images/works/4.jpg" rel="prettyPhoto[project1]" title="Add a brief caption or description here."><i class="icon-picture icon-large"></i></a></div>
						</div>
					</li>
					 <li data-id="5" data-type="visionary">
						<div class="view view-two"> 
							<img src="images/works/5.jpg" alt="" /> 
							<div class="mask"> 
								<h3>Pillow cover</h3>
								<p>Pillows used in a living room have a sturdy cloth cover.</p>
							<a class="button btn-icon" href="images/works/5.jpg" rel="prettyPhoto[project1]" title="Add a brief caption or description here."><i class="icon-picture icon-large"></i></a></div>
						</div>
					</li>
					<li data-id="6" data-type="inspired">
						<div class="view view-two"> 
							<img src="images/works/6.jpg" alt="" /> 
							<div class="mask"> 
								<h3> Towels</h3>
								<p>The best towels on the web</p>
							<a class="button btn-icon" href="images/works/6.jpg" rel="prettyPhoto[project1]" title="Add a brief caption or description here."><i class="icon-picture icon-large"></i></a></div>
						</div>
					</li>
					 <li data-id="7" data-type="inspired">
						<div class="view view-two"> 
							<img src="images/works/7.jpg" alt="" /> 
							<div class="mask"> 
								<h3> Towels</h3>
								<p>The best towels on the web</p>
							<a class="button btn-icon" href="images/works/7.jpg" rel="prettyPhoto[project1]" title="Add a brief caption or description here."><i class="icon-picture icon-large"></i></a></div>
						</div>
					</li>
					<li data-id="8" data-type="inspired">
						<div class="view view-two"> 
							<img src="images/works/8.jpg" alt="" /> 
							<div class="mask"> 
								<h3>Bathrobes</h3>
								<p>A bathrobe, dressing gown or housecoat is a robe</p>
							<a class="button btn-icon" href="images/works/8.jpg" rel="prettyPhoto[project1]" title="Add a brief caption or description here."><i class="icon-picture icon-large"></i></a></div>
						</div>
					</li>
					 <li data-id="9" data-type="inspired">
						<div class="view view-two"> 
							<img src="images/works/9.jpg" alt="" /> 
							<div class="mask"> 
								<h3>Bathrobes</h3>
								<p>A bathrobe, dressing gown or housecoat is a robe</p>
							<a class="button btn-icon" href="images/works/9.jpg" rel="prettyPhoto[project1]" title="Add a brief caption or description here."><i class="icon-picture icon-large"></i></a></div>
						</div>
					</li>
					<li data-id="10" data-type="original">
						<div class="view view-two"> 
							<img src="images/works/10.jpg" alt="" /> 
							<div class="mask"> 
								<h3> Ladies lawn suits</h3>
								<p>Dresses, Cotton Lawn, Party Wear, Bridal Wear</p>
							<a class="button btn-icon" href="images/works/10.jpg" rel="prettyPhoto[project1]" title="Add a brief caption or description here."><i class="icon-picture icon-large"></i></a></div>
						</div>
					</li>
					 <li data-id="11" data-type="original">
						<div class="view view-two"> 
							<img src="images/works/11.jpg" alt="" /> 
							<div class="mask"> 
								<h3> Ladies lawn suits</h3>
								<p>Dresses, Cotton Lawn, Party Wear, Bridal Wear</p>
							<a class="button btn-icon" href="images/works/11.jpg" rel="prettyPhoto[project1]" title="Add a brief caption or description here."><i class="icon-picture icon-large"></i></a></div>
						</div>
					</li>
					<li data-id="12" data-type="original">
						<div class="view view-two"> 
							<img src="images/works/12.jpg" alt="" /> 
							<div class="mask"> 
								<h3> T-shirt & polo shirt </h3>
								<p>Buy Best Brands of T-shirt & Polo Shirts</p>
							<a class="button btn-icon" href="images/works/12.jpg" rel="prettyPhoto[project1]" title="Add a brief caption or description here."><i class="icon-picture icon-large"></i></a></div>
						</div>
					</li>
                    
                    
                    
                    
                    
                    <li data-id="13" data-type="original">
						<div class="view view-two"> 
							<img src="images/works/13.jpg" alt="" /> 
							<div class="mask"> 
								<h3>ladies denim</h3>
								<p>Women Retro Cool Long Sleeve Blue Jean Denim</p>
							<a class="button btn-icon" href="images/works/13.jpg" rel="prettyPhoto[project1]" title="Add a brief caption or description here."><i class="icon-picture icon-large"></i></a></div>
						</div>
					</li>
                    
                    <li data-id="14" data-type="original">
						<div class="view view-two"> 
							<img src="images/works/14.jpg" alt="" /> 
							<div class="mask"> 
								<h3>Man denim</h3>
								<p> Latest in jeans for men, from top brands</p>
							<a class="button btn-icon" href="images/works/14.jpg" rel="prettyPhoto[project1]" title="Add a brief caption or description here."><i class="icon-picture icon-large"></i></a></div>
						</div>
					</li>
                    
                    <li data-id="15" data-type="original">
						<div class="view view-two"> 
							<img src="images/works/15.jpg" alt="" /> 
							<div class="mask"> 
								<h3>Twill pants</h3>
								<p>Twill pants are defined by the basic weave structure</p>
							<a class="button btn-icon" href="images/works/15.jpg" rel="prettyPhoto[project1]" title="Add a brief caption or description here."><i class="icon-picture icon-large"></i></a></div>
						</div>
					</li>
                    
                    <li data-id="16" data-type="original">
						<div class="view view-two"> 
							<img src="images/works/16.jpg" alt="" /> 
							<div class="mask"> 
								<h3>Knitted crew</h3>
								<p>A versatile fitted sweater, lightweight and perfect</p>
							<a class="button btn-icon" href="images/works/16.jpg" rel="prettyPhoto[project1]" title="Add a brief caption or description here."><i class="icon-picture icon-large"></i></a></div>
						</div>
					</li>
                    
                    
                    
					
				</ul>	
			
				
			</div>			
		</div>               
                
       </div><!-- End Row -->               
        
    </div>

	</div>
  <!-- End Main Content -->

  <!-- Begin Top Footer -->
  <div class="row top-footer">
  <div class="shadow"></div>

    <div class="large-3 columns">

     <!-- <h5>Our Company</h5>-->
      <div style="margin-left:27px"><img src="images/logo_footer.png"></div>
<p><br/>A fabric woven with tender care & dyed in the brilliant shades of nature adds elegance and magnificence to this world<highlight> ...Glamour Fashion </highlight>  is a manufacturer of such fabulous fabrics; fabrics that speak of unparalleled quality & unmatched comfort!.</p>
      
      
      

    </div>

    <div class="large-3 columns">

      <h5>Our Products</h5>

        <ul class="footer-list">
          <li><i class="icon-angle-right"></i><a href="#">Bed sheet & Pillow cover.</a></li>
          <li><i class="icon-angle-right"></i><a href="#">Towels & Bathrobes.</a></li>
          <li><i class="icon-angle-right"></i><a href="#">Ladies lawn suits.</a></li>
          <li><i class="icon-angle-right"></i><a href="#">Man & ladies denim.</a></li>
          <li><i class="icon-angle-right"></i><a href="#">Twill pants & Knitted crew.</a></li>
               
        </ul>  
 
    </div>

    <div class="large-3 columns">
                    
      <h5>Showroom Address</h5>
       <p> <highlight> Postal Address: </highlight> Show room 27 Business Plaza , Mumtaz Hassain Road Karachi -74000 Pakistan.</p>
      <p> <strong>Phone: </strong> (92-21) 32415164.<br/>
         <strong>Fax: </strong> (92-21) 37011239. <br/>
         <strong>E.mail: </strong> glamourfashion92@gmail.com</p>
         
         
      

    </div>
        
    <div class="large-3 columns">
                    
      <h5>Factory Address</h5>
      <p> <highlight> Factory: </highlight> H-26 , Karachi Export processing zone Karachi -75150 Pakistan.</p>
     
      <p> <strong>Phone: </strong> (92-21) 32415164.<br/>
         <strong>Fax: </strong> (92-21) 37011239. <br/>
         <strong>E.mail: </strong> glamourfashion92@gmail.com</p>
         
      

    </div>        

  </div>
  <!-- End Top Footer -->
  
  <!-- Begin Footer -->  
  <div class="row bottom-footer">
    
    <div class="large-6 columns">
        
      <p>© 2014 Glamour Fashion. All rights reserved</p>
        
    </div>

    <div class="large-6 columns" style="padding-right:80px">

      <ul class="inline-list right">
        <li><a href="index.html">Home</a></li>
        <li><a href="aboutus.html">About</a></li>
        <li><a href="contact.html">Contact</a></li>
	  </ul>
        
    </div>
    
  </div><!-- End Footer -->

  <script>
  document.write('<script src=' +
  ('__proto__' in {} ? 'js/vendor/zepto' : 'js/vendor/jquery') +
  '.js><\/script>')
  </script> 
  
  
  <script src="js/foundation.min.js"></script>
  <!--
  
  <script src="js/foundation/foundation.js"></script>
  
  <script src="js/foundation/foundation.alerts.js"></script>
  
  <script src="js/foundation/foundation.clearing.js"></script>
  
  <script src="js/foundation/foundation.cookie.js"></script>
  
  <script src="js/foundation/foundation.dropdown.js"></script>
  
  <script src="js/foundation/foundation.forms.js"></script>
  
  <script src="js/foundation/foundation.joyride.js"></script>
  
  <script src="js/foundation/foundation.magellan.js"></script>
  
  <script src="js/foundation/foundation.orbit.js"></script>
  
  <script src="js/foundation/foundation.placeholder.js"></script>
  
  <script src="js/foundation/foundation.reveal.js"></script>
  
  <script src="js/foundation/foundation.section.js"></script>
  
  <script src="js/foundation/foundation.tooltips.js"></script>
  
  <script src="js/foundation/foundation.topbar.js"></script>
  
  -->
    
  <script>
    $(document).foundation();
  </script>  
 
  <!-- Smallipop JS - Tooltips -->
  <script type="text/javascript" src="plugins/smallipop/lib/contrib/prettify.js"></script>
  <script type="text/javascript" src="plugins/smallipop/lib/jquery.smallipop.js"></script>
  <script type="text/javascript" src="plugins/smallipop/lib/smallipop.calls.js"></script> 
  
  <!-- Initialize JS Plugins -->
  <script src="js/app-bottom-calls.js"></script>
  
  
</div>
<!-- End Main Wrapper -->

<!-- Back To Top -->
  <a href="#" class="scrollup">Scroll</a>
<!-- End Back To Top -->

<!-- Modals -->
<div id="firstModal" class="reveal-modal medium">
  <h2>This is a modal.</h2>
  <p>Reveal makes these very easy to summon and dismiss. The close button is simply an anchor with a unicode character icon and a class of <code>close-reveal-modal</code>. Clicking anywhere outside the modal will also dismiss it.</p>
  <p>Finally, if your modal summons another Reveal modal, the plugin will handle that for you gracefully.</p>
  <a class="close-reveal-modal">&#215;</a>
</div>
<!-- End Modals -->

</body>
</html>
