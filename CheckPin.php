<?php
if ($_SERVER['REQUEST_METHOD'] == "GET" && isset($_GET['pin'])) {
    $pin = $_GET['pin'];

    // Trim the input value
    $trimmed_pin = trim($pin);

    if (empty($trimmed_pin)) {
        echo "Please enter a PIN.";
    } else {
        $conn = new mysqli("localhost", "root", "", "atm");
        $q = "SELECT * FROM users WHERE pin='$trimmed_pin'";
        $record = $conn->query($q);

        if ($record->num_rows > 0) {
            echo "This PIN is already taken. Please choose a different one.";
        } else {
            echo "";
        }

        $conn->close();
    }
} else {
    echo "Invalid request.";
}
?>
