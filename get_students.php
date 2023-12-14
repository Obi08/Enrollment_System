        <?php
        // Ensure proper database connection
        include('db.php');

        // Initialize variables
        $keyword = "";
        $result = null;

        // Check if the form is submitted
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $keyword = $_POST['keyword'];
            $sql = "SELECT * FROM student_data WHERE student_number LIKE '%$keyword%' OR full_name LIKE '%$keyword%' OR gender LIKE '%$keyword%' OR year_level LIKE '%$keyword%' OR course LIKE '%$keyword%'";
            $result = $conn->query($sql);
        } else {
            // If the form is not submitted, fetch all data
            $sql = "SELECT * FROM student_data";
            $result = $conn->query($sql);
        }

        // Close the database connection
        $conn->close();
        ?>

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Student Data</title>
        <style>
            body {
                font-family: Arial, sans-serif;
                background-color: #f4f4f4;
                margin: 0;
                padding: 0;
            }

            header {
                background-color: #262F32;
                color: white;
                text-align: center;
                padding: 10px;
            }

            table {
                font-size: 12px;
                width: 100%;
                border-collapse: collapse;
                margin-top: 20px;
                background-color: white;
                box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            }

            th, td {
                padding: 12px 15px;
                text-align: left;
                border-bottom: 1px solid #ddd;
                color: #262F32;
            }

            th {
                background-color: #262F32;
                color: white;
                position: sticky;
                top: 0;
                z-index: 1;
            }

            tr:hover {
                background-color: #f5f5f5;
            }

            tr:nth-child(even) {
                background-color: #f9f9f9;
            }

            p {
                text-align: center;
                margin-top: 20px;
                font-weight: bold;
            }

            .search-form {
                margin: 20px 0;
                padding-left: 10px;
            }

            label {
                display: inline-block;
                margin-bottom: 5px;
            }

            input[type="text"] {
                width: 200px;
                padding: 8px;
            }

            button {
                padding: 8px 15px;
                background-color: #262F32;
                color: white;
                border: none;
                cursor: pointer;
            }
        </style>
    </head>
    <body>
        <header>
            <h1>Student List</h1>
        </header>

        <!-- Search Form -->
        <form class="search-form" id="searchForm" method="post" action="" onsubmit="searchStudents(); return false;">
        <input type="text" name="keyword" id="keyword" value="<?php echo htmlspecialchars($keyword); ?>">
        <button type="submit">Search</button>
        </form>

        <?php
        // Display student data in a table
        if ($result !== null && $result->num_rows > 0) {
            echo "<table>";
            echo "<tr>";
            echo "<th>Student Number</th>";
            echo "<th>Year</th>";
            echo "<th>Course</th>";
            echo "<th>Email</th>";
            echo "<th>Name</th>";
            echo "<th>Birthday</th>";
            echo "<th>Gender</th>";
            echo "<th>Number</th>";
            echo "<th>Address</td>";
            echo "<th>Guardian</th>";
            echo "</tr>";

            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>{$row['student_number']}</td>";
                echo "<td>{$row['year_level']}</td>";
                echo "<td>{$row['course']}</td>";
                echo "<td>{$row['user_email']}</td>";
                echo "<td>{$row['full_name']}</td>";
                echo "<td>{$row['b_date']}</td>";
                echo "<td>{$row['gender']}</td>";
                echo "<td>{$row['contact_number']}</td>";
                echo "<td>{$row['address']}</td>";
                echo "<td>{$row['guardian_name']}</td>";
                echo "</tr>";
            }   
            echo "</table>";
        } else {
            echo "<p>No students found.</p>";
        }
        ?>
        
    </body>
    </html>
