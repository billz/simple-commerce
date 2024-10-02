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
  <title><?php echo $_SESSION['shop']['name']; ?> | Free stickers</title>
  <meta charset="UTF-8">
  <?php require_once 'includes/header.php'; ?>
</head>
<body>

<?php require_once 'includes/navbar.php'; ?>

<section class="cid-s9aykP92fe" id="form2-o">
    <div class="container">
        <div class="row">
            
            <div class="col-lg-12 col-md-12 col-sm-12">
                    <h1 class="mbr-section-title mb-4 display-2"><strong>Free stickers</strong></h1>
            </div>
        </div>    
        <div class="row">
            <div class="col-12 col-lg-6">
                <div class="image-wrapper">
                    <img src="assets/images/born-to-fly.jpg" alt="Born to Fly">
                    <p class="mbr-text mbr-fonts-style mt-2 align-center text-white display-7">Monthly free gear givaways</p>
                </div>
            </div>
            <div class="col-12 col-lg">
                <div class="text-wrapper">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                    <p class="mbr-section-subtitle mbr-fonts-style mb-3 text-left display-7">We love stickers so we give away <strong>FREE stickers with every order</strong>. Simply order online in the usual way and we'll automatically include some stickers in with your order.</p>

                    <p class="mbr-section-subtitle mbr-fonts-style mb-3 text-left display-5"><strong>Win free Merchandise</strong></p>

                    <p class="mbr-section-subtitle mbr-fonts-style mb-3 text-left display-7">AirBuddy™ runs a monthly sticker competition
                    where we highlight and reward the best photos of our stickers in the wild. How to enter:</p>

                    <p class="mbr-section-subtitle mbr-fonts-style mb-3 text-left display-7">
                        <ol class="ol-normal">
                            <li class="li-normal">Take a photo of where you stick your <?php echo $_SESSION['shop']['name']; ?>™ stickers. Be creative &#151; we want to laugh, feel inspired and be in awe of your adventures.</li>
                            <li class="li-normal">Upload your best photo to Instagram, tag us <strong>@<?php echo $_SESSION['shop']['domain_name']; ?></strong> and use the hashtag <strong>#FlyAirbuddy</strong></li>
                            <li class="li-normal">Winners will be announced at the beginning of each month on <a href="https://www.instagram.com/">our Instagram.</a></li>
                        </ol>
                    </p>

                    <div>
                        <a href="https://www.instagram.com/" target="_blank">
                            <img class="img-auto ml-5 pt-3" src="assets/images/follow-instagram.png" style="width: 200px !important;" alt="Follow us on Instagram">
                        </a>
                    </div>
                    
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
