<?php
$registration_success = false;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama_member = $_POST["nama_member"];
    $email_member = $_POST["email_member"];

    $file = 'member_data.txt';
    $data = "$nama_member, $email_member\n";
    file_put_contents($file, $data, FILE_APPEND | LOCK_EX);

    $registration_success = true;

    // Redirect ke halaman beranda
    header("Location: beranda.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perpustakaan</title>
    <style>
        body {
            font-family:'Times New Roman', Times, serif;
            margin: 20px;
            text-align: center;
            align-items: center;
            display: flex;
            justify-content: center;
            flex-direction: column;
            height: 100vh;
        }
        form {
            margin-bottom: 20px;
            text-align: center;
            align-items: center;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.35);
            padding: 50px;
        }

        .login {
            background-color:powderblue;
        }

        h1 {
            color: indianred;
        }
    </style>
</head>
<body>
    <div class="login">
        <?php
        if ($registration_success) {
            echo '<p>Registrasi berhasil! Anda sekarang dapat masuk ke <a href="beranda.php">halaman beranda</a>.</p>';
        }
        ?>

        <!-- <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <h1><b>Login</b></h1>
            <br><br>

            <label for="nama_member">Nama:</label>
            <input type="text" id="nama_member" name="nama_member" required>
            <br><br>

            <label for="email_member">Email:</label>
            <input type="email" id="email_member" name="email_member" required>
            <br><br>

            <button type="submit">Daftar</button>

            <p>
                <a href="#">Forgot Password?</a>
            </p>

            <div class="container"> -->
        <div class="login">
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                <h1>Login</h1>
                <hr>
                <p>Banyaklah membaca buku, karena Ilmu berada didalamnya!</p>
                <label for="">Email</label>
                <input type="text" placeholder="example@gmail.com" required>
                <br>
                <br>
                <label for="">Password</label>
                <input type="password" placeholder="Password" required>
                <button>Login</button>
                <p>
                    <a href="#">Forgot Password?</a>
                </p>
            </form>
        </div>
        </form>
    </div>
</body>
</html>
