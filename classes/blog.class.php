<?php 

class Blog extends DbConnect{

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







}// Blog