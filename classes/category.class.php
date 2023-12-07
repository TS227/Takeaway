<?php
    class category{
        protected $db;
        public function __construct($db){
            $this->db = $db;
        }

        public function getAllCategories(){
            $query = "SELECT * FROM food_categories";
            $stmt = $this->db->prepare($query);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
    }
?>