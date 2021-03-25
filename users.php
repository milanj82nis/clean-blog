<?php
ob_start();
require_once 'include/db.inc.php';
require_once 'include/class_autoloader.inc.php';
require_once 'include/config.inc.php';
require_once 'include/vendor/plasticbrain/php-flash-messages/src/FlashMessages.php';
$msg = new \Plasticbrain\FlashMessages\FlashMessages();

$user = new User();
if( !$user -> checkIsUserLoggedIn()){

  header('Location:login.php');
  exit();
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Registered users | <?php echo SITE_NAME; ?></title>

<?php require_once 'partials/__head.php' ;?>



</head>

<body>

<?php require_once 'partials/__navigation.php' ?>
<?php require_once 'partials/__page_header.php' ?>





<div class="container">
<table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
     
      <th scope="col" colspan="3" style="text-align: center;">Action</th>
    </tr>
  </thead>
  <tbody>

<?php 

try {

$user = new User();
foreach ($user->registeredUsers() as $user){
?>
<tr>


      <th scope="row"><?php echo $user['id'] ?></th>
      <td><?php echo $user['name'] ;?></td>
      <td><?php  echo $user['email'];?></td>
      <td><a href="">View profile</a></td>
      <td><a href="">Send message</a></td>
      <td><a href="">Block user</a></td>
     
    </tr>

<?php

}


} catch( PDOException $e ){
  echo $e -> getMessage();
}


?> 


    
    
    
  </tbody>
</table>


</div>














  <hr>

<?php require_once 'partials/__footer.php' ?>

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Custom scripts for this template -->
  <script src="js/clean-blog.min.js"></script>

</body>

</html>
<?php ob_end_flush(); ?>