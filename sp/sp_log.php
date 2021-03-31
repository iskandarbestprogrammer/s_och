<?php session_start(); require "../conn.php";
// if(isset($_POST['log_sp']))
// {
	if(empty($_POST['log'])) { echo"Имя пользователя пусто!!!";} else
	if(empty($_POST['psw'])) { echo"Пароль пользователя пуст!!!";} else{
	//--Авторизация
		$q_sel = "select id_sp, fam from sp where login_ = '".$_POST['log']."' and psw = '".$_POST['psw']."'";
		//Результат запроса
		$result = mysqli_query($conn,$q_sel);
		//Возвращает количество строк в результирующем запросе
		$res_num_rows = mysqli_num_rows($result);
		//Проверяем не пусто ли там в результирующем запросе
		if($res_num_rows == 0 ) {echo "Неверное имя пользователя и пароль!";} else
		{ while($row = mysqli_fetch_row($result)){
				
				{
					$_SESSION['id_sp'] = $row[0];
					$_SESSION['fam'] = $row[1];
					$_SESSION['imya'] = $row[2];
					//echo $_SESSION['id_users'];
					//Освободить память
					mysqli_free_result($result); header("Location:sp_och_reg_form.php"); exit;	
				}
			}
		}
}
//Закрыть соединение 
mysqli_close($conn);
// }
?>


