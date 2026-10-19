<!-- FrmSetPin.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Set Your Pin</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<h1>ATM Machine</h1>
<form name="frmsetpin" action="SaveUserPin.php" method="post">
        <div>
        <label for="un" aria-label="Enter your username">Enter your Username:</label>
        <input type="text" name="un" id="un" onblur="checkUser(this.value)" required placeholder="Enter your username">
        <span id="UsernameAvailabilityMessage" style="color:red"></span>
        </div>
        <div>
        <label for="pin" aria-label="Set your 4-digit PIN">Set your 4 digits Pin:</label>
        <input type="password" name="pin" id="pin" pattern="[0-9]{4}" onblur="checkPin(this.value)" required placeholder="Set your pin within 4 digits">
        <span id="PinAvailabilityMessage" style="color:red"></span>
        </div>
        <button type="submit">Save</button>
    </form>
    

<script>
function checkUser(username) {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("UsernameAvailabilityMessage").innerHTML = this.responseText;
        }
    };

    xmlhttp.open("GET", "checkUser.php?un="+username, true);
    xmlhttp.send();
}
function checkPin(pin) {
    var isNumeric = /^\d+$/.test(pin);

    if (!isNumeric) {
        alert("PIN should contain only numeric digits.");
        document.getElementById("pin").value = "";
    } else {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("PinAvailabilityMessage").innerHTML = this.responseText;
        }
    
    };
    }
    xmlhttp.open("GET", "checkPin.php?pin="+pin, true);
    xmlhttp.send();
}


</script>
</body>
</html>