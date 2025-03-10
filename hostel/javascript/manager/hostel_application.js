document.addEventListener("DOMContentLoaded", () => {
    // Fetch data and populate the table
    fetchApplications();

    // Function to fetch applications from the server
    function fetchApplications() {
        fetch('/hostel/php/manager/fetch_applications.php')
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
                        <td>${record.hostel_preference}</td>
                        <td><input type="text" placeholder="Room No" id="room_${record.rollno}"></td>
                        <td><button class="approve-btn">Approve</button></td>
                        <td><button class="reject-btn">Reject</button></td>
                    `;
                    tableBody.appendChild(row);

                    // Attach the event listeners
                    row.querySelector('.approve-btn').addEventListener('click', () => approveApplication(record.rollno));
                    row.querySelector('.reject-btn').addEventListener('click', () => rejectApplication(record.rollno));
                });
            });
    }

    // Approve application
    window.approveApplication = (rollno) => {
        const roomNo = document.getElementById(`room_${rollno}`).value;
        if (!roomNo) {
            alert("Please enter a room number before approving!");
            return;
        }
        fetch('/hostel/php/manager/approve_application.php', {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify({ rollno, roomNo })
        })
        .then(response => response.text()) // Get the response text (success message or error)
        .then(responseText => {
            console.log(responseText); // Check what the server responded with
            if (responseText.includes("approved and moved")) {
                alert('Application approved and moved to hostel!');
                fetchApplications(); // Refresh the table
            } else {
                alert('There was an error: ' + responseText);
            }
        })
        .catch(error => {
            alert('Error: ' + error);
        });
    };
    

    // Reject application
    window.rejectApplication = (rollno) => {
        if (confirm("Are you sure you want to reject this application?")) {
            fetch('/hostel/php/manager/reject_application.php', {
                method: 'POST',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify({ rollno })
            }).then(response => {
                if (response.ok) {
                    fetchApplications(); // Refresh table after rejection
                } else {
                    alert('Error rejecting the application');
                }
            });
        }
    };
});
