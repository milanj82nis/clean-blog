<?php 
require 'include/vendor/phpmailer/phpmailer/src/Exception.php';
require 'include/vendor/phpmailer/phpmailer/src/PHPMailer.php';
require 'include/vendor/phpmailer/phpmailer/src/SMTP.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
class User extends DbConnect {







private function checkIsEmailFormEmpty( $name , $email , $message , $subject ){

	if( !empty($name ) && !empty($email)  && !empty($message)  && !empty($subject)  ){

		return true;
	} else {
		return false;
	}

}// checkIsEmailFormEmpty

private function chekcIsValidEmail ($email){

if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
  return true;
} else {
  return false;
}

}// chekcIsValidEmail

public function sendMessage( $name , $email , $message , $subject ){


if ( $this -> checkIsEmailFormEmpty($name , $email , $message , $subject )){

if( $this -> chekcIsValidEmail($email)){
$mail = new PHPMailer(true);

try {

 //Server settings

    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.mailtrap.io';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = '3f94cc5293689a';                     //SMTP username
    $mail->Password   = 'fdb778d8ba98f1';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         //Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
    $mail->Port       = 587;                                    //TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

    //Recipients
    $mail->setFrom($email, $name);
    $mail->addAddress( 'milanj31@gmail.com', 'Milan Janković');     //Add a recipient





    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = $subject;
    $mail->Body    = $message;
    $mail->AltBody = $message;

    $mail->send();
    echo 'Message has been sent';

} catch (  PDOException $e) {
	echo $e -> getMessage();
}





} else {
	echo 'Please , enter valid email address.';
}// chekcIsValidEmail

} else {

	echo 'Please , fill all fields in form.';
}// checkIsEmailFormEmpty





}// sendMessage
private function checkIsRegisterFormEmpty(  $name , $email , $password , $password_confirmation){

if( !empty($name) && !empty($email) && !empty($password) && !empty($password_confirmation) ){
    return true;

} else {

    return false;
}


}// checkIsRegisterFormEmpty

private function checkIsEmailRegistered($email){
$sql = 'select email from users where email = ? ';

$query = $this -> connect() -> prepare ($sql );

$query -> execute([ $email]);

$emails = $query -> fetchAll();

if( count($emails ) == 0 ){

    return true;

} else {

    return false;

}

}// checkIsEmailRegistered

private function checkIsPasswordsSame($password , $password_confirmation ){
if ( $password == $password_confirmation ){

    return true;
} else {
    return false;
}

}// checkIsPasswordsSameif 



public function userRegistration( $name , $email , $password , $password_confirmation){

if ($this -> checkIsRegisterFormEmpty( $name , $email , $password , $password_confirmation)){

if( $this -> chekcIsValidEmail($email)){

if( $this -> checkIsEmailRegistered($email )){

if( $this -> checkIsPasswordsSame($password , $password_confirmation )){

$ip_address = $_SERVER['REMOTE_ADDR'];
$created_at = date( 'Y-m-d H:i:s');
$updated_at = date( 'Y-m-d H:i:s');
$hashed_password = password_hash( $password, PASSWORD_DEFAULT);

$sql = 'insert into users ( name , email , password , ip_address , created_at , updated_at ) 
 values (? , ? , ? , ? , ? , ? ) ';
$query = $this -> connect()-> prepare($sql );
$query -> execute([ $name , $email , $hashed_password , $ip_address , $created_at , $updated_at ]);

echo 'You are registered on our website.';
exit();

} else {

    echo 'Your password are not same.';

}// checkIsPasswordsSame

}else {

    echo 'Email address is already registered.';
}




} else {

echo 'Please , enter valid email address.';
}// chekcIsValidEmail



} else {

    echo 'Please , fill all fields in register form.';
}// checkIsRegisterFormEmpty

}// userRegistration






}// User


