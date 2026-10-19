<!-- DeleteUser.php -->
<?php
$conn = new mysqli("localhost", "root", "", "atm");
$record_id = filter_var($_GET["id"], FILTER_VALIDATE_INT);

if ($record_id === false) {
    die("Invalid record ID");
}

// Check if the record exists before attempting deletion
$q = "SELECT * FROM users WHERE id='$record_id'";
$result = $conn->query($q);

if ($result->num_rows === 0) {
    die("Record not found");
}

// Perform the deletion
$q_delete = "DELETE FROM users WHERE id='$record_id'";

if ($conn->query($q_delete)) {
    echo "This user record has been deleted successfully";
} else {
    echo "Error deleting record: " . $conn->error;
}

// Close the database connection
$conn->close();
?>
