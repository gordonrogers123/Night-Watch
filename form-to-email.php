<?php
// code for PHP form email referenced and modified from: 
// https://www.lcn.com/support/articles/how-to-create-an-email-form-with-php/

if($_POST["submit"]) {
    $recipient="gordon.rogers@night-watch.us";
    $subject="UFO Reporting Form Submission";
    $sender=$_POST["name"];
    $senderEmail=$_POST["email"];
    $message=$_POST["comment"];

    $mailBody="Name: $sender\nEmail: $senderEmail\n\n$message";

    mail($recipient, $subject, $mailBody, "From: $sender <$senderEmail>");

    $thankYou="<p>Thank you! Your message has been sent.</p>";
}
?>