<?php
include('db.php');

// Initialize variables
$keyword = "";
$result = null;

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $keyword = $_POST['keyword'];
    $sql = "SELECT * FROM course WHERE name LIKE '%$keyword%' OR description LIKE '%$keyword%'";
    $result = $conn->query($sql);
    
} else {
    // If the form is not submitted, fetch all data
    $sql = "SELECT * FROM course";
    $result = $conn->query($sql);
}

$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Course Data</title>
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

        .table-container {
            max-height: 300px; /* Set the maximum height for the table */
            overflow: auto; /* Enable scrolling for the container */
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
            white-space: nowrap; /* Prevent text wrapping */
            color: #262F32;
        }

        th {
            background-color: #262F32;
            color: white;
        }
        th {
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
        <h1>Course List</h1>
    </header>

<form class="search-form" id="searchForm" method="post" action="" onsubmit="searchDashboard(); return false;">
    <input type="text" name="keyword" id="keyword" value="<?php echo htmlspecialchars($keyword); ?>">
    <button type="submit">Search</button>
</form>

    <?php
    $count = 1;
    if ($result !== null && $result->num_rows > 0) {
        echo "<div class='table-container'>";
        echo "<table>";
        echo "<tr>";
        echo "<th>NO.</th>";
        echo "<th>COURSE NAME</th>";
        echo "<th>COURSE DESCRIPTION</th>";
        echo "</tr>";

        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>{$count}</td>";
            echo "<td>{$row['name']}</td>";
            echo "<td>{$row['description']}</td>";
            $count++;
            echo "</tr>";
        }

        echo "</table>";
    } else {
        echo "<p>No course found.</p>";
    }
    ?>
    
</body>
</html>
