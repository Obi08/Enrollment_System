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
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <style>
    .content-container {
      display: flex;
      justify-content: space-around;
      align-items: center;
    }

    .box {
      text-align: center;
      padding: 20px;
      border: 1px solid #ccc;
      border-radius: 8px;
      width: 200px;
      background-color: #eaeaea; /* Set your desired background color */
      margin: 0 10px; /* Add some margin for spacing */
    }

    .box i {
      font-size: 36px;
      margin-bottom: 10px;
    }
  </style>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body class="my-custom-class">
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
            margin-top: 20px;
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
</body>
</html>
