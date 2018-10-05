<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 5/24/2018
 * Time: 11:52 AM
 */

include_once '../Model/User.php';

class UserFactory
{
    public static function createUser()
    {
        return new User();
    }

    public static function createUserWithFields
    (
        $name,
        $role,
        $email,
        $password,
        $gender,
        $DOB,
        $profilePicture,
        $phone,
        $address,
        $points,
        $id = -1
    )
    {
        $user = self::createUser();

        $user->setId($id);
        $user->setName($name);
        $user->setRole($role);
        $user->setEmail($email);
        $user->setPassword($password);
        $user->setGender($gender);
        $user->setDOB($DOB);
        $user->setProfilePicture($profilePicture);
        $user->setPhone($phone);
        $user->setAddress($address);
        $user->setPoints(0);

        return $user;
    }

    public static function createUserFromTableRow($row)
    {
        $user = self::createUserWithFields
        (
            $row["UserName"],
            $row["UserRoleId"],
            $row["UserEmail"],
            $row["UserPassword"],
            $row["UserGender"],
            $row["UserDOB"],
            $row["UserProfilePicture"],
            $row["UserPhone"],
            $row["UserAddress"],
            $row["UserPoints"],
            $row["UserId"]
        );

        return $user;
    }

    public static function createUserFromQueryResult($queryResult)
    {
        $row = mysqli_fetch_assoc($queryResult);
        return self::createUserFromTableRow($row);
    }

    public static function createUserArrayFromQueryResult($queryResult)
    {
        $users = array();

        while($row = mysqli_fetch_assoc($queryResult))
            $users[] = self::createUserFromTableRow($row);

        return $users;
    }

    public static function createUserFromJSON($jsonString)
    {
        $object = json_decode($jsonString);

        $user = self::createUserWithFields
        (
            $object->UserName,
            $object->UserRole,
            $object->UserEmail,
            $object->UserPassword,
            $object->UserGender,
            $object->UserDOB,
            $object->UserProfilePicture,
            $object->UserPhone,
            $object->UserAddress,
            $object->UserPoints,
            $object->UserId
        );

        return $user;
    }
}