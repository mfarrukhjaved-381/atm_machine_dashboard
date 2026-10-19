<!-- ViewUsers.php -->
<?php
$conn = new mysqli("localhost", "root", "", "atm");

// Check for connection errors
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$q = "SELECT * FROM users";
$records = $conn->query($q);

echo "<ul>";

while ($row = $records->fetch_assoc()) {
    $id = $row["id"];
    $user = $row["username"];
    $pin = $row["pin"];

    echo "<li>No. " . $id . ":-<br>";
    echo "Username: " . $user . "<br>Pin: " . $pin . "<br>";
    echo "<a href='editUser.php?id=$id'>Edit</a> / ";
    echo "<a href='deleteUser.php?id=$id'>Delete</a>";
    echo "<hr></li>";
}

echo "</ul>";

$conn->close();
?>
