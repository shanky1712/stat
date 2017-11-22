<?php    if ( ! defined('BASEPATH')) exit('No direct script access allowed');

    /**
    * Controller  : For Export data in Excel
    * Created on  : 20-03-2014
    * Created By  : Vijayaragavan Sivagurusamy
    * Contact Me  : vijay@haiinteractive.com
    * Project     : mySTATS
    * powered By    : www.haiinteractive.com
    * Version      : 1.0
    */

class Export extends CI_Controller 
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
        $this->load->library('core/sh_export');   
    }
     /*
    * Function: Index 
    * Purpose : Loading the landing page
    */    
    
    public function index()
    {
      $Userdata = $this->session->userdata('hwa');

       if(!$Userdata)
       {
           redirect("/home/login/");
      }
      $clients = $this->sh_client->GetAllClientDetails();
       $file = "site/export_data.html";
      $this->mysmarty->assign('filename',$file);
      $this->mysmarty->assign('user',$Userdata);
      $this->mysmarty->assign('clients',$clients);
      $this->mysmarty->display('home.html');
    }
    public function export_data()
    {
      $user_data = $this->session->userdata('hwa');
      if($user_data['user_id'] == '' || $user_data['user_id'] == null ){
          redirect("/home/login");
      }
      $client_api_key = $this->security->xss_clean( $this->input->get_post('client_api') );
      $start_date = $this->security->xss_clean( $this->input->get_post('start_date') );      
      $end_date = $this->security->xss_clean( $this->input->get_post('end_date') );
      $export_datas =$this->sh_export->ExportData( $client_api_key, $start_date, $end_date );
         $contents="user_screen_size,user_browser_size,url,user_agent_lang,user_ip,city,country,browser_name,browser_version,referrer,platform,cookieset,useragent,server_name,created_on\n";
        foreach($export_datas as $visit)
        {
            $contents .= $visit['user_screen_size'].',';
            $contents .= $visit['user_browser_size'].',';
            $contents .= $visit['url'].',';
            $contents .= $visit['user_agent_lang'].',';
            $contents .= $visit['user_ip'].',';
            $contents .= $visit['user_city'].',';
            $contents .= $visit['user_country'].',';
            $contents .= $visit['user_browser_name'].',';
            $contents .= $visit['user_browser_version'].',';
            $contents .= $visit['referrer'].',';
            $contents .= $visit['plateform'].',';
            $contents .= $visit['cookieset'].',';
            $contents .= $visit['useragent'].',';
            $contents .= $visit['server_name'].',';
            $contents .= $visit['data_created_on']. "\n";
        }
        
        $contents = strip_tags($contents); 
            Header("Content-Disposition: attachment; filename=$user_api_key".date('d-m-Y').".csv");
            print $contents;
            die;
    }
}
/* End of file export.php */
?>