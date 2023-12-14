<!-- fetch_data.php -->

<?php
// I-update ang mga sumusunod na credentials para sa iyong database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "enrollment_system";

// Lumikha ng connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check ang koneksyon
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

echo '<div style="font-family: Arial, sans-serif; max-width: 600px; margin: 20px auto; padding: 20px; border: 1px solid #ccc; text-align: left; font-weight: bold;">';

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["studentId"]) && isset($_GET["course"])) {
    // Get the student ID and course from the URL
    $studentId = $_GET["studentId"];
    $course = $_GET["course"];
    $year = isset($_GET["year"]) ? $_GET["year"] : "";
    $semester = isset($_GET["semester"]) ? $_GET["semester"] : "";

    // Fetch data for the specified student ID and course from the first table
    $sql = "SELECT * FROM student_data WHERE student_number = $studentId";
    $result = $conn->query($sql);

    // Fetch data for the specified student ID and course from the second table
    $table = $course === "BSIT" ? "course_schedule" : "it_schedule";
    $sql2 = "SELECT * FROM $table";
    $result2 = $conn->query($sql2);

    if ($result->num_rows > 0) {
        // Output data of the specified student
        $row = $result->fetch_assoc();
        echo '<div class="student-info">';
        echo "<p>NAME: " . $row["full_name"] . "</p>";
        echo "<p>STUDENT NUMBER: " . $row["student_number"] . "</p>";
        echo "<p>COURSE: " . $row["course"] . "</p>";
        echo "<p>Year: $year</p>";
        echo "<p>Semester: $semester</p>";
        echo '</div>';
        // Add more data fields as needed
    } else {
        echo "No data found for the specified ID.";
    }
    // Output data from the second table
    echo '<h2>Schedule</h2>';
    if ($result2->num_rows > 0) {
        // Output data from the second table in a table format
        echo '<table style="width:100px; border-collapse: collapse; margin-top: 20px;">';
        echo "<tr><th>Subject Code</th><th>Units</th><th>Description</th><th>Time</th><th>Day</th><th>Room</th><th>Professor</th></tr>";
        while ($row2 = $result2->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row2["subject_code"] . "</td>";
            echo "<td>" . $row2["units"] . "</td>";
            echo "<td>" . $row2["subject_description"] . "</td>";
            echo "<td>" . $row2["time"] . "</td>";
            echo "<td>" . $row2["day"] . "</td>";
            echo "<td>" . $row2["room"] . "</td>";
            echo "<td>" . $row2["professor"] . "</td>";
            // Add more data fields as needed
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "<p>No data found for the specified course in Table 2.</p>";
    }
}

echo '</div>';
$conn->close();
?>