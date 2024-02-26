<?php

#include query definitions and connection engine
include_once dirname(__FILE__) . "/DBConnection.php";
include_once dirname(__FILE__) . "/Queries.php";

$engine = new DBConnection();

# drop and create database

# connection with no database specified
$conn = $engine->connectNoDB();


if ($conn->query(DropDatabase) === TRUE) {
    echo "Database Dropped\n";
}
else {
    echo "Error dropping database: " . $conn->error;
    $conn->close();
    exit();
}

if ($conn->query(CreateDatabase) === TRUE) {
    $conn->close();
}
else {
    echo "Error creating database: " . $conn->error;
    $conn->close();
    exit();
}


# New connection with database specified
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


# new connection to avoid conflicts
$conn = $engine->connect();

// Insert demo data
$sql = array();

array_push($sql,
    DummyData_User,
    DummyData_Badge,
    DummyData_UserBadge,
    DummyData_Department,
    DummyData_UserDepartment,
    DummyData_BadgeRequest,
    DummyData_EventBadge
);

foreach ($sql as $query) {
    if ($conn->query($query) === TRUE) {
    } 
    else {
        echo "Error inserting demo data: " . $conn->error;
        $conn->close();
        exit();
    }
}

$conn->close();
sleep(1);
header("Location: ./");

?>