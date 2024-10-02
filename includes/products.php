<?php

/**
* Simple product data object, loaded from .json 
* and stored in SESSION var
* todo: (maybe) add to MySQL db
**/

//debug
// session_unset(); 

if (!isset($_SESSION['products'])) {
    $data = loadProducts();
    if (is_array($data)) {
        $_SESSION['products'] = $data['Products'];
    }
}
