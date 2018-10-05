<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 5/30/2018
 * Time: 10:24 PM
 */

class Cart
{
    private $id;
    private $clotheId;
    private $quantity;
    private $total;

    public function getId()         { return $this->id; }
    public function getClotheId()   { return $this->clotheId; }
    public function getQuantity()   { return $this->quantity; }
    public function getTotal()      { return $this->total; }
    public function getClothe()
    {
        $clothe = ClotheFactory::createClotheFromQueryResult
        (ClotheRepository::getClotheById($this->id));

        return $clothe;
    }

    public function setId($value)       { $this->id = $value; }
    public function setClotheId($value) { $this->clotheId = $value; }
    public function setQuantity($value) { $this->quantity = $value; }
    public function setTotal($value)    { $this->total = $value; }

    public function addCartToCartListInSession()
    {
        $cartList = $_SESSION["cartList"];
        $cartList[] = $this;
        $_SESSION["cartList"] = $cartList;
        return true;
    }

    public function updateCartFromCartListInSession()
    {
        $cartList = $_SESSION["cartList"];
        $cartList[$this->getId()] = $this;
        $_SESSION["cartList"] = $cartList;
        return true;
    }

    public static function removeCartFromCartListInSessionWithIndex($index)
    {
        $cartList = $_SESSION["cartList"];
        unset($cartList[$index]);
        $_SESSION["cartList"] = $cartList;
        return true;
    }

    public static function clearCartListInSession()
    {
        unset($_SESSION["cartList"]);
        return true;
    }

    public static function getCartListFromSession()
    {
        return $_SESSION["cartList"];
    }

    public static function createCartFromJSON($jsonString)
    {
        $object = json_decode($jsonString);

        $cart = new Cart();

        $cart->setClotheId($object->CartClotheId);
        $cart->setQuantity($object->CartQuantity);
        $cart->setTotal($object->CartTotal);

        $cartId = isset($object->CartId) ? $object->CartId : -1;
        $cart->setId($cartId);

        return $cart;
    }
}