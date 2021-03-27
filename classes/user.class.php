<?php 
require_once 'include/recaptchalib.php';
require 'include/vendor/phpmailer/phpmailer/src/Exception.php';
require 'include/vendor/phpmailer/phpmailer/src/PHPMailer.php';
require 'include/vendor/phpmailer/phpmailer/src/SMTP.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require_once 'include/vendor/plasticbrain/php-flash-messages/src/FlashMessages.php';


class User extends DbConnect {

private function checkIsUpdateUserFormEmpty($name , $email , $website_url , $about_me , $phone , $street , $city , $state , $postal_code){

    if( !empty($name ) && !empty($email)  && !empty($website_url)  && !empty($about_me) && !empty($phone) && !empty($street) && !empty($state) && !empty($postal_code)  ){

        return true;
    } else {
        return false;
    }




}// checkIsUpdateUserFormEmpty

public function updateMyProfile($name , $email , $website_url , $about_me , $phone , $street , $city , $state , $postal_code ){

if( $this -> checkIsUpdateUserFormEmpty($name , $email , $website_url , $about_me , $phone , $street , $city , $state , $postal_code)) {

if( $this -> checkIsEmailRegistered($email)){

if( $this -> chekcIsValidEmail($email)){

$user_id = (int)$_SESSION['user_id'];
$sql = 'update users set name = :name , email = :email , website_url = :website_url , 
about_me = :about_me , phone = :phone , street = :street , city = :city ,state = :state ,postal_code = :postal_code  where id = :id limit 1 ';

$query = $this -> connect() -> prepare($sql);
$query -> bindValue( ':name' , $name );
$query -> bindValue( ':email' , $email );
$query -> bindValue( ':website_url' , $website_url );
$query -> bindValue( ':about_me' , $about_me );
$query -> bindValue( ':phone' , $phone );
$query -> bindValue( ':street' , $street );
$query -> bindValue( ':city' , $city );
$query -> bindValue( ':state' , $state );
$query -> bindValue( ':postal_code' , $postal_code );
$query -> bindValue( ':id' , $user_id );

$query -> execute();

header('Location:my-account.php');

           $msg = new \Plasticbrain\FlashMessages\FlashMessages();
        $msg->success('Your account is updated.');
         


} else {
           $msg = new \Plasticbrain\FlashMessages\FlashMessages();
        $msg->error('Please , enter enter valid email address.');
         
}
} else{
          $msg = new \Plasticbrain\FlashMessages\FlashMessages();
        $msg->error('Email address is already taken.');
      
}
} else {

        $msg = new \Plasticbrain\FlashMessages\FlashMessages();
        $msg->error('Please , fill all fields in form.');
 
}

}// updateMyProfile


public function userLogout(){
    if( isset($_SESSION['logged'])){
    session_destroy();
    header('Location:index.php');
        $msg = new \Plasticbrain\FlashMessages\FlashMessages();
        $msg->success('You successfully logged out for our webiste.');
     

    }// main isset

}// userLogout


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

$secretkey = "RECAPTCHA_SECRET_KEY";
$response = $_POST["g-recaptcha-response"];
$verify = new recaptchalib($secretkey, $response);

if ($verify->isValid() == false) {
// What happens when the CAPTCHA was entered incorrectly

 $msg = new \Plasticbrain\FlashMessages\FlashMessages();
    $msg->error('The reCAPTCHA wasn\'t entered correctly. Go back and try it again.');

header('Refresh:5;url=contact.php');
} else {



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

    $msg = new \Plasticbrain\FlashMessages\FlashMessages();
    $msg->success('Message has been sent');
 

} catch (  PDOException $e) {
	echo $e -> getMessage();
}

} else {
        $msg = new \Plasticbrain\FlashMessages\FlashMessages();
    $msg->error('Please , enter valid email address.');
 
}// chekcIsValidEmail

} else {
  $msg = new \Plasticbrain\FlashMessages\FlashMessages();
    $msg->error('Please , fill all fields in form..');
	
}// checkIsEmailFormEmpty


}// send message


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


$secretkey = "RECAPTCHA_SECRET_KEY";
$response = $_POST["g-recaptcha-response"];
$verify = new recaptchalib($secretkey, $response);

if ($verify->isValid() == false) {
// What happens when the CAPTCHA was entered incorrectly

 $msg = new \Plasticbrain\FlashMessages\FlashMessages();
    $msg->error('The reCAPTCHA wasn\'t entered correctly. Go back and try it again.');

header('Refresh:5;url=register.php');
} else {


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
  $msg = new \Plasticbrain\FlashMessages\FlashMessages();
    $msg->success('You are registered on our website.');
    


} else {
 $msg = new \Plasticbrain\FlashMessages\FlashMessages();
    $msg->error('Your passwords are not same..');
   

}// checkIsPasswordsSame

}else {
 $msg = new \Plasticbrain\FlashMessages\FlashMessages();
    $msg->error('Email address is already registered.');
    
}




} else {
 $msg = new \Plasticbrain\FlashMessages\FlashMessages();
    $msg->error('Please , enter valid email address.');
    

}// chekcIsValidEmail



} else {
 $msg = new \Plasticbrain\FlashMessages\FlashMessages();
    $msg->error('Please , fill all fields in register form.');
    
  
}// checkIsRegisterFormEmpty
}// validateRecaptcha
}// userRegistration

private function checkIsLoginFormEmpty($email , $password ){

    if( !empty($email )&& !empty($password )){
        return true;
    } else {
        return false;
    }

}// checkIsLoginFormEmpty
public function userLogin($email , $password ){


$secretkey = "RECAPTCHA_SECRET_KEY";
$response = $_POST["g-recaptcha-response"];
$verify = new recaptchalib($secretkey, $response);

if ($verify->isValid() == false) {
// What happens when the CAPTCHA was entered incorrectly

 $msg = new \Plasticbrain\FlashMessages\FlashMessages();
    $msg->error('The reCAPTCHA wasn\'t entered correctly. Go back and try it again.');

header('Refresh:3;url=login.php');
} else {


if( $this -> checkIsLoginFormEmpty($email , $password )){

if( $this -> chekcIsValidEmail($email)){

$sql = 'select * from users where email = ? and active = ? and banned = ? ';
$query = $this -> connect()-> prepare($sql);
$query -> execute([$email , 1 , 0 ]);
$results = $query -> fetchAll();

if( count($results) > 0 ){

foreach ($results as $result ) {
        
        $hashed_password = $result['password'];

if( password_verify($password , $hashed_password)){
$_SESSION['logged'] = 1 ;
$_SESSION['user_id']= $result['id'];
$_SESSION['name']= $result['name'];
$_SESSION['email']= $result['email'];
$_SESSION['is_admin']= $result['is_admin'];
$_SESSION['banned']= $result['banned'];
$_SESSION['active']= $result['active'];
$_SESSION['ip_address']= $result['ip_address'];
$_SESSION['featured_image']= $result['featured_image'];
header('Refresh:5;URL=' . $_SERVER['HTTP_REFERER']);
 $msg = new \Plasticbrain\FlashMessages\FlashMessages();
    $msg->success('You are logged');
   


} else {
 $msg = new \Plasticbrain\FlashMessages\FlashMessages();
    $msg->error('Wrong email or password.Please try again.');
    
}

}

} else {
     $msg = new \Plasticbrain\FlashMessages\FlashMessages();
    $msg->error('There is no account associated with that email address');   
}
} else {
     $msg = new \Plasticbrain\FlashMessages\FlashMessages();
    $msg->error('Please , enter valid email address.');

}// chekcIsValidEmail
} else {
         $msg = new \Plasticbrain\FlashMessages\FlashMessages();
       $msg->error('Please , fill all fields in login form.');
   
}// checkIsLoginFormEmpty

}


}// userLogin

public function passwordReset($email){


$secretkey = "RECAPTCHA_SECRET_KEY";
$response = $_POST["g-recaptcha-response"];
$verify = new recaptchalib($secretkey, $response);

if ($verify->isValid() == false) {
// What happens when the CAPTCHA was entered incorrectly

 $msg = new \Plasticbrain\FlashMessages\FlashMessages();
    $msg->error('The reCAPTCHA wasn\'t entered correctly. Go back and try it again.');

header('Refresh:5;url=password-reset.php');
} else {


if( $this -> chekcIsValidEmail($email)){


$sql = 'select email from users where email = ? ' ;

$query = $this -> connect() -> prepare($sql );

$query -> execute([ $email ]);

$results = $query -> fetchAll();

if ( count($results )> 0 ){

    $chars = 'qwertzuiopasdfghjklyxcvbnm,.-!#$%&/()=?*QWERTZUIOPASDFGHJKLYXCVBNM';
    $password = substr( str_shuffle($chars) , 6 , 10 );

    $hashed_password = password_hash($password , PASSWORD_DEFAULT );
 
    $sql = 'update users set password = ? where email = ? ';

    $query = $this -> connect() -> prepare($sql);

    $query -> execute([ $hashed_password , $email]);

         $msg = new \Plasticbrain\FlashMessages\FlashMessages();

       $msg->success('Your password is sent on your email address');
   
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
    $mail->setFrom('milanj31@gmail.com', 'Milan Janković');
    $mail->addAddress($email );     //Add a recipient


$subject = 'Password reset';
$message = 'Your new password is : ' . $password;

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = $subject;
    $mail->Body    = $message;
    $mail->AltBody = $message;

    $mail->send();
    

} catch (  PDOException $e) {
    echo $e -> getMessage();
}

}else {
         $msg = new \Plasticbrain\FlashMessages\FlashMessages();

       $msg->error('This email address is not associated with any account');
   
    
}
} else {
         $msg = new \Plasticbrain\FlashMessages\FlashMessages();

       $msg->error('Please , provide valid email address.');
   
   
}
}// recaptcha validation

}// passwordReset


public function checkIsUserLoggedIn(){
    if( isset($_SESSION['logged'])){
        return true;
    } else {
        return false;
    }

}// checkIsUserLoggedIn


public function checkIsUserAdmin(){

    if($_SESSION['is_admin'] == 1 ){
        return true;
    } else {
        return false;
    }

}// checkIsUserAdmin


public function getUserDetails($id){

    $sql = 'select * from users where id = ? limit 1 ';

    $query = $this -> connect() -> prepare($sql );

    $query -> execute([ $id]);

    $user = $query-> fetch();

    if(!$user ){
        header('Location:users.php');
        exit();
    }

    return $user;


}// getUserDetails


public function registeredUsers(){

    $sql =  'select * from users ';

    $query = $this-> connect() -> query  ( $sql );

    $users = $query -> fetchAll();

    return $users;
}// registeredUsers








}// User


