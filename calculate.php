<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quantity and Price Calculator</title>
    <script>
        function calculateTotal() {
            // Get the quantity and price values
            var quantity = parseFloat(document.getElementById("quantity").value);
            var price = parseFloat(document.getElementById("price").value);
            
            // Calculate the total
            var total = quantity * price;
            
            // Display the total
            document.getElementById("total").innerHTML = "Total: $" + total.toFixed(2);
        }
    </script>
    <style>
        .container {
            border: 1px solid #ccc;
            padding: 20px;
            margin: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Quantity and Price Calculator</h1>
        <form>
            <label for="quantity">Quantity:</label>
            <input type="number" id="quantity" min="1" value="1" onchange="calculateTotal()"><br><br>
            
            <label for="price">Price per item:</label>
            <input type="number" id="price" min="0.01" step="0.01" value="0.00" onchange="calculateTotal()"><br><br>
        </form>
        
        <div id="total">Total: Rs0.00</div>
    </div>
</body>
</html>