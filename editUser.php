<!-- editUser.php -->
<?php
$record_id = $_GET["id"];

$conn = new mysqli("localhost", "root", "", "atm");

// Check for connection errors
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Validate and sanitize the ID
$record_id = filter_var($record_id, FILTER_VALIDATE_INT);

if ($record_id === false) {
    die("Invalid record ID");
}

// Retrieve the record based on the provided ID
$q = "SELECT * FROM users WHERE id='$record_id'";
$record = $conn->query($q);

// Check if the record exists
if ($record->num_rows === 0) {
    die("Record not found");
}

// Fetch the record details
$row = $record->fetch_assoc();
$id = $row["id"];
$user = htmlspecialchars($row["username"]);
$pin = htmlspecialchars($row["pin"]);
?>

<form name="editfrm" id="editfrm" method="POST" action="updateUser.php">
    <label for="un">Username:</label>
    <input type="text" name="un" id="un" value="<?php echo $user; ?>"><br>
    
    <label for="pin">Pin:</label>
    <input type="password" name="pin" id="pin" pattern="[0-9]{4}" value="<?php echo $pin; ?>"><br>
    
    <input type="hidden" name="id" id="id" value="<?php echo $id; ?>">
    <input type="submit" value="Update User record">
</form>

