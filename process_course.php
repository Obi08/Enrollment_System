<?php
// Ensure that the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Replace these credentials with your actual database credentials
    $host = "localhost";
    $username = "root";  // Default MySQL username
    $password = "";      // Empty password for XAMPP
    $database = "enrollment_system";
    
    
    $conn = new mysqli($host, $username, $password, $database);
    
    // Check the connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Retrieve form data
    $course_name = $_POST['course_name'];
    $course_description = $_POST['course_description'];

    // SQL query to insert data into the 'course' table
    $sql = "INSERT INTO course (course_name, course_description) VALUES ('$course_name', '$course_description')";

    // Execute the query
    if ($conn->query($sql) === TRUE) {
        echo "Course added successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close the database connection
    $conn->close();
} else {
    // Handle cases where the form is not submitted
    echo "Invalid request!";
}
?>
