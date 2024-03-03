<?php
include 'DBConnection.php';

if(isset($_GET['id'])){
    $id = $_GET['id'];
    
    // Delete entry from database
    $sql = "DELETE FROM DB_NAME WHERE id = $id";
    if(mysqli_query($conn, $sql)){
        echo "Entry deleted successfully.";
    } else {
        echo "Error deleting entry: " . mysqli_error($conn);
    }
} else {
    echo "Invalid request.";
}

// Close database connection
mysqli_close($conn);
?>