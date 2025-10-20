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
            <button class="btn btn-primary-neon" data-bs-toggle="modal" data-bs-target="#addCategoryModal">+ Add
                Category</button>
        </div>

        <!-- Categories Table -->
        <div class="card">
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">Category Name</th>
                            <th scope="col" class="text-center">Description</th>
                            <th scope="col" class="text-center">Posts</th>
                            <th scope="col" class="text-center">Members</th>
                            <th scope="col" class="text-end">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <div class="fw-bold">Call of Duty</div>
                            </td>
                            <td class="text-center text-muted">Discuss all Call of Duty games</td>
                            <td class="text-center fw-bold">156</td>
                            <td class="text-center fw-bold">89</td>
                            <td class="text-end">
                                <button class="btn btn-sm btn-edit" data-bs-toggle="modal"
                                    data-bs-target="#editCategoryModal"
                                    onclick="editCategory(1, 'Call of Duty', 'Discuss all Call of Duty games')">Edit</button>
                                <button class="btn btn-sm btn-delete"
                                    onclick="deleteCategory(1)">Delete</button>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="fw-bold">Valorant</div>
                            </td>
                            <td class="text-center text-muted">Valorant competitive gaming</td>
                            <td class="text-center fw-bold">89</td>
                            <td class="text-center fw-bold">67</td>
                            <td class="text-end">
                                <button class="btn btn-sm btn-edit" data-bs-toggle="modal"
                                    data-bs-target="#editCategoryModal"
                                    onclick="editCategory(2, 'Valorant', 'Valorant competitive gaming')">Edit</button>
                                <button class="btn btn-sm btn-delete"
                                    onclick="deleteCategory(2)">Delete</button>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="fw-bold">Counter-Strike 2</div>
                            </td>
                            <td class="text-center text-muted">CS2 strategies and gameplay</td>
                            <td class="text-center fw-bold">234</td>
                            <td class="text-center fw-bold">145</td>
                            <td class="text-end">
                                <button class="btn btn-sm btn-edit" data-bs-toggle="modal"
                                    data-bs-target="#editCategoryModal"
                                    onclick="editCategory(3, 'Counter-Strike 2', 'CS2 strategies and gameplay')">Edit</button>
                                <button class="btn btn-sm btn-delete"
                                    onclick="deleteCategory(3)">Delete</button>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="fw-bold">Fortnite</div>
                            </td>
                            <td class="text-center text-muted">Fortnite battle royale</td>
                            <td class="text-center fw-bold">167</td>
                            <td class="text-center fw-bold">112</td>
                            <td class="text-end">
                                <button class="btn btn-sm btn-edit" data-bs-toggle="modal"
                                    data-bs-target="#editCategoryModal"
                                    onclick="editCategory(4, 'Fortnite', 'Fortnite battle royale')">Edit</button>
                                <button class="btn btn-sm btn-delete"
                                    onclick="deleteCategory(4)">Delete</button>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="fw-bold">Apex Legends</div>
                            </td>
                            <td class="text-center text-muted">Apex Legends discussion</td>
                            <td class="text-center fw-bold">145</td>
                            <td class="text-center fw-bold">98</td>
                            <td class="text-end">
                                <button class="btn btn-sm btn-edit" data-bs-toggle="modal"
                                    data-bs-target="#editCategoryModal"
                                    onclick="editCategory(5, 'Apex Legends', 'Apex Legends discussion')">Edit</button>
                                <button class="btn btn-sm btn-delete"
                                    onclick="deleteCategory(5)">Delete</button>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="fw-bold">Warzone</div>
                            </td>
                            <td class="text-center text-muted">Warzone battle royale</td>
                            <td class="text-center fw-bold">203</td>
                            <td class="text-center fw-bold">134</td>
                            <td class="text-end">
                                <button class="btn btn-sm btn-edit" data-bs-toggle="modal"
                                    data-bs-target="#editCategoryModal"
                                    onclick="editCategory(6, 'Warzone', 'Warzone battle royale')">Edit</button>
                                <button class="btn btn-sm btn-delete"
                                    onclick="deleteCategory(6)">Delete</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Stats Section -->
        <div class="row mt-4">
            <div class="col-md-4">
                <div class="card text-center">
                    <div class="card-body">
                        <h3 class="card-title">6</h3>
                        <p class="card-text text-muted">Total Categories</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card text-center">
                    <div class="card-body">
                        <h3 class="card-title">994</h3>
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
<div class="modal fade" id="addCategoryModal" tabindex="-1" aria-labelledby="addCategoryModalLabel" aria-hidden="true">
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
                        <input type="text" id="categoryName" class="form-control" name="category_name" placeholder="Enter category name" required>
                    </div>
                    <div class="mb-3">
                        <label for="categoryDescription" class="form-label fw-bold">Description</label>
                        <textarea id="categoryDescription" class="form-control" name="description" rows="3" maxlength="255" placeholder="Enter description" required></textarea>
                        <small class="text-muted"><span id="addCharCount">0</span>/255 characters</small>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" id="submitCategory" class="btn btn-primary" data-url="{{ route('categories.store') }}">
                        Add Category
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- JavaScript (AJAX + Dynamic Table Update) -->






    <!-- Edit Category Modal -->
    <div class="modal fade" id="editCategoryModal" tabindex="-1" aria-labelledby="editCategoryModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editCategoryModalLabel">Edit Category</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="editCategoryForm">
                        <input type="hidden" id="editCategoryId">
                        <!-- Category Name -->
                        <div class="mb-4">
                            <label for="editCategoryName" class="form-label">Category Name <span
                                    style="color: #dc2626;">*</span></label>
                            <input type="text" class="form-control" id="editCategoryName"
                                placeholder="e.g., Call of Duty, Valorant" required>
                            <div class="form-text">Choose a clear and descriptive name for your category</div>
                        </div>

                        <!-- Description -->
                        <div class="mb-4">
                            <label for="editCategoryDescription" class="form-label">Description <span
                                    style="color: #dc2626;">*</span></label>
                            <textarea class="form-control" id="editCategoryDescription" rows="4"
                                placeholder="Brief description of what this category is about..." required></textarea>
                            <div class="char-counter">
                                <span id="editCharCount">0</span> / 200 characters
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer" style="border-top: 2px solid var(--border-color); padding: 1.5rem;">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-primary-neon" id="updateCategory">Update Category</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    @include('footer.footer')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('asset/js/category_toast.js') }}"></script>
</body>

</html>