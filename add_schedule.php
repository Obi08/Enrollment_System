<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Subject Form</title>
    <style>
        body {
            background-color: #f8f8f8;
            margin: 0;
            padding: 0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        form {
            background-color: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            width: 400px;
            max-width: 100%;
            margin: 0 auto;
            margin-top: 50px;
            transition: transform 0.3s ease-in-out;
        }

        form:hover {
            transform: scale(1.02);
        }

        h2 {
            text-align: center;
            color: #333;
            font-size: 20px;
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 10px;
            color: #555;
            font-size: 16px;
        }

        input {
            width: 100%;
            padding: 12px;
            margin-bottom: 20px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 6px;
            font-size: 12px;
            transition: border-color 0.3s;
        }

        input:focus {
            border-color: #4caf50; /* Highlight border on focus */
        }

        .my-button {
            background-color: #4caf50;
            color: white;
            padding: 14px 24px;
            font-size: 18px;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            display: inline-block;
            transition: background-color 0.3s;
        }

        .my-button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <form action="add_schedule_process.php" method="post">
        <h2>ADD SCHEDULE</h2>
        <!-- New dropdown select for table selection -->
        <div>
            <label for="table">Select Course</label>
            <select name="table" required>
                <option value="course_schedule">BSEMC</option>
                <option value="it_schedule">BSIT</option>
                <!-- Add more options for other tables if needed -->
            </select>
        </div>
        
        <div>
            <label for="subject_code">Subject Code:</label>
            <input type="text" name="subject_code" required>
        </div>
        <div>
            <label for="subject_description">Subject Description:</label>
            <input type="text" name="subject_description" required>
        </div>
        <div>
            <label for="units">Units:</label>
            <input type="text" name="units" required>
        </div>

        <div>
            <label for="time">Time:</label>
            <input type="time" name="time" required>
        </div>
        <div>
            <label for="day">Day:</label>
            <input type="text" name="day" required>
        </div>
        <div>
            <label for="room">Room:</label>
            <input type="text" name="room" required>
        </div>
        <div>
            <label for="professor">Professor:</label>
            <input type="text" name="professor" required>
        </div>
        <input type="submit" class="my-button" value="Add Schedule">
    </form>
</body>
</html>
