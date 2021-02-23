<?php
session_start();
require "conn.php";

$output="";

if (isset($_POST['search'])) {
    # code...
    $searchq=$_POST['search'];
    // var_dump($searchq);
    $searchq=preg_replace("#[^0-9a-z]#i","",$searchq);

    $query=mysqli_query($conn,"SELECT * FROM org where org LIKE '%$searchq%'")  or die("не мог искать");

    $count = mysqli_num_rows($query);
    if($count==0){
        $output='Такого организации не существует!';
    }else{

        while($row=mysqli_fetch_array($query)){
            $org=$row['org'];
            $tel=$row['tel'];
            $address=$row['address_'];
            // $id=$row['id_users'];

            $output .='<div class="fam_imya"> Название :  '.$org.' <br> Телефон : '.$tel.' <br>  Адресс: '.$address.' </div>';
        }
    }
}


?>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
    <a class="navbar-brand" href="index.php">Система очереди</a>
    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
      <!-- <li class="nav-item active" style='margin-left:30%'>
        <a class="nav-link" href="org_list.php">Настройка <span class="sr-only">(current)</span></a>
      </li> -->
      <!-- <li class="nav-item active">
        <a class="nav-link" href="och_reg_form.php">Очереди</a>
      </li> -->
      <li class="nav-item active" style='margin-left:30%'>
        <a class="nav-link" href="all_org.php">Организации</a>
      </li>
      <li class="nav-item active">
        <a class="nav-link " href="och_list.php">Очереди</a>
      </li>
    
      <?php 

if (!isset($_SESSION['id_sp'])) {
 echo ' <li class="nav-item active"><a class="nav-link " style="display:none" href="och_reg_form.php">Брон</a> </li>';
 echo ' <li class="nav-item active"><a class="nav-link " style="display:none" id= "del_update" href="org_list.php">Редак_Удален</a></li>';
 
}else{
  echo ' <li class="nav-item active"><a class="nav-link " style="display:block" href="och_reg_form.php">Брон</a> </li>';
  echo ' <li class="nav-item active"><a class="nav-link " style="display:block" id= "del_update" href="org_list.php">Редак_Удален</a></li>';
}

if (!isset($_SESSION['id_kl'])) {
  echo ' <li class="nav-item active"><a class="nav-link " style="display:none" href="kl_och_reg_from.php">Брон</a> </li>';
 
  
 }else{
   echo ' <li class="nav-item active"><a class="nav-link " style="display:block" href="kl_och_reg_from.php">Брон</a> </li>';
  
 }



?>
     
    
    </ul>
    <div class="searchQ" style="margin-right:100px">
    <form method="post" action="index.php" class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="text" placeholder="Поиск организации" aria-label="Search"  name='search'>
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit" name='searchbtn' >Поиск</button>

      <!-- <input class="form-control" type="text" name="search" placeholder="Search"> 
       <input class="form-control" type="submit" name="" value="Search"> -->
    </form>
    </div>


  </div>
  <form action = 'exit_form.php' method = 'POST'>
<input type = 'submit' name = 'b2' class="btn btn-outline-success my-2 my-sm-0" value = 'Выйти'>
</form>
</nav>
<div class='search_org' style=" margin: left;
margin-left:30px;
  width: 50%;
  padding: 10px;"  >
<?php print("$output") ?>
</div>
