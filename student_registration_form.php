<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Registration Form</title>
</head>
<body>

    <h2>Student Registration Form</h2>

    <form action="process_form.php" method="post">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required>

        <label for="studentNumber">Student Number:</label>
        <input type="text" id="studentNumber" name="studentNumber" required>

        <label for="courseYearSection">Course/Year/Section:</label>
        <input type="text" id="courseYearSection" name="courseYearSection" required>

        <label for="semester">Semester:</label>
        <input type="text" id="semester" name="semester" required>

        <label for="schoolYear">School Year:</label>
        <input type="text" id="schoolYear" name="schoolYear" required>

        <label for="date">Date:</label>
        <input type="date" id="date" name="date" required>

        <hr>

        <h3>Schedule Information</h3>

        <label for="subjectCode">Subject Code:</label>
        <input type="text" id="subjectCode" name="subjectCode" required>

        <label for="subjectName">Subject Name:</label>
        <input type="text" id="subjectName" name="subjectName" required>

        <label for="units">Units:</label>
        <input type="text" id="units" name="units" required>

        <label for="time">Time:</label>
        <input type="text" id="time" name="time" required>

        <label for="day">Day:</label>
        <input type="text" id="day" name="day" required>

        <label for="room">Room:</label>
        <input type="text" id="room" name="room" required>

        <label for="professor">Professor:</label>
        <input type="text" id="professor" name="professor" required>

        <hr>

        <input type="submit" value="Submit">
    </form>

</body>
</html>
