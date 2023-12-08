<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $rating = $_POST["kindness"];

    echo "Email: $email, Rating: $rating";

    $data = "Email: $email, Rating: $rating\n";
    file_put_contents("ratings.txt", $data, FILE_APPEND);

}
?>
