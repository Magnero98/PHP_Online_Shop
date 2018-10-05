<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 5/30/2018
 * Time: 8:58 PM
 */

include_once '../Repository/ReviewRepository.php';
include_once '../Model/Review.php';

class ReviewHandler
{
    public static function get50NewestReviewsForClotheIdStartingFrom($clotheId, $value)
    {
        return json_encode(ReviewRepository::get50NewestReviewsForClotheIdStartingFrom($clotheId, $value));
    }

    public static function deleteReviewWithIdForClotheId($reviewId, $clotheId)
    {
        return ReviewRepository::deleteReview($reviewId, $clotheId);
    }

    public static function insertNewReview($review)
    {
        return $review->insertNewReview();
    }

    public static function updateThisReview($review)
    {
        return $review->updateThisReview();
    }
}