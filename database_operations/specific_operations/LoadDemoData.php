<?php

// Used to load data into a newly created database.

include_once dirname(__FILE__, $levels=2) . "/Constants.php";
include_once dirname(__FILE__, $levels=2) . "/DBConnection.php";
include_once dirname(__FILE__, $levels=2) . "/Queries.php";

$engine = new DBConnection();
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