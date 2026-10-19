<!-- ViewBalance.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Balance</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<h1>Current Balance</h1>
<?php
session_start();
if(isset($_SESSION["username"])){
    $username = $_SESSION["username"];
    echo "<h2>$username's Account</h2>";
} else {
    header("location:FrmEnterPin.php");
    exit();
}
?>


<?php
$conn = new mysqli("localhost", "root", "", "atm");
$q = "SELECT balance FROM users WHERE username='$username'";
$record = $conn->query($q);

if ($record->num_rows > 0) {
    $row = $record->fetch_assoc();
    $balance = $row["balance"];
    echo "<p>Your account balance: $balance</p>";
} else {
    echo "Error retrieving account balance. Please try again later.";
}
$_SESSION['last_action'] = time();
?>

</body>
</html>
