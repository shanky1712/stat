<?php         
    /**
     * Library  : Users
     * Created on  : 20-03-2014
     * Created By  : Vijayaragavan Sivagurusamy
     * Contact Me  : vijay@haiinteractive.com
     * Project     : mySTATS
     * powered By    : www.haiinteractive.com
     * Version     : 1.0
     */
 
class Users
{
    private $_CI;    

    /**
     * Constructor.
     * Loads the CI instance, the users_model and some useful helpers.
     * Creates a users_lib object, populated if passed a valid $init.    
     * @param string/int $init - user id or email of user to load   
     * @access public   
     * @return none
     */
    public function __construct($init = false)
    {
        // take advantage of codeigniter libraries
        // use $this->_CI in place of normal codeigniter $this
        $this->_CI = & get_instance();
        // load users model
        $this->_CI->load->library('external/Mandrill');
        $this->_CI->load->model('users_model');
        $this->_CI->config->load('mail_vars', TRUE);
        //$this->_CI->load->helper(array('form', 'url', 'cookie'));         
    }
    /**
     * @method is_loggedin 
     * @param   
     * @access public      
     * @return boolean - true: success, false: failure
     */
    public function IsLoggedin()
    {
         if($this->_CI->session->userdata('user')){             
             return true;
         }else{
             return false;
         }
    }  
    /**
     * @method login
     * @param  string  $username      email of user to login
     * @param  string  $password   password of the user to login
     * @access public 
     * @return boolean true: success, false: failure
     */
    public function UserLogin( $username, $password )
    {
        $response = false;
        return $this->_CI->users_model->UserLogin( $username, $password ); 
    }
    public function InviteUser( $email )
    {
        $mail_vars         = $this->_CI->config->item('mail_vars');
        $mail_response     = false;
            $unique_id = uniqid();
            $data = array(
                'user_unique_id' => $unique_id,
                'user_email'    => $email,
                'user_type'    => '1',
                'user_is_active'    => '0',
            );
            $insert_record = $this->_CI->users_model->RegisterUser( $data); 
            if($insert_record > 0){
                $from_address   = array('name' => 'Admin', 'email'=>'emailtesting6@gmail.com');
                $subject = "Invitation From mySTATS";
                $url  = "http://haiinteractive.com/index.php?/home/update_user_info?uniq=".$unique_id;
                $html  = file_get_contents($base_url.'application/views/site/email/email_template.html' );
                $content = str_replace(array('[%%DATE%%]', '[%%USERNAME%%]', '[%%INVITATION_TEXT%%]', '[%%URL%%]'), array($this->current_date, $email, $mail_vars['invite']['mail']['invitation_text'], $url), $html);
                //$subject          =     $mail_vars['mail']['invitation']['invitation_subject'];
                //$body              = str_replace( array('[EMAIL]', '[%FRIEND_NAME%]'), array($u_details['friend_email'], $user_profile->user_first_name." ".$user_profile->user_last_name), $mail_vars['mail']['invitation']['invitation_content_line1']);
                $to_address            = array('name' => 'User', 'email'=> "$email");
                //$html_content         = $this->_CI->sh_swift_mailer->generate_html_content_4_invitefriends($body, $link, $im_game);
                $mail_response         = $this->_CI->mandrill->MandrillSendMail($from_address, $to_address, $subject, $content, 'invite');
                //$mail_response         = true;
                return $mail_response;
            }else{
                return "failed";
            }
    }
    public function CheckUser( $unique_id )
    {
        $response = false;
        $response = $this->_CI->users_model->CheckUser( $unique_id );
        return $response;
    }
    public function CheckManageUser( $user_name )
    {
        $response = false;
        $response = $this->_CI->users_model->CheckManageUser( $user_name );
        return $response;
    }
    public function AddUser( $user_id, $user_name, $user_password )
    {
        $response = false;
        $api = $this->GenerateAPI('13');
        $data = array(
                    'user_api_key' => $api,
                    'user_name' => $user_name,
                    'user_password' => md5($user_password),        
                    'user_is_active' => '1'        
                );
        if($this->CheckManageUser( $user_name)){
            $response = 'exist';
        }else{
        $response = $this->_CI->users_model->AddUser( $user_id, $data );
        }
        return $response;
    }

    public function CreateNewUser( $user_type, $user_email, $user_password )
    {
        $response = false;
        $api = $this->GenerateAPI('13');
        $unique_id = $this->GenerateAPI('13');
        $data = array(
                    'user_api_key' => $api,
                    'user_unique_id' => $unique_id,
                    'user_type' => $user_type,
                    'user_email' => $user_email,
                    'user_password' => md5($user_password),        
                    'user_is_active' => '1'        
                );
        $response = $this->_CI->users_model->RegisterUser( $data );
        return $response;
    }
    public function GenerateAPI( $length )
    {
        //generate a random id encrypt it and store it in $rnd_id 
        $rnd_id = crypt(uniqid(rand(),1)); 
        //to remove any slashes that might have come 
        $rnd_id = strip_tags(stripslashes($rnd_id)); 
        //Removing any . or / and reversing the string 
        $rnd_id = str_replace(".","",$rnd_id); 
        $rnd_id = strrev(str_replace("/","",$rnd_id)); 
        //finally I take the first 10 characters from the $rnd_id 
        $rnd_id = substr($rnd_id,0, $length); 
        return $rnd_id;
    }
    public function VisitorsFlow( $user_api_key, $type )
    {
        $response = false;
        $response = $this->_CI->users_model->VisitorsFlow( $user_api_key, $type );
        return $response;
    }
    public function CreateManageSites( $arg )
    {
        $response = false;
        $response = $this->_CI->users_model->CreateManageSites( $arg );
        return $response;
    }
    public function CheckUserAvailability( $user_email )
    {
        $response = false;
        $response = $this->_CI->users_model->CheckUserAvailability( $user_email );
        return $response;
    }
    public function CountUnique( $user_api_key )
    {
        $response = false;
        $response = $this->_CI->users_model->CountUnique( $user_api_key );
        return $response;
    }
    public function CountRepeat( $user_api_key, $start_dt, $end_dt, $country, $country_code  )
    {
        $response = false;
        $response = $this->_CI->users_model->CountRepeat( $user_api_key, $start_dt, $end_dt, $country, $country_code  );
        return $response;
    }
    public function Visits( $user_api_key, $start_dt, $end_dt, $country, $country_code, $limit_of  )
    {
        $response = false;
        $response = $this->_CI->users_model->Visits( $user_api_key, $start_dt, $end_dt, $country, $country_code, $limit_of  );
        return $response;
    }
    public function VisitsDetails( $keyword, $user_api_key )
    {
        $response = false;
        $response = $this->_CI->users_model->VisitsDetails( $keyword, $user_api_key );
        return $response;
    }
    public function ViewUserDetails( $user_api_key )
    {
        $response = false;
        $response = $this->_CI->users_model->ViewUserDetails( $user_api_key );
        return $response;
    }
    public function TotalVisits( $user_api_key, $start_dt, $end_dt, $country, $country_code  )
    {
        $response = false;
        $response = $this->_CI->users_model->TotalVisits( $user_api_key, $start_dt, $end_dt, $country, $country_code    );
        return $response;
    }
    public function UniqueVisits( $api_key, $start_dt, $end_dt, $country, $country_code    )
    {
        $response = false;
        $response = $this->_CI->users_model->UniqueVisits( $api_key, $start_dt, $end_dt, $country, $country_code    );
        return $response;
    }
    public function LatestHits( $api_key, $start_dt, $end_dt, $country, $country_code   )
    {
        $response = false;
        $response = $this->_CI->users_model->LatestHits( $api_key, $start_dt, $end_dt, $country, $country_code   );
        return $response;        
    }
    public function GetBrowser( $browser, $api_key, $start_dt, $end_dt, $country, $country_code  )
    {
        $response = false;
        $response = $this->_CI->users_model->GetBrowser( $browser, $api_key, $start_dt, $end_dt, $country, $country_code  );
        return $response;
    }    
    public function ListOfSites( $user_id )
    {
        $response = false;
        $response = $this->_CI->users_model->ListOfSites( $user_id );
        return $response;
    }
}
/* End of file users.php */