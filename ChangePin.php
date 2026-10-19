<!-- ChangePin.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Change PIN</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<?php
session_start();
if(isset($_SESSION["username"])){
    $username = $_SESSION["username"];
    echo "<h1>Welcome $username</h1>";
} else {
    header("location:FrmEnterPin.php");
    exit();
}
$_SESSION['last_action'] = time();
?>

<h2>Change PIN</h2>
<form action="processChangePin.php" method="post">
    <label for="oldPin">Enter Old PIN:</label>
    <input type="password" name="oldPin" id="oldPin" required><br>

    <label for="newPin">Enter New PIN:</label>
    <input type="password" name="newPin" id="newPin" required><br>  

    <label for="confirmNewPin">Confirm your New PIN:</label>
    <input type="password" name="confirmNewPin" id="confirmNewPin" required>

    <button type="submit">Change PIN</button>
</form>

</body>
</html>
