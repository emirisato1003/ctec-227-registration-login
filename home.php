<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home</title>
    <style>
        /* set initial display to none */
        #login, #logout {
            display: none;
        }
    </style>
</head>
<body>
    <a href="register.php">Register</a>
    <a href="login.php" id="login">Login</a> 
    <a href="#" id="logout">Logout</a> 
    
    <h1>Welcome to our great site <?= isset($_SESSION['first_name']) ? $_SESSION['first_name'] : 'New User!' ?></h1>
    <div id="message"></div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script>
        $(document).ready(function(){
            // code to enable/disable login/logout
            $.ajax({
                url : 'is_logged_in.php', 
                dataType : 'json'
            }).done(function(data){
                // check to see if they are logged in
                if (data.status == 'yes') {
                    $('#login').css({"display":"none"});
                    $('#logout').css({"display":"inline-block"});                
                } else {
                    $('#login').css({"display":"inline-block"});
                    $('#logout').css({"display":"none"});                
                }
            });

            // logout button clicked
            $('#logout').on('click',function(e){
                // prevent anchor link from going somewhere
                e.preventDefault();
                // log them out via ajax call to php script
                $.ajax({
                    url : 'logout_ajax.php',
                    method : 'get',
                    dataType : 'json'
                }).done(function(data){
                    // update ui elements
                    if(data.status == 'success'){
                        $('#login').css({"display":"inline-block"});
                        $('#logout').css({"display":"none"});                
                        $('#message').html('<p>You have been logged out;');
                        $('h1').text('Welcome to our great site');
                    }
                }).fail(function(){
                    alert('SOMETHING HAS GONE WRONG!');
                });
            });
        });
    </script>
</body>
</html>