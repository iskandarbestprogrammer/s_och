<?php include "menu.php" ?> 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Регистрация организации</title>
</head>
<body>
<div class="org" style=" margin: auto;
  width: 20%;
  border: 3px solid green;
  padding: 10px;" >
  <form action="org_reg.php" method="post">
<h1>Регистрация организации</h1> 
<label>Название организации</label><br>
<input class="form-control" type="text" name="org_name">
<br>
<label>Телефон</label><br>
<input class="form-control" type="text" name="tel">
<br>
<label>Адресс</label><br>
<input class="form-control" type="text" name="adress">
<br>
<label>Режим работ от</label><br>
<input class="form-control" type="time" name="vremya_raboty_nach">
<br>
<label>До</label><br>
<input class="form-control" type="time" name="vremya_rabot_kon">
<br>
<label>Рабочий дни</label><br>
<input class="form-control" type="text" name="raboch_dni">
<br>
<br>
<input type = "submit" class="registerbtn" name = "reg_org" value = "Зарегистрировать">
</form>
</div>

</body>
</html>