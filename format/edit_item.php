<?php
include "../database/connected.php";
if (isset($_REQUEST['id'])) {
    $id = $_REQUEST['id'];
    $sql = "select * from item where id=$id ";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        ?>
        <!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
                integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
                crossorigin="anonymous" referrerpolicy="no-referrer" />
            <title></title>
            <link rel="stylesheet" href="../css/employee.css">

        </head>

        <body class="main">
            <div class="add_item" id="add_item">
                <form action="updateitem.php" method="post">
                    <input type="hidden" name="id" id="id" value='<?php echo $row['id'] ?>'>
                    <h2>Item</h2>
                    <div class="inputBox">
                        <input type="text" name="quantity" id="quantity" value='<?php echo $row["quantity"] ?>' required>
                        <span>Quantity</span>
                    </div>
                    <div class="inputBox">
                        <input type="text" name="name" id="name" value='<?php echo $row["name"] ?>' required>
                        <span>Name</span>
                    </div>

                    <div class="inputBox">
                        <input type="text" name="price" id="price" value='<?php echo $row["price"] ?>' required>
                        <span>Price</span>
                    </div>

                    <div class="inputBox" style="text-align: center;">
                        <input type="submit" value="Add Item">
                        <input type="reset" value="Cancel">
                    </div>
                    <div class="inputBox" style="text-align: center ;">
                        <a href="dashboard2.php" class="back">Back to Dashboard</a>
                    </div>
                </form>
            </div>
        </body>

        </html>
        <?php
        $conn->close();
    }
} else {
    header("Location: dashboard2.php");
    exit();
}
?>