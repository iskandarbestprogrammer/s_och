<?php
session_start();
 require "../conn.php";

// if(isset($_POST['reg_org'])){
    //Проверка пустоту 
if(empty($_POST['org_name'])){ echo "Заполните поле название организации ";}else{
if(empty($_POST['tel'])){ echo "Заполните поле телефона ";}else{
if(empty($_POST['adress'])){ echo "Заполните поле adress";}else{

$q_sel_login = "select org from org where org= '".trim($_POST['org_name'])."'";
$res_sel_login=mysqli_query($conn,$q_sel_login);
$num_rows_sel_login=mysqli_num_rows($res_sel_login);
 if ($num_rows_sel_login!=0) {
     # code...
     echo "Пользователь с таким именем уже существует!!!";
 }else {
  $tmpnaprid;
$tmpIdSp=$_SESSION['id_sp'];
$resultid = mysqli_query($conn,"SELECT napr_id_napr FROM sp where id_sp=$tmpIdSp");
while($row = mysqli_fetch_array($resultid)) {
$tmpnaprid=$row[0];
}
     $q_ins_reg_org = "call sp_ins_org_reg
("."'".$_POST['org_name']."'".",
"."'".$_POST['innnomer']."'".",
"."'".$_POST['tel']."'".",
"."'".$_POST['adress']."'".",
"."'".$_POST['vremya_raboty_nach']."'".",
"."'".$_POST['vremya_rabot_kon']."'".",
"."'".$_POST['raboch_dni']."'".",
$tmpnaprid )";

mysqli_query($conn, $q_ins_reg_org) or die(mysqli_error($conn));
$res=mysqli_query($conn, "select id_org from org where inn='".$_POST['innnomer']."'"); 
while ($row0=mysqli_fetch_array($res)) {
    $_SESSION['id_org']=$row0[0];
}
mysqli_close($conn);
 exit;
 }
}    
}   
}    
//}    
    
    







?>