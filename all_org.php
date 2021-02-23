<?php
require "menu.php";
// if (!isset($_SESSION['id_kl'])) {
//     header("Location:kl_log_from.php");
// }
?>
<div class="container">
<table class="table table-striped table-bordered ">
<thead>
<tr>
<th style='width:50px;'>Организация</th>
<th style='width:100px;'>Отделение</th>
<th style='width:100px;'>Сотрудники</th>
<?php 
 if (isset($_SESSION['id_sp'])) {
    echo '<th style="width:100px; display:none">Брон очеред</th>';
}else {
    echo '<th style="width:100px;">Брон очеред</th>';
}
   
 
    
?>
<!-- 
<th style='width:100px;'>Брон очеред</th> -->
</tr>
</thead>
<tbody>
<?php


require "conn.php";


if (isset($_GET['page_no']) && $_GET['page_no']!="") {
    $page_no = $_GET['page_no'];
    } else {
        $page_no = 1;
        }

        	
$total_records_per_page = 4;



$offset = ($page_no-1) * $total_records_per_page;
$previous_page = $page_no - 1;
$next_page = $page_no + 1;
$adjacents = "2";




$result_count = mysqli_query(
$conn,
"SELECT COUNT(*) As total_records FROM `org`");
$total_records = mysqli_fetch_array($result_count);
$total_records = $total_records['total_records'];
$total_no_of_pages = ceil($total_records / $total_records_per_page);
$second_last = $total_no_of_pages - 1;


$result = mysqli_query(
    $conn,
    "select org.org, otdel.otdel, sp.imya from org 
    join otdel on org.id_org=otdel.org_id_org
    join sp on otdel.id_otdel=sp.otdel_id_otdel  LIMIT $offset, $total_records_per_page"
    );
while($row = mysqli_fetch_array($result)){
    echo "<tr>
 <td>".$row['org']."</td>
 <td>".$row['otdel']."</td>
 <td>".$row['imya']."</td>



";

 if (!isset($_SESSION['id_sp'])) {
   echo '<td><a href="#" >Бронировать</a></td>';
 }else {
    echo '<td style="display:none"><a  href="" >Бронировать</a></td>';
 }

 echo  '</tr>';
        }
mysqli_close($conn);
?>


  <!-- <td>".$row['address_']."</td> -->
<!--
All your PHP Script will be here
-->
</tbody>
</table>
<div class="page container" margin: auto;
width: 20%;
border: 3px solid green;
padding: 10px;>

<div style='padding: 10px 20px 0px; border-top: dotted 1px #CCC;'>
<strong>Page <?php echo $page_no." of ".$total_no_of_pages; ?></strong>
</div>


<ul class="pagination">
<?php if($page_no > 1){
echo "<li><a  href='?page_no=1'> First Page</a>&nbsp </li>";
} ?>
    
<li <?php if($page_no <= 1){ echo "class='disabled'"; } ?>>
<a <?php if($page_no > 1){
echo "href='?page_no=$previous_page'";
} ?>>Previous</a> &nbsp 
</li>
    
<li <?php if($page_no >= $total_no_of_pages){
echo "class='disabled'";
} ?>>
<a <?php if($page_no < $total_no_of_pages) {
echo "href='?page_no=$next_page'";
} ?>>Next</a>&nbsp 
</li>
 
<?php if($page_no < $total_no_of_pages){
echo "<li><a href='?page_no=$total_no_of_pages'>Last</a></li>";
} ?>
</ul>

</div>
</div>