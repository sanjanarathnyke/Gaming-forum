<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile - GameVerse Forum</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('asset/css/style.css') }}">
</head>

<body>
    <!-- Navbar -->
    @include('header.header')

    <!-- Main Content -->
    <main class="container-lg py-5">
        <!-- Profile Header -->
        <div class="card mb-4">
            <div class="card-body p-4">
                <div class="d-flex flex-wrap gap-4 align-items-start">
                    <img src="/placeholder.svg?height=150&width=150" alt="Profile" class="rounded-circle"
                        style="width: 150px; height: 150px; object-fit: cover; border: 3px solid var(--accent-primary);">
                    <div class="flex-grow-1">
                        <h1 class="text-primary fw-bold mb-1">ShadowGamer</h1>
                        <p class="text-muted mb-3">Verified Member • Joined 2 years ago</p>
                        <p class="mb-3">Passionate gamer and competitive player. Love discussing strategies and
                            sharing gaming tips with the community.</p>
                        <div class="d-flex gap-4 flex-wrap mb-3">
                            <div>
                                <div class="text-muted small">Posts</div>
                                <div class="fw-bold fs-5">247</div>
                            </div>
                            <div>
                                <div class="text-muted small">Comments</div>
                                <div class="fw-bold fs-5">892</div>
                            </div>
                            <div>
                                <div class="text-muted small">Reputation</div>
                                <div class="fw-bold fs-5">4.8/5</div>
                            </div>
                        </div>
                        <button class="btn btn-secondary-neon">Edit Profile</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Tabs -->
        <div class="row g-4">
            <div class="col-lg-8">
                <!-- Tab Navigation -->
                <ul class="nav nav-tabs mb-4">
                    <li class="nav-item">
                        <a class="nav-link active" href="#">My Posts</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">My Comments</a>
                    </li>
                </ul>

                <!-- My Posts -->
                <h2 class="h4 fw-bold mb-3">My Posts (12)</h2>

                <div class="post-card">
                    <img src="/placeholder.svg?height=80&width=80" alt="Post" class="post-card-image">
                    <div class="post-card-content">
                        <h3 class="post-card-title">Best Loadouts for Competitive Play</h3>
                        <div class="post-card-meta">
                            <span>Posted 3 days ago</span>
                            <span class="badge badge-category blue">Call of Duty</span>
                        </div>
                        <p class="card-text mt-2">Here are my recommended loadouts for competitive ranked matches...</p>
                        <div class="post-card-stats">
                            <div class="stat-item">
                                <span class="stat-label">Replies</span>
                                <span class="stat-value">18</span>
                            </div>
                            <div class="stat-item">
                                <span class="stat-label">Views</span>
                                <span class="stat-value">342</span>
                            </div>
                        </div>
                        <div class="mt-3">
                            <button class="btn btn-sm btn-secondary-neon">Edit</button>
                            <button class="btn btn-sm btn-secondary-neon">Delete</button>
                        </div>
                    </div>
                </div>

                <div class="post-card">
                    <img src="/placeholder.svg?height=80&width=80" alt="Post" class="post-card-image">
                    <div class="post-card-content">
                        <h3 class="post-card-title">Esports Championship 2025 - Teams to Watch</h3>
                        <div class="post-card-meta">
                            <span>Posted 1 week ago</span>
                            <span class="badge badge-category">Esports</span>
                        </div>
                        <p class="card-text mt-2">As we head into the championship season, let's break down the top
                            teams...</p>
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
                        <div class="mt-3">
                            <button class="btn btn-sm btn-secondary-neon">Edit</button>
                            <button class="btn btn-sm btn-secondary-neon">Delete</button>
                        </div>
                    </div>
                </div>

                <div class="post-card">
                    <img src="/placeholder.svg?height=80&width=80" alt="Post" class="post-card-image">
                    <div class="post-card-content">
                        <h3 class="post-card-title">Multiplayer Meta Shift - New Weapon Balance</h3>
                        <div class="post-card-meta">
                            <span>Posted 2 weeks ago</span>
                            <span class="badge badge-category red">Multiplayer</span>
                        </div>
                        <p class="card-text mt-2">The latest patch has completely changed the multiplayer landscape...
                        </p>
                        <div class="post-card-stats">
                            <div class="stat-item">
                                <span class="stat-label">Replies</span>
                                <span class="stat-value">28</span>
                            </div>
                            <div class="stat-item">
                                <span class="stat-label">Views</span>
                                <span class="stat-value">567</span>
                            </div>
                        </div>
                        <div class="mt-3">
                            <button class="btn btn-sm btn-secondary-neon">Edit</button>
                            <button class="btn btn-sm btn-secondary-neon">Delete</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Sidebar -->
            <div class="col-lg-4">
                <div class="sidebar-section">
                    <h3 class="sidebar-title">Account Stats</h3>
                    <div class="d-grid gap-2">
                        <div>
                            <div class="text-muted small">Member Since</div>
                            <div class="fw-bold">January 15, 2023</div>
                        </div>
                        <div>
                            <div class="text-muted small">Last Active</div>
                            <div class="fw-bold">2 hours ago</div>
                        </div>
                        <div>
                            <div class="text-muted small">Status</div>
                            <div class="text-primary fw-bold">Online</div>
                        </div>
                    </div>
                </div>

                <div class="sidebar-section">
                    <h3 class="sidebar-title">Achievements</h3>
                    <div class="row row-cols-2 g-2">
                        <div class="col text-center">
                            <div class="p-3 bg-light rounded">
                                <div class="fs-4 mb-1">🏆</div>
                                <div class="small text-muted">Top Contributor</div>
                            </div>
                        </div>
                        <div class="col text-center">
                            <div class="p-3 bg-light rounded">
                                <div class="fs-4 mb-1">⭐</div>
                                <div class="small text-muted">Verified Member</div>
                            </div>
                        </div>
                        <div class="col text-center">
                            <div class="p-3 bg-light rounded">
                                <div class="fs-4 mb-1">🎯</div>
                                <div class="small text-muted">100 Posts</div>
                            </div>
                        </div>
                        <div class="col text-center">
                            <div class="p-3 bg-light rounded">
                                <div class="fs-4 mb-1">🔥</div>
                                <div class="small text-muted">Streak Master</div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="sidebar-section">
                    <h3 class="sidebar-title">Quick Actions</h3>
                    <button class="btn btn-secondary-neon w-100 mb-2">Settings</button>
                    <button class="btn btn-secondary-neon w-100">Logout</button>
                </div>
            </div>
        </div>
    </main>

    <!-- Footer -->
    @include('footer.footer')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
