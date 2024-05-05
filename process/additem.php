<?php
if (isset($_REQUEST['quantity'])) {

    $quantity = $_REQUEST['quantity'];
    $name = $_REQUEST['name'];
    $price = $_REQUEST['price'];

    include_once "../database/connected.php";

    $sql = "INSERT INTO item(quantity, name, price) VALUES('$quantity', '$name', '$price')";
    $result = $conn->query($sql);

    if ($result) {
        echo "<script>alert('Data Inserted Successfully')</script>";
        echo "<script>window.location = '../format/dashboard2.php';</script>";
    } else {
        echo "<script>alert('Data Not Inserted. Please Check and Try Again')</script>";
    }
} else {
    echo "<script>alert('Data Not Inserted. Please Check and Try Again');
        window.location.href='../format/additem.php';</script>";
}