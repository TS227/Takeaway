<?php
// Validate and sanitize input parameter
$category_id = isset($_GET['id']) ? filter_var($_GET['id'], FILTER_VALIDATE_INT) : 0;
if ($category_id === false || $category_id === 0) {
  // Handle invalid ID - redirect or show error
  header("Location: index.php");
  exit;
}

require "classes/dish.class.php";
$dish = new dish($db);
$dishes = $dish->getAllDishes($category_id);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <link rel="stylesheet" href="./node_modules/bootstrap/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="css/styles.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300&display=swap" rel="stylesheet">
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>

<body>
  <div class="mx-auto">
    <h1 class="text-center">Dishes</h1>
    <div class="mb-4 pb-2 d-flex justify-content-center">
      <div class="row">
        <?php foreach ($dishes as $dish) { ?>
          <div style="width: 30rem;" class="card bg-dark m-3 p-2">
            <a href="index.php?p=dish&id=<?php echo htmlspecialchars($dish['food_id'], ENT_QUOTES, 'UTF-8'); ?>"
              class="d-flex justify-content-center img-fluid"><img width="400" height="300"
                src="dish-images/<?php echo htmlspecialchars($dish['food_image'], ENT_QUOTES, 'UTF-8'); ?>" alt=""></a>
            <div class="card-body">
              <h2 class="card-title text-center"><?php echo htmlspecialchars($dish['food_name'], ENT_QUOTES, 'UTF-8'); ?>
              </h2>
            </div>
          </div>
        <?php } ?>

      </div>
    </div>
  </div>
</body>

</html>