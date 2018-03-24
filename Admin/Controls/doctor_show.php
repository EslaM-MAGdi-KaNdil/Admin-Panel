<?php
// The Function Is Delete The Item From DataBase
$DeletItem = $_GET['del_id'];

if (isset($DeletItem))
{

 
    $msg = '<div class="alert alert-success alert-dismissible text-center">
    <button type="button" class="close" data-dismiss="alert" style="cursor:pointer">&times;</button>
    successfully Delete
    </div>';
    $delete = $DB_Connect->prepare("DELETE FROM table_doctor WHERE ID = '$DeletItem' ");
    $delete->execute();
}   

?>
<div class="mt-5 text-center">

    <div class="col-sm-9 m-auto">

    <?php echo $msg?>
        <div class="card">
            <div class="card-header">
                <h3 class="lead">Show And Management Doctor </h3>
            </div>

            <div class="card-body mt-3">

                <table class="table table-hover table-bordered ">

                    <thead>
                        <tr>
                            <th>Doctor Name</th>
                            <th>Doctor Email</th>
                            <th>Doctor ID</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tbody>

                        <?php
                                        $sql = $DB_Connect->prepare("SELECT * FROM table_doctor order by ID asc");
                                        $sql->setFetchMode(PDO::FETCH_ASSOC);
                                        $sql->execute();


                                        

                                        if($sql->rowCount() != 0) {  
                                        while($row=$sql->fetch()) 
                                        {
                                            $id = $row['ID'];
                                            $namedoctor = $row['doctor_name'];
                                            $emaildoctor = $row['doctor_email'];
                                            $doctorid = $row['doctor_id'];
                                            $doctorpass=$row['doctor_password'];
                                    ?>
                            <tr>
                                <td>
                                    <?php echo $namedoctor ?>
                                </td>

                                <td>
                                    <?php echo $emaildoctor ?> </td>

                                <td>
                                    <?php echo $doctorid ?> </td>

                                <td>
                                <a href="edit_doctor.php?edit_id=<?php echo $id ?>" class="btn btn-outline-primary">Edit</a>
                                    |
                                    <a href="?del_id=<?php echo $id  ?> " class="btn btn-outline-danger click" name="Delete"> Delete</a>

                                </td>

                            </tr>

                            
                            <?php
                                        }} else {
                                            echo  '<div class="alert alert-success alert-dismissible text-center">
                                                <button type="button" class="close" data-dismiss="alert" style="cursor:pointer">&times;</button>
                                                dont exist records for list on the table
                                                </div>';
                                            ;}
                            ?>
                    </tbody>

                </table>

            </div>
        </div>

    </div>

</div>

<div class="mt-4 mb-4 text-center col-12 " >
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-outline-info btn-lg" style="cursor: pointer;" data-toggle="modal" data-target="#exampleModal">
       Add New Doctor
    </button>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog  modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add New Doctor</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    
                <form method="POST" action="<?php $_SERVER['PHP_SELF'] ?>">
                                <table class="table">
                                    <tr>
                                        <td class="text-center">
                                            <label class="lead">Add Doctor Name :</label>
                                        </td>
                                        <td>
                                            <input type="text" class="form-control" autocomplete="off" name="Add_Doctor_Name"  required>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td class="text-center">
                                            <label class="lead ">Add Doctor Email :</label>
                                        </td>
                                        <td>
                                            <input type="email"  class="form-control" autocomplete="off" name="Add_Doctor_Email"  required>
                                        </td>
                                    </tr>

                                      <tr>
                                        <td class="text-center">
                                            <label class="lead ">Add Doctor ID :</label>
                                        </td>
                                        <td>
                                            <input type="number"  class="form-control" autocomplete="off" name="Add_Doctor_ID" required>
                                        </td>
                                    </tr>

                                      <tr>
                                        <td class="text-center">
                                            <label class="lead ">Add Doctor Password :</label>
                                        </td>
                                        <td>
                                            <input type="password"  class="form-control" autocomplete="off" name="Add_Doctor_Password"  required>
                                        </td>
                                    </tr>
                                </table>



                                
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal" style="cursor:pointer;">Close</button>
                                    <input type="submit" class="btn btn-info btn-block" value="Add Doctor" name="Add_Doctor">
                                </div>
                            </form>
                </div>
               
            </div>
        </div>
    </div>
</div>