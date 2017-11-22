<?php                
/**
 * The Demographics model
 *
 * @category Users
 * @package  None
 * @author   Vijayaragavan Sivagurusamy
 * @license  myanalytics
 * @link     libraries/core/sh_demographics.php
 *
 */
class Demographics_Model extends CI_Model
{
    public $_dataMap = ''; 
    function Demographics_Model()
    {
        parent::__construct();        
         $this->load->database();  
    }
    function GetAllData( $user_api_key, $data_type )
    {
        if($data_type == 'Language')
        {
           $this->db->select("distinct(traffic.user_agent_lang) as lang, count(traffic_id) as users");            
           $this->db->group_by('traffic.user_agent_lang');
        }
        else if($data_type == 'Territory')
        {
           $this->db->select("distinct(traffic.user_country) as lang, count(traffic_id) as users, user_country_code");
           $this->db->group_by('traffic.user_country');
           $this->db->order_by('users', 'DESC');
        }else if($data_type == 'City')
        {
           $this->db->select("distinct(traffic.user_city) as lang, count(traffic_id) as users");
           $this->db->group_by('traffic.user_city');
           $this->db->order_by('users', 'DESC');
        }        
           $this->db->from(TOOL_DB_NAME.'.traffic');
           $this->db->where(array('traffic.user_api_key'=>$user_api_key ));
           $query = $this->db->get();
           $db_results = $query->result_array();
           if (count($db_results) > 0 )
           { 
               return $db_results;
           } else {            
               return  FALSE;
           } 
    }
}
/* End of file demographics_model.php */
?>