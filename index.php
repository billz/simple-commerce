<?php
require 'vendor/autoload.php';
require_once 'includes/class.Cart.php';
require_once 'includes/session.php';
require_once 'includes/config.php';
require_once 'includes/functions.php';
require_once 'includes/shop.php';
require_once 'includes/products.php';
require_once 'includes/basket.php';

$product_code = "AB-CHASECAM";

?>
<!DOCTYPE html>
<html>
<head>
  <title><?php echo $_SESSION['shop']['name']; ?> | <?php echo $_SESSION['shop']['brand_text']; ?></title>
  <?php require_once 'includes/header.php'; ?>
</head>
<body>

<?php require_once 'includes/navbar.php'; ?>
	
<section class="header1 cid-s48MCQYojq mbr-fullscreen" data-bg-video="https://www.youtube.com/watch?v=ynecy-GSOe0" id="header1-f">
    <div class="align-center container">
        <div class="row justify-content-center">
            <div class="col-12 col-lg-8">
                <h1 class="mbr-section-title mbr-fonts-style mb-3 display-5"><strong>Take off with AirBuddy</strong></h1>         
                <p class="mbr-text mbr-fonts-style display-7">Capture your flight from takeoff to landing, handsfree.&nbsp;<br>Compatible with all action cameras.</p>
            </div>
        </div>
    </div>
</section>

<section class="content1 cid-s48udlf8KU" id="content1-8">
    <div class="container">
        <div class="row justify-content-center">
            <div class="title col-12 col-md-9">
                <h3 class="mbr-section-title mbr-fonts-style align-center mb-4 display-2"><strong>Ultralight and rugged</strong></h3>
                <h4 class="mbr-section-subtitle align-center mbr-fonts-style mb-4 display-7">AirBuddy is the ultimate compact, featherweight carbon fiber follow cam for human-powered airsports. With a total weight of just 99 grams, AirBuddy is practically weightless in your flying kit. This figure is achieved with top-quality materials like premium carbon fiber, aircraft-grade CNC aluminum, titanium and Ripstop Cordura®. It adds up to an extremely rugged yet light and packable flying companion. Optimized for hike and fly pursuits&#151;at home at any takeoff in the world.</h4>  
            </div>
        </div>
    </div>
</section>

<section class="image3 cid-s48upRUlSD" id="image3-9">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-lg-8">
                <div class="image-wrapper">
                    <img src="assets/images/img-0561-scale-1456x1456.jpg" alt="AirBuddy scale">
                    <p class="mbr-description mbr-fonts-style mt-2 align-center display-4">At just over 50g, the world's lightest chase cam mount</p>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="content1 cid-s48vnjULo4" id="content1-b">  
    <div class="container">
        <div class="row justify-content-center">
            <div class="title col-12 col-md-9">
                <h3 class="mbr-section-title mbr-fonts-style align-center mb-4 display-2"><strong>Ready for action</strong></h3>
                <h4 class="mbr-section-subtitle align-center mbr-fonts-style mb-4 display-7">With a universal mount, AirBuddy is compatible with existing action cameras, including all current GoPro and Insta360 models. Unlike other follow camera systems, AirBuddy is fully adjustable in pitch and yaw, giving you total control of your capture angle.</h4>
		<div class="image-wrapper">
                    <img src="assets/images/autumn-flight-1456x1026.jpg" alt="autumn flight">
                    <p class="mbr-description mbr-fonts-style mt-2 align-center display-4">
                        Capture dramatic handsfree photos & video</p>
                </div>

            </div>
        </div>
    </div>
</section>

<section class="content1 cid-s48vnjULo4" id="content1-c">
    <div class="container">
        <div class="row justify-content-center">
            <div class="title col-12 col-md-9">
                <h3 class="mbr-section-title mbr-fonts-style align-center mb-4 display-2"><strong>Made by pilots for pilots</strong></h3>
                <h4 class="mbr-section-subtitle align-center mbr-fonts-style mb-4 display-7">Developed and tested in Chamonix, AirBuddy grew from the need for a lightweight yet durable chase camera solution for paragliders. With hike and fly takeoffs requiring thousands of vertical meters of ascent, minimizing weight was of utmost importance. At the same time, it had to withstand rough use in high alpine conditions. If it works here, it will work anywhere.&nbsp;&nbsp;</h4>
		<div class="image-wrapper">
                    <img src="assets/images/hike-and-fly-800x564.jpg" alt="hike and fly">
                    <p class="mbr-description mbr-fonts-style mt-2 align-center display-4">
                        Optimized for hike & fly, at home at any takeoff</p>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="content1 cid-s48vnjULo4" id="content1-c">
    <div class="container">
        <div class="row justify-content-center">
            <div class="title col-12 col-md-9">
                <h3 class="mbr-section-title mbr-fonts-style align-center mb-4 display-2"><strong>Ordering</strong></h3>
                <h4 class="mbr-section-subtitle align-center mbr-fonts-style mb-4 display-7">The AirBuddy™ Pro chase camera system is proudly made in Chamonix, France and ships worldwide. Learn more <a href="about.php">about us</a> and <a href="ordering.php">ordering</a> our products.</h4>
            </div>
            <div class="col-lg-12 col-md-12 col-sm-12 align-center mbr-section-btn">
                <a href="order.php" class="btn btn-primary align-center display-5">Order now</a>
            </div>
        </div>
    </div>
</section>

<section class="content1 cid-s48vnjULo4" id="content1-c">
    <div class="container">
        <div class="row justify-content-center">
            <div class="title col-12 col-md-9">
                <h3 class="mbr-section-title mbr-fonts-style align-center mb-4 display-2"><strong>Questions?</strong></h3>
                <h4 class="mbr-section-subtitle align-center mbr-fonts-style mb-4 display-7">Check out our <a href="faq.php">FAQ</a> where we answer frequently asked questions. You can also drop us a message at <SCRIPT LANGUAGE="JavaScript">user = 'hello';site = '<?php echo $_SESSION['shop']['domain_name']; ?>';document.write('<a href=\"mailto:' + user + '@' + site + '\">');document.write(user + '@' + site + '</a>');</SCRIPT>.</h4>
            </div>
        </div>
    </div>
</section>

<?php require_once 'includes/footer.php'; ?>
<?php require_once 'includes/footer-scripts.php'; ?>
<?php require_once 'includes/ga.php'; ?>

</body>
</html>
