<?php

function lineOptions()
{
    $data = json_decode(file_get_contents(AB_LINE_OPTIONS));
    return (array) $data;
}

function shippingRates()
{
    $data = json_decode(file_get_contents(AB_SHIPPING_RATES));
    return (array) $data;
}

function optionsForSelect($options)
{
    $html = "";
    foreach ($options as $key => $value) {
        $key = is_int($key) ? $value : $key;
        $html .= "<option value=\"$key\">$key</option>";
    }
    return $html;
}

function shippingForSelect($options)
{
    $html = "";
    foreach ($options as $key => $value) {
        $key = is_int($key) ? $value : $key;
        $html .= "<option data-price=\"$value[1]\" value=\"$key\">$value[0]</option>";
    }
    return $html;
}

function productImgVariants($options)
{
    $html = "";
    foreach ($options as $key => $value) {
        $key = is_int($key) ? $value : $key;
        $html .= "<li><img class=\"rounded lineopt-img\" src=assets/images/product/$value[1] alt=\"$key\">$key</li>";
    }
    return $html;    
}

/**
 * Loads a simple product list from a .json file
 * @return array $json
 */
function loadProducts()
{
    $json = json_decode(file_get_contents(AB_PRODUCT_DATA), true);
    if ($json === null) {
        return false;
    } else {
        return $json;
    }
}

/**
 * Loads shop settings from a .json file
 * @return array $json
 */
function loadShopConfig()
{
    $json = json_decode(file_get_contents(AB_SHOP_CONFIG), true);
    if ($json === null) {
        return false;
    } else {
        return $json;
    }
}

/**
 * Formats a product unit_amount for display with currency symbol
 * @return string $display_amt
 */
function formatCurrency($amount, $decimals, $separator = null)
{
    $display_amt = substr($amount,0, $decimals);
    if ($separator == true) {
        $display_amt .= ',00';
    }
    $display_amt .= ' '. $_SESSION['shop']['currency_symbol'];
    return $display_amt;
}

/**
 * Display a selector field for a form
 *
 * @param string $name:     Field name
 * @param array  $qty_max:  Array of options
 * @param string $selected: Selected option (optional)
 * @param string $disabled  (optional)
 */
function selectQty($name, $qty_max, $selected = null, $disabled = null)
{
    echo '<select class="custom-select ml-0" name="'.htmlspecialchars($name, ENT_QUOTES).'"';
    echo '>' , PHP_EOL;
    for ( $item = 1; $item <= $qty_max; $item++ ) {
        $select = '';
        if ($item == $selected) {
            $select = ' selected="selected"';
        }
        if ($item == $disabled) {
            $disabled = ' disabled';
        }
        echo '<option value="'.htmlspecialchars($item, ENT_QUOTES).'"'.$select.$disabled.'>'.
            htmlspecialchars($item, ENT_QUOTES).'</option>' , PHP_EOL;
    }
    echo '</select>' , PHP_EOL;
}
