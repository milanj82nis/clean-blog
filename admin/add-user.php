<?php 
require_once '../include/db.inc.php';
require_once '../include/class_autoloader.inc.php';
require_once '../include/config.inc.php';
require_once '../include/vendor/plasticbrain/php-flash-messages/src/FlashMessages.php';
$msg = new \Plasticbrain\FlashMessages\FlashMessages();

$admin = new Admin;
if( !$admin -> checkIsUserAdmin()){
   
   header('Location:../login.php');
   exit();
}
 ?>
 <!doctype html>
<!-- 
* Bootstrap Simple Admin Template
* Version: 2.1
* Author: Alexis Luna
* Website: https://github.com/alexis-luna/bootstrap-simple-admin-template
-->
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Add user | <?php echo SITE_NAME ?></title>
    <link href="assets/vendor/fontawesome/css/fontawesome.min.css" rel="stylesheet">
    <link href="assets/vendor/fontawesome/css/solid.min.css" rel="stylesheet">
    <link href="assets/vendor/fontawesome/css/brands.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/master.css" rel="stylesheet">
    <link href="assets/vendor/chartsjs/Chart.min.css" rel="stylesheet">
    <link href="assets/vendor/flagiconcss/css/flag-icon.min.css" rel="stylesheet">
</head>

<body>
    <div class="wrapper">
<?php require_once 'partials/__nav_sidebar.php';?>

        <div id="body" class="active">
<?php require_once 'partials/__navigation.php' ?>


   
     <div class="content">
                <div class="container">
                    <div class="page-title">
                        <h3>Add user</h3>
                    </div>
                    <div class="row">
                        
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-header">Add user</div>
                                <div class="card-body">
                                    
<?php 
try {


if( isset($_POST['addUser'])){

  $name = htmlspecialchars(trim($_POST['name']));
  $email = htmlspecialchars(trim($_POST['email']));
  $password = trim($_POST['password']);
  $password_confirmation = trim($_POST['password_confirmation']);
  $is_admin = htmlspecialchars(trim((int)$_POST['is_admin']));
  $active = htmlspecialchars(trim((int)$_POST['active']));

$admin = new Admin;
$admin -> addUser( $name , $email , $password , $password_confirmation ,
 $active , $is_admin  );

}

} catch( PDOException $e ){
    echo $e -> getMessage();
}

?>
<?php $msg->display(); ?>

                                    <form accept-charset="utf-8" method="post" action="add-user.php">
                                        <div class="form-group row">
                                            <label class="col-sm-2" for="email">Full name</label>
                                            <div class="col-sm-10">
                                                <input type="text" name="name" placeholder="Full name" class="form-control">
                                                <small class="form-text">Example help text that remains unchanged.</small>
                                            </div>
                                        </div>
                                         <div class="form-group row">
                                            <label class="col-sm-2" for="email">Email</label>
                                            <div class="col-sm-10">
                                                <input type="email" name="email" placeholder="Email" class="form-control">
                                                <small class="form-text">Example help text that remains unchanged.</small>
                                            </div>
                                        </div>
                                                                              
                                        <div class="form-group row">
                                            <label class="col-sm-2" for="email">Password</label>
                                            <div class="col-sm-10">
                                                <input type="password" name="password" placeholder="Password" class="form-control">
                                                <small class="form-text">Example help text that remains unchanged.</small>
                                            </div>
                                        </div>
                                                                               
                                        <div class="form-group row">
                                            <label class="col-sm-2" for="password_confirmation">Confirm password</label>
                                            <div class="col-sm-10">
                                                <input type="password" name="password_confirmation" placeholder="Password confirmation" class="form-control">
                                                <small class="form-text">Example help text that remains unchanged.</small>
                                            </div>
                                        </div>
                                                                               
                                        <div class="form-group row">
                                            <label class="col-sm-2" for="email">Admin</label>
                                            <div class="col-sm-10">
                                                <select name="is_admin" class="form-control">
                                                    <option value="0">User is not admin </option>
                                                    <option value="1">User is  admin</option>
                                                 
                                                </select>
                                                <small class="form-text">Example help text that remains unchanged.</small>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2" for="active">Activate user ? </label>
                                            <div class="col-sm-10">
                                                <select name="active" class="form-control">
                                                    <option value="0">Uuser is not active</option>
                                                    <option value="1">User is  active</option>
                                                 
                                                </select>
                                                <small class="form-text">Example help text that remains unchanged.</small>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-10 offset-sm-2">
                                                <input type="submit" name="addUser" class="btn btn-primary">
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                       
                       
                        
                       
                    </div>
                </div>
            </div>







        </div>
    </div>
    <script src="assets/vendor/jquery/jquery.min.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/chartsjs/Chart.min.js"></script>
    <script src="assets/js/dashboard-charts.js"></script>
    <script src="assets/js/script.js"></script>
</body>

</html>