<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Information System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="mb-3 mt-3">
    <?php
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "mosawan";
        
        $conn = new mysqli($servername, $username, $password, $dbname);
        
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
    ?>

    <div class="container mb-3">
        <form action="search_final.php" method="GET">
            <label for="search">Search:</label>
            <input type="text" id="search" name="search">
            <button type="submit">Submit</button>
        </form>
    </div>

    <!-- Users Table  -->

    <div class="container mb-5 mt-5">
        <h2>Table: Users</h2>
        <table class="table table-striped">
            <tr>
                <td>User ID</td>
                <td>Username</td>
                <td>Email</td>
                <td>Password</td>
            </tr>
            <?php
                $sqlUsers = "SELECT * FROM Users";
                $resultUsers = $conn->query($sqlUsers);

                if ($resultUsers){
                    while ($row = $resultUsers->fetch_assoc()) {
                        echo "<tr><td>" .$row["UserID"]. "</td>";
                        echo "<td>" .$row["Username"]. "</td>";
                        echo "<td>" .$row["Email"]. "</td>";
                        echo "<td>" .$row["Passwd"]. "</td></tr>";
                    }
                }
                else {
                    echo "Error: " . $sql . "<br>" . $conn->error;
                }
            ?>
        </table>
        <button onclick="toggleFormUsersCreate()">Add</button>
        <button onclick="toggleFormUsersUpdate()">Update</button>
        <button onclick="toggleFormUsersDelete()">Delete</button>

        <div class="mt-3">
            <form id="UsersFormCreate" method="post" action="table_edit.php" style="display: none;">
                <h4>Add User</h4>
                <input type="text" name="username" placeholder="Username">
                <input type="text" name="email" placeholder="Email">
                <input type="text" name="passwd" placeholder="Password">
                <input type="submit" name="users_add" value="Add User">
            </form>

            <form id="UsersFormUpdate" method="post" action="table_edit.php" style="display: none;">
                <h4>Update User</h4>
                <input type="text" name="id" placeholder="User ID" required>
                <input type="text" name="username" placeholder="Username">
                <input type="text" name="email" placeholder="Email">
                <input type="text" name="passwd" placeholder="Password">
                <input type="submit" name="users_update" value="Update User">
            </form>

            <form id="UsersFormDelete" method="post" action="table_edit.php" style="display: none;">
                <h4>Delete User</h4>
                <input type="text" name="id" placeholder="User ID" required>
                <input type="submit" name="users_delete" value="Delete user">
            </form>
        </div>
    </div>

    <!-- Student Table  -->

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
                $sqlStudent = "SELECT * FROM Student";
                $resultStudent = $conn->query($sqlStudent);

                if ($resultStudent){
                    while ($row = $resultStudent->fetch_assoc()) {
                        echo "<tr><td>" .$row["StudentID"]. "</td>";
                        echo "<td>" .$row["FirstName"]. "</td>";
                        echo "<td>" .$row["LastName"]. "</td>";
                        echo "<td>" .$row["DateOfBirth"]. "</td>";
                        echo "<td>" .$row["Email"]. "</td>";
                        echo "<td>" .$row["Phone"]. "</td></tr>";
                    }
                }
                else {
                    echo "Error: " . $sql . "<br>" . $conn->error;
                }
            ?>
        </table>
        <button onclick="toggleFormStudentCreate()">Add</button>
        <button onclick="toggleFormStudentUpdate()">Update</button>
        <button onclick="toggleFormStudentDelete()">Delete</button>

        <div class="mt-3">
            <form id="StudentFormCreate" method="post" action="table_edit.php" style="display: none;">
                <h4>Add Student</h4>
                <input type="text" name="first_name" placeholder="First Name">
                <input type="text" name="last_name" placeholder="Last Name">
                <input type="date" name="date_of_birth" placeholder="Date of Birth">
                <input type="text" name="email" placeholder="Email" >
                <input type="text" name="phone" placeholder="Phone" >
                <input type="submit" name="student_add" value="Add Student">
            </form>

            <form id="StudentFormUpdate" method="post" action="table_edit.php" style="display: none;">
                <h4>Update Student</h4>
                <input type="text" name="id" placeholder="Student ID" required>
                <input type="text" name="first_name" placeholder="First Name" >
                <input type="text" name="last_name" placeholder="Last Name" >
                <input type="date" name="date_of_birth" placeholder="Date of Birth" >
                <input type="text" name="email" placeholder="Email" >
                <input type="text" name="phone" placeholder="Phone" >
                <input type="submit" name="student_update" value="Update Student">
            </form>

            <form id="StudentFormDelete" method="post" action="table_edit.php" style="display: none;">
                <h4>Delete Student</h4>
                <input type="text" name="id" placeholder="Student ID" required>
                <input type="submit" name="student_delete" value="Delete Student">
            </form>
        </div>
    </div>

    <!-- Course Table -->

    <div class="container mb-5 mt-5">
        <h2>Table: Course</h2>
        <table class="table table-striped">
            <tr>
                <td>Course ID</td>
                <td>Course Name</td>
                <td>Credits</td>
            </tr>
            <?php
                echo "<br>";
                $sqlCourse = "SELECT * FROM Course";
                $resultCourse = $conn->query($sqlCourse);

                if ($resultCourse){
                    while ($row = $resultCourse->fetch_assoc()) {
                        echo "<tr><td>" .$row["CourseID"]. "</td>";
                        echo "<td>" .$row["CourseName"]. "</td>";
                        echo "<td>" .$row["Credits"]. "</td></tr>";
                    }
                }
                else {
                    echo "Error: " . $sql . "<br>" . $conn->error;
                }
            ?>
        </table>

        <button onclick="toggleFormCourseCreate()">Add</button>
        <button onclick="toggleFormCourseUpdate()">Update</button>
        <button onclick="toggleFormCourseDelete()">Delete</button>
    
        <div class="mt-3">
            <form id="CourseFormCreate" method="post" action="table_edit.php" style="display: none;">
                <h4>Add Course</h4>
                <input type="text" name="course_name" placeholder="Course Name" >
                <input type="text" name="credits" placeholder="Credits" >
                <input type="submit" name="course_add" value="Add Course">
            </form>

            <form id="CourseFormUpdate" method="post" action="table_edit.php" style="display: none;">
                <h4>Update Course</h4>
                <input type="text" name="id" placeholder="Course ID" required>
                <input type="text" name="course_name" placeholder="Course Name" >
                <input type="text" name="credits" placeholder="Credits" >
                <input type="submit" name="course_update" value="Update Course">
            </form>

            <form id="CourseFormDelete" method="post" action="table_edit.php" style="display: none;">
                <h4>Delete Course</h4>
                <input type="text" name="id" placeholder="Course ID" required>
                <input type="submit" name="course_delete" value="Delete Course">
            </form>
        </div>
    </div>

    <!-- Instructor Table -->

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
                echo "<br>";
                $sqlInst = "SELECT * FROM Instructor";
                $resultInst = $conn->query($sqlInst);

                if ($resultInst){
                    while ($row = $resultInst->fetch_assoc()) {
                        echo "<tr><td>" .$row["InstructorID"]. "</td>";
                        echo "<td>" .$row["FirstName"]. "</td>";
                        echo "<td>" .$row["LastName"]. "</td>";
                        echo "<td>" .$row["Email"]. "</td>";
                        echo "<td>" .$row["Phone"]. "</td></tr>";
                    }
                }
                else {
                    echo "Error: " . $sql . "<br>" . $conn->error;
                }
            ?>
        </table>

        <button onclick="toggleFormInstructorCreate()">Add</button>
        <button onclick="toggleFormInstructorUpdate()">Update</button>
        <button onclick="toggleFormInstructorDelete()">Delete</button>

        <div class="mt-3">
            <form id="InstructorFormCreate" method="post" action="table_edit.php" style="display: none;">
                <h4>Add Instructor</h4>
                <input type="text" name="first_name" placeholder="First Name" >
                <input type="text" name="last_name" placeholder="Last Name" >
                <input type="text" name="email" placeholder="Email" >
                <input type="text" name="phone" placeholder="Phone" >
                <input type="submit" name="instructor_add" value="Add Instructor">
            </form>

            <form id="InstructorFormUpdate" method="post" action="table_edit.php" style="display: none;">
                <h4>Update Instructor</h4>
                <input type="text" name="id" placeholder="Instructor ID" required>
                <input type="text" name="first_name" placeholder="First Name" >
                <input type="text" name="last_name" placeholder="Last Name" >
                <input type="text" name="email" placeholder="Email" >
                <input type="text" name="phone" placeholder="Phone" >
                <input type="submit" name="instructor_update" value="Update Instructor">
            </form>

            <form id="InstructorFormDelete" method="post" action="table_edit.php" style="display: none;">
                <h4>Delete Instructor</h4>
                <input type="text" name="id" placeholder="Instructor ID" required>
                <input type="submit" name="instructor_delete" value="Delete Instructor">
            </form>
        </div>
    
        
    </div>
    
    <!-- Enrollment Table -->

    <div class="container mb-5 mt-5">
        <h2>Table: Enrollment</h2>
        <table class="table table-striped">
            <tr>
                <td>Enrollment ID</td>
                <td>Student ID</td>
                <td>Course ID</td>
                <td>Enrollemnt Date</td>
                <td>Grade</td>

            </tr>
            <?php
                echo "<br>";
                $sqlEnroll = "SELECT * FROM Enrollment";
                $resultEnroll = $conn->query($sqlEnroll);

                if ($resultEnroll){
                    while ($row = $resultEnroll->fetch_assoc()) {
                        echo "<tr><td>" .$row["EnrollmentID"]. "</td>";
                        echo "<td>" .$row["StudentID"]. "</td>";
                        echo "<td>" .$row["CourseID"]. "</td>";
                        echo "<td>" .$row["EnrollmentDate"]. "</td>";
                        echo "<td>" .$row["Grade"]. "</td></tr>";
                    }
                }
                else {
                    echo "Error: " . $sql . "<br>" . $conn->error;
                }
            ?>
        </table>

        <button onclick="toggleFormEnrollmentCreate()">Add</button>
        <button onclick="toggleFormEnrollmentUpdate()">Update</button>
        <button onclick="toggleFormEnrollmentDelete()">Delete</button>
    
        <div class="mt-3">
            <form id="EnrollmentFormCreate" method="post" action="table_edit.php" style="display: none;">
                <h4>Add Enrollment</h4>
                <input type="text" name="student_id" placeholder="Student ID" >
                <input type="text" name="course_id" placeholder="Course ID" >
                <input type="date" name="enrollment_date" placeholder="Enrollment Date" >
                <input type="text" name="grade" placeholder="Grade">
                <input type="submit" name="enrollment_add" value="Add Enrollment">
            </form>

            <form id="EnrollmentFormUpdate" method="post" action="table_edit.php" style="display: none;">
                <h4>Update Enrollment</h4>
                <input type="text" name="id" placeholder="Enrollment ID" required>
                <input type="text" name="student_id" placeholder="Student ID" >
                <input type="text" name="course_id" placeholder="Course ID" >
                <input type="date" name="enrollment_date" placeholder="Enrollment Date" >
                <input type="text" name="grade" placeholder="Grade">
                <input type="submit" name="enrollment_update" value="Update Enrollment">
            </form>

            <form id="EnrollmentFormDelete" method="post" action="table_edit.php" style="display: none;">
                <h4>Delete Enrollment</h4>
                <input type="text" name="id" placeholder="Enrollment ID" required>
                <input type="submit" name="enrollment_delete" value="Delete Enrollment">
            </form>
        </div>
    </div>



    <?php
        $conn->close(); 
    ?>
    <script>
        function toggleFormUsersCreate() {
            var form = document.getElementById("UsersFormCreate");
            var form1 = document.getElementById("UsersFormUpdate");
            var form2 = document.getElementById("UsersFormDelete");
            if (form.style.display === "none") {
                form.style.display = "block";
                form1.style.display = "none";
                form2.style.display = "none";
            } else {
                form.style.display = "none";
            }
        }

        function toggleFormUsersUpdate() {
            var form = document.getElementById("UsersFormUpdate");
            var form1 = document.getElementById("UsersFormCreate");
            var form2 = document.getElementById("UsersFormDelete");
            if (form.style.display === "none") {
                form.style.display = "block";
                form1.style.display = "none";
                form2.style.display = "none";
            } else {
                form.style.display = "none";
            }
        }

        function toggleFormUsersDelete() {
            var form = document.getElementById("UsersFormDelete");
            var form1 = document.getElementById("UsersFormCreate");
            var form2 = document.getElementById("UsersFormUpdate");
            if (form.style.display === "none") {
                form.style.display = "block";
                form1.style.display = "none";
                form2.style.display = "none";
            } else {
                form.style.display = "none";
            }
        }

        function toggleFormStudentCreate() {
            var form = document.getElementById("StudentFormCreate");
            var form1 = document.getElementById("StudentFormUpdate");
            var form2 = document.getElementById("StudentFormDelete");
            if (form.style.display === "none") {
                form.style.display = "block";
                form1.style.display = "none";
                form2.style.display = "none";
            } else {
                form.style.display = "none";
            }
        }

        function toggleFormStudentUpdate() {
            var form = document.getElementById("StudentFormUpdate");
            var form1 = document.getElementById("StudentFormCreate");
            var form2 = document.getElementById("StudentFormDelete");
            if (form.style.display === "none") {
                form.style.display = "block";
                form1.style.display = "none";
                form2.style.display = "none";
            } else {
                form.style.display = "none";
            }
        }

        function toggleFormStudentDelete() {
            var form = document.getElementById("StudentFormDelete");
            var form1 = document.getElementById("StudentFormCreate");
            var form2 = document.getElementById("StudentFormUpdate");
            if (form.style.display === "none") {
                form.style.display = "block";
                form1.style.display = "none";
                form2.style.display = "none";
            } else {
                form.style.display = "none";
            }
        }

        function toggleFormCourseCreate() {
            var form = document.getElementById("CourseFormCreate");
            var form1 = document.getElementById("CourseFormUpdate");
            var form2 = document.getElementById("CourseFormDelete");
            if (form.style.display === "none") {
                form.style.display = "block";
                form1.style.display = "none";
                form2.style.display = "none";
            } else {
                form.style.display = "none";
            }
        }

        function toggleFormCourseUpdate() {
            var form = document.getElementById("CourseFormUpdate");
            var form1 = document.getElementById("CourseFormCreate");
            var form2 = document.getElementById("CourseFormDelete");
            if (form.style.display === "none") {
                form.style.display = "block";
                form1.style.display = "none";
                form2.style.display = "none";
            } else {
                form.style.display = "none";
            }
        }

        function toggleFormCourseDelete() {
            var form = document.getElementById("CourseFormDelete");
            var form1 = document.getElementById("CourseFormCreate");
            var form2 = document.getElementById("CourseFormUpdate");
            if (form.style.display === "none") {
                form.style.display = "block";
                form1.style.display = "none";
                form2.style.display = "none";
            } else {
                form.style.display = "none";
            }
        }

        function toggleFormInstructorCreate() {
            var form = document.getElementById("InstructorFormCreate");
            var form1 = document.getElementById("InstructorFormDelete");
            var form2 = document.getElementById("InstructorFormUpdate");
            if (form.style.display === "none") {
                form.style.display = "block";
                form1.style.display = "none";
                form2.style.display = "none";
            } else {
                form.style.display = "none";
            }
        }

        function toggleFormInstructorUpdate() {
            var form = document.getElementById("InstructorFormUpdate");
            var form1 = document.getElementById("InstructorFormCreate");
            var form2 = document.getElementById("InstructorFormDelete");
            if (form.style.display === "none") {
                form.style.display = "block";
                form1.style.display = "none";
                form2.style.display = "none";
            } else {
                form.style.display = "none";
            }
        }

        function toggleFormInstructorDelete() {
            var form = document.getElementById("InstructorFormDelete");
            var form1 = document.getElementById("InstructorFormCreate");
            var form2 = document.getElementById("InstructorFormUpdate");
            if (form.style.display === "none") {
                form.style.display = "block";
                form1.style.display = "none";
                form2.style.display = "none";
            } else {
                form.style.display = "none";
            }
        }

        function toggleFormEnrollmentCreate() {
            var form = document.getElementById("EnrollmentFormCreate");
            var form1 = document.getElementById("EnrollmentFormDelete");
            var form2 = document.getElementById("EnrollmentFormUpdate");
            if (form.style.display === "none") {
                form.style.display = "block";
                form1.style.display = "none";
                form2.style.display = "none";
            } else {
                form.style.display = "none";
            }
        }

        function toggleFormEnrollmentUpdate() {
            var form = document.getElementById("EnrollmentFormUpdate");
            var form1 = document.getElementById("EnrollmentFormDelete");
            var form2 = document.getElementById("EnrollmentFormCreate");
            if (form.style.display === "none") {
                form.style.display = "block";
                form1.style.display = "none";
                form2.style.display = "none";
            } else {
                form.style.display = "none";
            }
        }

        function toggleFormEnrollmentDelete() {
            var form = document.getElementById("EnrollmentFormDelete");
            var form1 = document.getElementById("EnrollmentFormCreate");
            var form2 = document.getElementById("EnrollmentFormUpdate");
            if (form.style.display === "none") {
                form.style.display = "block";
                form1.style.display = "none";
                form2.style.display = "none";
            } else {
                form.style.display = "none";
            }
        }
    </script>

</body>
</html>