<?php
// uploads.php
session_start();
$pageTitle = 'File Uploads';
require_once 'inc/header.inc.php';
?>
<?php
// access upload.php when user is logged in
$upload_errors = [
    UPLOAD_ERR_OK                 => "No errors.",
    UPLOAD_ERR_INI_SIZE          => "Larger than upload_max_filesize.",
    UPLOAD_ERR_FORM_SIZE         => "Larger than form MAX_FILE_SIZE.",
    UPLOAD_ERR_PARTIAL             => "Partial upload.",
    UPLOAD_ERR_NO_FILE             => "No file.",
    UPLOAD_ERR_NO_TMP_DIR         => "No temporary directory.",
    UPLOAD_ERR_CANT_WRITE         => "Can't write to disk.",
    UPLOAD_ERR_EXTENSION         => "File upload stopped by extension."
];

if ($_SERVER['REQUEST_METHOD'] == "POST") {

    $tmp_file = $_FILES['file_upload']['tmp_name'];

    $target_file = basename($_FILES['file_upload']['name']);
    $upload_dir = "photos";
    if (!is_dir($upload_dir)) {
        mkdir($upload_dir);
    }

    if (move_uploaded_file($tmp_file, $upload_dir . "/" . $target_file)) {
        // $message = "<p class='alert alert-success text-center role= alert'>File uploaded successfully</p>";
        header("Location: home.php?message=File uploaded successfully");
    } else {
        $error = $_FILES['file_upload']['error'];
        $message = $upload_errors[$error];
    }
}
if (!empty($message)) {
    echo "<p class='text-center mt-3'>{$message}</p>";
}
?>
<div class="container">
    <div class="row">
        <div class="col-8 mx-auto px-5 py-2 text-center border rounded-5 my-5">
            <h1 class="display-4 mt-5">Upload Your Image!</h1>
            <img src="https://static.vecteezy.com/system/resources/thumbnails/008/013/001/small_2x/cloud-upload-icon-on-computer-screen-illustration-in-line-art-style-free-vector.jpg" class="img-fluid uploads" alt="">
            <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post" enctype="multipart/form-data">
                <input type="hidden" name="MAX_FILE_SIZE" value="100000000">
                <input type="file" name="file_upload" class="form-control" id="inputGroupFile04" aria-describedby="inputGroupFileAddon04" aria-label="Upload">
                <button class="btn btn-outline-secondary btn-sm mt-2" type="submit" name="submit" id="inputGroupFileAddon04" value="Upload"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-upload" viewBox="0 0 16 16">
                        <path d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5z" />
                        <path d="M7.646 1.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1-.708.708L8.5 2.707V11.5a.5.5 0 0 1-1 0V2.707L5.354 4.854a.5.5 0 1 1-.708-.708l3-3z" />
                    </svg> Upload</button>
            </form>
        </div>
    </div>
</div>




<?php require_once 'inc/footer.inc.php' ?>