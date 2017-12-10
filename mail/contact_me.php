<?php
// Check for empty fields
if(empty($_POST['name'])      ||
   empty($_POST['email'])     ||
   empty($_POST['phone'])     ||
   empty($_POST['message'])   ||
   !filter_var($_POST['email'],FILTER_VALIDATE_EMAIL))
   {
   echo "No arguments Provided!";
   return false;
   }
   
$name = strip_tags(htmlspecialchars($_POST['name']));
$email_address = strip_tags(htmlspecialchars($_POST['email']));
$phone = strip_tags(htmlspecialchars($_POST['phone']));
$message = strip_tags(htmlspecialchars($_POST['message']));
   
// Create the email and send the message
$to = 'neiljgallagher@yahoo.ca'; // Add your email address inbetween the '' replacing yourname@yourdomain.com - This is where the form will send a message to.
$email_subject = "Impact Construction Contact Form:  $name";
$email_body = "You have received a new message from your website contact form.\n\n"."Here are the details:\n\nName: $name\n\nEmail: $email_address\n\nPhone: $phone\n\nMessage:\n$message";
$headers = "From: noreply@impactconstruction.com\n"; // This is the email address the generated message will be from. We recommend using something like noreply@yourdomain.com.
$headers .= "Reply-To: $email_address";
mail($to,$email_subject,$email_body,$headers);

//confirmation email
$to_confirm = $email_address;
$email_subject_confrim = "Impact Construction: We received your email!";
$email_body_confirm = "Thank you for reaching out to Impact Construction. We have received your email and will get back to you soon. \n\nThank You, \n\nNeil Gallagher \n(416)-995-6933";
$headers = "From: noreply@impactconstruction.com\n";
mail($to_confirm,$email_subject_confrim,$email_body_confirm,$headers);
return true;         
?>
