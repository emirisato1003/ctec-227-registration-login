<?php
// home.php
session_start();
$pageTitle = 'Home';
require_once 'inc/header.inc.php';
?>
<div class="container">
    <div class="row">
        <div class="col-12 m-3">
            <h1 class="display-1 text-center "><img src="https://img.icons8.com/laces/256/paint-palette.png" width="90" height="90" alt="art gallery icon">Art Gallery</h1>
            <?php
            display_message();
            if (!isset($_SESSION['first_name'])) {
                echo '<div class="my-4 text-center"><p>Sign up to upload your images</p>';
                echo '<a href="register.php" class="btn btn-secondary" tabindex="-1" role="button" aria-disabled="true">Sign-Up</a></div>';
            }
            ?>
            <?php
            if ($_SERVER["REQUEST_METHOD"] == "GET") {
                if (isset($_GET["del"])) {
                    if (file_exists($_GET['del'])) {
                        if (unlink($_GET["del"])) {
                            // echo "<p class='alert alert-success mt-3'>File deleted successfully</p>";
                            header("Location: home.php?message=File deleted successfully");
                        } else {
                            echo "<p class='alert alert-danger'>File could not be deleted</p>";
                        }
                    }
                }
            }
            ?>
        </div>
    </div>
</div>
<div class="container-fluid">
    <div class="row">
        <div class="col-12 d-flex justify-content-center flex-wrap gap-2">
            <?php
            // directory for photo file
            $dir = "photos";
            if (is_dir($dir)) {
                $dir_array = scandir($dir);
                if (count($dir_array) > 2) {
                    foreach ($dir_array as $file) {
                        // don't display the . and .. directories. using the strpos()
                        if (strpos($file, '.') > 0) {
                            echo "<div class='d-flex flex-column align-items-center mb-3'><img src='{$dir}/{$file}' alt='' class='img-fluid photo shadow'>";
                            // check to see that the user is loggged in
                            // read session variables
                            if (isset($_SESSION['first_name'])) {
                                echo "<a href='home.php?del={$dir}/{$file}' class='btn btn-outline-dark btn-sm align-self-end mt-2' tabindex='-1' role='button'>Delete <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-trash3-fill' viewBox='0 0 16 16'>
                        <path d='M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5Zm-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5ZM4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06Zm6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528ZM8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5Z'/>
                        </svg></a></div>";
                            } else {
                                echo '</div>';
                            }
                        }
                    }
                } else {
                    echo '<div class="container"><div class="row"><div class="col-12 text-center mt-5"><p>No image in the Gallery</p>';
                }
            }
            ?>
        </div>
    </div>
</div>
<?php require_once 'inc/footer.inc.php' ?>