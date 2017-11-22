<?php         
    /**
     * Library  : Site
     * Created on  : 20-03-2014
     * Created By  : Vijayaragavan Sivagurusamy
     * Contact Me  : vijay@haiinteractive.com
     * Project     : mySTATS
     * powered By    : www.haiinteractive.com
     * Version     : 1.0
     */
class Sh_site
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
        $this->_CI->load->library('core/users');
        $this->_CI->load->model('site_model');
        $this->_CI->config->load('mail_vars', TRUE);
        //$this->_CI->load->helper(array('form', 'url', 'cookie'));         
        $this->current_date = date('Y-m-d H:i:s');
    }
    public function AddNewSite( $input_site_label, $input_site_url, $user_id )
    {
        $response = false;
              $key = $this->_CI->users->GenerateAPI('13');
            $data = array(
                    'site_api_key' => $key,
                    'site_name' => $input_site_label,
                    'site_url' => $input_site_url,     
                    'created_by' => $user_id,
                     'site_created_on'  =>  $this->current_date
                );
        $response = $this->_CI->site_model->AddNewSite( $data );
        return $response;        
    }

    public function AddSiteAccess( $site_id, $user_id )
    {
        $response = false;
            $data = array(
                    'user_id' => $user_id,
                    'site_id' => $site_id,
                     'created_on'  =>  $this->current_date
                );
        $response = $this->_CI->site_model->AddSiteAccess( $data );
        return $response;        
    }

    function managesites( $user_id )
    {
        $response = false;
        $response = $this->_CI->site_model->managesites( $user_id );
        return $response;
    }

    function GetSiteInfo( $site_id )
    {
        $response = false;
        $response = $this->_CI->site_model->GetSiteInfo( $site_id );
        return $response;
    }

    function UpdateInfo( $site_name, $site_url, $site_id )
    {
        $response = false;
        $arg = array(
                    'site_name' => $site_name,
                    'site_url'      => $site_url
            );
        $response = $this->_CI->site_model->UpdateInfo( $arg, $site_id );
        return $response;
    }

    function DeleteTraffic( $api_key )
    {
       $response = false;
        $response = $this->_CI->site_model->DeleteTraffic( $api_key );
        return $response;
    }
    function DeleteSite( $api_key )
    {
       $response = false;
        $response = $this->_CI->site_model->DeleteSite( $api_key );
        return $response;
    }
    
}
/* End of file sh_site.php */