<?php
include "../database/connected.php";
if (isset($_REQUEST['id'])) {
    $id = $_REQUEST['id'];
    $sql = "select * from employee where id=$id ";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        ?>
        <!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
                integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
                crossorigin="anonymous" referrerpolicy="no-referrer" />
            <title></title>
            <link rel="stylesheet" href="../css/employee.css">

        </head>

        <body class="main">
            <div class="add_employee" id="add_employee">
                <form action="updateEmployee.php" method="post">
                    <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                    <h2>Add Employee</h2>
                    <div class="inputBox">
                        <input type="text" name="employeename" id="employeename" value='<?php echo $row['name'] ?>' required>
                        <span>Employee Name</span>
                    </div>

                    <div class="inputBox">
                        <input type="email" name="email" id="email" value="<?php echo $row['email']; ?>" required>
                        <span>Email</span>
                    </div>
                    <div class="inputBox">
                        <input type="password" name="password" id="password" value="<?php echo $row['password']; ?>" required>
                        <span>Password</span>
                    </div>
                    <div class="inputBox">
                        <input type="text" name="phone" id="phone" value="<?php echo $row['phone']; ?>" required>
                        <span>Phone</span>
                    </div>
                    <div class="inputBox" style="text-align: center;">
                        <input type="submit" value="Add Employee">
                        <input type="reset" value="Cancel">
                    </div>
                    <div class="inputBox" style="text-align: center ;">
                        <a href="dashboard2.php" class="back">Back to Dashboard</a>
                    </div>
                </form>
            </div>
        </body>

        </html>
        <?php
        $conn->close();
    }
} else {
    header("Location: dashboard2.php");
    exit();
}
?>