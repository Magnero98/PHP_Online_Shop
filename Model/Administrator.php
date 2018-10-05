<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 5/24/2018
 * Time: 8:55 PM
 */

include_once '../Repository/UserRepository.php';

class Administrator extends User
{
    public static function get50NewestUsersStartingFrom($value)
    {
        return UserRepository::get50NewestUsersStartingFrom($value);
    }

    public static function changeRoleToAdmin($userId)
    {
        return UserRepository::changeUserRoleToAdmin($userId);
    }

    public static function deleteUser($userId)
    {
        return UserRepository::deleteUser($userId);
    }
}