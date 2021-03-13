<?php 
require_once '../include/db.inc.php';
require_once '../include/class_autoloader.inc.php';
require_once '../include/config.inc.php';
$admin = new Admin;
if( !$admin -> checkIsUserAdmin()){
   
   header('Location:../login.php');
   exit();
}
 ?>
 <!doctype html>
<!-- 
* Bootstrap Simple Admin Template
* Version: 2.1
* Author: Alexis Luna
* Website: https://github.com/alexis-luna/bootstrap-simple-admin-template
-->
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Add post | <?php echo SITE_NAME ?></title>
    <link href="assets/vendor/fontawesome/css/fontawesome.min.css" rel="stylesheet">
    <link href="assets/vendor/fontawesome/css/solid.min.css" rel="stylesheet">
    <link href="assets/vendor/fontawesome/css/brands.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/master.css" rel="stylesheet">
    <link href="assets/vendor/chartsjs/Chart.min.css" rel="stylesheet">
    <link href="assets/vendor/flagiconcss/css/flag-icon.min.css" rel="stylesheet">
</head>

<body>
    <div class="wrapper">
<?php require_once 'partials/__nav_sidebar.php';?>

        <div id="body" class="active">
<?php require_once 'partials/__navigation.php' ?>


   
     <div class="content">
                <div class="container">
                    <div class="page-title">
                        <h3>Add post</h3>
                    </div>
                    <div class="row">
                        
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-header">Add post</div>
                                <div class="card-body">
                                    
<?php 
try {


if( isset($_POST['addPost'])){


    $title = htmlspecialchars(trim($_POST['title']));
    $category_id = (int)$_POST['category_id'];
    $tag_id = (int)$_POST['tag_id'];
    $featured_image = trim($_POST['featured_image']);
    $excerpt = trim($_POST['excerpt']);
    $content = trim($_POST['content']);
    $featured = (int)$_POST['featured'];
    $admin = new Admin;
   $admin -> addPost( $title , $category_id , $tag_id , $featured_image ,
     $excerpt , $content , $featured  );

}

} catch( PDOException $e ){
    echo $e -> getMessage();
}

?>


                                    <form accept-charset="utf-8" method="post" action="add-post.php">
                                        <div class="form-group row">
                                            <label class="col-sm-2" for="title">Post title</label>
                                            <div class="col-sm-10">
                                                <input type="text" name="title" placeholder="Post title" class="form-control">
                                                <small class="form-text">Enter post title</small>
                                            </div>
                                        </div>
                                         <div class="form-group row">
                                            <label class="col-sm-2" for="email">Category id </label>
                                            <div class="col-sm-10">
                                                <select name="category_id" class="form-control">
<?php 
$categories = new Admin;
foreach( $categories -> getAllBlogCategories() as $category){
?>
 <option value="<?php echo $category['id'] ?>"><?php echo $category['name'] ?></option>
<?php

}// end foreach


 ?>                                                    
                                                   
                                                 
                                                </select>
                                                <small class="form-text">Chose blog category</small>
                                            </div>
                                        </div>
                                                                              
                                        <div class="form-group row">
                                            <label class="col-sm-2" for="email">Tag id</label>
                                            <div class="col-sm-10">
                                                <select name="tag_id" class="form-control">


<?php 
$tags = new Admin;
foreach( $tags -> getAllBlogTags() as $tag){
?>
 <option value="<?php echo $tag['id'] ?>"><?php echo $tag['name'] ?></option>
<?php

}// end foreach


 ?>  
                                                 
                                                </select>
                                                <small class="form-text">Chose blog tag</small>
                                            </div>
                                        </div>
                                                                               
                                        <div class="form-group row">
                                            <label class="col-sm-2" for="featured_image">Featured image</label>
                                            <div class="col-sm-10">
                                                <input type="text" name="featured_image" placeholder="Featured image" class="form-control">
                                                <small class="form-text">Enter url for featured image</small>
                                            </div>
                                        </div>
                                                                               
                                        <div class="form-group row">
                                            <label class="col-sm-2" for="excerpt">Excerpt</label>
                                            <div class="col-sm-10">
                                                <textarea  class="form-control" cols="40" rows="10" name="excerpt"></textarea>
                                                <small class="form-text">Enter excerpt for post.</small>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2" for="content">Post content </label>
                                            <div class="col-sm-10">
                                                <textarea class="form-control" cols="40" rows="10" name="content"></textarea>
                                                <small class="form-text">Enter post content</small>
                                            </div>
                                        </div>

 <div class="form-group row">
                                            <label class="col-sm-2" for="featured">Featured</label>
                                            <div class="col-sm-10">
                                                <select name="featured" class="form-control">

 <option value="0">Post is not featured</option>
 <option value="1">Post is featured</option>
                                         
                                                </select>
                                                <small class="form-text">Featured post or not ? </small>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <div class="col-sm-10 offset-sm-2">
                                                <input type="submit" name="addPost" class="btn btn-primary">
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                       
                       
                        
                       
                    </div>
                </div>
            </div>







        </div>
    </div>
    <script src="assets/vendor/jquery/jquery.min.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/chartsjs/Chart.min.js"></script>
    <script src="assets/js/dashboard-charts.js"></script>
    <script src="assets/js/script.js"></script>
</body>

</html>