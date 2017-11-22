<?php         if ( ! defined('BASEPATH')) exit('No direct script access allowed');
    /**
     * Controller  : For Demographics
     * Created on  : 20-03-2014
     * Created By  : Vijayaragavan Sivagurusamy
     * Contact Me  : vijay@haiinteractive.com
     * Project     : mySTATS
     * powered By    : www.haiinteractive.com
     * Version       : 1.0
     */
class Demographics extends CI_Controller 
{
    function __construct()
    {
        parent::__construct();                    
        // load the necessary libraries
        $this->load->library('form_validation');   
        $this->load->helper(array('form', 'url', 'cookie'));           
        $this->load->library('core/users');   
         $this->load->library('core/sh_demographics');       
    }
    /*
     * Function: Index 
     * Purpose : Loading the landing page
     */    
    public function Index()
    {
       $user_data = $this->session->userdata('mystat');
       $current_site = $this->session->userdata('current_site');
       $api_key = $current_site['current_site'];
       if($user_data['user_id'] == '' || $user_data['user_id'] == null ){
           redirect("/home/login");
       }
       $lang_data =  $this->sh_demographics->GetAllData( $api_key, 'Language' );
       $country_data =  $this->sh_demographics->GetAllData( $api_key, 'Territory' );
       $city_data =  $this->sh_demographics->GetAllData( $api_key, 'City' );
       $labels = array("label_name" => "DemoGraphics", "count_of_value" =>"VISIT");
           $file = 'site/demographics.html';
        $this->mysmarty->assign('country_data', $country_data);
           $this->mysmarty->assign('city_data', $city_data);
        $this->mysmarty->assign('response', 'all');
           $this->mysmarty->assign('user', $user_data);
        $this->mysmarty->assign('labels', $labels);
        $this->mysmarty->assign('lang_data', $lang_data);
           $this->mysmarty->assign('filename',$file);            
        $this->mysmarty->display('home.html'); 
    }
    public function Language()
    {
        $data_type = 'Language';
       $user_data = $this->session->userdata('mystat');
       $current_site = $this->session->userdata('current_site');
       $api_key = $current_site['current_site'];
       if($user_data['user_id'] == '' || $user_data['user_id'] == null ){
           redirect("/home/login");
       }
       $lang_data =  $this->sh_demographics->GetAllData( $api_key, $data_type );
       $labels = array("label_name" => "USER AGENT LANG", "count_of_value" =>"VISIT");
           $file = 'site/data_count.html';
        $this->mysmarty->assign('user', $user_data);
        $this->mysmarty->assign('labels', $labels);
        $this->mysmarty->assign('lang_data', $lang_data);
           $this->mysmarty->assign('filename',$file);            
        $this->mysmarty->display('home.html'); 
    }
    public function Territory()
    {
        $data_type = 'Territory';
       $user_data = $this->session->userdata('mystat');
       $current_site = $this->session->userdata('current_site');
       $api_key = $current_site['current_site'];
       if($user_data['user_id'] == '' || $user_data['user_id'] == null ){
           redirect("/home/login");
       }
       $lang_data =  $this->sh_demographics->GetAllData( $api_key, $data_type );
       $labels = array("label_name" => "TERRITORY", "count_of_value" =>"VISIT");
           $file = 'site/data_count.html';
        $this->mysmarty->assign('user', $user_data);
        $this->mysmarty->assign('labels', $labels);
        $this->mysmarty->assign('lang_data', $lang_data);
           $this->mysmarty->assign('filename',$file);            
        $this->mysmarty->display('home.html'); 
    }
    public function City()
    {
       $data_type = 'City';
       $user_data = $this->session->userdata('mystat');
       $current_site = $this->session->userdata('current_site');
       $api_key = $current_site['current_site'];
       if($user_data['user_id'] == '' || $user_data['user_id'] == null ){
           redirect("/home/login");
       }
       $lang_data =  $this->sh_demographics->GetAllData( $api_key, $data_type );
       $labels = array("label_name" => "City", "count_of_value" =>"VISIT");
        $file = 'site/data_count.html';
        $this->mysmarty->assign('user', $user_data);
        $this->mysmarty->assign('labels', $labels);
        $this->mysmarty->assign('lang_data', $lang_data);
        $this->mysmarty->assign('filename',$file);            
        $this->mysmarty->display('home.html'); 
    }
}
/* End of file demographics.php */
?>