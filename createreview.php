<?php
$body_id = "content2";
$page_title = "TMRS: Add Review";

require_once ('includes/header.php');
require_once ('includes/database.php');

$user_id = $session_id;
$movie_id = $_GET['movie_id'];
$review_rating = $_GET['review_rating'];
$review_string = $_GET['review_content'];
$review_content = mysqli_real_escape_string($conn, $review_string);

$query_moviestr = "SELECT * FROM $tblMovies WHERE movie_id = '" . $movie_id  . "'";
$resultmovie = $conn->query($query_moviestr);



$curl = curl_init();

curl_setopt_array($curl, [
    CURLOPT_URL => "https://textanalysis.p.rapidapi.com/textblob-sentiment-analysis",
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_ENCODING => "",
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 30,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "POST",
    CURLOPT_POSTFIELDS => "text=".$review_string,
    CURLOPT_HTTPHEADER => [
        "content-type: application/x-www-form-urlencoded",
        "x-rapidapi-host: textanalysis.p.rapidapi.com",
        "x-rapidapi-key: d8bdc4c864mshae0112bb19f170fp174004jsn54e6268a87e3"
    ],
]);

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
    echo "cURL Error #:" . $err;
} else {
    //$formatted =json_decode(json_encode($response), true);
    $formatted =json_decode($response, true);
    $polarity = $formatted["Polarity"];
    $rating = ($polarity + 1)*5;
    $raingfinal =  round($rating, 1);

}
if (!$resultmovie) {
    $errno = $conn->errno;
    $errmsg = $conn->error;
    echo "Selection failed with: ($errno) $errmsg<br/>\n";
    $conn->close();
    exit;
} else { //display results in a table
    //insert a row into the table for each row of data
    $resultmovie_row = $resultmovie->fetch_assoc();

    //   echo $resultmovie_row['movie_rating'];

    $currentRating = $resultmovie_row['movie_rating'];
    $currentVotes = $resultmovie_row['vote_count'];
    $finalVotes = $currentVotes + 1;

    $allRating = $currentRating * $currentVotes;

    $newRating = ($allRating + $raingfinal)/$finalVotes;




}
//define statement
$query_str = "INSERT INTO reviews VALUES (NULL, '$movie_id', '$user_id', '$review_rating', '$review_content','$raingfinal')";
$query_ratingstr = "UPDATE movies SET movie_rating = ".$newRating." WHERE movies.movie_id = ".$movie_id."";
$query_votestr = "UPDATE movies SET vote_count = ".$finalVotes." WHERE movies.movie_id = ".$movie_id."";
//execute query
$result =  @$conn->query($query_str);
$resultrating =  @$conn->query($query_ratingstr);
$resultvotes =  @$conn->query($query_votestr);
?>

<div class="container wrapper">

    <h2><? echo "Response is:".$response ?></h2>
    <!-- <h1 class="text-center">Add Review</h1>-->

    <?php
    //insertion errors
    if (!$result) {
        $errno = $conn->errno;
        $errmsg = $conn->error;
        echo "Insertion failed with $errno $errmsg<br/>\n";
        $conn->close();
        exit;
    } else {
        ?>
        <div class="container wrapper">
            <h1 class="text-center text-success">Your review has been added!</h1>
        </div>

        <?php

        $conn->close();
    }
    header( "Refresh:3; url=moviedetails.php?id=$movie_id", true, 303);

    ?>

