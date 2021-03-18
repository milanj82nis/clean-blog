<?php 

class Blog extends DbConnect{


public function removeFromFavouritePosts($post_id){


$user_id = (int)$_SESSION['user_id'];
$sql = 'delete  from favourite_posts where post_id = ? and user_id = ? ';
$query =  $this -> connect() -> prepare($sql );
$query -> execute([ $post_id , $user_id ]);
header('Location:' . $_SERVER['HTTP_REFERER']);
exit();


}// removeFromFavouritePosts





public function checkIsPostInFavouritePosts($post_id ){

$user_id = (int)$_SESSION['user_id'];
$sql = 'select * from favourite_posts where post_id = ? and user_id = ? ';
$query =  $this -> connect() -> prepare($sql );
$query -> execute([ $post_id , $user_id ]);
$results =  $query -> fetchAll();
if( count($results ) == 0 ){

return true;

} else {

    return false;
}

}// checkIsPostInFavouritePosts

public function addToFavouritePosts($post_id ){
	$user_id = (int)$_SESSION['user_id'];

$sql = 'insert into favourite_posts ( post_id , user_id ) values ( ? , ? )';
$query = $this -> connect() -> prepare  ( $sql );
$query -> execute([ $post_id , $user_id]);

echo 'Added to favourite posts.';
header('Location:' . $_SERVER['HTTP_REFERER']);
exit();

}// addToFavouritePosts




public function getAllCategoryPosts($category_id ){



	$page = isset($_GET['page']) ? (int)$_GET['page'] : 1 ;

	$perPage = isset($_GET['per-page'])  && $_GET['per-page'] <= 5  ? (int)$_GET['per-page'] : 5 ;


	$start = ( $page > 1 ) ? ($page * $perPage ) - $perPage : 0 ;
	

 	$sql = 'select  * from posts where category_id = :category_id order by created_at desc  LIMIT :start, :perpage';

 	$query = $this-> connect() -> prepare  ( $sql );

 	$query->bindParam(':category_id', $category_id, PDO::PARAM_INT);
 	$query->bindParam(':start', $start, PDO::PARAM_INT);
 	$query->bindParam(':perpage', $perPage, PDO::PARAM_INT);

 	$query -> execute(  );

 	$posts = $query -> fetchAll();


 	$sql = 'select * from posts where category_id = ? ';
 	$query = $this -> connect() -> prepare( $sql );
 	$query ->  execute([ $category_id]);
 	$posts_count = $query -> fetchAll();
 	 $allPosts = count($posts_count);
$pages = ceil($allPosts / $perPage);


return array('pages' => $pages, 'posts' => $posts ,'per-page' => $perPage);
}// getAllCategoryPosts


public function getAllBlogPosts(){


	$page = isset($_GET['page']) ? (int)$_GET['page'] : 1 ;

	$perPage = isset($_GET['per-page'])  && $_GET['per-page'] <= 5  ? (int)$_GET['per-page'] : 5 ;


	$start = ( $page > 1 ) ? ($page * $perPage ) - $perPage : 0 ;
	

 	$sql = 'select  * from posts order by created_at desc  LIMIT :start, :perpage';

 	$query = $this-> connect() -> prepare  ( $sql );

 	$query->bindParam(':start', $start, PDO::PARAM_INT);
 	$query->bindParam(':perpage', $perPage, PDO::PARAM_INT);

 	$query -> execute(  );

 	$posts = $query -> fetchAll();


 	$sql = 'select * from posts ';
 	$query = $this -> connect() -> query( $sql );
 	$posts_count = $query -> fetchAll();
 	 $allPosts = count($posts_count);
$pages = ceil($allPosts / $perPage);


return array('pages' => $pages, 'posts' => $posts ,'per-page' => $perPage);
}// getAllBlogPosts


public function getPostContent($slug){


	$sql = 'select * from posts where slug = ? ';
	$query = $this -> connect() -> prepare($sql);
	$query -> execute([ $slug ]);

	$post = $query -> fetch();
if( !$post){

	header('Location:index.php');
	exit();
}else {
	return $post;
}

	return $post;

}// getPostContent

public function getCategoryDetails($id){
	$sql = 'select * from categories where id = ? ';
	$query = $this -> connect() ->prepare  ( $sql );
	$query -> execute([ $id]);
	$category = $query -> fetch();
	return $category;

}// getCategoryDetails


public function getTagDetails($id){
	$sql = 'select * from tags where id = ? ';
	$query = $this -> connect() ->prepare  ( $sql );
	$query -> execute([ $id]);
	$tag = $query -> fetch();
	return $tag;

}// getTagDetails

public function getAllCategories(){

	$sql = 'select * from categories order by name asc ';
	$query = $this -> connect() -> query($sql);
	$categories = $query -> fetchAll();
	return $categories;

}// getAllCategories







}// Blog