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
    <link rel="stylesheet" href="../css/order.css">

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

        <section class="Main">
            <!-- Hero section -->
            <main>
                <section class="hero">
                    <div class="dashboard" id="dashboard">
                        <form action="#" method="post">
                            <h2>This is dashboard</h2>
                            <div class="inputBox">
                                <select name="item" id="itemSelect"  class="selectItem">
                                    <option value="" disabled selected>Select an Item</option>
                                    <?php
                                    if ($result->num_rows > 0) {
                                        while ($row = $result->fetch_assoc()) {
                                            ?>
                                            <option value="<?php echo $row['name'] ?>" data-price="<?php echo $row['price'] ?>">
                                                <?php echo $row['name'] ?>
                                            </option>
                                            <?php
                                        }
                                    }
                                    ?>
                                </select>
                                <span>Items</span>

                            </div>
                            <div class="inputBox">
                                <input type="number" name="price" id="price" readonly />
                                <span>Price</span>
                            </div>

                            <script>
                                document.getElementById('itemSelect').addEventListener('change', function () {
                                    var selectedItem = this.value;
                                    var selectedOption = this.options[this.selectedIndex];
                                    var itemPrice = selectedOption.getAttribute('data-price');
                                    document.getElementById('price').value = itemPrice || ''; // Update price field based on selected item
                                });
                            </script>



                            <div class="inputBox">
                                <input type="number" name="quantiity" id="quantiity" min="1"/>
                                <span>Quantiity</span>
                            </div>
                            <div class="inputBox">
                                <input type="button" name="" value="Add Cart" id="Add cart" />&nbsp;&nbsp;
                            </div>

                            <br>
                            <div class="inputBox">
                                <input type="button" name="" value="save" id="save" />&nbsp;&nbsp;
                                <input type="button" name="" value="reset" id="reset" />&nbsp;&nbsp;
                            </div>
                        </form>
                    </div>
                </section>

</body>

</html>

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