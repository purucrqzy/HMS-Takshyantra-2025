<?php
session_start();
include '../php/student/fetch_hostel_data.php';
include '../php/student/fetch_student_data.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Messages</title>
    <link rel="stylesheet" href="../css/student/message.css">
    <style>
        /* Add CSS for the button */
        .top-button {
            text-align: center;
            margin: 20px 0;
        }

        .top-button button {
            padding: 10px 20px;
            background-color: #007BFF;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }

        .top-button button:hover {
            background-color: #0056b3;
        }

        /* main content css starts here */

        .container {

            max-width: 1400px;
            margin: 25px auto;
            padding: 20px;
            background-color: white;
            border-radius: 20px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        .container h1 {
            text-align: center;
            color: #333;
        }

        .complaints-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        .complaints-table th,
        .complaints-table td {
            padding: 12px;
        }

        .complaints-table th {
            background-color: #006aff;
            color: rgb(255, 255, 255);
        }

        .complaints-table tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        button {
            padding: 8px 15px;
            border: none;
            cursor: pointer;
            font-size: 14px;
            border-radius: 4px;
        }

        button.in-progress {
            background-color: #ffc107;
            color: white;
        }

        button.resolved {
            background-color: #28a745;
            color: white;
        }

        .selected-issues-container {
            margin-top: 10px;
            display: flex;
            flex-wrap: wrap;
            gap: 8px;
            /* Space between tags */
        }

        .selected-issues-container .issue-tag {
            display: inline-flex;
            align-items: center;
            background-color: #007bff;
            color: white;
            padding: 8px 12px;
            border-radius: 20px;
            font-size: 14px;
            font-weight: 500;
            transition: background-color 0.3s ease;
            cursor: pointer;
        }

        .selected-issues-container .issue-tag:hover {
            background-color: #0056b3;
            /* Darker shade on hover */
        }

        .selected-issues-container .issue-tag .remove-btn {
            background-color: transparent;
            border: none;
            color: white;
            margin-left: 8px;
            cursor: pointer;
            font-size: 16px;
            font-weight: bold;
            transition: color 0.3s ease;
        }

        /* Change the "x" color on hover */
        .selected-issues-container .issue-tag .remove-btn:hover {
            color: #ff4747;
        }

        /* Optionally, add a focus style for better accessibility */
        .selected-issues-container .issue-tag:focus-within {
            box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
        }

        /* For input field and form buttons */
        textarea {
            margin-top: 10px;
            padding: 10px;
            width: 100%;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 14px;
        }

        button {
            padding: 10px 15px;
            background-color: #28a745;
            border: none;
            color: white;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #218838;
        }

        button:focus {
            outline: none;
            box-shadow: 0 0 5px rgba(40, 167, 69, 0.5);
        }

        /* Clear button style */
        #clearButton {
            background-color: #ffc107;
        }

        #clearButton:hover {
            background-color: #e0a800;
        }
    </style>
</head>

<body>
    <!-- Header -->
    <header>
        <div class="logo-container">
            <img src="../media/images/1.png" alt="Logo" class="logo">
            <h1>Messages</h1>
        </div>
        <nav class="header-nav">
            <ul>
                <li><a href="dashboard.php">Home</a></li>
                <li><a href="hostel.html">Hostels</a></li>
                <li><a href="#">Message</a></li>
                <li><a href="profile.php">Profile</a></li>
                <li><a href="../php/student/logout.php">Logout</a></li>
            </ul>
        </nav>
    </header>


    <!-- Main Content -->
    <div class="form-container">
        <h1>Hostel Complaint Form</h1>
        <p>If you're facing any issues, please fill out this form to notify the hostel manager.</p>
        <form id="complaintForm" action="../php/student/submit_complaint.php" method="post">
            <label for="rollno">Student Special ID NO:</label>
            <input type="text" id="rollno" name="rollno"
                value="<?php echo isset($_SESSION['roll_no']) ? $_SESSION['roll_no'] : ''; ?>">

            <label for="sname">Name:</label>
            <input type="text" id="sname" name="sname"
                value="<?php echo isset($_SESSION['name']) ? $_SESSION['name'] : ''; ?>" required>

            <label for="surname">Surname:</label>
            <input type="text" id="surname" name="surname"
                value="<?php echo isset($_SESSION['surname']) ? $_SESSION['surname'] : ''; ?>" required>

            <label for="roomNumber">Room Number:</label>
            <input type="text" id="roomNumber" name="roomNumber"
                value="<?php echo isset($_SESSION['room_no']) ? $_SESSION['room_no'] : ''; ?>" required>

            <label for="issueType">Issue Type:</label>
            <select id="issueType" name="issueType" required onchange="addSelectedIssue()">
                <option value="">Select an issue</option>
                <option value="Fan">Fan</option>
                <option value="Table">Table</option>
                <option value="Chair">Chair</option>
                <option value="Bed">Bed</option>
                <option value="Tubelight">Tubelight</option>
                <option value="Locker">Locker</option>
                <option value="Bathroom">Bathroom</option>
                <option value="Toilet">Toilet</option>
                <option value="Water Filter">Water Filter</option>
                <option value="Others">Others</option>
            </select>

            <label for="selectedIssues">Selected Issues:</label>
            <div id="selectedIssuesContainer" class="selected-issues-container"></div>
            <input type="hidden" id="selectedIssues" name="selectedIssues" />

            <label for="remarks">Remarks:</label>
            <textarea id="remarks" name="remarks" rows="4" placeholder="Describe the issue in detail"></textarea>

            <div class="button-container">
                <button type="submit">Submit Complaint</button>
                <button type="button" id="clearButton" onclick="clearForm()">Clear</button>
            </div>
        </form>

    </div>
    <!-- the result of the complaints status -->

    <div class="container">
        <h1>Complaints Status</h1>
        <table border="1" class="complaints-table">
            <thead>
                <tr>
                    <th>Roll No</th>
                    <th>Name</th>
                    <th>Surname</th>
                    <th>Room No</th>
                    <th>Issue Type</th>
                    <th>Remarks</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody id="complaints-body">
                <!-- Data will be dynamically inserted here -->
            </tbody>
        </table>
    </div>


    <!-- Footer -->
    <footer>
        <nav class="footer-nav">
            <ul>
                <li><a href="#">Privacy Policy</a></li>
                <li><a href="#">Terms of Service</a></li>
                <li><a href="#">Support</a></li>
                <li><a href="#">Contact</a></li>
            </ul>
        </nav>
        <br>
        <p>&copy; 2024 MyWeb. All rights reserved.</p>
    </footer>
    <script>
        function addSelectedIssue() {
            var issueSelect = document.getElementById("issueType");
            var selectedIssuesContainer = document.getElementById("selectedIssuesContainer");
            var selectedIssuesField = document.getElementById("selectedIssues");

            var selectedValue = issueSelect.value;

            if (selectedValue && !isIssueAlreadySelected(selectedValue)) {
                // Create a new tag
                var newTag = document.createElement("div");
                newTag.classList.add("issue-tag");
                newTag.textContent = selectedValue;

                // Create a remove button for the tag
                var removeButton = document.createElement("button");
                removeButton.classList.add("remove-btn");
                removeButton.textContent = "x";
                removeButton.onclick = function() {
                    removeTag(newTag, selectedValue);
                };

                newTag.appendChild(removeButton);
                selectedIssuesContainer.appendChild(newTag);

                // Update the hidden input with the selected values
                updateHiddenInput();
            }
        }




        //        function isIssueAlreadySelected(issue) {
        //            var selectedIssues = document.getElementById("selectedIssuesContainer").getElementsByClassName("issue-tag");
        //            for (var i = 0; i < selectedIssues.length; i++) {
        //                if (selectedIssues[i].textContent.trim() === issue) {
        //                    return true;
        //                }
        //            }
        //            return false;
        //        }


        function isIssueAlreadySelected(issue) {
            var selectedIssues = document.getElementById("selectedIssuesContainer").getElementsByClassName("issue-tag");
            for (var i = 0; i < selectedIssues.length; i++) {
                var tagText = selectedIssues[i].textContent.replace("x", "").trim(); // Remove the "x"
                if (tagText === issue) {
                    return true;
                }
            }
            return false;
        }





        function removeTag(tag, issue) {
            // Remove the tag
            tag.remove();
            // Update the hidden input after removing the tag
            updateHiddenInput();
        }



        //        function updateHiddenInput() {
        //            var selectedIssues = document.getElementById("selectedIssuesContainer").getElementsByClassName("issue-tag");
        //            var issuesArray = [];
        //            for (var i = 0; i < selectedIssues.length; i++) {
        //                issuesArray.push(selectedIssues[i].textContent.trim());
        //            }
        //            document.getElementById("selectedIssues").value = issuesArray.join(", "); // Store the selected issues as a comma-separated string
        //        }


        function updateHiddenInput() {
            var selectedIssues = document.getElementById("selectedIssuesContainer").getElementsByClassName("issue-tag");
            var issuesArray = [];
            for (var i = 0; i < selectedIssues.length; i++) {
                var tagText = selectedIssues[i].textContent.replace("x", "").trim(); // Remove the "x"
                issuesArray.push(tagText);
            }
            document.getElementById("selectedIssues").value = issuesArray.join(", "); // Store the selected issues as a comma-separated string
        }






        function clearForm() {
            document.getElementById("complaintForm").reset();
            document.getElementById("selectedIssuesContainer").innerHTML = '';
            document.getElementById("selectedIssues").value = '';
        }
    </script>
</body>
<script src="../javascript/student/complaints.js"></script>
<script src="../javascript/student/message_validation.js"></script>

</html>