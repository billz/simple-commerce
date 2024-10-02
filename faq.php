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
  <title><?php echo $_SESSION['shop']['name']; ?> | Frequently asked questions</title>
  <?php require_once 'includes/header.php'; ?>
</head>
<body>

<?php require_once 'includes/navbar.php'; ?>

<section class="content16 cid-sbCvPrJ6fQ">
<div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-md-8">
                <div class="mbr-section-head align-center">
                    <h3 class="mbr-section-title mb-0 mbr-fonts-style display-5"><strong>Frequently Asked Questions</strong></h3>
                </div>
                <div id="bootstrap-accordion_14" class="panel-group accordionStyles accordion mt-4" role="tablist" aria-multiselectable="true">
                  <div class="card mb-3">
                        <div class="card-header" role="tab" id="headingOne">
                            <a role="button" class="panel-title collapsed" data-toggle="collapse" data-core="" href="#collapse6_14" aria-expanded="false" aria-controls="collapse1">
                                <h6 class="panel-title-edit mbr-fonts-style mb-0 display-7">
                                    <strong>How do I prepare <?php echo $_SESSION['shop']['name']; ?> for flight?</strong>
                                </h6>
                                <span class="sign mbr-iconfont inactive mbri-arrow-next"></span>
                            </a>
                        </div>
                        <div id="collapse6_14" class="panel-collapse noScroll collapse" role="tabpanel" aria-labelledby="headingOne" data-parent="#bootstrap-accordion_14">
                            <div class="panel-body">
                                <p class="mbr-fonts-style panel-text display-4">Setup is easy. Extend <?php echo $_SESSION['shop']['name']; ?> and center it between the wing and yourself. Use the quick connector to attach it near the middle of the trailing edge of your wing. Lay out the line and attach it to <?php echo $_SESSION['shop']['name']; ?>. When ready for takeoff, start the camera and launch as you would normally. With practice it only takes a few moments.</p>
                            </div>
                        </div>
                    </div>
                    <div class="card mb-3">
                        <div class="card-header" role="tab" id="headingOne">
                            <a role="button" class="panel-title collapsed" data-toggle="collapse" data-core="" href="#collapse1_14" aria-expanded="false" aria-controls="collapse1">
                                <h6 class="panel-title-edit mbr-fonts-style mb-0 display-7"><strong>Does <?php echo $_SESSION['shop']['name']; ?> work with all wing types?</strong></h6>
                                <span class="sign mbr-iconfont inactive mbri-arrow-next"></span>
                            </a>
                        </div>
                        <div id="collapse1_14" class="panel-collapse noScroll collapse" role="tabpanel" aria-labelledby="headingOne" data-parent="#bootstrap-accordion_14">
                            <div class="panel-body">
                                <p class="mbr-fonts-style panel-text display-4"><?php echo $_SESSION['shop']['name']; ?> has been extensively tested on paragliders of all types and sizes, including monosurface, cross country and tandem wings.</p>
                            </div>
                        </div>
                    </div>
                    <div class="card mb-3">
                        <div class="card-header" role="tab" id="headingOne">
                            <a role="button" class="panel-title collapsed" data-toggle="collapse" data-core="" href="#collapse2_14" aria-expanded="false" aria-controls="collapse2">
                                <h6 class="panel-title-edit mbr-fonts-style mb-0 display-7"><strong>How do I attach the line to <?php echo $_SESSION['shop']['name']; ?>?</strong></h6>
                                <span class="sign mbr-iconfont inactive mbri-arrow-next"></span>
                            </a>
                        </div>
                        <div id="collapse2_14" class="panel-collapse noScroll collapse" role="tabpanel" aria-labelledby="headingOne" data-parent="#bootstrap-accordion_14">
                            <div class="panel-body">
                                <p class="mbr-fonts-style panel-text display-4">
                                    The line is attached with a simple girth hitch (also called a lark's head) to the blue corded connection point. This is a very secure connection during flight, yet disconnects quickly and easily at the landing.</p>
                                <div class="image-wrapper">
                                    <img src="assets/images/sequence-full-resize-1836x337.jpg" alt="line attachment method">
                                    <p class="mbr-fonts-style panel-text align-center mt-2 display-4">
                                        Attachment with a girth hitch</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card mb-3">
                        <div class="card-header" role="tab" id="headingOne">
                            <a role="button" class="panel-title collapsed" data-toggle="collapse" data-core="" href="#collapse3_14" aria-expanded="false" aria-controls="collapse3">
                                <h6 class="panel-title-edit mbr-fonts-style mb-0 display-7"><strong>Can I use <?php echo $_SESSION['shop']['name']; ?> to capture my takeoff?</strong></h6>
                                <span class="sign mbr-iconfont inactive mbri-arrow-next"></span>
                            </a>
                        </div>
                        <div id="collapse3_14" class="panel-collapse noScroll collapse" role="tabpanel" aria-labelledby="headingOne" data-parent="#bootstrap-accordion_14">
                            <div class="panel-body">
                                <p class="mbr-fonts-style panel-text display-4">
                                    Yes, you can. Moderately steep takeoffs work best for this. On very shallow takeoffs or gentle hills your camera may be dragged on the ground. In these situations, we recommend an assisted takeoff or keeping <?php echo $_SESSION['shop']['name']; ?> in your harness and deploying it in the air when you are safely away from the hill.</p>
                                <div class="image-wrapper">
                                    <img src="assets/images/takeoff-1384x1032.jpg" alt="takeoff">
                                    <p class="mbr-fonts-style panel-text align-center mt-2 display-4">
                                        Capturing takeoff handsfree</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card mb-3">
                        <div class="card-header" role="tab" id="headingOne">
                            <a role="button" class="panel-title collapsed" data-toggle="collapse" data-core="" href="#collapse7_14" aria-expanded="false" aria-controls="collapse4">
                                <h6 class="panel-title-edit mbr-fonts-style mb-0 display-7"><strong>What are <?php echo $_SESSION['shop']['name']; ?>'s safety features?</strong></h6>
                                <span class="sign mbr-iconfont inactive mbri-arrow-next"></span>
                            </a>
                        </div>
                        <div id="collapse7_14" class="panel-collapse noScroll collapse" role="tabpanel" aria-labelledby="headingOne" data-parent="#bootstrap-accordion_14">
                            <div class="panel-body">
                                <p class="mbr-fonts-style panel-text display-4">
            					<?php echo $_SESSION['shop']['name']; ?>'s connector includes an integrated safety release mechanism. Between the two titanium split rings is a “breakaway” stainless steel ring. This breakaway ring is designed to open when a force of 20N is applied to the elastic bridle. When this happens only the quick connector remains attached to the wing. As a result, the pilot is protected by preventing <?php echo $_SESSION['shop']['name']; ?> and/or the line from becoming irretrievably snagged.</p>
                            </div>
                        </div>
                    </div>

                    <div class="card mb-3">
                        <div class="card-header" role="tab" id="headingOne">
                            <a role="button" class="panel-title collapsed" data-toggle="collapse" data-core="" href="#collapse4_14" aria-expanded="false" aria-controls="collapse4">
                                <h6 class="panel-title-edit mbr-fonts-style mb-0 display-7"><strong>Can I capture my acrobatic routine with <?php echo $_SESSION['shop']['name']; ?>?</strong></h6>
                                <span class="sign mbr-iconfont inactive mbri-arrow-next"></span>
                            </a>
                        </div>
                        <div id="collapse4_14" class="panel-collapse noScroll collapse" role="tabpanel" aria-labelledby="headingOne" data-parent="#bootstrap-accordion_14">
                            <div class="panel-body">
                                <p class="mbr-fonts-style panel-text display-4">
                                    Basic acrobatic maneuvers such as wingovers are perfectly fine. However for more advanced acro we recommend a camera fixed on the pilot.</p>
                            </div>
                        </div>
                    </div>
                    <div class="card mb-3">
                        <div class="card-header" role="tab" id="headingOne">
                            <a role="button" class="panel-title collapsed" data-toggle="collapse" data-core="" href="#collapse5_14" aria-expanded="false" aria-controls="collapse5">
                                <h6 class="panel-title-edit mbr-fonts-style mb-0 display-7"><strong>How do I control the camera while it's in the air?</strong></h6>
                                <span class="sign mbr-iconfont inactive mbri-arrow-next"></span>
                            </a>
                        </div>
                        <div id="collapse5_14" class="panel-collapse noScroll collapse" role="tabpanel" aria-labelledby="headingOne" data-parent="#bootstrap-accordion_14">
                            <div class="panel-body">
                                <p class="mbr-fonts-style panel-text display-4">
                                    On longer flights, you may want to start or stop your camera while it's deployed. There are two techniques for this. Many action cameras have a remote or support for voice control. In these cases, simply control your camera via the remote or give your camera a voice command. Alternatively, use a basic pitching maneuver to allow <?php echo $_SESSION['shop']['name']; ?> to swing close to you and retrieve it in the air (recommended for advanced pilots).</p>
                            </div>
                        </div>
                    </div>
                    <div class="card mb-3">
                        <div class="card-header" role="tab" id="headingOne">
                            <a role="button" class="panel-title collapsed" data-toggle="collapse" data-core="" href="#collapse8_14" aria-expanded="false" aria-controls="collapse5">
                                <h6 class="panel-title-edit mbr-fonts-style mb-0 display-7"><strong>Is there a comprehensive guide to using <?php echo $_SESSION['shop']['name']; ?>?</strong></h6>
                                <span class="sign mbr-iconfont inactive mbri-arrow-next"></span>
                            </a>
                        </div>
                        <div id="collapse8_14" class="panel-collapse noScroll collapse" role="tabpanel" aria-labelledby="headingOne" data-parent="#bootstrap-accordion_14">
                            <div class="panel-body">
                                <p class="mbr-fonts-style panel-text display-4">
                				Yes, our <a href="">Quick start guide</a> covers the basics to get you flying with <?php echo $_SESSION['shop']['name']; ?>, plus pro tips for capturing your best footage, safety information and more.</p>
                            </div>
                        </div>
                    </div>
                   
                </div>
            </div>
        </div>
    </div>
</section>    

<?php require_once 'includes/footer.php'; ?>
<?php require_once 'includes/footer-scripts.php'; ?>
<?php require_once 'includes/ga.php'; ?>

</body>
</html>
