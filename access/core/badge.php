<?php

    class Badge {
        //db stuff
        private $engine;
        private $table = 'Badge';

        //user properties
        public $BadgeID;
        public $BadgeName;
        public $BadgeDesc;
        public $BadgeCriteria;
        public $BadgeIcon;
        public $BadgeCreated;

        //constructor
        public function __construct($db){
            $this->engine = $db;
        }

        //api call
        public function getBadge($badge){
            $query = 'SELECT * FROM 
                '. $this->table .'
                 WHERE BadgeID = "'.$badge.'";';
                 
            $conn = $this->engine->connect();
            $stmt = $conn->query($query);
            $conn->close();

            return $stmt;
        }
    }



?>