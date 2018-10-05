<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 6/7/2018
 * Time: 10:53 AM
 */

if($_GET["request"] == "getAllUser")
{
    $startingIndex = $_GET["StartingIndex"];
    echo "getAllUser('" . AdministratorHandler::get50NewestUsersStartingFrom($startingIndex) . "')";
}
elseif ($_GET["request"] == "changeRoleToAdmin")
{
    $userId = $_GET["UserId"];

    echo "changeRoleToAdmin('" . AdministratorHandler::changeRoleToAdmin($userId) . "')";
}
elseif ($_GET["request"] == "deleteUser")
{
    $userId = $_GET["UserId"];

    echo "deleteUser('" . AdministratorHandler::deleteUser($userId) . "')";
}