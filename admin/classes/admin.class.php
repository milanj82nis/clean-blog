<?php 

class Admin extends DbConnect{

public function checkIsUserAdmin(){

	if($_SESSION['is_admin'] == 1 ){
		return true;
	} else {
		return false;
	}

}// checkIsUserAdmin



}// Admin





