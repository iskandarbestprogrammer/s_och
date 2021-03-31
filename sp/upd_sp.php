<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<?php
// include '../menu.php';
session_start();
include '../conn.php';
if(count($_POST)>0) {
mysqli_query($conn,"UPDATE  sp set  id_sp='" . $_POST['id_sp'] . "', fam='" . $_POST['fam'] . "', 
imya='" . $_POST['imya'] . "', otch='" . $_POST['otch'] . "'
, kab ='" . $_POST['kab'] . "', passport_='" . $_POST['passport_'] . "'
, doljnost='" . $_POST['doljnost'] . "', login_='" . $_POST['login_'] . "', 
psw='" . $_POST['psw'] . "'
WHERE id_sp='" . $_POST['id_sp'] . "'") ;
header("Location: index.php");
$message = "Record Modified Successfully";
}
// else {
//     echo "<script <script type='text/javascript'> alert('Eror') </script>";
// }
$result = mysqli_query($conn,"SELECT * FROM sp WHERE id_sp='" . $_GET['id_sp'] . "'");
$row= mysqli_fetch_array($result);
?>
<html>
<head>
<title>Update SP</title>
</head>
<body>
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
<div class="navbar">
  <a class="active" href="../all_org.php"><i class="fa fa-fw fa-home"></i>Организация</a> 
  <a href="../otdel/index.php"><i class="fa fa-fw fa-envelope"></i> Отделение</a> 
  <a href="../sp/sp_och_reg_form.php"><i class="fa fa-fw fa-envelope"></i> Расписание</a> 
  <a href="../kl/kl_reg_form.php"><i class="fa fa-fw fa-user"></i> Клиент</a>
  <a href="index.php"><i class="fa fa-fw fa-user"></i> Личный кабинет</a>
 
</div>

<div class="container">
    <h1>Редактирование</h1>
<form name="frmUser" method="post" action="">
<div><?php if(isset($message)) { echo $message; 
} ?>
</div>
<div style="padding-bottom:5px;">

</div>
<br>
№ <br>
<input type="text" name="id_sp" class="txtField" value="<?php echo $row['id_sp']; ?>">
<br>
Фамилия <br>
<input type="text" name="fam" class="txtField" value="<?php echo $row['fam']; ?>">
<br>
Имя <br>
<input type="text" name="imya" class="txtField" value="<?php echo $row['imya']; ?>">
<br>
Отчество <br>
<input type="text" name="otch" class="txtField" value="<?php echo $row['otch']; ?>">
<br>
Кабинет <br>
<input type="text" name="kab" class="txtField" value="<?php echo $row['kab']; ?>">
<br>
Пасспорт <br>
<input type="text" name="passport_" class="txtField" value="<?php echo $row['passport_']; ?>">
<br>
Дольжность <br>
<input type="text" name="doljnost" class="txtField" value="<?php echo $row['doljnost']; ?>">
<br>
Логин <br>
<input type="text" name="login_" class="txtField" value="<?php echo $row['login_']; ?>">
<br>
Пароль <br>
<input type="text" name="psw" class="txtField" value="<?php echo $row['psw']; ?>">
<br>
<br>
<input type="submit"  name="submit" value="Обновить" class="btn btn-success">
</form>
</div>
</body>
</html>