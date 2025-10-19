<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Forums - GameVerse</title>
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

  <!-- Page Header -->
  <section style="background-color: var(--secondary-dark); border-bottom: 2px solid var(--accent-orange); padding: 2rem 0;">
    <div class="container-lg">
      <h1 style="color: var(--accent-neon-blue); font-weight: 700; margin-bottom: 0.5rem;">All Forums</h1>
      <p style="color: var(--text-muted);">Browse all active discussions and join the conversation</p>
    </div>
  </section>

  <!-- Main Content -->
  <main class="container-lg py-5">
    <div class="row g-4">
      <!-- Forum Threads -->
      <div class="col-lg-8">
        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 2rem;">
          <h2 style="color: var(--accent-neon-blue); font-weight: 700; margin: 0;">Recent Threads</h2>
          <a href="#" class="btn btn-primary-neon" style="font-size: 0.9rem; padding: 0.6rem 1.5rem;">+ Create Post</a>
        </div>

        <!-- Thread Table -->
        <div style="overflow-x: auto;">
          <table style="width: 100%; border-collapse: collapse;">
            <thead>
              <tr style="border-bottom: 2px solid var(--border-color);">
                <th style="padding: 1rem; text-align: left; color: var(--accent-neon-blue); font-weight: 700;">Thread Title</th>
                <th style="padding: 1rem; text-align: center; color: var(--accent-neon-blue); font-weight: 700;">Replies</th>
                <th style="padding: 1rem; text-align: center; color: var(--accent-neon-blue); font-weight: 700;">Views</th>
                <th style="padding: 1rem; text-align: right; color: var(--accent-neon-blue); font-weight: 700;">Last Activity</th>
              </tr>
            </thead>
            <tbody>
              <tr style="border-bottom: 1px solid var(--border-color); transition: all 0.3s ease;" onmouseover="this.style.backgroundColor='rgba(0, 212, 255, 0.05)'" onmouseout="this.style.backgroundColor='transparent'">
                <td style="padding: 1rem;">
                  <a href="{{ route('posts') }}" style="color: var(--accent-neon-blue); text-decoration: none; font-weight: 600;">Download and pre load BF6</a>
                  <div style="font-size: 0.85rem; color: var(--text-muted); margin-top: 0.3rem;">
                    By <strong>ODark30</strong> in <span class="badge badge-category blue">Video Games</span>
                  </div>
                </td>
                <td style="padding: 1rem; text-align: center; color: var(--accent-neon-blue); font-weight: 700;">24</td>
                <td style="padding: 1rem; text-align: center; color: var(--text-muted);">411</td>
                <td style="padding: 1rem; text-align: right; color: var(--text-muted); font-size: 0.9rem;">Friday 10:01 AM</td>
              </tr>
              <tr style="border-bottom: 1px solid var(--border-color); transition: all 0.3s ease;" onmouseover="this.style.backgroundColor='rgba(0, 212, 255, 0.05)'" onmouseout="this.style.backgroundColor='transparent'">
                <td style="padding: 1rem;">
                  <a href="{{ route('posts') }}" style="color: var(--accent-neon-blue); text-decoration: none; font-weight: 600;">Xbox series X crashing playing ranked??</a>
                  <div style="font-size: 0.85rem; color: var(--text-muted); margin-top: 0.3rem;">
                    By <strong>Jack135790</strong> in <span class="badge badge-category">Call of Duty: Black Ops 6</span>
                  </div>
                </td>
                <td style="padding: 1rem; text-align: center; color: var(--accent-neon-blue); font-weight: 700;">0</td>
                <td style="padding: 1rem; text-align: center; color: var(--text-muted);">29</td>
                <td style="padding: 1rem; text-align: right; color: var(--text-muted); font-size: 0.9rem;">Friday 10:46 PM</td>
              </tr>
              <tr style="border-bottom: 1px solid var(--border-color); transition: all 0.3s ease;" onmouseover="this.style.backgroundColor='rgba(0, 212, 255, 0.05)'" onmouseout="this.style.backgroundColor='transparent'">
                <td style="padding: 1rem;">
                  <a href="{{ route('posts') }}" style="color: var(--accent-neon-blue); text-decoration: none; font-weight: 600;">BO6 keeps crashing while ranked</a>
                  <div style="font-size: 0.85rem; color: var(--text-muted); margin-top: 0.3rem;">
                    By <strong>codcodcod9348</strong> in <span class="badge badge-category red">Call of Duty: Black Ops 6</span>
                  </div>
                </td>
                <td style="padding: 1rem; text-align: center; color: var(--accent-neon-blue); font-weight: 700;">3</td>
                <td style="padding: 1rem; text-align: center; color: var(--text-muted);">780</td>
                <td style="padding: 1rem; text-align: right; color: var(--text-muted); font-size: 0.9rem;">Friday 10:43 PM</td>
              </tr>
              <tr style="border-bottom: 1px solid var(--border-color); transition: all 0.3s ease;" onmouseover="this.style.backgroundColor='rgba(0, 212, 255, 0.05)'" onmouseout="this.style.backgroundColor='transparent'">
                <td style="padding: 1rem;">
                  <a href="{{ route('posts') }}" style="color: var(--accent-neon-blue); text-decoration: none; font-weight: 600;">BO6 crashing series x</a>
                  <div style="font-size: 0.85rem; color: var(--text-muted); margin-top: 0.3rem;">
                    By <strong>digo</strong> in <span class="badge badge-category">Call of Duty: Black Ops 6</span>
                  </div>
                </td>
                <td style="padding: 1rem; text-align: center; color: var(--accent-neon-blue); font-weight: 700;">3</td>
                <td style="padding: 1rem; text-align: center; color: var(--text-muted);">1K</td>
                <td style="padding: 1rem; text-align: right; color: var(--text-muted); font-size: 0.9rem;">Friday 10:42 PM</td>
              </tr>
              <tr style="border-bottom: 1px solid var(--border-color); transition: all 0.3s ease;" onmouseover="this.style.backgroundColor='rgba(0, 212, 255, 0.05)'" onmouseout="this.style.backgroundColor='transparent'">
                <td style="padding: 1rem;">
                  <a href="{{ route('posts') }}" style="color: var(--accent-neon-blue); text-decoration: none; font-weight: 600;">CarlosX360 completes Call of Duty: Black Ops 6 and ending (2/2)</a>
                  <div style="font-size: 0.85rem; color: var(--text-muted); margin-top: 0.3rem;">
                    By <strong>Carlos</strong> in <span class="badge badge-category blue">Call of Duty Media</span>
                  </div>
                </td>
                <td style="padding: 1rem; text-align: center; color: var(--accent-neon-blue); font-weight: 700;">0</td>
                <td style="padding: 1rem; text-align: center; color: var(--text-muted);">41</td>
                <td style="padding: 1rem; text-align: right; color: var(--text-muted); font-size: 0.9rem;">Thursday 8:00 PM</td>
              </tr>
            </tbody>
          </table>
        </div>

        <!-- Pagination -->
        <nav aria-label="Page navigation" style="margin-top: 2rem;">
          <ul class="pagination justify-content-center">
            <li class="page-item"><a class="page-link" href="#" style="background-color: var(--secondary-dark); border-color: var(--border-color); color: var(--text-light);">1</a></li>
            <li class="page-item"><a class="page-link" href="#" style="background-color: var(--secondary-dark); border-color: var(--border-color); color: var(--text-light);">2</a></li>
            <li class="page-item"><a class="page-link" href="#" style="background-color: var(--secondary-dark); border-color: var(--border-color); color: var(--text-light);">3</a></li>
            <li class="page-item"><a class="page-link" href="#" style="background-color: var(--secondary-dark); border-color: var(--border-color); color: var(--text-light);">Next</a></li>
          </ul>
        </nav>
      </div>

      <!-- Sidebar -->
      <div class="col-lg-4">
        <div class="sidebar-section">
          <h3 class="sidebar-title">Categories</h3>
          <ul class="sidebar-list">
            <li><a href="#">Call of Duty <span class="badge badge-category blue">156</span></a></li>
            <li><a href="#">Valorant <span class="badge badge-category">89</span></a></li>
            <li><a href="#">Counter-Strike 2 <span class="badge badge-category red">234</span></a></li>
            <li><a href="#">Fortnite <span class="badge badge-category blue">167</span></a></li>
            <li><a href="#">Apex Legends <span class="badge badge-category">145</span></a></li>
            <li><a href="#">Warzone <span class="badge badge-category red">203</span></a></li>
          </ul>
        </div>

        <div class="sidebar-section">
          <h3 class="sidebar-title">Forum Stats</h3>
          <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1rem;">
            <div style="text-align: center; padding: 1rem; background-color: rgba(0, 212, 255, 0.05); border-radius: 6px;">
              <div style="font-size: 1.8rem; color: var(--accent-neon-blue); font-weight: 700;">2.4K</div>
              <div style="font-size: 0.85rem; color: var(--text-muted);">Total Posts</div>
            </div>
            <div style="text-align: center; padding: 1rem; background-color: rgba(179, 0, 255, 0.05); border-radius: 6px;">
              <div style="font-size: 1.8rem; color: var(--accent-neon-purple); font-weight: 700;">1.2K</div>
              <div style="font-size: 0.85rem; color: var(--text-muted);">Members</div>
            </div>
          </div>
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
