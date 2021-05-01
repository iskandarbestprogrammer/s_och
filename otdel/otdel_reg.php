<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<?php
session_start();
require "../conn.php";

if(isset($_POST['reg_otdl'])){

    //Проверка пустоту 
if(empty($_POST['otdel_name'])){ echo "Заполните поле название организации ";}else{
if(empty($_POST['sel_org'])){ echo "Заполните поле организации ";}else{


$q_sel_login = "select otdel from org where otdel= '".trim($_POST['otdel_name'])."'";
$res_sel_login=mysqli_query($conn,$q_sel_login);
$num_rows_sel_login=mysqli_num_rows($res_sel_login);
 if ($num_rows_sel_login!=0) {
     echo "Пользователь с таким именем уже существует!!!";
 }else {
  
     $q_ins_reg_org = "call sp_ins_otdel_reg
("."'".$_POST['otdel_name']."'".",
"."'".$_POST['sel_org']."'".")";
$_SESSION['otdel_name']=$_POST['otdel_name'];
mysqli_query($conn, $q_ins_reg_org) or die(mysqli_error($conn));
$q_sel_otdel="select * from otdel where otdel = $_POST[otdel_name]";
$rs=mysqli_query($conn, $q_sel_otdel) or die(mysqli_error($conn));
$id=0;
while ($rw=mysqli_fetch_array($rs)) {
   $id=$rw[0];
}
$q_update_otdel= "call update_otdel_of_id($id)";
mysqli_query($conn, $q_update_otdel) or die(mysqli_error($conn));
mysqli_close($conn);
 header("Location:index.php"); exit;
 }
}    
}   
}    
  
    
    







?>