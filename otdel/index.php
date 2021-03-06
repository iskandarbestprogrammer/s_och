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
<div class="container">
<div class="row">
<div class="col-lg-12">
<h1 style="text-align:center">Отделение</h1>
<table  class="table table-striped">
	<tr>
	<th>№</th>
<th>Отдел</th>
<th>Организации</th>
<th>Редактировать</th>
	</tr>
	<?php
     require "../conn.php";
		$idsp_org=$_SESSION['id_sp'];
	$result = mysqli_query($conn,"select sp.id_sp, otdel.id_otdel, otdel.otdel, otdel.org_id_org from sp join 
	otdel on otdel.id_otdel=otdel_id_otdel where sp.id_sp='$idsp_org'");
	$i=0;
    $tmp=mysqli_num_rows($result);
    if($tmp!=0){
	while($row = mysqli_fetch_array($result)) {
	?>
	<tr class="<?php if(isset($classname)) echo $classname;?>">
	<td><?php echo $row["id_otdel"]; ?></td>
	<td><?php echo $row["otdel"]; ?></td>
	<td><?php echo $row["org_id_org"]; ?></td>
    <a href="upd_otdel.php?id_otdel=<?php echo $row["id_otdel"]; ?>"  class="btn btn-success"> Редактировать</a>
	</tr>
	<?php
	$i++;
    
	}
}else {
    echo ' <a href="otdel_reg_form.php" class="btn btn-success">Регистрация отдела</a>  <a href="poisk_form.php" class="btn btn-success">Поиск отдела</a>';
 }
	?>
</table>
</div>
</div>
</div>
</body>
</html>