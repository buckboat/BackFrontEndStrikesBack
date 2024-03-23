<?php

    class UserBadge {
        //db stuff
        private $engine;
        private $table = 'userbadge';
        private $badgeTable = 'badge';

        //user properties
        public $UserID;
        public $Badges;

        //constructor
        public function __construct($db){
            $this->engine = $db;
            $this->Badges = array();
        }

        //api call
        public function getUserBadges($userid){
            $query = 'SELECT * FROM '. $this->badgeTable .' 
            INNER JOIN '. $this->table .' ON '. $this->badgeTable .'.BadgeID = '. $this->table .'.BadgeID 
            WHERE '. $this->table .'.UserID = "'.$userid.'";';
                 

        

            $conn = $this->engine->connect();
            $stmt = $conn->query($query);
            $conn->close();

            return $stmt;
        }
    }



?>