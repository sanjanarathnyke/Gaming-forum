<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Thread - GameVerse Forum</title>
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

        <div class="card">
            <div class="card-header">
                <h1 class="text-primary fw-bold mb-0">Edit Thread</h1>
            </div>
            <div class="card-body">
                <form action="{{ route('threads.update', $thread->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="title" class="form-label">Title</label>
                        <input type="text" class="form-control" id="title" name="title" value="{{ $thread->title }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="category_id" class="form-label">Category</label>
                        <select class="form-select" id="category_id" name="category_id" required>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}" {{ $thread->category_id == $category->id ? 'selected' : '' }}>
                                    {{ $category->category_name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea class="form-control" id="description" name="description" rows="5" required>{{ $thread->description }}</textarea>
                    </div>
                    <div class="mb-3">
                        <label for="image" class="form-label">Image</label>
                        @if ($thread->image)
                            <div class="mb-2">
                                <img src="{{ asset('storage/' . $thread->image) }}" alt="Current image" class="img-fluid rounded" style="max-height: 200px;">
                            </div>
                        @endif
                        <input type="file" class="form-control" id="image" name="image" accept="image/*">
                        <small class="text-muted">Leave empty to keep current image</small>
                    </div>
                    <div class="d-flex justify-content-end">
                        <a href="{{ route('profile') }}" class="btn btn-secondary me-2">Cancel</a>
                        <button type="submit" class="btn btn-primary-neon">Update Thread</button>
                    </div>
                </form>
            </div>
        </div>
    </main>

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
