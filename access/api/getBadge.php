<?php
    //headers
    header('Content-Type: application/json');

    //initialize api
    include_once('../core/initialize.php');

    $result = $db->run(Badge::getBadge($_GET["badgeID"]));

    if ($result->num_rows > 0) {
        $badge_arr = array();
        $badge_arr['data'] = array();

        while($row = $result->fetch_assoc()){
            extract($row);

            $badge_item = array(
                'BadgeID' => $BadgeID,
                'BadgeName' => $BadgeName,
                'BadgeDesc' => $BadgeDesc,
                'BadgeCriteria' => $BadgeCriteria,
                'BadgeIcon' => $BadgeIcon,
                'BadgeCreated' => $BadgeCreated
            );

            array_push($badge_arr['data'], $badge_item);
        }
        //convert to JSON and output
        echo json_encode($badge_arr);
    }
    else {
        echo json_encode(array('message' => 'No users found.'));
    }
?>