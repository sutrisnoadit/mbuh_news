<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Registration page template based on Bootstrap 5">

    <link href="{{ asset('loginForm/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('loginForm/css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('loginForm/css/style.css') }}" rel="stylesheet">

    <title>Register</title>
</head>

<body>
    <section class="h-100">
        <div class="container h-100">
            <div class="row justify-content-sm-center h-100">
                <div class="col-xxl-4 col-xl-5 col-lg-5 col-md-7 col-sm-9">
                    <div class="text-center my-5">
                        <img src="https://getbootstrap.com/docs/5.0/assets/brand/bootstrap-logo.svg" alt="logo"
                            width="100">
                    </div>
                    <div class="card shadow-lg">
                        <div class="card-body p-5">
                            <h1 class="fs-4 card-title fw-bold mb-4">Register</h1>

                            <form method="POST" action="{{ route('register.submit') }}" class="needs-validation"
                                novalidate="">
                                @csrf
                                <div class="mb-3">
                                    <label class="mb-2 text-muted" for="name">Name</label>
                                    <input id="name" type="text" class="form-control" name="name" required
                                        autofocus>
                                    <div class="invalid-feedback">
                                        Name is required
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label class="mb-2 text-muted" for="email">E-Mail Address</label>
                                    <input id="email" type="email" class="form-control" name="email" required>
                                    <div class="invalid-feedback">
                                        Email is invalid
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label class="mb-2 text-muted" for="password">Password</label>
                                    <div class="position-relative">
                                        <input id="password" type="password" class="form-control" name="password"
                                            required>
                                        <i class="fa fa-eye position-absolute" id="togglePassword"
                                            style="cursor: pointer; right: 20px; top: 50%; transform: translateY(-50%);"></i>
                                    </div>
                                    <div class="invalid-feedback">
                                        Password is required
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label class="mb-2 text-muted" for="password_confirmation">Confirm Password</label>
                                    <div class="position-relative">
                                        <input id="password_confirmation" type="password" class="form-control"
                                            name="password_confirmation" required>
                                        <i class="fa fa-eye position-absolute" id="toggleConfirmPassword"
                                            style="cursor: pointer; right: 20px; top: 50%; transform: translateY(-50%);"></i>
                                    </div>
                                    <div class="invalid-feedback">
                                        Password confirmation is required
                                    </div>
                                </div>
                                <div class="align-items-center d-flex justify-content-end">
                                    <button type="submit" class="btn btn-primary ms-auto" id="loginButton">
                                        Register
                                    </button>
                                </div>
                            </form>
                        </div>
                        <div class="card-footer py-3 border-0">
                            <div class="text-center">
                                Already have account? <a href="{{ route('login') }}" class="text-dark">Login</a>
                            </div>
                        </div>
                    </div>
                    <div class="text-center mt-5 text-muted">
                        Copyright &copy; 2024 &mdash; Aditgtg
                    </div>
                </div>
            </div>
        </div>
    </section>

    @include('components.admin-footer')
    <script src="{{ asset('js/togglePassword.js') }}"></script>
</body>

</html>
