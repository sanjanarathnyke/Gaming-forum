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
                                <th scope="col" class="text-end">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <a href="{{ route('posts') }}" class="text-decoration-none fw-bold">Download and pre
                                        load BF6</a>
                                    <div style="font-size: 0.85rem; color: var(--text-muted); margin-top: 0.3rem;">
                                        By <strong>ODark30</strong> in <span class="badge badge-category blue">Video
                                            Games</span>
                                    </div>
                                </td>
                                <td class="text-center">24</td>
                                <td class="text-center">411</td>
                                <td class="text-end">Friday 10:01 AM</td>
                            </tr>
                            <tr>
                                <td>
                                    <a href="{{ route('posts') }}" class="text-decoration-none fw-bold">Xbox series X
                                        crashing playing ranked??</a>
                                    <div style="font-size: 0.85rem; color: var(--text-muted); margin-top: 0.3rem;">
                                        By <strong>Jack135790</strong> in <span class="badge badge-category">Call of
                                            Duty: Black Ops 6</span>
                                    </div>
                                </td>
                                <td class="text-center">0</td>
                                <td class="text-center">29</td>
                                <td class="text-end">Friday 10:46 PM</td>
                            </tr>
                            <tr>
                                <td>
                                    <a href="{{ route('posts') }}" class="text-decoration-none fw-bold">BO6 keeps
                                        crashing while ranked</a>
                                    <div style="font-size: 0.85rem; color: var(--text-muted); margin-top: 0.3rem;">
                                        By <strong>codcodcod9348</strong> in <span class="badge badge-category red">Call
                                            of Duty: Black Ops 6</span>
                                    </div>
                                </td>
                                <td class="text-center">3</td>
                                <td class="text-center">780</td>
                                <td class="text-end">Friday 10:43 PM</td>
                            </tr>
                            <tr>
                                <td>
                                    <a href="{{ route('posts') }}" class="text-decoration-none fw-bold">BO6 crashing
                                        series x</a>
                                    <div style="font-size: 0.85rem; color: var(--text-muted); margin-top: 0.3rem;">
                                        By <strong>digo</strong> in <span class="badge badge-category">Call of Duty:
                                            Black Ops 6</span>
                                    </div>
                                </td>
                                <td class="text-center">3</td>
                                <td class="text-center">1K</td>
                                <td class="text-end">Friday 10:42 PM</td>
                            </tr>
                            <tr>
                                <td>
                                    <a href="{{ route('posts') }}" class="text-decoration-none fw-bold">CarlosX360
                                        completes Call of Duty: Black Ops 6 and ending (2/2)</a>
                                    <div style="font-size: 0.85rem; color: var(--text-muted); margin-top: 0.3rem;">
                                        By <strong>Carlos</strong> in <span class="badge badge-category blue">Call of
                                            Duty Media</span>
                                    </div>
                                </td>
                                <td class="text-center">0</td>
                                <td class="text-center">41</td>
                                <td class="text-end">Thursday 8:00 PM</td>
                            </tr>
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
                <div class="sidebar-section">
                    <h3 class="sidebar-title">Categories</h3>
                    <ul class="sidebar-list">
                        <li><a href="#">Call of Duty <span class="badge badge-category blue">156</span></a></li>
                        <li><a href="#">Valorant <span class="badge badge-category">89</span></a></li>
                        <li><a href="#">Counter-Strike 2 <span class="badge badge-category red">234</span></a>
                        </li>
                        <li><a href="#">Fortnite <span class="badge badge-category blue">167</span></a></li>
                        <li><a href="#">Apex Legends <span class="badge badge-category">145</span></a></li>
                        <li><a href="#">Warzone <span class="badge badge-category red">203</span></a></li>
                    </ul>
                </div>

                <div class="sidebar-section">
                    <h3 class="sidebar-title">Forum Stats</h3>
                    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1rem;">
                        <div
                            style="text-align: center; padding: 1rem; background-color: var(--secondary-light); border-radius: 6px;">
                            <div style="font-size: 1.8rem; color: var(--accent-primary); font-weight: 700;">2.4K</div>
                            <div style="font-size: 0.85rem; color: var(--text-muted);">Total Posts</div>
                        </div>
                        <div
                            style="text-align: center; padding: 1rem; background-color: var(--secondary-light); border-radius: 6px;">
                            <div style="font-size: 1.8rem; color: var(--accent-primary); font-weight: 700;">1.2K</div>
                            <div style="font-size: 0.85rem; color: var(--text-muted);">Members</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <!-- Create Post Modal -->


<!-- Create Post Modal -->
<div class="modal fade" id="createPostModal" tabindex="-1" aria-labelledby="createPostModalLabel" aria-hidden="true">
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
                        <label for="postTitle" class="form-label">Post Title <span style="color: #dc2626;">*</span></label>
                        <input type="text" class="form-control" id="postTitle" name="title"
                               placeholder="Enter a descriptive title for your post" required>
                    </div>

                    <!-- Category -->
                    <div class="mb-4">
                        <label for="postCategory" class="form-label">Category <span style="color: #dc2626;">*</span></label>
                        <select class="form-select" id="postCategory" name="category_id" required>
                            <option value="" disabled selected>Select a category</option>
                            @foreach($categories as $cat)
                                <option value="{{ $cat->id }}">{{ $cat->category_name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Description -->
                    <div class="mb-4">
                        <label for="postDescription" class="form-label">Description <span style="color: #dc2626;">*</span></label>
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
                <button type="button" class="btn btn-primary" id="submitPost" data-url="{{ route('threads.store') }}">Create Post</button>
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
