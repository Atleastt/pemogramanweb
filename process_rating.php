<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $rating = $_POST["kindness"];

    // Debugging: Tampilkan nilai variabel
    echo "Email: $email, Rating: $rating";


    $data = "Email: $email, Rating: $rating\n";
    file_put_contents("ratings.txt", $data, FILE_APPEND);

    // Tampilkan pesan terima kasih atau redirect ke halaman lain jika diperlukan
    echo "Terima kasih atas penilaian Anda!";
}
?>
