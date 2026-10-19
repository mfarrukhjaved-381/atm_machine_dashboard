<?php
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $user = $_POST["un"];
    $pin = $_POST["pin"];
    $initialBalance = 1000;
    // Trim the input values
    $trimmed_username = trim($user);
    $trimmed_pin = trim($pin);
    $conn = new mysqli("localhost", "root", "", "atm");
    $q = "SELECT * FROM users WHERE username='$user' OR pin='$pin'";
    $result = $conn->query($q);

    if ($result->num_rows > 0) {
        echo "This username or PIN is already taken. Please choose a different one.";
    } elseif (empty($trimmed_username) || empty($trimmed_pin)) {
        echo "Please set valid username and password.";
    } elseif (!preg_match("/^[0-9]{4}+$/", $trimmed_pin)) {
        echo "PIN should contain only numeric digits.";
    } else {
        // Proceed only if input is valid
        $q = "INSERT INTO users (username, pin, balance) VALUES ('$trimmed_username', '$trimmed_pin', '$initialBalance')";
        if ($conn->query($q)) {
            echo "Congratulations! You've successfully created an account.";
        } else {
            echo "Error: " . $conn->error;
        }
    }

    $conn->close();
}
?>
