// Wait for the DOM to load before adding event listeners
document.addEventListener('DOMContentLoaded', function () {

    // Get the form and its elements
    const complaintForm = document.getElementById('complaintForm');
    const clearButton = document.getElementById('clearButton');

    // Attach the submit event listener to the form
    complaintForm.addEventListener('submit', function (event) {
        let isValid = true;
        let errorMessage = '';

        // Validate Student Special ID No (6 digits, only numbers)
        const rollno = document.getElementById('rollno').value;
        if (!/^\d{6}$/.test(rollno)) {
            isValid = false;
            errorMessage += 'Student Special ID No must be exactly 6 digits long and contain only numbers.\n';
        }

        // Validate Name (only text)
        const sname = document.getElementById('sname').value;
        if (!/^[a-zA-Z]+$/.test(sname)) {
            isValid = false;
            errorMessage += 'Name must contain only text.\n';
        }

        // Validate Surname (only text)
        const surname = document.getElementById('surname').value;
        if (!/^[a-zA-Z]+$/.test(surname)) {
            isValid = false;
            errorMessage += 'Surname must contain only text.\n';
        }

        // Validate Room Number (only numbers, 3 digits long)
        const roomNumber = document.getElementById('roomNumber').value;
        if (!/^\d{3}$/.test(roomNumber)) {
            isValid = false;
            errorMessage += 'Room Number must be exactly 3 digits long and contain only numbers.\n';
        }

        // Validate Issue Type (must be selected)
        const issueType = document.getElementById('issueType').value;
        if (issueType === '') {
            isValid = false;
            errorMessage += 'Please select an Issue Type.\n';
        }

        // Validate Remarks (must be filled out)
        const remarks = document.getElementById('remarks').value.trim();
        if (remarks === '') {
            isValid = false;
            errorMessage += 'Remarks cannot be empty.\n';
        }

        // If the form is invalid, display the error message and prevent submission
        if (!isValid) {
            alert(errorMessage);
            event.preventDefault();  // Prevent form submission
        }
    });

    // Clear the form when the "Clear" button is clicked
    clearButton.addEventListener('click', function () {
        complaintForm.reset();
    });

});
