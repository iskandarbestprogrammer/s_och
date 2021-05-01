<?php require "../conn.php";

$q_sel_org = "SELECT * FROM org where org LIKE '%$_POST[org]%' and tel like '%$_POST[nomer]%' and inn like '%$_POST[innnomer]%'";


$res = mysqli_query($conn, $q_sel_org);
// echo var_dump($res);
echo "<br><table border = 1>
<th>Организация</th>
<th>Инн</th>
<th>Телефон</th>
<th>Адресс</th>
";
while($row = mysqli_fetch_array($res))
{
    $_SESSION['id_sel_org']=$row[0];
     echo '<tr><td>'.$row[1].'</td><td>'.$row[2].'</td><td>'.$row[3].'</td><td>'.$row[4].'</td>
    <td>
    <!-- <as href="upd_org.php?id_org=<?php echo '.$row[0].' ?>"  class="btn btn-success"> Выбрать</a> --> 
    <form action="upd_org.php" method= "post">
    <button type= "submit" name = b1 value = '.$row[0].' >Выбрать </button>
    </form>
    </td>
    </tr>';
}
echo "</table>";
mysqli_close($conn);mysqli_free_result($res);?>
