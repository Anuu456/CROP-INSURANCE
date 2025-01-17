<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve input values
    $cropType = $_POST["cropType"];
    // $season = $_POST["season"];
    $year = $_POST["year"];
    $scheme = $_POST["scheme"];
    $state = $_POST["state"];
    $district = $_POST["district"];
    $area = $_POST["area"];
    
    // Display result
    echo "<h2>Insurance Premium Calculation Result</h2>";
    echo "<p>Crop Type: $cropType</p>";
    // echo "<p>Season: $season</p>";
    echo "<p>Year: $year</p>";
    echo "<p>Scheme: $scheme</p>";
    echo "<p>State: $state</p>";
    echo "<p>District: $district</p>";
    echo "<p>Area: $area hectares</p>";
    
}
?>








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

    $Croptype = $_POST["cropType"];
    $Year= $_POST["year"];
    $Scheme= $_POST["scheme"];
    $State= $_POST["state"];
    $District= $_POST["district"];
    $Area= $_POST["area"];
    
    

    $sql = "INSERT INTO calci(croptype,year,scheme,state,district,area) VALUES (?, ?,?,?,?,?)";
    $stmt = $conn->prepare($sql);

    if ($stmt) 
    {
        $stmt->bind_param("ssssss",$Croptype,$Year,$Scheme,$State,$District,$Area);

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
