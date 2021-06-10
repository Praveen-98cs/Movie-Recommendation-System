<?php
$page_title = "Community";
$body_id = "content3";
require_once ('includes/database.php');


    $page_title = "TMRS: ";

    require_once ('includes/header.php');

    ?>

<div class="container-fluid  ">

    <div class="row">
        <div class="col-sm 12 text-center">
            <br><br>
            <h3 style="font-family: oswald; color: white; font-size: 25px"> What is <span style="color: #FF6700; font-family: progress; font-size: 39px">TMRS</span>?</h3>
        </div>

        <div class="col-sm-12 comdiv text-center">
            <br>
            <h3 style="font-family: progress; color: white; font-size: 33px"><span class="letters">T</span>he <span class="letters">M</span>ovie <span class="letters">R</span>ecommendation <span class="letters">S</span>ystem <span style="font-family: oswald; font-size: 28px">is the world's most popular and authoritative source for movies, designed to help fans explore the world of movies and shows and decide what to watch.</span></h3>
        </div>

        <div class="col-sm-12 text-center comdiv">
            <br>
            <h3 style="color: white;font-size: 23px">Our searchable database includes millions of movies, TV and entertainment programs and cast and crew members. We help you jog your memory about a movie, show, or person on the tip of your tongue, find the best movie or show to watch next, and empower you to share your entertainment knowledge and opinions with the world’s largest community of fans.</h3>
            <br>
            <hr style="color: white; border-top: 3px solid white; opacity: 0.8">
        </div>

        <div class="col-sm-12 text-center comdiv">
            <br>
            <h3 style="color: white;font-size: 23px">Sentiment Based Recommender System recommends movies similar to the movie user likes and analyses the sentiments on the reviews given by the user for that movie.</h3>

        </div>
        <div class="container wrapper add_review">


            <h1 style="color:white" class="text-center">Leave Feedback</h1>
            <br>

            <div class="row">
                <div class="col ">

                    <form action="addfeedback.php" method="get" class="form-horizontal" role="form">

                        <div class="form-group">
                            <label style="color:white; " class=" control-label text-right" >Write your Feedback for our site here:</label>
                            <div class="">
                                <textarea name="feedback_content" style="height: 150px;" placeholder="Write Feedback" id="addReview" class="form-control" required></textarea>
                            </div>
                        </div>

                        <center>
                            <div class="col-sm-3 col-sm-offset-3">
                                <button  type="submit" class="reviewbtn ">Submit</button><br>
                            </div>
                        </center>

                    </form>

                </div>
            </div>

        </div>



    </div>



</div>

<?php

// close the connection.
$conn->close();
?>
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