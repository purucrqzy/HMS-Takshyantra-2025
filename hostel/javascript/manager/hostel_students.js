document.addEventListener("DOMContentLoaded", () => {
    // Fetch data and populate the table
    fetchApplications();

    // Function to fetch applications from the server
    function fetchApplications() {
        fetch('/hostel/php/admin/fetch_hostel_students.php')
            .then(response => response.json())
            .then(data => {
                const tableBody = document.getElementById('tableBody');
                tableBody.innerHTML = ''; // Clear existing rows
                data.forEach(record => {
                    const row = document.createElement('tr');
                    row.innerHTML = `
                        <td>${record.rollno}</td>
                        <td>${record.sname}</td>
                        <td>${record.fname}</td>
                        <td>${record.surname}</td>
                        <td>${record.dob}</td>
                        <td>${record.email}</td>
                        <td>${record.phone}</td>
                        <td>${record.gender}</td>
                        <td>${record.course}</td>
                        <td>${record.department}</td>
                        <td>${record.yearofstudy}</td>
                        <td>${record.address}</td>
                        <td>${record.postcode}</td>
                        <td>${record.state}</td>
                        <td>${record.district}</td>
                        <td>${record.room_no}</td>
                        <td>${record.hostel_preference}</td>
                        <td>${record.admitted_on}</td>
                    `;
                    tableBody.appendChild(row);

                });
            });
    }

});
