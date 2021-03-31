<div class="row">
<div class="col-lg-12">
<h1 style="text-align:center">Организация</h1>
<table  class="table table-striped">
	<tr>
	<th>№</th>
<th>Организация</th>
<th>Телефон</th>
<th>Адресс</th>
<th>Режим работ от</th>
<th>до</th>
<th>Рабочий дни</th>
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
	</tr>
	<?php
	$i++;
	}
	?>
</table>
</div>
</div>