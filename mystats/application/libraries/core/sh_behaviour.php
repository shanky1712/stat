<?php         
    /**
     * Library  : For Behaviour
     * Created on  : 20-03-2014
     * Created By  : Vijayaragavan Sivagurusamy
     * Contact Me  : vijay@haiinteractive.com
     * Project     : mySTATS
     * powered By    : www.haiinteractive.com
     * Version     : 1.0
     */
 class Sh_behaviour
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
        $this->_CI->load->model('behaviour_model');
        $this->_CI->config->load('mail_vars', TRUE);
        //$this->_CI->load->helper(array('form', 'url', 'cookie'));         
    }
    public function GetAllTags( $user_api_key, $start_date, $end_date )
    {
        $response = false;
        $response = $this->_CI->behaviour_model->GetAllTags( $user_api_key, $start_date, $end_date );
        return $response;
    }
    public function GetTagDetails($type, $tag, $user_api_key )
    {
      $response = false;
    $response = $this->_CI->behaviour_model->GetTagDetails( $type, $tag, $user_api_key );
    return $response;
    }
    public function GetAllBrowsers($api )
    {
      $response = false;
      $response = $this->_CI->behaviour_model->GetAllBrowsers( $api );
      return $response;
    }
    public function GetData( $browser, $api_key )
    {
        $response = false;
        $response = $this->_CI->behaviour_model->GetData( $browser, $api_key);
        return $response;        
    }
    public function GetAllDatas( $user_api_key, $data_type )
    {
        $response = false;
        $response = $this->_CI->behaviour_model->GetAllDatas( $user_api_key, $data_type );
        return $response;        
    }
    public function LabelDetails( $api_key, $label, $start_dt, $end_dt, $country, $country_code, $limit_of){
        $response = false;
        $response = $this->_CI->behaviour_model->LabelDetails(  $api_key, $label, $start_dt, $end_dt, $country, $country_code, $limit_of );
        return $response;       
    }
    public function GetLabelDetails( $api_key, $page, $fromStart, $lang_code, $date ){
        $response = false;
        $response = $this->_CI->behaviour_model->GetLabelDetails(  $api_key, $page, $fromStart, $lang_code, $date );
        return $response;       
    }
}
/* End of file sh_behaviour.php */