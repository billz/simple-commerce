<?php 

if (!isset($_SESSION['basket'])) {
    // initialize cart object
    $_SESSION['basket'] = new Cart([
        // Can add unlimited number of item to cart
        'cartMaxItem'      => 0,
        // Set maximum quantity allowed per item to 10
        'itemMaxQuantity'  => 10,
        // Use cookie, cart data will be saved when browser is closed
        'useCookie'        => true,
    ]);
}