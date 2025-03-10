
document.getElementById("unique-add-form").addEventListener("submit", function (event) {
    // Prevent form submission to validate first
    event.preventDefault();

    // Date of Birth Validation
    const dobField = document.getElementById("dob");
    const dob = new Date(dobField.value);
    const today = new Date();
    const age = today.getFullYear() - dob.getFullYear();
    const monthDiff = today.getMonth() - dob.getMonth();
    const dayDiff = today.getDate() - dob.getDate();
    if (age < 18 || (age === 18 && (monthDiff < 0 || (monthDiff === 0 && dayDiff < 0)))) {
        alert("You must be at least 18 years old.");
        dobField.focus();
        return;
    }

    // Mobile Number Validation
    const mobileField = document.getElementById("unique-mobile");
    const smobileField = document.getElementById("smobile_no");
    const mobileRegex = /^\d{10}$/;
    if (!mobileRegex.test(mobileField.value)) {
        alert("Mobile number must be exactly 10 digits.");
        mobileField.focus();
        return;
    }
    if (smobileField.value && !mobileRegex.test(smobileField.value)) {
        alert("Second contact number must be exactly 10 digits.");
        smobileField.focus();
        return;
    }

    // Hostel Code Validation
    const hostelCodeField = document.getElementById("unique-hostel-code-add");
    const hostelCodeRegex = /^[A-Z]{4}$/;
    if (!hostelCodeRegex.test(hostelCodeField.value)) {
        alert("Hostel code must be exactly 4 uppercase letters (A-Z).");
        hostelCodeField.focus();
        return;
    }


    // Email Validation
    const emailField = document.getElementById("unique-email");
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!emailRegex.test(emailField.value)) {
        alert("Please enter a valid email address.");
        emailField.focus();
        return;
    }

    // Password Validation
    const passwordField = document.getElementById("unique-password");
    const passwordRegex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{6,}$/;
    if (!passwordRegex.test(passwordField.value)) {
        alert("Password must be at least 6 characters long, and include at least one uppercase letter, one lowercase letter, one number, and one special character.");
        passwordField.focus();
        return;
    }

    // If all validations pass, submit the form
    this.submit();
});
