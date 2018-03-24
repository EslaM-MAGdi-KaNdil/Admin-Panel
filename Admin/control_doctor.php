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
if (isset($_POST['Add_Doctor']))
{

    $doctor_name=$_POST['Add_Doctor_Name'];
    $Doctor_email =$_POST['Add_Doctor_Email'];
    $DoctorID=$_POST['Add_Doctor_ID'];
    $Doctor_Pass=$_POST['Add_Doctor_Password'];
    $sha_password=sha1($Doctor_Pass);
    $msg = '<div class="alert alert-success alert-dismissible text-center">
                <button type="button" class="close" data-dismiss="alert" style="cursor:pointer">&times;</button>
                successfully added
            </div>';
    $insert = $DB_Connect->prepare("INSERT INTO table_doctor (doctor_name,doctor_email,doctor_id,doctor_password) 

        VALUES (:doctor_name, :doctor_email, :doctor_id, :doctor_password)");
        $insert->bindparam(':doctor_name',$doctor_name );
        $insert->bindparam(':doctor_email',$Doctor_email);
        $insert->bindparam(':doctor_id',$DoctorID);
        $insert->bindparam(':doctor_password',$sha_password);
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


            <?php include 'Controls/doctor_show.php';?>
            
         </div>



    </div>


           <?php include 'Templetes/Footer.php'?>