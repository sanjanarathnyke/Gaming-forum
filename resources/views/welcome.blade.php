<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GameVerse Forum - Join the Battle of Opinions</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('asset/css/style.css') }}">
</head>

<body>
    <!-- Navbar -->
    @include('header.header')

    <!-- Success/Error Messages -->
    @if (session('success'))
        <div class="container-lg mt-3">
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        </div>
    @endif

    <!-- Hero Section -->
    <section class="hero"
        style="background-image: url('{{ asset('images/background-images/banner_image.jpg') }}'); background-size: cover; background-position: center center;">
        <div class="hero-content">
            <h1 style="color: var(--primary-light);">Join the Battle of Opinions</h1>
            <p>Connect with gamers worldwide and discuss your favorite titles</p>
            <a href="{{ route('register') }}" class="btn btn-primary-neon">Join the Community</a>
        </div>
    </section>



    <!-- Main Content -->
    <main class="container-lg py-5">
        <div class="row g-4">
            <!-- Latest Posts -->
            <!-- Image Carousel - Replacing Latest Posts Section -->
            <div class="col-lg-8">
                <h2 class="mb-4" style="color: var(--accent-neon-blue); font-weight: 700;">Game Enthusiast’s Paradise
                </h2>

                <!-- Carousel -->
                <div id="gameImageCarousel" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        <!-- Slide 1 -->
                        <div class="carousel-item active">
                            <img src="{{ asset('images/swap-images/swap1.jpg') }}" class="d-block w-100"
                                alt="Game Image 1">
                            <div class="carousel-caption d-none d-md-block">
                                <p>"Victory is earned, not given. Every game is a battle, every match a chance to grow."
                                </p>
                            </div>
                        </div>
                        <!-- Slide 2 -->
                        <div class="carousel-item">
                            <img src="{{ asset('images/swap-images/swap2.jpg') }}" class="d-block w-100"
                                alt="Game Image 2">
                            <div class="carousel-caption d-none d-md-block">
                                <p>"The real competition is with yourself. Be better than you were yesterday."</p>
                            </div>
                        </div>
                        <!-- Slide 3 -->
                        <div class="carousel-item">
                            <img src="{{ asset('images/swap-images/swap3.jpg') }}" class="d-block w-100"
                                alt="Game Image 3">
                            <div class="carousel-caption d-none d-md-block">
                                <p>"Gaming isn’t just about winning; it’s about the thrill of the challenge."</p>
                            </div>
                        </div>
                        <!-- Slide 4 -->
                        <div class="carousel-item">
                            <img src="{{ asset('images/swap-images/swap4.jpg') }}" class="d-block w-100"
                                alt="Game Image 4">
                            <div class="carousel-caption d-none d-md-block">
                                <p>"The best players don’t play for trophies, they play for the love of the game."</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <!-- Sidebar -->
            <div class="col-lg-4">
                <div class="sidebar-section">
                    <h3 class="sidebar-title">Top Categories</h3>
                    <ul class="sidebar-list">
                        @forelse($topCategories as $index => $category)
                            <li>
                                <a href="{{ route('forum') }}">
                                    {{ $category->category_name }} 
                                    <span class="badge badge-category {{ $index % 3 == 0 ? 'blue' : ($index % 3 == 1 ? '' : 'red') }}">
                                        {{ $category->threads_count }}
                                    </span>
                                </a>
                            </li>
                        @empty
                            <li class="text-muted">No categories available yet</li>
                        @endforelse
                    </ul>
                </div>

                <div class="sidebar-section">
                    <h3 class="sidebar-title">Members Online</h3>
                    <p class="card-text">Total Registered Users: <strong style="color: var(--accent-neon-blue);">{{ $totalUsers }}</strong></p>
                    @auth
                        <p class="card-text mt-3" style="font-size: 0.9rem;">
                            <strong>{{ Auth::user()->name }}</strong> is currently online
                        </p>
                    @else
                        <p class="card-text mt-3" style="font-size: 0.9rem;">
                            <a href="{{ route('login') }}">Login</a> to see who's online
                        </p>
                    @endauth
                </div>

                <div class="sidebar-section">
                    <h3 class="sidebar-title">Quick Links</h3>
                    <ul class="sidebar-list">
                        <li><a href="{{ route('welcome') }}">Home</a></li>
                        <li><a href="{{ route('threads.index') }}">All Forums</a></li>
                        @auth
                            <li><a href="{{ route('profile') }}">My Profile</a></li>
                        @else
                            <li><a href="{{ route('login') }}">Login</a></li>
                            <li><a href="{{ route('register') }}">Register</a></li>
                        @endauth
                    </ul>
                </div>
            </div>
        </div>
    </main>

    <!-- Footer -->
    @include('footer.footer')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
