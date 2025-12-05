<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <link rel="icon" href="/favicon.ico" sizes="any">
        <link rel="icon" href="/favicon.svg" type="image/svg+xml">
        <link rel="apple-touch-icon" href="/apple-touch-icon.png">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />
        <style>
            body {
            background-color: #f8f9fa;
            }
            .login-container {
            margin-top: 100px;
            }
            .login-card {
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            background-color: white;
            }
        </style>
    </head>
<body class="antialiased">
    <div class="container login-container">
    <div class="row justify-content-center">
        <div class="col-md-4">
        <div class="login-card">
            <h3 class="text-center mb-4">Login</h3>
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="mb-3">
                    <label for="email" class="form-label">Email address</label>
                    <input type="email" name="email" class="form-control" id="email" placeholder="Enter email" >
                </div>
                @error('email')
                    <span class="text-danger">{{$message}}</span>
                @enderror
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" name="password" class="form-control" id="password" placeholder="Enter password" ><br>
                    <input type="checkbox"  class="form-check-input" name="showPassword" id="showPassword"><lable class="form-check-label  mt-2 ms-2 me-2" for="showPassword">Show Password</lable>
                </div>
                @error('password')
                    <span class="text-danger">{{$message}}</span>
                @enderror
                <button type="submit" class="btn btn-primary w-100">Login</button>
            </form>
        </div>
        </div>
    </div>
    </div>
<script>
    document.getElementById('showPassword').addEventListener('change', function () {
        const passwordInput = document.getElementById('password');
        passwordInput.type = this.checked ? 'text' : 'password';
    });
</script>
</body>
</html>
