<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 5/24/2018
 * Time: 11:17 PM
 */

include_once '../Model/Clothe.php';

class ClotheFactory
{
    public static function createClothe()
    {
        return new Clothe();
    }

    public static function createClotheWithFields
    (
        $name,
        $price,
        $discount,
        $size,
        $chest,
        $length,
        $picture,
        $availability,
        $realName,
        $realPrice,
        $realCode,
        $category,
        $id = -1
    )
    {
        $clothe = self::createClothe();

        $clothe->setName($name);
        $clothe->setPrice($price);
        $clothe->setDiscount($discount);
        $clothe->setSize($size);
        $clothe->setChest($chest);
        $clothe->setLength($length);
        $clothe->setPicture($picture);
        $clothe->setAvailability($availability);
        $clothe->setRealName($realName);
        $clothe->setRealPrice($realPrice);
        $clothe->setRealCode($realCode);
        $clothe->setCategory($category);
        $clothe->setId($id);

        return $clothe;
    }

    public static function createClotheFromTableRow($row)
    {
        $clothe = self::createClotheWithFields
        (
            $row["ClotheName"],
            $row["ClothePrice"],
            $row["ClotheDiscount"],
            $row["ClotheSize"],
            $row["ClotheChest"],
            $row["ClotheLength"],
            $row["ClothePicture"],
            $row["ClotheAvailability"],
            $row["ClotheRealName"],
            $row["ClotheRealPrice"],
            $row["ClotheRealCode"],
            $row["ClotheCategory"],
            $row["ClotheId"]
        );

        return $clothe;
    }

    public static function createClotheFromQueryResult($queryResult)
    {
        $row = mysqli_fetch_assoc($queryResult);
        return self::createClotheFromTableRow($row);
    }

    public static function createClotheArrayFromQueryResult($queryResult)
    {
        $clothes = array();

        while($row = mysqli_fetch_assoc($queryResult))
            $clothes[] = self::createClotheFromTableRow($row);

        return $clothes;
    }

    public static function createClotheFromJSON($jsonString)
    {
        $object = json_decode($jsonString);

        $clothe = self::createClotheWithFields
        (
            $object->ClotheName,
            $object->ClothePrice,
            $object->ClotheDiscount,
            $object->ClotheSize,
            $object->ClotheChest,
            $object->ClotheLength,
            $object->ClothePicture,
            $object->ClotheAvailability,
            $object->ClotheRealName,
            $object->ClotheRealPrice,
            $object->ClotheRealCode,
            $object->ClotheCategory,
            $object->ClotheId
        );

        return $clothe;
    }
}