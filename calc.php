<?php
    include '.. /database/connected.php';

    $sql = "SELECT * FROM item";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<table>
      
        <th>Item name</th>
        <th>price</th>
        <th>Quantity</th>
        <th>Action</th>
        <tr>";
        while ($row = $result->fetch_assoc()) {
            echo " <tr>
      
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