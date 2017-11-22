<?php	 	if ( ! defined('BASEPATH')) exit('No direct script access allowed');

$config['reset_password_char']	= 6;
$config['reset_password_strength']	= 6;
$config['reset_password_from_email']	= 'support@ticketmaster.com';
$config['reset_password_from_name']	= 'Support';
$config['reset_password_from_subject']	= 'Forgot Password Notification : ';
$config['reset_password_content']	= 'Hello %s, <br> With reference to your password request, <br> we would like to inform you that your password is reset to :<b> %s </b> <br><br> Regards,<br>Support Team,<br>.';
$config['mail']['protocol'] = 'smtp';
$config['mail']['mail_path'] = 'ssl://smtp.googlemail.com';
$config['mail']['smtp_host'] = 'ssl://smtp.googlemail.com';
$config['mail']['smtp_port'] = '465';
$config['mail']['smtp_user'] = '';
$config['mail']['smtp_pass'] = '';
$config['mail']['charset'] = "utf-8";
$config['mail']['mailtype'] = "html";
$config['mail']['newline'] = "\r\n";    		 
$config['mail']['wordwrap'] = TRUE;
$config['mail']['smtp_timeout'] = '20';
							
				 