<?php         
    /**
     * Library  : Country
     * Created on  : 20-03-2014
     * Created By  : Vijayaragavan Sivagurusamy
     * Contact Me  : vijay@haiinteractive.com
     * Project     : mySTATS
     * powered By    : www.haiinteractive.com
     * Version     : 1.0
     */
 
class Sh_manageusers
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
        $this->_CI->load->model('manageusers_model');
        $this->_CI->config->load('mail_vars', TRUE);
        //$this->_CI->load->helper(array('form', 'url', 'cookie'));         
    }
    public function ManageUsers(   )
    {
        $response = false;
        $response = $this->_CI->manageusers_model->ManageUsers( );
        return $response;
    }    
    public function GetUserTypes()
    {
        $response = false;
        $response = $this->_CI->manageusers_model->GetUserTypes( );
        return $response;
    }
    public function GetAllSites()
    {
        $response = false;
        $response = $this->_CI->manageusers_model->GetAllSites( );
        return $response;
    }    
    public function UpdateUserInfo( $user_type, $input_username, $input_password, $id )
    {
        $response = false;
            $arg = array(
                    'user_type' => $user_type,
                    'user_email' => $input_username
                );
            if($input_password != '')
            {
                $arg['user_password'] = md5( $input_password );
            }
        $response = $this->_CI->manageusers_model->UpdateUserInfo( $arg, $id );
        return $response;
    }    

    public function GetUserInfo( $user_id )
    {
        $response = false;
        $response = $this->_CI->manageusers_model->GetUserInfo( $user_id );
        return $response;
    } 

    public function GetAccessableSites( $user_id )
    {
        $response = false;
        $response = $this->_CI->manageusers_model->GetAccessableSites( $user_id );
        return $response;
    } 

    public function DeleteManageSites( $id )
    {
        $response = false;
        $response = $this->_CI->manageusers_model->DeleteManageSites( $id );
        return $response;
    }
    public function DeleteUser( $user_id )
    {
        $response = false;
        $response = $this->_CI->manageusers_model->DeleteUser( $user_id );
        return $response;
    }
}
/* End of file sh_manageusers.php */