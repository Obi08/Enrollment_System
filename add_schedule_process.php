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
    $selectedTable = $_POST["table"];
    $subject_code = $conn->real_escape_string($_POST["subject_code"]);
    $units = $conn->real_escape_string($_POST["units"]);
    $subject_description = $conn->real_escape_string($_POST["subject_description"]);
    $time = $conn->real_escape_string($_POST["time"]);
    $day = $conn->real_escape_string($_POST["day"]);
    $room = $conn->real_escape_string($_POST["room"]);
    $professor = $conn->real_escape_string($_POST["professor"]);

    // Insert data into the subjects table
    $subjectInsertSql = "INSERT INTO student_subject (subject_code, subject_description) VALUES ('$subject_code', '$subject_description')";
    
    if ($conn->query($subjectInsertSql) === TRUE) {
        // Retrieve the ID of the newly inserted subject
        $subjectId = $conn->insert_id;

        // Insert data into the respective schedule table using the subject ID
        $scheduleInsertSql = "INSERT INTO $selectedTable (subject_code, units, subject_description, time, day, room, professor) VALUES ('$subject_code', '$units', '$subject_description', '$time', '$day', '$room', '$professor')";
        
        if ($conn->query($scheduleInsertSql) === TRUE) {
            // Registration successful! Display alert message and redirect to the dashboard
            echo '<script>alert("Added course successfully!"); window.location.href = "dashboard.php";</script>';
        } else {
            echo "Error inserting into $selectedTable table: " . $conn->error;
        }
    } else {
        echo "Error inserting into subjects table: " . $conn->error;
    }
    
    // Close the database connection
    $conn->close();
}
?>
