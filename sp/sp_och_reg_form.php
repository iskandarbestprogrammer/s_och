

<?php 
session_start();
// require '../menu.php';
if(!$_SESSION['id_sp'])
{
 
    header("Location: sp_log_form.php");//redirect to login page to secure the welcome page without login access.
  }
?><!DOCTYPE html>
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
</div>

<div class="container">
  

<div class="row">
<div class="col-lg-6">
<h1>Добавить расписание</h1>
    <label>Дата приема</label><br>
    <input type="date" id='data_priema' name="data_priema"><br>
    <label>Время приема </label><br>
    <input type="time" id='vremya_priema' name="vremya_priema" ><br>
    <label>Длительность(минуте)</label><br>
    <input type="number" id="dlitel" name="dlitel" ><br>
    <br>
    <button id = "b2" >Добавить</button>
</div>
<div class="col-lg-6">
<h1>Расписание</h1>
<div class="content" id="content">
</div>
</div>
</div>
</div>
</body>
</html>
<script>
$(document).ready(function(){
  $('#b2').click(function () {
    $.ajax({
      type:'POST',
								url: 'sp_och_reg.php',
								data:
								'data_priem='+document.getElementById('data_priema').value  +
								'&vremya_priema='+document.getElementById('vremya_priema').value  +
                '&dlitel='+document.getElementById('dlitel').value,
								success: function (data){
           alert('work');
           if(data.length != 0) {alert(data);}
                  // $('#content').html(data);
                  // alert('work')
								//Если какая-либо запись пустая, то вывести что просит echo в reg.php  
	
                  }});
             })});

 window.onload=function(){
	$.ajax({type:'POST',
			url: 'sel_sp_och.php',
			success: function (data)  {	$('#content').html(data);	}});
}
  </script>