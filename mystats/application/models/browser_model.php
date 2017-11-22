<?php                  
/**
 * The Language model
 * @category Browser
 * @package  None
 * @author   Vijayaragavan Sivagurusamy
 * @license  myanalytics
 * @link     model/browser_model.php
 *
 */
class Browser_Model extends CI_Model
{
     public $_dataMap = ''; 
    function Browser_Model()
    {
        parent::__construct();        
         $this->load->database();  
    }
    function GetBrowserDetails( $api_key, $perPage, $fromStart, $lang_code  )
    {
        $this->db->select("*");
        $this->db->order_by('traffic.traffic_id', 'DESC');
        $this->db->from(TOOL_DB_NAME.'.traffic');
        $this->db->where(array( 'traffic.user_api_key'=>$api_key, 'traffic.user_browser_name' => $lang_code ));
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
/* End of file Browser_Model.php */
?>