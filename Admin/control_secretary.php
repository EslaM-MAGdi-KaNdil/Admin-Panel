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
if (isset($_POST['Add_Secretary']))
{

    $secretary_name=$_POST['Add_Secretary_Name'];
    $secretary_email =$_POST['Add_Secretary_Email'];
    $secretaryID=$_POST['Add_Secretary_ID'];
    $secretary_Pass=$_POST['Add_Secretary_Password'];
    $sha_password=sha1($secretary_Pass);
    $msg = '<div class="alert alert-success alert-dismissible text-center">
                <button type="button" class="close" data-dismiss="alert" style="cursor:pointer">&times;</button>
                successfully added
            </div>';
    $insert = $DB_Connect->prepare("INSERT INTO table_secretary (sec_name,sec_email,sec_id,sec_password) 

        VALUES (:sec_name, :sec_email, :sec_id, :sec_password)");
        $insert->bindparam(':sec_name',$secretary_name );
        $insert->bindparam(':sec_email',$secretary_email);
        $insert->bindparam(':sec_id',$secretaryID);
        $insert->bindparam(':sec_password',$sha_password);
        $insert->execute();
}}
catch(PDOException $e){

    $msg = '<div class="alert alert-primary text-center alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" style="cursor:pointer">&times;</button>
    
    This Information IS Exists </div>';    
}
?>






    <div class="row">
        <div class="col-sm-3">
            <?php include 'Templetes/leftmenue.php';?>

        </div>

        <div class="col-sm-9">
            <?php include 'Templetes/NavBar.php'?>


            <?php include 'Controls/secretary_show.php';?>
            
         </div>



    </div>


           <?php include 'Templetes/Footer.php'?>