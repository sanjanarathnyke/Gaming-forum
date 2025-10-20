<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Forums - GameVerse</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('asset/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('asset/css/forum.css') }}">
</head>

<body>
    <!-- Navbar -->
    @include('header.header')

    <!-- Page Header -->
    <section class="bg-light" style="border-bottom: 2px solid var(--border-color); padding: 2rem 0;">
        <div class="container-lg">
            <h1 style="color: var(--text-dark); font-weight: 700; margin-bottom: 0.5rem;">All Forums</h1>
            <p style="color: var(--text-muted);">Browse all active discussions and join the conversation</p>
        </div>
    </section>

    <!-- Main Content -->
    <main class="container-lg py-5">
        <div class="row g-4">
            <!-- Forum Threads -->
            <div class="col-lg-8">
                <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 2rem;">
                    <h2 style="color: var(--text-dark); font-weight: 700; margin: 0;">Recent Threads</h2>
                    <button class="btn btn-primary-neon" data-bs-toggle="modal" data-bs-target="#createPostModal"
                        style="font-size: 0.9rem; padding: 0.6rem 1.5rem;">+ Create Post</button>
                </div>

                <!-- Thread Table -->
                <div style="overflow-x: auto;">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">Thread Title</th>
                                <th scope="col" class="text-center">Replies</th>
                                <th scope="col" class="text-center">Views</th>
                                <th scope="col" class="text-end">Last Activity</th>
                            </tr>
                        </thead>
                        <tbody id="threadTableBody">
                            @foreach ($forum as $thread)
                                @php
                                    // Dynamic color palette for gaming categories
                                    $colors = [
                                        ['bg' => '#ff4500', 'text' => 'white'], // Battle Orange (COD style)
                                        ['bg' => '#dc143c', 'text' => 'white'], // Crimson Red (Blood/Combat)
                                        ['bg' => '#1a1a2e', 'text' => 'white'], // Dark Navy (Tactical)
                                        ['bg' => '#7b2cbf', 'text' => 'white'], // Dark Purple (Fortnite)
                                        ['bg' => '#00ff41', 'text' => '#000000'], // Neon Green (Cyberpunk)
                                        ['bg' => '#2d4a2b', 'text' => 'white'], // Military Green (Warzone)
                                        ['bg' => '#0abab5', 'text' => 'white'], // Electric Cyan (Valorant)
                                        ['bg' => '#1e3a8a', 'text' => 'white'], // Deep Blue (CS2)
                                        ['bg' => '#c41e3a', 'text' => 'white'], // Blood Red (Apex)
                                        ['bg' => '#4a148c', 'text' => 'white'], // Royal Purple (Epic)
                                        ['bg' => '#ff6b00', 'text' => 'white'], // Fire Orange (Overwatch)
                                        ['bg' => '#00ffff', 'text' => '#000000'], // Bright Cyan (Tron style)
                                        ['bg' => '#8b0000', 'text' => 'white'], // Dark Blood Red (Doom)
                                        ['bg' => '#2c3e50', 'text' => 'white'], // Steel Gray (Titanfall)
                                        ['bg' => '#ffd700', 'text' => '#000000'], // Gold (Victory/Legendary)
                                        ['bg' => '#6a0dad', 'text' => 'white'], // Deep Violet (Magic/Fantasy)
                                        ['bg' => '#228b22', 'text' => 'white'], // Forest Green (Survival)
                                        ['bg' => '#b22222', 'text' => 'white'], // Firebrick Red (Fire/Explosions)
                                        ['bg' => '#4169e1', 'text' => 'white'], // Royal Blue (Sonic/Speed)
                                        ['bg' => '#ff1493', 'text' => 'white'], // Hot Pink (Neon/Cyberpunk)
                                    ];





                                    
                                    // Generate consistent color index based on category ID
                                    $colorIndex = $thread->category->id % count($colors);
                                    $categoryColor = $colors[$colorIndex];
                                @endphp
                                <tr>
                                    <td>
                                        <a href="{{ route('posts') }}" class="text-decoration-none fw-bold">{{ $thread->title }}</a>
                                        <div style="font-size: 0.85rem; color: var(--text-muted); margin-top: 0.3rem;">
                                            By <strong>{{ $thread->username ?? 'DemoUser' }}</strong> in
                                            <span
                                                style="background-color: {{ $categoryColor['bg'] }}; color: {{ $categoryColor['text'] }}; padding: 0.35rem 0.8rem; border-radius: 6px; font-size: 0.8rem; font-weight: 600; display: inline-block; border: none;">
                                                {{ $thread->category->category_name }}
                                            </span>
                                        </div>
                                    </td>
                                    <td class="text-center">{{ $thread->replies ?? 0 }}</td>
                                    <td class="text-center">{{ $thread->views ?? 0 }}</td>
                                    <td class="text-end">
                                        {{ $thread->last_activity ?? $thread->created_at->format('l h:i A') }}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>


                <!-- Pagination -->
                <nav aria-label="Page navigation" style="margin-top: 2rem;">
                    <ul class="pagination justify-content-center">
                        <li class="page-item"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item"><a class="page-link" href="#">Next</a></li>
                    </ul>
                </nav>
            </div>

            <!-- Sidebar -->
            <div class="col-lg-4">
                <!-- Categories Section -->
                <div class="sidebar-section">
                    <h3 class="sidebar-title">Categories</h3>
                    <ul class="sidebar-list">
                        @foreach ($categories as $category)
                            <li>
                                <a href="#">
                                    {{ $category->category_name }}
                                    <span class="badge badge-category {{ $loop->odd ? 'blue' : 'red' }}">
                                        {{ $category->threads_count }}
                                    </span>
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>

                <!-- Forum Stats -->
                <div class="sidebar-section">
                    <h3 class="sidebar-title">Forum Stats</h3>
                    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1rem;">
                        <div
                            style="text-align: center; padding: 1rem; background-color: var(--secondary-light); border-radius: 6px;">
                            <div style="font-size: 1.8rem; color: var(--accent-primary); font-weight: 700;">
                                {{ number_format($total_threads) }}
                            </div>
                            <div style="font-size: 0.85rem; color: var(--text-muted);">Total Posts</div>
                        </div>
                        <div
                            style="text-align: center; padding: 1rem; background-color: var(--secondary-light); border-radius: 6px;">
                            <div style="font-size: 1.8rem; color: var(--accent-primary); font-weight: 700;">
                                {{ number_format($total_members) }}
                            </div>
                            <div style="font-size: 0.85rem; color: var(--text-muted);">Members</div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </main>

    <!-- Create Post Modal -->
    <div class="modal fade" id="createPostModal" tabindex="-1" aria-labelledby="createPostModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title" id="createPostModalLabel">Create New Post</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <form id="createPostForm" enctype="multipart/form-data">
                        @csrf

                        <!-- Image Upload -->
                        <div class="mb-4">
                            <label class="form-label">Post Image (Optional)</label>
                            <input type="file" id="postImage" name="image" class="form-control" accept="image/*">
                        </div>

                        <!-- Title -->
                        <div class="mb-4">
                            <label for="postTitle" class="form-label">Post Title <span
                                    style="color: #dc2626;">*</span></label>
                            <input type="text" class="form-control" id="postTitle" name="title"
                                placeholder="Enter a descriptive title for your post" required>
                        </div>

                        <!-- Category -->
                        <div class="mb-4">
                            <label for="postCategory" class="form-label">Category <span
                                    style="color: #dc2626;">*</span></label>
                            <select class="form-select" id="postCategory" name="category_id" required>
                                <option value="" disabled selected>Select a category</option>
                                @foreach ($categories as $cat)
                                    <option value="{{ $cat->id }}">{{ $cat->category_name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Description -->
                        <div class="mb-4">
                            <label for="postDescription" class="form-label">Description <span
                                    style="color: #dc2626;">*</span></label>
                            <textarea class="form-control" id="postDescription" name="description" rows="6"
                                placeholder="Write your post content here..." maxlength="5000" required></textarea>
                            <div style="font-size: 0.85rem; color: gray; margin-top: 0.5rem;">
                                <span id="charCount">0</span> / 5000 characters
                            </div>
                        </div>
                    </form>
                </div>

                <div class="modal-footer" style="border-top: 2px solid #ddd; padding: 1.5rem;">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-primary" id="submitPost"
                        data-url="{{ route('threads.store') }}">Create Post</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    @include('footer.footer')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('asset/js/threads_toast.js') }}"></script>
</body>

</html>
