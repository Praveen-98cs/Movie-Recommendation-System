<?php

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
    CURLOPT_POSTFIELDS => "text=This%20is%20the%20best%20book%20I%20have%20ever%20seen",
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
    echo $response;
}