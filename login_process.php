<?php
include 'db.php'; // Include your database connection file

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Create a database connection
    $connection = mysqli_connect($host, $username, $password, $database);

    // Check if the connection was successful
    if (!$connection) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Collect user inputs
    $username = mysqli_real_escape_string($connection, $_POST['username']);
    $password = mysqli_real_escape_string($connection, $_POST['password']);

    // Fetch user data from the database
    $query = "SELECT * FROM users WHERE username = '$username'";
    $result = mysqli_query($connection, $query);

    if ($result) {
        if (mysqli_num_rows($result) > 0) {
            // User found, verify the password
            $row = mysqli_fetch_assoc($result);
            if (password_verify($password, $row['password'])) {
                // Password is correct, redirect to Dashboard
                session_start();
                $_SESSION['username'] = $username;
                if($row['user_type'] == "student"){
                    header("Location: user_registration_form.php");
                }else{
                    header("Location: dashboard.php");
                }
                exit();
            } else {
                // Incorrect password
                echo '<script>';
                echo 'alert("Incorrect password. Please try again.");';
                echo 'window.location.href = "login.php";';
                echo '</script>';
            }
        } else {
            // User not found
            echo '<script>';
            echo 'alert("Username not found.");';
            echo 'window.location.href = "login.php";';
            echo '</script>';
        }
    } else {
        // Query execution failed
        echo '<script>';
        echo 'alert("Login failed. MySQL Error: ' . mysqli_error($connection) . '");';
        echo 'window.location.href = "login.php";';
        echo '</script>';
    }

    // Close the database connection
    mysqli_close($connection);
}
?>
