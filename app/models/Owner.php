<?php 
    class Owner {
        private $db;

        public function __construct(){
            $this->db = new Database;
        }

        /**
         *      To Add User Into the system need to check validation So, to do that implement some features.    
         * 
        */

        public function findUserByEmail($userEmail){
            $this->db->prepareQuery("SELECT * FROM users where emailAdd = '$userEmail'");
            // $this->db->bind(':email', $userEmail);

            $this->db->single();

            //check row
            if($this->db->rowCount() > 0){
                return true;
            }else{
                return false;
            }
        }

        //find NIC number in the database
        public function findNicNumber($userNIC){
            $this->db->prepareQuery("SELECT * FROM users where NIC = '$userNIC'");

            $this->db->single();

            //check row
            if($this->db->rowCount() > 0){
                return true;
            }else{
                return false;
            }
        }

        //find phone number in the database
        public function findPhoneNumber($userPNumber){
            $this->db->prepareQuery("SELECT * FROM users where phoneNumber = '$userPNumber'");

            $this->db->single();

            //check row
            if($this->db->rowCount() > 0){
                return true;
            }else{
                return false;
            }          
        }


    }