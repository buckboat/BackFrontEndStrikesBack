<?php

// Creates the database if it does not exist.

include_once dirname(__FILE__, $levels=2) . "/DBConnection.php";
include_once dirname(__FILE__, $levels=2) . "/Queries.php";

$engine = new DBConnection();
$conn = $engine->connectNoDB();


if ($conn->query(CreateDatabase) === TRUE) {
    $conn->close();
    sleep(1);
    header("Location: ./");
}
else {
    echo "Error creating database: " . $conn->error;
    $conn->close();
}
?>