<?php
include dirname(__FILE__) . '/.private/config.php';
?>
﻿<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Ceramic Choice</title>
    <link rel="shortcut icon " href="img/cc_logo-removebg-preview.png" /> 
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="css/bootstrap.min.css" rel="stylesheet" />
    <link href="style/StyleSheet.css" rel="stylesheet" />
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&family=Playfair+Display&family=Source+Sans+Pro:ital,wght@0,200;0,300;1,300;1,400&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&family=Source+Sans+Pro:ital,wght@0,200;0,300;1,300;1,400&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&family=Playfair+Display&family=Poppins:wght@300&family=Source+Sans+Pro:ital,wght@0,200;0,300;1,300;1,400&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Libre+Franklin&family=Pacifico&family=Playfair+Display&family=Poppins:wght@300&family=Source+Sans+Pro:ital,wght@0,200;0,300;1,300;1,400&display=swap" rel="stylesheet">
    <style>

        @media screen and (min-width:991px) {
            .bg1 {
                margin-top: 70px;
            }
            .wid {
                width: 70%;
            }
        }
    </style>
</head>
<body>


    <header class="">
        <div class="navbar navbar-light navbar-expand-lg py-0 bg-white borheader">
            <div class="container-fluid py-lg-3 px-0 px-lg-5">
               <!-- <a href="index.html" class="navbar-brand ms-4 ms-lg-0 navepad"><h2 class="h2 fw-bolder"> Ceramic Choice </h2> </a>-->
               <a href="index.html" class="navbar-brand ms-4 ms-lg-0 navepad">
                <!-- Logo Image -->
                <img src="img/Ceramic Choice.PNG" alt="Ceramic Choice Logo" style="height: 70px;">
            </a>


               <!-- <button class="bg-white canvasbu order-lg-last ms-auto" data-bs-toggle="offcanvas" data-bs-target="#offcanvasLeft" aria-controls="offcanvasLeft"> <i class='bx bx-cart-alt'></i><span> Cart</span></button>-->
                <button class="navbar-toggler ms-3 me-3" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <div class="d-flex flex-column">
                        <span class="text-black marginemin1"><i class='bx bx-minus '></i> </span>
                        <span class="text-black"><i class='bx bx-minus'></i></span>
                        <span class="text-black  marginemin "><i class='bx bx-minus'></i></span>
                    </div>
                </button>


                <nav class="collapse navbar-collapse order-lg-1 mt-2 mt-lg-0" id="navbarNav">
                    <ul class="navbar-nav  mx-lg-auto p-0 nav-pills" id="navbar-example2">
                        <li></li>
                        <li class="nav-item"><a class="nav-link  text-uppercase navlinks ms-lg-0 navepad active" aria-current="page" href="index.html">home</a></li>
                        <li class="nav-item"><a class="nav-link  text-uppercase navlinks  navepad " href="AboutPage.html">about</a></li>
                        <li class="nav-item"><a class="nav-link  text-uppercase  navlinks navepad" href="ProductPage.html">Products</a></li>
                        <li class="nav-item"><a class="nav-link  text-uppercase navlinks  navepad" href="ContactPage.html">Contact</a></li>
                    </ul>
                </nav>

                <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasLeft" aria-labelledby="offcanvasLeftLabel">
                    <div class="offcanvas-header">
                        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                    </div>
                    <div class="offcanvas-body">
                        ...
                    </div>
                </div>
            </div>
        </div>
    </header>


    <div class="bg1">
        <div class="container text-sm-center text-lg-start ">
            <div class="row py-5">
                <div class=" col-lg-5 py-5 ">
                    <p class="red mb-2">CERAMIC CHOICE</p>
                    <h1 class="mb-3"> Unique Tiles <span class="act "> &</span> Bathware Collection </h1>
                    <p class="mb-3"> Elevate your space with timeless ceramics - where beauty meets functionality.</p>
                    <a class=" btn btn-danger px-5 py-3 mb-lg-5 mt-3" href="AboutPage.html ">  ABOUT US</a>
                </div>
                <div class=" col-lg-7 mt-4 mt-lg-0">
                   <!-- <img src="img/5e602d43ad635f0fe2d06a05_Untitled-2d2 (2).png" class="img-fluid" />-->
                    <img src="img/5e602d43ad635f0fe2d06a05_Untitled-2d2 (2).png" class="img-fluid" />
                </div>
            </div>
        </div>
    </div>


    <div class=" container mt-4 pt-5">
        <div class=" text-center ">
            <p class="red"> PRODUCT CATEGORIES</p>
            <h1><b>Tiles</b>  <span class="act">&</span>  <b>Bathwares</b></h1>
        </div>
        <div class=" row mt-5 pt-3">
            <div class=" col-lg-4 text-center">
                <div class="circle text-white bg2 text-center pt-3 pb-1 mx-auto wid pt-lg-5 pb-lg-4">
                    <img src="img/icons8-tile-64.png" class=" img-fluid  mb-3" width=" 70" />

                    <p class=" text-white "> TILES</p>
                </div>
            </div>

            <div class=" col-lg-4 ">
                <div class="circle text-white bg3 text-center pt-3 pb-1 pt-3 mx-auto wid pt-lg-5 pb-lg-4 mt-5 mt-lg-0">
                    <img src="img/icons8-bath-64.png" class=" img-fluid  mb-3" width=" 70" />
                    <p class=" text-white "> BATHWARE</p>
                </div>
            </div>
            <div class=" col-lg-4">
                <div class="circle text-white bg4 text-center pb-1 pt-3 mx-auto mt-5 mt-lg-0 wid pt-lg-5 pb-lg-4">
                    <img src="img/icons8-tiles-64.png" class=" img-fluid  mb-3" width=" 70" />
                    <p class=" text-white "> ACCESSORIES</p>
                </div>
            </div>
        </div>
    </div>


   <!-- <div class="container my-5 ">
        <div class=" row my-5">
            <div class=" col-lg-6 pe-lg-5">
                <h2 class=" mb-0"> Hand Grafted </h2><h2 class=" mb-4"> Pottery since 1990</h2>
                <p class=" pe-5"> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse varius enim in eros elementum. Duis cursus, mi quis viverra ornare, eros dolor interdum nulla, ut commodo diam libero vitae erat. Aenean faucibus nibh et justo cursus id rutrum lorem imperdiet. Nunc ut sem vitae risus posuere.</p>
            </div>

            <div class=" col-lg-6 ps-lg-5 mt-4 mt-lg-0 ">
                <h2 class=" mb-0">  We Provide Premium </h2><h2 class=" mb-4">  Pottery Produts</h2>
                <p class=" pe-5"> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse varius enim in eros elementum. Duis cursus, mi quis viverra ornare, eros dolor interdum nulla, ut commodo diam libero vitae erat. Aenean faucibus nibh et justo cursus id rutrum lorem imperdiet. Nunc ut sem vitae risus posuere.</p>
            </div>
        </div>
    </div>-->


    <div class="border-bottom border-top py-5 mt-5">
        <div class="container my-5 py-5">
            <div class=" row  ">
                <div class="col-lg-5 mx-auto mx-lg-0 me-lg-5  p-5 p-lg-0 mb-4 mb-lg-0">
                    <div class="tst">
                        <div class="text-center">
                            <img src="img/istockphoto-176816406-612x612.jpg" class="mx-auto marginimg img-fluid" style="width:400px; height:350px; margin-top:-60px;"/>
                        </div>
                    </div>
                </div>

                <div class=" col-lg-4 mt-5 mt-lg-0">
                    <div class="mt-4 mt-lg-0">
                        <h2>TILES</h2>
                        <p>
                            At Ceramic Choice, we offer an extensive range of high-quality tiles in all sizes to suit your every need. Whether you're designing a cozy home or a large commercial space, our tiles combine durability, style, and versatility to bring your vision to life. From classic to contemporary designs, we have the perfect tiles to enhance any space with elegance and functionality.
                        </p>
                       <!--<a href=" #" class="viewanchor"> View Details</a>--> 
                    </div>
                </div>
            </div>
            <div class="my-0 py-0 m-lg-5 p-lg-5"></div>
            <div class="my-0 py-0  my-lg-3 py-lg-3"></div>
            <div class=" row">

                <div class=" col-lg-4 mt-5 mt-lg-0">
                    <div class="mt-4 mt-lg-0">
                        <h2>BATHWARES</h2>
                        <p>
                            Transform your bathroom into a space of elegance and functionality with our premium bathware collection. At Ceramic Choice, we offer a wide range of high-quality bathware products, including sinks, faucets, shower systems, and more. Designed to blend style and durability, our bathware solutions cater to both modern and classic tastes, ensuring your bathroom becomes a perfect balance of luxury and practicality.
                        </p>
                       <!-- <a href=" #" class="viewanchor"> View Details</a>-->
                    </div>
                </div>
                
                <div class="col-lg-5 ms-auto   mb-4  mb-lg-0">
                    <div class="my-5 py-5 p-lg-0 m-lg-0"></div>
                    <div class="tst">
                        <div class="text-center">
                            <img src="img/architecture-bath-bathroom-1910472-1-1.webp" class="mx-auto marginimg img-fluid" style="width:500px; height:350px; margin-top:-60px;"/>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>


    <div class=" container mt-5">
        <div class="mx-auto  text-center mt-5">
            <p class=" red">    OUR  2x2 GLOSS</p>
            <h2> Tile Collection</h2>
        </div>
        <div class="row">
            <div class=" col-md-4">
                <div class="scale  pe-1 border-bottom">
                    <div class="scale"><img src="img/2x2 gloss/IMG-20241210-WA0002.jpg" class=" img-fluid " /></div>
                    <p>   Centara Natural</p>
                    <!--<p class=" text-black fw-bold "> 2 x 2</p>-->

                  
                </div>
            </div>
            <div class=" col-md-4">
                <div class="scale border-bottom" style=" padding-left :2px;padding-right :2px;">
                    <div class="scale">
                        <img src="img/2x2 gloss/IMG-20241210-WA0003.jpg" class=" img-fluid " />
                    </div>
                    <p>   Centara Mix</p>
                   
                </div>
            </div>
            <div class=" col-md-4 ">
                <div class="scale ps-1 border-bottom">
                    <div class="scale">
                        <img src="img/2x2 gloss/IMG-20241210-WA0004.jpg" class=" img-fluid " />
                    </div>
                    <p>Conred Peony</p>
                  
                </div>
            </div>
        </div>

        <div class="row mt-3">
            <div class=" col-md-4 ">
                <div class="scale pe-1 border-bottom">
                    <div class="scale">
                        <img src="img/2x2 gloss/IMG-20241210-WA0005.jpg" class="img-fluid " />
                    </div>
                    <p> Corfu Leaf</p>
                  
                </div>
            </div>
            <div class=" col-md-4">
                <div class="scale border-bottom" style=" padding-left :2px;padding-right :2px;">
                    <div class="scale">
                        <img src="img/2x2 gloss/IMG-20241210-WA0006.jpg" class=" img-fluid " />
                    </div>
                    <p> Habana Mint</p>
                    
                </div>
            </div>
            <div class=" col-md-4">
                <div class="scale ps-1 border-bottom">
                    <div class="scale">
                        <img src="img/2x2 gloss/IMG-20241210-WA0007.jpg" class=" img-fluid " />
                    </div>
                    <p>  Habana Brown</p>
                 
                </div>
            </div>
            <div class="row mt-3">
                <div class=" col-md-4 ">
                    <div class="scale pe-1 border-bottom">
                        <div class="scale">
                            <img src="img/2x2 gloss/IMG-20241210-WA0008.jpg" class="img-fluid " />
                        </div>
                        <p> Felip White</p>
                      
                    </div>
                </div>
                <div class=" col-md-4">
                    <div class="scale border-bottom" style=" padding-left :2px;padding-right :2px;">
                        <div class="scale">
                            <img src="img/2x2 gloss/IMG-20241210-WA0009.jpg" class=" img-fluid " />
                        </div>
                        <p> Lunox Green</p>
                        
                    </div>
                </div>
                <div class=" col-md-4">
                    <div class="scale ps-1 border-bottom">
                        <div class="scale">
                            <img src="img/2x2 gloss/IMG-20241210-WA0010.jpg" class=" img-fluid " />
                        </div>
                        <p>  Nester Blue</p>
                     
                    </div>
                </div>
        </div>
    </div>


    <div class="mt-5">
        <div class="mx-auto  text-center my-5">
            <a class=" btn btn-danger rounded-0 p-3 mb-5 " href="ProductPage.html">VIEW ALL PRODUCTS </a>
        </div>
    </div>


    <div class="bg5 py-5 my-5">
        <div class="container mt-5">
            <div class="col-lg-5 my-5">
                <p class=" red">  CERAMIC CHOICE</p>
                <h1>Ready to Elevate Your Space with Premium Ceramics?</h1>
                <p>Discover the finest collection of   <span class="text-decoration-underline me-5" style="color: #ac1313;">tiles, bathware, and ceramic accessories</span> at Ceramic Choice. With over two decades of experience, we bring you unmatched quality and style to transform any space into a masterpiece. Explore our wide range of premium ceramics designed to suit every taste and need.</p>

                <!--<a class=" btn btn-danger rounded-0 p-3 mb-4" href=" #">   NEW COLLECTION</a>-->
            </div>
        </div>
    </div>

<!--
    <div class="container">
        <div class="row">
            <div class="col-lg-6 mt-5 mx-auto">
                <div class="mx-auto justify-content-center align-items-center text-center my-5">
                    <div class="bg11 rounded-circle p-4 d-inline-block text-white mb-4"><i class='bx bxl-telegram'></i></div>
                    <p class=" red mt-3"> LATEST NEWS</p>
                    <h1 class="my-4"> Latest news <span class="act "> &</span> New updates</h1>
                    <form class="">
                        <div class="mb-3 mx-auto">
                            <div class="row">
                                <div class="col-md-8 mb-3">
                                    <input type="email" class="form-control enterinp" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter your email ">

                                </div>
                                <div class="col-md-4 mb-3">
                                    <button type="submit" class="text-uppercase text-white subs w-100">subscribe</button>
                                </div>
                            </div>
                        </div>
                        <div class="mt-4 form-check">
                            <label class="form-check-label sign" for="exampleCheck1"> <input type="checkbox" class="form-check-input" id="exampleCheck1"><span>Sign up for our newsletter</span></label>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
-->

    <div class="pt-4" style=" background-color: hsla(0, 0%, 85.9%, 0.1);">
        <div class=" container py-5 mt-5">
            <div class="mx-auto text-center ">
                <a href="Home.html" class="text-decoration-none "><h2 class="h2 fw-bolder text-black "> Ceramic Choice </h2> </a>
                <p class=" mb-0 pb-0 mt-4"> Elevate your space with timeless ceramics</p>
                <p>  where beauty meets functionality. </p>
                <div class=" row mt-5 pt-5">
                    <div class=" col-md-4">
                        <img src="img/13.png" class=" img-fluid " width=" 40" />
                        <h4 class=" mt-2 ">EMAIL</h4>
                        <p>info@ceramicchoice.lk</p>
                    </div>


                    <div class=" col-md-4">
                        <img src="img/14.png" class=" img-fluid " width=" 40" />
                        <h4 class=" mt-2 ">  FIND</h4>
                        <p class=" mb-0 pb-0">  NO-240, OLD NEGAMBO ROAD </p>
                        <p>  USWETAKEYYAWA, WATTALA</p>
                    </div>
                    <div class=" col-md-4">
                        <img src="img/15.png" class=" img-fluid " width=" 40" />
                        <h4 class=" mt-2 ">CALL   </h4>
                        <p class=" mb-0 pb-0">
                            +94 766 464 724, +94 777 808 872,
                        </p>
                        <p>   +94 773 661 940</p>
                        
                    </div>
                </div>

            </div>
        </div>

        <div class="mx-auto text-center py-4 " style=" border-top: 1px solid #ebebeb; background-color: hsla(0, 0%, 85.9%, 0.1);">
            <p class="m-0 p-0">
                Designed & Developed by <strong><a href="https://www.clsidea.com" target="_blank" rel="noopener noreferrer">CLS IDEA</a></strong>
            </p>
        </div>
    </div>
    <script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>


















