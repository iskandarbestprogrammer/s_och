
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Registration Form</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<style type="text/css">
#deceased{
    background-color:#FFF3F5;
	padding-top:10px;
	margin-bottom:10px;
}
.remove_field{
	float:right;	
	cursor:pointer;
	position : absolute;
}
.remove_field:hover{
	text-decoration:none;
}
</style>
  </head>
  <body>
<div class="panel panel-primary" style="margin:20px;">
	<div class="panel-heading">
        	<h3 class="panel-title">Регистрация для спеалиста</h3>
	</div>
<div class="panel-body">
   
<div class="col-md-12 col-sm-12">
<div class = "form-group col-md-6 col-sm-6">
	      <label for="months">Выберите направление  *</label>
	      <!-- <span class="help-block">Мужской/Женский</span>	       -->
	      <!-- <select class="form-control input-sm" id="pol"> -->
        <?php 
//Соединение к БД
require "../conn.php";
//Запрос на вывод городов
$q_sel_napr = "select * from napr ";
//Результат выполнения запроса
$res0 = mysqli_query($conn, $q_sel_napr);
$rayon_id;

  echo "<select name = 'sel_napr' class='form-control input-sm' id = 'sel_napr' onchange = sel_naprf(document.getElementById('sel_napr').value) >
  <script> 
  //Возвращаем значение области
  var sel1 = document.getElementById('sel_napr');
  //Создаем элемент списка
    var opt1 = document.createElement('option');
  //Новое значение равное нулю и надпись 'Не выбрано'
    opt1.value = 0;	opt1.text = 'Не выбрано';
  //Добавляем в существующий объект новый элемент option в самом его начале
    sel1.add(opt1, sel1.options[0]);
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
mysqli_free_result($res0); ?>

<script> 
//Функция возвращает набор городов, в качестве входного параметра идет область
	function sel_naprf(a)
	{
		return $.ajax({type: 'POST',//Тип отправки данных
            url: 'sp_reg.php',//Файл обработки
			data:'sel_napr='+a,//Номер области для ajax_db1.php
            success: function (data)  {	 }});//Обновить данные во вкладке городов
	}	
</script>
	</div>
  <div class = "form-group col-md-6 col-sm-6">
	      <label for="months">Выберите тип очереди  *</label>
	      <!-- <span class="help-block">Мужской/Женский</span>	       -->
	      <!-- <select class="form-control input-sm" id="pol"> -->
        <?php 
//Соединение к БД
require "../conn.php";
//Запрос на вывод тип очереди
$q_sel_tpoch = "select * from tip_ochered ";
//Результат выполнения запроса
$res0 = mysqli_query($conn, $q_sel_tpoch);
$rayon_id;

  echo "<select name = 'sel_tpoch' class='form-control input-sm' id = 'sel_tpoch' onchange = sel_tpochf(document.getElementById('sel_napr').value) >
  <script> 
  //Возвращаем значение области
  var sel1 = document.getElementById('sel_tpoch');
  //Создаем элемент списка
    var opt1 = document.createElement('option');
  //Новое значение равное нулю и надпись 'Не выбрано'
    opt1.value = 0;	opt1.text = 'Не выбрано';
  //Добавляем в существующий объект новый элемент option в самом его начале
    sel1.add(opt1, sel1.options[0]);
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
mysqli_free_result($res0); ?>

<script> 
//Функция возвращает набор городов, в качестве входного параметра идет область
	function sel_tpochf(a)
	{
		return $.ajax({type: 'POST',//Тип отправки данных
            url: 'sp_reg.php',//Файл обработки
			data:'sel_tpoch='+a,//Номер области для ajax_db1.php
            success: function (data)  {	 }});//Обновить данные во вкладке городов
	}	
</script>
	</div>
	<div class="form-group col-md-6 col-sm-6">
            <label for="name">Имя*	</label>
            <input type="text" class="form-control input-sm" id="imya" name="imya" placeholder="">
        </div>
        <div class="form-group col-md-6 col-sm-6">
            <label for="email">Фамиля*</label>
            <input type="email" class="form-control input-sm" id="fam" name="fam" placeholder="">
        </div>

        <div class="form-group col-md-6 col-sm-6">
            <label for="mobile">Отчество*</label>
            <input type="text" class="form-control input-sm" id="otch" name="otch" placeholder="">
        </div>

	<div class="form-group col-md-6 col-sm-6">
	      <label for="address">Телефон*</label>
        <input type="text" class="form-control input-sm" id="tel" name="tel" placeholder="">
	   </div>
	
	<div class="form-group col-md-6 col-sm-6">
            <label for="city">Пасспорт*</label>
            <input type="text" class="form-control input-sm" id="pas_num" name="pas_num" placeholder="">
        </div>
	
	<div class="form-group col-md-6 col-sm-6">
            <label for="state">Адресс*</label>
            <input type="text" class="form-control input-sm" id="adress" name="adress" placeholder="">
        </div>

        <div class="form-group col-md-6 col-sm-6">
            <label for="state">Этаж*</label>
            <input type="text" class="form-control input-sm" id="etaj" name="etaj" placeholder="">
        </div>

        <div class="form-group col-md-6 col-sm-6">
            <label for="state">Кабинет*</label>
            <input type="text" class="form-control input-sm" id="kab" name="kab" placeholder="">
        </div>

        
      

        <div class = "form-group col-md-6 col-sm-6">
	      <label for="months">Выберите район  *</label>
	      <?php 
//Соединение к БД
require "../conn.php";

//Запрашиваем области
$q_sel_obl = "select * from oblast";
//Результат запроса по областям
$res = mysqli_query($conn, $q_sel_obl);
//Всплывающее окно выбора и функция при смене значения
echo "<select name = 'obl' class='form-control input-sm' id = 'obl' onchange = sel_gorod(document.getElementById('obl').value) >
<script> 
//Возвращаем значение области
var sel1 = document.getElementById('obl');
//Создаем элемент списка
	var opt1 = document.createElement('option');
//Новое значение равное нулю и надпись 'Не выбрано'
	opt1.value = 0;	opt1.text = 'Не выбрано';
//Добавляем в существующий объект новый элемент option в самом его начале
	sel1.add(opt1, sel1.options[0]);
</script>";
//Цикл перебора значений для отображения остальных элементов
while($row = mysqli_fetch_array($res))
{//Добавление элементов
	echo "<option value  =  $row[0]> $row[1] </option>";
}
echo "</select> &nbsp ";
//Закрытие соединения и освобождение памяти
mysqli_close($conn);mysqli_free_result($res);?>
<!-- Выбор городов -->
<select name='gorod' id='gorod' class='form-control input-sm'></select>
<script> 
//Функция возвращает набор городов, в качестве входного параметра идет область
	function sel_gorod(a)
	{
		return $.ajax({type: 'POST',//Тип отправки данных
            url: 'naspunkt.php',//Файл обработки
			data:'id_obl='+a,//Номер области для ajax_db1.php
            success: function (data)  {	$('#gorod').html(data); }});//Обновить данные во вкладке городов
	}	
</script>
	</div>
  <div class="form-group col-md-6 col-sm-6">
            <label for="state">Должность*</label>
            <input type="text" class="form-control input-sm" id="dolj" name="dolj" placeholder="">
        </div>
 

        <div class="form-group col-md-3 col-sm-3">
	    <label for="photo">Выберите файл*</label>
	    <input type="file" id="photo">
	    <p class="help-block">Пожалуйста, загрузите отдельную фотографию. Групповое фото не допускается.</p>
	</div>

  <div class="form-group col-md-6 col-sm-6">
            <label for="city">Email*</label>
            <input type="text" class="form-control input-sm" id="log" name="log" placeholder="">
        </div>
	
	<div class="form-group col-md-6 col-sm-6">
            <label for="state">Пароль*</label>
            <input type="text" class="form-control input-sm" id="psw" name="psw" placeholder="">
        </div>

  <div class="col-md-12 col-sm-12">
	<div class="form-group col-md-3 col-sm-3 pull-right" >
			<button type="submit" class="btn btn-primary"  id="b1"> Подверждать</button>
	</div>
</div> 
        </div>
</div>

</div>
</body>
</html>


  <script>
$(document).ready(function(){
  $('#b1').click(function () {
    $.ajax({
      type:'POST',
								url: 'sp_reg.php',
								data:
                '&sel_napr='+document.getElementById('sel_napr').value+
                '&sel_tpoch='+document.getElementById('sel_tpoch').value+
								'&imya='+document.getElementById('imya').value  +
                '&fam='+document.getElementById('fam').value  +
                '&otch='+document.getElementById('otch').value  +
                '&tel='+document.getElementById('tel').value  +
                '&pas_num='+document.getElementById('pas_num').value  +
                '&adress='+document.getElementById('adress').value  +
                '&etaj='+document.getElementById('etaj').value  +
                '&kab='+document.getElementById('kab').value  +
                '&gorod='+document.getElementById('gorod').value  +
                '&dolj='+document.getElementById('dolj').value  +
								'&log='+document.getElementById('log').value  +
								'&psw='+document.getElementById('psw').value,
                
								success: function (data){
                  alert(data)
								//Если какая-либо запись пустая, то вывести что просит echo в reg.php  
										if(data.length != 0) {alert(data);}
								//Иначе reg.php полностью отработает и перенаправит пользователя в свой кабинет
											else { 
											 $.ajax({   
												type:'POST',
												url: 'sp_log.php',
												data:
												//отправка с сохранением значения полей
												'log='+document.getElementById('log').value  +
												'&psw='+document.getElementById('psw').value,
												//переадресация на страницу пользователя
												success: function (data){location = 'index.php';}
												});
                      }
                  }});
             })});


  </script>