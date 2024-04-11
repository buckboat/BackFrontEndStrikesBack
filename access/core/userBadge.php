<?php

    class UserBadge {
        //db stuff
        private static $table = 'UserBadge';
        private static $badgeTable = 'Badge';

        public static function getUserBadge($userid, $badgeid){
            $query = 'SELECT a.*, b.BadgeStepsCompleted FROM '. UserBadge::$badgeTable .' a 
            INNER JOIN '. UserBadge::$table .' b ON a.BadgeID = b.BadgeID 
            WHERE b.UserID = "'.$userid.'" AND b.BadgeID = "'.$badgeid.'";';

            return $query;
        }

        public static function getUserBadges($userid){
            $query = 'SELECT a.*, b.BadgeStepsCompleted FROM '. UserBadge::$badgeTable .' a 
            INNER JOIN '. UserBadge::$table .' b ON a.BadgeID = b.BadgeID 
            WHERE b.UserID = "'.$userid.'";';

            return $query;
        }

        public static function insertUserBadge($userid, $badgeid, $steps) {
            $query = 'INSERT INTO ' . UserBadge::$table .' (userID, badgeID, BadgeStepsCompleted)
            VALUES ('.$userid.', '.$badgeid.', '.$steps.');';

            return $query;
        }

        public static function updateUserBadge($userid, $badgeid, $steps) {
            $query = 'UPDATE '.UserBadge::$table .'
            SET BadgeStepsCompleted = '.$steps.' 
            WHERE UserID = '.$userid.' AND BadgeID = '.$badgeid.';';

            return $query;
        }
    }



?>