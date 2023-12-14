<?php
include('db.php');

// Initialize variables
$keyword = "";
$result = null;
$resultBSEMC = null;
$resultBSIT = null;

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $keyword = $_POST['keyword'];
    $sql = "SELECT * FROM course_schedule WHERE subject_description LIKE '%$keyword%' OR units LIKE '%$keyword%' OR day LIKE '%$keyword%' OR room LIKE '%$keyword%' OR professor LIKE '%$keyword%'";
    $result = $conn->query($sql);

    // Add another query for the second table
    $sqlAnotherTable = "SELECT * FROM it_schedule WHERE subject_description LIKE '%$keyword%' OR units LIKE '%$keyword%' OR day LIKE '%$keyword%' OR room LIKE '%$keyword%' OR professor LIKE '%$keyword%'";
    $resultAnotherTable = $conn->query($sqlAnotherTable);

} else {

    // If the form is not submitted, fetch all data
    $sql = "SELECT * FROM course_schedule";
    $result = $conn->query($sql);

    // Fetch data for the second table
    $sqlAnotherTable = "SELECT * FROM it_schedule";
    $resultAnotherTable = $conn->query($sqlAnotherTable);
        
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Course Data</title>
    <!-- Add your CSS styles here -->
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .sched {
            background-color: #262F32;
            color: white;
            text-align: center;
            padding: 10px;
        }
        
        header {
            background-color: #262F32;
            color: white;
            text-align: center;
            padding: 10px;
        }

        .table-container {
            max-height: 300px; /* Set the maximum height for the table */
            padding: 10px;
            overflow-y: auto;
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
            position: sticky;
            top: 0;
            z-index: 1;
        }
        td{
            font-size: 12px;
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
        <h1 class="sched">SCHEDULE</h1>
    </header>

    <form class="search-form" id="searchForm" method="post" action="" onsubmit="searchSched(); return false;">
    <input type="text" name="keyword" id="keyword" value="<?php echo htmlspecialchars($keyword); ?>">
    <button type="submit">Search</button>
</form>


    <?php
    
    $count = 1;
    if ($result !== null && $result->num_rows > 0) {
        echo "<div class='table-container'>";
        echo "<table>";
        echo"<header>BSEMC SCHEDULE</header>";
        echo "<tr>";
        echo "<th>NO.</th>";
        echo "<th>SUBJECT CODE</th>";
        echo "<th>UNITS</th>";
        echo "<th>SUBJECT DESCRIPTION</th>";
        echo "<th>TIME</th>";
        echo "<th>DAY</th>";
        echo "<th>ROOM</th>";
        echo "<th>PROFESSOR</th>";
        echo "</tr>";

        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>{$count}</td>";
            echo "<td>{$row['subject_code']}</td>";
            echo "<td>{$row['units']}</td>";
            echo "<td>{$row['subject_description']}</td>";
            echo "<td>{$row['time']}</td>";
            echo "<td>{$row['day']}</td>";
            echo "<td>{$row['room']}</td>";
            echo "<td>{$row['professor']}</td>";
            $count++;
            echo "</tr>";   
        }

        echo "</table>";
        echo "</div>";
    } else {
        echo "<p>No course found.</p>";
    }
    $count = 1;
    if ($resultAnotherTable !== null && $resultAnotherTable->num_rows > 0) {
        echo "<div class='table-container'>";
        echo "<table>";
        echo"<header>BSIT SCHEDULE</header>";
        echo "<tr>";
        echo "<th>NO.</th>";
        echo "<th>SUBJECT CODE</th>";
        echo "<th>UNITS</th>";
        echo "<th>SUBJECT DESCRIPTION</th>";
        echo "<th>TIME</th>";
        echo "<th>DAY</th>";
        echo "<th>ROOM</th>";
        echo "<th>PROFESSOR</th>";
        echo "</tr>";

        while ($row = $resultAnotherTable->fetch_assoc()) {
            echo "<tr>";
            echo "<td>{$count}</td>";
            echo "<td>{$row['subject_code']}</td>";
            echo "<td>{$row['units']}</td>";
            echo "<td>{$row['subject_description']}</td>";
            echo "<td>{$row['time']}</td>";
            echo "<td>{$row['day']}</td>";
            echo "<td>{$row['room']}</td>";
            echo "<td>{$row['professor']}</td>";
            $count++;
            echo "</tr>";   
        }

        echo "</table>";
        echo "</div>";
    } else {
        echo "<p>No data found for the second table.</p>";
    }
    ?>
</body>
</html>
