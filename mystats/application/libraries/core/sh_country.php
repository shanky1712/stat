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
 
class Sh_country
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
        $this->_CI->load->model('country_model');
        $this->_CI->config->load('mail_vars', TRUE);
        //$this->_CI->load->helper(array('form', 'url', 'cookie'));         
    }
    public function TopCountry( $placeholder, $api_key, $start_dt, $end_dt, $country, $country_code  )
    {
        $response = false;
        $response = $this->_CI->country_model->TopCountry( $placeholder, $api_key, $start_dt, $end_dt, $country, $country_code  );
        return $response;
    }    
    public function GetAllDetails( $user_api_key, $perPage, $end_dt, $country_code  )
    {
        $response = false;
        $response = $this->_CI->country_model->GetAllDetails( $user_api_key, $perPage, $end_dt, $country_code  );
        return $response;       
    }
    public function GetAllCountries( $user_api_key, $perPage, $fromStart  )
    {
        $response = false;
        $response = $this->_CI->country_model->GetAllCountries( $user_api_key, $perPage, $fromStart  );
        return $response;       
    }
}
/* End of file sh_country.php */