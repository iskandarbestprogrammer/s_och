<?php 
require 'menu.php';
if(!$_SESSION['id_sp'])
{
 
    header("Location: sp_log_form.php");//redirect to login page to secure the welcome page without login access.
  }
echo $_SESSION['imya'];
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Регистрация очереди</title>
</head>
<body>
<div class="och_reg" style=' margin: auto;
width: 50%;
border: 3px solid green;
padding: 10px; text-align:center'>
    <h1>Регистрация очереди для специалиста</h1>
    <form method="post" action="sp_och_reg.php">
    <!-- <label>Номер очереди</label><br>
    <input type="text" name="nomer_ochered"> <br> -->
    <label>Клиент</label><br>
    <input type="text" name="kl"><br>
    <label>Дата приема</label><br>
    <input type="date" name='data_priema' атрибуты><br>
    <label>Время приема </label><br>
    <input type="time" name='vremya_priema' атрибуты><br>
    <label>Длительность(минуте)</label><br>
    <input type="number" name="dlitel" атрибуты><br>
    <label>Организация</label><br>
    <select name='sel_org' id='sel_org'>
<?php 
//Соединение к БД
require "conn.php";

$sp_och_name=$_SESSION['id_sp'];
//Запрос на вывод организ
$q_sel_org = "select org.org, otdel.otdel, sp.id_sp from org 
join otdel on org.id_org=otdel.org_id_org
join sp on otdel.id_otdel=sp.otdel_id_otdel where id_sp ='$sp_och_name'";
//Результат выполнения запроса
$res0 = mysqli_query($conn, $q_sel_org);
//Перебор значений уже полученных от запроса
$org_id;
while($row0 = mysqli_fetch_array($res0)) {
  echo"<option value = $row0[0]>$row0[0]</option>";
  $org_id=$row0[0];
}
//Закрываем соединение
mysqli_close($conn); 
//Освобождаем память от результатов запроса
mysqli_free_result($res0); ?>
  ?>
    </select>
    <br><br>
    <label>Причина обращение</label><br>
    <textarea rows="5" name="prichina" cols="45"></textarea><br>
    <label>Комментария</label><br>
    <textarea rows="8" cols="45" name="coment"></textarea>
    <br>
    <br>
    <input type = "submit" class="bron_och" name = "bron_och" value = "Бронировать">
    </form>
    </div>
</body>
</html>