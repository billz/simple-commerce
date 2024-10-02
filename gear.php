<?php
require 'vendor/autoload.php';
require_once 'includes/class.Cart.php';
require_once 'includes/session.php';
require_once 'includes/config.php';
require_once 'includes/functions.php';
require_once 'includes/shop.php';
require_once 'includes/products.php';
require_once 'includes/basket.php';

$product_codes = [
    'AB-RESCUE',
    'AB-STUFFSACK',
    'AB-LOGOBUFF',
    'AB-WOODYSTEP'
];
?>
<!DOCTYPE html>
<html>
<head>
    <title><?php echo $_SESSION['shop']['name']; ?> | Pilot gear</title>
    <?php require_once 'includes/header.php'; ?>
    <script src="https://js.stripe.com/v3/"></script>
</head>
<body>

<?php require_once 'includes/navbar.php'; ?>

<section data-bs-version="5.1" class="features10 cid-tkeRVFkcb6" id="features11-1i">
    <div class="container">
        <div class="title">
            <h3 class="mbr-section-title mbr-fonts-style align-center mb-5 display-2">
                <strong>Pilot gear</strong>
            </h3>
        </div>
        <?php foreach ($product_codes as $product) : ?>
        <div class="card">
            <div class="card-wrapper">
                <div class="row align-items-center">
                    <div class="col-12 col-md-3">
                        <div class="image-wrapper">
                            <a href="<?php echo $_SESSION['products'][$product]['shop_page']; ?>">
                            <img src="<?php echo $_SESSION['products'][$product]['local_img'][0]; ?>" alt="<?php echo $_SESSION['products'][$product]['name_ext']; ?>"></a>
                        </div>
                    </div>
                    <div class="col-12 col-md">
                        <div class="card-box">
                            <div class="row">
                                <div class="col-12">
                                    <div class="top-line">
                                        <a href="<?php echo $_SESSION['products'][$product]['shop_page']; ?>">
                                        <h4 class="card-title mbr-fonts-style display-5"><strong><?php echo $_SESSION['products'][$product]['name']; ?></strong></h4></a>
                                            <p class="cost mr-3 mbr-fonts-style display-5">
                                            <?php if ( $_SESSION['products'][$product]['discount_amount'] < $_SESSION['products'][$product]['unit_amount'] ) {
                                                echo formatCurrency($_SESSION['products'][$product]['discount_amount'], -2);
                                                echo '&nbsp;<span class="markdown">' .formatCurrency($_SESSION['products'][$product]['unit_amount'], -2). '</span></h3>';
                                            }  else {
                                                echo formatCurrency($_SESSION['products'][$product]['unit_amount'], -2);
                                            }
                                            ?>
                                            </p>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="bottom-line pr-3">
                                        <p class="mbr-text mbr-fonts-style m-0 display-7">
                                            <?php echo $_SESSION['products'][$product]['short_desc']; ?>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php endforeach; ?>
    </div>
</section>  

<?php require_once 'includes/footer.php'; ?>
<?php require_once 'includes/footer-scripts.php'; ?>
<script src="assets/theme/js/slider.js"></script>
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
