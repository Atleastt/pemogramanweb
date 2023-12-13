<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Peminjaman Buku - Perpustakaan</title>
    <style>
        body {
            font-family:'Times New Roman', Times, serif;
            margin: 20px;
        }
        header {
            background-color:plum;
            padding: 10px;
            text-align: center;
            align-items: center;
            display: flex;
            justify-content: center;
            position: relative;
        }
        h1 {
            color: black;
        }
        h4{
            color:brown;
        }
        main {
            margin-top: 20px;
        }
        form {
            display: flex;
            flex-direction: column;
            max-width: 400px;
            margin: auto;
        }
        label {
            margin-bottom: 8px;
        }
        input, button {
            margin-bottom: 16px;
            padding: 8px;
        }

        header a{
            position: absolute;
            left: 50px;
        }
    </style>
</head>
<body>

    <header>
        <h1>Peminjaman Buku</h1>
        <a href="beranda.php"><h4>Kembali</h4></a>
    </header>

    <main>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <label for="nama_peminjam">Nama Peminjam:</label>
            <input type="text" id="nama_peminjam" name="nama_peminjam" required>

            <label for="judul_buku">Judul Buku:</label>
            <input type="text" id="judul_buku" name="judul_buku" required>

            <button type="submit">Submit</button>   
        </form>

        <?php
        // Membaca isi file peminjaman_data.txt
        $file = 'peminjaman_data.txt';
        $lines = file($file);

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Ambil data dari formulir peminjaman
            $nama_peminjam = $_POST["nama_peminjam"];
            $judul_buku = $_POST["judul_buku"];
    

            // Contoh: Menyimpan data dalam file teks
            $data = "$nama_peminjam, $judul_buku\n";
            file_put_contents($file, $data, FILE_APPEND | LOCK_EX);

            // Menampilkan detail peminjaman terbaru
            echo "<h2>Detail Peminjaman</h2>";
            echo "<p>Nama Peminjam: $nama_peminjam</p>";
            echo "<p>Judul Buku: $judul_buku</p>";
        } else {
            echo "<p>Belum terdapat data Peminjam.</p>";
        }
        ?>
    </main>

</body>
</html>
