<?php
session_start();
$body_id = "content";

//destroy the session data on disk
session_destroy();

//delete the session cookie
setcookie(session_name(), '', time()-3600);

//destroy the $_SESSION array
$_SESSION = array();

$page_title = "Log Out";
include('includes/header.php');

?>
    <div class="container wrapper">
        <br>
        <h1 class="text-center" style="color: white">Logged Out</h1>
        <p class="lead text-center " style="color: white"> Thank you for your visit. You are now logged out.</p>
    </div>

<?php
header( "Refresh:3; url=index.php", true, 303);
?>
