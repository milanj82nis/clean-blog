<?php 

class Blog extends DbConnect{

public function getAllBlogPosts(){

$sql = 'select * from posts order by created_at desc';
$query = $this -> connect() -> query($sql);
$posts = $query -> fetchAll();
return $posts;

}// getAllBlogPosts




}// Blog