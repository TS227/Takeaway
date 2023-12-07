<?php
    class Favourite{
        protected $db;

        public function __construct($db){
            $this->db = $db;
        }

        public function isFavourite($food_id){
            $query = "SELECT * FROM user_favourites WHERE user_id = :user_id AND food_id = :food_id";
            $stmt = $this->db->prepare($query);
            if (!isset($_SESSION['user_data']['user_id'])){
                echo 'not set';
            }
            $stmt->execute([
                "user_id" => $_SESSION['user_data']['user_id'],
                "food_id" => $food_id
            ]);
            return $stmt->fetch(PDO::FETCH_ASSOC);
        }

        public function toggleFavourite($food_id){
            $isFavourite = $this->isFavourite($food_id);
            if ($isFavourite){
                    $query = "DELETE FROM user_favourites WHERE user_fav_id = :user_fav_id";
                    $stmt = $this->db->prepare($query);
                    $stmt->execute([
                        "user_fav_id" => $isFavourite['user_fav_id'],
                    ]);
                    return false;
            }else{
                $query = "INSERT INTO user_favourites (user_id, food_id) VALUES (:user_id, :food_id)";
                $stmt = $this->db->prepare($query);
                $stmt->execute([
                    "user_id" => $_SESSION['user_data']['user_id'],
                    "food_id" => $food_id,
                ]);
                return true;
            }
        }
    }
?>