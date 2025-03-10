document.querySelector("form").addEventListener("submit", function (event) {
    let isValid = true;

    // Username validation
    const username = document.getElementById("username").value.trim();
    if (!/^[a-zA-Z0-9_.]{5,}$/.test(username)) {
        alert("Username must be at least 5 characters long and can only include letters, numbers, underscores, and dots.");
        isValid = false;
    }

    // Email validation
    const email = document.getElementById("email").value.trim();
    if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email)) {
        alert("Enter a valid email address.");
        isValid = false;
    }

    // Mobile Number validation
    const mobileNo = document.getElementById("mobile_no").value.trim();
    if (!/^\d{10}$/.test(mobileNo)) {
        alert("Mobile number must be exactly 10 digits.");
        isValid = false;
    }

    // Name validation
    const name = document.getElementById("name").value.trim();
    if (!/^[a-zA-Z\s]+$/.test(name)) {
        alert("Name can only contain alphabetic characters.");
        isValid = false;
    }

    // Surname validation
    const surname = document.getElementById("surname").value.trim();
    if (surname && !/^[a-zA-Z\s]+$/.test(surname)) {
        alert("Surname can only contain alphabetic characters.");
        isValid = false;
    }

    // Password validation
    const password = document.getElementById("password").value;
    if (!/(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{6,}/.test(password)) {
        alert("Password must be at least 6 characters long, with one uppercase letter, one lowercase letter, one number, and one special character.");
        isValid = false;
    }

    // Age validation
    const age = parseInt(document.getElementById("age").value, 10);
    if (isNaN(age) || age < 18) {
        alert("Age must be 18 or older.");
        isValid = false;
    }

    // Postcode validation
    const postcode = document.getElementById("postcode").value.trim();
    if (postcode && !/^[a-zA-Z0-9]{6}$/.test(postcode)) {
        alert("Postcode must be exactly 6 alphanumeric characters.");
        isValid = false;
    }

    // State validation
    const state = document.getElementById("state").value.trim();
    if (state && !/^[a-zA-Z\s]+$/.test(state)) {
        alert("State can only contain alphabetic characters.");
        isValid = false;
    }

    // Education validation
    const education = document.getElementById("education").value.trim();
    if (!education) {
        alert("Education field cannot be empty.");
        isValid = false;
    }

    // Address validation
    const address = document.getElementById("address").value.trim();
    if (address.length < 10) {
        alert("Address must be at least 10 characters long.");
        isValid = false;
    }

    // Prevent form submission if any validation fails
    if (!isValid) {
        event.preventDefault();
    }
});
