<?php
include('db.php');

// Initialize variables
$keyword = "";
$result = null;

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $keyword = $_POST['keyword'];
    $sql = "SELECT * FROM student_subject WHERE subject_code LIKE '%$keyword%' OR subject_description LIKE '%$keyword%'";
    $result = $conn->query($sql);
    
} else {
    // If the form is not submitted, fetch all data
    $sql = "SELECT * FROM student_subject";
    $result = $conn->query($sql);
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Subject Data</title>
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
            font-size: 14px;
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
        .search-form{
            padding-top: 20px;
            padding-left: 10px;
        }
        button {
            padding: 8px 15px;
            background-color: #262F32;
            color: white;
            border: none;
            cursor: pointer;
        }
        input[type="text"] {
            width: 200px;
            padding: 8px;
        }
        label {
            display: inline-block;
            margin-bottom: 5px;
        }
        .search-form {
            margin: 20px 0;
        }
    </style>
</head>
<body>
    <header>
        <h1>Subject List</h1>
    </header>
    <form class="search-form" id="searchForm" method="post" action="" onsubmit="searchSubject(); return false;">
    <input type="text" name="keyword" id="keyword" value="<?php echo htmlspecialchars($keyword); ?>">
    <button type="submit">Search</button>
    </form>

    <?php
    $count = 1;
    if ($result !== null && $result->num_rows > 0) {
        echo "<table>";
        echo "<tr>";
        echo "<th>NO.</th>";
        echo "<th>SUBJECT CODE</th>";
        echo "<th>SUBJECT DESCRIPTION</th>";
        echo "</tr>";

        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>{$count}</td>";
            echo "<td>{$row['subject_code']}</td>";
            echo "<td>{$row['subject_description']}</td>";
            $count++;
            echo "</tr>";
        }

        echo "</table>";
    } else {
        echo "<p>No subject found.</p>";
    }
    ?>
</body>
</html>
