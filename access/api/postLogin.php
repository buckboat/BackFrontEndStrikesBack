<?php
    //headers
    header('Content-Type: application/json');

    //initialize api
    include_once('../core/initialize.php');

    $result = $db->run(User::postLogin($_GET["userID"]));

    if ($result) {
        echo json_encode(array('message' => 'POST completed successfully'));
    }
    else {
        echo json_encode(array('message' => 'Error'));
    }

?>