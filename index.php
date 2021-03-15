<?php
require_once 'include/db.inc.php';
require_once 'include/class_autoloader.inc.php';
require_once 'include/config.inc.php';
require_once 'include/vendor/plasticbrain/php-flash-messages/src/FlashMessages.php';
$msg = new \Plasticbrain\FlashMessages\FlashMessages();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Home page | <?php echo SITE_NAME; ?></title>

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
try {
$posts = new Blog;
$user = new User;
if( count($posts -> getAllBlogPosts()) == 0 ){


} else {
 foreach ($posts -> getAllBlogPosts() as $post ){
?>
 <div class="post-preview">
          <a href="post.php?post=<?php echo $post['slug'] ?>">
            <h2 class="post-title">
              <?php echo $post['title']; ?>
            </h2>
            <h3 class="post-subtitle">
              <?php echo substr($post['excerpt'] , 0 , 150 ); ?> ...
            </h3>
          </a>
          <p class="post-meta">Posted by
            <a href="user.php?id=<?php echo  $post['user_id']  ?>">

<?php echo $user -> getUserDetails($post['user_id'])['name']; ?>

            </a>
            on <?php echo $post['created_at'] ?></p>
        </div>
        <hr>

<?php
 }// end foreach


}// end if


} catch( PDOException $e ){
  echo $e -> getMessage();
}



?>   
       
    

        <!-- Pager -->
        <div class="clearfix">
          <a class="btn btn-primary float-right" href="#">Older Posts &rarr;</a>
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
