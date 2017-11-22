<?php    if ( ! defined('BASEPATH')) exit('No direct script access allowed');

    /**
     * Controller  : For Google Graph
     * Created on  : 20-03-2014
     * Created By  : Vijayaragavan Sivagurusamy
     * Contact Me  : vijay@haiinteractive.com
     * Project     : mySTATS
     * powered By    : www.haiinteractive.com
     * Version       : 1.0
     */

class Graph extends CI_Controller 
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
    public function Visits()
    {
       $user_data = $this->session->userdata('mystat');
       $current_site = $this->session->userdata('current_site');
       $api_key = $current_site['current_site'];
       if($user_data['user_id'] == '' || $user_data['user_id'] == null ){
           redirect(SITE_URL."home/login");
       }
       $visits = $this->users->Visits( $api_key );
       $visits_details = '';
       $i = 0;
       $Mon = '';
       foreach($visits as $visit){
               if($i > 0 ) $comma = ',';
               $rtt = explode('-', $visit['dates']);
               $mont = $rtt[1]-1;
               $utc_date = $rtt[0].', '.$mont.', '.$rtt[2]; 
               $visits_details .= $comma. "[Date.UTC(".$utc_date."),".$visit["total"]."]";
               $i++;
       }
       $grpah = '[ ' .$visits_details. ' ]';
       echo  $grpah;
        die;
    }
}

/* End of file graph.php */
?>