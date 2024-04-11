<?php

    class User {
        private static $table = 'User';

        //api call
        public static function getUser($user){
            $query = 'SELECT
                Username,
                LastLogin,
                ProfilePictureID
                FROM 
                '. User::$table .'
                 WHERE UserID = "'.$user.'";';
                 
            return $query;
        }

        //api call
        public static function postProfilePic($userid, $picid) {
            $query = 'UPDATE '. User::$table .' 
                SET ProfilePictureID = '.$picid.'
                WHERE UserID = '.$userid.';';
    
            return $query;
        }
    }



?>