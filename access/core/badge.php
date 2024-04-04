<?php

    class Badge {
        //db stuff
        private static $table = 'Badge';

        //api call
        public static function getBadge($badge){
            $query = 'SELECT * FROM 
                '. Badge::$table .'
                 WHERE BadgeID = "'.$badge.'";';
                 
            return $query;
        }
    }



?>