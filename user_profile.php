<!-- user_profile.php -->

<?php
include('db.php');
session_start(); // Ensure that the session is started

// Check if the user is logged in
if (!isset($_SESSION["username"])) {
    echo "User not logged in.";
    exit();
}

// Assuming you have a users table with columns: id, username, email, etc.
$query = "SELECT * FROM users WHERE username = '{$_SESSION["username"]}'";
$result = $conn->query($query);

if ($result->num_rows > 0) {
    $user = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>User Profile</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 0;
            height: 100vh;
        }

        header {
            background-color: #333;
            padding: 10px;
            text-align: center;
            color: white;
        }

        nav {
            background-color: #444;
            padding: 10px;
            text-align: center;
        }

        nav a {
            color: white;
            text-decoration: none;
            padding: 10px;
            margin: 0 10px;
            font-weight: bold;
        }

        .profile-container {
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            width: 300px;
            text-align: left;
            margin: 0 auto;
            margin-top: 150px;
        }

        h2 {
            color: #333;
            text-align: center;
        }

        p {
            color: #555;
        }
    </style>
</head>
<body>
    <div class="profile-container">
        <h2>User Profile</h2>
        <p><strong>Username:</strong> <?php echo $user["username"]; ?></p>
        <p><strong>Name:</strong> <?php echo $user["full_name"]; ?></p>
        <p><strong>Email:</strong> <?php echo $user["email"]; ?></p>
        <!-- Add more user profile information as needed -->
    </div>
</body>
</html>

<?php
} else {
    echo "<p>User not found</p>";
}
?>
