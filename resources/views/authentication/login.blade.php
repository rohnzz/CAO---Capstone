<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CAO Login</title> 

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('CSS/style.css') }}">

    @include('partials.header')

</head>

<body>
    <div class="container min-vh-100 d-flex align-items-center justify-content-center">
        <div class="row login-card shadow-lg bg-light custom-login-width">
            <div class="col-md-6 d-none d-md-block login-left"></div>
            <div class="col-md-6 bg-white text-dark p-5">
                <div class="text-center mb-4">
                <img src="{{ asset('img/cao_logo.jpg') }}" alt="Logo" class="mb-3" style="max-width: 150px;">
                    <h2><b>Culture and Arts Office</b></h2>
                    <p class="login-box-msg">Sign in to start your session</p>
                </div>

                @if(session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif

                @if(session('failed'))
                    <div class="alert alert-danger">{{ session('failed') }}</div>
                @endif

                <form action="{{ route('submit') }}" method="POST">
                    @csrf

                    <div class="mb-3">
                        <input type="email" name="email" class="form-control" placeholder="Email" required>
                    </div>
                    <div class="mb-3">
                        <input type="password" name="password" class="form-control" placeholder="Password" required>
                    </div>

                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="remember" id="remember">
                            <label class="form-check-label" for="remember">Remember Me</label>
                        </div>
                        <a href="#" class="text-dark small">Forgot password?</a>
                    </div>

                    <div class="d-grid mb-3">
                        <button type="submit" class="btn btn-primary">Sign In</button>
                    </div>

                    <div class="text-center">
                        <span class="text-dark">Don't have an account? <a href="{{ route('auth.register') }}" class="text-info">Register here</a></span>
                    </div>

                    <div class="text-center mt-3 small text-dark">
                        <a href="#" class="text-dark">Terms of use</a> · <a href="" class="text-dark">Privacy policy</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>


    @include('partials.scripts')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
