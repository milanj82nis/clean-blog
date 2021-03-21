  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
    <div class="container">
      <a class="navbar-brand" href="index.php"><?php echo SITE_NAME; ?></a>
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        Menu
        <i class="fas fa-bars"></i>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link" href="index.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="categories.php">Categories</a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="contact.php">Contact</a>
          </li>         


<?php 
$logged = new User();

if( $logged -> checkIsUserLoggedIn()){
  ?>

<li class="nav-item dropdown">
  <a class="nav-link dropdown-toggle" href="#"  id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    Welcome back ,<?php echo $_SESSION['name'] ?> 
  </a>

  <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
    <a class="dropdown-item" href="my-account.php">My account</a>
    <a class="dropdown-item" href="favourite-blog-posts.php">Favourite blog posts</a>
    <a class="dropdown-item" href="messages.php">Messages</a>
    
<?php 
$admin = new User;
if( $admin -> checkIsUserAdmin()){
?>
    <a class="dropdown-item" href="admin/dashboard.php">Admin dashboard</a>

<?php
}


 ?>





    <a >
<?php

if( isset($_POST['userLogout'])){

$userLogout = new User;
$userLogout -> userLogout();


 } 
 ?>

<form action="" method="post">
  <button name="userLogout" class="dropdown-item">Logout</button>

</form>


    </a>
  </div>


</li>

         
         
  <?php
} else {
  ?>
          <li class="nav-item">
            <a class="nav-link" href="login.php">Login</a>
          </li>          
          <li class="nav-item">
            <a class="nav-link" href="register.php">Register</a>
          </li>
  <?php
}


 ?>

<li class="nav-link">
  
<form action="search.php" method="get">
  
<input type="text" size="20" class="form-control form-control-sm" name="keyword">

</form>

</li>





        </ul>
      </div>
    </div>
  </nav>
