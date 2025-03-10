document.addEventListener("DOMContentLoaded", function () {
    // Fetch data from PHP
    fetch('/hostel/php/manager/fetch_complaints.php')
        .then(response => response.json())
        .then(data => {
            const tbody = document.getElementById('complaints-body');
            tbody.innerHTML = ''; // Clear existing content

            data.forEach(row => {
                const tr = document.createElement('tr');

                // Create table cells
                tr.innerHTML = `
                    <td>${row.rollno}</td>
                    <td>${row.name}</td>
                    <td>${row.surname}</td>
                    <td>${row.room_no}</td>
                    <td>${row.issue_type}</td>
                    <td>${row.remarks}</td>
                    <td>${row.status}</td>
                    <td><button class="in-progress" data-rollno="${row.rollno}">In Progress</button></td>
                    <td><button class="resolved" data-rollno="${row.rollno}">Resolved</button></td>
                `;

                tbody.appendChild(tr);
            });
        })
        .catch(error => console.error('Error fetching data:', error));

    // Handle button clicks
    document.getElementById('complaints-body').addEventListener('click', function (event) {
        if (event.target.classList.contains('in-progress') || event.target.classList.contains('resolved')) {
            const rollno = event.target.getAttribute('data-rollno');
            const status = event.target.classList.contains('in-progress') ? 'In Progress' : 'Resolved';

            // Update status via PHP
            fetch('/hostel/php/manager/update_status.php', {
                method: 'POST',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify({ rollno, status })
            })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        alert(`Status updated to: ${status}`);
                        location.reload();
                    } else {
                        alert('Error updating status');
                    }
                });
        }
    });
});
