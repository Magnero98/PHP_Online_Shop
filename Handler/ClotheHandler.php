<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 5/24/2018
 * Time: 11:03 PM
 */

include_once '../Repository/UserRepository.php';
include_once '../Repository/ClotheRepository.php';
include_once '../Repository/ColorRepository.php';
include_once '../Repository/CategoryRepository.php';
include_once  '../Factory/UserFactory.php';
include_once '../Model/User.php';

class ClotheHandler
{
    public static function get50NewestClothesWithColorsByCategoryStartingFrom($category, $value)
    {
        $clothes = ClotheRepository::get50NewestClothesByCategoryStartingFrom($category, $value);

        for($i = 0; $i < count($clothes); $i++)
            $clothes[$i]["Colors"] = ColorRepository::getColorsForClotheId($clothes[$i]["ClotheId"]);
        //$clothes["Colors"] = ColorRepository::getColorsForClotheId($clothes["ClotheId"]);

        return json_encode($clothes);
    }

    public static function get50NewestClothesWithColorsByNameStartingFrom($keyword, $value)
    {
        $clothes = ClotheRepository::get50NewestClothesByNameStartingFrom($keyword, $value);
        $clothes["Colors"] = ColorRepository::getColorsForClotheId($clothes["ClotheId"]);

        return json_encode($clothes);
    }

    public static function get50NewestClothesWithColorsStartingFrom($value)
    {
        $clothes = ClotheRepository::get50NewestClothesStartingFrom($value);
        $clothes["Colors"] = ColorRepository::getColorsForClotheId($clothes["ClotheId"]);

        return json_encode($clothes);
    }

    public static function deleteClothe($clotheId)
    {
        return (ClotheRepository::deleteClothe($clotheId) == true) ? "Successful" : "Failed";
    }

    public static function insertNewClothe($clothe)
    {
        return ($clothe->insertNewClothe() == true) ? "Successful" : "Failed";
    }

    public static function updateThisClothe($clothe)
    {
        return ($clothe->updateThisClothe() == true) ? "Successful" : "Failed";
    }

    public static function getClotheWithColorsAndCategoriesByClotheId($clotheId)
    {
        $clothe = ClotheRepository::getClotheById($clotheId);
        $clothe["Colors"] = ColorRepository::getColorsForClotheId($clothe["ClotheId"]);
        $clothe["Categories"] = CategoryRepository::getCategoriesForClotheId($clothe["ClotheId"]);

        return json_encode($clothe);
    }
}