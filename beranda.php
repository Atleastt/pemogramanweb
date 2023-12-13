<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Beranda - Perpustakaan</title>
    <style>
        body {
            font-family:'Times New Roman', Times, serif;
            margin: 20px;
        }

        header {
            background-color:royalblue;
            padding: 10px;
            text-align: center;
            align-items: center;
            display: flex;
            justify-content: center;
            position: relative;
        }

        h1 {
            color:whitesmoke;
        }
        
        h2{
            color: firebrick;
        }
        h4{
            color: wheat;
        }
        main {
            margin-top: 20px;
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 20px;
            text-align: center;
        }

        .section {
            border: 1px solid #ddd;
            padding: 15px;
            border-radius: 8px;
        }

        p {
            color:red;
        }

        .link {
            display: block;
            text-align: center;
            margin-top: 10px;
        }

        header a{
            position: absolute;
            right: 50px;
        }
        
    </style>
</head>
<body>

    <header>
        <h1>Selamat Datang di Perpustakaan AomLib</h1>
        <a href="pendaftaran.php"><h4>logout</h4></a>
    </header>

    <main>
        <?php
        // Cek apakah ada pesan registrasi berhasil
        if (isset($_GET['success']) && $_GET['success'] == 'true') {
            echo '<p>Selamat! Anda berhasil terdaftar sebagai member perpustakaan.</p>';
        }
        ?>
        
        <!-- Peminjaman -->
        <section class="section">
            <a href="Peminjaman.php" style="text-decoration: none"><h2> Peminjaman Buku <img src= "Buku.jpg" alt="Buku" style="width: 100%; max-width: 500px; margin: 20px auto; display: block;"></h2></a>
        </section>

        <!-- Pengembalian -->
        <section class="section">
            <a href="Pengembalian.php" style="text-decoration: none"><h2>Pengembalian Buku <img src= "Buku2.jpg" alt="Buku" style="width: 100%; max-width: 500px; margin: 20px auto; display: block;"></h2></a>
        </section>

    </main>

</body>
</html>
