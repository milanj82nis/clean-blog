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
    <title>My account | <?php echo SITE_NAME; ?></title>

<?php require_once 'partials/__head.php' ;?>

<style type="text/css">
  

.account-settings .user-profile {
    margin: 0 0 1rem 0;
    padding-bottom: 1rem;
    text-align: center;
}
.account-settings .user-profile .user-avatar {
    margin: 0 0 1rem 0;
}
.account-settings .user-profile .user-avatar img {
    width: 90px;
    height: 90px;
    -webkit-border-radius: 100px;
    -moz-border-radius: 100px;
    border-radius: 100px;
}
.account-settings .user-profile h5.user-name {
    margin: 0 0 0.5rem 0;
}
.account-settings .user-profile h6.user-email {
    margin: 0;
    font-size: 0.8rem;
    font-weight: 400;
    color: #9fa8b9;
}
.account-settings .about {
    margin: 2rem 0 0 0;
    text-align: center;
}
.account-settings .about h5 {
    margin: 0 0 15px 0;
    color: #007ae1;
}
.account-settings .about p {
    font-size: 0.825rem;
}
.form-control {
    border: 1px solid #cfd1d8;
    -webkit-border-radius: 2px;
    -moz-border-radius: 2px;
    border-radius: 2px;
    font-size: .825rem;
    background: #ffffff;
    color: #2e323c;
}

.card {
    background: #ffffff;
    -webkit-border-radius: 5px;
    -moz-border-radius: 5px;
    border-radius: 5px;
    border: 0;
    margin-bottom: 1rem;
}

</style>

</head>

<body>

<?php require_once 'partials/__navigation.php' ?>
<?php require_once 'partials/__page_header.php' ?>


<div class="container">
<div class="row gutters">
<div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12">
<div class="card h-100">
  <div class="card-body">
    <div class="account-settings">
      <div class="user-profile">
        <div class="user-avatar">
          <img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="Maxwell Admin">
        </div>
        <h5 class="user-name"><?php echo $user -> getUserDetails($_SESSION['user_id'])['name'] ?></h5>
        <h6 class="user-email"><?php echo $user -> getUserDetails($_SESSION['user_id'])['email'] ?></h6>
      </div>
      <div class="about">
        <h5>About me</h5>
        <p><?php echo $user -> getUserDetails($_SESSION['user_id'])['about_me'] ?></p>
      </div>
    </div>
  </div>
</div>
</div>
<div class="col-xl-9 col-lg-9 col-md-12 col-sm-12 col-12">
<div class="card h-100">
  <div class="card-body">

<?php
try {






if( isset($_POST['updateAccount'])){
$name = $_POST['name'];
$email = $_POST['email'];
$website_url = $_POST['website_url'];
$about_me = $_POST['about_me'];
$phone = $_POST['phone'];
$street = $_POST['street'];
$city = $_POST['city'];
$state = $_POST['state'];
$postal_code = $_POST['postal_code'];

$user = new User();
$user -> updateMyProfile($name , $email , $website_url , $about_me , $phone , $street , $city , $state , $postal_code );




}// main isset

} catch( PDOException $e ){

  echo $e -> getMessage();
}

$msg -> display();
?>



    <form action="" method="post">


    <div class="row gutters">
      <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <h6 class="mb-2 text-primary">Personal Details</h6>
      </div>




      <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
        <div class="form-group">
          <label for="fullName">Full Name</label>
          <input type="text" class="form-control" id="fullName" name="name" placeholder="<?php echo $user -> getUserDetails($_SESSION['user_id'])['name'] ?>">
        </div>
      </div>

      <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
        <div class="form-group">
          <label for="eMail">Email</label>
          <input type="email" class="form-control" id="eMail" name="email" placeholder="<?php echo $user -> getUserDetails($_SESSION['user_id'])['email'] ?>">
        </div>
      </div>

      <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
        <div class="form-group">
          <label for="phone">Phone</label>
          <input type="text" class="form-control" id="phone" name="phone" placeholder="<?php echo $user -> getUserDetails($_SESSION['user_id'])['phone'] ?>">
        </div>
      </div>

      <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
        <div class="form-group">
          <label for="website">Website URL</label>
          <input type="url" class="form-control" id="website" name="website_url" placeholder="<?php echo $user -> getUserDetails($_SESSION['user_id'])['website_url'] ?>">
        </div>
      </div>
    </div>

    <div class="row gutters">
      <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <h6 class="mt-3 mb-2 text-primary">Address</h6>
      </div>
      <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
        <div class="form-group">
          <label for="Street">Street</label>
          <input type="name" class="form-control" id="Street" name="street" placeholder="<?php echo $user -> getUserDetails($_SESSION['user_id'])['street'] ?>">
        </div>
      </div>

      <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
        <div class="form-group">
          <label for="ciTy">City</label>
          <input type="name" class="form-control" id="ciTy" name="city" placeholder="<?php echo $user -> getUserDetails($_SESSION['user_id'])['city'] ?>">
        </div>
      </div>

      <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
        <div class="form-group">
          <label for="sTate">State</label>
          <input type="text" class="form-control" id="sTate" name="state" placeholder="<?php echo $user -> getUserDetails($_SESSION['user_id'])['state'] ?>">
        </div>
      </div>

      <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
        <div class="form-group">
          <label for="zIp">Zip Code</label>
          <input type="text" class="form-control" id="zIp" name="postal_code" placeholder="<?php echo $user -> getUserDetails($_SESSION['user_id'])['postal_code'] ?>">
        </div>
      </div>
    </div>      

    </div>
<div class="row gutters">
      <div class="col-xl-12 col-lg-12col-md-12 col-sm-12 col-12">
        <div class="form-group">
          <label for="zIp">About me</label>
          <textarea name="about_me"  rows="5" class="form-control"><?php echo $user -> getUserDetails($_SESSION['user_id'])['about_me'] ?></textarea>
        </div>
    </div>


</div>

    <div class="row gutters">
      <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="text-right">
          <button type="button" id="submit" name="submit" class="btn btn-secondary">Cancel</button>
          <button type="submit" id="submit" name="updateAccount" class="btn btn-primary">Update</button>
        </div>
      </div>
    </div>
 </form>


  </div>

</div>
</div>
</div>
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