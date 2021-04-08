<?php session_start();
 require "../conn.php";
 $imya="";
	if(isset($_POST['log_admin']))
	{
		
		if(empty($_POST['log'])) { echo"Имя пользователя пусто!!!";} else
		if(empty($_POST['psw'])) { echo"Пароль пользователя пуст!!!";} else{
		//--Авторизация
			$q_sel = "select id_admins_ from admins where login_ = '".$_POST['log']."' and psw_ = '".$_POST['psw']."'";
			//Результат запроса из база данных 
			$result = mysqli_query($conn,$q_sel);
			//Возвращает количество строк в результирующем запросе
			$res_num_rows = mysqli_num_rows($result);
			//Проверяем не пусто ли там в результирующем запросе
			if($res_num_rows == 0 ) {echo "Неверное имя пользователя и пароль!";} else
			{ while($row = mysqli_fetch_row($result)){
					
					{
						$_SESSION['id_admin'] = $row[0];
						$_SESSION['fam'] = $row[1];
					
						//Освободить память
						mysqli_free_result($result); header("Location:admin.php"); exit;	
					}
				}
			}
	}
	//Закрыть соединение 
	mysqli_close($conn);}?>
