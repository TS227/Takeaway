<?php
    $category_id = $_GET['id'];
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
            <?php foreach($dishes as $dish){ ?>
                <div style="width: 30rem;" class="card bg-dark m-3 p-2">
                    <a href="index.php?p=dish&id=<?php echo $dish['food_id'];?>" class="d-flex justify-content-center img-fluid"><img width="400" height="300" src="dish-images/<?php echo $dish['food_image']; ?>" alt=""></a>
                    <div class="card-body">
                        <h2 class="card-title text-center"><?php echo $dish['food_name']; ?></h5>
                    </div>
                </div>
            <?php } ?>

            </div>
        </div>
    </div>
</body>
</html>