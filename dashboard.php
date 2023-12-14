<?php
session_start();

if (!isset($_SESSION["username"])) {
    header("Location: login.php");
    exit();
}

$host = "localhost";
$username = "root";  // Default MySQL username
$password = "";      // Empty password for XAMPP
$database = "enrollment_system";


$conn = new mysqli($host, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <style>
        @font-face {
            font-family: myFont;
            src: url(cavi.ttf);
        }
        @font-face {
            font-family: myFont1;
            src: url(robot.ttf);
        }

        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            min-height: 200px;
            background-position: 50px;
        }

        .container {
            display: flex;
            min-height: 100vh;
            overflow-x: hidden;
            position: sticky;
            top: 0;
            z-index: 1;
        }

        .sidebar {
            width: 200px;
            background: linear-gradient(135deg, #2C3E50, #4D5061);
            color: #fff;
            padding: 30px;
            display: flex;
            flex-direction: column;
        }
            .logo-container {
            display: flex;
            align-items: center;
            margin-bottom: 20px;
            font-family: myFont;
        }

        .logo {
            width: 50px;
            height: auto;
            margin-right: 10px;
        }

        .name {
            font-size: 18px;
            font-weight: bold;
        }

        ul {
            list-style-type: none;
            padding: 0;
            padding-top: 20px;
            margin-top: 20px;
        }

        li button {
            width: 100%;
            padding: 15px;
            margin-bottom: 5px;
            text-align: left;
            border: none;
            background: linear-gradient(45deg, #2E3B4E, #485166);
            color: #fff;
            cursor: pointer;
            transition: background 0.3s, box-shadow 0.3s;
            font-family: myFont1;
            font-size: 16px;
            display: flex;
            align-items: center;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding-top: 5px;
        }

        li button i {
            margin-right: 10px;
        }

        li.logout-btn button {
            padding: 15px;
        }

        li.logout-btn button i {
            margin-right: 10px;
        }

        .logout-btn {
            margin-top: auto;
        }

        .main-content {
            flex: 1;
            background-color: #EBEBEB;
            justify-content: center;
            align-items: center;
            padding: 20px;
            color: white;
            font-size: 20px;
            max-width: 100%;
            overflow: auto;
        }

        .content-container {
            display: flex;
            justify-content: space-around;
            align-items: center;
            padding-top: 50px;
            flex-wrap: wrap;
        }

        .box {
            text-align: center;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 8px;
            width: 200px;
            background-color: #eaeaea;
            margin: 0 10px;
            margin-bottom: 20px;
        }

        .box i {
            font-size: 36px;
            margin-bottom: 10px;
            color: #444;
        }

        .box p {
            margin: 10px 0;
            font-size: 18px;
            color: #555;
        }

        .box span {
            font-size: 24px;
            font-weight: bold;
            color: #333;
        }
        .form_container{
            color: black;
        }
        .registrationForm{
            color: black;
        }
        .search-form {
            color: black;
        }

        @media only screen and (max-width: 768px) {
            .container {
                flex-direction: column;
            }

            .sidebar {
                width: 100%;
            }
        }

        li button:hover {
            background: linear-gradient(45deg, #485166, #2E3B4E);
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.2);
        }
        .container, .sidebar{
            position: sticky;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="sidebar">
            <div class="logo-container">
                <img src="ucc.png" alt="Logo" class="logo">
                <div class="name">University of Caloocan City</div>
            </div>
            <ul>
                <li><button onclick="showContent('dashboard_content.php')"><i class="fas fa-sitemap"></i>Dashboard</button></li>
                <li><button onclick="showContent('get_students.php')"><i class="fas fa-user"></i>All Students</button></li>
                <li><button onclick="showContent('form.php')"><i class="fas fa-chalkboard"></i>Registration Form</button></li>
                <li><button onclick="showContent('get_course.php')"><i class="fas fa-user-graduate"></i>Course</button></li>
                <li><button onclick="showContent('get_subject.php')"><i class="fas fa-user-graduate"></i>Subject</button></li>
                <li><button onclick="showContent('add_course.php')"><i class="fas fa-chalkboard"></i>Add Course</button></li>
                <li><button onclick="showContent('get_schedule.php')"><i class="fas fa-calendar"></i>Schedule</button></li>
                <li><button onclick="showContent('add_schedule.php')"><i class="fas fa-chalkboard"></i>Add Schedule</button></li>
                <li><button onclick="showContent('user_profile.php')"><i class="fas fa-user"></i>User Profile</button></li>
                <li class="logout-btn">
                    <button id="logoutButton"><i class="fas fa-sign-out-alt"></i>Logout</button>
                </li>
            </ul>
        </div>
    
        
        <div class="main-content adjust-top" id="main-content">
        <div class="content-container">
        <?php
        // Query to get total students
        $query_students = "SELECT COUNT(*) as total_students FROM student_data";
        $result_students = $conn->query($query_students);
        $row_students = $result_students->fetch_assoc();
        ?>

        <div class="box">
            <i class="fas fa-user"></i>
            <p>TOTAL STUDENTS</p>
            <span><?php echo $row_students['total_students']; ?></span>
    </div>

    <?php
    // Query to get total courses
    $query_courses = "SELECT COUNT(*) as total_courses FROM course";
    $result_courses = $conn->query($query_courses);
    $row_courses = $result_courses->fetch_assoc();
    ?>

    <div class="box">
        <i class="fas fa-book"></i>
        <p>TOTAL COURSES</p>
        <span><?php echo $row_courses['total_courses']; ?></span>
    </div>

    <?php
    // Query to get total subjects
    $query_subjects = "SELECT COUNT(*) as total_subjects FROM student_subject";
    $result_subjects = $conn->query($query_subjects);
    $row_subjects = $result_subjects->fetch_assoc();
    ?>

    <div class="box">
        <i class="fas fa-book"></i>
        <p>TOTAL SUBJECTS</p>
        <span><?php echo $row_subjects['total_subjects']; ?></span>
    </div>
    
<div>
    <head>
    <meta charset="UTF-8">
    <title>Subject Data</title>
    <style>
         body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        header {
            background-color: #262F32;
            color: white;
            text-align: center;
            padding: 10px;
        }
        
        table {
            font-size: 14px;
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            background-color: white;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        th, td {
            padding: 12px 15px;
            text-align: left;
            border-bottom: 1px solid #ddd;
            color: #262F32;
        }

        th {
            background-color: #262F32;
            color: white;
        }

        tr:hover {
            background-color: #f5f5f5;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        p {
            text-align: center;
            margin-top: 20px;
            font-weight: bold;
        }
    </style>
</head>
            <?php
        // Ensure proper database connection
        include('db.php');

        // Query to get course data
        $sql = "SELECT * FROM student_data";
        $result = $conn->query($sql);

        // Close the database connection
        $conn->close();
        ?>
            <header>
                <h1>Recent Student</h1>
            </header>
            <?php
            // Display student data in a table
            if ($result->num_rows > 0) {
                echo "<table>";
                echo "<tr>";
                echo "<th>Student Number</th>";
                echo "<th>Year</th>";
                echo "<th>Course</th>";
                echo "<th>Email</th>";
                echo "<th>Name</th>";
                echo "<th>Birthday</th>";
                echo "<th>Gender</th>";
                echo "<th>Number</th>";
                echo "<th>Address</td>";
                echo "<th>Guardian</th>";
                echo "</tr>";

                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>{$row['student_number']}</td>";
                    echo "<td>{$row['year_level']}</td>";
                    echo "<td>{$row['course']}</td>";
                    echo "<td>{$row['user_email']}</td>";
                    echo "<td>{$row['full_name']}</td>";
                    echo "<td>{$row['b_date']}</td>";
                    echo "<td>{$row['gender']}</td>";
                    echo "<td>{$row['contact_number']}</td>";
                    echo "<td>{$row['address']}</td>";
                    echo "<td>{$row['guardian_name']}</td>";
                    echo "</tr>";
                }   

                echo "</table>";
            } else {
                echo "<p>No students found.</p>";
            }
            ?>

        </div>
        </div>

            </div>
        </div>
    </div>
    <script>
        document.getElementById("logoutButton").addEventListener("click", function() {
            window.location.href = "logout.php";
        });
    </script>
    <script>
                function openPopup() {
            var studentId = document.getElementById("studentId").value;
            var course = document.getElementById("course").value;
            var year = document.getElementById("year").value;
            var semester = document.getElementById("semester").value;
            var popupContent = document.getElementById("popupContent");

            popupContent.innerHTML = `<p>Selected Year: ${year}</p><p>Selected Semester: ${semester}</p>`;

            // Fetch data for the specified student ID and course from fetch_data.php
            fetch("fetch_data.php?studentId=" + studentId + "&course=" + course + "&year=" + year + "&semester=" + semester)
                .then(response => response.text())
                .then(data => {
                    popupContent.innerHTML = data;
                    document.getElementById("popup").style.display = "block";
                })
                .catch(error => console.error('Error:', error));
        }
        
        // Function to close the popup
        function closePopup() {
            document.getElementById("popup").style.display = "none";
        }
        
        // Function to print data
        function printData() {
            window.print();
        }

        // Additional scripts as needed

        // Function to initialize the form
        function initializeForm() {
            // Add any initialization logic for your form here
            document.getElementById("registrationForm").onsubmit = function(event) {
                event.preventDefault(); // Prevent the default form submission
                openPopup();
            };
        }

        // Load user profile data if needed
        function loadUserProfile() {
            // You can add logic here to fetch and display user profile data on the client side
        }

        function showContent(page) {
            var mainContent = document.getElementById('main-content');

            fetch(page)
                .then(response => response.text())
                .then(data => {
                    mainContent.innerHTML = data;


                    if (page === 'get_students.php') {
                        loadStudentData();
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    mainContent.innerHTML = '<p>Error loading content.</p>';
                });
        }

        function loadStudentData() {
            var studentContainer = document.getElementById('student-container');

            var xhr = new XMLHttpRequest();
            xhr.onreadystatechange = function() {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    studentContainer.innerHTML = xhr.responseText;
                }
            };
            xhr.open('GET', 'get_students.php', true);
            xhr.send();
        } 

    // Inside the <script> tag in your HTML file

function showContent(page) {
    var mainContent = document.getElementById('main-content');

    fetch(page)
        .then(response => response.text())
        .then(data => {
            mainContent.innerHTML = data;

            // Additional logic for specific pages
            if (page === 'get_students.php') {
                loadStudentData();
            } else if (page === 'user_profile.php') {
                // Load user profile data if needed
                loadUserProfile();
            } else if (page === 'form.php') {
                    // Load form data if needed
                    initializeForm();
            }
        })
        .catch(error => {
            console.error('Error:', error);
            mainContent.innerHTML = '<p>Error loading content.</p>';
        });
}

function loadUserProfile() {
    // You can add logic here to fetch and display user profile data on the client side
}
function initializeForm() {
        // Add any initialization logic for your form here
        document.getElementById("registrationForm").onsubmit = function(event) {
            event.preventDefault(); // Prevent the default form submission
            openPopup();
        };
    }

    function searchDashboard() {
            var keyword = document.getElementById("keyword").value;

            // Use Fetch API to send an AJAX request to the server
            fetch('get_course.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded',
                },
                body: 'keyword=' + encodeURIComponent(keyword),
            })
            .then(response => response.text())
            .then(data => {
                document.getElementById('main-content').innerHTML = data;
            })
            .catch(error => {
                console.error('Error:', error);
            });
        }


        function searchStudents() {
            var keyword = document.getElementById("keyword").value;

            // Use Fetch API to send an AJAX request to the server
            fetch('get_students.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded',
                },
                body: 'keyword=' + encodeURIComponent(keyword),
            })
            .then(response => response.text())
            .then(data => {
                document.getElementById('main-content').innerHTML = data;
            })
            .catch(error => {
                console.error('Error:', error);
            });
        }

        function searchSched() {
            var keyword = document.getElementById("keyword").value;

            // Use Fetch API to send an AJAX request to the server
            fetch('get_schedule.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded',
                },
                body: 'keyword=' + encodeURIComponent(keyword),
            })
            .then(response => response.text())
            .then(data => {
                document.getElementById('main-content').innerHTML = data;
            })
            .catch(error => {
                console.error('Error:', error);
            });
        }

        function searchSubject() {
            var keyword = document.getElementById("keyword").value;

            // Use Fetch API to send an AJAX request to the server
            fetch('get_subject.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded',
                },
                body: 'keyword=' + encodeURIComponent(keyword),
            })
            .then(response => response.text())
            .then(data => {
                document.getElementById('main-content').innerHTML = data;
            })
            .catch(error => {
                console.error('Error:', error);
            });
        }
    
    </script>
    
</body>
</html>
