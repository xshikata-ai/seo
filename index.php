
<?php
include dirname(__FILE__) . '/.private/config.php';
?>
<!DOCTYPE html>
<html lang="en" >

<head>
  <meta charset="UTF-8">
  

    <link rel="apple-touch-icon" type="image/png" href="https://cpwebassets.codepen.io/assets/favicon/apple-touch-icon-5ae1a0698dcc2402e9712f7d01ed509a57814f994c660df9f7a952f3060705ee.png" />

    <meta name="apple-mobile-web-app-title" content="CodePen">

    <link rel="shortcut icon" type="image/x-icon" href="https://cpwebassets.codepen.io/assets/favicon/favicon-aec34940fbc1a6e787974dcd360f2c6b63348d4b1f4e06c77743096d55480f33.ico" />

    <link rel="mask-icon" type="image/x-icon" href="https://cpwebassets.codepen.io/assets/favicon/logo-pin-b4b4269c16397ad2f0f7a01bcdf513a1994f4c94b8af2f191c09eb0d601762b1.svg" color="#111" />



  
    <script src="https://cpwebassets.codepen.io/assets/common/stopExecutionOnTimeout-2c7831bb44f98c1391d6a4ffda0e1fd302503391ca806e7fcc7b9b87197aec26.js"></script>


  <title>Banjarshop.com</title>

    <link rel="canonical" href="https://codepen.io/servocorp/pen/poQaWmZ">
  
  
  
  
<style>
body {
  margin: 0;
  font: normal 75% Arial, Helvetica, sans-serif;
}

.container {
  position: relative;
  z-index: 2;
  text-align: center;
  overflow: auto;
  pointer-events: none;
}

.jumbo {
  background-color: #151d1eb4;
  width: 50%;
  margin: 0 auto;
  border-radius: 25px;
  border-color: #5be54660;
  border-style: solid;
  border-width: 1px;
  margin-top: 30vh;
  pointer-events: all;
}

.jumbo .jumbo-text {
  color: #fff;
  font-size: 140%;
}

.corp {
  color: #5be546;
}

.rounded {
  width: 50%;
  color: #5be546;
}

.footer {
  position: absolute;
  z-index: 2;
  bottom: 0;
  width: 100%;
}

.footer-text {
  color: #fff;
  text-align: center;
  font-size: larger;
}

/* particles */
canvas {
  display: block;
}

#particles-js {
  position: absolute;
  width: 100%;
  height: 100%;
  background-color: #0d1213;
  background-image: url("");
  background-repeat: no-repeat;
  background-size: cover;
  background-position: 50% 50%;
  z-index: 2;
}
</style>

  <script>
  window.console = window.console || function(t) {};
</script>

  
  
</head>

<body translate="no">
  <html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Banjarshop.com</title>
        <meta name="description" content="A profound web development company">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="assets/css/main.css">
    </head>
    <body>
        <div id="particles-js"></div>
        <div class="container">
            <div class="jumbo">
                <div class="jumbo-text">
                    <h1>Welcome to<span class="corp"> Banjarshop.com</span></h1>
                    <h3>Banjar Shop</h3>
                    <hr class="rounded">
                    <p>Coming Soon - <span class="corp">2024</span></p>

                </div>
            </div>
        </div>
        <div class="footer">
            <p class="footer-text"> Dev <span class="corp">ALi</span></p>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/particles.js@2.0.0/particles.min.js" type="text/javascript"></script>
        <script src="assets/js/main.js" type="text/javascript"></script>
    </body>
</html>
  
      <script id="rendered-js" >
particlesJS("particles-js", {
  "particles": {
    "number": {
      "value": 40,
      "density": {
        "enable": true,
        "value_area": 500 } },


    "color": {
      "value": "#5ce546" },

    "shape": {
      "type": "polygon",
      "stroke": {
        "width": 0,
        "color": "#000000" },

      "polygon": {
        "nb_sides": 5 },

      "image": {
        "src": "img/github.svg",
        "width": 100,
        "height": 100 } },


    "opacity": {
      "value": 0.5,
      "random": false,
      "anim": {
        "enable": false,
        "speed": 1,
        "opacity_min": 0.1,
        "sync": false } },


    "size": {
      "value": 3,
      "random": true,
      "anim": {
        "enable": false,
        "speed": 40,
        "size_min": 0.1,
        "sync": false } },


    "line_linked": {
      "enable": true,
      "distance": 150,
      "color": "#ffffff",
      "opacity": 0.4,
      "width": 1 },

    "move": {
      "enable": true,
      "speed": 2,
      "direction": "none",
      "random": false,
      "straight": false,
      "out_mode": "out",
      "bounce": false,
      "attract": {
        "enable": false,
        "rotateX": 600,
        "rotateY": 1200 } } },



  "interactivity": {
    "detect_on": "canvas",
    "events": {
      "onhover": {
        "enable": true,
        "mode": "grab" },

      "onclick": {
        "enable": false,
        "mode": "push" },

      "resize": true },

    "modes": {
      "grab": {
        "distance": 140,
        "line_linked": {
          "opacity": 1 } },


      "bubble": {
        "distance": 400,
        "size": 40,
        "duration": 2,
        "opacity": 8,
        "speed": 3 },

      "repulse": {
        "distance": 200,
        "duration": 0.4 },

      "push": {
        "particles_nb": 4 },

      "remove": {
        "particles_nb": 2 } } },



  "retina_detect": true });
//# sourceURL=pen.js
    </script>

  
</body>

</html>
