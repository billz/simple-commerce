<?php

/**
* Simple shop config data object, loaded from .json 
* and stored in SESSION var
* todo: (maybe) add to MySQL db
**/

//debug
session_unset(); 

if (!isset($_SESSION['shop'])) {
    $data = loadShopConfig();
    if (is_array($data)) {
        $_SESSION['shop'] = $data['Shop'];
    }
}
