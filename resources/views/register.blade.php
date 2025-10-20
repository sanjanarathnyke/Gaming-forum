<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - GameVerse Forum</title>
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
                            <h1 class="card-title text-center mb-2 fs-2">Join GameVerse</h1>
                            <p class="text-center text-muted mb-4">Create your account to start gaming</p>

                            <form>
                                <div class="mb-3">
                                    <label for="username" class="form-label">Username</label>
                                    <input type="text" class="form-control" id="username"
                                        placeholder="Choose your username" required>
                                </div>

                                <div class="mb-3">
                                    <label for="email" class="form-label">Email Address</label>
                                    <input type="email" class="form-control" id="email"
                                        placeholder="your@email.com" required>
                                </div>

                                <div class="mb-3">
                                    <label for="password" class="form-label">Password</label>
                                    <input type="password" class="form-control" id="password"
                                        placeholder="Create a strong password" required>
                                </div>

                                <div class="mb-3">
                                    <label for="confirm-password" class="form-label">Confirm Password</label>
                                    <input type="password" class="form-control" id="confirm-password"
                                        placeholder="Confirm your password" required>
                                </div>

                                <div class="mb-3 form-check">
                                    <input type="checkbox" class="form-check-input" id="terms" required>
                                    <label class="form-check-label" for="terms">
                                        I agree to the <a href="#" class="text-decoration-none">Terms of
                                            Service</a> and <a href="#" class="text-decoration-none">Privacy
                                            Policy</a>
                                    </label>
                                </div>

                                <button type="submit" class="btn btn-primary-neon w-100 mb-3">Create Account</button>
                            </form>

                            <div class="text-center text-muted small">
                                Already have an account? <a href="login.html" class="text-decoration-none fw-bold">Sign
                                    in here</a>
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
