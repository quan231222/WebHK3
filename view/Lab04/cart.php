<?php

function add_item($key, $quantity)
{
    global $products;
    if ($quantity < 1) return;
    
    if (isset($_SESSION['cart'][$key])) {
        $quantity += $_SESSION['cart'][$key]['qty'];
        update_item($key, $quantity);
        return;
    }
    
    $cost = $products[$key]['cost'];
    $total = $cost * $quantity;
    $item = array(
        'name' => $products[$key]['name'],
        'cost' => $cost,
        'qty' => $quantity,
        'total' => $total
    );
    $_SESSION['cart'][$key] = $item;
}

function update_item($key, $quantity)
{
    $quantity = (int) $quantity;
    if (isset($_SESSION['cart'][$key])) {
        if ($quantity <= 0) {
            unset($_SESSION['cart'][$key]);
        } else {
            $_SESSION['cart'][$key]['qty'] = $quantity;
            $total = $_SESSION['cart'][$key]['cost'] *
                $_SESSION['cart'][$key]['qty'];
            $_SESSION['cart'][$key]['total'] = $total;
        }
    }
}

function get_subtotal()
{
    $subtotal = 0;
    foreach ($_SESSION['cart'] as $item) {
        $subtotal += $item['total'];
    }
    $subtotal_f = number_format($subtotal, 2);
    return $subtotal_f;
}
