<?php
// include 'menu.php';
session_start();
include '../conn.php';
/*
if(count($_POST)>0) {
mysqli_query($conn,"UPDATE  org  set  id_org='" . $_POST['id_org'] . "',org='" . $_POST['org'] . "', tel='" . $_POST['tel'] . "', 
address_='" . $_POST['address_'] . "', vremya_raboty_nach='" . $_POST['vremya_raboty_nach'] . "',
 vremya_rabot_kon='" . $_POST['vremya_rabot_kon'] . "', raboch_dni ='" . $_POST['raboch_dni'] . "'  
WHERE id_org='" . $_POST['id_org'] . "'") ;

$message = "Record Modified Successfully";
 header("Location: org_list.php");
}*/
// else {
//     echo "<script <script type='text/javascript'> alert('Eror') </script>";
// }

echo $_POST['b1'];
if($_SESSION['id_sel_org']){$result = mysqli_query($conn,"SELECT * FROM org WHERE id_org=$_SESSION[id_sel_org]");
}
else
{
$result = mysqli_query($conn,"SELECT * FROM org WHERE id_org='" . $_GET['id_org'] . "'");
}
$row= mysqli_fetch_array($result);
?>
<html>
<head>
<title>Update Organization</title>
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
<input type="text" name="id_org" class="txtField" value="<?php echo $row['id_org']; ?>">
<br><br>
<br>
Название организация <br>
<input type="text" name="org" class="txtField" value="<?php echo $row['org']; ?>">
<br><br>
Телефон номер <br>
<input type="text" name="tel" class="txtField" value="<?php echo $row['tel']; ?>">
<br><br>
Адресс<br>
<input type="text" name="address_" class="txtField" value="<?php echo $row['address_']; ?>">
<br>
<br>
Режим работ от<br>
<input type="time" name="vremya_raboty_nach" class="txtField" value="<?php echo $row['vremya_raboty_nach']; ?>">
<br><br>
До<br>
<input type="time" name="vremya_rabot_kon" class="txtField" value="<?php echo $row['vremya_rabot_kon']; ?>">
<br>
<br>
Рабочий дни<br>
<input type="text" name="raboch_dni" class="txtField" value="<?php echo $row['raboch_dni']; ?>">
<br>
<br>
<input type="submit"  name="submit" value="Обновить" class="btn btn-success">

</form>
</div>
</body>
</html>