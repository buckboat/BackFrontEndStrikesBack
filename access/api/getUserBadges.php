<?php
    //headers
    header('Content-Type: application/json');

    //initialize api
    include_once('../core/initialize.php');

    $result = $db->run(UserBadge::getUserBadges($_GET["userID"]));

    if ($result->num_rows > 0) {
        $badge_arr = array();
        $badge_arr['data'] = array();
        $badge_arr['data']['completed_badges'] = array();
        $badge_arr['data']['in_progress'] = array();


        while($row = $result->fetch_assoc()){
            extract($row);

            $badge_item = array(
                'BadgeID' => $BadgeID,
                'BadgeName' => $BadgeName,
                'BadgeDesc' => $BadgeDesc,
                'BadgeCriteria' => $BadgeCriteria,
                'BadgeIcon' => $BadgeIcon,
                'BadgeCreated' => $BadgeCreated,
                'BadgeSteps' => $BadgeSteps,
                'BadgeStepsCompleted' => $BadgeStepsCompleted
            );
            if ($BadgeSteps == $BadgeStepsCompleted) {
                array_push($badge_arr['data']['completed_badges'], $badge_item);
            } else {
                array_push($badge_arr['data']['in_progress'], $badge_item);
            }
        }
        //convert to JSON and output
        echo json_encode($badge_arr);
    }
    else {
        echo json_encode(array('message' => 'No users found.'));
    }
?>