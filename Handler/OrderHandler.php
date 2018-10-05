<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 5/26/2018
 * Time: 3:29 PM
 */

include_once '../Model/Order.php';

class OrderHandler
{
    public static function get50NewestOrderStartingFrom($value)
    {
        return json_encode(Order::get50NewestOrderStartingFrom($value));
    }

    public static function get50NewestOrdersFromUserWithIdStartingFrom($userId, $value)
    {
        return json_encode(Order::get50NewestOrdersFromUserWithIdStartingFrom($userId, $value));
    }

    public static function changeOrderStatusForOrderId($orderId, $status)
    {
        return Order::changeOrderStatusForOrderId($orderId, $status);
    }

    public static function insertNewOrder($order)
    {
        return $order->insertNewOrder();
    }

    public static function updateThisOrder($order)
    {
        return $order->updateThisOrder();
    }
}