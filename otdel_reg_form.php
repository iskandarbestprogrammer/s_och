<?php 
require 'menu.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Регистрация отдел</title>
</head>
<body>

<!-- 
<div class="org" style=" margin: left;
  width: 30%;
  border: 3px solid green;
  padding: 10px;" >
  <form action="org_reg.php" method="post">
<h1>Регистрация организаци</h1> 
<label>Название организации</label><br>
<input class="form-control" type="text" name="org_name">
<br>
<label>Телефоон</label><br>
<input class="form-control" type="text" name="tel">
<br>
<label>Адресс</label><br>
<input class="form-control" type="text" name="adress">
<br><br>
<input type = "submit" class="registerbtn" name = "reg_org" value = "Зарегистрировать">
</form>
</div> -->


<div class="otdl" style=" margin:auto;
  width: 20%;
  border: 3px solid green;
  padding: 10px; text-align:center" >
<h1>Регистрация отдел</h1> 
<form action="otdel_reg.php" method="post">
<label>Название отдел</label><br>
<input  type="text" name="otdel_name">
<br>
<label>Выберите организации</label>
<br>
<select name='sel_org' id='sel_org'>
<?php 
//Соединение к БД
require "conn.php";
//Запрос на вывод организ
$org=$_SESSION['org_name'];
$q_sel_org = "SELECT id_org, org FROM org where org='$org'";
//Результат выполнения запроса
$res0 = mysqli_query($conn, $q_sel_org);
//Перебор значений уже полученных от запроса
$org_id;
while($row0 = mysqli_fetch_array($res0)) {
  echo"<option value = $row0[0]>$row0[1]</option>";
  $org_id=$row0[0];
}
//Закрываем соединение
mysqli_close($conn); 
//Освобождаем память от результатов запроса
mysqli_free_result($res0); ?>
  ?>
    </select>
<br><br>
<input type = "submit" class="registerbtn" name = "reg_otdl" value = "Зарегистрировать">
</form>
</div>

</body>
</html>
