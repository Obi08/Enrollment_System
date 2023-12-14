<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Registration Form</title>
    <!-- Add Bootstrap CSS link -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/your-correct-font-awesome-kit-id.js" crossorigin="anonymous"></script>
    <style>
        body {
            background-color: #f8f9fa;
            padding: 20px;
            font-family: 'Arial', sans-serif;
        }
        form {
            max-width: 600px;
            margin: 0 auto;
            background-color: #fff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
        }
        h2 {
            text-align: center;
            color: #007bff;
            margin-bottom: 30px;
        }
        label {
            font-weight: bold;
            color: #555;
        }
        .form-group {
            margin-bottom: 25px;
        }
        button[type="submit"] {
            background-color: #28a745;
            color: #fff;
            transition: background-color 0.3s ease;
        }
        button[type="submit"]:hover {
            background-color: #218838;
        }
        .profile-btn {
            display: flex;
            align-items: center;
            justify-content: flex-end;
            margin-bottom: 20px;
        }
        .profile-btn button {
            width: auto;
            background-color: #007bff;
            color: #fff;
            transition: background-color 0.3s ease;
        }
        .profile-btn button:hover {
            background-color: #0056b3;
        }
        .modal-content {
            border-radius: 8px;
        }
        .modal-title {
            color: #007bff;
        }
    </style>
</head>
<body>
<?php
// Include your existing connection logic
include('db.php');

// Check if the user is logged in and get the username
session_start();

if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];

    // Retrieve user information from the database based on the username
    $sql = "SELECT full_name, username FROM users WHERE username = '$username'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $currentFullname = $row["full_name"];
        $currentUsername = $row["username"];
    } else {
        // Handle the case when no user is found
        $currentFullname = "N/A";
        $currentUsername = "N/A";
    }
} else {
    // Redirect to login page if the user is not logged in
    header("Location: login.php");
    exit();
}

// Close the database connection
$conn->close();
?>
    <div class="container">
        <div class="profile-btn">
            <button type="button" class="btn btn-info" data-toggle="modal" data-target="#profileModal">
                <i class="fas fa-user"></i> Profile
            </button>
        </div>

        <h2 class="mt-4">Student Registration Form</h2>
        <form action="user_registration_form_process.php" method="post">
            <div class="form-group">
                <label for="year_level">Year Level:</label>
                <select class="form-control" id="year_level" name="year_level" placeholder="Choose your year" required>
                    <option value="1">1st Year</option>
                    <option value="2">2nd Year</option>
                    <option value="3">3rd Year</option>
                    <option value="4">4th Year</option>
                </select>
            </div>
            <div class="form-group">
                <label for="course">Year Level:</label>
                <select class="form-control" id="course" name="course" placeholder="Choose your course" required>
                    <option value="BSEMC">BSEMC</option>
                    <option value="BSIT">BSIT</option>
                    <option value="BSCS">BSCS</option>
                    <option value="BSIS">BSIS</option>
                </select>
            </div>
            <div class="form-group">
                <label for="semester">Select Semester to enroll:</label>
                <select class="form-control" id="semester" name="semester" placeholder="Select Semester" required>
                    <option value="1">Semester 1</option>
                    <option value="2">Semester 2</option>
                </select>
            </div>
            

            <div class="form-group">
                <label for="student_number">Student Number:</label>
                <input type="text" class="form-control" id="student_number" name="student_number" placeholder="Enter your student number" required>
            </div>
            <div class="form-group">
                <label for="full_name">Full Name:</label>
                <input type="text" class="form-control" id="full_name" name="full_name" placeholder="Enter your full name" required>
            </div>
            <div class="form-group">
             <label for="user_email">Email Address:</label>
            <input type="email" class="form-control" id="user_email" name="user_email" placeholder="Enter your email" required>
            </div>

            <div class="form-group">
                <label for="birthday">Birthday:</label>
                <input type="date" class="form-control" id="birthday" name="birthday"  placeholder="Enter your Birth date" required>
            </div>
            <div class="form-group">
                <label for="gender">Gender:</label>
                <select class="form-control" id="gender" name="gender" placeholder="Choose your gender" required>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                    <option value="other">Other</option>
                </select>
            </div>
            <div class="form-group">
                <label for="contact">Contact Number (11 digits only):</label>
                <input type="number" class="form-control" id="contact" name="contact" placeholder="Enter your number" title="Please enter 11 digits." required>
            </div>
            <div class="form-group">
                <label for="address">Address:</label>
                <textarea class="form-control" id="address" name="address" placeholder="Enter your address"  rows="3" required></textarea>
            </div>
            <div class="form-group">
                <label for="guardian">Guardian Name:</label>
                <input type="text" class="form-control" id="guardian" name="guardian" placeholder="Enter your guardian name"  required>
            </div>

            <!-- Other form fields ... -->

            <button type="submit" name="sendMailBtn" class="btn btn-primary">Register</button>
        </form>
        <div class="modal fade" id="profileModal" tabindex="-1" role="dialog" aria-labelledby="profileModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="profileModalLabel">My Profile</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
    <!-- Display the actual fullname and username from the database -->
    <p>Full Name: <span id="currentFullname"><?php echo $currentFullname; ?></span></p>
    <p>Username: <span id="currentUsername"><?php echo $currentUsername; ?></span></p>

    <!-- Form to change username/password -->
    <form action="update_profile.php" method="post">
        <div class="form-group">
            <label for="newUsername">New Username:</label>
            <input type="text" class="form-control" id="newUsername" name="newUsername" required>
        </div>
        <div class="form-group">
            <label for="newPassword">New Password:</label>
            <input type="password" class="form-control" id="newPassword" name="newPassword" required>
        </div>
        <button type="submit" class="btn btn-primary" name="updateProfileBtn">Save Changes</button>
    </form>
</div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" onclick="goToHomepage()">Sign out</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>



        <!-- Profile Modal ... -->

    </div>
    <script>
        function goToHomepage() {
            window.location.href = 'login.php';
        }
    </script> 

    <!-- Add Bootstrap JS and Popper.js (if not already included) -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>
</html>
