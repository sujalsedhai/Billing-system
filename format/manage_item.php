<!DOCTYPE html>
<html>

<head>
    <title>Item List</title>
    <style>
        .main {
            height: 100vh;
            background: linear-gradient(rgba(160, 116, 53, 0.89), rgba(46, 71, 118, 0.527));
            background-size: cover;
            background-position: center;
        }

        .header {
            text-align: center;
            padding: 20px;

        }

        table {
            border-collapse: collapse;
            width: 100%;
        }

        th,
        td {
            border: 1px solid black;
            padding: 8px;
        }

        td a {
            text-decoration: none;
            color: #000;
        }

        .message-box {
            text-align: center;
        }

        .message-box p {
            font-size: 20px;
            color: red;
        }

        .message-box button {
            padding: 10px 20px;
            font-size: 18px;
            border: none;
            cursor: pointer;
            margin-top: 20px;
        }
    </style>
</head>

<body class="main">
    <div class="header">
        <h1>Item List</h1>
    </div>


    <?php
    include '../database/connected.php';

    $sql = "SELECT * FROM item";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<table>
        <tr><th>Id </th>
        <th>Item name</th>
        <th>price</th>
        <th>Quantity</th>
        <th>ACtion</th>
        <tr>";
        while ($row = $result->fetch_assoc()) {
            echo " <tr>
         <td>" . $row['id'] . "</td>       
         <td>" . $row['name'] . "</td>       
         <td>" . $row['price'] . "</td>       
         <td>" . $row['quantity'] . "</td>    
         <td><a href='edit_item.php?id=" . $row["id"] . "'>Edit</a>||<a href='delete_item.php?id=" . $row["id"] . "'>Delete</a></td> 
        </tr>
        ";
        }
        echo "</table>";
    } else {
        // echo "<div class='message-box'>";
        // echo "<p>There is no Item data. Please insert the data </p>";
        // echo "<button onclick='showMessage()'>OK</button>";
        // echo "</div>";
    
        echo "<script>
            alert('There is no Item. Please insert the data first');
            window.location.href='dashboard2.php';
        </script>";
    }

    $conn->close();
    ?>
</body>

</html>