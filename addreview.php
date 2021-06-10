<?php
$page_title = "TMRS: Add Review";
$body_id = "content2";
require_once ('includes/header.php');
require_once('includes/database.php');

$movie_id = $_GET['id'];
//retrieve movie id
$id = $_GET['id'];

//select statement
$query_str = "SELECT * FROM $tblMovies WHERE movie_id = '" . $id . "'";
$review_str = "SELECT review_heading, review_content FROM $tblReviews WHERE reviews.review_movie_id=" . $id . "";


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
//	$review_result_row = $review_result->fetch_assoc();


    ?>
    <div class="container wrapper moviedetails">

    <br>
    <div class="row ">
        <div class="col-sm-3 col-xs-offset-1">
            <img class="img-responsive" width="210" height="315" src="<?php echo $result_row['movie_img']; ?>" alt=""/>

        </div>
        <div class="col-sm-8">
            <div class="panel panel-default">
                <h1 class=""><?php echo $result_row['movie_name'] ?></h1>
            </div>
        </div>
    </div>
<?php } ?>
    </div>

    <div class="container wrapper add_review">


		<h1 style="color:white" class="text-center">Add Review</h1>
	<br>

		<div class="row">
			<div class="col ">

				<form action="createreview.php" method="get" class="form-horizontal" role="form">
					<input type="hidden" name="movie_id" value="<?php echo $movie_id; ?>"/>
					<div class="form-group">
						<label style="color:white" class=" control-label text-center" for="addRating">Write a Headline for your Review here</label>
                            <div>
                            <input type="text" name="review_rating" placeholder="Write Heading" id="addheading" class="form-control" required></input>
						    </div>
					</div>
					<div class="form-group">
						<label style="color:white; " class=" control-label text-right" for="movieSearch">Write your Review here</label>
						<div class="">
							<textarea name="review_content" style="height: 150px;" placeholder="Write Review" id="addReview" class="form-control" required></textarea>
						</div>
					</div>

                    <center>
					<div class="col-sm-3 col-sm-offset-3">
						<button  type="submit" class="reviewbtn ">Add!</button><br>
					</div>
                    </center>

				</form>

			</div>
		</div>

	</div>

<?php

// close the connection.
$conn->close();
?>
<footer class=" text-center foot2">

    <div class="text-center container-fluid p-3" style="background-color: black;opacity: 0.5; color: white">


        <h5 style="color: white">© 2021 Copyright: TMRS.com </h5>
    </div>
    <!-- Copyright -->
</footer>
<!-- Footer -->


</body>
</html>
