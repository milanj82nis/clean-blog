<?php
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
    <title>Favourite blog posts | <?php echo SITE_NAME; ?></title>

<?php require_once 'partials/__head.php' ;?>

</head>

<body>

<?php require_once 'partials/__navigation.php' ?>
<?php require_once 'partials/__page_header.php' ?>




  <!-- Main Content -->
  <div class="container">

    <div class="row">
      <div class="col-lg-8 col-md-10 mx-auto">

<?php 
$blog = new Blog;
$user = new User;
$posts = $blog -> getAllFavouriteBlogPosts()['posts'];

foreach($posts as $post ){


?>

        <div class="post-preview">
          <a href="post.php?slug=<?php echo $post['slug'];?>#disqus_thread">
            <h2 class="post-title">
              <?php echo $post['title'] ?>
            </h2>
            <h3 class="post-subtitle">
              <?php echo substr($post['excerpt'] , 0 , 200 ) ?>
            </h3>
          </a>
          <p class="post-meta">Posted by
            <a href="user.php?slug=<?php  echo $user -> getUserDetails($post['user_id'])['slug']  ?>">
              
              <?php echo $user -> getUserDetails($post['user_id'])['name'] ?>
                
              </a>
            on <?php 
$timeago = new get_timeago;
            echo $timeago -> timeago($post['created_at']); 


            ?></p>
        </div>
<?php
}// foreach

if( count($posts ) > 0 ){
$pages = $blog -> getAllFavouriteBlogPosts()['pages'];

?>
<nav aria-label="Page navigation example">
  <ul class="pagination">
    
   

<?php
for ( $x = 1 ;$x <= $pages ; $x++ ){
$perPage = $blog -> getAllFavouriteBlogPosts()['per-page'];

?>



 <li class="page-item"><a class="page-link" href="?page=<?php echo $x;?>&per-page=<?php echo $perPage;?>"><?php echo $x; ?></a></li>




<?php

}// for
?>
  </ul>
</nav>

<?php

}// main if
 ?>
       
    

       
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
