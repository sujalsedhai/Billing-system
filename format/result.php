<?php
// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['calculate'])) {
    // Retrieve quantity and price values
    $quantity = isset($_POST['quantity']) ? $_POST['quantity'] : 0;
    $price = isset($_POST['price']) ? $_POST['price'] : 0;

    // Perform calculation
    $total = $quantity * $price;

    // Display the total
    echo "<script>alert('Total: Rs " . number_format($total, 2) . "')</script>";
    echo "<script>window.location = 'dashboard3.php';</script>";
    
}

