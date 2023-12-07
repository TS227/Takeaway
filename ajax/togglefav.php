<?php 
    session_start();
    require_once(__DIR__ . "/../includes/autoloader.php");
    require_once(__DIR__ . "/../includes/database.php");
    if ($_SESSION['user_data']){
        $food_id = (int) $_POST['food_id'];
        if ($food_id){
            require "../classes/favourite.class.php";
            $Favourite = new Favourite($db);
            $toggle = $Favourite->toggleFavourite($_POST['food_id']);
            if ($toggle){
                echo json_encode(array(
                    "success" => true,
                    "message" => "Added to favourites"
                ));
            }else{
                echo json_encode(array(
                    "success" => true,
                    "message" => "Removed from favourites"
                ));
            }
        }
    }else{
        echo json_encode(array(
            "success" => false,
            "message" => "You must be logged in to favourite a dish"
        ));
    }
?>