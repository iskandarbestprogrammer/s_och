<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<?php 
session_start();
 require "../conn.php";
//Возвращает данные
$id=$_SESSION['id_sp'];
// $name=$_SESSION['sp_name'];
// $qq="select id_sp,imya from sp where imya='$name'";
// $sp_res=mysqli_query($conn, $qq);
// while ($now=mysqli_fetch_array($sp_res)) {
//     $id=$now[0];
// }

$q_sel_sem = "select data_priema,vremya_priema,dlitelnost,sp_id_sp from ochered where sp_id_sp='$id'";
$res = mysqli_query($conn, $q_sel_sem);
echo "<br><table border = 1>
<th>Дата приема</th>
<th>Время приема</th>
<th>Длительность</th>
";
while($row = mysqli_fetch_array($res)){ echo '<tr><td>'.$row[0].'</td><td>'.$row[1].'</td><td>'.$row[2].'</td></tr>';}
echo "</table>";
mysqli_close($conn);mysqli_free_result($res);?>
<script>
