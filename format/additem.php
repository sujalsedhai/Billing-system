<!DOCTYPE html>
<html lang="en">

<head>
   
    <title>Item</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../css/employee.css">
    <script src="../vali/item.js"></script>
</head>

<body class="main">
    <div class="add_item" id="add_item">
        <form action="../process/additem.php" method="post" name="register" onsubmit="return validateForm()">
            <h2>Item</h2>
            <div class="inputBox">
                <input type="text" name="quantity" id="quantity" required onblur="validateQuantity()">
                <span>Quantity</span>
                <p class="error-message" id="quantity-error"></p>
            </div>

            <div class="inputBox">
                <input type="text" name="name" id="name" required onblur="validateName()">
                <span>Name</span>
                <p class="error-message" id="name-error"></p>
            </div>

            <div class="inputBox">
                <input type="text" name="price" id="price" required onblur="validatePrice()">
                <span>Price</span>
                <p class="error-message" id="price-error"></p>
            </div>

            <div class="inputBox" style="text-align: center;">
                <input type="submit" value="Add Item">
                <input type="reset" value="Cancel" onclick="clearMessage()">
            </div>
            <div class="inputBox" style="text-align: center;">
                <a href="dashboard2.php" class="back">Back to Dashboard</a>
            </div>
        </form>
    </div>
</body>

</html>
