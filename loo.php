<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">


  <div class="image-container"></div>
  <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSTPSsFGNT-DRG3zIhcNQrpIqU8oog_zEJ2qQ&usqp=CAU " height="300px" width="250px">
  <title>crop insurance</title>
  <link rel="stylesheet" href="111.css">

  <div class="login-container" >
    <form action="loo.php" method="post">
    <h2>CROP INSURANCE</h2>
    <form  class="login-form">
      <div class="form-group">
        <label for="email">Email:</label>
        <input type="text" id="email" name="email" required>
      </div>
      <div class="form-group">
        <label for="password">Password:</label>
        <input type="password" id="password" name="pass" required>
      </div>
      <div class="form-group">
        <button type="submit">Login</button>
      </div>
    </form>
  </div>

</body>
</html>





    
    

<?php

  $host = "localhost"; // MySQL server host
  $username = "root"; // MySQL username
  $password = ""; // MySQL password
  $database = "crop"; // Database name
  $conn = new mysqli($host,$username,$password,$database);

  if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
  }
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["email"];
    $password = $_POST["pass"];

    $sql = "SELECT * FROM register WHERE Email='$username' and Password = '$password' ";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        
        session_start();
        $_SESSION["Email"] = $username;
        header("Location: index.html");
         
    } else {
        $error_message = "User not found";
    }

    $conn->close();
}
?>
