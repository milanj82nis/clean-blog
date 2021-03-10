<?php
require_once 'include/db.inc.php';
require_once 'include/class_autoloader.inc.php';
require_once 'include/config.inc.php';
require_once 'include/vendor/plasticbrain/php-flash-messages/src/FlashMessages.php';
    $msg = new \Plasticbrain\FlashMessages\FlashMessages();


$logged = new User();

if( $logged -> checkIsUserLoggedIn()){
  header('Location:index.php');
  exit();
} 

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <title>User registration | <?php echo SITE_NAME; ?></title>

<?php require_once 'partials/__head.php' ;?>
<style type="text/css">
  

.my-form
{
    padding-top: 1.5rem;
    padding-bottom: 1.5rem;
}

.my-form .row
{
    margin-left: 0;
    margin-right: 0;
}

.login-form
{
    padding-top: 1.5rem;
    padding-bottom: 1.5rem;
}

.login-form .row
{
    margin-left: 0;
    margin-right: 0;
}
</style>
</head>

<body>

<?php require_once 'partials/__navigation.php' ?>
<?php require_once 'partials/__page_header.php' ?>
  <!-- Main Content -->

<main class="my-form">
    <div class="cotainer">
        <div class="row justify-content-center">
            <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">Register</div>
                        <div class="card-body">

<?php  
try {
  
if ( isset($_POST['userRegistration'])){

$name = htmlspecialchars(trim($_POST['name']));
$email = htmlspecialchars(trim($_POST['email']));
$password = trim($_POST['password']);
$password_confirmation = trim($_POST['password_confirmation']);
$user = new User;
$user -> userRegistration( $name , $email , $password , $password_confirmation);

}// main isset
} catch ( PDOException $e) {
  echo $e -> getMessage();
}


?>
<?php $msg->display(); ?>


                            <form name="my-form"  action="register.php" method="POST">
                                <div class="form-group row">
                                    <label for="full_name" class="col-md-4 col-form-label text-md-right">Full Name</label>
                                    <div class="col-md-6">
                                        <input type="text" id="full_name" class="form-control" name="name">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="email_address" class="col-md-4 col-form-label text-md-right">E-Mail Address</label>
                                    <div class="col-md-6">
                                        <input type="text" id="email_address" class="form-control" name="email">
                                    </div>
                                </div>

                                
                                <div class="form-group row">
                                    <label for="email_address" class="col-md-4 col-form-label text-md-right">Password</label>
                                    <div class="col-md-6">
                                        <input type="password" id="email_address" class="form-control" name="password">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="email_address" class="col-md-4 col-form-label text-md-right">Password confirmation</label>
                                    <div class="col-md-6">
                                        <input type="password" id="email_address" class="form-control" name="password_confirmation">
                                    </div>
                                </div>

                                                               

                                


                                    <div class="col-md-6 offset-md-4">
                                        <button type="submit" name="userRegistration" class="btn btn-primary">
                                        Register
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
            </div>
        </div>
    </div>

</main>

  <hr>

<?php require_once 'partials/__footer.php' ?>

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Custom scripts for this template -->
  <script src="js/clean-blog.min.js"></script>

</body>

</html>
