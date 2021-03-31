<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<?php 
session_start();
// include "../menu.php";
?>

<!-- <link rel="stylesheet" href="../css/register.css"> -->
<!-- <form action="sp_reg.php"  method = "POST"> -->
  <div class="container">
    <h1>Регистрация специалист</h1>
    <hr>

    <label for="email"><b>Направление</b></label>
    <?php 
//Соединение к БД
require "../conn.php";
//Запрос на вывод городов
$q_sel_pol = "select * from napr ";
//Результат выполнения запроса
$res0 = mysqli_query($conn, $q_sel_pol);
$rayon_id;

  echo "<select name = 'sel_napr' id = 'sel_napr' onchange = sel_naprf(document.getElementById('sel_napr').value) >
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
            url: 'kl_reg.php',//Файл обработки
			data:'sel_napr='+a,//Номер области для ajax_db1.php
            success: function (data)  {	 }});//Обновить данные во вкладке городов
	}	
</script>
  

    <label for="email"><b>Фамиля</b></label>
    <input type="text" placeholder="Введите фамиля" name="fam" id="fam" >

    <label for="email"><b>Имя</b></label>
    <input type="text" placeholder="Введите  имя" name="imya" id="imya" >

    <label for="email"><b>Отчество</b></label>
    <input type="text" placeholder="Введите отчество"  name="otch" id="otch" >

    <br>
  
    <label for="email"><b>Кабинет</b></label>
    <input type="text" placeholder="Введите контакт" name="kab" id="kab" >
   

    <label for="email"><b>Номер паспорта</b></label>
    <input type="text" placeholder="Введите номер паспорта" name="pass_num"  id="pass_num" >
    
    <label for="email"><b>Должност</b></label>
    <input type="text" placeholder="Введите дольжность" name="dolj"  id="dolj" >

    <label for="psw-repeat"><b>Логин</b></label>
    <input type="text" placeholder="Введите логин" name="log"  id="log" >

    <label for="psw"><b>Пароль</b></label>
    <input type="password" placeholder="Введите пароль" name="psw"  id="psw" >
   
    <hr>
    <!-- <input type = "submit" class="registerbtn" name = "reg_sp" id="reg_sp" value = "Зарегистрировать"> -->
    <!-- <button type="submit" id="sp_btn" name="sp_btn" class="registerbtn">Регистрация</button> -->
    <button id = "b1" >Зарегистрировать</button>
  </div>


  <div class="container signin">
    <p> <a href="../sp_log_form.php">Войти</a></p>
  </div>
  <!-- </form> -->


  <script>
$(document).ready(function(){
  $('#b1').click(function () {
    $.ajax({
      type:'POST',
								url: 'sp_reg.php',
								data:
								'fam='+document.getElementById('fam').value  +
								'&imya='+document.getElementById('imya').value  +
                '&otch='+document.getElementById('otch').value  +
                '&kab='+document.getElementById('kab').value  +
								'&pas_num='+document.getElementById('pass_num').value  +
                '&dolj='+document.getElementById('dolj').value  +
								'&log='+document.getElementById('log').value  +
								'&psw='+document.getElementById('psw').value+
                '&sel_napr='+document.getElementById('sel_napr').value,
								success: function (data){
                  // alert('work')
								//Если какая-либо запись пустая, то вывести что просит echo в reg.php  
										if(data.length != 0) {alert(data);}
								//Иначе reg.php полностью отработает и перенаправит пользователя в свой кабинет
											else { 
											 $.ajax({   
												type:'POST',
												url: '../sp_log_form.php',
												data:
												//отправка с сохранением значения полей
												'log='+document.getElementById('log').value  +
												'&psw='+document.getElementById('psw').value,
												//переадресация на страницу пользователя
												success: function (data){location = 'sp/sp_och_reg_form.php';}
												});
                      }
                  }});
             })});


  </script>