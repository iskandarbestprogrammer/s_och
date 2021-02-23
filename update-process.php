<?php
include 'menu.php';
include_once 'conn.php';
if(count($_POST)>0) {
mysqli_query($conn,"UPDATE org set id_org='" . $_POST['id_org'] . "', org='" . $_POST['org'] . "', tel='" . $_POST['tel'] . "', address_='" . $_POST['address_'] . "'  WHERE id_org='" . $_POST['id_org'] . "'");
$message = "Record Modified Successfully";
}
$result = mysqli_query($conn,"SELECT * FROM org WHERE id_org='" . $_GET['id_org'] . "'");
$row= mysqli_fetch_array($result);
?>
<html>
<head>
<title>Update Employee Data</title>
</head>
<body>
<form name="frmUser" method="post" action="">
<div><?php if(isset($message)) { echo $message; } ?>
</div>
<div style="padding-bottom:5px;">
<a href="org_list.php">назад</a>
</div>
Username: <br>
<input type="hidden" name="id_org" class="txtField" value="<?php echo $row['id_org']; ?>">
<input type="text" name="id_org"  value="<?php echo $row['id_org']; ?>">
<br>
<input type="text" name="org" class="txtField" value="<?php echo $row['org']; ?>">
<br>
First Name: <br>
<input type="text" name="tel" class="txtField" value="<?php echo $row['tel']; ?>">
<br>
Last Name :<br>
<input type="text" name="address_" class="txtField" value="<?php echo $row['address_']; ?>">
<br>
<!-- City:<br>
<input type="text" name="city_name" class="txtField" value="<?php echo $row['city_name']; ?>">
<br>
Email:<br>
<input type="text" name="email" class="txtField" value="<?php echo $row['email']; ?>">
<br> -->
<input type="submit" name="submit" value="Обновить" class="buttom">

</form>
</body>
</html>