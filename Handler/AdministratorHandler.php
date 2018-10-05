<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 6/7/2018
 * Time: 10:36 AM
 */

include_once '../Factory/UserFactory.php';
include_once '../Model/Administrator.php';

class AdministratorHandler
{
    public static function get50NewestUsersStartingFrom($value)
    {
        $administrators = UserFactory::createUserArrayFromQueryResult
        (Administrator::get50NewestUsersStartingFrom($value));

        return json_encode($administrators);
    }

    public static function changeRoleToAdmin($userId)
    {
        return Administrator::changeRoleToAdmin($userId) ? "Successful" : "Failed";
    }

    public static function deleteUser($userId)
    {
        return Administrator::deleteUser($userId) ? "Successful" : "Failed";;
    }
}