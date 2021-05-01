<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<?php 
// include "menu.php"
session_start();
 ?> 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />

<style>
/* Demo Background */
body{background:url(/assets/img/hero-bg.png)}

/* Form Style */
.form-horizontal{
 background: #fff;
 padding-bottom: 40px;
 border-radius: 15px;
 text-align: center;
}
.form-horizontal .heading{
 display: block;
 font-size: 35px;
 font-weight: 700;
 padding: 35px 0;
 border-bottom: 1px solid #f0f0f0;
 margin-bottom: 30px;
}
.form-horizontal .form-group{
 padding: 0 40px;
 margin: 0 0 25px 0;
 position: relative;
}
.form-horizontal .form-control{
 background: #f0f0f0;
 border: none;
 border-radius: 20px;
 box-shadow: none;
 padding: 0 20px 0 45px;
 height: 40px;
 transition: all 0.3s ease 0s;
}
.form-horizontal .form-control:focus{
 background: #e0e0e0;
 box-shadow: none;
 outline: 0 none;
}
.form-horizontal .form-group i{
 position: absolute;
 top: 12px;
 left: 60px;
 font-size: 17px;
 color: #c8c8c8;
 transition : all 0.5s ease 0s;
}
.form-horizontal .form-control:focus + i{
 color: #00b4ef;
}
.form-horizontal .fa-question-circle{
 display: inline-block;
 position: absolute;
 top: 12px;
 right: 60px;
 font-size: 20px;
 color: #808080;
 transition: all 0.5s ease 0s;
}
.form-horizontal .fa-question-circle:hover{
 color: #000;
}
.form-horizontal .main-checkbox{
 float: left;
 width: 20px;
 height: 20px;
 background: #11a3fc;
 border-radius: 50%;
 position: relative;
 margin: 5px 0 0 5px;
 border: 1px solid #11a3fc;
}
.form-horizontal .main-checkbox label{
 width: 20px;
 height: 20px;
 position: absolute;
 top: 0;
 left: 0;
 cursor: pointer;
}
.form-horizontal .main-checkbox label:after{
 content: "";
 width: 10px;
 height: 5px;
 position: absolute;
 top: 5px;
 left: 4px;
 border: 3px solid #fff;
 border-top: none;
 border-right: none;
 background: transparent;
 opacity: 0;
 -webkit-transform: rotate(-45deg);
 transform: rotate(-45deg);
}
.form-horizontal .main-checkbox input[type=checkbox]{
 visibility: hidden;
}
.form-horizontal .main-checkbox input[type=checkbox]:checked + label:after{
 opacity: 1;
}
.form-horizontal .text{
 float: left;
 margin-left: 7px;
 line-height: 20px;
 padding-top: 5px;
 text-transform: capitalize;
}
.form-horizontal .btn{
 float: right;
 font-size: 14px;
 color: #fff;
 background: #00b4ef;
 border-radius: 30px;
 padding: 10px 25px;
 border: none;
 text-transform: capitalize;
 transition: all 0.5s ease 0s;
}
@media only screen and (max-width: 479px){
 .form-horizontal .form-group{
 padding: 0 25px;
 }
 .form-horizontal .form-group i{
 left: 45px;
 }
 .form-horizontal .btn{
 padding: 10px 20px;
 }
}
</style>

<div class="container">
 <div class="row">

 <div class="col-md-offset-3 col-md-6">
 <form class="form-horizontal">
 <span class="heading">АВТОРИЗАЦИЯ</span>
 <div class="form-group">
 <input type="text" class="form-control" id="log" placeholder="E-mail">
 <i class="fa fa-user"></i>
 </div>
 <div class="form-group help">
 <input type="password" class="form-control" id="psw"  placeholder="Password">
 <i class="fa fa-lock"></i>
 <a href="#" class="fa fa-question-circle"></a>
 </div>
 <div class="form-group">
 <div class="main-checkbox">
 <input type="checkbox" value="none" id="checkbox1" name="check"/>
 <label for="checkbox1"></label>
 </div>
 <span class="text">Запомнить</span>
 <button type="submit" class="btn btn-default" id="b1">ВХОД</button>
 <button type="submit"  class="btn btn-default"> <a href="kl/kl_reg_form.php" class="text-white">Регистрация</a> </button>
 </div>
 </form>
 </div>

 </div><!-- /.row -->
</div><!-- /.container -->
<!-- <h1 align=center>Вход для клиента</h1>
<div class="" align=center><!-- <form action="kl/kl_log.php" method = "POST" align=center> -->
<!-- <label for="login_">Логин</label>&nbsp &nbsp 
<input type = 'text' id="log" name = 'log'><br><br>
<label for="login_">Пароль</label>&nbsp 
<input type = 'text' id="psw" name = 'psw'><br><br>
<input type = 'submit' value = 'Войти' id="b1" name = 'log_kl'>&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp <a href="kl/kl_reg_form.php">Регистрация</a> --> -->
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
										{location = 'kl/profile.php'}
								}});
					 })});
</script>