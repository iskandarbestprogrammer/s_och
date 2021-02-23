<?php require "conn.php";
session_start();
    $count=0;
if(isset($_POST['bron_och'])){
    //Проверка пустоту 
if(empty($_POST['data_priema'])){ echo "Заполните поле дата приема ";}else{
if(empty($_POST['vremya_priema'])){ echo "Заполните поле время приема ";}else{
if(empty($_POST['dlitel'])){ echo "Заполните поле длительность";}else{
    if(empty($_POST['prichina'])){ echo "Заполните поле причина ";}else{
        if(empty($_POST['coment'])){ echo "Заполните поле комментарии";}else{
      

$q_sel_login = 1;
$res_sel_login=mysqli_query($conn,$q_sel_login);
$num_rows_sel_login=mysqli_num_rows($res_sel_login);
 if ($num_rows_sel_login!=0) {
     # code...
     echo "Занято !!!";
 }else {
     $kl_name = $_POST['kl'];
     $id_kl_name= "select id_kl from kl where imya = '$kl_name' ";
     $res = mysqli_query($conn, $id_kl_name);
     while($row0 = mysqli_fetch_array($res)) {
        // echo"<option value = $row0[0]>$row0[1]</option>";
        $id_kl=$row0[0];
      }
     
    // $sp_name=$_SESSION['sp_name'];
   
    // //Запрос на вывод организ
    // $q_sel_sp = "SELECT id_sp FROM sp where imya = '$sp_name'";
    // //Результат выполнения запроса
    // $id_sp = mysqli_query($conn, $q_sel_sp);

    $id_sp =$_SESSION['id_sp'];

    $count++;
  
     $q_ins_reg_org = "call sp_ins_och_reg
("."'".$_POST['data_priema']."'".",
$count,
"."'".$_POST['vremya_priema']."'".",
"."'".$_POST['dlitel']."'".",
"."'".$_POST['prichina']."'".",
"."'".$_POST['coment']."'"." ,
'$id_sp',
'$id_kl')";
mysqli_query($conn, $q_ins_reg_org) or die(mysqli_error($conn));
mysqli_close($conn);
 header("Location:all_org.php"); 
 exit;
 }
}    
}   
}    
}    
}
}   


