<?php
require 'vendor/autoload.php';
require_once 'includes/class.Cart.php';
require_once 'includes/session.php';
?>
<!DOCTYPE html>
<html>
<head>
  <title><?php echo $_SESSION['shop']['name']; ?> | Contact us</title>
  <meta charset="UTF-8">
  <?php require_once 'includes/header.php'; ?>
</head>
<body>

 <?php require_once 'includes/navbar.php'; ?>

<section class="form2 cid-s9aykP92fe" id="form2-o">
    <div class="align-center container">
        <div class="row justify-content-center">
            <div class="col-lg-8 mx-auto mbr-form" data-form-type="formoid">
                <form action="https://mobirise.eu/" method="POST" class="mbr-form form-with-styler" data-form-title="Form Name"><input type="hidden" name="email" data-form-email="true" value="Cjgzbsczip4plKGfu1BzcDhiUp0Q7oDd8aPJY9uvp5GaWHOer8jKBQBTbaDzmRLOWaRgC5Lus+FnOnSuwpWEpeulGtkanOnSTrbsZAEJ6CzNbOJYCoL5L78ofOYo/5mq">
                    <div class="">
                        <div hidden="hidden" data-form-alert="" class="alert alert-success col-12">Got it! Thanks :)</div>
                        <div hidden="hidden" data-form-alert-danger="" class="alert alert-danger col-12">Oops...please try again</div>
                    </div>
                    <div class="dragArea row">
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <h1 class="mbr-section-title mb-4 display-2"><strong>Join the adventure</strong></h1>
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <p class="mbr-section-subtitle mbr-fonts-style mb-5 display-7"><?php echo $_SESSION['shop']['name']; ?> products are available for shipping worldwide. Join our mailing list to stay informed about product updates and availability. We will never sell or do anything shady with your email&#151;promise.</p>
                        </div>
                        <div class="col-lg col-md col-12 form-group" data-for="email">
                            <input type="text" name="name" placeholder="Name" data-form-field="name" class="form-control" id="name-form2-o">
                        </div>
                        <div class="col-lg col-md col-12 form-group" data-for="email">
                            <input type="email" name="email" placeholder="Email" data-form-field="email" class="form-control" id="email-form2-o">
                        </div>
                        <div class="mbr-section-btn col-md-auto col"><button type="submit" class="btn btn-warning display-4">Send</button></div>
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <p class="mbr-section-subtitle mbr-fonts-style mb-5 display-7">
                            You can also <script language="JavaScript">user = 'hello';site = '<?php echo $_SESSION['shop']['url']; ?>';document.write('<a href=\"mailto:' + user + '@' + site + '\">');document.write('drop us a message' + '</a>');</script>.
                            We'd love to hear from you!</p>
                        </div>
                    </div>
                </form>
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
