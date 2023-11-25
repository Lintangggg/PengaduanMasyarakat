<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login Page</title>
</head>
<body>
    <p>REGISTER</p>
    <p>Already Have an account? <a href="/login">Login Now!</a> </p>
    <form action="/register-proses" method="POST">
        @csrf
        <input type="text" name="Nama_Petugas" id="" placeholder="Nama Petugas" required> <br> <br>
        <input type="text" name="Username" id="" placeholder="Username" required> <br> <br>
        <input type="text" name="Password" id="" placeholder="Password" required> <br> <br>
        <input type="tel" name="Telp" id="" placeholder="No. Telepon" required> <br> <br>
        {{-- <select name="Pilih" id="">
            <option value="admin">Admin</option>
            <option value="petugas">Petugas</option>
        </select><br> <br> --}}
        <button type="submit">Register</button>
    </form>
</body>
</html>
