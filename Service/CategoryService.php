<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 6/12/2018
 * Time: 2:30 PM
 */

include_once '../Service/CategoryService.php';

if($_GET["request"] == "getAllCategory")
{
    echo "getAllCategory(" . CategoryRepository::getAllCategory() . ")";
}
elseif($_GET["request"] == "insertCategory")
{
    $categoryName = $_GET["CategoryName"];
    echo "insertCategory(" . CategoryRepository::insertCategory($categoryName) . ")";
}
elseif($_GET["request"] == "updateCategory")
{
    $category = json_decode($_GET["Category"]);
    echo "updateCategory(" . CategoryRepository::updateCategory($category->CategoryId, $category->CategoryName) . ")";
}
elseif($_GET["request"] == "deleteCategory")
{
    $categoryId = $_GET["CategoryId"];
    echo "deleteCategory(" . CategoryRepository::deleteCategory($categoryId) . ")";
}
elseif($_GET["request"] == "getCategoriesForClotheId")
{
    $clotheId = $_GET["ClotheId"];
    echo "getCategoriesForClotheId(" . CategoryRepository::getCategoriesForClotheId($clotheId) . ")";
}
elseif($_GET["request"] == "insertCategoryForClotheId")
{
    $categoryId = $_GET["CategoryId"];
    $clotheId = $_GET["ClotheId"];
    echo "insertCategoryForClotheId(" . CategoryRepository::insertCategoryForClotheId($categoryId, $clotheId) . ")";
}
elseif($_GET["request"] == "updateCategoryForClotheId")
{
    $categoryId = $_GET["CategoryId"];
    $clotheId = $_GET["ClotheId"];
    echo "updateCategoryForClotheId(" . CategoryRepository::updateCategoryForClotheId($categoryId, $clotheId) . ")";
}
elseif($_GET["request"] == "deleteCategoryForClotheId")
{
    $categoryId = $_GET["CategoryId"];
    $clotheId = $_GET["ClotheId"];
    echo "deleteCategoryForClotheId(" . CategoryRepository::deleteCategoryForClotheId($categoryId, $clotheId) . ")";
}