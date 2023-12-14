

<?php
    require "classes/category.class.php";
    $category = new category($db);
    $categories = $category->getAllCategories();
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
<body class="h-100">
  <h1 class="display-4">Menu</h1>
  <div class="row d-flex justify-content-center">
  <?php foreach($categories as $cat){ ?>
    <div style="width: 30rem;" class="card bg-dark m-3 p-2">
    <a href="index.php?p=dishes&id=<?php echo $cat['category_id'];?>" class="d-flex justify-content-center img-fluid"><img width="400" height="300" src="category-images/<?php echo $cat['category_image']; ?>" alt=""></a>
      <div class="card-body">
        <h2 class="card-title text-center"><?php echo $cat['category_name']; ?></h5>
      </div>
    </div>
  <?php } ?>
  </div>
</body>
</html>