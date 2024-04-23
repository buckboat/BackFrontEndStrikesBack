<?php
    //headers
    header('Content-Type: application/json');

    //initialize api
    include_once('../core/initialize.php');

    //setup user object
    $result = $db->run(User::postProfilePic($_GET["userID"], $_GET["pictureID"]));  

    if ($result) {
        echo json_encode(array('message' => 'POST completed successfully'));
    }
    else {
        echo json_encode(array('message' => 'No users found.'));
    }


?>