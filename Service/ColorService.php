<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 6/12/2018
 * Time: 2:30 PM
 */

include_once '../Repository/ColorRepository.php';

if($_GET["request"] == "insertColor")
{
    $colorName = $_GET["ColorName"];
    $colorCode = $_GET["ColorCode"];

    echo "insertColor(" . ColorRepository::insertColor($colorName, $colorCode) . ")";
}
elseif($_GET["request"] == "updateColor")
{
    $color = json_decode($_GET["Color"]);

    echo "updateColor(" . ColorRepository::updateColor($color->ColorId, $color->ColorName, $color->ColorCode) . ")";
}
elseif($_GET["request"] == "deleteColor")
{
    $colorId = $_GET["ColorId"];

    echo "deleteColor(" . ColorRepository::deleteColor($colorId) . ")";
}
elseif($_GET["request"] == "getColorsForClotheId")
{
    $clotheId = $_GET["ClotheId"];

    echo "getColorsForClotheId(" . ColorRepository::getColorsForClotheId($clotheId) . ")";
}
elseif($_GET["request"] == "insertColorForClotheId")
{
    $colorId = $_GET["ColorId"];
    $clotheId = $_GET["ClotheId"];

    echo "getColorsForClotheId(" . ColorRepository::insertColorForClotheId($colorId, $clotheId) . ")";
}
elseif($_GET["request"] == "updateColorForClotheId")
{
    $oldColorId = $_GET["OldColorId"];
    $newColorId = $_GET["NewColorId"];
    $clotheId = $_GET["ClotheId"];

    echo "getColorsForClotheId(" . ColorRepository::updateColorForClotheId($oldColorId, $clotheId, $newColorId) . ")";
}
elseif($_GET["request"] == "deleteColorForClotheId")
{
    $colorId = $_GET["ColorId"];
    $clotheId = $_GET["ClotheId"];

    echo "deleteColorForClotheId(" . ColorRepository::deleteColorForClotheId($colorId, $clotheId) . ")";
}