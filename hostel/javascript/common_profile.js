

document.addEventListener('DOMContentLoaded', () => {
    const editButton = document.querySelector('.edit-btn');
    const inputs = document.querySelectorAll('input');

    // Initially disable the inputs
    inputs.forEach(input => input.disabled = true);

    editButton.addEventListener('click', () => {
        const isEditing = editButton.textContent === 'Save Profile';

        // Toggle input fields' disabled state based on 'isEditing'
        inputs.forEach(input => input.disabled = isEditing);
        editButton.textContent = isEditing ? 'Edit Profile' : 'Save Profile';
    });
});


