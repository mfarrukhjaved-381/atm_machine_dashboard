<!-- CashWithdrawal.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cash Withdrawal</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<h1>Cash Withdrawal</h1>
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


<form action="processWithdrawal.php" method="post">
    <label for="amount">Enter the amount to withdraw:</label>
    <input type="text" name="amount" id="amount" required>
    <button type="submit">Withdraw</button>
</form>

</body>
</html>
