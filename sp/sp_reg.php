<?php require "../conn.php";
session_start();
// if(isset($_POST['reg_sp'])){
$date_clicked = date("Y-m-d");

// $date = "2012-08-06";
    //Проверка пустоту 
if(empty($_POST['fam'])){ echo "Заполните поле фамилия ";}else{
if(empty($_POST['imya'])){ echo "Заполните поле имя ";}else{
if(empty($_POST['otch'])){ echo "Заполните поле отчество";}else{
// if(empty($_POST['sel_otdel'])){ echo"Заполните поле телефон";}else{
if(empty($_POST['kab'])){ echo "Заполните поле пола";}else{
// if(empty($_POST['pass_num'])){ echo "Заполните поле номер пасспорта";}else{
if(empty($_POST['dolj'])){ echo "Заполните поле должность";}else{ 
if(empty($_POST['log'])){ echo "Заполните поле логин";}else{
if(empty($_POST['psw'])){echo "Заполните поле пароля";}else{
$q_sel_login = "select login_ from sp where login_= '".trim($_POST['log'])."'";
$res_sel_login=mysqli_query($conn,$q_sel_login);
$num_rows_sel_login=mysqli_num_rows($res_sel_login);
 if ($num_rows_sel_login!=0) {
     # code...
     echo "Пользователь с таким именем уже существует!!!";
 }else {
     # code...

     $q_ins_reg_user = "call sp_ins_special_reg
("."'".$_POST['fam']."'".",
"."'".$_POST['imya']."'".",
"."'".$_POST['otch']."'".",
"."'".$_POST['kab']."'".",
"."'".$_POST['pass_num']."'".",
"."'".$_POST['dolj']."'".",
"."'".$_POST['log']."'".",
"."'".$_POST['psw']."'".",
"."'".$_POST['sel_napr']."'".")";
$_SESSION['sp_name']=$_POST['imya'];
// echo var_dump($q_ins_reg_user);
mysqli_query($conn, $q_ins_reg_user) or die(mysqli_error($conn));
mysqli_close($conn);
//  header("Location:../sp_log_form.php"); exit;
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
// }



?>