<?php
// Include the database connection file
include('db.php');

// Retrieve form data
$student_number = $_POST['student_number'];
$course = $_POST['course'];
$semester = $_POST['semester'];
$year_level = $_POST['year_level'];
$user_email = $_POST['user_email'];
$full_name = $_POST['full_name'];
$b_date = $_POST['birthday'];
$gender = $_POST['gender'];
$contact_number = $_POST['contact'];
$address = $_POST['address'];
$guardian_name = $_POST['guardian'];

// SQL query to insert data into the student_data table
$sql = "INSERT INTO student_data (student_number, course, semester, year_level, user_email, full_name, b_date, gender, contact_number, address, guardian_name) 
        VALUES ('$student_number','$course','$semester','$year_level','$user_email','$full_name', '$b_date', '$gender', '$contact_number', '$address', '$guardian_name')";

if ($conn->query($sql) ===  TRUE) {
    // Registration successful! Display alert message and redirect to the registration form
    echo '<script>alert("Registration successful!"); window.location.href = "user_registration_form.php";</script>';
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Close the database connection (optional if you want to explicitly close it)
$conn->close();
?>
