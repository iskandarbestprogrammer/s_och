<<<<<<< HEAD
<?php $db_host = "localhost";
$db_name = "s_och";
$db_user = "root";
$db_pass = "";
$conn = new mysqli ($db_host, $db_user, $db_pass, $db_name) or die ("Невозможно подключиться к БД");
=======
<?php $db_host = "localhost";
$db_name = "s_och";
$db_user = "root";
$db_pass = "";
$conn = new mysqli ($db_host, $db_user, $db_pass, $db_name) or die ("Невозможно подключиться к БД");
>>>>>>> e7c6bf908a0ee376081ee1f1573041b6602bb038
mysqli_set_charset($conn,'utf8');?>