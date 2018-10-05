<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 6/7/2018
 * Time: 9:32 AM
 */

include_once '../Handler/ClotheHandler.php';

if ($_GET["request"] == "get50NewestClothesByCategory")
{
    $category = $_GET["Category"];
    $startingIndex = $_GET["StartingIndex"];

    echo "get50NewestClothesByCategory" . $category . "('" . ClotheHandler::get50NewestClothesWithColorsByCategoryStartingFrom($category, $startingIndex) . "')";
}
elseif ($_GET["request"] == "get50NewestClothesByName")
{
    $keyword = $_GET["Keyword"];
    $startingIndex = $_GET["StartingIndex"];

    echo "get50NewestClothesByName('" . ClotheHandler::get50NewestClothesWithColorsByNameStartingFrom($keyword, $startingIndex) . "')";
}
elseif ($_GET["request"] == "get50NewestClothes")
{
    $startingIndex = $_GET["StartingIndex"];

    echo "get50NewestClothes('" . ClotheHandler::get50NewestClothesWithColorsStartingFrom($startingIndex) . "')";
}
elseif ($_GET["request"] == "deleteClothe")
{
    $clotheId = $_GET["ClotheId"];

    echo "deleteClothe('" . ClotheHandler::deleteClothe($clotheId) . "')";
}
elseif ($_GET["request"] == "insertClothe")
{
    $json = $_GET["Clothe"];
    $clothe = ClotheFactory::createClotheFromJSON($json);

    echo "insertClothe('" . ClotheHandler::insertNewClothe($clothe) . "')";
}
elseif ($_GET["request"] == "updateClothe")
{
    $json = $_GET["Clothe"];
    $clothe = ClotheFactory::createClotheFromJSON($json);

    echo "updateClothe('" . ClotheHandler::updateThisClothe($clothe) . "')";
}
elseif ($_GET["request"] == "getClotheById")
{
    $clotheId = $_GET["ClotheId"];

    echo "getClotheById('" . ClotheHandler::getClotheWithColorsAndCategoriesByClotheId($clotheId) . "')";
}