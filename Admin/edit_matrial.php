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
$ed =$_GET['edit_id'];
if (isset($ed))
{

 
  
    $show = $DB_Connect->prepare("SELECT * FROM table_matrial WHERE top_matrial_id = $ed ");
    $show->setFetchMode(PDO::FETCH_ASSOC);
    $show->execute();

    
        $row=$show->fetch();
        
        $idmatrial = $row['top_matrial_id'];
        $namematrial = $row['top_matrial_name'];
        $levelmatrial = $row['top_matrial_level'];     
}
?>



<?php
try{
if (isset($_POST['Edit_matrial']))
{

       if($_POST['Edit_Top_matrial_Name']!=$namematrial || $_POST['Edit_Top_matrial_level']!=$levelmatrial)
       {
        $top_matrial=$_POST['Edit_Top_matrial_Name'];
        $top_level =$_POST['Edit_Top_matrial_level'];
        $msg = '<div class="alert alert-success alert-dismissible text-center">
                <button type="button" class="close" data-dismiss="alert" style="cursor:pointer">&times;</button>
                successfully Edit
            </div>';
        $update = $DB_Connect->prepare("UPDATE table_matrial SET top_matrial_name = :top_matrial_name, top_matrial_level = :top_matrial_level WHERE top_matrial_id = '$ed' ");
        $update->bindparam(':top_matrial_name',$top_matrial );
        $update->bindparam(':top_matrial_level',$top_level);
        $update->execute();
        header('Location:control_matrial.php');
        exit();
       }
       else
       {
        $msg = '<div class="alert alert-primary text-center alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" style="cursor:pointer">&times;</button>
    
            This Matrial Name IS Not Any Change  </div>';   
       }
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
    <div class="mt-5">
        <div class="card m-auto" style="width:70%" >
            <div class="card-header">
                <h3 class="lead">Edit Matrial </h3>
            </div>

            <div class="card-body">
                <?php echo $msg;?>
                <form method="POST" action="<?php $_SERVER['PHP_SELF'] ?>">
                    <table class="table">
                        <tr>
                            <td class="text-center">
                                <label class="lead">Edit Matrial Name :</label>
                            </td>
                            <td>
                                <input type="text" class="form-control" autocomplete="off" name="Edit_Top_matrial_Name" value="<?php echo $namematrial ?>" required>
                            </td>
                        </tr>

                        <tr>
                            <td class="text-center">
                                <label class="lead ">Edit  Matrial Level :</label>
                            </td>
                            <td>
                                <input type="number" min="1" max="4" class="form-control" name="Edit_Top_matrial_level" autocomplete="off" value="<?php echo $levelmatrial ?>" required>
                            </td>
                        </tr>
                            

                    </table>
                    
                    <input type="submit"  class="btn btn-danger btn-block " value="Edit Matrial" name="Edit_matrial">
                    
                </form>

            </div>
        </div>
    </div>


<div class="text-center mt-5">
        <a href="control_doctor.php" class="btn btn-lg btn-outline-danger">Go To The Mange Matrial</a>
    </div>
    </div>


    

</div>




  <?php include 'Templetes/Footer.php'?>