<?php 
session_start(); 
unset($_SESSION['idTokenString']); 
unset($_SESSION['verified_user_id']);
unset($_SESSION['email']); 
$_SESSION['status'] = "Logged out Successfully"; 
unset($_SESSION['status']); 
header('Location: /CardMaker/theme/login.php');
?>