<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home</title>
</head>
<body>
    <h1>Welcome to our great site <?= isset($_SESSION['first_name']) ? $_SESSION['first_name'] : 'New User!' ?></h1>
    
</body>
</html>