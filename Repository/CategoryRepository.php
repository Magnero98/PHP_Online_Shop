<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 6/12/2018
 * Time: 12:14 PM
 */

class CategoryRepository
{
    public static function getAllCategory()
    {
        $query = "SELECT * FROM Cateogry";
        $row = mysqli_fetch_assoc(DBConnection::executeQuery($query));
        return $row;
    }

    public static function insertCategory($categoryName)
    {
        $query = "INSERT INTO Category VALUES('" . $categoryName . "')";
        return DBConnection::executeQuery($query);
    }

    public static function updateCategory($categoryId, $categoryName)
    {
        $query = "UPDATE Category SET ";
        $query .= "CategoryName = '" . $categoryName . "' ";
        $query .= "WHERE CategoryId = " . $categoryId;

        return DBConnection::executeQuery($query);
    }

    public static function deleteCategory($categoryId)
    {
        $query = "DELETE FROM CategoryDetail WHERE CategoryId = " . $categoryId;
        if(!DBConnection::executeQuery($query))
            return false;

        $query = "DELETE FROM Category WHERE CategoryId = " . $categoryId;
        return DBConnection::executeQuery($query);
    }

    public static function getCategoriesForClotheId($clotheId)
    {
        $query = "SELECT ";
        $query .= "CategoryId, CategoryName ";
        $query .= "FROM ";
        $query .= "CategoryDetail AS cd ";
        $query .= "JOIN Category AS c ON cd.CategoryId = c.CategoryId ";
        $query .= "WHERE ";
        $query .= "ClotheId = " . $clotheId;

        $row = mysqli_fetch_assoc(DBConnection::executeQuery($query));
        return $row;
    }

    public static function insertCategoryForClotheId($categoryId, $clotheId)
    {
        $query = "INSERT INTO CategoryDetail VALUES (" . $categoryId . "," . $clotheId . ")";
        return DBConnection::executeQuery($query);
    }

    public static function updateCategoryForClotheId($categoryId, $clotheId)
    {
        $query = "UPDATE CategoryDetail SET ";
        $query .= "CategoryId = '" . $categoryId. "' ";
        $query .= "WHERE ClotheId = " . $clotheId;

        return DBConnection::executeQuery($query);
    }

    public static function deleteCategoryForClotheId($categoryId, $clotheId)
    {
        $query = "DELETE FROM CategoryDetail WHERE ";
        $query .= "CategoryId = " . $categoryId . " AND ";
        $query .= "ClotheId = " . $clotheId;

        return DBConnection::executeQuery($query);
    }
}