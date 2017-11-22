<?php	 	defined('BASEPATH') OR exit('No direct script access allowed');

// Email SMTP Auth Configuration
$config['mail']['protocol'] 	= 'smtp';
$config['mail']['mail_path'] 	= 'ssl://smtp.googlemail.com';
$config['mail']['smtp_host'] 	= 'ssl://smtp.googlemail.com';
$config['mail']['smtp_port'] 	= '465';
$config['mail']['smtp_user'] 	= '';
$config['mail']['smtp_pass'] 	= '';
$config['mail']['charset'] 		= "utf-8";
$config['mail']['mailtype'] 	= "html";
$config['mail']['newline'] 		= "\r\n";    		 
$config['mail']['wordwrap'] 	= TRUE;
$config['mail']['smtp_timeout'] = '20';

/*$config['mail']['registration'] = array(
										'activation_subject' => 'SkillSweet: Activate your account',
										'activation_content_line1' => 'Please activate your SkillSweet account by clicking the below given URL',
										'welcome_subject'	=> 'Welcome to Skill Sweet',
										'welcome_content_line1' => 'Your Skill Sweet account has been successfully activated.',
										'welcome_content_line2' => 'You can now Login to access your account.'
									); */

/*$config['mail']['registration'] = array(
										'activation_subject' => 'SkillSweet: Activate your account',
										'activation_content_line1' => ' Hi [%FRIEND_NAME%], <br/> Before we can start, please activate your SkillSweet account. <br /><br /> [%URL_SUPPORT%] <br /><br /> [%ACTUAL_LINK%] <br /><br /> See you there! --Team Skillsweet',
										'welcome_subject'	=> 'Welcome to Skill Sweet',
										'welcome_content_line1' => 'Your Skill Sweet account has been successfully activated.',
										'welcome_content_line2' => 'You can now Login to access your account.'
									);  */

$config['invite']['mail']['invitation_text'] =  'Congrats!, You got the Invitation from Super Tag, we are ready to help you to improve your business.';


/* End of file mail_vars.php */ 
/* Location: ./system/application/config/mail_vars.php */