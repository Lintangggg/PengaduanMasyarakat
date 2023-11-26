<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login Page</title>

    <!-- Add Bootstrap CSS from CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body class="bg-light min-vh-100 d-flex align-items-center">

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 bg-white p-4 rounded">
                <h2 class="mb-4">LOGIN</h2>
                <p>Don't have an account? <a href="/register">Register Now!</a></p>

                <form action="/proses-login" method="POST">
                    @csrf
                    <div class="form-group">
                        <input type="text" class="form-control" name="username" placeholder="Username">
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" name="password" placeholder="Password">
                    </div>
                    <button class="btn btn-primary" name="submit" type="submit">Login</button>
                </form>

                @if(session('error'))
                    <p class="mt-3 text-danger">{{ session('error') }}</p>
                @endif
            </div>
        </div>
    </div>

    <!-- Add Bootstrap JS and Popper.js from CDN (optional) -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>
</html>
