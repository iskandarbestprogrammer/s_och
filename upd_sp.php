<?php
include 'menu.php';
include 'conn.php';
if(count($_POST)>0) {
mysqli_query($conn,"UPDATE  sp set  id_sp='" . $_POST['id_sp'] . "', fam='" . $_POST['fam'] . "', 
imya='" . $_POST['imya'] . "', otch='" . $_POST['otch'] . "'
, kab ='" . $_POST['kab'] . "', passport_='" . $_POST['passport_'] . "'
, doljnost='" . $_POST['doljnost'] . "', login_='" . $_POST['login_'] . "', 
psw='" . $_POST['psw'] . "'
WHERE id_sp='" . $_POST['id_sp'] . "'") ;
header("Location: org_list.php");
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
<div class="container">
<form name="frmUser" method="post" action="">
<div><?php if(isset($message)) { echo $message; 
} ?>
</div>
<div style="padding-bottom:5px;">
<a type="button" class="btn btn-primary" href="org_list.php">назад</a>
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