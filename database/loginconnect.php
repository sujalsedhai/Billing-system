<html>

<head>
    <title>Database connectivity</title>
</head>

<body>
    <?php
    session_start();
    if (isset($_REQUEST["uname"])) {

        $username = $_REQUEST['uname'];
        $password = $_REQUEST['psw'];

        include "connected.php";

        $sql = "select * from user where name = '$username' and password = '$password'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $_SESSION['uname'] = $username;
            header("location:../format/dashboard2.php");
        } else {
            echo "<script>
            alert('please register first');
            window.location.href='../format/registration.php
            
            </script>";
        }
        $conn->close();
    }

    ?>
</body>

</html>