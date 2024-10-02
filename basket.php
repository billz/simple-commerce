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

$_SESSION['allowed_countries'] = array( 'AU', 'AT', 'BE', 'BR', 'BG', 'KH', 'CA', 'CV', 'CL', 'CO', 'HR', 'CY', 'CZ', 'DK', 'EC', 'EG', 'EE', 'FI', 'FR', 'DE', 'GR', 'GL', 'GP', 'GU', 'GT', 'HN', 'HK', 'HU', 'IS', 'IE', 'IL', 'IT', 'JP', 'JO', 'KR', 'KW', 'LV', 'LB', 'LI', 'LT', 'LU', 'MK', 'MY', 'MX', 'MC', 'MA', 'NP', 'NL', 'NZ', 'NO', 'OM', 'PA', 'PY', 'PE', 'PH', 'PL', 'PT', 'QA', 'RO', 'SA', 'RS', 'SG', 'SK', 'SI', 'ZA', 'ES', 'SE', 'CH', 'TH', 'TR', 'AE', 'GB', 'US', 'UY', 'VE', 'VN' );

$_SESSION['shipping_desc'] = "Track & trace shipping";
$_SESSION['delivery_min'] = 2;
$_SESSION['delivery_max'] = 10;
?>

<!DOCTYPE html>
<html>
<head>
    <title><?php echo $_SESSION['shop']['name']; ?> | Basket</title>
    <?php require_once 'includes/header.php'; ?>
    <script src="https://js.stripe.com/v3/"></script>
</head>
<body>

<?php require_once 'includes/navbar.php'; ?>

<section class="pt-5 pb-5">
    <div class="container">
        <div class="row w-100">
            <div class="col-lg-12 col-md-12 col-12">
                <h3 class="mbr-fonts-style display-5 mb-2 basket-header text-center">Basket</h3>
                <?php if ($_SESSION['basket']->getTotalItem() == 0) : ?>

                    <div class="card">
                        <div class="card-wrapper">
                            <div class="row align-items-center">
                                <div class="col-12 col-md-3 mb-5">
                                    <p class="mbr-text mbr-fonts-style display-6">
                                        Your basket is currently empty.
                                        <div class="p-3">
                                            <a href="order.php"><button type="button" class="float-left btn btn-primary display-7 mt-3">Continue shopping</button></a>
                                        </div>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                <?php else : ?>
                <form method="post" action="/create-session.php" id="ajax-bakset" class="needs-validation" novalidate>
                <p class="mb-5 text-center">
                    <i class="text-info display-7 font-weight-bold"><?php echo $_SESSION['basket']->getTotalItem(); ?></i> items in your basket</p>
                <table id="shoppingCart" class="table table-condensed table-responsive mb-2">
                    <thead>
                        <tr>
                            <th style="width:70%">Product</th>
                            <th style="width:12%">Price</th>
                            <th style="width:12%">Quantity</th>
                            <th style="width:4%"></th>
                        </tr>
                    </thead>
                    <tbody>

                    <?php
                    // debug
                    //var_dump($_SESSION['basket']);
                    //$_SESSION['basket']->clear();

                    // Get all items in the cart
                    $allItems = $_SESSION['basket']->getItems();
                    $subtotal = 0;

                    foreach ($allItems as $items) :
                        foreach ($items as $item) :
                            $product_code = $item['attributes']['product_code'];
                            if ( $_SESSION['products'][$product_code]['discount_amount'] < $_SESSION['products'][$product_code]['unit_amount'] ) {
                                $sale_amount = $_SESSION['products'][$product_code]['discount_amount'];
                            } else {
                                $sale_amount = $_SESSION['products'][$product_code]['unit_amount'];
                            }
                            $subtotal += $sale_amount * $item['quantity'];

                            if (is_array($_SESSION['products'][$product_code]['local_img'])) {
                                $local_img = $_SESSION['products'][$product_code]['local_img'][0];
                            } else {
                                $local_img = $_SESSION['products'][$product_code]['local_img'];
                            }
                        ?>  
                        <tr id="basket-item-<?php echo $item['id']; ?>">
                            <td data-th="Product">
                                <div class="row">
                                    <div class="col-md-3 text-left">
                                        <a href="<?php echo $_SESSION['products'][$product_code]['shop_page']; ?>"><img src="<?php echo $local_img; ?>" alt="<?php echo $_SESSION['products'][$product_code]['name_ext']; ?>" class="img-fluid d-none d-md-block rounded mb-2"></a>
                                    </div>
                                    <div class="col-md-9 text-left mt-sm-2">
                                        <h4 class="mbr-fonts-style display-7"><a class="basket-item-blk" href="<?php echo $_SESSION['products'][$product_code]['shop_page']; ?>"><?php echo $_SESSION['products'][$product_code]['name_ext']; ?></a></h4>
                                        <?php if (isset($item['attributes']['line_option'])) : ?>
                                            <p class="font-weight-light"><?php echo "Line option: ".$item['attributes']['line_option']; ?></p>
                                            <input type="hidden" id="line_option" name="line_option" value="<?php echo $item['attributes']['line_option']; ?>">
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </td>
                            <td data-th="Price"><?php echo formatCurrency($sale_amount,-2, true); ?></td>
                            <input type="hidden" id="basket-item-price-<?php echo $item['id']; ?>" value="<?php echo $sale_amount; ?>">
                            <input type="hidden" name="basket-item-lastQty-<?php echo $item['id']; ?>" id="basket-item-lastQty-<?php echo $item['id']; ?>" value="<?php echo $item['quantity']; ?>">
                            <td data-th="Quantity">
                                <input type="number" min="1" max="10" class="form-control form-control-lg text-center js-update-basket-item" id="basket-item-qty-<?php echo $item['id']; ?>" value="<?php echo $item['quantity']; ?>" data-id="<?php echo $item['id']; ?>">
                            </td>
                            <td class="actions pt-4" data-th="">
                                <span class="mobi-mbri mobi-mbri-error mbr-iconfont mbr-iconfont-btn js-remove-basket-item" data-id="<?php echo $item['id']; ?>"></span>
                            </td>
                        </tr>

                    <?php
                        endforeach;
                    endforeach;
                    ?>
                    </tbody>
                </table>

                <div class="row mt-1 mb-1 d-flex flex-row-reverse">
                    <div class="p-2 text-right">
                    <h6>Subtotal:</h6>
                    <h4 class="basket_subtotal"><?php echo formatCurrency($subtotal,-2, true); ?></h4>
                    </div>
                </div>
                <div class="row d-flex flex-row-reverse">
                    <div class="p-2 text-right">
                    <h6>Shipping destination:</h6>

                    <input type="hidden" id="subtotal" name="subtotal" value="<?php echo $subtotal; ?>">
                    <input type="hidden" id="shipping_rate" name="shipping_rate" value="">
                    <input type="hidden" id="free_shipping" name="free_shipping" value="<?php echo $_SESSION['shop']['free_shipping']; ?>">
                    <input type="hidden" id="total" name="total" value="">
                    <select class="custom-select" id="destination" name="destination" required>
                        <option selected disabled value=""><?php echo "Choose your country..." ?></option>
                        <?php echo shippingForSelect(shippingRates()); ?>
                    </select>
                    </div>
                </div>
                <div class="row mt-1 mb-1 d-flex flex-row-reverse">
                    <div class="p-2 text-right">
                    <h6>Shipping:</h6>
                    <h4 class="shipping_rate">0,00 &euro;</h4>
                    </div>
                </div>
                <div class="row mt-1 mb-1 d-flex flex-row-reverse">
                    <div class="p-2 text-right">
                    <h5>Total:</h5>
                    <h2 class="basket_total">0,00 &euro;</h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-2 d-flex align-items-right">
            <div class="col-sm-6 order-md-2 text-right pr-4">
                <button id="checkout-button" type="submit" class="btn btn-primary mb-4 btn-lg pl-5 pr-5">Checkout</button>
            </div>

            <div class="col-sm-6 mb-3 mb-m-1 order-md-1 text-md-left">
                Tax included. Choose your destination to calculate shipping.<br />
                Free shipping for orders of <?php echo formatCurrency($_SESSION['shop']['free_shipping'], -2); ?> or more.<br />
                <a href="order.php"><span class="mobi-mbri mobi-mbri-arrow-prev mbr-iconfont mbr-iconfont-btn"></span> Continue shopping</a>
            </div>
            </form>
            <?php endif; ?>
        </div>
    </div>
</section>

<?php require_once 'includes/footer.php'; ?>
<?php require_once 'includes/footer-scripts.php'; ?>
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
