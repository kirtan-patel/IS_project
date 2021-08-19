<?php 
  if (!isset($_SESSION['id_landlord'])) {
    $_SESSION['msg'] = "You must log in first";
    header('location:../login.php');
}
if (isset($_POST['logout'])) {
    
    unset($_SESSION['id_landlord']);
    header("location:../login.php");
}
?>