<!DOCTYPE html>
<html lang="en">

<head>

    <title>Add Admin</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../css/employee.css">
    <script src="../vali/admin.js"></script>
</head>

<body class="main">
    <div class="add_employee" id="add_employee">
        <form action="../process/addAdmin.php" method="post" name="register" onsubmit="return validateForm()">
            <h2>Add Admin</h2>

            <div class="inputBox">
                <input type="text" name="employeename" id="employeename" required onblur="validateName()" />
                <span>Admin Name</span>
                <p class="error-message" id="name-error"></p>
            </div>

            <div class="inputBox">
                <input type="email" name="email" id="email" required onblur="validateEmail()" />
                <span>Email</span>
                <p class="error-message" id="email-error"></p>
            </div>

            <div class="inputBox">
                <input type="password" name="password" id="password" required onblur="validatePasswords2()" />
                <span>Password</span>
                <p class="error-message" id="password-error"></p>
            </div>

            <div class="inputBox">
                <input type="text" name="phone" id="phone" required onblur="validatePhone()" />
                <span>Phone</span>
                <p class="error-message" id="phone-error"></p>
            </div>

            <div class="inputBox" style="text-align: center;">
                <input type="submit" value="Add Admin">
                <input type="reset" value="Cancel" onclick="clearMessage()">
            </div>
            <div class="inputBox" style="text-align: center;">
                <a href="dashboard2.php" class="back">Back to Dashboard</a>
            </div>
        </form>
    </div>
</body>

</html>
