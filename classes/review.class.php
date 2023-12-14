<?php 
  class Review {
    protected $db;
    public function __construct($db){
      $this->db = $db;
    }

    public function createReview($review_data){
      $query = "INSERT INTO reviews (user_id, review_rating , review_comment) VALUES (:user_id, :review_rating, :review_comment)";
      $stmt = $this->db->prepare($query);
      return $stmt->execute(array(
        'user_id' => $_SESSION['user_data']['user_id'],
        'review_rating' => $review_data['review_rating'],
        'review_comment' => $review_data['review_comment']
      ));
    }

    public function calcRating(){
      $query = "SELECT AVG(review_rating) AS avg_rating FROM reviews";
      $stmt = $this->db->prepare($query);
      $stmt->execute();
      $avg_rating = $stmt->fetch();
      return $avg_rating;
    }

  }
?>