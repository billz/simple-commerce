<?php

require_once '../includes/class.Cart.php';
require_once '../includes/session.php';
require_once '../includes/config.php';
require_once '../includes/functions.php';

$params = array();
parse_str($_REQUEST['data'], $params);

if (!isset($params['line_option'])) {
    $params['line_option'] = null;
}

try {
    $id = uniqid(rand(), false);
    $_SESSION['basket']->add(
        $id, $params['quantity'], [
        'product_code' => $params['product_code'],
        'price' => $params['unit_amount'],
        'line_option' => $params['line_option'],
    ]);
    echo json_encode(array(
        'result' => 0,
    ));
} catch (Exception $e) {
    echo json_encode(array(
        'error' => array(
            'msg' => $e->getMessage(),
            'code' => $e->getCode(),
        ),
    ));
}
