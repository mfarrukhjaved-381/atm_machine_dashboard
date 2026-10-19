<!-- FastCash.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fast Cash</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<h1>Fast Cash</h1>
<?php
session_start();
if(isset($_SESSION["username"])){
    $username = $_SESSION["username"];
    echo "<h2>$username's Account</h2>";
} else {
    header("location:FrmEnterPin.php");
    exit();
}
$_SESSION['last_action'] = time();
?>


<form action="processFastCash.php" method="post">
    <label for="amount">Select the amount to withdraw:</label>
    <select name="amount" id="amount" required>
        <option value="20">20</option>
        <option value="50">50</option>
        <option value="100">100</option>
    </select>
    <button type="submit">Withdraw</button>
</form>

</body>
</html>
