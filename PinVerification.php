<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $pin = $_POST["pin"];
    $trimmed_pin = trim($_POST['pin']);

$conn = new mysqli("localhost", "root", "", "atm");
    
$q = "SELECT * FROM users WHERE pin='$pin'";
$record = $conn->query($q);

if ($record->num_rows > 0) {
    $row = $record->fetch_assoc();
    $_SESSION["username"] = $row["username"];
    header("location:Dashboard.php");
} else {
    echo "Invalid PIN. Please try again.";
}
}
?>
