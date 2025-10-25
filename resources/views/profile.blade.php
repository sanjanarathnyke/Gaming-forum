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
        <!-- Success/Error Messages -->
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        @if (session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <!-- Profile Header -->
        <div class="card mb-4">
            <div class="card-body p-4">
                <div class="d-flex flex-wrap gap-4 align-items-start">
                    <img src="{{ $user->user_image ? asset('storage/' . $user->user_image) : '/placeholder.svg?height=150&width=150' }}" 
                        alt="{{ $user->name }}" class="rounded-circle"
                        style="width: 150px; height: 150px; object-fit: cover; border: 3px solid var(--accent-primary);">
                    <div class="flex-grow-1">
                        <h1 class="text-primary fw-bold mb-1">{{ $user->name }}</h1>
                        <p class="text-muted mb-3">Member • Joined {{ $user->created_at->format('M d, Y') }}</p>
                        <p class="mb-3">{{ $user->email }}</p>
                        <div class="d-flex gap-4 flex-wrap mb-3">
                            <div>
                                <div class="text-muted small">Posts</div>
                                <div class="fw-bold fs-5">{{ $threads->count() }}</div>
                            </div>
                            <div>
                                <div class="text-muted small">Comments</div>
                                <div class="fw-bold fs-5">{{ $comments->count() }}</div>
                            </div>
                        </div>
                        <button class="btn btn-secondary-neon" data-bs-toggle="modal" data-bs-target="#editProfileModal">Edit Profile</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Tabs -->
        <div class="row g-4">
            <div class="col-lg-8">
                <!-- Tab Navigation -->
                <ul class="nav nav-tabs mb-4" id="profileTabs" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="posts-tab" data-bs-toggle="tab" data-bs-target="#posts" 
                            type="button" role="tab" aria-controls="posts" aria-selected="true">
                            My Posts ({{ $threads->count() }})
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="comments-tab" data-bs-toggle="tab" data-bs-target="#comments" 
                            type="button" role="tab" aria-controls="comments" aria-selected="false">
                            My Comments ({{ $comments->count() }})
                        </button>
                    </li>
                </ul>

                <div class="tab-content" id="profileTabsContent">
                    <!-- My Posts Tab -->
                    <div class="tab-pane fade show active" id="posts" role="tabpanel" aria-labelledby="posts-tab">
                        @forelse ($threads as $thread)
                            <div class="post-card mb-3">
                                @if ($thread->image)
                                    <img src="{{ asset('storage/' . $thread->image) }}" alt="{{ $thread->title }}" class="post-card-image">
                                @else
                                    <img src="/placeholder.svg?height=80&width=80" alt="Post" class="post-card-image">
                                @endif
                                <div class="post-card-content">
                                    <h3 class="post-card-title">
                                        <a href="{{ route('threads.show', $thread->id) }}" class="text-decoration-none">
                                            {{ $thread->title }}
                                        </a>
                                    </h3>
                                    <div class="post-card-meta">
                                        <span>Posted {{ $thread->created_at->diffForHumans() }}</span>
                                        <span class="badge badge-category">{{ $thread->category->category_name }}</span>
                                    </div>
                                    <p class="card-text mt-2">{{ Str::limit($thread->description, 150) }}</p>
                                    <div class="post-card-stats">
                                        <div class="stat-item">
                                            <span class="stat-label">Replies</span>
                                            <span class="stat-value">{{ $thread->comments->count() }}</span>
                                        </div>
                                    </div>
                                    <div class="mt-3">
                                        <a href="{{ route('threads.show', $thread->id) }}" class="btn btn-sm btn-secondary-neon">View</a>
                                        <a href="{{ route('threads.edit', $thread->id) }}" class="btn btn-sm btn-primary-neon">Edit</a>
                                        <button type="button" class="btn btn-sm btn-danger" 
                                            data-bs-toggle="modal" 
                                            data-bs-target="#deleteThreadModal{{ $thread->id }}">
                                            Delete
                                        </button>
                                    </div>
                                </div>
                            </div>

                            <!-- Delete Thread Modal -->
                            <div class="modal fade" id="deleteThreadModal{{ $thread->id }}" tabindex="-1" aria-labelledby="deleteThreadModalLabel{{ $thread->id }}" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="deleteThreadModalLabel{{ $thread->id }}">Confirm Delete</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <p>Are you sure you want to delete this thread?</p>
                                            <p class="text-muted mb-0"><strong>{{ $thread->title }}</strong></p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                            <form action="{{ route('profile.thread.delete', $thread->id) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">Delete Thread</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <div class="alert alert-info">
                                You haven't created any posts yet.
                            </div>
                        @endforelse
                    </div>

                    <!-- My Comments Tab -->
                    <div class="tab-pane fade" id="comments" role="tabpanel" aria-labelledby="comments-tab">
                        @forelse ($comments as $comment)
                            <div class="card mb-3">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between align-items-start mb-2">
                                        <div>
                                            <h5 class="mb-1">
                                                <a href="{{ route('threads.show', $comment->thread_id) }}" class="text-decoration-none">
                                                    On: {{ $comment->thread->title }}
                                                </a>
                                            </h5>
                                            <small class="text-muted">{{ $comment->created_at->diffForHumans() }}</small>
                                        </div>
                                        <div>
                                            <button type="button" class="btn btn-sm btn-primary-neon" 
                                                data-bs-toggle="modal" 
                                                data-bs-target="#editCommentModal{{ $comment->id }}">
                                                Edit
                                            </button>
                                            <button type="button" class="btn btn-sm btn-danger" 
                                                data-bs-toggle="modal" 
                                                data-bs-target="#deleteCommentModal{{ $comment->id }}">
                                                Delete
                                            </button>
                                        </div>
                                    </div>
                                    <p class="mb-0">{{ $comment->comment_text }}</p>
                                </div>
                            </div>

                            <!-- Edit Comment Modal -->
                            <div class="modal fade" id="editCommentModal{{ $comment->id }}" tabindex="-1" aria-labelledby="editCommentModalLabel{{ $comment->id }}" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="editCommentModalLabel{{ $comment->id }}">Edit Comment</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <form action="{{ route('profile.comment.update', $comment->id) }}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <div class="modal-body">
                                                <div class="mb-3">
                                                    <label for="comment_text{{ $comment->id }}" class="form-label">Comment</label>
                                                    <textarea class="form-control" id="comment_text{{ $comment->id }}" name="comment_text" rows="4" required>{{ $comment->comment_text }}</textarea>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                                <button type="submit" class="btn btn-primary-neon">Save Changes</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                            <!-- Delete Comment Modal -->
                            <div class="modal fade" id="deleteCommentModal{{ $comment->id }}" tabindex="-1" aria-labelledby="deleteCommentModalLabel{{ $comment->id }}" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="deleteCommentModalLabel{{ $comment->id }}">Confirm Delete</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <p>Are you sure you want to delete this comment?</p>
                                            <p class="text-muted mb-0"><em>"{{ Str::limit($comment->comment_text, 100) }}"</em></p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                            <form action="{{ route('profile.comment.delete', $comment->id) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">Delete Comment</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <div class="alert alert-info">
                                You haven't made any comments yet.
                            </div>
                        @endforelse
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

    <!-- Edit Profile Modal -->
    <div class="modal fade" id="editProfileModal" tabindex="-1" aria-labelledby="editProfileModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editProfileModalLabel">Edit Profile</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="name" class="form-label">Username</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}" required>
                        </div>
                        
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email" value="{{ $user->email }}" required>
                        </div>
                        
                        <div class="mb-3">
                            <label for="user_image" class="form-label">Profile Image</label>
                            @if($user->user_image)
                                <div class="mb-2">
                                    <img src="{{ asset('storage/' . $user->user_image) }}" alt="Current profile image" 
                                        class="rounded" style="width: 100px; height: 100px; object-fit: cover;">
                                </div>
                            @endif
                            <input type="file" class="form-control" id="user_image" name="user_image" accept="image/*">
                            <small class="text-muted">Leave empty to keep current image</small>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary-neon">Save Changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Footer -->
    @include('footer.footer')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Auto-dismiss alerts after 5 seconds
        document.addEventListener('DOMContentLoaded', function() {
            const alerts = document.querySelectorAll('.alert');
            alerts.forEach(function(alert) {
                setTimeout(function() {
                    const bsAlert = new bootstrap.Alert(alert);
                    bsAlert.close();
                }, 5000);
            });
        });
    </script>
</body>

</html>
