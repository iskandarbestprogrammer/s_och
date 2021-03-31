<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<?php
//  include "menu.php"
 session_start();
  ?> 
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<h1 align=center>Вход для специалиста</h1>
<!-- <form action="sp/sp_log.php" method = "POST" align=center> -->
<div class="" align=center>
<label for="login_">Логин</label>&nbsp &nbsp <input type = 'text' name = 'log' id="log"><br><br>
<label for="login_">Пароль</label>&nbsp <input type = 'text' name = 'psw'id="psw" ><br><br>
<input type = 'submit' value = 'Войти' id="b1" name = 'b1'>&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp <a href="sp/sp_reg_form.php">Регистрация</a>
<!-- </form> -->
</div>

<script>
	$(document).ready(function () {
					$('#b1').click(function () 
					{
					 $.ajax({   type:'POST',
								url: 'sp/sp_log.php',
								data:'log='+document.getElementById('log').value+
								'&psw='+document.getElementById('psw').value,
								success: function (data){	
										if(data.length <40 ){alert(data)}else 
										{location = 'sp/index.php'}
								}});
					 })});
</script>