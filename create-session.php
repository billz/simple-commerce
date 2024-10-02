<?php
require 'vendor/autoload.php';
require_once 'includes/class.Cart.php';
require_once 'includes/session.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/');
$dotenv->load();
$domain_url = $_ENV['DOMAIN'];

\Stripe\Stripe::setApiKey($_ENV['STRIPE_SECRET_KEY']);

header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] != 'POST') {
  echo 'Invalid request';
  exit;
}

$_SESSION['shipping_amount'] = intval($_POST['shipping_rate']);

$basketItems = $_SESSION['basket']->getItems();
foreach ($basketItems as $items) {
    foreach ($items as $item) {
      $product_code = $item['attributes']['product_code'];

      $productOption = "";
      if ( $product_code == "AB-CHASECAM" ) {
          $productOption = ' with '. $_POST['line_option'] .' line';
      }

      $lineItemsArray[] = array(
          'price_data' => array(
              'currency' => $_SESSION['shop']['currency'],
              'unit_amount' => intval($item['attributes']['price']),
              'product_data' => array(
                  'name' => $_SESSION['products'][$product_code]['name_ext'] . $productOption,
                  'images' => array($_SESSION['products'][$product_code]['remote_img']),
              ),
          ),
          'quantity' => intval($item['quantity']),
      );
    }
}

// DEBUG
// var_dump($lineItemsArray);
// exit();

// For full details see https://stripe.com/docs/api/checkout/sessions/create
// ?session_id={CHECKOUT_SESSION_ID} means the redirect will have the session ID set as a query param
$checkout_session = \Stripe\Checkout\Session::create([
  'success_url' => $domain_url . '/success.php?session_id={CHECKOUT_SESSION_ID}',
  'cancel_url' => $domain_url . '/cancel.php',
  'mode' => 'payment',
  'allow_promotion_codes' => true,
  'billing_address_collection' => 'auto',
  'phone_number_collection' => [
    'enabled' => true
  ],
  'shipping_address_collection' => [
    'allowed_countries' => $_SESSION['allowed_countries']
  ],
  'shipping_options' => [[
    'shipping_rate_data' => [
      'type' => 'fixed_amount',
      'fixed_amount' => [
        'amount' => $_SESSION['shipping_amount'],
        'currency' => 'eur',
      ],
      'display_name' => $_SESSION['shipping_desc'],
      'delivery_estimate' => [
        'minimum' => [
          'unit' => 'business_day',
          'value' => $_SESSION['delivery_min'],
        ],
        'maximum' => [
          'unit' => 'business_day',
          'value' => $_SESSION['delivery_max'],
        ],
      ]
    ]
  ]],
  'payment_method_types' => ['card'], 
  'line_items' => [[$lineItemsArray]]
]);

header("HTTP/1.1 303 See Other");
header("Location: " . $checkout_session->url);
