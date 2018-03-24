<?php 
    session_start();
    if(isset($_SESSION['Email']))
    {
        header('Location:DashBoard.php');
        exit();
    }

    include 'DB_Connection.php';

?>


<?php

if ($_SERVER['REQUEST_METHOD']=='POST')
{
    $Email = $_POST['Email'];
    $Password = $_POST['password'];
    $hashPass = sha1($Password);


// Check The User If Not Exists In DataBase
    $stmt=$DB_Connect->prepare("SELECT Email,Password FROM table_admin WHERE Email = ? AND Password =?");
    $s =  $stmt->execute(array($Email,$hashPass));
    $count = $stmt->rowCount();


   // If Count > 0 This Main About The Database Recourd About This name
           if  ($count>0)
           {
             $_SESSION['Email']=$Email; // Record Session Name
             header('Location:DashBoard.php'); // Redirect Page
             exit();
             
           }
           else{
               $mag='<p class=" text-danger alert alert-primary text-center" style="font-size:14px;">The UserName Or Password Incorrect</p>';
           }
}
?>


    <?php include 'Templetes/header.php'; ?>



    <div class=" Login card " style="width: 25rem;">
    
        <div class="card-body">
        <?php echo $mag?>
            <h5 class="card-title lead text-center pb-2">lOGIN ADMIN</h5>

            <form id="formLogin" action="<?php $_SERVER['PHP_SELF']  ?>" method="POST">
                <div class="form-group mb-4">
                    <label for="exampleInputEmail1">Email address</label>
                    <input type="email" required class="form-control" name="Email" id="exampleInputEmail1" autocomplete="off" placeholder="Enter email">
                </div>
                <div class="form-group mb-4">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" required class="form-control" name="password" id="exampleInputPassword1" autocomplete="new-password" placeholder="Password">
                </div>
                <input type="submit" id="btn-Login" name="btn-Login" value="Login" class="btn btn-primary btn-block">
            </form>

        </div>
    </div>


    <?php include 'Templetes/footer.php'; ?>