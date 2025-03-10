document.querySelector("#hostelForm").addEventListener("submit", function (event) {
    let isValid = true;

    // Helper function for date validation
    function calculateAge(dob) {
        const birthDate = new Date(dob);
        const today = new Date();
        let age = today.getFullYear() - birthDate.getFullYear();
        const monthDifference = today.getMonth() - birthDate.getMonth();
        if (monthDifference < 0 || (monthDifference === 0 && today.getDate() < birthDate.getDate())) {
            age--;
        }
        return age;
    }

    // Name validation
    const sname = document.getElementById("sname").value.trim();
    if (!/^[a-zA-Z\s]{2,}$/.test(sname)) {
        alert("Name must be at least 2 characters long and contain only alphabets.");
        isValid = false;
    }

    // Father's Name validation
    const fname = document.getElementById("fname").value.trim();
    if (!/^[a-zA-Z\s]{2,}$/.test(fname)) {
        alert("Father's Name must be at least 2 characters long and contain only alphabets.");
        isValid = false;
    }

    // Surname validation
    const surname = document.getElementById("surname").value.trim();
    if (!/^[a-zA-Z\s]+$/.test(surname)) {
        alert("Surname can only contain alphabetic characters.");
        isValid = false;
    }

    // Date of Birth validation
    const dob = document.getElementById("dob").value.trim();
    const age = calculateAge(dob);
    if (!dob || new Date(dob) > new Date() || age < 17) {
        alert("Date of Birth must be valid, and age must be at least 17.");
        isValid = false;
    }

    // Email validation
    const email = document.getElementById("email").value.trim();
    if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email)) {
        alert("Enter a valid email address.");
        isValid = false;
    }

    // Phone Number validation
    const phone = document.getElementById("phone").value.trim();
    if (!/^\d{10}$/.test(phone)) {
        alert("Phone Number must be exactly 10 digits.");
        isValid = false;
    }

   
    // Course Enrolled validation
    const course = document.getElementById("course").value.trim();
    if (course.length < 3) {
        alert("Course Enrolled must be at least 3 characters long.");
        isValid = false;
    }

    // Department validation
    const department = document.getElementById("department").value.trim();
    if (department.length < 3) {
        alert("Department must be at least 3 characters long.");
        isValid = false;
    }

    // Year of Study validation
    const yearOfStudy = document.getElementById("yearofstudy").value.trim();
    if (!/^\d+$/.test(yearOfStudy)) {
        alert("Year of Study must be a numeric value.");
        isValid = false;
    }

    // Roll Number validation
    const rollno = document.getElementById("rollno").value.trim();
    if (!/^[a-zA-Z0-9]{6}$/.test(rollno)) {
        alert("Roll Number must be 8-12 alphanumeric characters.");
        isValid = false;
    }

    // Address validation
    const address = document.getElementById("address").value.trim();
    if (address.length < 10) {
        alert("Address must be at least 10 characters long.");
        isValid = false;
    }

    // PostCode validation
    const postcode = document.getElementById("postcode").value.trim();
    if (postcode && !/^[a-zA-Z0-9]{6}$/.test(postcode)) {
        alert("PostCode must be exactly 6 alphanumeric characters.");
        isValid = false;
    }

    // State validation
    const state = document.getElementById("state").value.trim();
    if (!/^[a-zA-Z\s]+$/.test(state)) {
        alert("State can only contain alphabetic characters.");
        isValid = false;
    }

    // District validation
    const district = document.getElementById("district").value.trim();
    if (!/^[a-zA-Z\s]+$/.test(district)) {
        alert("District can only contain alphabetic characters.");
        isValid = false;
    }

    // Hostel Preference validation
    const hostelPreference = document.getElementById("hostelPreference").value;
    if (!hostelPreference) {
        alert("Please select a Hostel Preference.");
        isValid = false;
    }

    // Prevent form submission if any validation fails
    if (!isValid) {
        event.preventDefault();
    }
});
