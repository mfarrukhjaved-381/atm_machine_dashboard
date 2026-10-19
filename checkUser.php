<?php
if ($_SERVER['REQUEST_METHOD'] == "GET" && isset($_GET['un'])) {
    $user = $_GET['un'];

    // Trim the input value
    $trimmed_username = trim($user);

    if (empty($trimmed_username)) {
        echo "Please enter a username.";
    } else {
        $conn = new mysqli("localhost", "root", "", "atm");
        $q = "SELECT * FROM users WHERE username='$trimmed_username'";
        $record = $conn->query($q);

        if ($record->num_rows > 0) {
            echo "This username is already taken. Please choose a different one.";
        } else {
            echo "";
        }

        $conn->close();
    }
} else {
    echo "Invalid request.";
}
?>
