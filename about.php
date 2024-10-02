<?php
require 'vendor/autoload.php';
require_once 'includes/class.Cart.php';
require_once 'includes/session.php';
require_once 'includes/config.php';
require_once 'includes/functions.php';
require_once 'includes/shop.php';
require_once 'includes/products.php';
require_once 'includes/basket.php';
?>
<!DOCTYPE html>
<html>
<head>
  <title><?php echo $_SESSION['shop']['name']; ?> | About us</title>
  <meta charset="UTF-8">
  <?php require_once 'includes/header.php'; ?>
</head>
<body>

<?php require_once 'includes/navbar.php'; ?>

<section class="cid-s9aykP92fe" id="form2-o">
    <div class="container">
        <div class="row">
            
            <div class="col-lg-12 col-md-12 col-sm-12">
                    <h1 class="mbr-section-title mb-4 display-2"><strong>About us</strong></h1>
            </div>
        </div>    
        <div class="row">
            <div class="col-12 col-lg-6">
                <div class="image-wrapper">
                    <img src="assets/images/breithorn.jpg" alt="">
                    <p class="mbr-text mbr-fonts-style mt-2 align-center text-white display-7">Product testing in the Alps</p>
                </div>
            </div>
            <div class="col-12 col-lg">
                <div class="text-wrapper">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                    <p class="mbr-section-subtitle mbr-fonts-style mb-3 text-left display-7"><?php echo $_SESSION['shop']['name']; ?>™ develops its products from our base in Chamonix, France before offering them to flying enthusiasts all over the world.</p>

                    <p class="mbr-section-subtitle mbr-fonts-style mb-3 text-left display-7">Lightness and simplicity informs everything we do. We work closely with our team of pilot athletes, mountain guides and alpinists to test <?php echo $_SESSION['shop']['name']; ?>™ products in some of the most demanding mountain environments on earth.</p>

                    <p class="mbr-section-subtitle mbr-fonts-style mb-3 text-left display-7"><?php echo $_SESSION['shop']['name']; ?>™ devotes all of its resources to imagining and creating products to help you achieve your flying goals.</p>

                    <p class="mbr-section-subtitle mbr-fonts-style mb-3 text-left display-7">If you like what we do, <a href="contact.php">stay in touch</a> and join the adventure.</p>

                    <p class="mbr-section-subtitle mbr-fonts-style mb-3 mr-5 text-right display-7">&#151; team <?php echo $_SESSION['shop']['name']; ?></p>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>

<?php require_once 'includes/footer.php'; ?>
<?php require_once 'includes/footer-scripts.php'; ?>
<script src="assets/formoid/formoid.min.js"></script>
<?php require_once 'includes/ga.php'; ?>

</body>
</html>
