<!-- processChangePin.php -->
<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (isset($_SESSION["username"])) {
        $username = $_SESSION["username"];
        $oldPin = $_POST["oldPin"];
        $newPin = $_POST["newPin"];
        $confirmNewPin = $_POST["confirmNewPin"];

        $oldPin = trim($oldPin);
        $newPin = trim($newPin);
        $confirmNewPin = trim($confirmNewPin);

        if (empty($oldPin) || empty($newPin) || empty($confirmNewPin)) {
            echo "Please enter a valid PIN.";
            exit();
        }

        if (!preg_match("/^[0-9]{4}$/", $newPin)) {
            echo "New PIN should be 4 digits and only numeric.";
            exit();
        }

        $conn = new mysqli("localhost", "root", "", "atm");
        $q = "SELECT pin FROM users WHERE username='$username'";
        $record = $conn->query($q);

        if ($record->num_rows > 0) {
            $row = $record->fetch_assoc();
            $currentPin = $row["pin"];

            // Check if the old PIN matches the current PIN
            if ($oldPin == $currentPin) {
                // Check if the new PIN and confirm new PIN match
                if ($newPin == $confirmNewPin) {
                    // Update the PIN in the database
                    $updateQ = "UPDATE users SET pin='$newPin' WHERE username='$username'";
                    $conn->query($updateQ);
                    echo "PIN change successful.";
                } else {
                    echo "New PIN and confirm new PIN do not match. Please try again.";
                }
            } else {
                echo "Old PIN is incorrect. Please try again.";
            }
        } else {
            echo "Error retrieving PIN. Please try again later.";
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
