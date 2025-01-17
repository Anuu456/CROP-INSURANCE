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

    $AmountInvested= $_POST["amountinvested"];
    $AmountLoss= $_POST["amountloss"];
    $ClaimedAmount= $_POST["claimedamount"];
    $Reviews= $_POST["reviews"];



    $sql = "INSERT INTO myinsurance(AmountInvested,AmountLoss,ClaimedAmount,Reviews) VALUES (?,?,?,?)";
    $stmt = $conn->prepare($sql);

    if ($stmt)
    {
    
    $stmt->bind_param("ssss",$AmountInvested,$AmountLoss,$ClaimedAmount,$Reviews);

    
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