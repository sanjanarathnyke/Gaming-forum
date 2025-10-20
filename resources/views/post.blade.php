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
    @include('header.header')

    <!-- Main Content -->
    <main class="container-lg py-5">
        <div class="row g-4">
            <!-- Post Content -->
            <div class="col-lg-8">
                <!-- Post Header -->
                <div class="card mb-4">
                    <div class="card-body">
                        <h1 class="card-title fs-2 mb-3">BO6 keeps crashing while ranked</h1>
                        <div class="d-flex gap-4 flex-wrap text-muted small">
                            <div>
                                <strong>By:</strong> codcodcod9348
                            </div>
                            <div>
                                <strong>Posted:</strong> Mar 31, 2025 at 2:45 PM
                            </div>
                            <div>
                                <span class="badge badge-category red">Call of Duty: Black Ops 6</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Post Image -->
                <img src="/placeholder.svg?height=400&width=800" alt="Post" class="img-fluid rounded mb-4 border">

                <!-- Post Content -->
                <div class="card mb-4">
                    <div class="card-body">
                        <p class="fs-5 lh-lg mb-3">
                            I've been experiencing constant crashes whenever I try to play ranked matches in Black Ops
                            6. The game runs fine in campaign and multiplayer, but as soon as I queue for ranked, it
                            crashes within 5-10 minutes. I've tried:
                        </p>
                        <ul class="fs-5 lh-lg mb-3">
                            <li>Updating my graphics drivers</li>
                            <li>Verifying game files</li>
                            <li>Lowering graphics settings</li>
                            <li>Reinstalling the game</li>
                        </ul>
                        <p class="fs-5 lh-lg">
                            Nothing seems to work. Has anyone else experienced this issue? Any suggestions would be
                            greatly appreciated!
                        </p>
                    </div>
                </div>

                <!-- Comments Section -->
                <h2 class="h4 fw-bold mb-4">Comments (3)</h2>

                <!-- Comment 1 -->
                <div class="card mb-3">
                    <div class="card-body">
                        <div class="d-flex gap-3 mb-3">
                            <img src="/placeholder.svg?height=50&width=50" alt="Avatar" class="rounded-circle"
                                style="width: 50px; height: 50px; object-fit: cover;">
                            <div class="flex-grow-1">
                                <div class="d-flex justify-content-between align-items-center">
                                    <h4 class="text-primary m-0">Jack135790</h4>
                                    <span class="text-muted small">2 hours ago</span>
                                </div>
                                <p class="text-muted small m-0">Verified Member</p>
                            </div>
                        </div>
                        <p class="m-0">Have you checked your system RAM? Sometimes ranked matches use more resources.
                            Also, try disabling any overlays like Discord or Xbox Game Bar.</p>
                    </div>
                </div>

                <!-- Comment 2 -->
                <div class="card mb-3">
                    <div class="card-body">
                        <div class="d-flex gap-3 mb-3">
                            <img src="/placeholder.svg?height=50&width=50" alt="Avatar" class="rounded-circle"
                                style="width: 50px; height: 50px; object-fit: cover;">
                            <div class="flex-grow-1">
                                <div class="d-flex justify-content-between align-items-center">
                                    <h4 class="text-primary m-0">ProPlayer99</h4>
                                    <span class="text-muted small">1 hour ago</span>
                                </div>
                                <p class="text-muted small m-0">Moderator</p>
                            </div>
                        </div>
                        <p class="m-0">This is a known issue with some Xbox Series X units. I'd recommend contacting
                            Activision support directly. They might have a specific fix for your hardware configuration.
                        </p>
                    </div>
                </div>

                <!-- Comment 3 -->
                <div class="card mb-4">
                    <div class="card-body">
                        <div class="d-flex gap-3 mb-3">
                            <img src="/placeholder.svg?height=50&width=50" alt="Avatar" class="rounded-circle"
                                style="width: 50px; height: 50px; object-fit: cover;">
                            <div class="flex-grow-1">
                                <div class="d-flex justify-content-between align-items-center">
                                    <h4 class="text-primary m-0">ShadowGamer</h4>
                                    <span class="text-muted small">30 minutes ago</span>
                                </div>
                                <p class="text-muted small m-0">Community Member</p>
                            </div>
                        </div>
                        <p class="m-0">Try clearing your console cache. Hold the power button for 10 seconds to fully
                            power down, then unplug for 30 seconds. This fixed it for me!</p>
                    </div>
                </div>

                <!-- Add Comment Form -->
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title m-0">Add a Comment</h3>
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
                    <div class="d-grid gap-2">
                        <div>
                            <div class="text-muted small">Views</div>
                            <div class="fw-bold fs-5">780</div>
                        </div>
                        <div>
                            <div class="text-muted small">Replies</div>
                            <div class="fw-bold fs-5">3</div>
                        </div>
                        <div>
                            <div class="text-muted small">Category</div>
                            <div class="mt-1"><span class="badge badge-category red">Call of Duty: Black Ops 6</span>
                            </div>
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
    @include('footer.footer')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
