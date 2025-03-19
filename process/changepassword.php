<!DOCTYPE html>
<html>

<head>
    <title>Change Password</title>
</head>
<style>
body {
    font-family: Arial, sans-serif;
    background-color: #f5f5f5;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    margin: 0;
}

.container {
    width: 400px;
    margin: 20px;
    padding: 30px;
    border-radius: 8px;
    background: #fff;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

h2 {
    text-align: center;
    margin-bottom: 30px;
    color: #333;
}

.form-group {
    margin-bottom: 20px;
}

label {
    display: block;
    margin-bottom: 8px;
    font-weight: bold;
    color: #666;
}

input[type="password"] {
    width: 100%;
    padding: 12px;
    border: 1px solid #ddd;
    border-radius: 4px;
    background-color: #f9f9f9;
    transition: border-color 0.3s ease;
    font-size: 16px;
}

input[type="password"]:focus {
    outline: none;
    border-color: #8bc34a;
}

input[type="submit"] {
    width: 100%;
    background-color: #4CAF50;
    color: white;
    border: none;
    padding: 12px;
    cursor: pointer;
    border-radius: 4px;
    font-size: 16px;
    transition: background-color 0.3s ease;
}

input[type="submit"]:hover {
    background-color: #45a049;
}

.alert {
    padding: 12px;
    margin-bottom: 20px;
    border-radius: 4px;
    font-size: 14px;
    color: #fff;
}

.alert-danger {
    background-color: #f44336;
}

.alert-success {
    background-color: #4CAF50;
}

.alert-info {
    background-color: #2196F3;
}


</style>
</head>

<body>

    <div class="container">
        <h2>Change Password</h2>
        <form method="post" action="#">
            <div class="form-group">
                <label for="current_password">Current Password:</label>
                <input type="password" name="oldpass" id="current_password" required>
            </div>
            <div class="form-group">
                <label for="new_password">New Password:</label>
                <input type="password" name="newpass" id="new_password" required>
            </div>
            <div class="form-group">
                <label for="confirm_password">Confirm Password:</label>
                <input type="password" name="cpass" id="confirm_password" required>
            </div>
            <div class="form-group">
                <input type="submit" value="Change Password">
            </div>
        </form>
    </div>

</html>

<?php
session_start();
if (isset($_POST['newpass'])) {

    $newpass = md5($_POST['newpass']);
    $oldpass = md5($_POST['oldpass']);
    $cpass = md5($_POST['cpass']);
    $user = $_SESSION['uname'];
    include "../database/connected.php";


    $sql = "select * from admin where name='$user'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();

        if ($oldpass == $row['password']) {
            if ($newpass == $cpass) {
                $sql1 = "update admin  set password='$newpass' where name='$user'";
                $result1 = $conn->query($sql1);

                if ($result1) {      
                    echo "<script>
                alert('Password updated successfully');
                window.location.href='logout.php';
                </script>";
                } else {
                    echo "<script>
                alert('Password change failed');
                windows.location.href='changepassword.php';
                </script>";
                }

            } else {
                echo "<script>
                alert('New Password and confirm password did not match');
                windows.location.href='changepassword.php';
                </script>";
            }
        } else {
            echo "<script>
            alert('old Password did not match');
            windows.location.href='changepassword.php';
            </script>";
        }
    }

}
?>