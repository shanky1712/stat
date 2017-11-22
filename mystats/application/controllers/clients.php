<?php     if ( ! defined('BASEPATH')) exit('No direct script access allowed');
    /**
     * Controller  : For Client
     * Created on  : 20-03-2014
     * Created By  : Vijayaragavan Sivagurusamy
     * Contact Me  : vijay@haiinteractive.com
     * Project     : mySTATS
     * powered By    : www.haiinteractive.com
     * Version       : 1.0
     */

class Clients extends CI_Controller 
{
    function __construct()
    {
        parent::__construct();                    
        // load the necessary libraries
        $this->load->library('form_validation');   
        $this->load->helper(array('form', 'url', 'cookie'));           
        $this->load->library('core/users');   
        $this->load->library('core/sh_behaviour');           
        $this->load->library('core/sh_client');   
        $this->load->library('core/sh_resume');           
        $this->load->library('core/sh_demographics');   
        $this->url = $_SERVER['REQUEST_URI'];
        $this->url_input = split('/', $this->url);
        $this->url_count = count($this->url_input) -1;
    }
    /*
     * Function: Index 
     * Purpose : Loading the landing page
     */    
    public function Index()
    {
       $user_data = $this->session->userdata('hwa');
       if(!$user_data){
            $file = 'site/login.html';
       }else{
           $clients = $this->sh_client->GetAllClientDetails();
           $this->mysmarty->assign('clients',$clients);
       }
        $file = 'site/clients.html';
        $this->mysmarty->assign('user', $user_data);
        $this->mysmarty->assign('filename',$file);            
        $this->mysmarty->display('home.html'); 
    }
    public function View()
    {
           $user_data = $this->session->userdata('hwa');
           if(!isset($user_data))
           {
            redirect(SITE_URL."home/login/");
           }
           $client_api_key = $this->security->xss_clean( $this->input->get_post('client_view') );
               // DEMOGRAPHICS
           $lang_data =  $this->sh_demographics->GetAllData( $client_api_key, 'Language' );
           $country_data =  $this->sh_demographics->GetAllData( $client_api_key, 'Territory' );
           $city_data =  $this->sh_demographics->GetAllData( $client_api_key, 'City' );
           $labels = array("label_name" => "DemoGraphics", "count_of_value" =>"VISIT");
               //BEHAVIOUR
           $tags = $this->sh_behaviour->GetAllTags( $client_api_key );
           $unique_visitors = $this->users->VisitorsFlow( $client_api_key, 1 );
           $unique_total = '';
           $i = 0;
           $Mon = '';
           foreach($unique_visitors as $visitor){
                   if($i > 0 ) $comma = ',';
                   $rtt = explode('-', $visitor['dates']);
                   $mont = $rtt[1]-1;
                   $utc_date = $rtt[0].', '.$mont.', '.$rtt[2]; 
                   $unique_total .= $comma. '[Date.UTC('.$utc_date.'),'.$visitor['total'].']' ;
                   $i++;
           }
        $data_type = '';
        $datas =  $this->sh_behaviour->GetAllDatas($client_api_key, $data_type);
        $file = 'site/behaviour.html';
        $labels = array("label_name" => "Action Label", "count_of_value" =>"VISITS");
        //RESUME / PAUSE
       if($user_data['user_id'] > 0)
       {
         $pauses = $this->sh_resume->ListOfPauses( $client_api_key );           
       }else{
           redirect(SITE_URL."home/login");
       }
        $file = 'site/client_view.html';
        $this->mysmarty->assign('user', $user_data);
        // DEMOGRAPHICS
        $this->mysmarty->assign('response', 'all');
        $this->mysmarty->assign('city_data', $city_data);
        $this->mysmarty->assign('country_data', $country_data);        
        $this->mysmarty->assign('labels', $labels);
        $this->mysmarty->assign('lang_data', $lang_data);
        // BEHAVIOUR
        $this->mysmarty->assign('unique_total', $unique_total);           
        $this->mysmarty->assign('datas',$datas);
           //RESUME / PAUSE
           $this->mysmarty->assign('pauses',$pauses);           
        $this->mysmarty->assign('filename',$file);            
        $this->mysmarty->display('home.html'); 
    }
}
/* End of file clients.php */
?>