<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    include_once "../database/connected.php";
    $sql = "TRUNCATE TABLE sales";
    $result = $conn->query($sql);

    if ($result) {
        echo "<script>
        alert('All item deleted');
        window.location.href='../format/bill.php';
        </script>";
    } else {
        echo "<script>
        alert('Failed');
        window.location.href='../format/manage_item.php';
        </script>";
    }
}
?>