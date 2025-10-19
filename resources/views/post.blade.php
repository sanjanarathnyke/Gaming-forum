<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Post - GameVerse Forum</title>
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

  <!-- Main Content -->
  <main class="container-lg py-5">
    <div class="row g-4">
      <!-- Post Content -->
      <div class="col-lg-8">
        <!-- Post Header -->
        <div class="card mb-4">
          <div class="card-body">
            <h1 class="card-title" style="font-size: 2rem; margin-bottom: 1rem;">BO6 keeps crashing while ranked</h1>
            <div style="display: flex; gap: 2rem; flex-wrap: wrap; color: var(--text-muted); font-size: 0.95rem;">
              <div>
                <strong style="color: var(--text-light);">By:</strong> codcodcod9348
              </div>
              <div>
                <strong style="color: var(--text-light);">Posted:</strong> Mar 31, 2025 at 2:45 PM
              </div>
              <div>
                <span class="badge badge-category red">Call of Duty: Black Ops 6</span>
              </div>
            </div>
          </div>
        </div>

        <!-- Post Image -->
        <img src="/placeholder.svg?height=400&width=800" alt="Post" style="width: 100%; border-radius: 8px; margin-bottom: 2rem; border: 1px solid var(--border-color);">

        <!-- Post Content -->
        <div class="card mb-4">
          <div class="card-body">
            <p style="font-size: 1.1rem; line-height: 1.8; margin-bottom: 1rem;">
              I've been experiencing constant crashes whenever I try to play ranked matches in Black Ops 6. The game runs fine in campaign and multiplayer, but as soon as I queue for ranked, it crashes within 5-10 minutes. I've tried:
            </p>
            <ul style="font-size: 1rem; line-height: 1.8; margin-bottom: 1rem;">
              <li>Updating my graphics drivers</li>
              <li>Verifying game files</li>
              <li>Lowering graphics settings</li>
              <li>Reinstalling the game</li>
            </ul>
            <p style="font-size: 1.1rem; line-height: 1.8;">
              Nothing seems to work. Has anyone else experienced this issue? Any suggestions would be greatly appreciated!
            </p>
          </div>
        </div>

        <!-- Comments Section -->
        <h2 style="color: var(--accent-neon-blue); font-weight: 700; margin-bottom: 2rem;">Comments (3)</h2>

        <!-- Comment 1 -->
        <div class="card mb-3">
          <div class="card-body">
            <div style="display: flex; gap: 1rem; margin-bottom: 1rem;">
              <img src="/placeholder.svg?height=50&width=50" alt="Avatar" style="width: 50px; height: 50px; border-radius: 50%; object-fit: cover;">
              <div style="flex: 1;">
                <div style="display: flex; justify-content: space-between; align-items: center;">
                  <h4 style="color: var(--accent-neon-blue); margin: 0;">Jack135790</h4>
                  <span style="color: var(--text-muted); font-size: 0.85rem;">2 hours ago</span>
                </div>
                <p style="color: var(--text-muted); font-size: 0.9rem; margin: 0.3rem 0 0.5rem 0;">Verified Member</p>
              </div>
            </div>
            <p style="margin: 0;">Have you checked your system RAM? Sometimes ranked matches use more resources. Also, try disabling any overlays like Discord or Xbox Game Bar.</p>
          </div>
        </div>

        <!-- Comment 2 -->
        <div class="card mb-3">
          <div class="card-body">
            <div style="display: flex; gap: 1rem; margin-bottom: 1rem;">
              <img src="/placeholder.svg?height=50&width=50" alt="Avatar" style="width: 50px; height: 50px; border-radius: 50%; object-fit: cover;">
              <div style="flex: 1;">
                <div style="display: flex; justify-content: space-between; align-items: center;">
                  <h4 style="color: var(--accent-neon-blue); margin: 0;">ProPlayer99</h4>
                  <span style="color: var(--text-muted); font-size: 0.85rem;">1 hour ago</span>
                </div>
                <p style="color: var(--text-muted); font-size: 0.9rem; margin: 0.3rem 0 0.5rem 0;">Moderator</p>
              </div>
            </div>
            <p style="margin: 0;">This is a known issue with some Xbox Series X units. I'd recommend contacting Activision support directly. They might have a specific fix for your hardware configuration.</p>
          </div>
        </div>

        <!-- Comment 3 -->
        <div class="card mb-4">
          <div class="card-body">
            <div style="display: flex; gap: 1rem; margin-bottom: 1rem;">
              <img src="/placeholder.svg?height=50&width=50" alt="Avatar" style="width: 50px; height: 50px; border-radius: 50%; object-fit: cover;">
              <div style="flex: 1;">
                <div style="display: flex; justify-content: space-between; align-items: center;">
                  <h4 style="color: var(--accent-neon-blue); margin: 0;">ShadowGamer</h4>
                  <span style="color: var(--text-muted); font-size: 0.85rem;">30 minutes ago</span>
                </div>
                <p style="color: var(--text-muted); font-size: 0.9rem; margin: 0.3rem 0 0.5rem 0;">Community Member</p>
              </div>
            </div>
            <p style="margin: 0;">Try clearing your console cache. Hold the power button for 10 seconds to fully power down, then unplug for 30 seconds. This fixed it for me!</p>
          </div>
        </div>

        <!-- Add Comment Form -->
        <div class="card">
          <div class="card-header">
            <h3 class="card-title" style="margin: 0;">Add a Comment</h3>
          </div>
          <div class="card-body">
            <form>
              <div class="mb-3">
                <label for="comment" class="form-label">Your Comment</label>
                <textarea class="form-control" id="comment" rows="5" placeholder="Share your thoughts or solutions..."></textarea>
              </div>
              <button type="submit" class="btn btn-primary-neon">Post Comment</button>
            </form>
          </div>
        </div>
      </div>

      <!-- Sidebar -->
      <div class="col-lg-4">
        <div class="sidebar-section">
          <h3 class="sidebar-title">Post Info</h3>
          <div style="display: grid; gap: 1rem;">
            <div>
              <div style="color: var(--text-muted); font-size: 0.85rem;">Views</div>
              <div style="color: var(--accent-neon-blue); font-weight: 700; font-size: 1.3rem;">780</div>
            </div>
            <div>
              <div style="color: var(--text-muted); font-size: 0.85rem;">Replies</div>
              <div style="color: var(--accent-neon-blue); font-weight: 700; font-size: 1.3rem;">3</div>
            </div>
            <div>
              <div style="color: var(--text-muted); font-size: 0.85rem;">Category</div>
              <div style="margin-top: 0.3rem;"><span class="badge badge-category red">Call of Duty: Black Ops 6</span></div>
            </div>
          </div>
        </div>

        <div class="sidebar-section">
          <h3 class="sidebar-title">Related Posts</h3>
          <ul class="sidebar-list">
            <li><a href="post.html">Xbox series X crashing playing ranked??</a></li>
            <li><a href="post.html">BO6 crashing series x</a></li>
            <li><a href="post.html">Download and pre load BF6</a></li>
            <li><a href="post.html">Multiplayer Meta Shift - New Weapon Balance</a></li>
          </ul>
        </div>

        <div class="sidebar-section">
          <h3 class="sidebar-title">Quick Actions</h3>
          <button class="btn btn-secondary-neon w-100 mb-2">Report Post</button>
          <button class="btn btn-secondary-neon w-100">Share Post</button>
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
            <a href="forums.html">Forums</a>
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
