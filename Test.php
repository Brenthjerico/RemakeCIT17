<!DOCTYPE html>
<html>
<head>
    <title>Show/Hide Form</title>
    <style>
        #myForm{
            display: none;
        }
        $myForm1{
            display: none;
        }
        .button-row{
            display: inline-block;
        }
    </style>
</head>
<body>
    <div class="button-row">
        <button onclick="toggleForm"></button>
        <button onclick="toggleForm1"></button>
    </div>


    <form id="myForm" method="post" action="add_entity.php">
        <input type="text" name="first_name" placeholder="First Name" required>
        <input type="text" name="last_name" placeholder="Last Name" required>
        <input type="date" name="date_of_birth" placeholder="Date of Birth" required>
        <input type="text" name="email" placeholder="Email" required>
        <input type="text" name="phone" placeholder="Phone" required>
        <input type="submit" name="student_add" value="Add Student" required>
    </form>

    <form id="myForm1 method="post" action="add_entity.php">
        <input type="text" name="first_name" placeholder="First Name" required>
        <input type="text" name="last_name" placeholder="Last Name" required>
        <input type="text" name="email" placeholder="Email" required>
        <input type="text" name="phone" placeholder="Phone" required>
        <input type="submit" name="instructor_add" value="Add Instructor" required>
    </form>
    
    <script>
        function toggleForm() {
            var form = document.getElementById("myForm");
            var form1 = document.getElementById("myForm1");
            if (form.style.display === "none") {
                form.style.display = "block";
                form1.style.display = "none"
            } else {
                form.style.display = "none";
            }
        }

        function toggleForm1() {
            var form = document.getElementById("myForm");
            var form1 = document.getElementById("myForm1");
            if (form1.style.display === "none") {
                form.style.display = "none";
                form.style.display = "block";
            } else {
                form1.style.display = "none";
            }
        }
                
    </script>
</body>    
</html>