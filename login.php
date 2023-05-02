<?php
// login.php
session_start();
$pageTitle = 'Login';
require_once 'inc/header.inc.php';
require_once 'inc/db_connect.inc.php';
?>

<div class="container mt-5 d-flex justify-content-center">
    <div class="row">
        <div class="col-12">
            <?php
            display_message();
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $email = $db->real_escape_string($_POST['email']);
                $password = hash('sha512', $db->real_escape_string($_POST['password']));
                $sql = "SELECT * FROM user WHERE email='$email' AND password='$password'";
                //  echo $sql;
                $result = $db->query($sql);
                if ($result->num_rows == 1) {
                    $_SESSION['loggedin'] = 1;
                    $_SESSION['email'] = $email;
                    $row = $result->fetch_assoc();
                    $_SESSION['first_name'] = $row['first_name'];
                    header('location: home.php');
                } else {
                    echo '<div class="alert alert-danger" role="alert"> Email or Password is incorrect, Please try again </div>';
                }
            }
            ?>
            <div class="text-center">
                <img src="https://img.icons8.com/laces/256/paint-palette.png" alt="" width="80" height="74">
                <h1 class="display-6">Welcome to Art Gallery</h1>
                <form action=<?= $_SERVER['PHP_SELF'] ?> method="POST">
                    <div class="form-floating">
                        <input type="email" name="email" id="email" class="form-control" placeholder="name@example.com" required>
                        <label for="email">Email</label>
                    </div>
                    <div class="form-floating">
                        <input type="password" name="password" id="password" class="form-control" placeholder="Password" required>
                        <label for="password">Password</label>
                        <span id="showPassword" onclick="showPassword();">Show Password</span>
                    </div>
                    <button type="submit" class="w-100 btn btn-primary mt-2">Login</button>
                </form>
                <p class="d-flex justify-content-start">Don't have an account? &nbsp;<a href="register.php">Sign-up</a></p>
            </div>
        </div>
    </div>
</div>
<?php require_once 'inc/footer.inc.php'; ?>