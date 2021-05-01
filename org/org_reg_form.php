
<?php
//  include "../menu.php"
session_start();
  ?> 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Регистрация организации</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
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
  <a href="../otdel/otdel_reg_form.php"><i class="fa fa-fw fa-envelope"></i> Отделение</a> 
  <a href="../sp/sp_och_reg_form.php"><i class="fa fa-fw fa-envelope"></i> Расписание</a> 
  <a href="../kl/kl_reg_form.php"><i class="fa fa-fw fa-user"></i> Клиент</a>
  <a href="../sp/index.php"><i class="fa fa-fw fa-user"></i> Личный кабинет</a>
 
</div>
<div class="org" style=" margin: auto;
margin-top:10px;
  width: 50%;
  border: 3px solid green;
  padding: 10px;" >

<h4>Регистрация организации</h1> 
<label for="email"><b>Направление</b></label><br>
    <?php 
//Соединение к БД
require "../conn.php";

$napr=0;
$result = mysqli_query($conn,"SELECT napr_id_napr FROM sp where id_sp=$_SESSION[id_sp]");
while ($row=mysqli_fetch_array($result)) {
   $napr=$row[0];
}
$tmpres=mysqli_num_rows($result);
 if ($tmpres!=0){
//Запрос на вывод городов
$q_sel_pol = "select * from napr   ";
//Результат выполнения запроса
$res0 = mysqli_query($conn, $q_sel_pol);
$rayon_id;

  echo " <select name = 'sel_napr' id = 'sel_napr' onchange = sel_naprf($napr) >
  <script> 
  //Возвращаем значение области
  // var sel1 = document.getElementById('sel_napr');
  //Создаем элемент списка
    // var opt1 = document.createElement('option');
  //Новое значение равное нулю и надпись 'Не выбрано'
    // opt1.value = 0;	opt1.text = 'Не выбрано';
  //Добавляем в существующий объект новый элемент option в самом его начале
    // sel1.add(opt1, sel1.options[0]);
  </script>";
  //Цикл перебора значений для отображения остальных элементов
  while($row = mysqli_fetch_array($res0))
  {//Добавление элементов
    echo "<option value  =  $row[0]> $row[1] </option>";
  }
  echo "</select> &nbsp ";


//Закрываем соединение
mysqli_close($conn); 
//Освобождаем память от результатов запроса
mysqli_free_result($res0);}else{
  echo "<i style='color:red'>Направление уже выбрано</i>";
} ?>

<script> 
//Функция возвращает набор городов, в качестве входного параметра идет область
	function sel_naprf(a)
	{
		return $.ajax({type: 'POST',//Тип отправки данных
            url: 'org_reg.php',//Файл обработки
			data:'sel_napr='+a,//Номер области для ajax_db1.php
            success: function (data)  {	 }});//Обновить данные во вкладке городов
	}	
</script>
<br>
<label>Название организации</label><br>
<input class="form-control" type="text" name="org_name" id="org_name">
<br>
<label>ИНН номер</label><br>
<input class="form-control" type="text" name="innnomer" id="innnomer">
<br>
<label>Телефон</label><br>
<input class="form-control" type="text" name="tel" id="tel">
<br>
<label>Адресс</label><br>
<input class="form-control" type="text" name="adress" id="adress">
<br>
<label>Режим работ от</label><br>
<input class="form-control" type="time" name="vremya_raboty_nach" id="vremya_raboty_nach">
<br>
<label>До</label><br>
<input class="form-control" type="time" name="vremya_rabot_kon" id="vremya_rabot_kon">
<br>
<label>Рабочий дни</label><br>
<input class="form-control" type="text" name="raboch_dni" id="raboch_dni">
<br>
<br>
<button id="b1">Подверждать</button>
</div>

</body>
</html>


<script>
$(document).ready(function(){
  $('#b1').click(function () {
    $.ajax({
      type:'POST',
								url: 'org_reg.php',
								data:
								'sel_napr='+document.getElementById('sel_napr').value  +
								'&org_name='+document.getElementById('org_name').value  +
                '&innnomer='+document.getElementById('innnomer').value  +
                '&tel='+document.getElementById('tel').value  +
								'&adress='+document.getElementById('adress').value  +
                '&vremya_raboty_nach='+document.getElementById('vremya_raboty_nach').value  +
								'&vremya_rabot_kon='+document.getElementById('vremya_rabot_kon').value  +
								'&raboch_dni='+document.getElementById('raboch_dni').value,
								success: function (data){
                  alert(data);
                  location = '../otdel/otdel_reg_form.php';
                

                  // alert('work')
								//Если какая-либо запись пустая, то вывести что просит echo в reg.php  
										if(data.length != 0) {alert(data);
                   
							
                      }
                  }});
             })});


  </script>