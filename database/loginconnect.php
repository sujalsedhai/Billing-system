<html>

<head>
    <title>Database connectivity</title>
</head>

<body>
    <?php
    session_start();
    if (isset($_REQUEST["uname"], $_REQUEST["role"])) {

        $username = $_REQUEST['uname'];
        $password = md5($_REQUEST['psw']);
        // $password = $_REQUEST['psw'];
        $role = $_REQUEST['role'];
        include "connected.php";

        if (strtolower($role) == 'admin') {
            $sql = "select * from user where name = '$username' and password = '$password'";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                $_SESSION['uname'] = $username;
                header("location:../format/dashboard2.php");
            } else {
                echo "<script>
                alert('please register first');
                window.location.href='../index.php';
                </script>";
                // echo $role;
            }
        } elseif (strtolower($role) == 'employee') {
            $sql1 = "select * from employee where name = '$username' and password = '$password'";
            $result1 = $conn->query($sql1);

            if ($result1->num_rows > 0) {
                $_SESSION['uname'] = $username;
                header("location:../format/dashboard3.php");
            } else {
                echo "<script>
                alert('please register first');
                window.location.href='../index.php';
                </script>";
                // echo $role;
            }
        } else {
            echo "<script>
            alert('invalid role');
            window.location.href='../index.php';
            </script>";
        }
        $conn->close();
    } else {
        echo "Login failed";
    }

    ?>
</body>
</html>