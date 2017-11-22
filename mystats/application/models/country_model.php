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
class Country_Model extends CI_Model
{
    public $_dataMap = ''; 
    function Country_Model()
    {
        parent::__construct();        
         $this->load->database();  
    }
    function TopCountry( $placeholder, $api_key, $start_dt, $end_dt, $country, $country_code  )
    {
        $this->db->select(" count(traffic_id) as count_of_hits, user_country ");
        $this->db->from(TOOL_DB_NAME.'.traffic');
        $this->db->where(array('traffic.user_api_key'=>$api_key, 'traffic.user_country !='=>'' ));
        $this->db->where("DATE(`data_created_on`) BETWEEN '$start_dt' AND '$end_dt' ");
        $whare = "( traffic.user_country = '".$country."' OR traffic.user_country_code = '".$country_code."' )";
        if($country != $country_code )
        {
            $this->db->where($whare);
        }
        $this->db->group_by('traffic.user_country');
        $this->db->order_by('count_of_hits', DESC);
        ($placeholder == 1) ? $this->db->limit(1) : $this->db->limit('1','1');
        $query = $this->db->get();
        $db_results = $query->result_array();    
        if (count($db_results) > 0 )
        {   
            return $db_results[0];
        } else {
            return false;
        } 
    }
    function GetAllDetails( $api_key, $perPage, $fromStart, $country_code )
    {
        $this->db->select(" * ");
        $this->db->from(TOOL_DB_NAME.'.traffic');
        $this->db->where(array( 'traffic.user_api_key'=>$api_key, 'traffic.user_country_code' => $country_code ));
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
    function GetAllCountries(  $api_key, $perPage, $fromStart )
    {
        $this->db->select("distinct(traffic.user_country) as lang, count(traffic_id) as users, user_country_code");
        $this->db->group_by('traffic.user_country');
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
/* End of file country_model.php */
?>