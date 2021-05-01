<?php 
session_start();

// require '../menu.php';
if(!$_SESSION['id_sp'])
{
 
    header("Location: sp_log_form.php");//redirect to login page to secure the welcome page without login access.
  }
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Организации</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<style>
* {box-sizing: border-box}
body {font-family: Arial, Helvetica, sans-serif;}

.navbar {
  width: 100%;
  background-color: #555;
  overflow: auto;
}

.navbar a {
  float: left;
  padding: 12px;
  color: white;
  text-decoration: none;
  font-size: 17px;
  width: 20%; /* Four links of equal widths */
  text-align: center;
}

.navbar a:hover {
  background-color: #000;
}

.navbar a.active {
  background-color: #4CAF50;
}

@media screen and (max-width: 500px) {
  .navbar a {
    float: none;
    display: block;
    width: 100%;
    text-align: left;
  }
}
</style>
<body>
<div class="navbar">
  <a class="active" href="../org/index.php"><i class="fa fa-fw fa-home"></i>Организация</a> 
  <a href="../otdel/index.php"><i class="fa fa-fw fa-envelope"></i> Отделение</a> 
  <a href="../sp/sp_och_reg_form.php"><i class="fa fa-fw fa-envelope"></i> Расписание</a> 
  <a href="../kl/kl_reg_form.php"><i class="fa fa-fw fa-user"></i> Клиент</a>
  <a href="../sp/index.php"><i class="fa fa-fw fa-user"></i> Личный кабинет</a>
</div>


<div class="otdl" style=" margin:auto;
  width: 20%;
  border: 3px solid green;
  padding: 10px; text-align:center" >
<h1>Регистрация отдел</h1> 
<form action="otdel_reg.php" method="post">
<label>Название отдела</label><br>
<input  type="text" name="otdel_name" >
<br>
<label>Выберите организации</label>
<br>
<select name='sel_org' id='sel_org'>
<?php 
//Соединение к БД
require "../conn.php";
//Запрос на вывод организ

$q_sel_org = "SELECT id_org, org FROM org where id_org='$_SESSION[id_org]'";
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