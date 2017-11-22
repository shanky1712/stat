<?php     if ( ! defined('BASEPATH')) exit('No direct script access allowed');
    /**
     * Controller  : For Overview
     * Created on  : 20-03-2014
     * Created By  : Vijayaragavan Sivagurusamy
     * Contact Me  : vijay@haiinteractive.com
     * Project     : mySTATS
     * powered By    : www.haiinteractive.com
     * Version       : 1.0
     */
class Overview extends CI_Controller 
{
    function __construct()
    {
        parent::__construct();                    
        // load the necessary libraries
        $this->load->library('form_validation');   
        $this->load->helper(array('form', 'url', 'cookie'));           
        $this->load->library('core/users');   
        $this->load->library('core/sh_behaviour');   
    }
    /*
     * Function: Index 
     * Purpose : Loading the landing page
     */    
    public function Index()
    {
       $Userdata = $this->session->userdata('mystat');
       if($Userdata){
               redirect(SITE_URL."home/index/");
       }else{
            $file = 'site/login.html';
       }
           $this->mysmarty->assign('filename',$file);
        $this->mysmarty->display('home.html'); 
    }
    public function TrackCode()
    {
       $user_data = $this->session->userdata('mystat');
       $current_site = $this->session->userdata('current_site');
       $user_api_key = $current_site['current_site'];
       if($user_data['user_id'] == '' || $user_data['user_id'] == null ){
           redirect(SITE_URL."home/login");
       }
       $base_url =       preg_replace('#^https?://#', '', base_url());
       $track = '&lt;script type="text/javascript"&gt;
        var _hii = _hii || [];
        _hii.push(["_AccountNo", "APIKEY"]);
        _hii.push(["_Pageview", "page"]);
        (function() {
          var a = document.createElement("script"); 
          a.type = "text/javascript"; 
          a.async = true;
          a.src = "//www.'. $base_url.'subtag/hii.js";
          var s = document.getElementsByTagName("script")[0]; s.parentNode.insertBefore(a, s);
        })();
    &lt;/script&gt;    
        &lt;a href="#" onClick="_hii.push(["_trackEvent", "Action_Label", "Action_Value"]);"&gt;Click Me!&lt;/a&gt;  ';
           $file = 'site/track.html';
            $this->mysmarty->assign('user', $user_data);
            $this->mysmarty->assign('user_api_key', $user_api_key);
           $this->mysmarty->assign('track',$track);            
           $this->mysmarty->assign('filename',$file);            
        $this->mysmarty->display('home.html'); 
    }
    public function Browser()
    {
       $user_data = $this->session->userdata('mystat');
       if($user_data['user_id'] == '' || $user_data['user_id'] == null ){
           redirect(SITE_URL."home/login");
       }
       $browser = $this->security->xss_clean( $this->input->get_post('_') );
       $browser_data =  $this->sh_behaviour->GetData($browser, $user_data['user_api_key']);
           $file = 'site/browser_grid.html';
        $this->mysmarty->assign('user', $user_data);
           $this->mysmarty->assign('browser_data', $browser_data);
           $this->mysmarty->assign('filename',$file);            
        $this->mysmarty->display('home.html'); 
     }
 }
/* End of file overview.php */
?>