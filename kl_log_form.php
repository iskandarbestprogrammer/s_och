<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<?php 
// include "menu.php"
session_start();
 ?> 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<h1 align=center>Вход для клиента</h1>
<div class="" align=center><!-- <form action="kl/kl_log.php" method = "POST" align=center> -->
<label for="login_">Логин</label>&nbsp &nbsp 
<input type = 'text' id="log" name = 'log'><br><br>
<label for="login_">Пароль</label>&nbsp 
<input type = 'text' id="psw" name = 'psw'><br><br>
<input type = 'submit' value = 'Войти' id="b1" name = 'log_kl'>&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp <a href="kl/kl_reg_form.php">Регистрация</a>
<!-- </form> -->
</div>

<script>
	$(document).ready(function () {
					$('#b1').click(function () 
					{
					 $.ajax({   type:'POST',
								url: 'kl/kl_log.php',
								data:'log='+document.getElementById('log').value+
								'&psw='+document.getElementById('psw').value,
								success: function (data){	
										if(data.length <40 ){alert(data)}else 
										{location = 'kl/kl_och_reg_from.php'}
								}});
					 })});
</script>