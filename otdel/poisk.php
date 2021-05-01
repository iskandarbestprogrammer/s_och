<?php require "../conn.php";
//Возвращает данные

$q_sel_org = "SELECT * FROM otdel where otdel LIKE '%$_POST[otdel]%'";


$res = mysqli_query($conn, $q_sel_org);
// echo var_dump($res);
echo "<br><table border = 1>
<th>Отделение</th>
<th>Выбрать</th>
";
while($row = mysqli_fetch_array($res))
{ echo '<tr><td>'.$row[1].'</td><td><a href="otdel_reg_form.php?id_otdel=<?php echo '.$row[0].' ?>"  class="btn btn-success"> Выбрать</a> 
	</td>
	</tr>';}
echo "</table>";
mysqli_close($conn);mysqli_free_result($res);?>
