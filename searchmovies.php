<?php

$page_title = "Search Results";
$body_id = "content";

require_once ('includes/header.php');
require_once('includes/database.php');

$name = $_GET['movie'];

//select statement
$query_str = "SELECT * FROM $tblMovies WHERE movie_name LIKE '%" .$name. "%' OR movie_bio LIKE '%" .$name. "%'";

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


    <br>
    <h1 style="font-family: Montserrat-Bold" class="text-center moviedetails">Search Results</h1>



    <?php
    $num_rows = mysqli_num_rows($result);
    if ($num_rows == 0) {
        echo "<p style='color: red' class='lead text-center'>No results found for <strong>". $name . "</strong>. Please search again.</p>";
    } else {
        //insert a row into the table for each row of data
        $i = 0;
        while ( $result_row = $result->fetch_assoc() ) :
            $i++;
            if ($i == 1) :
                ?>
                <div class="row">
            <?php endif; ?>s
            <div >
                <div class="thumbnail">
                    <div class="caption movieBox1">
                        <div class="text-center movieBox1 ">
                            <a href="moviedetails.php?id=<?php echo $result_row['movie_id']?>">
                                <img width="210" height="315" src="<?php echo $result_row['movie_img'] ?>" />
                            </a>
                        </div>
                        <h3 style="font-family: Montserrat-Regular" class="text-center moviedetails">
                            <?php
                            echo $result_row['movie_name'];
                            ?>
                        </h3>

                    </div>
                </div>
            </div>
            <?php if ($i == 3) : ?>
            </div>
            <?php $i=0; endif; endwhile; ?>
        </div>
        </div>
        <?php
    }
    // clean up resultsets when we're done with them!
    $result->close();
}

// close the connection.
$conn->close();
?>
