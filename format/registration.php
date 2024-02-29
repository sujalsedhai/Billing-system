<!DOCTYPE html>
<html>

<head>

    <link rel="stylesheet" href="../css/style.css">

    <script type="text/javascript">



        function validity() {

            var username = document.getElementById("username").value;
            var email = document.getElementById("email").value;
            let message = document.getElementById('message').value;


            let nameRegex = new RegExp("^[a-zA-Z]{4,}$");
            if (!nameRegex.test(username)) {
                alert("Invalid name ");
                return false;
            }

            let emailRegex = new RegExp("^[a-zA-Z0-9\._-]+\@[a-zA-Z0-9-]+\.[a-zA-Z]{2,4}$");
            if (!emailRegex.test(email)) {
                alert("Invalid email address");

                return false;
            }

        }
        return true;



    </script>

</head>

<body>

    <div class="registration-form">
        <h1 class="title">Registration Form</h1>

        <form action="../database/connection.php" method="post" onsubmit="return validity();">

            <label>User Name:</label><br><br>
            <input type="text" name="username" id="username" placeholder="Enter your User Name" value="" required>

            <p>Email:</p>
            <input type="email" name="email" id="email" placeholder="Enter your Email" value="" required>

            <p>Password:</p>
            <input type="password" name="password" id="password" placeholder="Enter your Password" value="" required>

            <p>confirm password:</p>
            <input type="password" name="cpassword" id="cpassword" placeholder="Enter your Password again" value=""
                required>


            <center><button type="submit">Register</button></center>


        </form>
    </div>

</body>

</html>