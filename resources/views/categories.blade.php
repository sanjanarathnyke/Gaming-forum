<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Categories Admin - GameVerse</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('asset/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('asset/css/category.css') }}">
</head>

<body>
    <!-- Navbar -->
    @include('header.header')

    <!-- Page Header -->
    <section class="bg-light" style="border-bottom: 2px solid var(--border-color); padding: 2rem 0;">
        <div class="container-lg">
            <h1 class="text-dark fw-bold mb-2">Categories Management</h1>
            <p class="text-muted">Admin dashboard for managing forum categories</p>
        </div>
    </section>

    <!-- Main Content -->
    <main class="container-lg py-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="text-dark fw-bold m-0">All Categories</h2>
            <button class="btn btn-primary-neon" data-bs-toggle="modal" data-bs-target="#addCategoryModal">
                + Add Category
            </button>
        </div>

        <!-- Categories Table -->
        <div class="card">
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">Category Name</th>
                            <th scope="col" class="text-center">Description</th>
                            <th scope="col" class="text-end">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($categories as $category)
                            <tr>
                                <td>
                                    <div class="fw-bold">{{ $category->category_name }}</div>
                                </td>
                                <td class="text-center text-muted">{{ $category->description ?? '—' }}</td>
                                <td class="text-end">
                                    <button class="btn btn-sm btn-edit" data-bs-toggle="modal"
                                        data-bs-target="#editCategoryModal"
                                        onclick="editCategory({{ $category->id }}, '{{ $category->category_name }}', '{{ $category->description }}')">Edit</button>
                                    <button class="btn btn-sm btn-delete" onclick="deleteCategory({{ $category->id }})">
                                        Delete
                                    </button>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="3" class="text-center text-muted">No categories found.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Stats Section -->
        <div class="row mt-4">
            <div class="col-md-4">
                <div class="card text-center">
                    <div class="card-body">
                        <h3 class="card-title">{{ $total_categories }}</h3>
                        <p class="card-text text-muted">Total Categories</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card text-center">
                    <div class="card-body">
                        <h3 class="card-title">{{ $total_threads }}</h3>
                        <p class="card-text text-muted">Total Posts</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card text-center">
                    <div class="card-body">
                        <h3 class="card-title">645</h3>
                        <p class="card-text text-muted">Active Members</p>
                    </div>
                </div>
            </div>
        </div>
    </main>


    <!-- Add Category Modal -->
    <div class="modal fade" id="addCategoryModal" tabindex="-1" aria-labelledby="addCategoryModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form id="addCategoryForm">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="addCategoryModalLabel">Add New Category</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="categoryName" class="form-label fw-bold">Category Name</label>
                            <input type="text" id="categoryName" class="form-control" name="category_name"
                                placeholder="Enter category name" required>
                        </div>
                        <div class="mb-3">
                            <label for="categoryDescription" class="form-label fw-bold">Description</label>
                            <textarea id="categoryDescription" class="form-control" name="description" rows="3" maxlength="255"
                                placeholder="Enter description" required></textarea>
                            <small class="text-muted"><span id="addCharCount">0</span>/255 characters</small>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="button" id="submitCategory" class="btn btn-primary"
                            data-url="{{ route('categories.store') }}">
                            Add Category
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Edit Category Modal -->
    <div class="modal fade" id="editCategoryModal" tabindex="-1" aria-labelledby="editCategoryModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Category</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <form id="editCategoryForm">
                        @csrf
                        @method('PUT')
                        <input type="hidden" id="editCategoryId">

                        <div class="mb-3">
                            <label class="form-label">Category Name</label>
                            <input type="text" id="editCategoryName" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Description</label>
                            <textarea id="editCategoryDescription" class="form-control" rows="3" required></textarea>
                        </div>
                    </form>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-success" id="updateCategoryBtn">Update</button>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{ asset('asset/js/edit-delete_toast.js') }}"></script>

    <!-- Footer -->
    @include('footer.footer')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('asset/js/category_toast.js') }}"></script>
</body>

</html>
