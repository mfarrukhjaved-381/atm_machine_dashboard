<!-- Dashboard.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<h1>ATM Machine</h1>
<?php
session_start();
if(isset($_SESSION["username"])){
    $username = $_SESSION["username"];
    echo "<h2>Welcome $username</h2>";
} else {
    header("location:FrmEnterPin.php");
    exit();
}
$timeout_duration = 60;
if (isset($_SESSION['last_action']) && (time() - $_SESSION['last_action'] > $timeout_duration)) {
    session_unset();
    session_destroy();
    header("location: FrmEnterPin.php");
    exit();
}

$_SESSION['last_action'] = time();
?>
<a href="CashWithdrawal.php"><button>Cash Withdrawal</button></a>
<a href="FastCash.php"><button>Fast Cash</button></a>
<a href="ChangePin.php"><button>Change Pin</button></a>
<a href="ViewBalance.php"><button>View Balance</button></a>
<a href="logoutUser.php"><button>Logout</button></a>
</body>
</html>