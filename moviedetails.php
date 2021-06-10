<?php
$page_title = "Movie Information";
$body_id = "content2";
require_once ('includes/database.php');

//retrieve movie id
$id = $_GET['id'];

//select statement
$query_str = "SELECT * FROM $tblMovies WHERE movie_id = '" . $id . "'";
$review_str = "SELECT review_heading, review_content, review_user_id, review_rating FROM $tblReviews WHERE reviews.review_movie_id=" . $id . "";


//execute the query
$result = $conn->query($query_str);
$review_result = $conn->query($review_str);


//Handle selection errors
if (!$result || !$review_result) {
    $errno = $conn->errno;
    $errmsg = $conn->error;
    echo "Selection failed with: ($errno) $errmsg<br/>\n";
    $conn->close();
    exit;
} else { //display results in a table
    //insert a row into the table for each row of data
    $result_row = $result->fetch_assoc();
	//$review_result_row = $review_result->fetch_assoc();

    $page_title = "TMRS: " . $result_row['movie_name'];

    require_once ('includes/header.php');

    ?>
    <div class="container wrapper moviedetails">




        <br>
    <div class="row ">
        <div class="col-sm-3 col-xs-offset-1">
            <img class="img-responsive" width="210" height="315" src="<?php echo $result_row['movie_img']; ?>" alt=""/>
        </div>
        <div class="col-sm-8">
            <div class="panel panel-default">
                <div class="panel-body moviedetails">
                    <div class="row">
                        <div class="col-sm-4">
                            <h1><?php echo $result_row['movie_name'] ?></h1>

                        </div>
                        <div class="col-sm-8">
                            <div class="row">
                                <div class="col-sm-2">
                                    <h3 style="font-size: 50px; color: limegreen;"> <?php echo $result_row['movie_rating'] ?> </h3>

                                </div>
                                <div class="col-sm-10">
                                    <br>
                                    <h4>/10</h4>

                                </div>

                            </div>


                        </div>

                    </div>
                    <br>
                    <div class="row">
                        <div class="col-sm-4">
                            <h3>Genre: <?php echo $result_row['Genre'] ?></h3>
                            <h3>Runtime: <?php echo $result_row['Runtime'] ?></h3>


                        </div>
                        <div class="col-sm-8">
                            <h3>Director: <?php echo $result_row['Director'] ?></h3>
                            <h3>Year: <?php echo $result_row['movie_year'] ?></h3>
                        </div>

                    </div>

                    <p class="lead"><?php echo $result_row['movie_bio'] ?></p>

                    <?php if (empty($login)) { ?>
                        <p class="lead"><a href="loginpage.php">Sign in</a> or <a href="registration.php">register</a> to leave a review or make this a favorite movie!</p>
                    <?php	} else { ?>
                        <p>
                            <a class="btn btn-info" href="addreview.php?id=<?php echo $result_row['movie_id'] ?>" role="button">ADD REVIEW <i class="fa fa-plus"></i></a></p>

                    <?php } ?>
                </div>
            </div>
        </div>
    </div>


        <div class="row review">

            <div class="col-md-12 box-review2">
                <?php for ($i = 0; $i < 5; $i++ ) :
                    while ( $review_result_row = $review_result->fetch_assoc()  ) : ?>
                        <?php
                        //$user_str = "SELECT user_full_name FROM $tblUsers INNER JOIN reviews ON reviews.review_user_id= users.user_id";
                        $user_str = "SELECT user_full_name FROM $tblUsers INNER JOIN reviews ON  users.user_id = ".$review_result_row['review_user_id']." ";
                        $user_result = $conn->query($user_str);
                        $user_result_row = $user_result->fetch_assoc()
                        ?>
                        <div class="row">
                            <div class="col-sm-7">
                                <h3 class="<?php
                                if ($review_result_row['review_heading' > 4 ]){
                                    echo 'text-success';
                                } elseif ( $review_result_row['review_heading'] < 2 ) {
                                    echo 'text-danger';
                                }
                                ?>"> <?php echo $review_result_row['review_heading'] ?></h3>
                            </div>

                                <div class="col-sm-1">
                                    <p class="lead"> <?php echo $review_result_row['review_rating'] ?>/10</p>
                                </div>

                                <div class="col-sm-4">
                                    <p class="lead">Reviewed by: <?php echo $user_result_row['user_full_name'] ?></p>
                                </div>



                        </div>






                <div class="content">
                    <p class="lead"> <br/><?php echo $review_result_row['review_content'] ?></p>

                </div>
                        <hr style="border-top: 3px solid black;">
                    <?php endwhile; endfor;  ?>

            </div>





        </div>



        <?php
        //select statement
        $query_str = "SELECT * FROM movies WHERE Genre = '" . $result_row['Genre'] . "'";

        //execut the query
        $result = $conn->query($query_str);

        //Handle selection errors
        if (!$result) {
            $errno = $conn->errno;
            $errmsg = $conn->error;
            echo "Selection failed with: ($errno) $errmsg<br/>\n";
            $conn->close();
            exit;
        } else { //display results in a table
            ?>
            <div class="container wrapper">
                <div class="row">
                    <div class="col-sm-12 text-center">

                        <h1>Recommended Movies</h1>
                        <br>
                    </div>

                </div>
                <div class="movie-list">
                    <?php
                    $i = 0;
                    $count = 0;
                    while ($result_row = $result->fetch_assoc()) :
                        $i++;
                        $count++;

                        if ($i == 1) :
                            ?>
                            <div class="row">
                        <?php endif; ?>
                        <div class="col-sm-3  ">
                            <div class="thumbnail ">
                                <div class="caption movieBox" >
                                    <div class="text-center movieBox">
                                        <a   href="moviedetails.php?id=<?php echo $result_row['movie_id'] ?>">
                                            <img width="210" height="315" src="<?php echo $result_row['movie_img'] ?>"/>
                                        </a>
                                    </div>
                                    <h3 style="font-family: Montserrat-Regular" class="text-center mvname">
                                        <?php
                                        echo  $result_row['movie_name'] ;
                                        ?>
                                    </h3>
                                </div>
                            </div>
                        </div>
                        <?php if($count == 20)
                        break;
                        ?>
                        <?php if ($i == 4) : ?>
                        </div>
                        <br>
                        <?php $i = 0; endif; endwhile; ?>
                </div>
            </div>
            <?php
            // clean up result sets when we're done with them!
            $result->close();
        }



        ?>






<?php } ?>
    </div>

<?php

// close the connection.
$conn->close();
?>
<footer class=" text-center foot1">

    <div class="text-center container-fluid p-3" style="background-color: black;opacity: 0.5; color: white">


        <h5 style="color: white">© 2021 Copyright: TMRS.com </h5>
    </div>
    <!-- Copyright -->
</footer>
<!-- Footer -->


</body>
</html>