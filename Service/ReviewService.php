<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 6/7/2018
 * Time: 10:18 AM
 */
if($_GET["request"] == "get50NewestReviewsForClotheId")
{
    $clotheId = $_GET["ClotheId"];
    $startingIndex = $_GET["StartingIndex"];

    echo "get50NewestReviewsForClotheId('" . ReviewHandler::get50NewestReviewsForClotheIdStartingFrom($clotheId, $startingIndex) . "')";
}
elseif ($_GET["request"] == "deleteReviewWithIdForClotheId")
{
    $reviewId = $_GET["ReviewId"];
    $clotheId = $_GET["ClotheId"];

    echo "deleteReviewWithIdForClotheId('" . ReviewHandler::deleteReviewWithIdForClotheId($reviewId, $clotheId) . "')";
}
elseif ($_GET["request"] == "insertReview")
{
    $json = $_GET["Review"];
    $review = ReviewFactory::createReviewFromJSON($json);

    echo "insertReview('" . ReviewHandler::insertNewReview($review) . "')";
}
elseif ($_GET["request"] == "updateReview")
{
    $json = $_GET["Review"];
    $review = ReviewFactory::createReviewFromJSON($json);

    echo "updateReview('" . ReviewHandler::updateThisReview($review) . "')";
}