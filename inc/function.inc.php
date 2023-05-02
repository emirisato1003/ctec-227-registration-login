<?php
function echoActiveClassIfRequestMatches($requestUri)
{
    $current_file_name = basename($_SERVER["REQUEST_URI"], ".php");
    if ($current_file_name == $requestUri)
        echo 'active';
}

function display_message()
{
    if (isset($_GET["message"])) {
        $message = $_GET["message"];
        echo '<div class="mt-4 alert alert-success" role="alert">';
        echo $message;
        echo '</div>';
    }
}
