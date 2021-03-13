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
    <title>Blog posts | <?php echo SITE_NAME ?></title>
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
                        <h3>Blog posts</h3>
                    </div>
                    <div class="row">
                          <div class="col-md-12 col-lg-12">
                            <div class="card">
                                <div class="card-header">Blog posts</div>
                                <div class="card-body">
                                    <p class="card-title"></p>
                                   
<?php 
try {

$posts = new Admin;
if (count( $posts -> getAllPosts() )> 0 ) {

?>
         <table class="table table-hover" id="dataTables-example" width="100%">
                                        <thead>
                                             <tr>
                                        <th>Title</th>
                                        <th>Slug</th>
                                        <th>Views</th>
                                        <th>Created at</th>
                                        <th>Featured</th>
                                        <th></th>
                                    </tr>
                                        </thead>
                                        <tbody>  
<?php

    foreach ( $posts -> getAllPosts() as $post ){
?>
                                     <tr>
                                        <td><?php echo $post['title'];?></td>
                                        <td><?php echo $post['slug'];?></td>
                                        <td> <?php echo $post['views'];?></td>
                                        <td><?php echo $post['created_at']; ?></td>
                                        <td>
<?php
if($post['featured'] == 1 ){
    echo 'Featured';
} else {
    echo 'Not featured';
}


?>
                                        </td>

                                        <td class="text-right">
                                            <a href="" class="btn btn-outline-info btn-rounded"><i class="fas fa-pen"></i></a>
                                            <a href="" class="btn btn-outline-danger btn-rounded"><i class="fas fa-trash"></i></a>
                                        </td>
                                    </tr>
                                  
<?php
}// end foreach

} else {
   echo 'There is no posts.';
}






} catch ( PDOException $e ){
    echo $e -> getMessage();
}


 ?>


                                           
                                        </tbody>
                                    </table>
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