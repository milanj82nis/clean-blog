<?php 

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

	echo 'Category is added.';

} else {

echo 'This category is in database.';

} // checkIsCategoryExits



} else {
	echo 'Please , fill all fields in form.';
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

	echo 'Tag is added.';

} else {

echo 'This tag is in database.';

} // checkIsCategoryExits



} else {
	echo 'Please , fill all fields in form.';
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

echo 'User is added.';

} else {
	echo 'This email already registered.';
}

}else {
	echo 'Your passwords need to be same.';
}// checkIfPasswordsSame

}else  {
	echo 'Please , enter valid email address.';
} // checkIsEmailValid

} else {

	echo 'Please , fill all fields in form.';
}// checkIsUsersFormEmpty

}// addUser

public function getAllRegisteredUsers(){

$sql = 'select * from users order by created_at desc';
$query = $this -> connect() -> query($sql);

$users = $query -> fetchAll();
return $users;
}// 











}// Admin





