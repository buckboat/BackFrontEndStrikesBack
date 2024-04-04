<?php

    class User {
        //db stuff
        private $engine;
        private $table = 'User';

        //user properties
        public $username;
        public $last_login;

        //constructor
        public function __construct($db){
            $this->engine = $db;
        }

        //api call
        public function getUser($user){
            $query = 'SELECT
                Username,
                LastLogin
                FROM 
                '. $this->table .'
                 WHERE Username = "'.$user.'";';
                 
            $conn = $this->engine->connect();
            $stmt = $conn->query($query);
            $conn->close();

            return $stmt;
        }

        //api call
        public function postProfilePic($image) {
            //TODO
        }
    }



?>