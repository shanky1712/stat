<?php              
/**
 * The Behaviour model
 *
 * @category Users
 * @package  None
 * @author   Vijayaragavan Sivagurusamy
 * @license  myanalytics
 * @link     libraries/core/sh_behaviour.php
 *
 */
 
class Behaviour_Model extends CI_Model
{
     public $_dataMap = ''; 
    function Behaviour_Model()
    {
        parent::__construct();        
         $this->load->database();  
    }

    function GetAllTags( $user_api_key, $start_date, $end_date )
    {
        $this->db->select("distinct( actions.action_label ) as label, count(actions.action_label) as total_visits");
        $this->db->from(TOOL_DB_NAME.'.actions');
        $this->db->where(array('actions.user_api_key'=>$user_api_key, "actions.action_label !="=> '' ));        
        $this->db->where("DATE(`tag_created_on`) BETWEEN '$start_date' AND '$end_date' ");
        $this->db->group_by('actions.action_label');
        $query = $this->db->get();
       $db_results = $query->result_array();         
        if (count($db_results) > 0 )
        { 
            return $db_results;
        } else {            
            return  FALSE;
        } 
    }
    function GetTagDetails( $type, $tag, $user_api_key )
    {
        if($type == 1)
        {
            $this->db->select("count(distinct actions.tag_id) as total, DATE(actions.tag_created_on) as dates");
            $this->db->from(TOOL_DB_NAME.'.actions');
            $this->db->where(array('actions.user_api_key'=>$user_api_key, "actions.action_label" => $tag ));
            $this->db->group_by('DATE(`tag_created_on`) ');
            $this->db->order_by('actions.tag_created_on', 'ASC');
        }
        $query = $this->db->get();
        $db_results = $query->result_array();         
        if (count($db_results) > 0 )
        { 
            return $db_results;
        } else {            
            return  FALSE;
        } 
    }
    function GetAllBrowsers($api)
    {
            $this->db->select("distinct(traffic.user_browser_name) as browser_name");
            $this->db->from(TOOL_DB_NAME.'.traffic');
            $this->db->where(array('traffic.user_api_key'=>$api));
            $query = $this->db->get();
            $db_results = $query->result_array();
            if (count($db_results) > 0 )
            { 
                return $db_results;
            } else {            
                return  FALSE;
            } 
    }
    function GetData( $browser, $api_key )
    {
            $this->db->select("*");
            $this->db->from(TOOL_DB_NAME.'.traffic');
            $this->db->where(array('traffic.user_api_key'=>$api_key, "traffic.user_browser_name" => $browser));
            $query = $this->db->get();
            $db_results = $query->result_array();
            if (count($db_results) > 0 )
            { 
                return $db_results;
            } else {            
                return  FALSE;
            } 
    }
    public function GetAllDatas($api_key, $data_type)
    {
        if($data_type == ''){
            $this->db->select("actions.action_label as label, count(actions.tag_id) as visits");
            $this->db->from(TOOL_DB_NAME.'.traffic');
            $this->db->join(TOOL_DB_NAME.'.actions', 'actions.traffic_id = traffic.traffic_id', 'left');            
            $this->db->where(array('traffic.user_api_key'=>$api_key, 'actions.user_api_key' => $api_key, 'actions.action_label !=' => ''));
            $this->db->group_by("actions.action_label");
        }else if($data_type){
            $this->db->select("actions.action_label as label, count(actions.tag_id) as visits");
            $this->db->from(TOOL_DB_NAME.'.traffic');
            $this->db->join(TOOL_DB_NAME.'.actions', 'actions.traffic_id = traffic.traffic_id', 'left');            
            $this->db->where(array('traffic.user_api_key'=>$api_key, 'actions.user_api_key' => $api_key, 'actions.action_label ' => $data_type));
            $this->db->group_by("actions.action_label");
        }
            $query = $this->db->get();
            $db_results = $query->result_array();
            if (count($db_results) > 0 )
            { 
                return $db_results;
            } else {            
                return  FALSE;
            } 
    }
    function LabelDetails( $user_api_key, $label, $start_dt, $end_dt, $country, $country_code, $limit_of  )
    {
        $this->db->select("count(traffic.user_ip) as total, DATE(traffic.data_created_on) as dates");
        $this->db->from(TOOL_DB_NAME.'.traffic');
        $this->db->join(TOOL_DB_NAME.'.actions', 'actions.traffic_id = traffic.traffic_id', 'left');            
        $this->db->where(array('traffic.user_api_key '=>$user_api_key));
        $this->db->where(array('actions.action_label'=>$label));        
        $this->db->where("DATE(`data_created_on`) BETWEEN '$start_dt' AND '$end_dt' ");
        /*
         * By dafault country & country code is 0
         */
        $whare = "( traffic.user_country = '".$country."' OR traffic.user_country_code = '".$country_code."' )";
        if($country != $country_code )
        {
            $this->db->where($whare);
        }
        $this->db->group_by(" DATE(`data_created_on`)");
        $this->db->order_by("traffic.data_created_on", ASC);            
        $this->db->limit($limit_of);
        $query = $this->db->get();
        $db_results = $query->result_array();         
        if (count($db_results) > 0 )
        { 
            return $db_results;
        } else {            
            return  FALSE;
        } 
    }
    function GetlabelDetails( $api_key, $perPage, $fromStart, $code, $date  )
    {
/*        $this->db->select("*");
        $this->db->from(TOOL_DB_NAME.'.traffic');
        $this->db->join(TOOL_DB_NAME.'.actions', 'actions.traffic_id = traffic.traffic_id', 'left');
        $this->db->where(array( 'traffic.user_api_key'=>$api_key, 'actions.action_label' => $code['label']));
        $this->db->where(array( DATE('actions.tag_created_on') => "$date" ));
        $this->db->order_by('traffic.traffic_id', 'DESC');
        $this->db->limit( $perPage, $fromStart);
*/        
        $query = $this->db->query("SELECT * FROM traffic  t LEFT JOIN actions a ON a.traffic_id = t.traffic_id WHERE t.user_api_key = '".$api_key."' AND a.action_label = '".$code['label']."' AND DATE(a.tag_created_on)  = '".$date."' ORDER BY t.data_created_on DESC LIMIT $fromStart, $perPage") or die(mysql_error($query));
        $db_results = $query->result_array();       
         if (count($db_results) > 0 )
        {   
            return $db_results;
        } else {
             return false;
        } 
    }
}
/* End of file behaviour_model.php */
?>