<?php	
    /**
     * Library  : For Menu - AutoLoader
     * Created on  : 20-03-2014
     * Created By  : Vijayaragavan Sivagurusamy
     * Contact Me  : vijay@haiinteractive.com
     * Project     : mySTATS
     * powered By    : www.haiinteractive.com
     * Version     : 1.0
     */
class Installation
{
    private $_CI;    
    // present for all users
    public $loggedIn = false;
    /**
     * Constructor.
     * Loads the CI instance, the users_model and some useful helpers.
     * Creates a menu_lib object, populated if passed a valid $init.    
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
      //  $this->_CI->load->model('users_model');
    //    $this->_CI->load->library('core/users');         
        $this->_CI->load->config('install');
        $this->_CI->load->helper('url');        
        $arg = explode('/', BASE_PATH);
        $main_url = '';
        foreach($arg as $ar ){
            if($ar !='mystats'){
                $main_url .= $ar.'/';
            }else{
                 break;   
            }
        }
/*        if( $this->_CI->config->item('status') === 0 )
        {
               $file = 'site/auth/install.html';
               $this->_CI->mysmarty->assign('filename',$file);            
               $this->_CI->mysmarty->display('home.html'); 

        }
*/        
    }
}
/* End of file menu.php */