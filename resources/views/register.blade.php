<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Registration Page</title>

    <!-- Add Bootstrap CSS from CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body class="bg-light min-vh-100 d-flex align-items-center">

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 bg-white p-4 rounded">
                <h2 class="mb-4">REGISTER</h2>
                <p>Already have an account? <a href="/login">Login Now!</a></p>

                <form action="/register-proses" method="POST">
                    @csrf
                    <div class="form-group">
                        <input type="text" class="form-control" name="Nama_Petugas" placeholder="Nama Admin" required>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="Username" placeholder="Username" required>
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" name="Password" placeholder="Password" required>
                    </div>
                    <div class="form-group">
                        <input type="tel" class="form-control" name="Telp" placeholder="No. Telepon" required>
                    </div>
                    <button class="btn btn-primary" type="submit">Register</button>
                </form>
            </div>
        </div>
    </div>

    <!-- Add Bootstrap JS and Popper.js from CDN (optional) -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>
</html>
