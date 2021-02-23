<?php 
 require "conn.php";

 //Запрос на вывод городов
$q_sel_gorod = "select ochered.vremya_priema ,sp.id_sp,sp.imya from ochered join sp on sp.id_sp=ochered.sp_id_sp
where ochered.vremya_priema= '".trim($_POST['vremya_priema'])."'and  sp.imya='".$_POST["sp"]."'";
//Результат выполнения запроса
$res0 = mysqli_query($conn, $q_sel_gorod);
$num_rows_sel_ochered=mysqli_num_rows($res0);
if ($num_rows_sel_ochered!=0) {
    # code...
    echo "<script> alert('Извините это очеред занят')</script>";
}else {
    echo "<script> alert('Свободна')</script>";
    //Перебор значений уже полученных от запроса
// while($row0 = mysqli_fetch_array($res0))
//  {echo"<option value = $row0[0]>$row0[1]</option>";}
// //Закрываем соединение
// mysqli_close($conn); 
// //Освобождаем память от результатов запроса
// mysqli_free_result($res0); 
}



?>