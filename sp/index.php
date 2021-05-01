

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
    <title>Регистрация очереди</title>
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
  <a href="sp_och_reg_form.php"><i class="fa fa-fw fa-envelope"></i> Расписание</a> 
  <a href="../kl/kl_reg_form.php"><i class="fa fa-fw fa-user"></i> Клиент</a>
  <a href="index.php"><i class="fa fa-fw fa-user"></i> Личный кабинет</a>
   <form action = '../exit_form.php' method = 'POST'>
<input type = 'submit' name = 'b2' class="btn btn-outline-success my-2 my-sm-0" value = 'Выйти'>
</form>
</div> 
</div>
  
</nav>
<!-- <div class='search_org' style=" margin: right;
margin-right:30px;
  padding: 10px;"  > -->

</div>
 
<div class="row">
<div class="col-lg-6">

</div>


<!-- 222 -->
<div class="col-lg-6">
<h1 style="text-align:center" >Мой Профиль</h1>
	<?php
    require "../conn.php";
		$idsp_org=$_SESSION['id_sp'];
	$result = mysqli_query($conn,"SELECT * FROM sp where id_sp='$idsp_org'");
	$i=0;
	while($row = mysqli_fetch_array($result)) {
	?>
	<div class="profile">
    <div class="container">
     <div class="row">
         <div class=""><ul><li><span>Фамилия: </span><?php echo $row["fam"]; ?></li>
          <li><span>Имя: </span><?php echo $row["imya"]; ?></li> 
           <li><span>Отчества: </span><?php echo $row["otch"]; ?></li>
        <!-- <li><span>Отделение: </span><?php echo $row["kab"]; ?></li> -->
          <li><span>Пасспорт: </span><?php echo $row["passport_"]; ?></li> 
           <li><span>Должность: </span><?php echo $row["doljnost"]; ?></li>
           <li><span>Дата регистрации: </span><?php echo $row["reg_date"]; ?></li>
           <li><span>Кабинет: </span><?php echo $row["kab"]; ?></li>
           <a href="upd_sp.php?id_sp=<?php echo $row["id_sp"]; ?>"  class="btn btn-success"> Редактировать</a>
           </ul>
        
        </div>
   
     </div>   
    </div>
</div>
	<!-- <td><?php echo $row["id_sp"]; ?></td>
	<td></td>
	<td></td>
	<td></td>
	<td></td>
	<td></td>
	<td></td>
	<td><?php echo $row["passport_"]; ?></td>
	<td></td>
	<td><?php echo $row["login_"]; ?></td>
	<td><?php echo $row["psw"]; ?></td> -->
	
	<td></td>
	</tr>
	<?php
	$i++;
	}
	?>
</table>
</div>
</div>

</body>
</html>