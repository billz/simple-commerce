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

$product_code = 'AB-CHASECAM';
$display_amount = formatCurrency($_SESSION['products'][$product_code]['unit_amount'], -2);

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
    <title><?php echo $_SESSION['shop']['name']; ?> | Order an AirBuddy™ Pro chase cam</title>
    <?php require_once 'includes/header.php'; ?>
    <script src="https://js.stripe.com/v3/"></script>
</head>
<body>

<?php require_once 'includes/navbar.php'; ?>

<section class="image2 cid-sbAfFaJs0e" id="image2-u">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-12 col-lg-6">
                <!-- slideshow container -->
                <div class="slideshow-container">

                  <!-- full-width images with numbers + captions -->
                  <div class="mySlides">
                    <div class="numbertext">1 / 3</div>
                    <img class="image-zoom" src="<?php echo $_SESSION['products'][$product_code]['local_img'][0]; ?>" data-zoom="<?php echo $_SESSION['products'][$product_code]['local_img'][0]; ?>" style="width:100%">
                    <div class="text"><?php echo $_SESSION['products'][$product_code]['caption'][0]; ?></div>
                  </div>
                  <div class="mySlides">
                    <div class="numbertext">2 / 3</div>
                    <img src="<?php echo $_SESSION['products'][$product_code]['local_img'][1]; ?>" style="width:100%">
                    <div class="text"><?php echo $_SESSION['products'][$product_code]['caption'][1]; ?></div>
                  </div>
                  <div class="mySlides">
                    <div class="numbertext">3 / 3</div>
                    <img src="<?php echo $_SESSION['products'][$product_code]['local_img'][2]; ?>" style="width:100%">
                    <div class="text"><?php echo $_SESSION['products'][$product_code]['caption'][2]; ?></div>
                  </div>
                  <!-- Next and previous buttons -->
                  <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
                  <a class="next" onclick="plusSlides(1)">&#10095;</a>
                </div>

                <!-- indicators -->
                <div style="text-align:center">
                  <span class="dot" onclick="currentSlide(1)"></span>
                  <span class="dot" onclick="currentSlide(2)"></span>
                  <span class="dot" onclick="currentSlide(3)"></span>
                </div>
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
                    <?php echo $_SESSION['products'][$product_code]['description']; ?>

                    Questions? Check out our <a href="">Quick start guide</a> or
                    <script language="JavaScript">user = 'hello';site = '<?php echo $_SESSION['shop']['domain_name']; ?>';document.write('<a href=\"mailto:' + user + '@' + site + '\">');document.write('drop us a message' + '</a>');</script>.</p>
                   
                    <?php if ( $_SESSION['products'][$product_code]['promo'] == true ) : ?>
                        <h6 class="mbr-fonts-style mb-0 display-6"><a href="/detail.php?item_id=AB-LOGOBUFF">** Pilot logo buff included with your order!</a></h6>
                    <?php endif; ?>

                    <div id="bootstrap-accordion_1" class="panel-group accordionStyles accordion" role="tablist" aria-multiselectable="true">
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
                                      Main body: Carbon fiber, CNC aluminum, nylon & Cordura®<br />
                                      Line: Type III 550 paracord, 3mm elastic, titanium, stainless steel & aluminum mini-carabiner<br />
                                      Main body weight: 56g<br />
                                      Line weight: 43g<br />
                                      Combined weight: 99g (3.5 oz)<br />
                                      Length (extended): 64.5cm (25")<br />
                                      Length (folded): 25.5cm (10")
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div id="bootstrap-accordion_2" class="panel-group accordionStyles accordion" role="tablist" aria-multiselectable="true">
                        <div class="card mt-2 mb-3">
                            <div class="card-header" role="tab" id="headingOne">
                                <a role="button" class="panel-title collapsed" data-toggle="collapse" data-core="" href="#collapse2" aria-expanded="false" aria-controls="collapse1">
                                    <h6 class="panel-title-edit mbr-fonts-style mb-0 display-7">Line options
                                    <span class="sign mbr-iconfont inactive mbri-arrow-next"></span></h6>
                                </a>
                            </div>
                            <div id="collapse2" class="panel-collapse noScroll collapse" role="tabpanel" aria-labelledby="headingOne" data-parent="#bootstrap-accordion_2">
                                <div class="card-body line-options">
                                    <div class="row">
                                        <div id="inline-img" class="col md-6 text-left mbr-text mbr-fonts-style display-6">
                                            <ul>
                                                <?php echo productImgVariants(lineOptions()) ?>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>  

                    <form method="post" action="cart/add" id="ajax-orderform" class="needs-validation" novalidate>
                        <div class="form-group">
                            <label for="line-options" class="mbr-text mbr-fonts-style display-7">Line option</label>
                            <div class="col-sm-8">
                                <select class="custom-select" name="line_option" required>
                                  <option selected disabled value=""><?php echo "Choose a line option..." ?></option>
                                  <?php echo optionsForSelect(lineOptions()); ?>
                                </select>
                                <div class="invalid-feedback">Please select a line option.</div>
                            </div>

                            <label for="quantity" class="mbr-text mbr-fonts-style mt-2 display-7">Quantity</label>
                            <div class="col-sm-8">
                                <?php selectQty('quantity', $_SESSION['products'][$product_code]['max_quantity']); ?>

                                <input type="hidden" name="product_code" value="<?php echo $product_code; ?>">
                                <input type="hidden" name="unit_amount" value="<?php echo $sale_amount; ?>">
                                
                                <div class="d-flex flex-row">
                                    <div>
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
                    </form>
                </div>
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
