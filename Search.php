<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Results</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="mb-3 mt-3">
    <?php
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "studentrecord";

        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $searchTerm = $_GET['search'];
    ?>

    <div class="container mb-3 mt-5">
        <h1>Seach Results</h1>
    </div>

    <div class="container mb-5 mt-5">
        <h2>Table: Student</h2>
        <table class="table table-striped">
            <tr>
                <td>Student ID</td>
                <td>First Name</td>
                <td>Last Name</td>
                <td>Date of Birth</td>
                <td>Email</td>
                <td>Phone</td>
            </tr>
            <?php

            $sqlStudent = "SELECT * FROM Student WHERE ";
            $columnStudent = ['StudentID', 'FirstName', 'LastName', 'DateOfBirth', 'Email', 'Phone'];

            $conditionStudent = [];
            foreach ($columnStudent as $column) {
                $conditionStudent[] = "$column LIKE '%$searchTerm'";
            }

            $sqlStudent .= implode(" OR ", $conditionsStudent);

            $resultStudent = $conn->query($sqlStudent);

            if ($resultsStudent->num_rows > 0) {
                while ($row = $resultStudent->fetch_assoc()) {
                    echo "<tr><td>" .$row["StudentID"]. "</td>";
                    echo "<td>" .$row["FirstName"]. "</td>";
                    echo "<td>" .$row["LastName"]. "</td>";
                    echo "<td>" .$row["DateOfBirth"]. "</td>";
                    echo "<td>" .$row["Email"]. "</td>";
                    echo "<td>" .$row["Phone"]. "</td></tr>";
                }
            } else {
                echo "0 results from Student";
            }
        ?>
        </table>
    </div>

    <div class="container mb-5 mt-5">
        <h2>Table: Course</h2>
        <table class="table table-striped">
            <tr>
                <td>Course ID</td>
                <td>Course Name</td>
                <td>Credits</td>
            </tr>
            <?php

                $sqlCourse = "SELECT * FROM Course WHERE ";
                $columnCourse = ['CourseID', 'CourseName', 'Credits'];

                $conditionsCourse = [];
                foreach ($columnCourse as $column) {
                    $conditionsCourse[] = "$column LIKE '%$searchTerm'";
                }

                $sqlCourse .= implode(" OR ", $conditionsCourse);

                $resultsCourse = $conn->query($sqlCourse);

                if ($resultsCourse->num_rows > 0) {
                    while ($row = $resultsCourse->fetch_assoc()) {
                        echo "<tr><td>" .$row["CourseID"]. "</td>";
                        echo "<td>" .$row["CourseName"]. "</td>";
                        echo "<td>" .$row["Credits"]. "</td></tr>";
                    }
                } else {
                    echo "0 results from Course";
                }
            ?>
        </table>
    </div>

    <div class="container mb-5 mt-5">
        <h2>Table: Instructor</h2>
        <table class="table table-striped">
            <tr>
                <td>Instructor ID</td>
                <td>First Name</td>
                <td>Last Name</td>
                <td>Email</td>
                <td>Phone</td>
            </tr>
            <?php
                $sqlInstructor = "SELECT * FROM Instructor WHERE ";
                $columnInstructor = ['InstructorID', 'FirstName', 'LastName', 'Email', 'Phone'];

                $conditionsInstructor = [];
                foreach ($columnInstructor as $column) {
                    $conditionsInstructor[] = "$column LIKE '%$searchTerm'";
                }
                
                $sqlInstructor .= implode(" OR ", $conditionsInstructor);

                $resultsInstructor = $conn->query($sqlInstructor);

                if ($resultsInstructor->num_rows > 0) {
                    while ($row = $resultsInstructor->fetch_assoc()) {
                        echo "<tr><td>" .$row["InstructorID"]. "</td>";
                        echo "<td>" .$row["FirstName"]. "</td>";
                        echo "<td>" .$row["LastName"]. "</td>";
                        echo "<td>" .$row["Email"]. "</td>";
                        echo "<td>" .$row["Phone"]. "</td></tr>";
                    }
                } else {
                    echo "0 results from Instructor";
                }
            ?>
        </table>
    </div>
    
    <div class="container mb-5 mt-5">
        <h2>Table: Enrollment</h2>
        <table class="table table-striped">
            <tr>
                <td>Enrollment ID</td>
                <td>Student ID</td>
                <td>Course ID</td>
                <td>Enrollment Date</td>
                <td>Grade</td>
            </tr>
            <?php


                $sqlEnrollment = "SELECT * FROM Instructor WHERE ";
                $columnEnrollment = ['EnrollmentID', 'StudentID', 'CourseID', 'EnrollmentDate', 'Grade'];

                $conditionsEnrollment = [];
                foreach ($columnEnrollment as $column) {
                    $conditionsEnrollment[] = "$column LIKE '%$searchTerm'";
                }
                
                $sqlEnrollment .= implode(" OR ", $conditionsEnrollment);

                $resultsEnrollment = $conn->query($sqlEnrollment);

                if ($resultsEnrollment->num_rows > 0) {
                    while ($row = $resultsEnrollment->fetch_assoc()) {
                        echo "<tr><td>" .$row["EnrollmentID"]. "</td>";
                        echo "<td>" .$row["StudentID"]. "</td>";
                        echo "<td>" .$row["CourseID"]. "</td>";
                        echo "<td>" .$row["EnrollmentDate"]. "</td>";
                        echo "<td>" .$row["Grade"]. "</td></tr>";
                    }
                } else {
                    echo "0 results from Enrollment";
                }        
            ?>
        </table>
    </div>

    <?php
        $conn->close();
    ?>    
</body>
</html>