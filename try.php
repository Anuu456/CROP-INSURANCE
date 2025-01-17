 <?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve input data
    $cropType = $_POST["cropType"];
    $acres = $_POST["acres"];

    // Perform insurance calculation logic
    // This is a simplified example, replace with your actual calculation
    $insuranceAmount = $acres * 15000; // Replace with actual calculation

    // Display the result
    echo "<h2>Insurance Calculation Result:</h2>";
    echo "<p>Crop Type: $cropType</p>";
    echo "<p>Acres: $acres</p>";
    echo "<p>Insurance Amount: $insuranceAmount</p>";
}
?>