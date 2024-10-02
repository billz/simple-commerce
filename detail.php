<?php
require 'vendor/autoload.php';
require_once 'includes/class.Cart.php';
require_once 'includes/session.php';
require_once 'includes/config.php';
require_once 'includes/functions.php';
require_once 'includes/shop.php';
require_once 'includes/products.php';
require_once 'includes/basket.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/');
$dotenv->load();

$product_code = $_GET['item_id'] ?? null;
$err_msg = null;

// fetch item_id, set error if invalid
if ( !isset($product_code) || !array_key_exists($product_code, $_SESSION['products'])) {
    $err_msg = "Item not found";
} else {
    $display_amount = formatCurrency($_SESSION['products'][$product_code]['unit_amount'], -2);
    $img_count = count( $_SESSION['products'][$product_code]['local_img'] );
}
$status = $_SESSION['products'][$product_code]['status'];

if ( $_SESSION['products'][$product_code]['discount_amount'] < $_SESSION['products'][$product_code]['unit_amount'] ) {
    $sale_amount = $_SESSION['products'][$product_code]['discount_amount'];
} else {
    $sale_amount = $_SESSION['products'][$product_code]['unit_amount'];
}

$inventory = $_SESSION['products'][$product_code]['inventory'];
?>
<!DOCTYPE html>
<html>
<head>
    <title><?php echo $_SESSION['shop']['name']; ?> | <?php echo $_SESSION['products'][$product_code]['name']; ?></title>
    <?php require_once 'includes/header.php'; ?>
    <script src="https://js.stripe.com/v3/"></script>
</head>
<body>

<?php require_once 'includes/navbar.php'; ?>

<?php if ($err_msg) : ?>
<section class="cid-s9aykP92fe" id="form2-o">
    <div class="container">
        <div class="row">
           <div class="col-lg-12 col-md-12 col-sm-12">
                <h3 class="mbr-section-title mbr-fonts-style mb-3 display-5">
                    <?php echo $err_msg; ?>
                </h3>
            </div>
            <div class="col-sm-6 mb-3">
                <a href="gear.php"><span class="mobi-mbri mobi-mbri-arrow-prev mbr-iconfont mbr-iconfont-btn"></span> Back to pilot gear</a>
            </div>
        </div>
    </div>
<?php else : ?>

<section class="image2 cid-sbAfFaJs0e" id="image2-u">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-12 col-lg-6">

            <?php if ( $img_count > 1 ): ?>
            <!-- slideshow container -->
            <div class="slideshow-container">
                <?php if ( $status == 'new') : ?><p class="badges_item">new</p><?php endif; ?>
                <!-- full-width images with numbers + captions -->
                <?php for ( $n = 0; $n < $img_count; $n++ ): ?>
                  <div class="mySlides">
                    <div class="numbertext"><?php echo $n+1; ?> / <?php echo $img_count; ?></div>
                    <img class="image-zoom" src="<?php echo $_SESSION['products'][$product_code]['local_img'][$n]; ?>" alt="<?php echo $_SESSION['products'][$product_code]['name_ext']; ?>" data-zoom="<?php echo $_SESSION['products'][$product_code]['local_img'][$n]; ?>" style="width:100%">
                    <div class="text"><?php echo $_SESSION['products'][$product_code]['caption'][$n]; ?></div>
                  </div>
                <?php endfor; ?>
              <!-- Next and previous buttons -->
              <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
              <a class="next" onclick="plusSlides(1)">&#10095;</a>
            </div>

            <!-- indicators -->
            <div style="text-align:center">
            <?php for ( $n = 0; $n < $img_count; $n++ ): ?>
              <span class="dot" onclick="currentSlide(<?php echo $n+1; ?>)"></span>
            <?php endfor; ?>
            </div>
        
            <?php else: // single image in container ?>
            <div class="image-wrapper">
                <?php if ( $status == 'new') : ?><p class="badges_item">new</p><?php endif; ?>
                <img class="image-zoom" src="<?php echo $_SESSION['products'][$product_code]['local_img'][0]; ?>" alt="<?php echo $_SESSION['products'][$product_code]['name_ext']; ?>" data-zoom="<?php echo $_SESSION['products'][$product_code]['local_img'][$n]; ?>">
                <p class="mbr-text mbr-fonts-style mt-2 align-center display-7">
                    <?php echo $_SESSION['products'][$product_code]['caption']; ?></p>
            </div>
            <?php endif; ?>
            </div>

    	    <div class="col-12 col-lg">
                <div class="text-wrapper">
                    <h3 class="mbr-section-title mbr-fonts-style mb-3 display-5">
                        <strong><?php echo $_SESSION['products'][$product_code]['name']; ?>&nbsp;</strong>

                        <?php if ( $_SESSION['products'][$product_code]['discount_amount'] < $_SESSION['products'][$product_code]['unit_amount'] ) {
                            echo formatCurrency($_SESSION['products'][$product_code]['discount_amount'], -2);
                            echo '&nbsp;<span class="markdown">' . $display_amount. '</span></h3>';
                            echo '<p class="mbr-text mbr-fonts-style display-6">';
                        }  else {
                            echo $display_amount . '</h3>';
                        }
                        ?>
                    <p class="mbr-text mbr-fonts-style display-6">
                      <?php echo $_SESSION['products'][$product_code]['description']; ?></p>

                    <?php if ( $_SESSION['products'][$product_code]['promo'] == true ) : ?>
                        <h6 class="mbr-fonts-style mb-0 display-6"><a href="/detail.php?item_id=AB-LOGOBUFF">** Pilot logo buff included with your order!</a></h6>
                    <?php endif; ?>

                    <div id="bootstrap-accordion_1" class="panel-group accordionStyles accordion mb-3" role="tablist" aria-multiselectable="true">
                    <div class="card mt-3">
                        <div class="card-header" role="tab" id="headingOne">
                            <a role="button" class="panel-title collapsed" data-toggle="collapse" data-core="" href="#collapse1" aria-expanded="false" aria-controls="collapse1">
                                <h6 class="panel-title-edit mbr-fonts-style mb-0 display-7">Technical details
                                <span class="sign mbr-iconfont inactive mbri-arrow-next"></span></h6>
                            </a>
                        </div>
                        <div id="collapse1" class="panel-collapse noScroll collapse" role="tabpanel" aria-labelledby="headingOne" data-parent="#bootstrap-accordion_1">
                            <div class="panel-body">
                                <p class="mbr-text mbr-fonts-style display-6">
                                  <?php echo $_SESSION['products'][$product_code]['tech_details']; ?>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <form method="post" action="cart/add" id="ajax-orderform" class="needs-validation" novalidate>
                    <div class="form-group">

                        <input type="hidden" name="product_code" value="<?php echo $product_code; ?>">
                        <input type="hidden" name="unit_amount" value="<?php echo $sale_amount; ?>">

                        <label for="quantity" class="mbr-text mbr-fonts-style display-7">Quantity</label>
                        <div class="col-sm-8">
                            <?php selectQty('quantity', $_SESSION['products'][$product_code]['max_quantity'] ); ?>

                            <div class="d-flex flex-row">
                                <div class="p-1">
                                    <?php if ($inventory == 0): ?>
                                    <button type="button" class="btn btn-primary display-7 mt-3">Out of stock</button>

                                    <p class="mbr-text mbr-fonts-style display-6 mt-2"><a href="contact.php">Notify me</a> when available.</p>
                                    
                                    <?php else: ?>
                                    <button type="button" id="addbasket-button" class="float-left btn btn-primary display-7 mt-3">Add to basket</button>
                                    <?php endif; ?>
                                </div>
                                <div class="p-1">
                                    <a href="basket.php"><p id="basket-status" class="mobi-mbri mobi-mbri-shopping-bag mbr-iconfont mbr-iconfont-btn mt-3 ab-basket ab-status-hidden"><span class="mbr-text mbr-fonts-style display-4 ml-1">added!</span></p></a>
                                </div>
                            </div>
                         </div>
                         <p class="mbr-text mbr-fonts-style mt-2 display-6">
                            <?php require_once 'includes/shipping.php'; ?>
                        </p>
                    </div>
                    <div class="col-sm-6 mb-3 text-md-left">
                        <a href="gear.php"><span class="mobi-mbri mobi-mbri-arrow-prev mbr-iconfont mbr-iconfont-btn"></span> Back to pilot gear</a>
                    </div>
                </form>
                </div>

<?php endif; ?>

            </div>
        </div>
    </div>
</section>    

<?php require_once 'includes/footer.php'; ?>
<?php require_once 'includes/footer-scripts.php'; ?>
<script src="assets/theme/js/slider.js"></script>
<script src="assets/zoom/jquery.zoom.min.js" defer="defer"></script>
<?php require_once 'includes/ga.php'; ?>
<script>
// Disable form submissions if there are invalid fields
(function() {
  'use strict';
  window.addEventListener('load', function() {
    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    var forms = document.getElementsByClassName('needs-validation');
    // Loop over them and prevent submission
    var validation = Array.prototype.filter.call(forms, function(form) {
      form.addEventListener('submit', function(event) {
        if (form.checkValidity() === false) {
          event.preventDefault();
          event.stopPropagation();
        }
        form.classList.add('was-validated');
      }, false);
    });
  }, false);
})();
</script>
</body>
</html>
