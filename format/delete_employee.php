<?php

include "../database/connected.php";
if (isset($_REQUEST['id'])) {
    $id = $_REQUEST['id'];
    $sql = "DELETE FROM employee WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        echo "
                <script>
                    alert('Record deleted successfully');
                    window.location.href = 'manage_employee.php';
                </script>";
    } else {
        echo "Error deleting record: " . $conn->error;
    }
} else {
    header("Location: ../format/dashboard2.php");
    exit();
}
$conn->close();