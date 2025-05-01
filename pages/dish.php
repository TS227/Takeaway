<?php
// Validate and sanitize input parameter
$dish_id = isset($_GET['id']) ? filter_var($_GET['id'], FILTER_VALIDATE_INT) : 0;
if ($dish_id === false || $dish_id === 0) {
  // Handle invalid ID - redirect or show error
  header("Location: index.php");
  exit;
}

require "classes/dish.class.php";
$dish = new dish($db);
$dish = $dish->getDish($dish_id);

// Verify dish exists
if (!$dish) {
  header("Location: index.php");
  exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <link rel="stylesheet" href="css/styles.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300&display=swap" rel="stylesheet">
  <script src="https://kit.fontawesome.com/53e299da82.js" crossorigin="anonymous"></script>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>

<body>
  <h1 class="text-center"><?php echo htmlspecialchars($dish['food_name'], ENT_QUOTES, 'UTF-8'); ?>
  </h1>
  <div class="row d-flex justify-content-center w-100">
    <div class="col-12 col-lg-4 order-lg-2">
      <a href="index.php?p=dish&id=<?php echo htmlspecialchars($dish['food_id'], ENT_QUOTES, 'UTF-8'); ?>"
        class="d-flex justify-content-center img-fluid"><img width="400" height="300"
          src="dish-images/<?php echo htmlspecialchars($dish['food_image'], ENT_QUOTES, 'UTF-8'); ?>" alt=""></a>
    </div>
    <div class="col-12 col-lg-4 order-lg-2">
      <p class=""><?php echo htmlspecialchars($dish['food_description'], ENT_QUOTES, 'UTF-8'); ?></p>
      <p class="">£<?php echo htmlspecialchars($dish['food_price'], ENT_QUOTES, 'UTF-8'); ?></p>
      <div class="d-flex">
        <?php if ($dish['food_spice'] > 0) {
          echo '<p class="me-2">Spice level:</p>';
          for ($i = 0; $i < intval($dish['food_spice']); $i++) {
            echo '<i class="fa-solid fa-pepper-hot" style="color: #e01024;"></i>';
          }
        } ?>
      </div>
      <div>
        <?php
        require "classes/favourite.class.php";
        $Favourite = new Favourite($db);
        $isFav = $Favourite->isFavourite($dish_id);
        if ($isFav) {
          ?>
          <button id="removeFav" type="button" class="btn btn-danger"
            data-foodid="<?php echo htmlspecialchars($dish_id, ENT_QUOTES, 'UTF-8'); ?>">Remove
            from favourites</button>
          <?php
        } else {
          ?>
          <button id="addFav" type="button" class="btn btn-success"
            data-foodid="<?php echo htmlspecialchars($dish_id, ENT_QUOTES, 'UTF-8'); ?>">Add to
            favourites</button>
          <?php
        }
        ?>

      </div>
      <button class="btn btn-success">Add to cart</button>
    </div>
  </div>
</body>

</html>