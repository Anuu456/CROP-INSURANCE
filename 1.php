<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $age = $_POST["age"];
    $coverage = $_POST["coverage"];

    // Perform your premium calculation logic here
    // For simplicity, let's assume a basic calculation
    $premium = $age * $coverage * 0.02;

    echo "<h2>Your Insurance Premium:</h2>";
    echo "<p>Age: $age years</p>";
    echo "<p>Coverage Amount: $coverage</p>";
    echo "<p>Premium: $premium</p>";
}
?>