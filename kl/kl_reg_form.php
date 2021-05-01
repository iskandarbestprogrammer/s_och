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
        	<h3 class="panel-title">Регистрация для клиента</h3>
	</div>
<div class="panel-body">
     <form> 
<div class="col-md-12 col-sm-12">
	<div class="form-group col-md-6 col-sm-6">
            <label for="name">Имя*	</label>
            <input type="text" class="form-control input-sm" id="imya" name="imya" placeholder="">
        </div>
        <div class="form-group col-md-6 col-sm-6">
            <label for="email">Фамиля*</label>
            <input type="text" class="form-control input-sm" id="fam" name="fam" placeholder="">
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
            <label for="city">Номер пасспорта *</label>
            <input type="text" class="form-control input-sm" id="passport" name="passport" placeholder="">
        </div>
	
	<div class="form-group col-md-6 col-sm-6">
            <label for="state">Адресс*</label>
            <input type="text" class="form-control input-sm" id="adress" name="adress" placeholder="">
        </div>
        <div class = "form-group col-md-6 col-sm-6">
	      <label for="months">Выберите пол  *</label>
        <?php 
//Соединение к БД
require "../conn.php";
//Запрос на вывод городов
$q_sel_pol = "select * from pol ";
//Результат выполнения запроса
$res0 = mysqli_query($conn, $q_sel_pol);
$rayon_id;
  echo "<select name = 'sel_pol' class='form-control input-sm' id = 'sel_pol' onchange = sel_polf(document.getElementById('sel_pol').value) >
  <script> 
  //Возвращаем значение области
  var sel1 = document.getElementById('sel_pol');
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
	function sel_polf(a)
	{
		return $.ajax({type: 'POST',//Тип отправки данных
            url: 'sp_reg.php',//Файл обработки
			data:'sel_pol='+a,//
            success: function (data)  {	 }});
	}	
</script>
	</div>

  <div class="form-group col-md-3 col-sm-3">
	    <label for="photo">Фото*</label>
	    <input type="file" id="photo" name="photo">
	    <p class="help-block">Пожалуйста, загрузите отдельную фотографию. Групповое фото не допускается.</p>
	</div>



<div class="form-group col-md-6 col-sm-6">
            <label for="city">Email*</label>
            <input type="email" class="form-control input-sm" id="log" name="log" placeholder="">
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
</body>
<script>
$(document).ready(function(){
  $('#b1').click(function () {
    $.ajax({
      type:'POST',
								url: 'kl_reg.php',
								data:
								'fam='+document.getElementById('fam').value  +
								'&imya='+document.getElementById('imya').value  +
                '&otch='+document.getElementById('otch').value  +
                '&tel='+document.getElementById('tel').value  +
								'&passport='+document.getElementById('passport').value  +
                '&adress='+document.getElementById('adress').value  +
                '&sel_pol='+document.getElementById('sel_pol').value  +
                //'&photo='+document.getElementById('photo').value  +
								'&log='+document.getElementById('log').value  +
								'&psw='+document.getElementById('psw').value,
      
								success: function (data){
                //  alert(data);
                  // alert('work')
								//Если какая-либо запись пустая, то вывести что просит echo в reg.php  
										// if(data.length != 0) {alert(data);}
								//Иначе reg.php полностью отработает и перенаправит пользователя в свой кабинет
											// else 
                      { 
											 $.ajax({   
												type:'POST',
												url: 'kl_log.php',
												data:
												//отправка с сохранением значения полей
												'log='+document.getElementById('log').value  +
												'&psw='+document.getElementById('psw').value,
												//переадресация на страницу пользователя
												success: function (data){location = 'profile.php';}
												});
                      }
                  }});
             })});


  </script>
</html>


