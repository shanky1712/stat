<?php    if ( ! defined('BASEPATH')) exit('No direct script access allowed');
    /**
     * Controller  : For Basic Site
     * Created on  : 20-03-2014
     * Created By  : Vijayaragavan Sivagurusamy
     * Contact Me  : vijay@haiinteractive.com
     * Project     : mySTATS
     * powered By    : www.haiinteractive.com
     * Version       : 1.0
     */
class Site extends CI_Controller 
{
    function __construct()
        {
            parent::__construct();                    
            // load the necessary libraries
            $this->load->library('form_validation');   
            $this->load->helper(array('form', 'url', 'cookie'));           
            $this->load->library('core/users');   
            $this->load->library('core/sh_site');   
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
    public function AddNewSite()
    {
        $user_data = $this->session->userdata('mystat');
        if($user_data['user_id'] == '' || $user_data['user_id'] == null ){
               redirect(SITE_URL."home/login");
        }
        $usuage = $this->security->xss_clean( $this->input->post('for') );
        if($usuage == 'add_site')
        {
            if($_SERVER['HTTP_HOST'] == DEMO_URL){
                echo 'demo';
                die;
            }else{
                $input_site_url = $this->security->xss_clean( $this->input->post('input_site_url') );
                $input_site_label = $this->security->xss_clean( $this->input->post('input_site_label') );
                $site_id = $this->sh_site->AddNewSite( $input_site_label, $input_site_url, $user_data['user_id'] );
                $access = $this->sh_site->AddSiteAccess( $site_id, $user_data['user_id'] );
                echo $access;
                die;
            }
        }
           $file = 'site/add_new_site.html';
            $this->mysmarty->assign('user', $user_data);
           $this->mysmarty->assign('track',$track);            
           $this->mysmarty->assign('filename',$file);            
        $this->mysmarty->display('home.html'); 
    }
    function ManageSites()
    {
        $user_data = $this->session->userdata('mystat');
        if($user_data['user_id'] == '' || $user_data['user_id'] == null ){
               redirect(SITE_URL."home/login");
        }
        $managesites = $this->sh_site->managesites( $user_data['user_id'] );
           $file = 'site/managesites.html';
            $this->mysmarty->assign('user', $user_data);
           $this->mysmarty->assign('sites',$managesites);            
           $this->mysmarty->assign('filename',$file);
        $this->mysmarty->display('home.html'); 
    }

    function edit( $site_id )
    {
        $user_data = $this->session->userdata('mystat');
        if($user_data['user_id'] == '' || $user_data['user_id'] == null ){
               redirect(SITE_URL."home/login");
        }

        $usuage = $this->security->xss_clean( $this->input->post('for') );
        if($usuage == 'edit_site')
        {
            if($_SERVER['HTTP_HOST'] == DEMO_URL){
                echo 'demo';
                die;
            }else{
                    $UpdateInfo = $this->sh_site->UpdateInfo( $this->security->xss_clean( $this->input->post('site_name') ), $this->security->xss_clean( $this->input->post('site_url') ), $this->security->xss_clean( $this->input->post('id') ) );
                    echo 1;
                    die;
            }
     }
        $info = $this->sh_site->GetSiteInfo( $site_id );
           $file = 'site/edit_site.html';
            $this->mysmarty->assign('user', $user_data);
           $this->mysmarty->assign('info',$info);            
           $this->mysmarty->assign('filename',$file);
        $this->mysmarty->display('home.html'); 

    }

    function delete( )
    {
        $user_data = $this->session->userdata('mystat');
        if($user_data['user_id'] == '' || $user_data['user_id'] == null ){
               redirect(SITE_URL."home/login");
        }

        $usuage = $this->security->xss_clean( $this->input->post('for') );
        $api_key = $this->security->xss_clean( $this->input->post('site_api_key') );
        if($usuage == 'del')
        {
            if($_SERVER['HTTP_HOST'] == DEMO_URL){
                echo 'demo';
                die;
            }else{
                    $DeleteTraffic = $this->sh_site->DeleteTraffic( $api_key );
                    if($DeleteTraffic == 1){
                        $deletesite = $this->sh_site->DeleteSite( $api_key );
                        echo 1;
                        die;
                    }
                    echo '9';
                    die;
            }
        }
    }
}
/* End of file site.php */
?>