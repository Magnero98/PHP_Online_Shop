<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 5/30/2018
 * Time: 9:27 PM
 */

include_once '../Model/Review.php';

class ReviewFactory
{
    public static function createReview()
    {
        return new Review();
    }

    public static function createReviewWithFields
    (
        $userId,
        $clotheId,
        $rating,
        $message,
        $id = -1
    )
    {
        $review = self::createReview();
        $review->setUserId($userId);
        $review->setClotheId($clotheId);
        $review->setRating($rating);
        $review->setMessage($message);
        $review->setId($id);

        return $review;
    }

    public static function createReviewFromTableRow($row)
    {
        $review = self::createReviewWithFields
        (
            $row["userId"],
            $row["clotheId"],
            $row["rating"],
            $row["message"],
            $row["id"]
        );

        return $review;
    }

    public static function createReviewArrayFromQueryResult($queryResult)
    {
        $reviews = array();
        while($row = mysqli_fetch_assoc($queryResult))
            $reviews[] = self::createReviewFromTableRow($row);

        return $reviews;
    }

    public static function createReviewFromJSON($jsonString)
    {
        $object = json_decode($jsonString);

        $review = self::createReviewWithFields
        (
            $object->ReviewUserId,
            $object->ReviewClotheId,
            $object->ReviewRating,
            $object->ReviewMessage,
            $object->ReviewId
        );

        return $review;
    }
}