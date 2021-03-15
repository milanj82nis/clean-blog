<?php
require_once 'include/db.inc.php';
require_once 'include/class_autoloader.inc.php';
require_once 'include/config.inc.php';
require_once 'include/vendor/plasticbrain/php-flash-messages/src/FlashMessages.php';
$msg = new \Plasticbrain\FlashMessages\FlashMessages();
if( !isset($_GET['slug'])){
  header('Location:index.php');
  exit();
}
$blog = new Blog;
$slug = $_GET['slug'];
$user = new User;
$user_id = $blog -> getPostContent($slug)['user_id'];
$category_id = $blog -> getPostContent($slug)['category_id'];
$tag_id = $blog -> getPostContent($slug)['tag_id'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title><?php echo $blog -> getPostContent($slug)['title'];?> | <?php echo SITE_NAME; ?></title>

<?php require_once 'partials/__head.php' ;?>

</head>

<body>

<?php require_once 'partials/__navigation.php' ?>
<!-- Page Header -->
  <header class="masthead" style="background-image: url('img/post-bg.jpg')">
    <div class="overlay"></div>
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          <div class="post-heading">
            <h1><?php echo $blog -> getPostContent($slug)['title'];?> </h1>
            <h2 class="subheading"><?php echo substr($blog -> getPostContent($slug)['excerpt'] , 0 , 150 );?> </h2>
            <span class="meta">Posted by
              <a href="user.php?slug=<?php echo $user -> getUserDetails($user_id)['slug'];?>">
<?php

echo $user -> getUserDetails($user_id)['name'];

?>

              </a>
              on <?php echo $blog -> getPostContent($slug)['created_at'];?> </span>
          </div>
        </div>
      </div>
    </div>
  </header>

  <!-- Post Content -->
  <article>
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          



<?php echo $blog -> getPostContent($slug)['content'] ?>



 <p>Category : 
            <a href="category.php?slug=<?php echo $blog -> getCategoryDetails($category_id)['slug'];?>">

<?php echo $blog -> getCategoryDetails($category_id)['name']; ?>

            </a>

</p>
<p>
             Tag : 
            <a href="tag.php?slug=<?php echo $blog -> getTagDetails($tag_id)['slug'];?>">
              <?php echo $blog -> getTagDetails($tag_id)['name']; ?>
</a></p>


        </div>
      </div>
    </div>
  </article>


<?php require_once 'partials/__footer.php' ?>

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Custom scripts for this template -->
  <script src="js/clean-blog.min.js"></script>

</body>

</html>
