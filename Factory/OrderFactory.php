<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 5/25/2018
 * Time: 10:41 PM
 */

include_once '../Model/Order.php';

class OrderFactory
{
    public static function createOrder()
    {
        return new Order();
    }

    public static function createOrderWithFields
    (
        $userId,
        $clotheId,
        $quantity,
        $date,
        $status,
        $totalPrice,
        $realTotalPrice,
        $id = -1
    )
    {
        $order = OrderFactory::createOrder();
        $order->setId($id);
        $order->setUserId($userId);
        $order->setClotheId($clotheId);
        $order->setQuantity($quantity);
        $order->setDate($date);
        $order->setStatus($status);
        $order->setTotalPrice($totalPrice);
        $order->setRealTotalPrice($realTotalPrice);
        $order->setProfit($totalPrice - $realTotalPrice);

        return $order;
    }

    public static function createOrderFromTableRow($row)
    {
        $order = OrderFactory::createOrderWithFields
        (
            $row["OrderUserId"],
            $row["OrderClotheId"],
            $row["OrderQuantity"],
            $row["OrderDate"],
            $row["OrderStatus"],
            $row["OrderTotalPrice"],
            $row["OrderRealTotalPrice"],
            $row["OrderId"]
        );

        return $order;
    }

    public static function createOrderArrayFromQueryResult($queryResult)
    {
        $orders = array();

        while($row = mysqli_fetch_assoc($queryResult))
            $orders[] = self::createOrderFromTableRow($row);

        return $orders;
    }

    public static function createOrderFromJSON($jsonString)
    {
        $object = json_decode($jsonString);

        $order = self::createOrderWithFields
        (
            $object->OrderUserId,
            $object->OrderClotheId,
            $object->OrderQuantity,
            $object->OrderDate,
            $object->OrderStatus,
            $object->OrderTotalPrice,
            $object->OrderRealTotalPrice,
            $object->OrderId
        );

        return $order;
    }
}