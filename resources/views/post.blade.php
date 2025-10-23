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
                        <h1 class="card-title fs-2 mb-3">{{ $forum->title }}</h1>
                        <div class="d-flex gap-4 flex-wrap text-muted small">
                            <div><strong>By:</strong> {{ $forum->username ?? 'DemoUser' }}</div>
                            <div><strong>Posted:</strong> {{ $forum->created_at->format('M d, Y h:i A') }}</div>
                            <div><span class="badge badge-category">{{ $forum->category->category_name }}</span></div>
                        </div>
                    </div>
                </div>

                <!-- Post Image -->
                @if ($forum->image)
                    <img src="{{ asset('storage/' . $forum->image) }}" alt="{{ $forum->title }}"
                        class="img-fluid rounded mb-4 border">
                @endif

                <!-- Post Content -->
                <div class="card mb-4">
                    <div class="card-body">
                        <p>{!! nl2br(e($forum->description)) !!}</p>
                    </div>
                </div>

                <!-- Comments Section -->
                <h2 class="h4 fw-bold mb-4">Comments ({{ $forum->comments->count() }})</h2>

                @foreach ($forum->comments as $comment)
                    <div class="card mb-3">
                        <div class="card-body">
                            <div class="d-flex gap-3 mb-3">
                                <img src="{{ $comment->user_image ? asset('storage/' . $comment->user_image) : '/placeholder.svg?height=50&width=50' }}" alt="Avatar" class="rounded-circle"
                                    style="width: 50px; height: 50px; object-fit: cover;">
                                <div class="flex-grow-1">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <h4 class="text-primary m-0">{{ $comment->username ?? 'Anonymous' }}</h4>
                                        <span class="text-muted small">{{ $comment->created_at->diffForHumans() }}</span>
                                    </div>
                                    <p class="text-muted small m-0">{{ $comment->user->name ?? 'Guest User' }}</p>
                                </div>
                            </div>
                            <p class="m-0">{{ $comment->comment_text }}</p>
                        </div>
                    </div>
                @endforeach

                <!-- Add Comment Form -->
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title m-0">Add a Comment</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('comments.store') }}?thread_id={{ $forum->id }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="comment" class="form-label">Your Comment</label>
                                <textarea class="form-control" id="comment" name="comment_text" rows="5"
                                    placeholder="Share your thoughts or solutions..."></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary-neon">Post Comment</button>
                        </form>
                    </div>
                </div>


            </div>

            <!-- Sidebar -->
            <div class="col-lg-4">
                <div class="sidebar-section mb-4">
                    <img src="{{ asset('storage/stock-images/img1.jpg') }}" alt="Gaming Image 1" class="img-fluid rounded w-100">
                </div>

                <div class="sidebar-section mb-4">
                    <img src="{{ asset('storage/stock-images/img2.jpg') }}" alt="Gaming Image 2" class="img-fluid rounded w-100">
                </div>

                <div class="sidebar-section mb-4">
                    <img src="{{ asset('storage/stock-images/img3.jpg') }}" alt="Gaming Image 3" class="img-fluid rounded w-100">
                </div>

                <div class="sidebar-section">
                    <img src="{{ asset('storage/stock-images/img4.jpg') }}" alt="Gaming Image 4" class="img-fluid rounded w-100">
                </div>
            </div>
        </div>
    </main>

    <!-- Footer -->
    @include('footer.footer')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
