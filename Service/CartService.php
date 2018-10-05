<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 6/7/2018
 * Time: 8:15 AM
 */

include_once '../Model/Cart.php';
include_once '../Handler/CartHandler.php';

session_start();

if($_GET["request"] == "addToCart")
{
    $json = $_GET["Cart"];
    $cart = Cart::createCartFromJSON($json);

    if(CartHandler::addCart($cart))
        echo "addToCart('Successful')";
}
elseif ($_GET["request"] == "updateCart")
{
    $json = $_GET["Cart"];
    $cart = Cart::createCartFromJSON($json);

    if(CartHandler::updateCart($cart))
        echo "updateCart('Successful')";
}
elseif ($_GET["request"] == "removeFromCart")
{
    $json = $_GET["Cart"];
    $cart = Cart::createCartFromJSON($json);

    if(CartHandler::deleteCart($cart->getId()))
        echo "removeFromCart('Successful')";
}
elseif ($_GET["request"] == "clearCart")
{
    if(CartHandler::clearCart())
        echo "clearCart('Successful')";
}
elseif ($_GET["request"] == "getCartList")
{
    echo "getCartList('" . CartHandler::getCartList() . "')";
}