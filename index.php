
<?php
include dirname(__FILE__) . '/.private/config.php';
<?php require 'include/title.php';?>
 <body style="background-color:white !important;">
   <?php require 'include/header.php'; ?>

<?php
//print_r($_SESSION);

ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);
?>
   <section class="carousel-slider-main text-center border-top border-bottom bg-white" style="margin-top:59px;">
<div class="owl-carousel owl-carousel-slider">
    <?php
$query = "SELECT * FROM `tbl_banner` where `status` = 1";
$sql = $con->query($query);
while($rowy = $sql->fetch_assoc())
{
    ?>
    <div class="item">
<a href="#"><img class="img-fluid" src="app/<?php echo $rowy['bimg'];?>"></a>
</div>
<?php
}
?>

</div>
</section>


<!-- Old Ccategory -->

<!-- <section class="top-category section-padding">
<div class="container">
   <div class="section-header">
 <h5 class="heading-design-h5">Shop By Category
</h5>
</div>
<div class="product-items-slider section-padding" style="margin-top: -50px;">
<div class="row">


<?php
    $query = "select * from tbl_cat where `isdeleted`=0 and status=1 ORDER BY vieworder"; 
                           $sql = $con->query($query);
                           while($rowy = $sql->fetch_assoc())
                           {
                           $caegoryid= $rowy['id']
?>


<div class="item">
<div class="category-item" >
<a href="cat_product.php?id=<?php echo $caegoryid;?>">
<img class="img-fluid" src="app/<?php echo $rowy['cimg']; ?>" alt="" style="border-radius: 0px;width:200px;height:200px;" >
<h6 style="font-size: 22px"><?php echo $rowy['title']; ?></h6>

<?php
$countsql= mysqli_query($con,"SELECT COUNT(*) as productcounts FROM `tbl_product` where `catid`='$caegoryid' and `status`='1'");
$productcountsq=mysqli_fetch_assoc($countsql);
$productcounts= $productcountsq['productcounts'];
?>
<?php if($productcounts) { ?>
<p><?php echo $productcounts;?> Items</p>
<?php 
}
?>
</a>
</div>
</div>
<?php
}
?>
</div>
</div>
</div>
</section> -->


<!-- Old Category End -->

<!-- New Category -->
 <!-- top-category hide class name below section -->
<section class="mt-5 section-padding text-center" style="background: #fff; margin-bottom: 15px; padding: 14px 0;">
  <div class="container">
    <div class="section-header">
      <h5 class="heading-design-h5" style="font-size: 25px; margin-bottom: 14px;font-weight:bold;">Shop By Category</h5>
    </div>

    <div class="row mt-5 justify-content-center">
      <?php
      $query = "SELECT * FROM tbl_cat WHERE isdeleted=0 AND status=1 ORDER BY vieworder";
      $sql = $con->query($query);
      while($rowy = $sql->fetch_assoc()):
        $categoryid = $rowy['id'];
      ?>
      <div class="col-lg-2 col-md-3 col-4 mb-4 text-center">
        <a href="cat_product.php?id=<?php echo $categoryid; ?>" class="d-block" style="text-decoration: none; color: inherit;">
          <div style="background: #fff; border-radius: 50%; box-shadow: 0 2px 8px rgba(0,0,0,0.1); padding: 10px; width: 120px; height: 120px; margin: 0 auto; overflow: hidden; transition: transform 0.3s;">
            <img src="app/<?php echo $rowy['cimg']; ?>" alt="<?php echo $rowy['title']; ?>" style="width: 100%; height: 100%; object-fit: cover; border-radius: 50%;">
          </div>
          <h6 style="margin-top: 10px; font-size: 16px; font-weight: bold;"><?php echo $rowy['title']; ?></h6>
          <?php
          $countsql = mysqli_query($con, "SELECT COUNT(*) as productcounts FROM tbl_product WHERE catid='$categoryid' AND status='1'");
          $productcountsq = mysqli_fetch_assoc($countsql);
          $productcounts = $productcountsq['productcounts'];
          if($productcounts):
          ?>
          <p style="font-size: 13px; color: gray; margin: 5px 0 0;"><?php echo $productcounts; ?> Items</p>
          <?php endif; ?>
        </a>
      </div>
      <?php endwhile; ?>
    </div>
  </div>
</section>



<!-- New Category -->
<!-- start of collection -->



<?php
$query = "SELECT * FROM `tbl_collection` where status=1";
$sql = $con->query($query);
$row_cnt = mysqli_num_rows($sql);
if($row_cnt>0)
{
   ?>
   <section class="product-items-slider section-padding">
<div class="container">
<div class="section-header">
 <h5 class="heading-design-h5">Top Offers
</h5>
</div>
<div class="owl-carousel owl-carousel-featured">
   <?php
while($row = $sql->fetch_assoc())
{
                     ?>
					 <a href="collection_product.php?id=<?php echo $row['id']; ?>&n=<?php echo $row['title']; ?>">
<div class="item">
<div class="product">
     <h4 class="heading-design-h4 float-right"><span class="badge badge-success"><?php echo $row['collectiondiscount']; ?> % OFF</span></h4>


<div class="product-header">
<img class="img-fluid" src="app/<?php echo $row['cimg']; ?>" alt="">
<!--<span class="non-veg text-danger mdi mdi-circle"></span>-->
<h5 class="heading-design-h5"><?php echo $row['title']; ?></h5>
</div>

</div>
</div>
</a>

<?php 
}
?>
</div>
</div>
</section>
<?php
}
?>



<!-- end of collection -->

<!-- Product List -->
<?php
$p_query = "SELECT * FROM `tbl_product` WHERE `status`=1 AND `isdeleted`=0 ORDER BY productpriority DESC LIMIT 12";
$p_sql = $con->query($p_query);
?>
<div class="container">
<div class="row">
<?php
if($p_sql->num_rows > 0){
  while($p_row = $p_sql->fetch_assoc()){
    $price = $p_row['price'];
    $pdisc = $p_row['pdisc'];
    $product_id = $p_row['id'];

    $user_id = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : 0;
    $c_qty = 0;

    if ($user_id) {
      $c_query = $con->query("SELECT quantity FROM `tbl_user_cart` WHERE `user_id`='$user_id' AND `product_id`='$product_id'");
      if ($c_query->num_rows > 0) {
        $row_cart = $c_query->fetch_assoc();
        $c_qty = intval($row_cart['quantity']);
      }
    }
?>
<div class="col-6 col-md-3 mb-3">
  <div class="product" style="padding:10px; background: #fff; box-shadow: 0 2px 8px rgba(0,0,0,0.1);">
    <a href="productdescription.php?pid=<?php echo $product_id; ?>">
      <img class="img-fluid" src="app/<?php echo $p_row['pimg']; ?>" alt="" style="object-fit:cover; border-radius:10px; height:200px; width:100%;">
    </a>

    <div class="product-body text-left mt-2">
      <h4 class="float-right" style="position:absolute; top:0; left:0;">
        <span class="badge badge-success"><?php if($pdisc) echo $pdisc.'% OFF'; ?></span>
      </h4>
      <h4 class="mt-2" style="color:#0cc5b7; font-weight:bold; font-size:18px;"> <?php echo $p_row['ptitle']; ?> </h4>
      <p style="font-size:13px; color:gray; margin:0;">HSN CODE: <?php echo $p_row['hsn_code']; ?></p>
      <p style="font-size:13px; color:gray;"> <?php echo $p_row['unit_value'] . " " . $p_row['unit']; ?> </p>
      <?php if($pdisc){ ?>
        <h4>₹ <?php echo round($price - ($pdisc * $price) / 100); ?> <del style="font-size:14px;">₹ <?php echo $price; ?></del></h4>
      <?php } else { ?>
        <h4>₹ <?php echo $price; ?></h4>
      <?php } ?>
    </div>

    <!-- Hidden input to use in JS -->
<input type="hidden" id="userlogid" value="<?php echo $user_id; ?>">

<div class="product-footer text-center">
  <?php if(!$user_id){ ?>
    <!-- Guest user view -->
    <button class="btn btn-sm mt-2" style="border:2px solid red; width:100%;" data-toggle="modal" data-target="#bd-example-modal">
      <i class="mdi mdi-cart-outline"></i> Add to Cart
    </button>

  <?php } else { ?>
    <!-- Logged-in user -->
    <div id="product-action<?php echo $product_id; ?>">
      <?php if($c_qty > 0){ ?>
        <!-- If already in cart, show counter -->
        <div class="quantity buttons_added mt-2"
          style="width:100%; border:2px solid red; border-radius:49px; justify-content:space-between; display:flex;"
          id="counter<?php echo $product_id; ?>">
          
          <input type="button" value="-" class="minus-btn" onclick="cartMinus(<?php echo $product_id; ?>)"
            style="background-color:#FF474C;width:30px;border:none;border-radius:49px;color:white;font-weight:bold;">
          
          <input type="text" disabled value="<?php echo $c_qty; ?>" 
            class="input-text qty text" id="counter-value<?php echo $product_id; ?>">
          
          <input type="button" value="+" class="plus-btn" onclick="cartPlus(<?php echo $product_id; ?>)"
            style="background-color:red;width:30px;border:none;border-radius:49px;color:white;font-weight:bold;">
        </div>
      <?php } else { ?>
        <!-- If not in cart, show Add to Cart button -->
        <button class="btn btn-sm mt-2" style="border:2px solid red; width:100%;" onclick="addCart(<?php echo $product_id; ?>)">
          <i class="mdi mdi-cart-outline"></i> Add to Cart
        </button>
      <?php } ?>
    </div>
  <?php } ?>
</div>



  </div>
</div>
<?php }} else { echo "No products found."; } ?>
</div>
</div>
<!-- Product End -->
<script>
function addCart(product_id){
  var user_id = $('#userlogid').val();
  if(!user_id){
    window.location.href = "login.php";
    return;
  }

  $.post("session/save_cart.php", {productid: product_id, p_qty: 1, type: "save"}, function(res){
    var json = JSON.parse(res);
    if(json.status == "1"){
      // Build the counter HTML with dynamic JS-safe onclicks
      var counterHtml = `
        <div class="quantity buttons_added mt-2" style="width:100%; border:2px solid red; border-radius:49px; justify-content:space-between; display:flex;" id="counter${product_id}">
          <input type="button" value="-" class="minus-btn" onclick="cartMinus(${product_id})" style="background-color:#FF474C;width:30px;border:none;border-radius:49px;color:white;font-weight:bold;">
          <input type="text" disabled value="1" class="input-text qty text" id="counter-value${product_id}">
          <input type="button" value="+" class="plus-btn" onclick="cartPlus(${product_id})" style="background-color:red;width:30px;border:none;border-radius:49px;color:white;font-weight:bold;">
        </div>
      `;
      $("#product-action" + product_id).html(counterHtml);

      // Update cart count
      $("#cart-count, #cart-value").text(json.cart_count);
      $("#carttotalval").val(json.cart_count);
    }
  });
}



function cartMinus(product_id){
  var qty = parseInt($("#counter-value" + product_id).val());
  if(qty <= 1){
    $.post("session/save_cart.php", {productid: product_id, p_qty: 1, type: "delete"}, function(res){
      var json = JSON.parse(res);
      if(json.status == "1"){
        // Replace counter with Add to Cart button
        var addBtn = `
          <button class="btn btn-sm mt-2" style="border:2px solid red; width:100%;" onclick="addCart(${product_id})">
            <i class="mdi mdi-cart-outline"></i> Add to Cart
          </button>
        `;
        $("#product-action" + product_id).html(addBtn);

        // Update cart count
        $("#cart-count, #cart-value").text(json.cart_count);
        $("#carttotalval").val(json.cart_count);
      }
    });
  } else {
    qty--;
    $.post("session/save_cart.php", {productid: product_id, p_qty: qty, type: "update"}, function(res){
      var json = JSON.parse(res);
      if(json.status == "1"){
        $("#counter-value" + product_id).val(qty);
        $("#cart-count, #cart-value").text(json.cart_count);
        $("#carttotalval").val(json.cart_count);
      }
    });
  }
}


function cartPlus(product_id){
  var qty = parseInt($("#counter-value" + product_id).val()) + 1;
  $.post("session/save_cart.php", {productid: product_id, p_qty: qty, type: "update"}, function(res){
    var json = JSON.parse(res);
    if(json.status == "1"){
      $("#counter-value" + product_id).val(qty);
      $("#cart-count, #cart-value").text(json.cart_count);
      $("#carttotalval").val(json.cart_count);
    }
  });
}
</script>

<!-- Product List End -->


<section class="section-padding bg-white border-top">
<div class="container">
<div class="row">
<div class="col-lg-4 col-sm-6">
<div class="feature-box">
<i class="mdi mdi-chevron-right"></i>
<h6>In Chennai Next Day Delivery</h6>
<p></p>
</div>
</div>
<div class="col-lg-4 col-sm-6">
<div class="feature-box">
<i class="mdi mdi-chevron-right"></i>
<h6>In Tamil Nadu Within 2 Days</h6>
<p></p>
</div>
</div>
<div class="col-lg-4 col-sm-6">
<div class="feature-box">
<i class="mdi mdi-chevron-right"></i>
<h6>Out Side Tamil Nadu 5 Days</h6>
<p></p>
</div>
</div>
</div>
</div>
</section>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>





<script>
$(document).ready(function(){
  $(".d-block").hover(function(){
    $(this).find("div").css("transform", "translateY(-5px)");
  }, function(){
    $(this).find("div").css("transform", "translateY(0)");
  });
});
</script>






								 
								 
   <?php require 'include/footer.php'; ?>
</body>
</html>
