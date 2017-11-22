<?php    if ( ! defined('BASEPATH')) exit('No direct script access allowed');

    /**
     * Controller  : For Information
     * Created on  : 20-03-2014
     * Created By  : Vijayaragavan Sivagurusamy
     * Contact Me  : vijay@haiinteractive.com
     * Project     : mySTATS
     * powered By    : www.haiinteractive.com
     * Version       : 1.0
     */

class Info extends CI_Controller 
{
     public $date;
     function __construct()
    {
        parent::__construct();                    
        // load the necessary libraries
        $this->start = '';
        $this->perPage = 10;
        $this->country_code ;
        $this->load->library('form_validation');   
        $this->load->helper(array('form', 'url', 'cookie'));           
        $this->load->library('core/sh_info');   
        $this->load->library('core/sh_common');   
        $this->current_date = date("Y-m-d H:i:s");
        $this->email_date = date("Y-M-d");
        $this->url = $_SERVER['REQUEST_URI'];
        $this->url_input = split('/', $this->url);
        $this->url_count = count($this->url_input) -1;
        $this->url_category = count($this->url_input) -2;
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
    public function ViewAllNotification()
    {
       $user_data = $this->session->userdata('mystat');
       $current_site = $this->session->userdata('current_site');
       $api_key = $current_site['current_site'];
       $page =  $this->url_input[$this->url_count];
       if($user_data['user_id'] == '' || $user_data['user_id'] == null ){
               redirect(SITE_URL."home/login");
       }
       $fromStart = $this->perPage * $page;
       $details = $this->sh_info->GetAllNotifications( $api_key, $this->perPage, $fromStart );
       $file = 'site/notification.html';
       $this->mysmarty->assign('user', $user_data);
       $this->mysmarty->assign('details', $details);
       $this->mysmarty->assign('filename',$file);
       $this->mysmarty->assign('details',$details);
       $this->mysmarty->display('home.html'); 
    }
    public function AllVisits()
    {
       $user_data = $this->session->userdata('mystat');
       $current_site = $this->session->userdata('current_site');
       $api_key = $current_site['current_site'];
       $page =  $this->url_input[$this->url_count];
       if($user_data['user_id'] == '' || $user_data['user_id'] == null ){
               redirect(SITE_URL."home/login");
       }
       ($this->input->cookie('country_code') != '' || $this->input->cookie('country_code') != 'all')  ? $this->country_code = $this->input->cookie('country_code')  : $this->country_code  = 'all';
       $date_range = $this->sh_common->GetDateRange( );
       $fromStart = $this->perPage * $page;
       $total_pages = $this->sh_common->pagination( $api_key, $this->country_code, $date_range['start_dt'], $date_range['end_dt']  );
       $details = $this->sh_info->GetAllNotifications( $api_key, $this->perPage, $fromStart, $date_range['start_dt'], $date_range['end_dt'], $this->country_code );
       $file = 'site/notification.html';
       $this->mysmarty->assign('user', $user_data);
       $this->mysmarty->assign('current_page', $page);
       $this->mysmarty->assign('total_pages', $total_pages);
       $this->mysmarty->assign('details', $details);
       $this->mysmarty->assign('filename',$file);
       $this->mysmarty->assign('details',$details);
       $this->mysmarty->display('home.html'); 
    }
    public function ExportData()
    {
       $user_data = $this->session->userdata('mystat');
       $current_site = $this->session->userdata('current_site');
       $api_key = $current_site['current_site'];
       $date_range = $this->sh_common->GetDateRange( );
       $data = $this->sh_info->ExportData( $api_key, $date_range['start_dt'], $date_range['end_dt']  );
            $contents="Id, Url, Screen Size, User agent lang, Visitor Ip, City, Country, Browser, Plateform, isCookieSet ( Yes - 1 No - 0 ), User Agent, Data Created On \n";
               foreach($data as $visit)
               {
                   $contents .= $visit['traffic_id'].',';
                   $contents .= $visit['url'].',';
                   $contents .= $visit['user_browser_size'].',';
                   $contents .= $visit['user_agent_lang'].',';
                   $contents .= $visit['user_ip'].',';
                   $contents .= $visit['user_city'].',';
                   $contents .= $visit['user_country'].',';
                   $contents .= $visit['user_browser_name']. ' ' .$visit['user_browser_version'].',';
                   $contents .= $visit['platform'].',';
                   $contents .= $visit['cookieset'].',';
                   $contents .= $visit['useragent'].',';
                   $contents .= $visit['data_created_on']."\n";
               }
               $contents = strip_tags($contents); 
            Header("Content-Disposition: attachment; filename=export".date('d-m-Y').".csv");
            print $contents;
            die;
    }
    public function EditProfile( $update ){
         $user_data = $this->session->userdata('mystat');
         if($update == 1){
               $this->mysmarty->assign('notify', 'Updated Successfully.');
           }else if( $update = 'limit'){
               $this->mysmarty->assign('notify', 'Sorry! Limited access in Demo version.');               
           }
        $file = 'site/edit_profile.html';
           $this->mysmarty->assign('filename',$file);     
        $this->mysmarty->assign('user', $user_data);
        $this->mysmarty->display('home.html'); 
    }
    public function ProfileUpdate(){
        if($_SERVER['HTTP_HOST'] == DEMO_URL){
               redirect(SITE_URL."info/editprofile/limit");
        }else{
             $user_data = $this->session->userdata('mystat');
            $user_name = $this->security->xss_clean( $this->input->get_post('input_username') );
            $user_email = $this->security->xss_clean( $this->input->get_post('input_email') );
            $user_password = md5( $this->security->xss_clean( $this->input->get_post('input_password') ) );
            $response = $this->sh_info->UpdateProfile( $user_data['user_id'], $user_name, $user_email, $user_password );
            if($response){
                $sessionUserdata['user_id'] = $user_data['user_id'];
                $sessionUserdata['user_unique_key'] = $user_data['user_unique_key'];
                $sessionUserdata['username'] = $user_name;
                $sessionUserdata['display_name'] = $user_email;
                $sessionUserdata['user_type'] = $user_data['user_type'];
                $sessionUserdata['user_api_key'] = $user_data['user_api_key'];
                $sessionUserdata['user_logo'] = $user_data['user_logo'];
                $this->session->set_userdata(array('mystat'=>$sessionUserdata));
                       redirect(SITE_URL."info/editprofile/1");
            }
        }
        die;
    }
}
/* End of file info.php */
?>