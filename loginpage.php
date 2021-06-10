<?php
$body_id = "content1";
$page_title = "Login";
include ('includes/header.php');
?>


    <div class="container login123">
        <br><br><br><br><br><br><br><br>
        <div class="container login-main">
<center>
    <div class="avatar">

        <img class="avatarimg" src="images/avatar.png" alt="avatar">

    </div>
    <br>
    <div class="login-form-title ">
        Login
    </div>
    <br><br>
    <form method="post" action="login.php">
        <div>
            <input class="inputfld" type="text" name="username" id="username" placeholder="Username" required>
        </div>

        <div>
            <input class="inputfld" type="password" name="password" id="password" placeholder="Password" required>
        </div>

        <div>
            <input type="submit" class="loginbtn" value="LOGIN" name="save" >

        </div>


    </form>




</center>



        </div>



    </div>
<br><br><br><br>
<hr>
<footer class=" text-center foot2">

    <div class="text-center container-fluid p-3" style="background-color: black;opacity: 0.5; color: white">


        <h5 style="color: white">© 2021 Copyright: TMRS.com </h5>
    </div>
    <!-- Copyright -->
</footer>
<!-- Footer -->


</body>
</html>