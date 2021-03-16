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
    <title>Categories | <?php echo SITE_NAME; ?></title>

<?php require_once 'partials/__head.php' ;?>
<style type="text/css">
  
  .Icons ul {
    list-style: none;
    margin: 50px 0;
    padding: 0;
    display: flex;
    justify-content: center;
    flex-wrap: wrap;
}

.Icons ul li {
    max-width: 15%;
    flex-basis: 15%;
    margin: auto;
    text-align: center;
    margin-bottom: 20px;
}

.Icons ul li:hover a {
    color: #798687 !important
}

.Icons ul li a:last-child {
    font-size: 16px;
    font-weight: 500;
    color: #000;
    margin-top: 5px;
    display: inline-block;
}

.btn-mod {
    position: relative;
    display: block;
    overflow: hidden;
    width: 100%;
    height: 130px;
    margin: 0 auto;
    max-width: 130px;
    text-transform: uppercase;
    border: 1px solid currentColor;
    display: flex;
    justify-content: center;
    align-items: center;
    flex-direction: column;
    transition: .3s linear;
}

.btn-mod:hover {
    transform: translateY(-5px);
    box-shadow: 0 5px 5px rgba(0, 0, 0, 0.171);
}

.btn-mod img {
    transition: .3s linear;
    height: 70px;
    position: relative;
    z-index: 2;
    opacity: .8;
}

.btn-mod:hover img {
    -webkit-filter: brightness(0) invert(1);
    filter: brightness(0) invert(1);
    opacity: 1;
}

.btn-1 {
    color: #c1913a;
}

.btn-1:before,
.btn-1:after,
.btn-1 span:before,
.btn-1 span:after {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 0;
    background-color: rgba(109, 76, 14, 0.25);
    -webkit-transition: 0.4s ease-in-out;
    transition: 0.4s ease-in-out;
}

.btn-1:after,
.btn-1 span:before {
    top: auto;
    bottom: 0;
}

.btn-1 span:before,
.btn-1 span:after {
    -webkit-transition-delay: 0.4s;
    transition-delay: 0.4s;
}

.btn-1:hover {
    color: #eddfc5;
}

.btn-1:hover:before,
.btn-1:hover:after,
.btn-1:hover span:before,
.btn-1:hover span:after {
    height: 124px;
}

.btn-1:active {
    background-color: #b67e17;
}

.btn-10 {
    color: #3a416d;
}

.btn-10:before,
.btn-10:after,
.btn-10 span:before,
.btn-10 span:after {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    width: 0;
    height: 100%;
    background-color: rgba(14, 19, 50, 0.25);
    -webkit-transition: 0.4s;
    transition: 0.4s;
}

.btn-10:after,
.btn-10 span:before {
    left: auto;
    right: 0;
}

.btn-10 span:before,
.btn-10 span:after {
    -webkit-transition-delay: 0.4s;
    transition-delay: 0.4s;
}

.btn-10:hover {
    color: #c5c7d4;
}

.btn-10:hover:before,
.btn-10:hover:after,
.btn-10:hover span:before,
.btn-10:hover span:after {
    width: 250px;
}

.btn-10:active {
    background-color: #172053;
}

@-webkit-keyframes criss-cross-left {
    0% {
        left: -20px;
    }
    50% {
        left: 50%;
        width: 20px;
        height: 20px;
    }
    100% {
        left: 50%;
        width: 375px;
        height: 375px;
    }
}

@keyframes criss-cross-left {
    0% {
        left: -20px;
    }
    50% {
        left: 50%;
        width: 20px;
        height: 20px;
    }
    100% {
        left: 50%;
        width: 375px;
        height: 375px;
    }
}

@-webkit-keyframes criss-cross-right {
    0% {
        right: -20px;
    }
    50% {
        right: 50%;
        width: 20px;
        height: 20px;
    }
    100% {
        right: 50%;
        width: 375px;
        height: 375px;
    }
}

@keyframes criss-cross-right {
    0% {
        right: -20px;
    }
    50% {
        right: 50%;
        width: 20px;
        height: 20px;
    }
    100% {
        right: 50%;
        width: 375px;
        height: 375px;
    }
}

.btn-11 {
    position: relative;
    color: #576db7;
}

.btn-11:before,
.btn-11:after {
    position: absolute;
    top: 50%;
    content: '';
    width: 20px;
    height: 20px;
    background-color: #3953aa;
    border-radius: 50%;
}

.btn-11:before {
    left: -20px;
    -webkit-transform: translate(-50%, -50%);
    transform: translate(-50%, -50%);
}

.btn-11:after {
    right: -20px;
    -webkit-transform: translate(50%, -50%);
    transform: translate(50%, -50%);
}

.btn-11:hover {
    color: #ced4ea;
}

.btn-11:hover:before {
    -webkit-animation: criss-cross-left 0.8s both;
    animation: criss-cross-left 0.8s both;
    -webkit-animation-direction: alternate;
    animation-direction: alternate;
}

.btn-11:hover:after {
    -webkit-animation: criss-cross-right 0.8s both;
    animation: criss-cross-right 0.8s both;
    -webkit-animation-direction: alternate;
    animation-direction: alternate;
}
</style>
</head>

<body>

<?php require_once 'partials/__navigation.php' ?>
<?php require_once 'partials/__page_header.php' ?>





  <div class="Icons">
        <div class="container">
            <ul>
            
                
<?php  
$blog = new Blog;
$categories = $blog -> getAllCategories();

if( count($categories )> 0 ){

  foreach ( $categories as $category ){
?>
        <li>
                    <a class="btn-mod btn-11" href="category.php?id=<?php echo $category['id']?>">
                      <img src="https://img.icons8.com/carbon-copy/100/000000/trust.png"/></a>
                    <a href="category.php?slug=<?php echo $category['slug']?>"><?php echo $category['name'];?></a>
                </li>

<?php
  }// foreach

} else {

  echo '<h4>There is no any category.</h4>';
}




?>

            </ul>

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
