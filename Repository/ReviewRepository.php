<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 5/26/2018
 * Time: 9:23 PM
 */

class ReviewRepository
{
    public static function insertReview($review)
    {
        $query = "INSERT INTO ReviewHeader ";
        $query .= "VALUES ";
        $query .= "(";
        $query .= $review->getUserId() . ", ";
        $query .= $review->getRating() . ", ";
        $query .= "'" . $review->getMessage() . "'";
        $query .= ")";

        if(!DBConnection::executeQuery($query))
            return false;

        $query .= "INSERT INTO ReviewDetail ";
        $query .= "VALUES ";
        $query .= "(";
        $query .= $review->getUserId() . ", ";
        $query .= $review->getClotheId();
        $query .= ")";

        return DBConnection::executeQuery($query);
    }

    public static function updateReview($review)
    {
        $query = "UPDATE ReviewHeader ";
        $query .= "SET ";
        $query .= "UserId = " . $review->getUserId() . ", ";
        $query .= "ReviewRating = " . $review->getRating() . ", ";
        $query .= "ReviewMessage = " . "'" . $review->getMessage() . "'";
        $query .= "WHERE ReviewHeaderId = " . $review->getId();

        return DBConnection::executeQuery($query);
    }

    public static function deleteReview($review)
    {
        $query = "DELETE FROM ReviewDetail WHERE ReviewHeaderId = " . $review->getId();
        $query .= " AND ClotheId = " . $review->getClotheId();

        $successful = DBConnection::executeQuery($query);

        if($successful)
        {
            $query = "DELETE FROM ReviewHeader WHERE ReviewHeaderId = " . $review->getId();
            return DBConnection::executeQuery($query);
        }
        else
        {
            return false;
        }
    }

    public static function get50NewestReviewsForClotheIdStartingFrom($clotheId, $value)
    {
        $query = "SELECT ";
        $query .= "ReviewHeaderId, ";
        $query .= "ReviewRating, ";
        $query .= "ReviewMessage ";
        $query .= "FROM ";
        $query .= "ReviewDetail AS rd JOIN ";
        $query .= "ReviewHeader AS rh ON rd.ReviewHeaderId = rh.ReviewHeaderId ";
        $query .= "WHERE ";
        $query .= "ClotheId = " . $clotheId . " AND ";
        $query .= "(ReviewHeaderId BETWEEN" . $value . " AND " . ($value + 49) . ")";

        $rows = DBConnection::createRowArrayFromQueryResult(DBConnection::executeQuery($query));
        return $rows;
    }
}