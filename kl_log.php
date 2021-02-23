<?php session_start();
 require "conn.php";
 $imya="";
	if(isset($_POST['log_kl']))
	{
		if(empty($_POST['log'])) { echo"Имя пользователя пусто!!!";} else
		if(empty($_POST['psw'])) { echo"Пароль пользователя пуст!!!";} else{
		//--Авторизация
			$q_sel = "select id_kl, fam from kl where login_ = '".$_POST['log']."' and psw = '".$_POST['psw']."'";
			//Результат запроса
			$result = mysqli_query($conn,$q_sel);
			//Возвращает количество строк в результирующем запросе
			$res_num_rows = mysqli_num_rows($result);
			//Проверяем не пусто ли там в результирующем запросе
			if($res_num_rows == 0 ) {echo "Неверное имя пользователя и пароль!";} else
			{ while($row = mysqli_fetch_row($result)){
					
					{
						$_SESSION['id_kl'] = $row[0];
						$_SESSION['fam'] = $row[1];
						$imya=$_SESSION['imya'];
						//echo $_SESSION['id_users'];
						//Освободить память
						mysqli_free_result($result); header("Location:all_org.php"); exit;	
					}
				}
			}
	}
	//Закрыть соединение 
	mysqli_close($conn);}?>