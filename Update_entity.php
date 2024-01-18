<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="refresh" content="3;more_sql_exercise.php">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <title>Edited Table</title>
</head>
<body>
    <?php
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "studentrecord";

        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        //Update Student
        if(isset($_POST['student_update'])) {
            $id = $_POST['id'];
            $firstName = $_POST['first_name'];
            $lastName = $_POST['last_name'];
            $dateOfBirth = $_POST['date_of_birth'];
            $email = $_POST['email'];
            $phone = $_POST['phone'];
            $edited = 0;

        if ($firstName != null) {
            $sql = "UPDATE Student SET FirstName='$firstName' WHERE StudentID=$id";
            $conn->query($sql);
            $edited = 1;
        }

        if ($lastName != null){
            $sql = "UPDATE Student SET LastName='$lastName' WHERE StudentID=$id";
            $conn->query($sql);
            $edited = 1;
        }

        if ($dateOfBirth != null){
            $sql = "UPDATE Student SET DateOfBirth='$dateOfBirth' WHERE StudentID=$id";
            $conn->query($sql);
            $edited = 1;
        }

        if ($email != null){
            $sql = "UPDATE Student SET Email='$email' WHERE StudentID=$id";
            $conn->query($sql);
            $edited = 1;
        }

        if ($phone != null){
            $sql = "UPDATE Student SET Phone='$phone' WHERE StudentID=$id";
            $conn->query($sql);
            $edited = 1;
        }

        if ($edited === 1) {
            echo "Updated Student ID = $id";
        } else {
            echo "Error updating entity: " . $conn->error;
        }
    }

    //Update Course
    else if(isset($_POST['course_update'])) {
        $id = $_POST['id'];
        $courseName = $_POST['course_name'];
        $credits = $_POST['credits'];
        $edited = 0;

        if ($courseName != null){
            $sql = "UPDATE Course SET CourseName='$courseName' WHERE CourseID=$id";
            $conn->query($sql);
            $edited = 1;
        }

        if ($credits != null){
            $sql = "UPDATE Course SET CreditsName='$creditsName' WHERE CourseID=$id";
            $conn->query($sql);
            $edited = 1;
        }

        if ($edited === 1) {
            echo "Updated Course ID = $id";
        } else {
            echo "Error updating entity: " . $conn->error;
        }
    }

    //Update Instructor
    else if(isset($_POST['instructor_update'])) {
        $id = $_POST['id'];
        $firstName = $_POST['first_name'];
        $lastName = $_POST['last_name'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $edited = 0;

        if ($firstName != null) {
            $sql = "UPDATE Instructor SET FirstName='$firstName' WHERE InstructorID=$id";
            $conn->query($sql);
            $edited = 1;
        }

        if ($lastName != null) {
            $sql = "UPDATE Instructor SET LastName='$lastName' WHERE InstructorID=$id";
            $conn->query($sql);
            $edited = 1;
        }

        if ($email != null) {
            $sql = "UPDATE Instructor SET Email='$email' WHERE InstructorID=$id";
            $conn->query($sql);
            $edited = 1;
        }

        if ($phone != null) {
            $sql = "UPDATE Instructor SET Phone='$phone' WHERE InstructorID=$id";
            $conn->query($sql);
            $edited = 1;
        }

        if ($edited === 1) {
            echo "Updated Instructor ID = $id";
        } else {
            echo "Error updating entity: " . $conn->error;
        }
    }

    //Update Course
    else if(isset($_POST['enrollment_update'])) {
        $id = $_POST['id'];
        $studentId = $_POST['student_id'];
        $courseId = $_POST['course_id'];
        $enrollmentDate = $_POST['enrollment_date'];
        $grade = $_POST['grade'];
        $edited = 0;

        if ($studentId != null) {
            $sql = "UPDATE Enrollment SET StudentID='$studentId' WHERE EnrollmentID=$id";
            $conn->query($sql);
            $edited = 1;
        }

        if ($courseId != null) {
            $sql = "UPDATE Enrollment SET CourseID='$courseId' WHERE EnrollmentID=$id";
            $conn->query($sql);
            $edited = 1;
        }

        if ($enrollmentDate != null) {
            $sql = "UPDATE Enrollment SET EnrollmentDate='$enrollmentDate' WHERE EnrollmentID=$id";
            $conn->query($sql);
            $edited = 1;
        }
        if ($grade != null){
            $sql = "UPDATE Enrollment SET Grade='$grade' WHERE EnrollmentID=$id";
            $conn->query($sql);
            $edited = 1;
        }

        if ($edited === 1) {
            echo "Updated Enrollment ID = $id";
        } else {
            echo "Error updating entity: " . $conn->error;
        }
    }

    $conn->close();
    ?>
</body>
</html>