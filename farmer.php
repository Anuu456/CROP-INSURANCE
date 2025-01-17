<?php
if ($_SERVER["REQUEST_METHOD"] == "POST")
 {
    $host = "localhost"; // MySQL server host
    $username = "root"; // MySQL username
    $password = ""; // MySQL password
    $database = "crop"; // Database name

    $conn = new mysqli($host, $username, $password, $database);

    if ($conn->connect_error)
    {
        die("Connection failed: " . $conn->connect_error);
    }

    $Name= $_POST["name"];
    $Email= $_POST["email"];
    $Address= $_POST["address"];
    $Phonenumber= $_POST["phonenumber"];
    $Gender= $_POST["gender"];
    $Croptype= $_POST["Croptype"];


    $sql = "INSERT INTO farmer(Name,Email,Address,Phonenumber,Gender,Croptype) VALUES (?,?,?, ?,?,?)";
    $stmt = $conn->prepare($sql);

    if ($stmt)
    {
    
    $stmt->bind_param("ssssss",$Name,$Email,$Address,$Phonenumber,$Gender,$Croptype);

    
    if ($stmt->execute()) {
        echo "Data inserted successfully.";
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