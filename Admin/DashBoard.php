<?php


    session_start();
    if(isset($_SESSION['Email']))
    {   
        include 'DB_Connection.php';
        include 'Templetes/Header.php';
       
   
               

        
    }
    else
    {
        header('Location:index.php');
        exit();
    }

   
?>

<div class="row">
    <div class="col-sm-3"><?php include 'Templetes/leftmenue.php'?></div>
    <div class="col-sm-9"><?php include 'Templetes/NavBar.php'?></div>
</div>



<?php include 'Templetes/Footer.php'?>

