<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 5/26/2018
 * Time: 9:16 PM
 */

include_once '../Repository/ReviewRepository.php';

class Review
{
    private $id;
    private $userId;
    private $clotheId;
    private $rating;
    private $message;

    public function getId()         { return $this->id; }
    public function getUserId()     { return $this->userId; }
    public function getClotheId()   { return $this->clotheId; }
    public function getRating()     { return $this->rating; }
    public function getMessage()    { return $this->message; }
    public function getUser()
    {
        $user = UserFactory::createUserFromQueryResult
        (UserRepository::getUserById($this->id));

        return $user;
    }

    public function getClothe()
    {
        $clothe = ClotheFactory::createClotheFromQueryResult
        (ClotheRepository::getClotheById($this->id));

        return $clothe;
    }

    public function setId($value)       { $this->id = $value; }
    public function setUserId($value)   { $this->userId = $value; }
    public function setClotheId($value) { $this->clotheId = $value; }
    public function setRating($value)   { $this->rating = $value; }
    public function setMessage($value)  { $this->message = $value; }

    public function insertNewReview()
    {
        return ReviewRepository::insertReview($this);
    }

    public function updateThisReview()
    {
        return ReviewRepository::updateReview($this);
    }
}