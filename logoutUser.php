<!-- logoutUser.php -->
<?php session_start();
session_unset();
session_destroy();
header("location:FrmEnterPin.php");
?>
