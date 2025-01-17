<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">


  <div class="image-container"></div>
  
  <title>REGISTER FORM</title>
  <link rel="stylesheet">

  <div class="login-container" >
    <form action="registerr.php" method="post">
    <h2>REGISTER</h2>
    <form class="login-form">
      <div class="form-group">
       
      <label for="name">Name:</label>
        <input type="text" id="name" name="name" required>
      </div>
      <div class="form-group">
      <label for="aadharID">Aadar ID:</label>
        <input type="text" id="aadharID" name="aadharID" required>
      </div>
      <div class="form-group">
      <label for="mobilenumber">Mobile number:</label>
        <input type="text" id="mobilenumber" name="mobilenumber" required>
      </div>
      <div class="form-group">
      <label for="email">Email:</label>
        <input type="text" id="email" name="email" required>
      </div>
      <div class="form-group">
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>
      </div>
      <a href="loo.php">Registered already click here</a>
      <div class="form-group">
        <button type="submit">Register</button>
      </div>
    </form>
  </div>

</body>
</html>

<style>
body {
      margin: 0;
      padding: 0;
      font-family: 'Arial', sans-serif;

      background-image: url('https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRgr-hlgE4IfHQyIK5rFLuN8n6BPlFymQdMOg&usqp=CAU');
      background-size: cover;
      background-position: center;

      display: flex;
      justify-content: center;
      align-items: center;
      height:100vh;
  
  }

    .login-container {
      background: rgba(255, 255, 255, 0.8);
      padding: 20px;
      border-radius: 10px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.4);
      text-align: center;
    }

    .login-container h2 {
      color: #333;
    }

    .login-form {
      margin-top: 20px;
    }

    .form-group {
      margin-bottom: 15px;
    }

    .form-group label {
      display: block;
      margin-bottom: 5px;
    }

    .form-group input {
      padding: 8px;
      border: 1px solid #ccc;
      border-radius: 5px;
    }

    .form-group button {
      background-color: #4caf50;
      color: #fff;
      padding: 10px;
      border: none;
      border-radius: 5px;
      cursor: pointer;
    }
    </style>


<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $host = "localhost"; // MySQL server host
    $username = "root"; // MySQL username
    $password = ""; // MySQL password
    $database = "crop"; // Database name

    $conn = new mysqli($host,$username,$password,$database);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $Name = $_POST["name"];
    $AadharID = $_POST["aadharID"];
    $Mobilenumber = $_POST["mobilenumber"];
    $Email = $_POST["email"];
    $Password= $_POST["password"];
    
    

    $sql = "INSERT INTO register(Name,AadharID,Mobilenumber,Email,Password) VALUES (?, ?,?,?,?)";
    $stmt = $conn->prepare($sql);

    if ($stmt) 
    {
        $stmt->bind_param("sssss",$Name,$AadharID,$Mobilenumber,$Email,$Password);

        if ($stmt->execute())
         {
            echo "<center>"."Data inserted successfully."."<center>";
        } else {
            echo "Error: " . $stmt->error;
        }

        $stmt->close();
    } else {
        echo "Error: " . $conn->error;
    }

    $conn->close();
}
?>
