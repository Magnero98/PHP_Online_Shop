<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 5/24/2018
 * Time: 8:20 AM
 */

include_once "../DBConnection.php";
include_once "../Model/User.php";

class UserRepository
{
    public static function insertUser($user)
    {
        $query = "INSERT INTO User";
        $query .= "(UserRoleId, UserName, UserEmail,";
        $query .= " UserPassword, UserGender, UserDOB,";
        $query .= " UserProfilePicture, UserPhone, UserAddress,";
        $query .= " UserPoints) VALUES (";

        $query .= $user->getRole() . ", ";
        $query .= "'" . $user->getName() . "'" . ", ";
        $query .= "'" . $user->getEmail() . "'" . ", ";
        $query .= "'" . $user->getPassword() . "'" . ", ";
        $query .= "'" . $user->getGender() . "'" . ", ";
        $query .= "'" . $user->getDOB() . "'" . ", ";
        $query .= "'" . $user->getProfilePicture() . "'" . ", ";
        $query .= "'" . $user->getPhone() . "'" . ", ";
        $query .= "'" . $user->getAddress() . "'" . ", ";
        $query .= $user->getPoints();

        $query .= ");";

        return DBConnection::executeQuery($query);
    }

    public static function changeUserPassword($userId, $newPassword)
    {
        $query = "UPDATE User SET UserPassword = ";
        $query .= "'" . $newPassword . "'";
        $query .= " WHERE UserId = " . $userId;

        return DBConnection::executeQuery($query);
    }

    public static function get50NewestUsersStartingFrom($value)
    {
        $query = "SELECT * FROM User WHERE UserId BETWEEN " . $value . " AND " . ($value + 49);
        $rows = DBConnection::createRowArrayFromQueryResult(DBConnection::executeQuery($query));
        return $rows;
    }

    public static function getUserByEmail($email)
    {
        $query = "SELECT * FROM User WHERE UserEmail LIKE " . "'" . $email . "'";
        $row = mysqli_fetch_assoc(DBConnection::executeQuery($query));
        return $row;
    }

    public static function getUserById($userId)
    {
        $query = "SELECT * FROM User WHERE UserId = " . $userId;
        $row = mysqli_fetch_assoc(DBConnection::executeQuery($query));
        return $row;
    }

    public static function updateUser($user)
    {
        $query = "UPDATE User SET ";

        $query .= "UserName = '" . $user->getName() . "', ";
        $query .= "UserRoleId = " . $user->getRole() . ", ";
        $query .= "UserEmail = '" . $user->getEmail() . "', ";
        $query .= "UserPassword = '" . $user->getPassword() . "', ";
        $query .= "UserGender = '" . $user->getGender() . "', ";
        $query .= "UserDOB = '" . $user->getDOB() . "', ";
        $query .= "UserProfilePicture = '" . $user->getProfilePicture() . "', ";
        $query .= "UserPhone = '" . $user->getPhone() . "', ";
        $query .= "UserAddress = '" . $user->getAddress() . "', ";
        $query .= "UserPoints = " . $user->getPoints() . " ";
        $query .= "WHERE UserId = " . $user->getId();

        return DBConnection::executeQuery($query);
    }

    public static function changeUserRoleToAdmin($userId)
    {
        $query = "UPDATE User SET UserRoleId = 1 WHERE UserId = " . $userId;
        return DBConnection::executeQuery($query);
    }

    public static  function deleteUser($userId)
    {
        $query = "DELETE FROM User WHERE UserId = " . $userId;
        return DBConnection::executeQuery($query);
    }
}