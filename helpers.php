<?php
function show_price($cat, $price, $sku = '')
{
    $original = $price;
    if ($cat == 'insurance') {
        $price = ($price / 100) * 70;
    } else if ($sku == '000003') {
        $price = ($price / 100) * 15;
    }
    $discount = ($original - $price);
    return $discount . '|' . $price . '|' . price_format($price) . '|' . ($original == $price);
}

function price_format($price)
{
    if (is_numeric($price))
        $price = number_format($price, 2) . '€';
    return $price;
}
function get_pct($price, $new_price)
{
    return ($new_price * 100 / $price);
}
function chk_url($cat, $segment)
{
    if ($segment == '' or $segment == 'products') return true;
    else if ($segment == $cat) return true;
    else return false;
}
