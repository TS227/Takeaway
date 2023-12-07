<?php 
    require "classes/user.class.php";

    $User = new User($db);
    
    if ($_POST){
        if ($_POST['register']){
            if(!$_POST['email']){
                $error[] = "Please enter your email";
            }else if (!$_POST['password']){
                $error[] = "Please enter your password";
            }else if (!$_POST['passwordConfirm']){
                $error[] = "Please confirm your password";
            }else if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
                $error = "Please enter a valid email address";
            }else if ($_POST['password'] !== $_POST['passwordConfirm']){
                $error[] = "Passwords do not match";
            }else if (strlen($_POST['password']) < 8){
                $error[] = "Password must be at least 8 characters";
            }
            if (isset($error)){
                ?>
                <div class="alert alert-danger" role="alert">
                    <?php
                        foreach ($error as $err){
                            echo $err . "<br>";
                        }
                    ?>
                <?php
            }else{
                $attempt = $User->createUser($_POST);
                if ($attempt){
                    ?>
                    <div class="alert alert-success" role="alert">
                        User created successfully
                    </div>
                    <?php
                }else{
                    ?>
                    <div class="alert alert-danger" role="alert">
                        User could not be created
                    </div>
                    <?php
                }
            }
        }else if ($_POST['login']){
            if(!$_POST['email']){
                $error[] = "Please enter your email";
            }else if (!$_POST['password']){
                $error[] = "Please enter your password";
            }else if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
                $error = "Please enter a valid email address";
            }else if (strlen($_POST['password']) < 8){
                $error[] = "Password must be at least 8 characters";
            }
            if (isset($error)){
                ?>
                <div class="alert alert-danger" role="alert">
                    <?php
                        foreach ($error as $err){
                            echo $err . "<br>";
                        }
                    ?>
                <?php
            }else{
                $user_data = $User->login($_POST);
                if ($user_data){
                    $_SESSION['is_logged_in'] = true;
                    $_SESSION['user_data'] = $user_data;
                    ?>
                        <div class="alert alert-success" role="alert">
                            User logged in successfully
                        </div>
                    <?php
                }else{
                    ?>
                    <div class="alert alert-danger" role="alert">
                        User could not be logged in
                    </div>
                    <?php
                }
            }
        }
    }
    

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
    <h1 class="text-center">Login</h1>
    <div class="col-md-6 mx-auto">
        <form id="login-form" method="post" action="">
            <div class="form-group">
                <label for="email">Email address</label>
                <input type="email" class="form-control" name="email" aria-describedby="emailHelp" placeholder="Enter email">
                <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" name="password" placeholder="Password">
            </div>
            <button type="submit" name="login" value="1" class="btn btn-primary">Submit</button>
        </form>
    </div>
    <div class="col-md-6 mx-auto">
        <form id="register-form" method="post" action="">
            <div class="form-group">
                <label for="email">Email address</label>
                <input type="email" class="form-control" name="email" aria-describedby="emailHelp" placeholder="Enter email">
                <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" name="password" placeholder="Password">
            </div>
            <div class="form-group">
                <label for="passwordConfirm">Password</label>
                <input type="password" class="form-control" name="passwordConfirm" placeholder="Password">
            </div>
            <button type="submit" name="register" value="1" class="btn btn-primary">Submit</button>
        </form>
    </div>
</body>