<?php
ob_start();
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
              on <?php 
$timeago = new get_timeago;
              echo $timeago -> timeago( $blog -> getPostContent($slug)['created_at']);


              ?> </span>
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
            <a href="category.php?id=<?php echo $blog -> getCategoryDetails($category_id)['id'];?>">

<?php echo $blog -> getCategoryDetails($category_id)['name']; ?>

            </a>

</p>
<p>
             Tag : 
             
 <a href="tag.php?tag_id=<?php echo $blog -> getPostContent($slug)['tag_id'];?>">
              <?php echo $blog -> getTagDetails($tag_id)['name']; ?>
</a></p>

<br><br>

<?php 

$user = new User();
if( $user -> checkIsUserLoggedIn()){
$favourites = new BLog;

$post_id = $blog -> getPostContent($slug)['id'];
?>



<form action="" method="post">
<?php 
if( $favourites -> checkIsPostInFavouritePosts($post_id ) ){


if( isset($_POST['addToFavouritePosts'])){

    $favourites -> addToFavouritePosts($post_id);

}


?>
  <button name="addToFavouritePosts" type="submit" class="btn btn-primary" >Add to favourite posts</button>

<?php

} else {
if( isset($_POST['removeFromFavouritePosts'])){

    $favourites -> removeFromFavouritePosts($post_id);


}




?>

  <button name="removeFromFavouritePosts" type="submit" class="btn btn-primary" >Remove from favourite posts</button>

<?php

}

?>  




</form>


<?php
} else {

  echo 'You must be logged in';
}


 ?>







<br><br>




<div id="disqus_thread"></div>
<script>
    /**
    *  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
    *  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables    */
    /*
    var disqus_config = function () {
    this.page.url = PAGE_URL;  // Replace PAGE_URL with your page's canonical URL variable
    this.page.identifier = PAGE_IDENTIFIER; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
    };
    */
    (function() { // DON'T EDIT BELOW THIS LINE
    var d = document, s = d.createElement('script');
    s.src = '<?php echo DISQUS_URL_CODE  ?>';
    s.setAttribute('data-timestamp', +new Date());
    (d.head || d.body).appendChild(s);
    })();
</script>
<noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
<br>





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
  <script id="dsq-count-scr" src="<?php  echo DISQUS_SCRIPT_CODE ?>" async></script>
</body>

</html>
<?php ob_end_flush() ?>