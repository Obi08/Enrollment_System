<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Database connection settings
    $host = "localhost";
    $username = "root";  // Default MySQL username
    $password = "";      // Empty password for XAMPP
    $database = "enrollment_system";
    
    
    $conn = new mysqli($host, $username, $password, $database);
    
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Collect form data
    $courseName = $conn->real_escape_string($_POST["course_name"]);
    $courseDescription = $conn->real_escape_string($_POST["course_description"]);

    // Insert data into the database
    $sql = "INSERT INTO course (name, description) VALUES ('$courseName', '$courseDescription')";

    if ($conn->query($sql) === TRUE) {
      // Registration successful! Display alert message and redirect to the registration form
      echo '<script>alert("Added course successfuly!"); window.location.href = "dashboard.php";</script>';
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    
    // Close the database connection (optional if you want to explicitly close it)
    $conn->close();
}
?>