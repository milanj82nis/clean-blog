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
  <title>User login | <?php echo SITE_NAME; ?></title>

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
                        <div class="card-header">User login</div>
                        <div class="card-body">

<?php  
try {
  
if ( isset($_POST['userLogin'])){

$email = htmlspecialchars(trim($_POST['email']));
$password = trim($_POST['password']);
$user = new User;
$user -> userLogin( $email , $password );

}// main isset
} catch ( PDOException $e) {
  echo $e -> getMessage();
}

echo $msg -> display();
?>

                            <form name="my-form"  action="login.php" method="POST" id="demo-form">
                                

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
                                    <label for="email_address" class="col-md-4 col-form-label text-md-right">Recaptcha</label>
                                    <div class="col-md-6">
                                       <div class="g-recaptcha" data-sitekey="RECAPTCHA_SITE_KEY"></div>
                                    </div>
                                </div>


                                                               


                                    <div class="col-md-6 offset-md-4">
                                        <button type="submit" name="userLogin" class="btn btn-primary">
                                        Login
                                        </button>








<a href="password-reset.php" class="btn btn-primary">Password reset</a>


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
 <script src="https://www.google.com/recaptcha/api.js"></script>
  <script>
   function onSubmit(token) {
     document.getElementById("demo-form").submit();
   }
 </script>
</body>

</html>
