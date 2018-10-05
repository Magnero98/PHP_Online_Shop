<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 5/25/2018
 * Time: 9:34 PM
 */

class OrderRepository
{
    public static function insertOrder($order)
    {
        $query = "INSERT INTO OrderHeader ";
        $query .= "VALUES ";
        $query .= "(";
        $query .= $order->getUserId() . ", ";
        $query .= $order->getQuantity() . ", ";
        $query .= "'" . $order->getDate() . "', ";
        $query .= "'" . $order->getStatus() . "', ";
        $query .= ")";

        if(!DBConnection::executeQuery($query))
            return false;

        $query = "INSERT INTO OrderDetail ";
        $query .= "VALUES ";
        $query .= "(";
        $query .= $order->getId() . ", ";
        $query .= $order->getClotheId() . ", ";
        $query .= ")";

        return DBConnection::executeQuery($query);
    }

    public static function updateOrder($order)
    {
        $query = "UPDATE OrderHeader ";
        $query .= "SET ";
        $query .= "UserId = " . $order->getUserId() . ", ";
        $query .= "OrderQuantity = " . $order->getQuantity() . ", ";
        $query .= "OrderDate = " . "'" . $order->getDate() . "', ";
        $query .= "OrderStatus = " . "'" . $order->getStatus() . "' ";
        $query .= "WHERE OrderHeaderId = " . $order->getId();

        if(!DBConnection::executeQuery($query))
            return false;

        $query = "UPDATE OrderDetail ";
        $query .= "SET ";
        $query .= "OrderHeaderId = " . $order->getId() . ", ";
        $query .= "ClotheId = " . $order->getClotheId() . " ";
        $query .= "WHERE OrderHeaderId = " . $order->getId() . " AND ";
        $query .= "ClotheId = " . $order->getClotheId();

        return DBConnection::executeQuery($query);
    }

    public static function get50NewestOrdersStartingFrom($value)
    {
        $query = "SELECT ";
        $query .= "OrderId = OrderHeaderId, ";
        $query .= "UserId, ";
        $query .= "ClotheId, ";
        $query .= "OrderQuantity, ";
        $query .= "OrderStatus, ";
        $query .= "OrderTotalPrice = ClothePrice * OrderQuantity, ";
        $query .= "OrderRealTotalPrice = ClotheRealPrice * OrderQuantity ";
        $query .= "FROM ";
        $query .= "OrderDetail AS od ";
        $query .= "JOIN OrderHeader AS oh ON oh.OrderHeaderId = od.OrderHeaderId ";
        $query .= "JOIN Clothe AS c ON c.ClotheId = od.ClotheId ";
        $query .= "WHERE OrderHeaderId BETWEEN " . $value . " AND " . ($value + 49);

        $rows = DBConnection::createRowArrayFromQueryResult(DBConnection::executeQuery($query));
        return $rows;
    }

    public static function get50NewestOrdersFromUserWithIdStartingFrom($userId, $value)
    {
        $query = "SELECT ";
        $query .= "OrderId = OrderHeaderId, ";
        $query .= "UserId, ";
        $query .= "ClotheId, ";
        $query .= "OrderQuantity, ";
        $query .= "OrderStatus, ";
        $query .= "OrderTotalPrice = ClothePrice * OrderQuantity, ";
        $query .= "OrderRealTotalPrice = ClotheRealPrice * OrderQuantity ";
        $query .= "FROM ";
        $query .= "OrderDetail AS od ";
        $query .= "JOIN OrderHeader AS oh ON oh.OrderHeaderId = od.OrderHeaderId ";
        $query .= "JOIN Clothe AS c ON c.ClotheId = od.ClotheId ";
        $query .= "WHERE UserId = " . $userId . " AND ";
        $query .= "(OrderHeaderId BETWEEN " . $value . " AND " . ($value + 49) . ")";

        $rows = DBConnection::createRowArrayFromQueryResult(DBConnection::executeQuery($query));
        return $rows;
    }

    public static function changeOrderStatusForOrderId($orderId, $status)
    {
        $query = "UPDATE OrderHeader ";
        $query .= "SET OrderStatus = '" . $status . "' ";
        $query .= "WHERE OrderHeaderId = " . $orderId;

        return DBConnection::executeQuery($query);
    }
}