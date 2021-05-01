<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<?php 
// require '../menu.php';
session_start();
if(!$_SESSION['id_kl'])
{
 
    header("Location: ../kl_log_form.php");//redirect to login page to secure the welcome page without login access.
  }

?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Регистрация очереди для клиента</title>
</head>
<body>
<div class="och_reg" style=' margin: auto;
width: 50%;
border: 3px solid green;
padding: 10px; text-align:center'>
    <h1>Регистрация очереди для клиента</h1>
    <div class="content" id='content' ></div>
    <form method="post"  action="kl_och_reg.php">
    <!-- <label>Номер очереди</label><br>
    <input type="text" name="nomer_ochered"> <br> -->
    <label>Имя специалист</label><br>
    <input type="text" name="sp" id=""><br>
    <label>Дата приема</label><br>
    <input type="date" name='data_priema' атрибуты><br>
    <label>Время приема </label><br>
    <input type="time" name='vremya_priema' атрибуты><br>
    <br>
    <br>
    <label>Причина обращение</label><br>
    <textarea rows="5" name="prichina" cols="45"></textarea><br>
    <label>Комментария</label><br>
    <textarea rows="8" cols="45" name="coment"></textarea>
    <br>
    <br>
    <input type = "submit" class="bron_och" name = "bron_och" value = "Бронировать">
    </form>
    </div>
</body>
</html>