<!-- FrmEnterPin.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enter Your Pin</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<h1>ATM Machine</h1>
<form name="frmEnterPin" action="PinVerification.php" method="post" onsubmit="return validateForm()">
    <div>
        <label for="pin">Enter your 4 digits Pin:</label>
        <input type="password" name="pin" id="pin" required>
    </div>
    <span id="InvalidPinMessage" style="color:red"></span>
    <button type="submit">Login</button>
</form>

<script>
function validateForm() {
    var enteredPin = document.getElementById("pin").value;

    if (enteredPin.length !== 4 || isNaN(enteredPin)) {
        document.getElementById("InvalidPinMessage").innerHTML = "Invalid PIN. Please enter a valid 4-digit PIN.";
        return false; // Prevent the form from submitting
    } else {
        document.getElementById("InvalidPinMessage").innerHTML = ""; // Clear the error message
        return true; // Allow the form to submit
    }
}
</script>
</body>
</html>
