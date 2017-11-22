<?php         if ( ! defined('BASEPATH')) exit('No direct script access allowed');

    /**
     * Controller  : For Country
     * Created on  : 20-03-2014
     * Created By  : Vijayaragavan Sivagurusamy
     * Contact Me  : vijay@haiinteractive.com
     * Project     : mySTATS
     * powered By    : www.haiinteractive.com
     * Version       : 1.0
     */

class Country extends CI_Controller 
{
    function __construct()
    {
        parent::__construct();                    
        // load the necessary libraries
        $this->load->library('form_validation');   
        $this->load->helper(array('form', 'url', 'cookie'));           
        $this->load->library('core/users');   
        $this->load->library('core/sh_behaviour');   
        $this->load->library('core/sh_common'); 
        $this->load->library('core/sh_country'); 
       $this->start = '';
        $this->perPage = 15;
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
       $user_data = $this->session->userdata('mystat');
       $user_api_key = $user_data['user_api_key'];
       $current_site = $this->session->userdata('current_site');
       $api_key = $current_site['current_site'];
       if($user_data['user_id'] == '' || $user_data['user_id'] == null ){
               redirect(SITE_URL."home/login");
       }
       $page =  $this->url_input[$this->url_count];
       ( is_numeric( $page ) ) ? $country_code =  $this->url_input[$this->url_category] :  $country_code = $page ;
       $fromStart = $this->perPage * $page;
        $code = array( 'group_by_country' => $country_code );
       $total_pages = $this->sh_common->Pagination( $api_key, $code , 'all', 'all' );
       $details = $this->sh_country->GetAllCountries( $api_key, $this->perPage, $fromStart );
       $file = 'site/country.html';
       $this->mysmarty->assign('user', $user_data);
       $this->mysmarty->assign('current_page', $page);
       $this->mysmarty->assign('total_pages', $total_pages);
       $this->mysmarty->assign('country_code', $country_code);
       $this->mysmarty->assign('details', $details);
       $this->mysmarty->assign('filename',$file);
       $this->mysmarty->assign('details',$details);
       $this->mysmarty->display('home.html'); 
    }
    # Purpose: Getting the visitors details based on the country
    # Landing page
    public function UserCountryDetails()
    {
       $user_data = $this->session->userdata('mystat');
       $user_api_key = $user_data['user_api_key'];
       $current_site = $this->session->userdata('current_site');
       $api_key = $current_site['current_site'];
       if($user_data['user_id'] == '' || $user_data['user_id'] == null ){
               redirect(SITE_URL."home/login");
       }
       $page =  $this->url_input[$this->url_count];
       ( is_numeric( $page ) ) ? $country_code =  $this->url_input[$this->url_category] :  $country_code = $page ;
       $fromStart = $this->perPage * $page;
       $code = array( 'country_code' => $country_code );
       $total_pages = $this->sh_common->Pagination( $api_key, $code, 'all', 'all' );
       $details = $this->sh_country->GetAllDetails( $api_key, $this->perPage, $fromStart, $country_code );
       $file = 'site/view_country_visits.html';
       $this->mysmarty->assign('user', $user_data);
       $this->mysmarty->assign('current_page', $page);
       $this->mysmarty->assign('total_pages', $total_pages);
       $this->mysmarty->assign('country_code', $country_code);
       $this->mysmarty->assign('details', $details);
       $this->mysmarty->assign('filename',$file);
       $this->mysmarty->assign('details',$details);
       $this->mysmarty->display('home.html'); 
      }
}
/* End of file country.php */
?>