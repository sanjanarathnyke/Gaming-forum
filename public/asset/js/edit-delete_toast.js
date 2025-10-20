function editCategory(id, name, description) {
    document.getElementById("editCategoryId").value = id;
    document.getElementById("editCategoryName").value = name;
    document.getElementById("editCategoryDescription").value = description;
}

// Update Category via AJAX
document
    .getElementById("updateCategoryBtn")
    .addEventListener("click", function () {
        const id = document.getElementById("editCategoryId").value;
        const name = document.getElementById("editCategoryName").value.trim();
        const description = document
            .getElementById("editCategoryDescription")
            .value.trim();

        if (!name || !description) {
            Swal.fire("Warning", "Please fill all required fields.", "warning");
            return;
        }

        fetch(`/categories/${id}/update`, {
            method: "PUT",
            headers: {
                "X-CSRF-TOKEN": document.querySelector(
                    'meta[name="csrf-token"]'
                ).content,
                "Content-Type": "application/json",
            },
            body: JSON.stringify({
                category_name: name,
                description: description,
            }),
        })
            .then((res) => res.json())
            .then((data) => {
                if (data.success) {
                    Swal.fire("Updated!", data.message, "success").then(() => {
                        location.reload();
                    });
                } else {
                    Swal.fire(
                        "Error",
                        data.message || "Update failed.",
                        "error"
                    );
                }
            })
            .catch(() => Swal.fire("Error", "Something went wrong.", "error"));
    });

// Delete Category via AJAX
function deleteCategory(id) {
    Swal.fire({
        title: "Are you sure?",
        text: "This will permanently delete the category.",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#d33",
        cancelButtonColor: "#3085d6",
        confirmButtonText: "Yes, delete it!",
    }).then((result) => {
        if (result.isConfirmed) {
            fetch(`/categories/${id}/delete`, {
                method: "DELETE",
                headers: {
                    "X-CSRF-TOKEN": document.querySelector(
                        'meta[name="csrf-token"]'
                    ).content,
                },
            })
                .then((res) => res.json())
                .then((data) => {
                    if (data.success) {
                        Swal.fire("Deleted!", data.message, "success").then(
                            () => {
                                location.reload();
                            }
                        );
                    } else {
                        Swal.fire(
                            "Error",
                            data.message || "Delete failed.",
                            "error"
                        );
                    }
                })
                .catch(() =>
                    Swal.fire("Error", "Something went wrong.", "error")
                );
        }
    });
}
