
<link rel="stylesheet" href="register.css">
<form action="sp_reg.php"  method = "POST">
  <div class="container">
    <h1>Регистрация специалист</h1>
    <hr>

    <label for="email"><b>Фамиля</b></label>
    <input type="text" placeholder="Введите фамиля" name="fam" id="fam" required>

    <label for="email"><b>Имя</b></label>
    <input type="text" placeholder="Введите  имя" name="imya" id="imya" required>

    <label for="email"><b>Отчество</b></label>
    <input type="text" placeholder="Введите отчество" name="otch" id="otch" required>

    <br>
    <label for='sel_pol'><b>Отдел</b></label>
    <br>
    <select name='sel_otdel' id='sel_otdel'>
    <?php 
//Соединение к БД
session_start();
require "conn.php";
$otdel=$_SESSION['otdel_name'];
echo $otdel;
//Запрос на вывод организ
$q_sel_org = "SELECT id_otdel,otdel FROM otdel where otdel = '$otdel'";
echo var_dump($q_sel_org);
//Результат выполнения запроса
$res0 = mysqli_query($conn, $q_sel_org);
//Перебор значений уже полученных от запроса
$org_id;
while($row0 = mysqli_fetch_array($res0)) {
  // echo"<option value = $row0[0]>$row0[1]</option>";
  echo"<option value = $row0[0]>$row0[1]</option>";
  $org_id=$row0[0];
}
//Закрываем соединение
mysqli_close($conn); 
//Освобождаем память от результатов запроса
mysqli_free_result($res0); ?>
  ?>
    </select>
  <br>
    <label for="email"><b>Кабинет</b></label>
    <input type="text" placeholder="Введите контакт" name="kab" id="kab" required>
   

    <label for="email"><b>Номер паспорта</b></label>
    <input type="text" placeholder="Введите номер паспорта" name="pas_num" id="pass_num" required>
    
    <label for="email"><b>Должност</b></label>
    <input type="text" placeholder="Введите дольжность" name="dolj" id="dolj" required>

    <label for="psw-repeat"><b>Логин</b></label>
    <input type="text" placeholder="Введите логин" name="log" id="log" required>

    <label for="psw"><b>Пароль</b></label>
    <input type="password" placeholder="Введите пароль" name="psw" id="psw" required>
   
    <hr>
    <input type = "submit" class="registerbtn" name = "reg_sp" value = "Зарегистрировать">
    <!-- <button type="submit" class="registerbtn">Регистрация</button> -->
  </div>


  <div class="container signin">
    <p> <a href="sp_log_form.php">Войти</a></p>
  </div>
  </form>