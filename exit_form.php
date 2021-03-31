<<<<<<< HEAD
<?php session_start();
unset($_SESSION['id_kl']);
unset($_SESSION['id_sp']);
unset($_SESSION['imya']);
session_destroy();
header("Location:index.php");exit; 
?>
=======
<?php session_start();
unset($_SESSION['id_kl']);
unset($_SESSION['id_sp']);
unset($_SESSION['imya']);
session_destroy();
header("Location is not found :index.php");exit; 
?>
>>>>>>> e7c6bf908a0ee376081ee1f1573041b6602bb038
