<?php

// Creates the tables of the database.

#include query definitions and connection engine
include_once dirname(__FILE__, $levels=2) . "/DBConnection.php";
include_once dirname(__FILE__, $levels=2) . "/Queries.php";


$engine = new DBConnection();
$conn = $engine->connect();

$sql = array();

array_push($sql,
    CreateTable_Badge,
    CreateTable_User,
    CreateTable_Department,
    CreateTable_UserBadge,
    CreateTable_UserDepartment,
    CreateTable_BadgeRequest,
    CreateTable_EventBadge
);

foreach ($sql as $query) {
    if ($conn->query($query) === TRUE) {
    } 
    else {
        echo "Error creating tables: " . $conn->error;
        $conn->close();
        exit();
    }
}

$conn->close();
sleep(1);
header("Location: ./");

?>
