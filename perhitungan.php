<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Mengambil data nilai mata kuliah dari formulir
    $nilai_mk = isset($_POST['nilai_mk']) ? $_POST['nilai_mk'] : [];

    // Menghitung rata-rata
    $jumlah_mk = count($nilai_mk);
    $total_nilai = array_sum($nilai_mk);
    $rata_rata = $jumlah_mk > 0 ? $total_nilai / $jumlah_mk : 0;

    // Menentukan status kelulusan
    $status_kelulusan = $rata_rata > 2 ? "Selamat anda Lulus!" : "Maaf, anda Tidak Lulus";

    // Menampilkan hasil
    echo "<h2>Hasil Perhitungan Nilai IPK dan Status Kelulusan:</h2>";
    echo "<p>Nilai IPK: $rata_rata</p>";
    echo "<p>Status Kelulusan: $status_kelulusan</p>";

    // Tombol Kembali
    echo '<br><a href="index.html">Kembali</a>';
}
?>
