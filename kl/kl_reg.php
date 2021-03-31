<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<?php require "conn.php";
if(isset($_POST['reg_kl'])){
$date_clicked = date("Y-m-d");
// var_dump($tp_kl);
// $date = "2012-08-06";
    //Проверка пустоту 
if(empty($_POST['fam'])){ echo "Заполните поле фамилия ";}else{
if(empty($_POST['imya'])){ echo "Заполните поле имя ";}else{
if(empty($_POST['otch'])){ echo "Заполните поле отчество";}else{
if(empty($_POST['tel'])){ echo"Заполните поле телефон";}else{
if(empty($_POST['sel_pol'])){ echo "Заполните поле пола";}else{
if(empty($_POST['sel_tp_kl'])){ echo "Заполните поле тип клиента";}else{
if(empty($_POST['sel_rayon'])){ echo "Заполните поле район";}else{ 
if(empty($_POST['sel_natio'])){ echo "Заполните поле национальность";}else{  
if(empty($_POST['pas_num'])){ echo "Заполните поле национальность";}else{ 
if(empty($_POST['log'])){ echo "Заполните поле логин";}else{
if(empty($_POST['psw'])){echo "Заполните поле пароля";}else{
$q_sel_login = "select login_ from kl where login_= '".trim($_POST['log'])."'";
$res_sel_login=mysqli_query($conn,$q_sel_login);
$num_rows_sel_login=mysqli_num_rows($res_sel_login);
 if ($num_rows_sel_login!=0) {
     # code...
     echo "Пользователь с таким именем уже существует!!!";
 }else {
     # code...
     // "."'".$_POST['sel_rayon']."'".",
// "."'".$_POST['sel_natio']."'".",
// "."'".$_POST['sel_tp_kl']."'".",
var_dump($_POST['id_tpkl']);


$aktiv=0;
     $q_ins_reg_user = "call sp_ins_kl_reg
("."'".$_POST['fam']."'".",
"."'".$_POST['imya']."'".",
"."'".$_POST['otch']."'".",
$aktiv,
"."'".$_POST['tel']."'".",
"."'".$_POST['log']."'".",
"."'".$_POST['psw']."'".",
"."'".$_POST['pas_num']."'".",
"."'".$_POST['sel_tp_kl']."'".",
"."'".$_POST['sel_rayon']."'".",
"."'".$_POST['sel_natio']."'".",
"."'".$_POST['sel_pol']."'"." )";
mysqli_query($conn, $q_ins_reg_user) or die(mysqli_error($conn));
mysqli_close($conn); header("Location:kl_log_form.php"); exit;
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