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
          <li class="nav-item">
            <a class="nav-link" href="contact.php">Welcome back ,<?php echo $_SESSION['name'] ?> </a>
          </li>
          <li class="nav-item"><a href="">Logout</a></li>
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

        </ul>
      </div>
    </div>
  </nav>
