<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - GameVerse Forum</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('asset/css/style.css') }}">
</head>

<body>
    <!-- Navbar -->
    @include('header.header')

    <!-- Main Content -->
    <main class="d-flex align-items-center justify-content-center"
        style="min-height: calc(100vh - 200px); padding: 2rem 0;">
        <div class="container-lg">
            <div class="row justify-content-center">
                <div class="col-md-6 col-lg-5">
                    <div class="card">
                        <div class="card-body p-5">
                            <h1 class="card-title text-center mb-2 fs-2">Welcome Back</h1>
                            <p class="text-center text-muted mb-4">Sign in to your GameVerse account</p>

                            <form>
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email Address</label>
                                    <input type="email" class="form-control" id="email"
                                        placeholder="your@email.com" required>
                                </div>

                                <div class="mb-3">
                                    <label for="password" class="form-label">Password</label>
                                    <input type="password" class="form-control" id="password"
                                        placeholder="Enter your password" required>
                                </div>

                                <div class="mb-3 form-check">
                                    <input type="checkbox" class="form-check-input" id="remember">
                                    <label class="form-check-label" for="remember">
                                        Remember me
                                    </label>
                                </div>

                                <button type="submit" class="btn btn-primary-neon w-100 mb-3">Sign In</button>
                            </form>

                            <div class="text-center text-muted small">
                                Don't have an account? <a href="register.html"
                                    class="text-decoration-none fw-bold">Register here</a>
                            </div>

                            <div class="text-center mt-3">
                                <a href="#" class="text-decoration-none small">Forgot your password?</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <!-- Footer -->
    @include('footer.footer')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
