<?php
    //headers
    header('Content-Type: application/json');

    //initialize api
    include_once('../core/initialize.php');

    //setup user object
    $user = new User($db);

    $result = $user->getUser($_GET["username"]);

    if ($result->num_rows > 0) {
        $user_arr = array();
        $user_arr['data'] = array();

        while($row = $result->fetch_assoc()){
            extract($row);
            $user_item = array(
                'Username' => $Username,
                'LastLogin' => $LastLogin
            );
            array_push($user_arr['data'], $user_item);
        }
        //convert to JSON and output
        echo json_encode($user_arr);
    }
    else {
        echo json_encode(array('message' => 'No users found.'));
    }
?>