<?php 
require_once '../include/vendor/plasticbrain/php-flash-messages/src/FlashMessages.php';

class Admin extends DbConnect{

public function checkIsUserAdmin(){

	if($_SESSION['is_admin'] == 1 ){
		return true;
	} else {
		return false;
	}

}// checkIsUserAdmin


public function getAllBlogCategories(){
	$sql = 'select * from categories order by created_at desc';
	$query = $this -> connect() -> query($sql);

	$categories = $query -> fetchAll();
	return $categories;
}// getAllBlogCategories

private function checkIsAllCategoryFieldsNotEmpty($name  ){

	if( !empty($name)){
		return true;
	} else {
		return false;
	}

}// checkIsAllCategoryFieldsNotEmpty

private function checkIsCategoryExits($name){
$sql = 'select name from categories where name = ? ';
$query = $this -> connect() -> prepare($sql);
$query -> execute([ $name ]);
$results = $query -> fetchAll();
if( count($results)== 0 ){
	return true;
}else {
	return false;
}

}// checkIsCategoryExits

private function create_slug($string){

	$slug = preg_replace( '/[^A-Za-z0-9-]+/', '-', $string);
	return $slug;

}// create_slug


public function addCategory($name ){

if( $this -> checkIsAllCategoryFieldsNotEmpty($name)){


if( $this -> checkIsCategoryExits($name)){

$slug =  $this -> create_slug($name);


$created_at = date('Y-m-d H:i:s');
$updated_at = date( 'Y-m-d H:i:s');
	$sql = 'insert into categories ( name , slug , created_at , updated_at ) 
	values( ? , ? , ? , ? )';

	$query = $this -> connect() -> prepare($sql);
	$query -> execute([ $name , $slug , $created_at , $updated_at]);


    $msg = new \Plasticbrain\FlashMessages\FlashMessages();
    $msg->success('Category is added.');
 
} else {


 $msg = new \Plasticbrain\FlashMessages\FlashMessages();
    $msg->error('This category is in database.');
} // checkIsCategoryExits



} else {
	 $msg = new \Plasticbrain\FlashMessages\FlashMessages();
    $msg->error('Please , fill all fields in form.');
}// checkIsAllCategoryFieldsNotEmpty

}// addCategory

private function checkIsTagExist($name){
$sql = 'select name from tags where name = ? ';
$query = $this -> connect() -> prepare($sql);
$query -> execute([ $name ]);
$results = $query -> fetchAll();
if( count($results)== 0 ){
	return true;
}else {
	return false;
}

}// checkIsTagExist


public function addTag($name ){

if( $this -> checkIsAllCategoryFieldsNotEmpty($name)){


if( $this -> checkIsTagExist($name)){

$slug =  $this -> create_slug($name);


$created_at = date('Y-m-d H:i:s');
$updated_at = date( 'Y-m-d H:i:s');
	$sql = 'insert into tags ( name , slug , created_at , updated_at ) 
	values( ? , ? , ? , ? )';

	$query = $this -> connect() -> prepare($sql);
	$query -> execute([ $name , $slug , $created_at , $updated_at]);

	
	
	 $msg = new \Plasticbrain\FlashMessages\FlashMessages();
    $msg->success('Tag is added.');
} else {
	 
	 $msg = new \Plasticbrain\FlashMessages\FlashMessages();
    $msg->error('This tag is in database.');


} // checkIsCategoryExits



} else {	 
	$msg = new \Plasticbrain\FlashMessages\FlashMessages();
    $msg->error('Please , fill all fields in form.');
	
}// checkIsAllCategoryFieldsNotEmpty

}// addCategory




public function getAllBlogTags(){
	$sql = 'select * from tags order by created_at desc';
	$query = $this -> connect() -> query($sql);

	$tags = $query -> fetchAll();
	return $tags;
}// getAllBlogCategories
private function checkIsUsersFormEmpty($name , $email , $password , $password_confirmation ,
 $active , $is_admin ){
if( !empty($name) && !empty($email) && !empty($password) && !empty($password_confirmation) && !empty($active) && !empty($is_admin)   ){
return true;

}else {
	return false;
}

}// 

private function checkIsEmailValid($email){
if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
  return true;
} else {
  return false;
}

}// checkIsEmailValid
private function checkIfPasswordsSame($password , $password_confirmation ){
if( $password == $password_confirmation){
	return true;
} else {
	return false;
}

}// checkIfPasswordsSame

private function checkIsEmailExistsInDb($email){

$sql = 'select email from users where email = ? ';
$query = $this -> connect() -> prepare($sql);
$query -> execute([$email]);
$results = $query -> fetchAll();
if(count($results) == 0 ){
	return true;
} else {
	return false;
}
}// checkIsEmailExistsInDb


public function addUser($name , $email , $password , $password_confirmation ,
 $active , $is_admin ){

if( $this -> checkIsUsersFormEmpty($name , $email , $password , $password_confirmation ,
 $active , $is_admin )){

if( $this -> checkIsEmailValid($email)){
if( $this -> checkIfPasswordsSame($password , $password_confirmation)){
if( $this -> checkIsEmailExistsInDb($email)){

$hashed_pasword = password_hash( $password , PASSWORD_DEFAULT);
$created_at = date('Y-m-d H:i:s');
$updated_at = date('Y-m-d H:i:s');
$slug =  $this -> create_slug($name);

$sql = 'insert into users ( name , email , slug , password , active , is_admin , created_at , updated_at ) values (? , ? , ? , ? , ? , ? , ? , ?) ';

$query = $this -> connect()-> prepare($sql);
$query -> execute([$name , $email , $slug , $hashed_pasword , $active , $is_admin , $created_at , $updated_at ]);


	$msg = new \Plasticbrain\FlashMessages\FlashMessages();
    $msg->success('User is added.');
	
} else {
	$msg = new \Plasticbrain\FlashMessages\FlashMessages();
    $msg->error('User is added.');
	echo 'This email already registered.';
}

}else {
	$msg = new \Plasticbrain\FlashMessages\FlashMessages();
    $msg->error('Your passwords need to be same.');
}// checkIfPasswordsSame

}else  {
	$msg = new \Plasticbrain\FlashMessages\FlashMessages();
    $msg->error('Please , enter valid email address');
} // checkIsEmailValid

} else {
$msg = new \Plasticbrain\FlashMessages\FlashMessages();
    $msg->error('Please , fill all fields in form.');
}// checkIsUsersFormEmpty

}// addUser

public function getAllRegisteredUsers(){

$sql = 'select * from users order by created_at desc';
$query = $this -> connect() -> query($sql);

$users = $query -> fetchAll();
return $users;
}// 


public function getAllPosts(){

$sql = 'select * from posts order by created_at desc';
$query = $this -> connect() -> query($sql);

$posts = $query -> fetchAll();
return $posts;
}// 

private function checkIsPostFormEmpty($title , $category_id , $tag_id , $featured_image ,
     $excerpt , $content , $featured ){
if( !empty($title) &&  !empty($category_id) && !empty($tag_id) && !empty($featured_image) && !empty($excerpt) && !empty($content) && !empty($featured) ){

return true;
} else {
	return false;
}

}// checkIsPostFormEmpty

private function checkIsTitleExitsInPosts($title){
$sql = 'select title from posts where title = ? ';
$query = $this -> connect() -> prepare($sql);
$query -> execute([$title]);
$titles = $query -> fetchAll();
if( count($titles ) == 0 ){
	return true;
} else {
	return false;
}
}// checkIsTitleExitsInPosts
public function addPost($title , $category_id , $tag_id , $featured_image ,
     $excerpt , $content , $featured ){
if($this -> checkIsPostFormEmpty($title , $category_id , $tag_id , $featured_image ,
     $excerpt , $content , $featured )){

if($this -> checkIsTitleExitsInPosts($title)){
$created_at = date('Y-m-d H:i:s');
$updated_at = date( 'Y-m-d H:i:s');
$slug =   $this -> create_slug($title);
$user_id = (int)$_SESSION['user_id'];

$sql = 'insert into posts ( title , slug , user_id , category_id , tag_id , excerpt , content , featured , featured_image , created_at , updated_at , views , soft_deleted ) values 
( ? , ? , ? , ? , ? , ? , ? , ? , ? , ? , ? , ? , ? )';
$query = $this -> connect() -> prepare($sql);
$query -> execute([ $title , $slug , $user_id , $category_id , $tag_id , $excerpt , $content , $featured , $featured_image , $created_at , $updated_at , 0 , 0 ]);



$msg = new \Plasticbrain\FlashMessages\FlashMessages();
    $msg->success('Posts is aded in database.');
} else{
	$msg = new \Plasticbrain\FlashMessages\FlashMessages();
    $msg->error('Please, change your title.');
}// checkIsTitleExitsInPosts

} else{
	$msg = new \Plasticbrain\FlashMessages\FlashMessages();
    $msg->error('Please , fill all fields in form.');

}// checkIsPostFormEmpty




}// addPost






}// Admin





