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
// Function To Edit Category
$edit =$_GET['edit_id'];
if (isset($edit))
{

 
  
    $show = $DB_Connect->prepare("SELECT * FROM table_doctor WHERE ID = $edit ");
    $show->setFetchMode(PDO::FETCH_ASSOC);
    $show->execute();

    
        $row=$show->fetch();
        
        $id = $row['ID'];
        $namedoctor = $row['doctor_name'];
        $emaildoctor = $row['doctor_email'];
        $doctorid = $row['doctor_id'];
        $doctorpass=$row['doctor_password'];   
}
?>



<?php
try{
if (isset($_POST['Edit_Doctor']))
{

       if($_POST['Edit_Doctor_Name']!=$namedoctor || $_POST['Edit_Doctor_Email']!=$emaildoctor || $_POST['Edit_Doctor_ID']!=$doctorid  )
       {
        $doctor_name=$_POST['Edit_Doctor_Name'];
        $Doctor_email =$_POST['Edit_Doctor_Email'];
        $DoctorID=$_POST['Edit_Doctor_ID'];
        $msg = '<div class="alert alert-success alert-dismissible text-center">
                <button type="button" class="close" data-dismiss="alert" style="cursor:pointer">&times;</button>
                successfully Edit
            </div>';
        $update = $DB_Connect->prepare("UPDATE table_doctor SET doctor_name = :doctor_name, doctor_email = :doctor_email, doctor_id = :doctor_id WHERE ID = '$edit' ");
        $update->bindparam(':doctor_name',$doctor_name );
        $update->bindparam(':doctor_email',$Doctor_email);
        $update->bindparam(':doctor_id',$DoctorID);
        
        $update->execute();
        header('Location:control_doctor.php');
        exit();
       }
       else
       {
        $msg = '<div class="alert alert-primary text-center alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" style="cursor:pointer">&times;</button>
    
            This Information IS Not Any Change  </div>';   
       }
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
    <div class="mt-5">
        <div class="card m-auto" style="width:70%" >
            <div class="card-header">
                <h3 class="lead">Edit Doctor </h3>
            </div>

            <div class="card-body">
                <?php echo $msg;?>
                <form method="POST" action="<?php $_SERVER['PHP_SELF'] ?>">
                                <table class="table">
                                    <tr>
                                        <td class="text-center">
                                            <label class="lead">Edit Doctor Name :</label>
                                        </td>
                                        <td>
                                            <input type="text" class="form-control" autocomplete="off" name="Edit_Doctor_Name" value="<?php echo $namedoctor ?>"  required>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td class="text-center">
                                            <label class="lead ">Edit Doctor Email :</label>
                                        </td>
                                        <td>
                                            <input type="email"  class="form-control" autocomplete="off" name="Edit_Doctor_Email" value="<?php echo $emaildoctor  ?>"  required>
                                        </td>
                                    </tr>

                                      <tr>
                                        <td class="text-center">
                                            <label class="lead ">Edit Doctor ID :</label>
                                        </td>
                                        <td>
                                            <input type="number"  class="form-control" autocomplete="off" name="Edit_Doctor_ID" value="<?php echo $doctorid ?>" required>
                                        </td>
                                    </tr>

                                </table>
                                    <input type="submit" class="btn btn-info btn-block" value="Edit Doctor" name="Edit_Doctor">
                            </form>
            </div>
        </div>
    </div>


<div class="text-center mt-5">
        <a href="control_doctor.php" class="btn btn-lg btn-outline-danger">Go To The Mange Doctor</a>
    </div>
    </div>


    

</div>




  <?php include 'Templetes/Footer.php'?>