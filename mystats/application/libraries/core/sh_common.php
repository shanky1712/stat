<?php       
    /**
     * Library  : For Common
     * Created on  : 20-03-2014
     * Created By  : Vijayaragavan Sivagurusamy
     * Contact Me  : vijay@haiinteractive.com
     * Project     : mySTATS
     * powered By    : www.haiinteractive.com
     * Version     : 1.0
     */
 
class Sh_common
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
        // use $this->_CI in place of normal codeigniter $this
        $this->_CI = & get_instance();
        // load users model
        $this->_CI->load->library('external/Mandrill');
        $this->_CI->load->library('core/sh_info');
        $this->_CI->load->helper(array('form', 'url', 'cookie'));           
        $this->_CI->config->load('mail_vars', TRUE);
        
        $this->_CI->start = '';
        $this->_CI->perPage = 5;
    }
    # Purpose: Dynamically getting the date range
    public function GetDateRange (  )
    {
       $start_dt = $this->_CI->input->cookie('start') ;
       $end_dt = $this->_CI->input->cookie('end') ;
       if( ( $start_dt == '' || $start_dt == null ) && ( $end_dt == '' || $end_dt == null ) )
       {
            $d1 = strtotime(date("Y-m-d", strtotime("-29 day")));
            $date['start_dt'] = date('Y-m-d', $d1);
            $date['end_dt'] = date('Y-m-d');
            $expire_time = time()+3600*24*30;
            setcookie('start', date('M d Y', strtotime($date['start_dt']) ), $expire_time, '/');
            setcookie('end', date('M d Y', strtotime($date['end_dt']) ), $expire_time, '/');
       }else{
            $date['start_dt'] = date('Y-m-d', strtotime( $start_dt ) );
            $date['end_dt'] = date('Y-m-d', strtotime( $end_dt ) );
       }    
        return $date;
    }
    public function Pagination( $user_api_key, $country_code , $start_dt, $end_dt, $other )
    {
        $result = '';
        $count =  ceil( $this->_CI->sh_info->Pagination( $user_api_key, $country_code, $start_dt, $end_dt, $other  ) / floor($this->_CI->perPage) );
        //$count = $this->_CI->sh_info->Pagination( $user_api_key, $country_code, $start_dt, $end_dt );
        return $count-1;
    }
}
/* End of file sh_common.php */