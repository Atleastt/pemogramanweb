<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil data dari formulir pengembalian
    $nama_pengembali = $_POST["nama_pengembali"];
    $judul_buku = $_POST["judul_buku"];

    // Contoh: Menyimpan data dalam file teks
    $file = 'pengembalian_data.txt';
    $data = "$nama_pengembali, $judul_buku\n";
    file_put_contents($file, $data, FILE_APPEND | LOCK_EX);

    // Redirect atau tampilkan pesan sukses
    header("Location: pengembalian.php?success=true");
    exit();
} else {
    // Jika akses langsung ke file ini tanpa melalui formulir, kembalikan ke halaman pengembalian
    header("Location: pengembalian.php");
    exit();
}
?>
