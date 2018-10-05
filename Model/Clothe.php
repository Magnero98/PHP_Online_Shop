<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 5/24/2018
 * Time: 9:16 PM
 */

include_once '../Repository/ClotheRepository.php';

class Clothe
{
    private $id;
    private $name;
    private $price;
    private $discount;
    private $size;
    private $chest;
    private $length;
    private $picture;
    private $availability;
    private $realName;
    private $realPrice;
    private $realCode;
    private $category;

    public function setId($value)           { $this->id = $value; }
    public function setName($value)         { $this->name = $value; }
    public function setPrice($value)        { $this->price = $value; }
    public function setDiscount($value)     { $this->discount = $value; }
    public function setSize($value)         { $this->size = $value; }
    public function setChest($value)        { $this->chest = $value; }
    public function setLength($value)       { $this->length = $value; }
    public function setPicture($value)      { $this->picture = $value; }
    public function setAvailability($value) { $this->availability = $value; }
    public function setRealName($value)     { $this->realName = $value; }
    public function setRealPrice($value)    { $this->realPrice = $value; }
    public function setRealCode($value)     { $this->realCode = $value; }
    public function setCategory($value)     { $this->category = $value; }

    public function getId()             { return $this->id; }
    public function getName()           { return $this->name; }
    public function getPrice()          { return $this->price; }
    public function getDiscount()       { return $this->discount; }
    public function getSize()           { return $this->size; }
    public function getChest()          { return $this->chest; }
    public function getLength()         { return $this->length; }
    public function getPicture()        { return $this->picture; }
    public function getAvailability()   { return $this->availability; }
    public function getRealName()       { return $this->realName; }
    public function getRealPrice()      { return $this->realPrice; }
    public function getRealCode()       { return $this->realCode; }
    public function getCategory()       { return $this->category; }

    public function insertNewClothe()
    {
        return ClotheRepository::insertClothe($this);
    }

    public function updateThisClothe()
    {
        return ClotheRepository::updateClothe($this);
    }
}