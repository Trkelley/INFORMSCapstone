<!-- THIS FILE CONTAINS THE EMAIL FUNCTION FOR THIS PROJECT THAT WILL SEND AN EMAIL TO AN INFORMS ADMINISTRATOR WHEN A UNIVERSITY ADMINISTRATOR MAKES CHANGES TO PROGRAMS WITHIN THEIR UNIVERSITY.  -->
<!-- ISSUES: We were never able to get an SMTP server set up on our Windows machines, therefore, we were never able to test this file. -->
<!-- Despite these issues, this code should work once an SMTP is set up. This can be done within the "php.ini" file within the [Mail Function] section of the file. -->

<!-- SENDING AN HTML EMAIL TO AN INFORMS ADMINISTRATOR -->
<?php
require('conn.php');

// Email headers
$to = "informsmsc@bama.informs.org"; // Defines who the email will be sent to.
$subject = "Program Information Changes for '.$institutionName.' - Submission Notification"; // Defines the subject of the email.
$from = "informsmsc@bama.informs.org"; // Defines who the email is from. 

// Dependent data needed for the email
$programName = $_POST['ProgramName'];
$institutionName = $_POST['InstitutionName'];
$contactName = $_POST['ContactName'];

//To send HMTL mail, the Content-type header must be set
$headers = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";

//Other Email headers
$headers .= 'From: '.$from."\r\n".
    'Reply-To: '.$from."\r\n" .
    'X-Mailer: PHP/' . phpversion();

// Email body
$message = "
<html>
<head>
<img class='irc_mi' src='https://www.informs.org/var/ezflow_site/storage/images/media/or-ms-today/images/0217/new-informs-logo2/3648939-1-eng-US/New-INFORMS-logo.jpg' onload='typeof google==='object'&amp;&amp;google.aft&amp;&amp;google.aft(this)' width='350' height='75' alt='Image result for Informs'>
</head>
<body>
<p>Hello '.$contactName.',</p>
<p>Changes have been made to the '.$programName.' program at '.$institutionName.'</p>
<p>Please <a href='http://bama.informs.org/INFORMSCapstone/login.php'>Click Here</a> or click the link below to be taken to your administrator page to review the submitted changes.</p>
<a href='http://bama.informs.org/INFORMSCapstone/login.php'></a>
<p>This message is automated. Please do not reply.</p>
</body>
</html>";

// This method sends the finalized email. 
mail($to,$subject,$message,$headers);

?>
