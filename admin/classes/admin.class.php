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





}// Admin





