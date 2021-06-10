<?php
$body_id = "content1";
$page_title = "Create new user";
include ('includes/header.php');
?>

<center>
    <div class="regmain">

        <br><br><br><br><br><br><br>
        <h1 class="text-center">REGISTER</h1>
        <p class="lead text-center">Please register your account</p>


        <div class="col-xs-8 col-xs-offset-2">
            <form class="form-horizontal" role="form" action="register.php" method="get" enctype="text/plain">


                    <div>
                        <input type="text" class="inputfld" id="newUserName" name="username" placeholder="Username" required>
                    </div>



                    <div >
                        <input type="text" class="inputfld" id="newName" name="name" placeholder="Name" required>
                    </div>



                    <div >
                        <input type="email" class="inputfld" id="newEmail" name="email" placeholder="Email" required>
                    </div>



                    <div >
                        <input type="password" class="inputfld" id="newPassword" name="password" placeholder="Password" required>
                    </div>


                    <div >
                        <button type="submit" class="loginbtn">Register</button>
                    </div>
                </div>
            </form>
        </div>

    </div>





</center>
<br><br><br><br><br><br>
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