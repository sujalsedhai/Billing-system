<?php
include '../database/connected.php';

// Handle the form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $product_name = $_POST['item'];
    $price = $_POST['price'];
    $quantity = $_POST['quantity'];
    $total_price = $price * $quantity;

    $sql = "SELECT quantity FROM sales WHERE product_name = '$product_name'";
    $oldquantityResult = $conn->query($sql);
    $data = $oldquantityResult->fetch_assoc();
    if (!empty($data)) {
        $oldquantity = $data['quantity'];
    } else {
        $oldquantity = 0;
    }

    $sql = "INSERT INTO sales(product_name, quantity, total_price) VALUES('$product_name', '$quantity', '$total_price') 
            ON DUPLICATE KEY UPDATE quantity = VALUES(quantity) + $oldquantity";
    $result = $conn->query($sql);

    if ($result) {
        echo "<div>Success</div>";
    } else {
        echo "<div>Failed</div>";
    }

    $conn->close();
    exit;
}

// Fetch items for the dropdown
$sql = "SELECT * FROM item";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/bill.css">
    <title>Document</title>
    <!-- Include jQuery for AJAX -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>

<section class="container">
    <div class="product">
        <h2>Product details</h2>
        <div class="info">
            <form id="itemForm" method="post">
                Product: 
                <select name="item" id="itemSelect" class="selectItem" required>
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
                Price: <input type="number" name="price" id="price" readonly />
                Quantity: <input type="number" name="quantity" id="quantity" min="1" required>
                <input type="submit" value="Save" name="save" id="save" />
            </form>
            <form action="truncate.php" method="post">
                <input type="submit" value="New Bill" name="New bill" id="New bill" />
            </form>
        </div>
    </div>
    <hr>
    <div class="bill">
        <h2>Selected products</h2>
        <div class="invoice">
            <table>
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Amount</th>
                    </tr>
                </thead>
                <tbody id="productTableBody">
                    <?php
                    $sql = "SELECT * FROM sales";
                    $result = $conn->query($sql);

                    $total = 0;

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            $itemTotal = $row["quantity"] * $row["total_price"];
                            $total += $itemTotal;

                            echo "<tr>";
                            echo "<td>" . $row["product_name"] . "</td>";
                            echo "<td>" . number_format($row["total_price"], 2) . "</td>";
                            echo "<td>" . $row["quantity"] . "</td>";
                            echo "<td>" . number_format($itemTotal, 2) . "</td>";
                            echo "</tr>";
                        }

                        echo "<tr class='total-row'>
                        <td colspan='3'>Total</td>
                        <td id='totalAmount'>" . number_format($total, 2) . "</td>
                    </tr>";
                    } else {
                        echo "<tr class='total-row'>
                        <td colspan='3'>Total</td>
                        <td id='totalAmount'>0.00</td>
                    </tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</section>

<script>
    document.getElementById('itemSelect').addEventListener('change', function () {
        var selectedItem = this.value;
        var selectedOption = this.options[this.selectedIndex];
        var itemPrice = selectedOption.getAttribute('data-price');
        document.getElementById('price').value = itemPrice || ''; // Update price field based on selected item
    });

    // Handle form submission using jQuery
    $(document).ready(function () {
        $('#itemForm').submit(function (event) {
            event.preventDefault(); // Prevent the default form submission

            var formData = $(this).serialize(); // Serialize form data
            var selectedItem = $('#itemSelect option:selected').text();
            var price = parseFloat($('#price').val());
            var quantity = parseInt($('#quantity').val());
            var amount = (price * quantity).toFixed(2);

            $.ajax({
                type: 'POST',
                url: '', // Submit to the same page
                data: formData,
                success: function (response) {
                    // Append the new item to the table
                    var newRow = '<tr>' +
                        '<td>' + selectedItem + '</td>' +
                        '<td>' + price.toFixed(2) + '</td>' +
                        '<td>' + quantity + '</td>' +
                        '<td>' + amount + '</td>' +
                        '</tr>';

                    // Insert the new row before the total row
                    $('.total-row').before(newRow);

                    // Update the total amount
                    var totalAmount = parseFloat($('#totalAmount').text().replace(',', '')) + parseFloat(amount);
                    $('#totalAmount').text(totalAmount.toFixed(2));

                    // Clear the form
                    $('#itemSelect').val('');
                    $('#price').val('');
                    $('#quantity').val('');
                },
                error: function (xhr, status, error) {
                    console.error('Error adding item:', error);
                    alert('Error adding item');
                }
            });
        });
    });
</script>

</body>
</html>
