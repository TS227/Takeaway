<?php
$Review = new Review($db);

if($_POST['review']) {
  $Review = new Review($db);
  $Review->createReview([
  "review_rating" => $_POST['rating'],
  "review_comment" => $_POST['comment']
  ]);
  }
  $reviews = $Review->getAllReviews();
?>


<div class="container my-4">
    <div class="jumbotron">
        <h1 class="display-4">Reviews</h1>
        <?php foreach($reviews as $review){ ?>
                <div style="width: 30rem;" class="bg-dark m-3 p-2">
                  <div class="d-flex">
                  <?php if ($review['review_rating'] > 0) {
                            for ($i = 0; $i < $review['review_rating']; $i++) {
                                echo '<i class="fa-solid fa-star" style="color: #eeff00;"></i>';
                                }}?> 
                  </div>
                  <p class=""><?php echo $review['review_comment']; ?></p>
                </div>

            <?php } ?>
        <h4 class="">Leave a review!</h4>
        <?php
          if(!$_SESSION['is_logged_in']){
            ?>
            <p class="lead">You must be logged in to leave a review.</p>
            <a class="btn btn-primary btn-lg" href="index.php?p=login" role="button">Login</a>
            <?php
          }else{
            ?>
            <form action="" method="post">
              <div class="form-group">
                <label for="rating">Rating</label>
                <select class="form-control" id="rating" name="rating">
                  <option value="1">1 Star (Very bad)</option>
                  <option value="2">2 Star (Bad)</option>
                  <option value="3">3 Star (Okay)</option>
                  <option value="4">4 Star (Good)</option>
                  <option value="5">5 Star (Very Good)</option>
                </select>
              </div>
              <div class="form-group">
                <label for="comment">Comment</label>
                <textarea class="form-control" id="comment" rows="3" name="comment"></textarea>
              </div>
              <button type="submit" value = "1" name="review" class="btn btn-primary">Submit</button>
            </form>
            <?php
            }
            ?>
          <?php
            $Review = new Review($db);
            $avg_rating = $Review->calcRating();
            $avg_rating = round($avg_rating['avg_rating'], 1);
          ?>
          <li><i class="fas fa-star-half-alt"></i> <?php echo $avg_rating; ?> Stars</li>
          </li>
    </div>
</div>