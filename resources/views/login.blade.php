<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login Page</title>
</head>
<body>
    <p>LOGIN</p>
    <p>Doesn't Have an account? <a href="/register">Register Now!</a> </p>
    <form action="/proses-login" method="POST">
        @csrf
        <input type="text" name="username" placeholder="Username"> <br> <br>
        <input type="password" name="password" placeholder="Password"> <br> <br>
        <button name="submit" type="submit">Login</button>
    </form>

    @if(session('error'))
    <p>{{ session('error') }}</p>
@endif
</body>
</html>
