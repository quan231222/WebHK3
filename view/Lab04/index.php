<?php
$lifetime = 60 * 60 * 24 * 365 * 4;
session_set_cookie_params($lifetime, '/');
session_start();

if (empty($_SESSION['cart'])) {
    $_SESSION['cart'] = array();
}

$products = array();
$products['SP-0023'] = array('name' => 'The Zed T-Shirt', 'cost' => '25$');
$products['SP-0012'] = array('name' => 'Sly T-Shirt', 'cost' => '25$');
$products['SP-2002'] = array('name' => 'Urban Monkey X409JA', 'cost' => '25$');

require_once('cart.php');

$action = filter_input(INPUT_POST, 'action');
if ($action === NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action === NULL) {
        $action = 'show_add_item';
    }
}

switch ($action) {
    case 'add':
        $product_key = filter_input(INPUT_POST, 'productkey');
        $item_qty = filter_input(INPUT_POST, 'itemqty');
        add_item($product_key, $item_qty);
        include('cart_view.php');
        break;
    case 'update':
        $new_qty_list = filter_input(
            INPUT_POST,
            'newqty',
            FILTER_DEFAULT,
            FILTER_REQUIRE_ARRAY
        );
        foreach ($new_qty_list as $key => $qty) {
            if ($_SESSION['cart'][$key]['qty'] != $qty) {
                update_item($key, $qty);
            }
        }
        include('cart_view.php');
        break;
    case 'show_cart':
        include('cart_view.php');
        break;
    case 'show_add_item':
        include('add_item_view.php');
        break;
    case 'empty_cart':
        unset($_SESSION['cart']);
        include('cart_view.php');
        break;
    case 'end_session':
        
        $_SESSION = array();
        
        session_destroy();
        
        $name = session_name(); 
        $expire = strtotime('-1 year'); 
        $params = session_get_cookie_params(); 
        $path = $params['path'];
        $domain = $params['domain'];
        $secure = $params['secure'];
        $httponly = $params['httponly'];
        setcookie($name, '', $expire, $path, $domain, $secure, $httponly);
        include('cart_view.php');
        break;
}
