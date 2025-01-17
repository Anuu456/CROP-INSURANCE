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

    $FullName = $_POST["fullname"];
    $PassbookName= $_POST["passbookname"];
    $AccountNumber= $_POST["accountnumber"];
    $IFSCcode= $_POST["ifsccode"];
    $BankName= $_POST["bank_name"]; 
    $State= $_POST["state"];
    $District= $_POST["district"];
    

    $sql = "INSERT INTO account(FullName,PassbookName,AccountNumber,IFSCcode,BankName,state,district) VALUES (?,?, ?,?,?,?,?)";
    $stmt = $conn->prepare($sql);

    if ($stmt) 
    {
        $stmt->bind_param("sssssss",$FullName,$PassbookName,$AccountNumber,$IFSCcode,$BankName,$State,$District);

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