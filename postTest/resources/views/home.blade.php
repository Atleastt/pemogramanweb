<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
</head>
<body>
    <h1>Selamat Datang</h1>
    <table style="border: none;">
    <form action="{{route('submit-data')}}" method="post">
        @csrf
            <tr>
                <td>NIK: </td>
                <td><input type="text" name="NIK"></td>
            </tr>
            <tr>
                <td>Nama: </td>
                <td><input type="text" name="Nama"></td>
            </tr>
            <tr>
                <td>Provinsi: </td>
                <td><input type="text" name="Provinsi"></td>
            </tr>
            <tr>
                <td>Kota: </td>
                <td><input type="text" name="Kota"></td>
            </tr>
            <tr>
                <td>Nomor Telepon: </td>
                <td><input type="text" name="Nomor"></td>
            </tr>
            <tr>
                <td colspan=2> <button type="submit">Submit</button></td>
            </tr>
        </form>
    </table>
</body>
</html>