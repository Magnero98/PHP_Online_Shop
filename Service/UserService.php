<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 6/7/2018
 * Time: 11:00 AM
 */

include_once '../Handler/UserHandler.php';
include_once '../Factory/UserFactory.php';

if($_GET["request"] == "get50NewestUsers")
{
    $startingIndex = $_GET["StartingIndex"];

    echo "get50NewestUsers('" . UserHandler::get50NewestUsersStartingFrom($startingIndex) . "')";
}
elseif ($_GET["request"] == "getUserByEmail")
{
    $userEmail = $_GET["UserEmail"];

    echo "getUserByEmail('" . UserHandler::getUserByEmail($userEmail) . "')";
}
elseif ($_GET["request"] == "isLoggedIn")
{
    echo "isLoggedIn('" . UserHandler::isLoggedIn() . "')";
}
elseif ($_GET["request"] == "insertUser")
{
    $json = $_GET["User"];
    $user = UserFactory::createUserFromJSON($json);

    echo "insertUser('" . UserHandler::insertNewUser($user) . "')";
}
elseif ($_GET["request"] == "changeUserPassword")
{
    $userId= $_GET["UserId"];
    $userPassword= $_GET["UserPassword"];

    echo "changeUserPassword('" . UserHandler::changeUserPassword($userId, $userPassword) . "')";
}
elseif ($_GET["request"] == "updateUser")
{
    $json = $_GET["User"];
    $user = UserFactory::createUserFromJSON($json);

    echo "updateUser('" . UserHandler::updateCurrentUser($user) . "')";
}
elseif ($_GET["request"] == "validateLoginUser")
{
    $userEmail = $_GET["UserEmail"];
    $userPassword= $_GET["UserPassword"];

    echo "validateLoginUser('" . UserHandler::validateLoginUser($userEmail, $userPassword) . "')";
}