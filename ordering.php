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
  <title><?php echo $_SESSION['shop']['name']; ?> | Ordering</title>
  <meta charset="UTF-8">
  <?php require_once 'includes/header.php'; ?>
</head>
<body>

<?php require_once 'includes/navbar.php'; ?>

<section class="cid-s9aykP92fe" id="form2-o">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <h1 class="mbr-section-title mb-4 display-2"><strong>Ordering</strong></h1>
            </div>
        </div>    
        <div class="row">
            <div class="col-12 col-lg">
                <div class="text-wrapper">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <p class="mbr-section-subtitle mbr-fonts-style mb-3 text-left display-5"><strong>Basket</strong></p>

                        <p class="mbr-section-subtitle mbr-fonts-style mb-3 text-left display-7">To order an AirBuddy™ product, select the desired items and add them to your basket by clicking on the "Add to basket" button. You may access your basket by clicking on the associated pictogram located at the top right corner of the page.</p>

                        <p class="mbr-section-subtitle mbr-fonts-style mb-3 text-left display-7">From the basket page, finalize your purchase by selecting your shipping destination below the basket subtotal. Shipping is automatically calculated based on your country and the order subtotal. Shipping to all destinations is offered at no cost for orders of 100 Euros or more. Confirm your order total and click the "Checkout" button.</p>

                        <p class="mbr-section-subtitle mbr-fonts-style mb-3 text-left display-7">Payments made on the <?php echo $_SESSION['shop']['domain_name']; ?> website are handled securely by Stripe, our payment partner. This payment solution complies with French and international interbank security measures. All credit card and delivery address data entered is fully encrypted using SSL technology. To mitigate fraud, the <a href="https://stripe.com/docs/payments/3d-secure" target="_blank">3D Secure (3DS) verification protocol</a> may be activated. In most cases, this verification system will send you an SMS or a notification on your bank's mobile application in order to validate payment.</p>
                        

                        <p class="mbr-section-subtitle mbr-fonts-style mb-3 text-left display-5"><strong>Delivery</strong></p>

                        <p class="mbr-section-subtitle mbr-fonts-style mb-3 text-left display-7">Orders are shipped within 72 hours after the validation of the order (within the company's working days). The order is validated after the payment is accepted and processed. Home deliveries are made by the Colissimo or Chronopost delivery service for France, Belgium, the Netherlands and Luxembourg. Shipments to other countries are made by Colissimo or their local fulfillment partner.
                        
                        The delivery time for shipments by Colissimo in metropolitan France is 3 to 5 working days. For shipments by Colissimo outside metropolitan France, the delivery time is 5 to 8 working days. For shipments outside of the European Union, the delivery time is 5 to 10 days.</p>

                        <p class="mbr-section-subtitle mbr-fonts-style mb-3 text-left display-7">Deliveries outside of the European Union including, but not limited to, Canada, the United States (USA), the United Kingdom, New Zealand, Australia, the Middle East and Japan may be subject to additional import fees and/or taxes.</p>

                        <p class="mbr-section-subtitle mbr-fonts-style mb-3 text-left display-5"><strong>Returns & exchanges</strong></p>

                        <p class="mbr-section-subtitle mbr-fonts-style mb-3 text-left display-7">AirBuddy™ has a 15 business day return policy, so you have 15 days, starting when you receive your order, to return it to us. Please contact us by email (<script language="JavaScript">user = 'hello';site = '<?php echo $_SESSION['shop']['domain_name']; ?>';document.write('<a href=\"mailto:' + user + '@' + site + '\">');document.write('hello@<?php echo $_SESSION['shop']['domain_name']; ?>' + '</a>');</script>) to get your return slip. Products must be returned to the origin address listed on your purchase invoice.</p>

                        <p class="mbr-section-subtitle mbr-fonts-style mb-3 text-left display-7">Products must be returned in an unused condition with original packaging intact, accompanied by accessories and a copy of the purchase invoice. You do not have to justify the reasons for your return or pay any penalties.</p>

                        <p class="mbr-section-subtitle mbr-fonts-style mb-3 text-left display-7">If you return your entire order, shipping costs will be included in the refund. If you return only one product and your original order included several products, only the price of the returned product will be refunded. The costs and risks related to the return of products will be borne by the sender once the prescribed time limit has passed. No returns will be accepted on personalized products.</p>
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
