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


<?php
try{
if (isset($_POST['Save_Matrial']))
{

    $top_matrial=$_POST['Add_Top_matrial_Name'];
    $top_level =$_POST['Add_Top_matrial_level'];
    $msg = '<div class="alert alert-success alert-dismissible text-center">
                <button type="button" class="close" data-dismiss="alert" style="cursor:pointer">&times;</button>
                successfully added
            </div>';
    $insert = $DB_Connect->prepare("INSERT INTO table_matrial (top_matrial_name,top_matrial_level) 

        VALUES (:top_matrial_name, :top_matrial_level)");
        $insert->bindparam(':top_matrial_name',$top_matrial );
        $insert->bindparam(':top_matrial_level',$top_level);
        $insert->execute();
}}
catch(PDOException $e){

    $msg = '<div class="alert alert-primary text-center alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" style="cursor:pointer">&times;</button>
    
    This Category Name IS Exists </div>';    
}
?>






    <div class="row">
        <div class="col-sm-3">
            <?php include 'Templetes/leftmenue.php';?>

        </div>

        <div class="col-sm-9">
            <?php include 'Templetes/NavBar.php'?>


            <?php include 'Controls/matrial_show.php';?>
            
         </div>



    </div>


           <?php include 'Templetes/Footer.php'?>