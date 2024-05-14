<?php
// Include database connection file
include_once '../database/connected.php';

// Process form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $product_id = $_POST['product_id'];
    $quantity = $_POST['quantity'];

    // Fetch product details from the database
    $sql = "SELECT * FROM products WHERE id = ?";
    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param("i", $product_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $product = $result->fetch_assoc();

    // Calculate total amount
    $total_amount = $product['price'] * $quantity;

    // Insert order into database
    $sql = "INSERT INTO orders (product_id, quantity, total_amount) VALUES (?, ?, ?)";
    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param("iid", $product_id, $quantity, $total_amount);
    
    if ($stmt->execute()) {
        // Order placed successfully
        echo "Order placed successfully.";
    } else {
        // Error occurred while placing order
        echo "Error placing order: " . $stmt->error;
    }

    // Close statement
    $stmt->close();
}

// Close database connection
//$mysqli->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Billing System</title>
</head>
<body>

<h2>Place Order</h2>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
    <label for="product_id">Product:</label>
    <select name="product_id" id="product_id" required>
        <?php
        // Fetch products from the database
        $sql = "SELECT * FROM products";
        $result = $mysqli->query($sql);
        while ($row = $result->fetch_assoc()) {
            echo "<option value='" . $row['id'] . "'>" . $row['name'] . "</option>";
        }
        ?>
    </select><br><br>
    <label for="quantity">Quantity:</label>
    <input type="number" name="quantity" id="quantity" value="1" min="1" required><br><br>
    <input type="submit" value="Place Order">
</form>

</body>
</html>