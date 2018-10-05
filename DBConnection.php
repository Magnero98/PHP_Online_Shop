<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 5/24/2018
 * Time: 8:29 AM
 */

class DBConnection
{
    public static $DBSERVER = "fdb19.awardspace.net";
    public static $DBNAME = "2595965_db";
    public static $USERNAME = "2595965_db";
    public static $PASS = "yansen10";

    public static function buildConnection()
    {
        $con = mysqli_connect(self::$DBSERVER, self::$USERNAME, self::$PASS, self::$DBNAME);

        if(!$con)
        {
            die("Could not connect: " . mysqli_connect_error() . mysqli_error($con));
        }

        mysqli_select_db($con, self::$DBNAME);

        return $con;
    }

    public static function executeQuery($query)
    {
        $connection = DBConnection::buildConnection();
        $result = mysqli_query($connection, $query);

        if(!$result)
            echo mysqli_error($connection);

        return $result;
    }

    public static function createRowArrayFromQueryResult($queryResult)
    {
        $rows = array();

        while ($row = mysqli_fetch_assoc($queryResult))
            $rows[] = $row;

        return $rows;
    }
}