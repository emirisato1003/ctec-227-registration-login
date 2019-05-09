<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register</title>
</head>
<body>

    <?php 
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            # Create a new connection to the database
            $db = new mysqli('localhost','root','','codemonkey');

            # If there was an error connecting to the database
            if ($db->connect_error) {
                $error = $db->connect_error;
                echo $error;
            }

            # Set the character encoding of the database connection to UTF-8
            $db->set_charset('utf8');

            $email = $_POST['email'];
            $first_name = $_POST['first_name'];
            $last_name = $_POST['last_name'];
            $password = hash('sha512',$_POST['password']);

            $sql = "INSERT INTO user (email,first_name,last_name,password) 
                    VALUES('$email','$first_name','$last_name','$password')";
            // echo $sql;
            $result = $db->query($sql);

            if (!$result) {
                echo "<h3>There was a problem registering your account</h3>";
            } else {
                echo "<h3>You are now ready to go!</h3>";
            }
        }
    ?>



    <h1>Register</h1>
    <form action="register.php" method="POST">
        <label for="email">Email</label>
        <input type="email" id="email" required name="email">
        <br><br>
        <label for="password">Password</label>
        <input type="password" id="password" required name="password">
        <br><br>
        <label for="first_name">First Name</label>
        <input type="text" id="first_name" required name="first_name">
        <br><br>
        <label for="last_name">Last Name</label>
        <input type="text" id="last_name" required name="last_name">
        <br><br>
        <input type="submit" value="Register">
    </form>
</body>
</html>