<?php
include_once 'menu.php';
include_once 'conn.php';
if(!$_SESSION['id_sp'])
{
 
    header("Location: sp_log_form.php");//redirect to login page to secure the welcome page without login access.
  }



?>

<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="style.css">
<title>Delete employee data</title>
</head>
<body>
<div class="container">
<div class="row">
<div class="col-lg-12">
<h1 style="text-align:center">Таблица очереди</h1>
<table  class="table table-striped">
	<tr>
	<th>№</th>
<th>Дата записи</th>
<th>Дата приема</th>
<th>Номер очереди </th>
<th>Время приема</th>
<th>Длительность</th>
<th>Причина обращение</th>
<th>Комментарии</th>
<th>id Специалиста</th>
<th> id Клиента</th>
<th>Удалить </th>
<th>Редактировать</th>
	</tr>
	<?php
	$idsp_org=$_SESSION['id_sp'];
	$result = mysqli_query($conn,"SELECT * FROM ochered where sp_id_sp='$idsp_org'");
	$i=0;
	while($row = mysqli_fetch_array($result)) {
	?>
	<tr class="<?php if(isset($classname)) echo $classname;?>">
	<td><?php echo $row["id_ochered"]; ?></td>
	<td><?php echo $row["data_zapisi"]; ?></td>
	<td><?php echo $row["data_priema"]; ?></td>
	<td><?php echo $row["nomer_ocheredi"]; ?></td>
	<td><?php echo $row["vremya_priema"]; ?></td>
	<td><?php echo $row["dlitelnost"]; ?></td>
	<td><?php echo $row["prichina_obr"]; ?></td>
	<td><?php echo $row["comments"]; ?></td>
	<td><?php echo $row["sp_id_sp"]; ?></td>
	<td><?php echo $row["kl_id_kl"]; ?></td>

	<td><a href="del_och_sp.php?id_ochered=<?php echo $row["id_ochered"]; ?>">Удалть </a></td>
	<td><a href="upd_och_sp.php?id_ochered=<?php echo $row["id_ochered"]; ?>"> Редактировать</a></td>
	</tr>
	<?php
	$i++;
	}
	?>
</table>
</div>
</div>


<div class="row">
<div class="col-lg-12">
<h1 style="text-align:center" >Таблица специалиста</h1>
<table  class="table table-striped">
	<tr>
	<th>№</th>
<th>Фамиля</th>
<th>Имя</th>
<th>Отчество</th>
<th>id Отдкл</th>
<th>Кабинет</th>
<th>Рег дата</th>
<th>Пасспорт</th>
<th>Дольжность</th>
<th>Логин </th>
<th>Пароль</th>
<th>Удалить </th>
<th>Редактировать</th>
	</tr>
	<?php
		$idsp_org=$_SESSION['id_sp'];
	$result = mysqli_query($conn,"SELECT * FROM sp where id_sp='$idsp_org'");
	$i=0;
	while($row = mysqli_fetch_array($result)) {
	?>
	<tr class="<?php if(isset($classname)) echo $classname;?>">
	<td><?php echo $row["id_sp"]; ?></td>
	<td><?php echo $row["fam"]; ?></td>
	<td><?php echo $row["imya"]; ?></td>
	<td><?php echo $row["otch"]; ?></td>
	<td><?php echo $row["otdel_id_otdel"]; ?></td>
	<td><?php echo $row["kab"]; ?></td>
	<td><?php echo $row["reg_date"]; ?></td>
	<td><?php echo $row["passport_"]; ?></td>
	<td><?php echo $row["doljnost"]; ?></td>
	<td><?php echo $row["login_"]; ?></td>
	<td><?php echo $row["psw"]; ?></td>
	<td><a href="del_sp.php?id_sp=<?php echo $row["id_sp"]; ?>">Удалить </a></td>
	<td><a href="upd_sp.php?id_sp=<?php echo $row["id_sp"]; ?>"> Редактировать</a></td>
	</tr>
	<?php
	$i++;
	}
	?>
</table>
</div>
</div>

<div class="row">
<div class="col-lg-12">
<h1 style="text-align:center">Таблица отдел</h1>
<table  class="table table-striped">
	<tr>
	<th>№</th>
<th>Отдел</th>
<th>Организации</th>
<th>Удалить </th>
<th>Редактировать</th>
	</tr>
	<?php
		$idsp_org=$_SESSION['id_sp'];
	$result = mysqli_query($conn,"select sp.id_sp, otdel.id_otdel, otdel.otdel, otdel.org_id_org from sp join 
	otdel on otdel.id_otdel=otdel_id_otdel where sp.id_sp='$idsp_org'");
	$i=0;
	while($row = mysqli_fetch_array($result)) {
	?>
	<tr class="<?php if(isset($classname)) echo $classname;?>">
	<td><?php echo $row["id_otdel"]; ?></td>
	<td><?php echo $row["otdel"]; ?></td>
	<td><?php echo $row["org_id_org"]; ?></td>

	<td><a href="del_otdel.php?id_otdel=<?php echo $row["id_otdel"]; ?>">Удалить </a></td>
	<td><a href="upd_otdel.php?id_otdel=<?php echo $row["id_otdel"]; ?>"> Редактировать</a></td>
	</tr>
	<?php
	$i++;
	}
	?>
</table>
</div>
</div>


<div class="row">
<div class="col-lg-12">
<h1 style="text-align:center">Таблица организация</h1>
<table  class="table table-striped">
	<tr>
	<th>№</th>
<th>Организация</th>
<th>Телефон</th>
<th>Адресс</th>
<th>Режим работ от</th>
<th>до</th>
<th>Рабочий дни</th>
<th>Удалить </th>
<th>Редактировать</th>
	</tr>
	<?php
	$idsp_org=$_SESSION['id_sp'];
	$result = mysqli_query($conn,"select sp.id_sp, otdel.org_id_org, org.id_org,org.org,org.tel,org.address_,org.vremya_raboty_nach,org.vremya_rabot_kon,org.raboch_dni from sp 
	join otdel on otdel.id_otdel=otdel_id_otdel 
	join org on org.id_org=otdel.org_id_org where sp.id_sp='$idsp_org' ");
	$i=0;
	while($row = mysqli_fetch_array($result)) {
	?>
	<tr class="<?php if(isset($classname)) echo $classname;?>">
	<td><?php echo $row["id_org"]; ?></td>
	<td><?php echo $row["org"]; ?></td>
	<td><?php echo $row["tel"]; ?></td>
	<td><?php echo $row["address_"]; ?></td>
	<td><?php echo $row["vremya_raboty_nach"]; ?></td>
	<td><?php echo $row["vremya_rabot_kon"]; ?></td>
	<td><?php echo $row["raboch_dni"]; ?></td>
	<td><a href="del_org.php?id_org=<?php echo $row["id_org"]; ?>">Удалить </a></td>
	<td><a href="upd_org.php?id_org=<?php echo $row["id_org"]; ?>"> Редактировать</a></td>
	</tr>
	<?php
	$i++;
	}
	?>
</table>
</div>
</div>









</div>
</body>
</html>