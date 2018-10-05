<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 5/31/2018
 * Time: 10:41 AM
 */

include_once '../Model/Cart.php';

class CartHandler
{
    public static function addCart($cart)
    {
        return $cart.addCartToCartListInSession();
    }

    public static function updateCart($cart)
    {
        return $cart.updateCartFromCartListInSession();
    }

    public static function deleteCart($index)
    {
        return Cart::removeCartFromCartListInSessionWithIndex($index);
    }

    public static function clearCart()
    {
        return Cart::clearCartListInSession();
    }

    public static function getCartList()
    {
        return json_encode(Cart::getCartListFromSession());
    }
}