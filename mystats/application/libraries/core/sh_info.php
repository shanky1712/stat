<?php       
    /**
     * Library  : Information
     * Created on  : 20-03-2014
     * Created By  : Vijayaragavan Sivagurusamy
     * Contact Me  : vijay@haiinteractive.com
     * Project     : mySTATS
     * powered By    : www.haiinteractive.com
     * Version     : 1.0
     */
 
class Sh_info
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
        $this->_CI->load->model('info_model');
        $this->_CI->config->load('mail_vars', TRUE);
        //$this->_CI->load->helper(array('form', 'url', 'cookie'));         
    }
    public function GetAllNotifications( $user_api_key, $perPage, $fromStart, $start_dt, $end_dt  , $country_code )
    {
        $response = false;
        $response = $this->_CI->info_model->GetAllNotifications( $user_api_key, $perPage, $fromStart, $start_dt, $end_dt, $country_code   );
        return $response;       
    }
    public function Pagination( $user_api_key, $country_code, $start_dt, $end_dt, $other  )
    {
        $response = false;
        $response = $this->_CI->info_model->Pagination( $user_api_key, $country_code, $start_dt, $end_dt, $other  );
        return $response;       
    }
    public function ExportData( $user_api_key, $start_dt, $end_dt  )
    {
        $response = false;
        $response = $this->_CI->info_model->ExportData( $user_api_key, $start_dt, $end_dt  );
        return $response;       
    }
    public function UpdateProfile( $user_id, $user_name, $user_email, $user_password ){
        $response = false;
            $arg['user_name'] = $user_name;
            $arg['user_email'] = $user_email;
        if(  isset( $user_password ) ){
                    $arg['user_password']  = $user_password;
        }
        $response = $this->_CI->info_model->UpdateProfile( $user_id, $arg );
        return $response;       
    }
}
/* End of file sh_info.php */