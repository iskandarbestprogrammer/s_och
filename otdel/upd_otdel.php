<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<?php
// include 'menu.php';
session_start();
include 'conn.php';
if(count($_POST)>0) {
mysqli_query($conn,"UPDATE  otdel set  id_otdel='" . $_POST['id_otdel'] . "', otdel='" . $_POST['otdel'] . "'
WHERE id_otdel='" . $_POST['id_otdel'] . "'") ;

$message = "Record Modified Successfully";
}
// else {
//     echo "<script <script type='text/javascript'> alert('Eror') </script>";
// }
$result = mysqli_query($conn,"SELECT * FROM otdel WHERE id_otdel='" . $_GET['id_otdel'] . "'");
$row= mysqli_fetch_array($result);
?>
<html>
<head>
<title>Update Otdel</title>
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
<input type="text" name="id_otdel" class="txtField" value="<?php echo $row['id_otdel']; ?>">
<br><br>
<br>
Название организация <br>
<input type="text" name="otdel" class="txtField" value="<?php echo $row['otdel']; ?>">
<br>
<br>
<input type="submit"  name="submit" value="Обновить" class="btn btn-success">

</form>
</div>
</body>
</html>