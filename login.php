<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <style>
        /* login.css */

        body {  
            font-family: 'Arial', sans-serif;
            background-image: url('Congress.png');
            background-position: center;
            background-size: cover;
            background-repeat: no-repeat;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .login-container {
            max-width: 400px;
            background-color: rgba(255, 255, 255, 0.8);
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
            opacity: 1;
        }

        h2 {
            color: #333;
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            color: #333;
            text-align: left;
            margin-left: 0px;
        }

        input {
            width: 100%;
            padding: 12px; /* Increase padding for a more comfortable feel */
            margin-bottom: 16px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 8px; /* Rounded corners for input fields */
            outline: none;
            transition: border-color 0.3s ease; /* Smooth transition on focus */
        }

        input:focus {
            border-color: #3498db;
        }

        /* Add a subtle box shadow on focus */
        input:focus {
            box-shadow: 0 0 5px rgba(52, 152, 219, 0.5);
        }

        button {
            background-color: #3498db;
            color: #fff;
            padding: 12px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #2980b9;
        }

        .home-button {
            position: absolute;
            top: 10px;
            right: 10px;
            width: 100px;
            font-family: myFont;
        }

        a {
            color: #3498db;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }

        p {
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <h2>Login</h2>
        <form action="login_process.php" method="post">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" placeholder="Enter your username" required>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" placeholder="Enter your password" required>

            <button type="submit">Login</button>
            <button class="btn btn-primary home-button" onclick="goToHomepage()">Home</button>
        </form>

        <p>Don't have an account? <a href="register.php">Register here</a>.</p>
    </div>

    <script>
        function goToHomepage() {
            window.location.href = 'index.php';
        }
    </script>
</body>
</html>
