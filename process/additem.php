<?php
if (isset($_REQUEST['quantity'])) {

    $quantity = $_REQUEST['quantity'];
    $name = $_REQUEST['name'];
    $price = $_REQUEST['price'];

    include_once "../database/connected.php";
    $sql = "select quantity from item where name = '$name'";
    $oldquantity = $conn->query($sql);
    $data = $oldquantity->fetch_assoc();
    if (!empty($data)) {
        $oldquantity = $data['quantity'];
    } else {
        $oldquantity = 0;
    }
    echo "$oldquantity";
    $sql = "INSERT INTO item(quantity, name, price) VALUES('$quantity', '$name', '$price') on duplicate key update quantity=values(quantity)+$oldquantity";
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
