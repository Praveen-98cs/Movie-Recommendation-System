<?php
$body_id = "content";
$page_title = "TMRS";
require_once ('includes/header.php');
require_once('includes/database.php');


?>



        <div class="container ">

            <div class="row justify-content-center">
                <p class="bgtitle">THE MOVIE RECOMMENDATION SYSTEM</p>

            </div>
        </div>
    <div class="container-fluid">
            <div class="row justify-content-center">

                <form class="form-inline md-form  mb-4" action="searchmovies.php" method="get">
                    <input class="form-control mr-sm-2"  name="movie" type="text" id="sbar" placeholder="Enter the movie name" aria-label="Search">
                    <button class="btn btn-outline-warning btn-rounded btn-sm my-0" id="btnsch" type="submit">Search</button>
                </form>
            </div>

    </div>

    </div>
<?php
//select statement
$query_str = "SELECT * FROM movies WHERE movie_rating > 8";

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
                    <br>
                    <h3 style="color: white; font-family: oswald; font-size: 40px"> Most Popular Movies</h3>
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
                <?php if($count == 12)
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

// close the connection.
$conn->close();

?>
<hr>
<footer class=" text-center foot1">

    <div class="text-center container-fluid p-3" style="background-color: black;opacity: 0.8; color: white">


        <h5 style="color: white">© 2021 Copyright: TMRS.com </h5>
    </div>
    <!-- Copyright -->
</footer>
<!-- Footer -->


</body>
</html>


