<?php

    class UserBadge {
        //db stuff
        private $engine;
        private $table = 'UserBadge';
        private $badgeTable = 'Badge';

        //user properties
        public $UserID;
        public $Badges;

        //constructor
        public function __construct($db){
            $this->engine = $db;
            $this->Badges = array();
        }

        //api call
        public function getUserBadge($userid, $badgeid){
            $query = 'SELECT a.*, b.BadgeStepsCompleted FROM '. $this->badgeTable .' a 
            INNER JOIN '. $this->table .' b ON a.BadgeID = b.BadgeID 
            WHERE b.UserID = "'.$userid.'" AND b.BadgeID = "'.$badgeid.'";';

            $conn = $this->engine->connect();
            $stmt = $conn->query($query);
            $conn->close();

            return $stmt;
        }

        //api call
        public function getUserBadges($userid){
            $query = 'SELECT a.*, b.BadgeStepsCompleted FROM '. $this->badgeTable .' a 
            INNER JOIN '. $this->table .' b ON a.BadgeID = b.BadgeID 
            WHERE b.UserID = "'.$userid.'";';

            $conn = $this->engine->connect();
            $stmt = $conn->query($query);
            $conn->close();

            return $stmt;
        }
    }



?>