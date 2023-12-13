<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil data dari formulir peminjaman
    $nama_peminjam = $_POST["nama_peminjam"];
    $judul_buku = $_POST["judul_buku"];

    // Contoh: Menyimpan data dalam file teks
    $file = 'peminjaman_data.txt';
    $data = "$nama_peminjam, $judul_buku\n";
    file_put_contents($file, $data, FILE_APPEND | LOCK_EX);

    // Redirect atau tampilkan pesan sukses
    header("Location: peminjaman.php?success=true");
    exit();
} else {
    // Jika akses langsung ke file ini tanpa melalui formulir, kembalikan ke halaman peminjaman
    header("Location: peminjaman.php");
    exit();
}
?>
