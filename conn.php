<?php $db_host = "localhost";
$db_name = "sochf";
$db_user = "root";
$db_pass = "";
$conn = new mysqli ($db_host, $db_user, $db_pass, $db_name) or die ("Невозможно подключиться к БД");
mysqli_set_charset($conn,'utf8');?>