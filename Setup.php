<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="refresh" content="5;final_project.php">
    <title>Create Database</title>
</head>
<body>
    <?php
        $servername = "localhost";
        $username = "root";
        $password = "";

        $conn = new mysqli($servername, $username, $password);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        //Create Database

        $create_db = "CREATE DATABASE IF NOT EXISTS mosawan";
        if ($conn->query($create_db === true)){
            echo "Database Created";
        } else {
            echo "Error creating database: ".$conn->error;
        }

        $conn->select_db("mosawan");

        //Create Tables

        $create_users = "CREATE TABLE IF NOT EXISTS Users (
            UserID int NOT NULL AUTO_INCREMENT,
            Username varchar(255),
            Email varchar(255),
            Passwd varchar(255),
            PRIMARY KEY (UserID),
        )";

        $create_student = "CREATE TABLE IF NOT EXISTS Student (
            StudentID int NOT NULL AUTO_INCREMENT,
            FirstName varchar(255),
            LastName varchar(255),
            DateOfBirth date,
            Email varchar(255),
            Phone varchar(255),
            PRIMARY KEY (StudentID),
        )";

        $create_course = "CREATE TABLE IF NOT EXISTS Course (
            CourseID int NOT NULL AUTO_INCREMENT,
            CourseName varchar(255),
            Credits int,
            PRIMARY KEY (CourseID),
        )";

        $create_instructor = "CREATE TABLE IF NOT EXISTS Instructor (
            InstructorID int NOT NULL AUTO_INCREMENT,
            FirstName varchar(255),
            LastName varchar(255),
            Email varchar(255),
            Phone varchar(255),
            PRIMARY KEY (InstructorID),
        )";

        $create_Enrollment = "CREATE TABLE IF NOT EXISTS Enrollment (
            EnrollmentID int NOT NULL AUTO_INCREMENT,
            StudentID int,
            CourseID int,
            EnrollmentDate date,
            Grade int,
            PRIMARY KEY (EnrollmentID),
            FOREIGN KEY (StudentID) REFERENCES Student(StudentID),
            FOREIGN KEY (CourseID) REFERENCES Course(CourseID),
        )";

        $conn->query($create_users);
        $conn->query($create_student);
        $conn->query($create_course);
        $conn->query($create_instructor);
        $conn->query($create_enrollemnt);

        //Create Contents of Tables

        $users = "INSERT INTO Users (Username, Email, Passwd)
            VALUES ('User1', 'user@gmail.com', 'password'),
            ('User2', 'user@gmail.com', '987654321'),
            ('User3', 'user@gmail.com', 0987654321)";

        $student = "INSERT INTO Student (FirstName, LastName, DateOfBirth, Email, Phone)
            VALUES ('qwe', 'qwerty', '04-22-2002', 'qwerty@gmail.com', 09876543210),
            ('qwer', 'qwertyu', '05-23-2003', 'qwertyu@gmail.com', 09876543211),
            ('qwert', 'qwertyui', '06-24-2004', 'qwertyui@gmail.com', 09876543212)";

        $course = "INSERT INTO Course (Coursename, Credits)
            VALUES ('Test', 'Course', 81),
            ('qwe', 82),
            ('Game Course', 83)";

        $instructor = "INSERT INTO Instructor (FirstName, LastName, Email, Phone)
            VALUES ('qwe', 'qwerty', 'qwerty@gmail.com', 09876543210),
            ('qwer', 'qwertyu', 'qwertyu@gmail.com', 09876543211),
            ('qwert', 'qwertyui', 'qwertyui@gmail.com', 09876543212)";

        $enrollment = "INSERT INTO Enrollment (StudentID, CourseID, EnrollmentDate, Grade)
        VALUES ('12-2334-222', 'cit18', '01-04-2024', 90),
        ('13-2434-212', 'cit18', '01-04-2024', 91)
        ('14-2534-232', 'cit18', '01-04-2024', 92)";

        $conn->query($users);
        $conn->query($student);
        $conn->query($course);
        $conn->query($instructor);
        $conn->query($enrollment);

        $conn->close(); 

        echo "<br><br>Redirecting in 5 seconds...";
    ?>
</body>
</html>