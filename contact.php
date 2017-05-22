<?php
require_once "PHPMailer/class.phpmailer.php";
require_once "PHPMailer/class.smtp.php";

$fname = $_POST['fname'];
$lname = $_POST['lname'];
$email = $_POST['email'];
$message = $_POST['message'];
$subject = $_POST['subject'];
$human = $_POST['human'];



$mail = new PHPMailer;
//Set PHPMailer to use SMTP.
$mail->IsMAIL(); 
//Enable SMTP debugging. 
$mail->DebugOutput = 'html';                                          
//Set SMTP host name                         
$mail->Host = "smtp.google.com";
$mail->Username = "nikoschristomanos@gmail.com";
$mail->Password = "Asimakis11061985";
//Set this to true if SMTP host requires authentication to send email
$mail->SMTPAuth = true;
                                         
//If SMTP requires TLS encryption then set it
$mail->SMTPSecure = 'tls';
//Provide username and password     
                             
//Set TCP port to connect to 
 $mail->Port = 465;                                    


$mail->setFrom($email,$fname);
$mail->AddReplyTo($email,$fname);


$mail->AddAddress("nikoschristomanos@gmail.com","nikos") ;

$mail->isHTML(true);

$mail->Subject = $subject;
$mail->Body = $fname."</br>".
              $lname."</br>".
			  $message."</br>";
			  
if(!$mail->send() ^ $_POST['human']!= 5 )
{
    echo "Mailer Error: " . $mail->ErrorInfo;
	?><a href="index.php#footer">TRY AGAIN</a><?php
} 
else 
{
    echo "Message has been sent successfully";
	?><a href="index.php">GO BACK</a><?php
}

?>