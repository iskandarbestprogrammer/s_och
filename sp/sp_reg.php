<?php require "../conn.php";
session_start();
if(empty($_POST['sel_napr'])){ echo "Выберите направление ";}else{
if(empty($_POST['sel_tpoch'])){ echo "Выберите тип очереди ";}else{    
if(empty($_POST['imya'])){ echo "Заполните поле имя ";}else{
if(empty($_POST['fam'])){ echo "Заполните поле фамилия ";}else{
if(empty($_POST['otch'])){ echo "Заполните поле отчество ";}else{
if(empty($_POST['tel'])){ echo "Заполните поле телефон ";}else{
if(empty($_POST['pas_num'])){ echo "Заполните поле номер пасспорта ";}else{
if(empty($_POST['adress'])){ echo "Заполните поле адресс";}else{
if(empty($_POST['etaj'])){ echo "Заполните поле этаж";}else{
if(empty($_POST['kab'])){ echo "Заполните поле кабинет";}else{ 
if(empty($_POST['gorod'])){ echo "Заполните поле город";}else{
if(empty($_POST['dolj'])){echo "Заполните поле дожность";}else{
if(empty($_POST['log'])){echo "Заполните поле логин";}else{
if(empty($_POST['psw'])){echo "Заполните поле пароля";}else{
$q_sel_login = "select login_ from sp where login_= '".trim($_POST['log'])."'";
$res_sel_login=mysqli_query($conn,$q_sel_login);
$num_rows_sel_login=mysqli_num_rows($res_sel_login);
 if ($num_rows_sel_login!=0) {
     echo "Пользователь с таким именем уже существует!!!";
 }else {
     $q_ins_reg_user = "call sp_sp_ins_reg
("."'".$_POST['fam']."'".",
"."'".$_POST['imya']."'".",
"."'".$_POST['otch']."'".",
"."'".$_POST['tel']."'".",
"."'".$_POST['adress']."'".",
"."'".$_POST['kab']."'".",
"."'".$_POST['etaj']."'".",
"."'".$_POST['pas_num']."'".",
"."'".$_POST['dolj']."'".",
"."'".$_POST['log']."'".",
"."'".$_POST['psw']."'".",
"."'".$_POST['sel_napr']."'".",
"."'".$_POST['sel_tpoch']."'".",
"."'".$_POST['gorod']."'".")";
mysqli_query($conn, $q_ins_reg_user) or die(mysqli_error($conn));
mysqli_close($conn);
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
}
}
}
}
}


?>