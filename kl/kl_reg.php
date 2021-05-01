<?php require "../conn.php";
// if(isset($_POST['reg_kl'])){
    //Проверка пустоту 
if(empty($_POST['fam'])){ echo "Заполните поле фамилия ";}else{
if(empty($_POST['imya'])){ echo "Заполните поле имя ";}else{
if(empty($_POST['otch'])){ echo "Заполните поле отчество";}else{
if(empty($_POST['tel'])){ echo"Заполните поле телефон";}else{
if(empty($_POST['passport'])){ echo "Заполните поле номер паспорта";}else{
if(empty($_POST['adress'])){ echo "Заполните поле адресс";}else{
if(empty($_POST['sel_pol'])){ echo "Заполните поле пол";}else{   
//if(empty($_POST['photo'])){ echo "Заполните поле добавте фото";}else{ 
if(empty($_POST['log'])){ echo "Заполните поле логин";}else{
if(empty($_POST['psw'])){echo "Заполните поле пароля";}else{
$q_sel_login = "select login_ from kl where login_= '".trim($_POST['log'])."'";
$res_sel_login=mysqli_query($conn,$q_sel_login);
$num_rows_sel_login=mysqli_num_rows($res_sel_login);
 if ($num_rows_sel_login!=0) {
     # code...
     echo "Пользователь с таким именем уже существует!!!";
 }else {
     $q_ins_reg_user = "call sp_kl_ins_reg
("."'".$_POST['fam']."'".",
"."'".$_POST['imya']."'".",
"."'".$_POST['otch']."'".",
"."'".$_POST['tel']."'".",
"."'".$_POST['log']."'".",
"."'".$_POST['psw']."'".",
"."'".$_POST['passport']."'".",
"."'".$_POST['sel_pol']."'".",
"."'".$_POST['adress']."'"."
 )";
mysqli_query($conn, $q_ins_reg_user) or die(mysqli_error($conn));
mysqli_close($conn); header("Location: ../kl_log_form.php"); exit;
 }
}    
}   
}    
}    
}    
}    
}
}
}
// }
// }


?>