document.addEventListener("DOMContentLoaded", function () {
    const charCount = document.getElementById("addCharCount");
    const descriptionField = document.getElementById("categoryDescription");
    const submitBtn = document.getElementById("submitCategory");

    // Function to show toast notification
    function showToast(message, type = 'success') {
        // Remove existing toasts
        const existingToast = document.querySelector('.toast-container');
        if (existingToast) {
            existingToast.remove();
        }

        // Create toast container
        const toastContainer = document.createElement('div');
        toastContainer.className = 'toast-container position-fixed top-0 end-0 p-3';
        toastContainer.style.zIndex = '9999';

        // Determine icon and colors based on type
        const icons = {
            success: '✓',
            error: '✕',
            warning: '⚠',
            info: 'ℹ'
        };
        
        const bgColors = {
            success: '#10b981',
            error: '#ef4444',
            warning: '#f59e0b',
            info: '#3b82f6'
        };

        const titles = {
            success: 'Success',
            error: 'Error',
            warning: 'Warning',
            info: 'Info'
        };

        // Create toast HTML
        toastContainer.innerHTML = `
            <div class="toast show" role="alert" aria-live="assertive" aria-atomic="true">
                <div class="toast-header" style="background: ${bgColors[type]}; color: white; border: none;">
                    <span style="font-size: 1.2rem; font-weight: bold; margin-right: 0.5rem;">${icons[type]}</span>
                    <strong class="me-auto">${titles[type]}</strong>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
                <div class="toast-body" style="background: white; color: #1e293b; font-weight: 500;">
                    ${message}
                </div>
            </div>
        `;

        document.body.appendChild(toastContainer);

        // Initialize Bootstrap toast
        const toastElement = toastContainer.querySelector('.toast');
        const bsToast = new bootstrap.Toast(toastElement, {
            autohide: true,
            delay: 3000
        });
        bsToast.show();

        // Remove toast container after it's hidden
        toastElement.addEventListener('hidden.bs.toast', () => {
            toastContainer.remove();
        });
    }

    // Character counter
    descriptionField.addEventListener("input", function () {
        charCount.textContent = descriptionField.value.length;
    });

    // Submit category via AJAX
    submitBtn.addEventListener("click", function () {
        const url = submitBtn.dataset.url;
        const name = document.getElementById("categoryName").value.trim();
        const description = descriptionField.value.trim();

        if (!name || !description) {
            showToast("Please fill out all required fields.", "warning");
            return;
        }

        fetch(url, {
            method: "POST",
            headers: {
                "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').getAttribute("content"),
                "Content-Type": "application/json",
            },
            body: JSON.stringify({
                category_name: name,
                description: description,
            }),
        })
        .then(async (response) => {
            let data;
            try {
                data = await response.json();
            } catch (e) {
                console.error("Invalid JSON:", e);
                showToast("Unexpected server response. Please refresh and try again.", "error");
                return;
            }

            if (response.ok && data.success) {
                showToast(data.message || "Category added successfully!", "success");

                // Add new row to table dynamically
                const tableBody = document.getElementById("categoryTableBody");
                if (tableBody) {
                    const newRow = document.createElement("tr");
                    newRow.innerHTML = `
                        <td><div class="fw-bold">${name}</div></td>
                        <td class="text-center text-muted">${description}</td>
                        <td class="text-center fw-bold">0</td>
                        <td class="text-center fw-bold">0</td>
                        <td class="text-end"><span class="badge bg-success">New</span></td>
                    `;
                    tableBody.appendChild(newRow);
                }

                // Reset form and close modal
                document.getElementById("addCategoryForm").reset();
                charCount.textContent = "0";
                const modal = bootstrap.Modal.getInstance(document.getElementById("addCategoryModal"));
                if (modal) {
                    modal.hide();
                }

                // Optional: Reload page after showing toast
                setTimeout(() => {
                    location.reload();
                }, 1500);
            } else {
                showToast(data.message || "Failed to add category. Please try again.", "error");
            }
        })
        .catch(err => {
            console.error("Fetch error:", err);
            showToast("Something went wrong. Please try again.", "error");
        });
    });
});