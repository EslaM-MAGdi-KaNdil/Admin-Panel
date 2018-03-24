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

 
  
    $show = $DB_Connect->prepare("SELECT * FROM table_secretary WHERE id = $edit ");
    $show->setFetchMode(PDO::FETCH_ASSOC);
    $show->execute();

    
        $row=$show->fetch();
        
        $id = $row['id'];
        $name_secretary = $row['sec_name'];
        $email_secretary = $row['sec_email'];
        $secretary_id = $row['sec_id'];
        $secretary_pass=$row['sec_password'];   
}
?>



<?php
try{
if (isset($_POST['Edit_Secretary']))
{

       if($_POST['Edit_Secretary_Name']!=$name_secretary || $_POST['Edit_Secretary_Email']!=$email_secretary || $_POST['Edit_Secretary_ID']!=$secretary_id  )
       {
        $secretary_name=$_POST['Edit_Secretary_Name'];
        $secretary_email =$_POST['Edit_Secretary_Email'];
        $secretaryID=$_POST['Edit_Secretary_ID'];
        $msg = '<div class="alert alert-success alert-dismissible text-center">
                <button type="button" class="close" data-dismiss="alert" style="cursor:pointer">&times;</button>
                successfully Edit
            </div>';
        $update = $DB_Connect->prepare("UPDATE table_secretary SET sec_name = :sec_name, sec_email = :sec_email, sec_id = :sec_id WHERE id = '$edit' ");
        $update->bindparam(':sec_name',$secretary_name );
        $update->bindparam(':sec_email',$secretary_email);
        $update->bindparam(':sec_id',$secretaryID);
        
        $update->execute();
        header('Location:control_secretary.php');
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
                <h3 class="lead">Edit Secretary </h3>
            </div>

            <div class="card-body">
                <?php echo $msg;?>
                <form method="POST" action="<?php $_SERVER['PHP_SELF'] ?>">
                                <table class="table">
                                    <tr>
                                        <td class="text-center">
                                            <label class="lead">Edit Secretary Name :</label>
                                        </td>
                                        <td>
                                            <input type="text" class="form-control" autocomplete="off" name="Edit_Secretary_Name" value="<?php echo $name_secretary ?>"  required>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td class="text-center">
                                            <label class="lead ">Edit Secretary Email :</label>
                                        </td>
                                        <td>
                                            <input type="email"  class="form-control" autocomplete="off" name="Edit_Secretary_Email" value="<?php echo $email_secretary  ?>"  required>
                                        </td>
                                    </tr>

                                      <tr>
                                        <td class="text-center">
                                            <label class="lead ">Edit Secretary ID :</label>
                                        </td>
                                        <td>
                                            <input type="number"  class="form-control" autocomplete="off" name="Edit_Secretary_ID" value="<?php echo $secretary_id ?>" required>
                                        </td>
                                    </tr>

                                </table>
                                    <input type="submit" class="btn btn-info btn-block" value="Edit Secretary" name="Edit_Secretary">
                            </form>
            </div>
        </div>
    </div>


<div class="text-center mt-5">
        <a href="control_secretary.php" class="btn btn-lg btn-outline-danger">Go To The Mange Secretary</a>
    </div>
    </div>


    

</div>




  <?php include 'Templetes/Footer.php'?>