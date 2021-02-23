<?php require "conn.php";
session_start();
    $count=0;
if(isset($_POST['bron_och'])){
if(empty($_POST['data_priema'])){ echo "Заполните поле дата приема ";}else{
if(empty($_POST['vremya_priema'])){ echo "Заполните поле время приема ";}else{
if(empty($_POST['prichina'])){ echo "Заполните поле причина ";}else{
if(empty($_POST['coment'])){ echo "Заполните поле комментарии";}else{
      
            $sp_name = $_POST['sp'];
$q_sel_login = "select ochered.vremya_priema ,sp.id_sp,sp.imya from ochered join sp on sp.id_sp=ochered.sp_id_sp
 where ochered.vremya_priema= '".trim($_POST['vremya_priema'])."' and  sp.imya='$sp_name'";
$res_sel_login=mysqli_query($conn,$q_sel_login);
$num_rows_sel_login=mysqli_num_rows($res_sel_login);

$id_sp;
$dlitelnost;
 if ($num_rows_sel_login!=0) {
     # code...
     echo "Занято !!!";
 }else {
    //  $sp_name = $_POST['sp'];
     $id_kl_name= "select id_sp, dlitelnost from sp where imya = '$sp_name' ";
     $res = mysqli_query($conn, $id_kl_name);
     while($row0 = mysqli_fetch_array($res)) {
        // echo"<option value = $row0[0]>$row0[1]</option>";
        $id_sp=$row0[0];
        $dlitelnost=$row0[1];
      }
     
    $id_kl =$_SESSION['id_kl'];

    $count++;
  
     $q_ins_reg_och = "call sp_ins_och_reg
("."'".$_POST['data_priema']."'".",
$count,
"."'".$_POST['vremya_priema']."'".",
$dlitelnost,
"."'".$_POST['prichina']."'".",
"."'".$_POST['coment']."'"." ,
'$id_sp',
'$id_kl')";

// var_dump($q_ins_reg_org);
$result=mysqli_query($conn,  $q_ins_reg_och) or die(mysqli_error($conn));
mysqli_close($conn);
mysqli_free_result($result);
 header("Location:all_org.php"); 
 exit;
 }
}    
}   
}    
}    
}






