<!-- updateUser.php -->
<?php
$conn = new mysqli("localhost", "root", "", "atm");

// Check for connection errors
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$user = $_POST["un"];
$pin = $_POST["pin"];
$id = $_POST["id"];

$trimmed_username = trim($user);
$trimmed_pin = trim($pin);

if (empty($trimmed_username) || empty($trimmed_pin)) {
    echo "Please enter both username and password.";
} elseif (!preg_match("/^[0-9]+$/", $trimmed_pin)) {
    echo "PIN should contain only numeric digits.";
}

// Use prepared statement to prevent SQL injection
$stmt = $conn->prepare("UPDATE users SET username = ?, pin = ? WHERE id = ?");
$stmt->bind_param("ssi", $user, $pin, $id);
$result = $stmt->execute();

// Check if the update was successful
if ($result) {
    echo "User's record updated successfully";
} else {
    echo "Error updating user's record: " . $conn->error;
}

$stmt->close();
$conn->close();
?>
