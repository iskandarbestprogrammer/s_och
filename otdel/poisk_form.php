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
  <a class="active" href="index.php"><i class="fa fa-fw fa-home"></i>Организация</a> 
  <a href="../otdel/index.php"><i class="fa fa-fw fa-envelope"></i> Отделение</a> 
  <a href="../sp/sp_och_reg_form.php"><i class="fa fa-fw fa-envelope"></i> Расписание</a> 
  <a href="../kl/kl_reg_form.php"><i class="fa fa-fw fa-user"></i> Клиент</a>
  <a href="../sp/index.php"><i class="fa fa-fw fa-user"></i> Личный кабинет</a>
</div>
<div class="container">
<div class="row">
<div class="col-lg-6">
    <h1>Результат</h1>
    <div class="content" name="content" id="content"></div>
</div>
 <div class="col-lg-6">
 <h1>Поиск организации</h1>
<lablel>Название организации</lablel>
<br>
<input type="text" name="org" id="org" placeholder="Введите название организации">
<br><br>
<label>Номер телефона</label><br>
<input type="text" name="nomer" id="nomer" placeholder="Введите номер телефона">
<br><br>
<label>ИНН номер</label><br>
<input type="text" name="innnomer" id="innnomer" placeholder="ИНН номер">
<br><br>
<button id="poisk">Поиск</button>
 </div>   
</div>    
</div>
</body>
</html>

<script>
$(document).ready(function(){
  $('#poisk').click(function () {
    $.ajax({
      type:'POST',
								url: 'poisk.php',
								data:
								'org='+document.getElementById('org').value  +
								'&nomer='+document.getElementById('nomer').value +
                '&innnomer='+document.getElementById('innnomer').value ,
								success: function (data){
										if(data.length != 0) {alert(data);
                                            $('#content').html(data);
                                        }
							
							
                  }});
             })});


  </script>