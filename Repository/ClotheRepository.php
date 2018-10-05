<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 5/24/2018
 * Time: 9:24 PM
 */

include_once "../Model/Clothe.php";
include_once "../DBConnection.php";

class ClotheRepository
{
    public static function insertClothe($clothe)
    {
        $query = "INSERT INTO Clothe VALUES ";
        $query .= "(";
        $query .= "'" . $clothe->getName() . "', ";
        $query .= $clothe->getPrice() . ", ";
        $query .= $clothe->getDiscount() . ", ";
        $query .= $clothe->getSize() . ", ";
        $query .= $clothe->getChest() . ", ";
        $query .= $clothe->getLength() . ", ";
        $query .= "'" . $clothe->getPicture() . "', ";
        $query .= "'" . $clothe->getAvailability() . "', ";
        $query .= "'" . $clothe->getRealName() . "', ";
        $query .= $clothe->getRealPrice() . ", ";
        $query .= "'" . $clothe->getRealCode() . "', ";
        $query .= $clothe->getCategory();
        $query .= ");";

        return DBConnection::executeQuery($query);
    }

    public static function get50NewestClothesByCategoryStartingFrom($category, $value)
    {
        $query = "SELECT ";
        $query .= "cl.ClotheId, ";
        $query .= "ClotheName, ";
        $query .= "ClothePrice, ";
        $query .= "ClotheDiscount, ";
        $query .= "ClothePicture, ";
        $query .= "ClotheAvailability ";
        $query .= "FROM ";
        $query .= "CategoryDetail AS cd ";
        $query .= "JOIN Category AS c ON cd.CategoryId = c.CategoryId ";
        $query .= "JOIN Clothe AS cl ON cd.ClotheId = cl.ClotheId ";
        $query .= "WHERE ";
        $query .= "CategoryName = '" . $category . "' AND ";
        $query .= "(cl.ClotheId BETWEEN " . $value . " AND " . ($value + 49) . ")";

        $rows = DBConnection::createRowArrayFromQueryResult(DBConnection::executeQuery($query));

        return $rows;
    }

    public static function get50NewestClothesByNameStartingFrom($keyword, $value)
    {
        $query = "SELECT * FROM Clothe WHERE ClotheName LIKE '%" . $keyword . "%' AND ";
        $query .= "(ClotheId BETWEEN " . $value . " AND " . ($value + 49) . ")";

        $rows = DBConnection::createRowArrayFromQueryResult(DBConnection::executeQuery($query));
        return $rows;
    }

    public static function get50NewestClothesStartingFrom($value)
    {
        $query = "SELECT * FROM Clothe WHERE ClotheId BETWEEN " . $value . " AND " . ($value + 50);

        $rows = DBConnection::createRowArrayFromQueryResult(DBConnection::executeQuery($query));
        return $rows;
    }

    public static function updateClothe($clothe)
    {
        $query = "UPDATE Clothe SET ";
        $query .= "ClotheName = '" . $clothe->getName() . "', ";
        $query .= "ClothePrice = " . $clothe->getPrice() . ", ";
        $query .= "ClotheDiscount = " . $clothe->getDiscount() . ", ";
        $query .= "ClotheSize = " . $clothe->getSize() . ", ";
        $query .= "ClotheChest = " . $clothe->getChest() . ", ";
        $query .= "ClotheLength = " . $clothe->getLength() . ", ";
        $query .= "ClothePicture = '" . $clothe->getPicture() . "', ";
        $query .= "ClotheAvailability = '" . $clothe->getAvailability() . "', ";
        $query .= "ClotheRealName = '" . $clothe->getRealName() . "', ";
        $query .= "ClotheRealPrice = " . $clothe->getRealPrice() . ", ";
        $query .= "ClotheRealCode = '" . $clothe->getRealCode() . "', ";
        $query .= "ClotheCategory = " . $clothe->getCategory() . " ";
        $query .= "WHERE ClotheId = " . $clothe->getId();

        return DBConnection::executeQuery($query);
    }

    public static function deleteClothe($clotheId)
    {
        $query = "DELETE FROM Clothe WHERE ClotheId = " . $clotheId;
        return DBConnection::executeQuery($query);
    }

    public static function getClotheById($clotheId)
    {
        $query = "SELECT * FROM Clothe WHERE ClotheId = " . $clotheId;
        $row = mysqli_fetch_assoc(DBConnection::executeQuery($query));
        return $row;
    }
}