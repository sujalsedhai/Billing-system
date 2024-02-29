<html>

<head>
    <title>Database connectivity</title>
</head>

<body>
    <?php
    if (isset($_REQUEST["username"])) {
        $username = $_REQUEST['username'];
        $email = $_REQUEST['email'];
        $password = $_REQUEST['password'];
        $cpassword = $_REQUEST['cpassword'];

        if ($password == $cpassword) {
            include "connected.php";

            $sql = "insert into user(name,email,password) values(?,?,?)";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("sss", $username, $email, $password);
            if ($stmt->execute()) {

                echo "<script>
            alert('Register Successful');
            window.location.href='../public/index.php';
            </script>";

            }
            $stmt->close();
            $conn->close();
        } else {
            echo "<script>
        alert('password does not match');
        window.location.href='../public/index.php';
        </script>";

        }
    }
    ?>
</body>

</html>