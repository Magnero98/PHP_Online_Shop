<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 5/23/2018
 * Time: 10:22 PM
 */

include_once '../Repository/UserRepository.php';

class User
{
    private $id;
    private $name;
    private $role;
    private $email;
    private $password;
    private $gender;
    private $DOB;
    private $profilePicture;
    private $phone;
    private $address;
    private $points;

    const ADMIN = 1;
    const USER = 2;

    public function setId($value) 			    { $this->id = $value; }
    public function setName($value) 			{ $this->name = $value; }
    public function setRole($value) 			{ $this->role = $value; }
    public function setEmail($value) 			{ $this->email = $value; }
    public function setPassword($value) 		{ $this->password = $value; }
    public function setGender($value)			{ $this->gender = $value; }
    public function setDOB($value) 				{ $this->DOB = $value; }
    public function setProfilePicture($value) 	{ $this->profilePicture = $value; }
    public function setPhone($value) 			{ $this->phone = $value; }
    public function setAddress($value) 			{ $this->address = $value; }
    public function setPoints($value) 			{ $this->points = $value; }

    public function getId() 			{ return $this->id; }
    public function getName() 			{ return $this->name; }
    public function getRole() 			{ return $this->role; }
    public function getEmail() 			{ return $this->email; }
    public function getPassword() 		{ return $this->password; }
    public function getGender()			{ return $this->gender; }
    public function getDOB() 			{ return $this->DOB; }
    public function getProfilePicture(){ return $this->profilePicture; }
    public function getPhone() 			{ return $this->phone; }
    public function getAddress() 		{ return $this->address; }
    public function getPoints() 		{ return $this->points; }

    public function insertNewUserToDatabase()
    {
        return UserRepository::insertUser($this);
    }

    public function updateCurrentUser()
    {
        return UserRepository::updateUser($this);
    }

    public function changePassword($newPassword)
    {
        return UserRepository::changeUserPassword($this->id, $newPassword);
    }

    public function saveCurrentUserToCookiesFor1Week()
    {
        $cookieName = "currentUser";
        $cookieValue = $this;
        $cookieLifetime = 86400 * 30;

        setcookie($cookieName, $cookieValue, $cookieLifetime);
        return (isset($_COOKIE['currentUser'])) ? true : false;
    }

    public function saveCurrentUserToSession()
    {
        $sessionName = "currentUser";
        $sessionValue = $this;
        $_SESSION[$sessionName] = $sessionValue;
    }

    public function validateUserPassword($password)
    {
        return ($this->password == $password) ? true : false;
    }
}