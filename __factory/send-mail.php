<?php
# include send mail class
require("../__config/core.php");

# request form data
$sender_name = $_REQUEST['senderName'];
$sender_email = $_REQUEST['senderEmail'];
$sender_subject = $_REQUEST['senderSubject'];
$sender_message = $_REQUEST['senderMessage'];

# request client emails
$client_emails = $_REQUEST['clientEmails'];

# send mails
$send_mail = new SendMassMail($sender_name, $sender_email, $sender_subject, $sender_message);
$send_mail->send($client_emails); // send method recieves clients emails and process it.

?>