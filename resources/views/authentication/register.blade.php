<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Register | CAO</title> 

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('CSS/style.css') }}">

    @include('partials.header')
</head>
<body>
    <div class="container min-vh-100 d-flex align-items-center justify-content-center">
        <div class="row login-card shadow-lg bg-light custom-register-width">
            <div class="col-md-12 bg-white text-dark p-5">
                <div class="text-center mb-4">
                    <h2><b>Culture and Arts Office</b></h2>
                    <p class="login-box-msg">Register a new account</p>
                </div>

                @if(session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif

                @if(session('failed'))
                    <div class="alert alert-danger">{{ session('failed') }}</div>
                @endif

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('registerUser') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <input type="text" class="form-control" placeholder="Full Name" name="name" value="{{ old('name') }}" required>
                    </div>
                    <div class="mb-3">
                        <input type="email" class="form-control" placeholder="Email" name="email" value="{{ old('email') }}" required>
                    </div>
                    <div class="mb-3">
                        <input type="password" class="form-control" placeholder="Password" name="password" required>
                    </div>
                    <div class="mb-3">
                        <input type="password" class="form-control" placeholder="Retype password" name="password_confirmation" required>
                    </div>
                    <div class="mb-3">
                        <select class="form-control" name="role" required>
                            <option value="" disabled selected>Select Role</option>
                            <option value="superadmin">Superadmin</option>
                            <option value="admin">Admin</option>
                        </select>
                    </div>
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="agreeTerms" name="terms" value="agree" required>
                            <label class="form-check-label" for="agreeTerms">I agree to the <a href="#">terms</a></label>
                        </div>
                    </div>
                    <div class="d-grid mb-3">
                        <button type="submit" class="btn btn-primary">Register</button>
                    </div>
                    <div class="text-center">
                        <span class="text-dark">Already have an account? <a href="{{ route('login') }}" class="text-info">Sign in</a></span>
                    </div>
                    <div class="text-center mt-3 small text-dark">
                        <a href="#" class="text-dark">Terms of use</a> · <a href="" class="text-dark">Privacy policy</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @include('partials.scripts')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>