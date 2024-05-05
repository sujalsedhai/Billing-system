<!DOCTYPE html>
<html>

<head>

    <link rel="stylesheet" href="../css/style.css">

    <script type="text/javascript">


        function validity() {

            var usernameInput= document.getElementById('username');
            var passwordInput = document.getElementById('password');
            var email = document.getElementById('email');
            


            var usernameRegex = /^[a-zA-Z]{4,}$/;

            if (!usernameRegex.test(usernameInput.value)) {
                alert("username must contain only alphabets");
                usernameInput.focus();
                return false;
            }

            var emailRegex = /^[a-zA-Z0-9\._-]+\@[a-zA-Z0-9-]+\.[a-zA-Z]{2,4}$/;
            if (!emailRegex.test(email)) {
                alert("Invalid email address");
                return false;
            }
            if(passwordInput.value.length<6)
            {
                alert("Password must be at least 6 characters");
                passwordInput.focus();
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