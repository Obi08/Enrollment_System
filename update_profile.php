<?php
// Include your existing connection logic
include('db.php');

// Check if the user is logged in and get the username
session_start();

if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];

    // Retrieve user ID from the database based on the username
    $getIdSql = "SELECT id FROM users WHERE username = '$username'";
    $getIdResult = $conn->query($getIdSql);

    if ($getIdResult->num_rows > 0) {
        $row = $getIdResult->fetch_assoc();
        $id = $row["id"];

        if (isset($_POST['updateProfileBtn'])) {
            // Retrieve new username and password from the form
            $newUsername = $_POST['newUsername'];
            $newPassword = password_hash($_POST['newPassword'], PASSWORD_BCRYPT); // Hash the password

            // Update the database with the new values
            $updateSql = "UPDATE users SET username = '$newUsername', password = '$newPassword' WHERE id = $id";

            if ($conn->query($updateSql) === TRUE) {
                // Profile update successful
                echo '<script>';
                echo 'console.log("Update button clicked!");';
                echo 'alert("Profile updated successfully!");';
                echo 'window.location.href = "user_registration_form.php";';
                echo '</script>';
            } else {    
                // Profile update failed, display MySQL error
                echo '<script>';
                echo 'alert("Profile update failed. MySQL Error: ' . mysqli_error($connection) . '");';
                echo 'window.location.href = "user_registration_form.php";'; // Redirect to the registration form
                echo '</script>';
            }
        }
    } else {
        // Handle the case when no user is found
        // Redirect to login page or display an error message
        header("Location: login.php");
        exit();
    }
} else {
    // Redirect to login page if the user is not logged in
    header("Location: login.php");
    exit();
}

// Close the database connection
$conn->close();
?>
