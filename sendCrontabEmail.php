#!/usr/bin/php
<?php

// USER-DEFINED VARIABLES
define("EMAIL_OUTPUT_FILE", "path/to/logfile.txt");
$to = "recipient1@wcpss.net, recipient2@wcpss.net";
$subject = "DESCRIPTIVE SUBJECT TEXT";

// CONSTANTS
define("HOST_NAME", gethostname());

// EMAIL CONTENTS

// Subject
$subject  = HOST_NAME." crontab report: ".$subject;

// Header
// To send HTML mail, the Content-type header must be set
$headers[] = "MIME-Version: 1.0";
$headers[] = "Content-type: text/html; charset=iso-8859-1";
$headers[] = "From: ".HOST_NAME." cron <no-reply@wcpss.net>";

// Body
$FileHandle = fopen(EMAIL_OUTPUT_FILE, "r") or die("\nUnable to open file ".EMAIL_OUTPUT_FILE." \n");
$FileBody   = nl2br(fread($FileHandle,filesize(EMAIL_OUTPUT_FILE)));

$EmailMessage  = " <html>\n <head>\n <title>$subject</title>\n </head>\n <body>\n ";
$EmailMessage .= "<h1>$subject</h1>";
$EmailMessage .= "\n<p>\n";
$EmailMessage .= date('l jS \of F Y h:i:s A');
$EmailMessage .= "\n</p>\n";
$EmailMessage .= $FileBody;
$EmailMessage .= "\n</body>\n</html>\n";


// SEND EMAIL
mail($to, $subject, $EmailMessage, implode("\r\n", $headers));

?>