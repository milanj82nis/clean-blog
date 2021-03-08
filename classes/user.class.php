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


}// User


