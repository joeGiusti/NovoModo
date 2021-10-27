<?php
if(isset($_POST['email'])) {
 
    $email_to = "JGiust4@WGU.edu";
    $email_subject = "Your customer has sent you a message";
 
    function died($error) {

        echo "We are very sorry, but there were error(s) found with the form you submitted. ";
        echo "These errors appear below.<br /><br />";
        echo $error."<br /><br />";
        echo "Please go back and fix these errors.<br /><br />";
        die();
    }
 
    if(!isset($_POST['name']) ||
        !isset($_POST['email']) ||
        !isset($_POST['message'])) {
        died('We are sorry, but there appears to be a problem with the form you submitted.');       
    }

    $name = $_POST['name'];
    $email_from = $_POST['email'];
    $phone = $_POST['phone'];
    $message = $_POST['message'];
 
    $error_message = "";
    $email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';
 
  if(!preg_match($email_exp,$email_from)) {
    $error_message .= 'The Email Address you provided does not appear to be valid.<br />';
  }
 
    $string_exp = "/^[A-Za-z .'-]+$/";
 
  if(!preg_match($string_exp,$name)) {
    $error_message .= 'The Name you entered does not appear to be valid.<br />';
  }
 
   
  if(strlen($message) < 1) {
    $error_message .= 'The Comments you entered do not appear to be valid.<br />';
  }
 
  if(strlen($error_message) > 0) {
    died($error_message);
  }
 
    $email_message = "Form details below.\n\n";
 
     
    function clean_string($string) {
      $bad = array("content-type","bcc:","to:","cc:","href");
      return str_replace($bad,"",$string);
    }
 
     
 
    $email_message .= "First Name: ".clean_string($name)."\n";
    $email_message .= "Email: ".clean_string($email_from)."\n";
    $email_message .= "Phone: ".clean_string($phone)."\n";
    $email_message .= "Message: ".clean_string($message)."\n";
 

$headers = 'From: '.$email_from."\r\n".
'Reply-To: '.$email_from."\r\n" .
'X-Mailer: PHP/' . phpversion();
@mail($email_to, $email_subject, $email_message, $headers);  
?>
 


<!-- HTML TO PAGE AFTER SENDING MAIL -->


 
<!doctype html>
    <html language=en>
        
    <head>
        <title>NOVO MODO</title>
        <meta name="description" content="xxx">

        <link rel="shortcut icon" href="Images/favicon.png" type="image/x-icon">
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width">
        <link rel="stylesheet" type="text/css" href="Styles/general.css">
        <link rel="stylesheet" type="text/css" href="Styles/email.css">
        
        <script src="JavaScript/jquery-3.6.0.min.js"></script>
    </head>
        
    <body>
        
        <div class="container">
            <div class="text">
                <h1>Thank you for contacting us!</h1>
                <p>While you are waiting for our response you can check out our social media!</p>
                <a href="index.html" class="mainbtn"><p>Go back to our website</p></a>
            </div>
        </div>
        
    </body>

        

<?php
 
}
?>