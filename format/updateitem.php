<html>

<head>
</head>

<body>

    <?php
    if (isset($_POST["id"])) {
        $id = $_POST["id"];
        $sname = $_POST["name"];
        $price = $_POST["price"];
        $quantity = $_POST["quantity"];


        include '../database/connected.php';

        $sql = "update item set name = '$sname', price = '$price', quantity = '$quantity' where id='$id' ";

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