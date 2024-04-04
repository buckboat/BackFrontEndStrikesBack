<?php
    //headers
    header('Content-Type: application/json');

    //initialize api
    include_once('../core/initialize.php');

    //setup user object
    $result = $db->run(UserBadge::getUserBadge($_GET["userID"], $_GET["badgeID"]));
    $steps = 1;
    $output = array();

    if ($result->num_rows > 0) {
        extract($result->fetch_assoc());
        if ($BadgeStepsCompleted < $BadgeSteps) {
            $steps = $BadgeStepsCompleted + 1;
            $db->run(UserBadge::updateUserBadge($_GET["userID"], $_GET["badgeID"], $steps));
        }
        else {
            $output['error'] = 'Badge already complete.';
        }
    }
    else {
        $db->run(UserBadge::insertUserBadge($_GET["userID"], $_GET["badgeID"], $steps));
    }
    $output['message'] = "POST completed successfuly";
    echo json_encode($output);

?>