<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pengembalian Buku - Perpustakaan AomLib</title>
    <style>
        body {
            font-family:'Times New Roman', Times, serif;
            margin: 20px;
        }
        header {
            background-color: plum;
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
        <h1>Pengembalian Buku</h1>
        <a href="beranda.php"><h4>Kembali</h4></a>
    </header>

    <main>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <label for="nama_pengembali">Nama Pengembali:</label>
            <input type="text" id="nama_pengembali" name="nama_pengembali" required>

            <label for="judul_buku">Judul Buku:</label>
            <input type="text" id="judul_buku" name="judul_buku" required>

            <button type="submit">Submit</button>
        </form>

        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Ambil data dari formulir pengembalian
            $nama_pengembali = $_POST["nama_pengembali"];
            $judul_buku = $_POST["judul_buku"];

            // Contoh: Menyimpan data dalam file teks
            $file = 'pengembalian.txt';
            $data = "$nama_pengembali, $judul_buku\n";
            
            // Pastikan file_put_contents berhasil menulis ke file
            if (file_put_contents($file, $data, FILE_APPEND | LOCK_EX) !== false) {
                echo "<p>Data Pengembali telah berhasil disimpan.</p>";
            } else {
                echo "<p>Terjadi kesalahan pada penyimpanan data pengembalian.</p>";
            }
        }
        ?>
    </main>
</body>
</html>
