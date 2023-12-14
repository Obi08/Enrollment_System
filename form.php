<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Rights Reserve 2023</title>
    <style>
        @font-face {
            font-family: conforta;
            src: url(conforta.ttf);
        }
body {
    font-family: Arial, sans-serif;
}

.form_container {
    max-width: 100%;
    margin: 0 auto;
    padding: 20px;
    border: 1px solid #ccc;
    text-align: center; /* Center the content within the container */
}

table {
    width: 80%; /* Adjust the width as needed */
    margin: 0 auto; /* Center the table within the container */
    border-collapse: collapse;

}

table, th, td {
    border: 1px solid #ccc;
    color: #000;
}

th, td {
    padding: 9px;
    text-align: left;
    font-size: 14px;
    margin: 0 auto;
}
th{
    text-align: center;
}
h2{
    text-align: center;
    font-size: 15px;
}
h3{
    text-align: center;
    font-size: 30px;
}
h1{
    text-align: center;
    font-size: 25px;
    padding-bottom: 20px;
}
h1, h2, h3, p{
    margin: 0px;
}

.s-button, .p-button {
    margin-top: 20px;
    padding: 10px;
    background-color: #4CAF50;
    color: white;
    border: none;
    border-radius: 5px;
    cursor: pointer;
}
.close {
    position: absolute;
    top: 10px;
    right: 10px;
    font-size: 20px;
    cursor: pointer;
}
input{
    font-size: 18px;
    width: 245px;
}
select{
    height: 30px;
    width: 140px;
}
.course-select{
    margin: 0 auto;
    padding: 20px;
    padding-left: 0px;
    padding-top: 10px;
    position: relative;
}

.course-select-year, .course-select-sem, .course-select{
    padding: 10px;
    position: 0 auto;
}

.student-info {
    display: flex;
    flex-direction: row;
    justify-content: space-between;
    border: 1px solid #ccc;
    border-radius: 8px;
    padding: 10px;
    margin-bottom: 10px;
    font-size: 15px;
  }
  .student-info p {
    margin: 0;
  }
/* Print styles */
@media print {
    body {
        font-family: 'Times New Roman', serif; /* Change font for print */
        line-height: 1.5;
    }

    .form_container {
        border: none;
        margin: 0;
        padding: 0;
    }

    table {
        width: 100%;
    }

    th, td {
        border: 1px solid #000; /* Change border color for print */
    }

    .p-button, .s-button {
        display: none; /* Hide the print button in print mode */
    }
    label {
        display: none; /* Hide the print button in print mode */
    }
    input{
        display: none; /* Hide the print button in print mode */
    }
    .close{
        display: none;
    }
    .sidebar{
        display: none;
    }
    select, .course-select{
        display: none;
    }
}
</style>
</head>
<body>
   <div class="form_container">
        <!-- School Logo -->
        <img class="school-logo" src="ucc.png" width="80" height="80" alt="School Logo">

        <!-- School Name -->
        <h3>University of Caloocan City</h3>

        <!-- School Address -->
        <p>Congressional Rd Ext, Barangay 171, Caloocan, Metro Manila, Philippines.</p>
        <h1>REGISTRATION FORM</h1>

    <form id="registrationForm">

    <label for="studentId">STUDENT NUMBER:</label>
    <input type="text" id="studentId" name="studentId" placeholder="Enter your student number">

    <div class="course-select-year">
    <label for="year">YEAR:</label>
    <select id="year" name="year">
        <option value="">SELECT YEAR</option>
        <option value="1">1ST YEAR</option>
        <option value="2">2ND YEAR</option>
        <option value="2">3RD YEAR</option>
        <option value="2">4TH YEAR</option>
        <!-- Add more options as needed -->
    </select>
</div>

<div class="course-select-sem">
    <label for="semester">SEMESTER:</label>
    <select id="semester" name="semester">
        <option value="">SELECT SEMESTER</option>
        <option value="1">1ST SEMESTER</option>
        <option value="2">2ND SEMESTER</option>
        <!-- Add more options as needed -->
    </select>
</div>

    <div class="course-select">
    <label for="course">COURSE</label>
    <select type="text" id="course" name="course" placeholder="Enter your course" required>
    <option value="">SELECT COURSE</option>
    <option value="BSIT">BSEMC</option>
    <option value="BSEMC">BSIT</option>
    </select>
    </div>

    
    <button type="submit" class="s-button">Show Data</button>
</form>
        <button onclick="printData()" class="p-button">Print</button>

        <div id="popup" class="modal">
            <div class="modal-content">
                <span class="close" onclick="closePopup()">&times;</span>
                <div id="popupContent"></div>
            </div>
        </div>
    </div>

    <script>
    function openPopup() {
        var studentId = document.getElementById("studentId").value;
        var course = document.getElementById("course").value;
        var popupContent = document.getElementById("popupContent");

        // Fetch data for the specified student ID and course from fetch_data.php
        fetch("fetch_data.php?studentId=" + studentId + "&course=" + course)
            .then(response => response.text())
            .then(data => {
                popupContent.innerHTML = data;
                document.getElementById("popup").style.display = "block";
            })
            .catch(error => console.error('Error:', error));
    }

    function closePopup() {
        document.getElementById("popup").style.display = "none";
    }

    function printData() {
        window.print();
    }
    </script>
</body>
</html>
