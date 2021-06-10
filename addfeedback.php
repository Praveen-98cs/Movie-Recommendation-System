<?php
$body_id = "content3";
$page_title = "TMRS: Add Feedback";

require_once ('includes/header.php');
require_once ('includes/database.php');



$feedback_string = $_GET['feedback_content'];
$feedback_content = mysqli_real_escape_string($conn, $feedback_string);




$query_str = "INSERT INTO feedbacks VALUES (NULL,'$feedback_content')";
$result =  @$conn->query($query_str);

if (!$result) {
    $errno = $conn->errno;
    $errmsg = $conn->error;
    echo "Insertion failed with $errno $errmsg<br/>\n";
    $conn->close();
    exit;
} else {
    ?>
    <div class="container wrapper">
        <br>
        <h1 class="text-center text-success">Your Feedback has been added!</h1>
    </div>

    <?php

    $conn->close();
}
header( "Refresh:3; url=community.php?", true, 303);

?>