<html>

<head>
    <title>employee</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboaed Design</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../css/employee.css">

</head>

<body class="main">
    <div class="add_employee" id="add_employee">
        <form action="../process/addAdmin.php" method="post" >
            <h2>Add Admin</h2>
            <div class="inputBox">
                <input type="text" name="employeename" id="employeename" required>
                <span>Admin Name</span>
            </div>

            <div class="inputBox">
                <input type="email" name="email" id="email" required>
                <span>Email</span>
            </div>
            <div class="inputBox">
                <input type="password" name="password" id="password" required>
                <span>Password</span>
            </div>
            <div class="inputBox" style="text-align: center;">
                <input type="submit" value="Add Admin">
                <input type="reset" value="Cancel">
            </div>
            <div class="inputBox" style="text-align: center ;">
                <a href="dashboard2.php" class="back">Back to Dashboard</a>
            </div>
        </form>
    </div>
</body>

</html>