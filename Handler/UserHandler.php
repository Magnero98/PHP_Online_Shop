<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 5/24/2018
 * Time: 10:45 PM
 */

include_once '../Model/User.php';
include_once '../Repository/UserRepository.php';
include_once '../Factory/UserFactory.php';

class UserHandler
{
    public static function get50NewestUsersStartingFrom($value)
    {
        $users = UserRepository::get50NewestUsersStartingFrom($value);

        return json_encode($users);
    }

    public static function getUserByEmail($email)
    {
        $user = UserRepository::getUserByEmail($email);

        return json_encode($user);
    }

    public static function isLoggedIn()
    {
        return ($_SESSION["currentUser"] == null) ? "False" : "True";
    }

    public static function insertNewUser($user)
    {
        return ($user->insertNewUserToDatabase() == true) ? "Successful" : "Failed";
    }

    public static function changeUserPassword($userId, $userPassword)
    {
        $user = UserFactory::createUser();
        $user->setId($userId);
        $user->setPassword($userPassword);
        return ($user->changePassword($user->getPassword()) == true) ? "Successful" : "Failed";
    }

    public static function updateCurrentUser($user)
    {
        return ($user->updateCurrentUser() == true) ? "Successful" : "Failed";
    }

    public static function validateLoginUser($email, $password)
    {
        $user = UserFactory::createUserFromTableRow
        (UserRepository::getUserByEmail($email));

        if($user == null)
            return "email does not exist";

        return ($user->validateUserPassword($password) == true) ? "Successful" : "incorrect password";
    }
}