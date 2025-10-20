document.addEventListener("DOMContentLoaded", function () {
    const submitBtn = document.getElementById("submitPost");
    const charCount = document.getElementById("charCount");
    const descField = document.getElementById("postDescription");

    // Character Counter
    descField.addEventListener("input", () => {
        charCount.textContent = descField.value.length;
    });

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

    // Submit Post
    submitBtn.addEventListener("click", function () {
        const form = document.getElementById("createPostForm");
        const formData = new FormData(form);
        const url = submitBtn.dataset.url;

        // Basic validation
        const title = document.getElementById("postTitle").value.trim();
        const category = document.getElementById("postCategory").value;
        const description = document.getElementById("postDescription").value.trim();

        if (!title || !category || !description) {
            showToast("Please fill out all required fields.", "warning");
            return;
        }

        // Disable button while submitting
        submitBtn.disabled = true;
        submitBtn.textContent = "Posting...";

        fetch(url, {
            method: "POST",
            headers: {
                "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').content,
            },
            body: formData,
        })
        .then(async response => {
            let data;
            try {
                data = await response.json();
            } catch (err) {
                console.error("Invalid JSON:", err);
                showToast("Unexpected server response.", "error");
                submitBtn.disabled = false;
                submitBtn.textContent = "Create Post";
                return;
            }

            if (response.ok && data.success) {
                showToast(data.message || "Post created successfully!", "success");
                
                // Reset form
                form.reset();
                charCount.textContent = "0";

                // Close modal
                const modal = bootstrap.Modal.getInstance(document.getElementById("createPostModal"));
                if (modal) {
                    modal.hide();
                }

                // Reload page after showing toast
                setTimeout(() => {
                    location.reload();
                }, 1500);
            } else {
                showToast(data.message || "Failed to create post.", "error");
            }
        })
        .catch(err => {
            console.error("Fetch error:", err);
            showToast("Something went wrong. Please try again.", "error");
        })
        .finally(() => {
            submitBtn.disabled = false;
            submitBtn.textContent = "Create Post";
        });
    });
});