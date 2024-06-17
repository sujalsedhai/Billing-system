<?php
if (isset($_REQUEST['employeename'])) {
    $ename = $_REQUEST['employeename'];
    $email = $_REQUEST['email'];
    $password = md5($_REQUEST['password']);


    $servername = "localhost";
    $username = "root";
    $dbpassword = "";
    $dbname = "project";

    $conn = new mysqli($servername, $username, $dbpassword, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "INSERT INTO user (name,email,password) VALUES('$ename', '$email', '$password')";
    $result = $conn->query($sql);

    if ($result) {
        echo "<script>alert('Data Inserted Successfully')</script>";
        echo "<script>window.location = '../format/dashboard2.php';</script>";
    } else {
        echo "<script>alert('Data Not Inserted. Please Check and Try Again')</script>";
    }
}
?>