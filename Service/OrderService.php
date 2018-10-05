<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 6/7/2018
 * Time: 10:12 AM
 */

if($_GET["request"] == "get50NewestOrder")
{
    $startingIndex = $_GET["StartingIndex"];

    echo "get50NewestOrder('" . OrderHandler::get50NewestOrderStartingFrom($startingIndex) . "')";
}
elseif ($_GET["request"] == "get50NewestOrdersFromUserWithId")
{
    $userId = $_GET["UserId"];
    $startingIndex = $_GET["StartingIndex"];

    echo "get50NewestOrdersFromUserWithId('" . OrderHandler::get50NewestOrdersFromUserWithIdStartingFrom($userId, $startingIndex) . "')";
}
elseif ($_GET["request"] == "changeOrderStatusForOrderId")
{
    $orderId = $_GET["OrderId"];
    $orderStatus = $_GET["OrderStatus"];

    echo "changeOrderStatusForOrderId('" . OrderHandler::changeOrderStatusForOrderId($orderId, $orderStatus) . "')";
}
elseif ($_GET["request"] == "insertOrder")
{
    $json = $_GET["Order"];
    $order = OrderFactory::createOrderFromJSON($json);

    echo "insertOrder('" . OrderHandler::insertNewOrder($order) . "')";
}
elseif ($_GET["request"] == "updateOrder")
{
    $json = $_GET["Order"];
    $order = OrderFactory::createOrderFromJSON($json);

    echo "updateOrder('" . OrderHandler::updateThisOrder($order) . "')";
}
