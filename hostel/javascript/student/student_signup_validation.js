document.querySelector("form").addEventListener("submit", function (e) {
    const errors = [];
    const username = document.getElementById("username").value.trim();
    const email = document.getElementById("email").value.trim();
    const mobileNo = document.getElementById("mobile_no").value.trim();
    const name = document.getElementById("name").value.trim();
    const surname = document.getElementById("surname").value.trim();
    const password = document.getElementById("password").value.trim();
    const dob = document.getElementById("dob").value.trim();
    const course = document.getElementById("course").value.trim();
    const department = document.getElementById("department").value.trim();
    const yearOfStudy = document.getElementById("yearofstudy").value.trim();
    const rollNo = document.getElementById("rollno").value.trim();
    const pastEducation = document.getElementById("pasteducation").value.trim();
    const gender = document.getElementById("gender").value.trim();
    const address = document.getElementById("address").value.trim();
    const postcode = document.getElementById("postcode").value.trim();
    const state = document.getElementById("state").value.trim();
    const district = document.getElementById("district").value.trim();

    // Username Validation
    if (!username || username.length < 5 || !/^[a-zA-Z0-9\s]+$/.test(username)) {
        errors.push("Username must be at least 5 alphanumeric characters.");
    }

    // Email Validation
    if (!email || !/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email)) {
        errors.push("Invalid email format.");
    }

    // Mobile No Validation
    if (!mobileNo || !/^\d{10}$/.test(mobileNo)) {
        errors.push("Mobile number must be exactly 10 digits.");
    }

    // Name Validation
    if (!name || !/^[a-zA-Z\s]+$/.test(name)) {
        errors.push("Name must contain only alphabetic characters and spaces.");
    }

    // Surname Validation
    if (!surname || surname.length <= 3 || !/^[a-zA-Z\s]+$/.test(surname)) {
        errors.push("Surname must be more than 3 alphabetic characters.");
    }

    // Password Validation
    if (!password || !/^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[@$!%*?&]).{6,12}$/.test(password)) {
        errors.push("Password must be 6-12 characters with at least 1 uppercase, 1 lowercase, 1 special character, and 1 number.");
    }

    // Date of Birth Validation (must be older than 19 years)
    if (!dob || new Date().getFullYear() - new Date(dob).getFullYear() < 19) {
        errors.push("You must be at least 19 years old.");
    }

    // Current Course Validation
    if (!course) {
        errors.push("Please select your current course.");
    }

    // Department Validation
    if (!department || !/^[a-zA-Z\s]+$/.test(department)) {
        errors.push("Department must contain only alphabetic characters.");
    }

    // Year of Study Validation
    if (!yearOfStudy || !/^\d+$/.test(yearOfStudy)) {
        errors.push("Year of Study must be a valid number.");
    }

    // Student Special ID No Validation
    if (!rollNo || !/^\d{6}$/.test(rollNo)) {
        errors.push("Student Special ID No must be exactly 6 digits.");
    }

    // Past Education Validation
    if (!pastEducation || !/^[a-zA-Z0-9\s]+$/.test(pastEducation)) {
        errors.push("Past Education must be alphanumeric.");
    }

    // Gender Validation
    if (!gender) {
        errors.push("Please select your gender.");
    }

    // Address Validation
    if (!address || address.length < 10) {
        errors.push("Address must be at least 10 characters long.");
    }

    // Postcode Validation
    if (!postcode || !/^\d{6}$/.test(postcode)) {
        errors.push("Postcode must be exactly 6 digits.");
    }

    // State Validation
    if (!state || !/^[a-zA-Z\s]+$/.test(state)) {
        errors.push("State must contain only alphabetic characters.");
    }

    // District Validation
    if (!district || !/^[a-zA-Z\s]+$/.test(district)) {
        errors.push("District must contain only alphabetic characters.");
    }

    // If there are errors, prevent form submission and show alert
    if (errors.length > 0) {
        e.preventDefault();
        alert(errors.join("\n"));
    }
});
