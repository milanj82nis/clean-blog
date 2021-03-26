<?php 

class Message extends DbConnect { 

public function getAllUsersWithMessagesSentToMe(){

	$to_user = (int)$_SESSION['user_id'];
	$sql = 'select * from messages where to_user = :to_user group by from_user order by created_at desc';
	$query = $this -> connect() -> prepare( $sql );
	$query -> bindValue( ':to_user' , $to_user );
	$query -> execute();
	$users = $query -> fetchAll();
	return $users;


}// getAllUsersWithMessagesSentToMe


public function getAllUserMessages($from_user){

	$to_user = (int)$_SESSION['user_id'];

	$sql = 'select * from messages where from_user = :from_user or to_user = :to_user order by created_at desc ';
	$query = $this -> connect() -> prepare($sql);
	$query -> bindValue( ':from_user' , $from_user );
	$query -> bindValue( ':to_user' , $from_user );
	$query -> execute();
	$userMessages = $query -> fetchAll();
	return $userMessages;



}// getAllusersMessages


public function sendMessage($message , $to_user , $from_user , $created_at){

$sql = 'insert into messages ( from_user , to_user , message , created_at ) values ( :from_user , :to_user , :message , :created_at )';
$query = $this -> connect() -> prepare($sql);

$query -> bindValue( ':from_user' , $from_user );
$query -> bindValue( ':to_user' , $to_user );
$query -> bindValue( ':message' , $message );
$query -> bindValue( ':created_at' , $created_at );
$query -> execute();

header('Location:messages.php?from_user=' . $to_user );


}// sendMessage



}// Message

