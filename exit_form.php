<?php session_start();
unset($_SESSION['id_kl']);
unset($_SESSION['id_sp']);
unset($_SESSION['imya']);
session_destroy();
header("Location:index.php");exit; 
?>