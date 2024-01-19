<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="refresh" content="3;final_project.php">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <title>Edit Table</title>
</head>
<body>
    <div class="container">
        <?php
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "mosawan";

            $conn = new mysqli($servername, $username, $password, $dbname);

            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            //Add user
            if(isset($_POST['user_add'])) {
                $username = $_POST['username'];
                $email = $_POST['email'];
                $passwd = $_POST['passwd'];

                $sql = "INSERT INTO Users (Username, Email, Passwd) VALUES ('$username', '$email', '$passwd')";

                if ($conn->query($sql) === TRUE) {
                    echo "Added User";
                } else {
                    echo "Error adding entity: " . $conn->error;
                }
            }

            //Add Student
            if(isset($_POST['student_add'])) {
                $firstname = $_POST['first_name'];
                $lastName = $_POST['last_name'];
                $dateOfBirth = $_POST['date_of_birth'];
                $email = $_POST['email'];
                $phone = $_POST['phone'];


                $sql = "INSERT INTO Student (FirstName, LastName, DateOfBirth, Email, Phone) VALUES ('$firstName', '$lastName', '$dateOfBirth', '$email', '$phone')";

                if ($conn->query($sql) === TRUE) {
                    echo "Added Student";
                } else {
                    echo "Error adding entity: " . $conn->error;
                }
            }

            //Add Course
            else if(isset($_POST['course_add'])) {
                $coursename = $_POST['course_name'];
                $credits = $_POST['credits'];

                $sql = "INSERT INTO Course (CourseName, Credits) VALUES ('$courseName', '$credits')";

                if ($conn->query($sql) === TRUE) {
                    echo "Added Course";
                } else {
                    echo "Error adding entity: " . $conn->error;
                }
            }

            //Add Instructor
            else if(isset($_POST['instructor_add'])) {
                $firstname = $_POST['first_name'];
                $lastName = $_POST['last_name'];
                $email = $_POST['email'];
                $phone = $_POST['phone'];

                $sql = "INSERT INTO Student (FirstName, LastName, Email, Phone) VALUES ('$firstName', '$lastName','$email', '$phone')";

                if ($conn->query($sql) === TRUE) {
                    echo "Added Instructor";
                } else {
                    echo "Error adding entity: " . $conn->error;
                }
            }

            //Add Enrollment
            else if(isset($_POST['enrollment_add'])) {
                $studentId = $_POST['student_id'];
                $courseId = $_POST['course_id'];
                $enrollmentDate = $_POST['enrollment_date'];
                $grade = $_POST['grade'];

                $sql = "INSERT INTO Enrollment (StudentID, CourseID, EnrollmentDate, Grade) VALUES ('$studentId', '$courseId','$enrollmentDate', '$grade')";

                if ($conn->query($sql) === TRUE) {
                    echo "Added Enrollment";
                } else {
                    echo "Error adding entity: " . $conn->error;
                }
            }

            //Update Users
            else if(isset($_POST['users_update'])) {
                $id = $_POST['id'];
                $username = $_POST['username'];
                $email = $_POST['email'];
                $passwd = $_POST['passwd'];
                $edited = 0;

                if ($username != null) {
                    $sql = "UPDATE Users SET Username='$username' WHERE UserID=$id";
                    $conn->query($sql);
                    $edited = 1;
                }

                if ($email != null) {
                    $sql = "UPDATE Users SET Email='$email' WHERE UserID=$id";
                    $conn->query($sql);
                    $edited = 1;
                }

                if ($passwd != null) {
                    $sql = "UPDATE Users SET Passwd='$passwd' WHERE UserID=$id";
                    $conn->query($sql);
                    $edited = 1;
                }

                if ($edited === 1) {
                    echo "Updated User ID = $id";
                } else {
                    echo "Error adding entity: " . $conn->error;
                }
            }

            //Update Student
            else if(isset($_POST['student_update'])) {
                $id = $_POST['id'];
                $firstName = $_POST['first_name'];
                $lastName = $_POST['last_name'];
                $dateOfBirth = $_POST['date_of_birth'];
                $email = $_POST['email'];
                $passwd = $_POST['passwd'];
                $edited = 0;

                if ($firstname != null) {
                    $sql = "UPDATE Student SET FirstName='$firstName' WHERE StudentID=$id";
                    $conn->query($sql);
                    $edited = 1;
                }

                if ($lastName != null) {
                    $sql = "UPDATE Student SET LastName='$lastName' WHERE StudentID=$id";
                    $conn->query($sql);
                    $edited = 1;
                }

                if ($dateOfBirth != null) {
                    $sql = "UPDATE Student SET DateOfBirth='$dateOfBirth' WHERE StudentID=$id";
                    $conn->query($sql);
                    $edited = 1;
                }

                if ($email != null) {
                    $sql = "UPDATE Student SET Email='$email' WHERE StudentID=$id";
                    $conn->query($sql);
                    $edited = 1;
                }

                if ($phone != null) {
                    $sql = "UPDATE Student SET Phone='$phone' WHERE StudentID=$id";
                    $conn->query($sql);
                    $edited = 1;
                }

                if ($edited === 1) {
                    echo "Updated Student ID = $id";
                } else {
                    echo "Error adding entity: " . $conn->error;
                }
            }
            
            //Update Course
            else if(isset($_POST['course_update'])) {
                $id = $_POST['id'];
                $coursename = $_POST['course_name'];
                $credits = $_POST['credits'];
                $edited = 0;

                if ($courseNme != null) {
                    $sql = "UPDATE Course SET CourseName='$courseName' WHERE CourseID=$id";
                    $conn->query($sql);
                    $edited = 1;
                }

                if ($credits != null) {
                    $sql = "UPDATE Course SET Credits='$credits' WHERE CourseID=$id";
                    $conn->query($sql);
                    $edited = 1;
                }

                if ($edited === 1) {
                    echo "Updated Course ID = $id";
                } else {
                    echo "Error adding entity: " . $conn->error;
                }
            }

            //Update Instructor
            else if(isset($_POST['instructor_update'])) {
                $id = $_POST['id'];
                $firstName = $_POST['first_name'];
                $lastName = $_POST['last_name'];
                $email = $_POST['email'];
                $passwd = $_POST['passwd'];
                $edited = 0;

                if ($firstname != null) {
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
                    echo "Error adding entity: " . $conn->error;
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

                if ($grade != null) {
                    $sql = "UPDATE Enrollment SET Grade='$grade' WHERE EnrollmentID=$id";
                    $conn->query($sql);
                    $edited = 1;
                }

                if ($edited === 1) {
                    echo "Updated Enrollment ID = $id";
                } else {
                    echo "Error adding entity: " . $conn->error;
                }
            }

            //Delete User
            else if(isset($_POST['users_delete'])) {
                $id = $_POST['id'];

                $sql = "DELETE FROM Users WHERE UserID = $id";

                try{
                    if ($conn->query($sql) === TRUE) {
                        echo "Deleted User";
                    } else {
                        echo "Error deleting entity: " . $conn->error;
                    }
                }catch(Exeption $e){
                    echo "Cannot delete user.";
                }

            }
            
            //Delete Student
            else if(isset($_POST['student_delete'])) {
                $id = $_POST['id'];

                $sql = "DELETE FROM Student WHERE StudentID = $id";

                try{
                    if ($conn->query($sql) === TRUE) {
                        echo "Deleted Student";
                    } else {
                        echo "Error deleting entity: " . $conn->error;
                    }
                }catch(Exeption $e){
                    echo "Cannot delete student. Student is connected with other tables.";
                }

            }

            //Delete Course
            else if(isset($_POST['course_delete'])) {
                $id = $_POST['id'];

                $sql = "DELETE FROM Course WHERE CourseID = $id";

                try{
                    if ($conn->query($sql) === TRUE) {
                        echo "Deleted Course";
                    } else {
                        echo "Error deleting entity: " . $conn->error;
                    }
                }catch(Exeption $e){
                    echo "Cannot delete Course. Course is connected with other tables.";
                }

            }

            //Delete Instructor
            else if(isset($_POST['instructor_delete'])) {
                $id = $_POST['id'];

                $sql = "DELETE FROM Instructor WHERE InstructorID = $id";

                try{
                    if ($conn->query($sql) === TRUE) {
                        echo "Deleted Instructor";
                    } else {
                        echo "Error deleting entity: " . $conn->error;
                    }
                }catch(Exeption $e){
                    echo "Cannot delete Instructor. Instructor is connected with other tables.";
                }

            }

            //Delete Enrollment
            else if(isset($_POST['enrollment_delete'])) {
                $id = $_POST['id'];

                $sql = "DELETE FROM Enrollment WHERE EnrollmentID = $id";

                try{
                    if ($conn->query($sql) === TRUE) {
                        echo "Deleted Enrollment";
                    } else {
                        echo "Error deleting entity: " . $conn->error;
                    }
                }catch(Exeption $e){
                    echo "Cannot delete Enrollment. Enrollment is connected with other tables.";
                }

            }


            $conn->close();
        ?>
    </div>
    
</body>
</html>