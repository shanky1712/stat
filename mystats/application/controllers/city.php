<?php    if ( ! defined('BASEPATH')) exit('No direct script access allowed');
    /**
     * Controller  : Home, Landing Page
     * Created on  : 20-03-2013
     * Created By  : Vijayaragavan Sivagurusamy
     * Contact Me  : vijayaragavan.sivagurusamy@gmail.com
     * Modified On :
     * Modified By :      
     * Project     : myanalytics
     * Version       : 1.0
     */
class City extends CI_Controller 
{
    function __construct()
    {
        parent::__construct();                    
        // load the necessary libraries
        $this->start = '';
        $this->perPage = 5;
        $this->current_date = date("Y-m-d H:i:s");
        $this->email_date = date("Y-M-d");
        $this->url = $_SERVER['REQUEST_URI'];
        $this->url_input = split('/', $this->url);
        $this->url_count = count($this->url_input) -1;
        $this->url_category = count($this->url_input) -2;
        $this->load->library('form_validation');   
        $this->load->helper(array('form', 'url', 'cookie'));           
        $this->load->library('core/users');   
        $this->load->library('core/sh_behaviour');   
        $this->load->library('core/sh_common'); 
        $this->load->library('core/sh_city'); 
    }
    /*
     * Function: Index 
     * Purpose : Loading the landing page
     */    
    public function Index()
    {
       $user_data = $this->session->userdata('mystat');
       $api_key = $user_data['api_key'];
       $current_site = $this->session->userdata('current_site');
       $api_key = $current_site['current_site'];
       if($user_data['user_id'] == '' || $user_data['user_id'] == null ){
               redirect(SITE_URL."home/login");
       }
       $page =  $this->url_input[$this->url_count];
       ( is_numeric( $page ) ) ? $city_code =  $this->url_input[$this->url_category] :  $city_code = $page ;
       $fromStart = $this->perPage * $page;
        $code = array( 'group_by_city' => $city_code );
       $total_pages = $this->sh_common->Pagination( $api_key, $code , 'all', 'all' );
       $details = $this->sh_city->GetAllCities( $api_key, $this->perPage, $fromStart );
       $file = 'site/city.html';
       $this->mysmarty->assign('user', $user_data);
       $this->mysmarty->assign('current_page', $page);
       $this->mysmarty->assign('total_pages', $total_pages);
       $this->mysmarty->assign('city', $city_code);
       $this->mysmarty->assign('details', $details);
       $this->mysmarty->assign('filename',$file);
       $this->mysmarty->assign('details',$details);
       $this->mysmarty->display('home.html'); 
    }
    # Purpose: Getting the visitors details based on the country
    # Landing page
    public function UserCityDetails()
    {
       $user_data = $this->session->userdata('mystat');
       $user_api_key = $user_data['user_api_key'];
       $current_site = $this->session->userdata('current_site');
       $api_key = $current_site['current_site'];
       if($user_data['user_id'] == '' || $user_data['user_id'] == null ){
               redirect(SITE_URL."home/login");
       }
       $page =  $this->url_input[$this->url_count];
       ( is_numeric( $page ) ) ? $city_code =  $this->url_input[$this->url_category] :  $city_code = $page ;
       $fromStart = $this->perPage * $page;
       $code = array( 'where_by_city' => $city_code );
       $total_pages = $this->sh_common->Pagination( $api_key, $code, 'all', 'all' );
       $details = $this->sh_city->GetAllDetails( $api_key, $this->perPage, $fromStart, $city_code );
       $file = 'site/view_city_visits.html';
       $this->mysmarty->assign('user', $user_data);
       $this->mysmarty->assign('current_page', $page);
       $this->mysmarty->assign('total_pages', $total_pages);
       $this->mysmarty->assign('city_code', $city_code);
       $this->mysmarty->assign('details', $details);
       $this->mysmarty->assign('filename',$file);
       $this->mysmarty->assign('details',$details);
       $this->mysmarty->display('home.html'); 
      }
}
/* End of file city.php */
?>