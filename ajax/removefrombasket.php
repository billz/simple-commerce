<?php

require_once '../includes/class.Cart.php';
require_once '../includes/session.php';
require_once '../includes/config.php';
require_once '../includes/functions.php';

try {
    if (isset($_POST['item_id'])) {
        $item_id = $_POST['item_id'];
        $_SESSION['basket']->remove($item_id);
        echo json_encode(array(
            'result' => 0,
        ));
    }
} catch (Exception $e) {
    echo json_encode(array(
        'error' => array(
            'msg' => $e->getMessage(),
            'code' => $e->getCode(),
        ),
    ));
}
