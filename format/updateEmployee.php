<html>

<head>
</head>

<body>

    <?php
    if (isset($_POST["id"])) {
        $id = $_POST["id"];
        $sname = $_POST["employeename"];
        $phone = $_POST["phone"];
        $email = $_POST["email"];
        $password = $_POST["password"];

        include '../database/connected.php';

        $sql = "update employee set name = '$sname', phone = '$phone', email = '$email', password='$password' where id =$id ";

        $result = $conn->query($sql);

        if ($result) {
            echo "<script>
            alert('Updates successfully');
            window.location.href='dashboard2.php';
        </script>";

        } else {
            echo "Data update failed";
        }
    }
    ?>
</body>

</html>