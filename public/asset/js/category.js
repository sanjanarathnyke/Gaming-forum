// document.addEventListener('DOMContentLoaded', () => {
//     const descInput = document.getElementById('categoryDescription');
//     const counter = document.getElementById('addCharCount');

//     // Update live character count
//     descInput.addEventListener('input', () => {
//         counter.textContent = descInput.value.length;
//     });

//     const editCategoryDescription = document.getElementById('editCategoryDescription');
//     const editCharCount = document.getElementById('editCharCount');

//     editCategoryDescription.addEventListener('input', () => {
//       const count = editCategoryDescription.value.length;
//       editCharCount.textContent = count;
//       if (count > 200) {
//         editCharCount.style.color = '#dc2626';
//       } else {
//         editCharCount.style.color = 'var(--text-muted)';
//       }
//     });
// });