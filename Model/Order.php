<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 5/25/2018
 * Time: 8:52 PM
 */

include_once '../Repository';

class Order
{
    private $id;
    private $userId;
    private $clotheId;
    private $quantity;
    private $date;
    private $status;
    private $totalPrice;
    private $realTotalPrice;
    private $profit;

    public function getId()             { return $this->id; }
    public function getQuantity()       { return $this->quantity; }
    public function getDate()           { return $this->date; }
    public function getStatus()         { return $this->status; }
    public function getTotalPrice()     { return $this->totalPrice; }
    public function getRealTotalPrice() { return $this->realTotalPrice; }
    public function getProfit()         { return $this->profit; }
    public function getUserId()         { return $this->userId; }
    public function getClotheId()       { return $this->clotheId; }
    public function getUser()
    {
        $user = UserFactory::createUserFromQueryResult
        (UserRepository::getUserById($this->id));

        return $user;
    }
    public function getClothe()
    {
        $clothe = ClotheFactory::createClotheFromQueryResult
        (ClotheRepository::getClotheById($this->id));

        return $clothe;
    }

    public function setId($value)               { $this->id = $value; }
    public function setUserId($value)             { $this->userId = $value; }
    public function setClotheId($value)           { $this->clotheId = $value; }
    public function setQuantity($value)         { $this->quantity = $value; }
    public function setDate($value)             { $this->date = $value; }
    public function setStatus($value)           { $this->status = $value; }
    public function setTotalPrice($value)       { $this->totalPrice = $value; }
    public function setRealTotalPrice($value)   { $this->realTotalPrice = $value; }
    public function setProfit($value)           { $this->profit = $value; }

    public function insertNewOrder()
    {
        return OrderRepository::insertOrder($this);
    }

    public function updateThisOrder()
    {
        return OrderRepository::updateOrder($this);
    }

    public static function get50NewestOrderStartingFrom($value)
    {
        $orders = OrderFactory::createOrderArrayFromQueryResult
        (OrderRepository::get50NewestOrdersStartingFrom($value));

        return $orders;
    }

    public static function get50NewestOrdersFromUserWithIdStartingFrom($userId, $value)
    {
        $orders= OrderFactory::createOrderArrayFromQueryResult
        (OrderRepository::get50NewestOrdersFromUserWithIdStartingFrom($userId, $value));

        return $orders;
    }

    public static function changeOrderStatusForOrderId($orderId, $status)
    {
        return OrderRepository::changeOrderStatusForOrderId($orderId, $status);
    }
}