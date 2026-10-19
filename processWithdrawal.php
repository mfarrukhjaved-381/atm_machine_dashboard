<!-- processWithdrawal.php -->
<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (isset($_SESSION["username"])) {
        $username = $_SESSION["username"];
        $amount = $_POST["amount"];

        if ($amount <= 0) {
            echo "Invalid withdrawal amount. Please enter a valid amount.";
            exit();
        }
        $conn = new mysqli("localhost", "root", "", "atm");
        $q = "SELECT balance FROM users WHERE username='$username'";
        $record = $conn->query($q);

        if ($record->num_rows > 0) {
            $row = $record->fetch_assoc();
            $balance = $row["balance"];

            // Check if there's enough balance for withdrawal
            if ($balance >= $amount && $balance >= 0) {
                $newBalance = $balance - $amount;
                $updateQ = "UPDATE users SET balance=$newBalance WHERE username='$username'";
                $conn->query($updateQ);
 
                echo "Withdrawal successful. Your account has been debited with Rs. $amount. New balance: Rs. $newBalance.";
              
            } else {
                echo "Insufficient funds or negative balance. Cannot process withdrawal.";
            }
        } else {
            echo "Error retrieving account balance. Please try again later.";
        }
    } else {
        echo "User not logged in. Please log in to proceed.";
    }
} else {
    echo "Invalid request. Please try again.";
}
$_SESSION['last_action'] = time();
session_unset();
session_destroy();
exit();
?>
