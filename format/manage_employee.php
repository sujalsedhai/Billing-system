<!DOCTYPE html>
<html>

<head>
    <title>Employee List</title>
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
        <h1>Employee List</h1>
    </div>


    <?php
    include '../database/connected.php';

    $sql = "SELECT * FROM employee";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {    
        echo "<table>
       
        <th>Employee name</th>
        <th>Email</th>
        <th>Phone</th>
        <th>Action</th>
        <tr>";
        while ($row = $result->fetch_assoc()) {
            echo " <tr>
         
         <td>" . $row['name'] . "</td>       
         <td>" . $row['email'] . "</td>       
         <td>" . $row['phone'] . "</td>    
         <td><a href='edit_employee.php?id=" . $row["id"] . "'>Edit</a>||<a href='delete_employee.php?id=" . $row["id"] . "'>Delete</a></td> 
        </tr>
        ";
        }
        echo "</table>";

    } else {
        echo "<div class='message-box'>";
        echo "<p>There is no student data. Please insert the data </p>";
        echo "<button onclick='showMessage()'>OK</button>";
        echo "</div>";
        ?>

        <script>
            function showMessage() {
                var xhttp = new XMLHttpRequest();
                xhttp.open("POST", "ajax.php", true);
                xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                xhttp.onreadystatechange = function () {
                    if (this.readyState == 4 && this.status == 200) {
                        window.location.href ='employee.php';
                    }
                };
                xhttp.send("action=add_employee");
            }
        
        </script>

        <?php
    }

    $conn->close();
    ?>
</body>

</html>