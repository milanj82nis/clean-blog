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
$user_id = (int)$_GET['id'];
if(!$user_id){
  header('Location:users.php');
  exit();
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>View user profile | <?php echo SITE_NAME; ?></title>

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
        <h5 class="user-name"><?php echo $user -> getUserDetails($user_id)['name'] ?></h5>
        <h6 class="user-email"><?php echo $user -> getUserDetails($user_id)['email'] ?></h6>
      </div>
      <div class="about">
        <h5>About me</h5>
        <p><?php echo $user -> getUserDetails($user_id)['about_me'] ?></p>
      </div>
    </div>
  </div>
</div>
</div>
<div class="col-xl-9 col-lg-9 col-md-12 col-sm-12 col-12">
<div class="card h-100">
  <div class="card-body">





    <div class="row gutters">
      <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <h6 class="mb-2 text-primary">Personal Details</h6>
      </div>




      <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
        <div class="form-group">
          <label for="fullName">Full Name</label>
          <input type="text" class="form-control" disabled="disabled" id="fullName" name="name" placeholder="<?php echo $user -> getUserDetails($user_id)['name'] ?>">
        </div>
      </div>

      <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
        <div class="form-group">
          <label for="eMail">Email</label>
          <input type="email" class="form-control"  disabled="disabled" id="eMail" name="email" placeholder="<?php echo $user -> getUserDetails($user_id)['email'] ?>">
        </div>
      </div>

      <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
        <div class="form-group">
          <label for="phone">Phone</label>
          <input type="text" class="form-control" id="phone" disabled="disabled"  name="phone" placeholder="<?php echo $user -> getUserDetails($user_id)['phone'] ?>">
        </div>
      </div>

      <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
        <div class="form-group">
          <label for="website">Website URL</label>
          <input type="url" class="form-control" id="website" disabled="disabled"  name="website_url" placeholder="<?php echo $user -> getUserDetails($user_id)['website_url'] ?>">
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
          <input type="name" class="form-control" id="Street"  disabled="disabled" name="street" placeholder="<?php echo $user -> getUserDetails($user_id)['street'] ?>">
        </div>
      </div>

      <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
        <div class="form-group">
          <label for="ciTy">City</label>
          <input type="name" class="form-control" id="ciTy" name="city" disabled="disabled" placeholder="<?php echo $user -> getUserDetails($user_id)['city'] ?>">
        </div>
      </div>

      <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
        <div class="form-group">
          <label for="sTate">State</label>
          <input type="text" class="form-control" id="sTate"  disabled="disabled" name="state" placeholder="<?php echo $user -> getUserDetails($user_id)['state'] ?>">
        </div>
      </div>

      <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
        <div class="form-group">
          <label for="zIp">Zip Code</label>
          <input type="text" class="form-control" id="zIp"  disabled="disabled" name="postal_code" placeholder="<?php echo $user -> getUserDetails($user_id)['postal_code'] ?>">
        </div>
      </div>
    </div>      

    </div>
<div class="row gutters">
      <div class="col-xl-12 col-lg-12col-md-12 col-sm-12 col-12">
        <div class="form-group">
          <label for="zIp">About me</label>
          <textarea name="about_me"  rows="5"  disabled="disabled" class="form-control"><?php echo $user -> getUserDetails($user_id)['about_me'] ?></textarea>
        </div>
    </div>


</div>

    <div class="row gutters">
      <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="text-right">

<a href="messages.php?from_user=<?php echo $user -> getUserDetails($user_id)['id'] ?>" role="button"  class="btn btn-primary">Send message</a>
<a href="" role="button"  class="btn btn-danger">Block user</a>

        </div>
      </div>
    </div>



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