<?php
include '../database/connected.php';

$sql = "SELECT * FROM item";
$result = $conn->query($sql);
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/dashboard2.css">
    

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" /> 
</head>

<body>
    <div class="container">
        <div class="sidebar">

            <nav>
                <ul class="menu">
                    <span class="admin"><u><?php session_start();
                    echo $_SESSION['uname']; ?></u></span>

                    <br>
                    <br> <br>
                    <div class="logo">
                        <img src="../photo/hamrostore.png" alt="The logo of Hamro Store">
                    </div>
                    <br><br>

                    <li>
                        <a href="manage.item.php">
                            <i class="fas fa-eye"></i>
                            <span class="nav-item">View Item</span> </a>
                    </li>
                    <li class="parent-item">
                        <a href="../process/changepasswordEmployee.php">
                            <i class="fas fa-key" aria-hidden="true"></i>
                            <span class="nav-item">Change Password</span>
                        </a>
                    </li>

                    <li><a href="../process/logout.php" class="logout">
                            <i class="fas fa-sign-out-alt"></i>
                            <span class="nav-item">Log out</span>
                        </a></li>

                        
                        
                    </ul>
                </nav>
            </div>
            <div class="dashboard">
              <div class="header">
                <p>Welcome to employee</p>
              </div>
              <div class="content">
                <a href="bill.php">
                  <div>Create Bill</div>
                </a>
               
              </div>
            </div>
        </div>



<script>
    document.addEventListener('DOMContentLoaded', function () {
        const parentItems = document.querySelectorAll('.parent-item');
        parentItems.forEach(item => {
            item.addEventListener('click', function (event) {
                parentItems.forEach(item => {
                    if (item !== this) {
                        item.classList.remove('clicked');
                    }
                });
                this.classList.toggle('clicked');
                event.stopPropagation();
            });
        });

        document.addEventListener('click', function () {
            parentItems.forEach(item => {
                item.classList.remove('clicked');
            });
        });
    });
</script>
</body>

</html>