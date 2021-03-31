<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<link rel="stylesheet" href="../css/register.css">.
<link rel="stylesheet" href="../css/main.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<!-- <script type="text/javascript">
function fetch_select(val)
{
 $.ajax({
 type: 'post',
 url: 'fetch_data.php',
 data: {
  get_option:val
 },
 success: function (response) {
  document.getElementById("new_select").innerHTML=response; 
 }
 });
} -->

<!-- </script>  -->
<form action="kl_reg.php"  method = "POST">
  <div class="container">
    <h1>Регистрация клиента</h1>
    <hr>

    <label for="email"><b>Фамиля</b></label>
    <input type="text" placeholder="Введите фамиля" name="fam" id="fam" required>

    <label for="email"><b>Имя</b></label>
    <input type="text" placeholder="Введите  имя" name="imya" id="imya" required>

    <label for="email"><b>Отчество</b></label>
    <input type="text" placeholder="Введите отчество" name="otch" id="otch" required>

    <label for="email"><b>Телефон</b></label>
    <input type="text" placeholder="Введите контакт" name="tel" id="tel" required>
    <br>
    <label for='sel_pol'><b>Пол</b></label>
    <br>
    <?php 
//Соединение к БД
require "../conn.php";
//Запрос на вывод городов
$q_sel_pol = "select * from pol ";
//Результат выполнения запроса
$res0 = mysqli_query($conn, $q_sel_pol);
$rayon_id;

  echo "<select name = 'sel_pol' id = 'sel_pol' onchange = sel_polf(document.getElementById('sel_pol').value) >
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
            url: 'kl_reg.php',//Файл обработки
			data:'id_pol='+a,//Номер области для ajax_db1.php
            success: function (data)  {	 }});//Обновить данные во вкладке городов
	}	
</script>
    <br>
    <label for='sel_tp_kl'><b>Тип клиента</b></label>
    <br>
     <?php 
//Соединение к БД
require "../conn.php";
//Запрос на вывод городов
$q_sel_rayon = "select * from tp_kl ";
//Результат выполнения запроса
$res0 = mysqli_query($conn, $q_sel_rayon);
$rayon_id;

  echo "<select name = 'sel_tp_kl' id = 'sel_tp_kl' onchange = sel_tpkl(document.getElementById('sel_tp_kl').value) >
  <script> 
  //Возвращаем значение области
  var sel1 = document.getElementById('sel_tp_kl');
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
	function sel_tpkl(a)
	{
		return $.ajax({type: 'POST',//Тип отправки данных
            url: 'kl_reg.php',//Файл обработки
			data:'id_tpkl='+a,//Номер области для ajax_db1.php
            success: function (data)  {	 }});//Обновить данные во вкладке городов
	}	
</script>
    <br>
    <label for='sel_rayon'><b>Район </b></label>
    <br>
    <!-- <select name='sel_rayon' id='sel_rayon' onchange = sel_gorod(document.getElementById(sel_rayon).value)> -->
    <?php 
//Соединение к БД
require "../conn.php";
//Запрос на вывод городов
$q_sel_rayon = "select * from rayon ";
//Результат выполнения запроса
$res0 = mysqli_query($conn, $q_sel_rayon);
$rayon_id;



  echo "<select name = 'sel_rayon' id = 'sel_rayon' onchange = sel_rayon1(document.getElementById('sel_rayon').value) >
  <script> 
  //Возвращаем значение области
  var sel1 = document.getElementById('sel_rayon');
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
	function sel_rayon1(a)
	{
		return $.ajax({type: 'POST',//Тип отправки данных
            url: 'kl_reg.php',//Файл обработки
			data:'id_rayon='+a,//Номер области для ajax_db1.php
            success: function (data)  {	 }});//Обновить данные во вкладке городов
	}	
</script>
    
    <br>
    <label for='sel_natio'><b>Нациoнальность</b></label>
    <br>
 
    <?php 
//Соединение к БД
require "../conn.php";
//Запрос на вывод городов
$q_sel_natio = "select * from nationality ";
//Результат выполнения запроса
$res0 = mysqli_query($conn, $q_sel_natio);
$natio_id;
//Перебор значений уже полученных от запроса
echo "<select name = 'sel_natio' id = 'sel_natio' onchange = sel_natiof(document.getElementById('sel_natio').value) >
<script> 
//Возвращаем значение области
var sel1 = document.getElementById('sel_natio');
//Создаем элемент списка
  var opt1 = document.createElement('option');
//Новое значение равное нулю и надпись 'Не выбрано'
  opt1.value = 0;	opt1.text = 'Не выбрано';
//Добавляем в существующий объект новый элемент option в самом его начале
  sel1.add(opt1, sel1.options[0]);
</script>";

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
function sel_natiof(a)
{
  return $.ajax({type: 'POST',//Тип отправки данных
          url: 'kl_reg.php',//Файл обработки
    data:'sel_natio='+a,//Номер области для ajax_db1.php
          success: function (data)  { }});//Обновить данные во вкладке городов
}	
</script> 
  
    </select>
    <br>

    <label for="email"><b>Номер паспорта</b></label>
    <input type="text" placeholder="Введите номер паспорта" name="pas_num" id="pass_num" required>

    <label for="psw-repeat"><b>Логин</b></label>
    <input type="text" placeholder="Введите логин" name="log" id="log" required>

    <label for="psw"><b>Пароль</b></label>
    <input type="password" placeholder="Введите пароль" name="psw" id="psw" required>

    <hr>
    <input type = "submit" class="registerbtn" name = "reg_kl" value = "Зарегистрировать">
    <!-- <button type="submit" class="registerbtn">Регистрация</button> -->
  </div>

  <div class="container signin">
    <p> <a href="kl_log_form.php">Войти</a></p>
  </div>
</form>