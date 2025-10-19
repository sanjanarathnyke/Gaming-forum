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
  <nav class="navbar navbar-expand-lg navbar-dark">
    <div class="container-lg">
      <a class="navbar-brand" href="{{ route('welcome') }}">GameVerse</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item"><a class="nav-link" href="{{ route('welcome') }}">Home</a></li>
          <li class="nav-item"><a class="nav-link" href="{{ route('forum') }}">Forums</a></li>
          <li class="nav-item"><a class="nav-link" href="{{ route('category') }}">Categories</a></li>
          <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">Login</a></li>
          <li class="nav-item"><a class="nav-link" href="{{ route('register') }}">Register</a></li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Hero Section -->
  <section class="hero">
    <div class="hero-content">
      <h1>Join the Battle of Opinions</h1>
      <p>Connect with gamers worldwide and discuss your favorite titles</p>
      <a href="{{ route('register') }}" class="btn btn-primary-neon">Join the Community</a>
    </div>
  </section>

  <!-- Main Content -->
  <main class="container-lg py-5">
    <div class="row g-4">
      <!-- Latest Posts -->
      <div class="col-lg-8">
        <h2 class="mb-4" style="color: var(--accent-neon-blue); font-weight: 700;">Latest Posts</h2>
        
        <div class="post-card">
          <img src="/placeholder.svg?height=80&width=80" alt="Post" class="post-card-image">
          <div class="post-card-content">
            <h3 class="post-card-title">Black Ops 6 Campaign Review - A Masterpiece</h3>
            <div class="post-card-meta">
              <span>By <strong>ShadowGamer</strong></span>
              <span>2 hours ago</span>
            </div>
            <p class="card-text mt-2">The latest Black Ops campaign delivers an incredible story with stunning graphics and engaging gameplay mechanics...</p>
            <div class="post-card-stats">
              <div class="stat-item">
                <span class="stat-label">Replies</span>
                <span class="stat-value">24</span>
              </div>
              <div class="stat-item">
                <span class="stat-label">Views</span>
                <span class="stat-value">411</span>
              </div>
            </div>
          </div>
        </div>

        <div class="post-card">
          <img src="/placeholder.svg?height=80&width=80" alt="Post" class="post-card-image">
          <div class="post-card-content">
            <h3 class="post-card-title">Multiplayer Meta Shift - New Weapon Balance</h3>
            <div class="post-card-meta">
              <span>By <strong>ProPlayer99</strong></span>
              <span>5 hours ago</span>
            </div>
            <p class="card-text mt-2">The latest patch has completely changed the multiplayer landscape. Here's what you need to know about the new meta...</p>
            <div class="post-card-stats">
              <div class="stat-item">
                <span class="stat-label">Replies</span>
                <span class="stat-value">18</span>
              </div>
              <div class="stat-item">
                <span class="stat-label">Views</span>
                <span class="stat-value">356</span>
              </div>
            </div>
          </div>
        </div>

        <div class="post-card">
          <img src="/placeholder.svg?height=80&width=80" alt="Post" class="post-card-image">
          <div class="post-card-content">
            <h3 class="post-card-title">Esports Championship 2025 - Teams to Watch</h3>
            <div class="post-card-meta">
              <span>By <strong>EsportsDaily</strong></span>
              <span>1 day ago</span>
            </div>
            <p class="card-text mt-2">As we head into the championship season, let's break down the top teams and their chances of winning it all...</p>
            <div class="post-card-stats">
              <div class="stat-item">
                <span class="stat-label">Replies</span>
                <span class="stat-value">42</span>
              </div>
              <div class="stat-item">
                <span class="stat-label">Views</span>
                <span class="stat-value">892</span>
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
            <li><a href="{{ route('forum') }}">Call of Duty <span class="badge badge-category blue">156</span></a></li>
            <li><a href="{{ route('forum') }}">Valorant <span class="badge badge-category">89</span></a></li>
            <li><a href="{{ route('forum') }}">Counter-Strike 2 <span class="badge badge-category red">234</span></a></li>
            <li><a href="{{ route('forum') }}">Fortnite <span class="badge badge-category blue">167</span></a></li>
            <li><a href="{{ route('forum') }}">Apex Legends <span class="badge badge-category">145</span></a></li>
          </ul>
        </div>

        <div class="sidebar-section">
          <h3 class="sidebar-title">Members Online</h3>
          <p class="card-text">Total: <strong style="color: var(--accent-neon-blue);">199</strong> (members: 1, guests: 198)</p>
          <p class="card-text mt-3" style="font-size: 0.9rem;">
            <strong>superomantis</strong> is currently online
          </p>
        </div>

        <div class="sidebar-section">
          <h3 class="sidebar-title">Quick Links</h3>
          <ul class="sidebar-list">
            <li><a href="index.html">Home</a></li>
            <li><a href="{{ route('forum') }}">All Forums</a></li>
            <li><a href="profile.html">My Profile</a></li>
            <li><a href="login.html">Login</a></li>
          </ul>
        </div>
      </div>
    </div>
  </main>

  <!-- Footer -->
  <footer>
    <div class="container-lg">
      <div class="row g-4 mb-4">
        <div class="col-md-3">
          <h5>About</h5>
          <p class="card-text">GameVerse is the ultimate gaming community forum for discussing your favorite games.</p>
        </div>
        <div class="col-md-3">
          <h5>Quick Links</h5>
          <div class="footer-section">
            <a href="index.html">Home</a>
            <a href="{{ route('forum') }}">Forums</a>
            <a href="categories.html">Categories</a>
          </div>
        </div>
        <div class="col-md-3">
          <h5>Support</h5>
          <div class="footer-section">
            <a href="#">Contact Us</a>
            <a href="#">Report Bug</a>
            <a href="#">Feedback</a>
          </div>
        </div>
        <div class="col-md-3">
          <h5>Legal</h5>
          <div class="footer-section">
            <a href="#">Terms of Service</a>
            <a href="#">Privacy Policy</a>
            <a href="#">Cookie Policy</a>
          </div>
        </div>
      </div>
      <div class="footer-bottom">
        <p>&copy; 2025 GameVerse Forum. All rights reserved. | Powered by Gaming Community</p>
      </div>
    </div>
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
