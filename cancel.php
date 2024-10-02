<?php
require 'vendor/autoload.php';
require_once 'includes/class.Cart.php';
require_once 'includes/session.php';
?>
<!DOCTYPE html>
<html  >
<head>
  <title><?php echo $_SESSION['shop']['name']; ?> | Cancel order</title>
  <?php require_once 'includes/header.php'; ?>
  <script src="https://js.stripe.com/v3/"></script>
</head>
<body>

<?php require_once 'includes/navbar.php'; ?>

<section class="content1 cid-sbAfFaJs0e">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-6 col-lg-6">
              <h1 class="mbr-section-title mbr-fonts-style mb-3 display-jumbo">🤔</h1>
            </div>
            <div class="col-12 col-lg-6">
              <div class="text-wrapper">
                <p class="mbr-text mbr-fonts-style display-7">
                  Order cancelled.<br> 
                  Questions? Email <a href="mailto:orders@<?php echo $_SESSION['shop']['domain_name']; ?>">orders@<?php echo $_SESSION['shop']['domain_name']; ?></a>. Thanks!
                </p>
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
