<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1 align=center>Добро пожаловать на админ панел</h1>
    <?php
    
    require "../conn.php";
//Возвращает данные
$q_sel_sp = "select count(*)  from sp";
$q_sel_kl="select count(*)  from kl";
$q_sel_org="select count(*)  from org";
$q_sel_otdel="select count(*)  from otdel";
$res_kl = mysqli_query($conn, $q_sel_kl);
$res_sp = mysqli_query($conn, $q_sel_sp);
$res_org = mysqli_query($conn, $q_sel_otdel);
$res_otdel = mysqli_query($conn, $q_sel_otdel);
echo "<br><table border = 1 align=center>
<th> Специалисты</th>
<th>Клиенты</th>
<th>Организация</th>
<th>Отделение</th>
";
while($row_sp = mysqli_fetch_array($res_sp)){ echo '<tr><td>'.$row_sp[0].'</td>';
    while($row_kl = mysqli_fetch_array($res_kl)){ echo '<td>'.$row_kl[0].'</td>';
        while($row_org = mysqli_fetch_array($res_org)){ echo '<td>'.$row_org[0].'</td>';
            while($row_otdel = mysqli_fetch_array($res_otdel)){ echo '<td>'.$row_otdel[0].'</td>';
echo '</tr>';
        }
    }
}
}
echo "</table>";у
mysqli_close($conn);mysqli_free_result($res_sp);
        
    
    ?>





</body>
</html>
