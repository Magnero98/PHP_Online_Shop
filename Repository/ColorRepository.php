<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 6/12/2018
 * Time: 12:31 PM
 */

include_once '../DBConnection.php';

class ColorRepository
{
    public static function insertColor($colorName, $colorCode)
    {
        $query = "INSERT INTO Color VALUES('" . $colorName . "','" . $colorCode . "')";
        return DBConnection::executeQuery($query);
    }

    public static function updateColor($colorId, $colorName, $colorCode)
    {
        $query = "UPDATE Color SET ";
        $query .= "ColorName = '" . $colorName . "', ";
        $query .= "ColorCode = '" . $colorCode . "' ";
        $query .= "WHERE ColorId = " . $colorId;

        return DBConnection::executeQuery($query);
    }

    public static function deleteColor($colorId)
    {
        $query = "DELETE FROM ColorDetail WHERE ColorId = " . $colorId;
        if(!DBConnection::executeQuery($query))
            return false;

        $query = "DELETE FROM Color WHERE ColorId = " . $colorId;
        return DBConnection::executeQuery($query);
    }

    public static function getColorsForClotheId($clotheId)
    {
        $query = "SELECT ";
        $query .= "cd.ColorId, ColorName, ColorCode ";
        $query .= "FROM ";
        $query .= "ColorDetail AS cd ";
        $query .= "JOIN Color AS c ON cd.ColorId = c.ColorId ";
        $query .= "WHERE ";
        $query .= "ClotheId = " . $clotheId;

        $row = DBConnection::createRowArrayFromQueryResult(DBConnection::executeQuery($query));
        return $row;
    }

    public static function insertColorForClotheId($colorId, $clotheId)
    {
        $query = "INSERT INTO ColorDetail VALUES (" . $colorId . "," . $clotheId . ")";
        return DBConnection::executeQuery($query);
    }

    public static function updateColorForClotheId($oldColorId, $clotheId, $newColorId)
    {
        $query = "UPDATE ColorDetail SET ";
        $query .= "ColorId = '" . $newColorId. "' ";
        $query .= "WHERE ClotheId = " . $clotheId . " AND ";
        $query .= "ColorId = " . $oldColorId;

        return DBConnection::executeQuery($query);
    }

    public static function deleteColorForClotheId($colorId, $clotheId)
    {
        $query = "DELETE FROM ColorDetail WHERE ";
        $query .= "ColorId = " . $colorId . " AND ";
        $query .= "ClotheId = " . $clotheId;

        return DBConnection::executeQuery($query);
    }
}