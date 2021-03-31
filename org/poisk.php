<?php require "../conn.php";
//Возвращает данные

$q_sel_org = "SELECT * FROM org where org LIKE '%$_POST[org]%' or tel like '%$_POST[nomer]%' or inn like '%$_POST[innnomer]%'";


$res = mysqli_query($conn, $q_sel_org);
// echo var_dump($res);
echo "<br><table border = 1>
<th>Организация</th>
<th>Телефон</th>
<th>Адресс</th>
<th>Режим работ от</th>
<th>до</th>
<th>Рабочий дни</th>";
while($row = mysqli_fetch_array($res))
{ echo '<tr><td>'.$row[1].'</td><td>'.$row[2].'</td><td>'.$row[3].'</td><td>'.$row[4].'</td><td>'.$row[5].'</td><td>'.$row[6].'</td>
</tr>';}
echo "</table>";
mysqli_close($conn);mysqli_free_result($res);?>
