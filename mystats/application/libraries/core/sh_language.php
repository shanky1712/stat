<?php       
    /**
     * Library  : Language
     * Created on  : 20-03-2014
     * Created By  : Vijayaragavan Sivagurusamy
     * Contact Me  : vijay@haiinteractive.com
     * Project     : mySTATS
     * powered By    : www.haiinteractive.com
     * Version     : 1.0
     */
class Sh_language
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
        $this->_CI->load->model('language_model');
        $this->_CI->config->load('mail_vars', TRUE);
        //$this->_CI->load->helper(array('form', 'url', 'cookie'));         
    }
    public function TopLanguage( $placeholder, $api_key, $start_dt, $end_dt, $country, $country_code  )
    {
        $response = false;
        $response = $this->_CI->language_model->TopLanguage( $placeholder, $api_key, $start_dt, $end_dt, $country, $country_code  );
        return $response;
    }   
    public function GetAllLanguages( $user_api_key, $perPage, $fromStart  )
    {
        $response = false;
        $response = $this->_CI->language_model->GetAllLanguages( $user_api_key, $perPage, $fromStart  );
        return $response;       
    }
    public function GetLangDetails( $user_api_key, $perPage, $fromStart, $lang_code  )
    {
        $response = false;
        $response = $this->_CI->language_model->GetLangDetails( $user_api_key, $perPage, $fromStart, $lang_code  );
        return $response;       
    }
}
/* End of file sh_language.php */