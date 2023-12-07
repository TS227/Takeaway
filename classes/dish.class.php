<?php
    class Dish{
        protected $db;
        public function __construct($db){
            $this->db = $db;
        }

        public function getAllDishes($category_id){
            $query = "SELECT * FROM food WHERE category_id = :category_id";
            $stmt = $this->db->prepare($query);
            $stmt->execute(["category_id"=> $category_id]);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        public function getDish($dish_id){
            $query = "SELECT * FROM food WHERE food_id = :food_id";
            $stmt = $this->db->prepare($query);
            $stmt->execute(["food_id"=> $dish_id]);
            return $stmt->fetch(PDO::FETCH_ASSOC);
        }
    }
?>