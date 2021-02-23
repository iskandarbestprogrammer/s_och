<?php include "menu.php" ?> 
<h1 align=center>Вход для специалиста</h1>
<form action="sp_log.php" method = "POST" align=center>
<label for="login_">Логин</label>&nbsp &nbsp <input type = 'text' name = 'log'><br><br>
<label for="login_">Пароль</label>&nbsp <input type = 'text' name = 'psw'><br><br>
<input type = 'submit' value = 'Войти' name = 'log_sp'>&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp <a href="org_reg_form.php">Регистрация</a>
</form>