<?php    	    	
/**
 * The Country model
 *
 * @category Users
 * @package  None
 * @author   Vijayaragavan Sivagurusamy
 * @license  myanalytics
 * @link     libraries/core/sh_country.php
 *
 */
class City_Model extends CI_Model
{
    public $_dataMap = ''; 
    function City_Model()
    {
        parent::__construct();        
         $this->load->database();  
    }
    function GetAllDetails( $api_key, $perPage, $fromStart, $city_code )
    {
        $this->db->select(" * ");
        $this->db->from(TOOL_DB_NAME.'.traffic');
        $this->db->where(array( 'traffic.user_api_key'=>$api_key, 'traffic.user_city' => $city_code ));
        $this->db->order_by('traffic.data_created_on', DESC);
        $this->db->limit( $perPage, $fromStart);
        $query = $this->db->get();
        $db_results = $query->result_array();   
         if (count($db_results) > 0 )
        {   
            return $db_results;
        } else {
             return false;
        } 
    }
    function GetAllCities(  $api_key, $perPage, $fromStart )
    {
        $this->db->select("distinct(traffic.user_city) as lang, count(traffic_id) as users, user_city");
        $this->db->group_by('traffic.user_city');
        $this->db->order_by('users', 'DESC');
        $this->db->from(TOOL_DB_NAME.'.traffic');
        $this->db->where(array( 'traffic.user_api_key'=>$api_key ));
        $this->db->limit( $perPage, $fromStart);
        $query = $this->db->get();
        $db_results = $query->result_array();   
         if (count($db_results) > 0 )
        {   
            return $db_results;
        } else {
             return false;
        } 
    } 
}
/* End of file city_model.php */
?>