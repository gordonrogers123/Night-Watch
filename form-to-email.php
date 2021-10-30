<?php
// code for PHP form email referenced and modified from: 
// https://www.lcn.com/support/articles/how-to-create-an-email-form-with-php/

#Receive user input
$name = $_POST['name'];
$email = $_POST['email'];
$comment = $_POST['comment'];

#Filter user input
function filter_email_header($form_field) {  
return preg_replace('/[nr|!/<>^$%*&]+/','',$form_field);
}

$email  = filter_email_header($email);

#Send email
$headers = "From: $email";
$sent = mail('gordon.rogers@night-watch.us', 'Feedback Form Submission', $comment, $headers);

#Thank user or notify them of a problem
if ($sent) {

?><html>
<head>
<title>Thank You</title>
</head>
<body>
<h1>Thank You</h1>
<p>Thank you for your feedback.</p>
</body>
</html>
<?php

} else {

?><html>
<head>
<title>Something went wrong</title>
</head>
<body>
<h1>Something went wrong</h1>
<p>We could not send your feedback. Please try again.</p>
</body>
</html>
<?php
}
?>