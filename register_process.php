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
    $full_name = mysqli_real_escape_string($connection, $_POST['full_name']);
    $email = mysqli_real_escape_string($connection, $_POST['email']);
    $username = mysqli_real_escape_string($connection, $_POST['username']);
    $password = mysqli_real_escape_string($connection, $_POST['password']);
    $confirm_password = mysqli_real_escape_string($connection, $_POST['confirm_password']);

    // Check if the username is already taken
    $checkQuery = "SELECT * FROM users WHERE username = '$username'";
    $checkResult = mysqli_query($connection, $checkQuery);

    if ($checkResult && mysqli_num_rows($checkResult) > 0) {
        // Username already taken
        echo '<script>';
        echo 'alert("Username \'' . $username . '\' is already taken. Please choose a different username.");';
        echo 'window.location.href = "register.php";';
        echo '</script>';
    } elseif ($password !== $confirm_password) {
        // Passwords do not match
        echo '<script>';
        echo 'alert("Passwords do not match.");';
        echo 'window.location.href = "register.php";';
        echo '</script>';
    } else {
        // Passwords match, proceed with registration

        // Hash the password before storing it in the database
        $hashed_password = password_hash($password, PASSWORD_BCRYPT);

        // Insert user data into the database
        $query = "INSERT INTO users (full_name, email, username, password, user_type) VALUES ('$full_name', '$email', '$username', '$hashed_password','student')";
        $result = mysqli_query($connection, $query);

        if ($result) {
            // Registration successful
            echo '<script>';
            echo 'alert("User registered successfully!");';
            echo 'window.location.href = "login.php";';
            echo '</script>';
        } else {
            // Registration failed, display MySQL error
            echo '<script>';
            echo 'alert("Registration failed. MySQL Error: ' . mysqli_error($connection) . '");';
            echo 'window.location.href = "register.php";';
            echo '</script>';
        }
    }

    // Close the database connection
    mysqli_close($connection);
}
?>
