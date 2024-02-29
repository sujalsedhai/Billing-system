<?php

session_start();

if(empty(($_SESSION['uname'])))
{
    header("location:../database/loginconnect.php");
    exit();
}
else
{
    ?>

<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboaed Design</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../css/dashboard2.css">
    <title>employee</title>
</head>

<body>
    <div class="sidebar">
        <div class="logo"></div>
        <ul class="menu">

            <li class="active">
                <a href="#">
                    <i class="fa-solid fa-house"></i>

                    <span>Dashboard</span>
                </a>

            </li>



            <li>
                <a href="#">
                    <i class="fa fa-plus-circle" aria-hidden="true"></i>
                    <span> View Item</span>
                </a>


            </li>
            <li>
                <a href="#">
                    <i class="fa fa-key" aria-hidden="true"></i>
                    <span>Change password</span>
                </a>


            </li>
            <li class="logout">
                <a href="../process/logout.php">

                <i class="fas fa-sign-out-alt"></i>

                <span>Logout</span>
                
            </a>

            </li>
        </ul>

    </div>
    <section class="main">
        <div class="main-top">
            <p>Explore the universe!</p>
        </div>



</body>

</html>
<?php }
?>