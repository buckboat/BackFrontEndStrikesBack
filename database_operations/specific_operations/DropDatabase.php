<?php

// Used to reset auto-increment counters for proper loading of demo data. 

#include query definitions and connection engine
include_once dirname(__FILE__, $levels=2) . "/DBConnection.php";
include_once dirname(__FILE__, $levels=2) . "/Queries.php";

$engine = new DBConnection();
$conn = $engine->connectNoDB();

if ($conn->query(DropDatabase) === TRUE) {
    echo "Database Dropped\n";
}
else {
    echo "Error dropping database: " . $conn->error;
    $conn->close();
    exit();
}

$conn->close();
sleep(1);
header("Location: ./");

?>