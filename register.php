<?php
// register.php
session_start();
$pageTitle = "Register";
require_once 'inc/header.inc.php';
require_once 'inc/db_connect.inc.php';
?>
<div class="container my-5 d-flex justify-content-center">
    <div class="row">
        <div class="col-12">
            <?php
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                try {
                    $email = $db->real_escape_string($_POST['email']);
                    $first_name = $db->real_escape_string($_POST['first_name']);
                    $last_name = $db->real_escape_string($_POST['last_name']);
                    $password = hash('sha512', $db->real_escape_string($_POST['password']));

                    $sql = "INSERT INTO user (email,first_name,last_name,password) 
                    VALUES('$email','$first_name','$last_name','$password')";
                    // echo $sql;
                    $result = $db->query($sql);
                    if (!$result) {
                        echo "<div>There was a problem registering your account</div>";
                    } else {
                        echo "<div><h1>Welcome Art Gallery, enjoy!<h1></div>";
                        echo '<a href="login.php" title="Login Page">Login</a>';
                    }
                } catch (PDOException $th) {
                    //throw $th
                    if ($th->errorInfo[1] == 1062) {
                        echo "<div class= \"alert alert-danger\"> This email: <strong>" . $_POST['email'] . "</strong> is already existed. Please use different email</div>";
                    }
                }
            }
            ?>
            <div class="text-center">
                <img src="https://img.icons8.com/laces/256/paint-palette.png" alt="" width="80" height="74">
                <h1 class="display-6">Welcome to Art Gallery</h1>
                <form action="<?= $_SERVER['PHP_SELF'] ?>" method="POST">
                    <div class="form-floating mt-3">
                        <input type="email" id="email" required name="email" class="form-control" placeholder="name@example.com">
                        <label for="email" class="form-label">Email</label>
                    </div>
                    <div class="form-floating mt-3">
                        <input type="password" id="password" required name="password" class="form-control" placeholder="Password">
                        <label for="password" class="form-label">Password</label>
                        <span id="showPassword" onclick="showPassword();">Show Password</span>
                    </div>
                    <div class="form-floating mt-3">
                        <input type="text" id="first_name" required name="first_name" class="form-control" placeholder="First Name">
                        <label for="first_name" class="form-label">First Name</label>
                    </div>
                    <div class="form-floating mt-3">
                        <input type="text" id="last_name" required name="last_name" class="form-control" placeholder="Last Name">
                        <label for="last_name" class="form-label">Last Name</label>
                    </div>
                    <button type="submit" class="w-100 btn btn-primary mt-3">Register</button>
                </form>
                <p class="d-flex justify-content-start">Have an account?&nbsp;<a href="login.php">log in</a></p>
            </div>
        </div>
    </div>
    <?php require_once 'inc/footer.inc.php'; ?>