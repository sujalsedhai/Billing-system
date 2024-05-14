<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login Page</title>
  <link rel="stylesheet" href="css/index.css">
</head>

<body>
  <div class="form_container">
    <form action="database/loginconnect.php" method="post">

      <div class="container">
        <div class="input_box">
          <select name="role" id="role">
            <option value="admin">Admin</option>
            <option value="employee">Employee</option>
          </select>
        </div>

        <div class="input_box">
          <label for="uname"><b>Username</b></label>
          <input type="text" placeholder="Enter Username" name="uname" required>
        </div>
        <div class="input_box">
          <label for="psw"><b>Password</b></label>
          <input type="password" placeholder="Enter Password" name="psw" required>
        </div>
        <center><button type="submit">Login</button></center>

    </form>
  </div>
</body>

</html>