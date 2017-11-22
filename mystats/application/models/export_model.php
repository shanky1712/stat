<?php    	    	
/**
 * The users model
 *
 * @category Users
 * @package  None
 * @author   Vijayaragavan Sivagurusamy
 * @license  myanalytics
 * @link     model/export_model.php
 *
 */
class Export_Model extends CI_Model
{
    public $_dataMap = ''; 
    function Export_Model()
    {
        parent::__construct();        
         $this->load->database();  
    }
   function ExportData( $user_api_key, $start_date, $end_date  )
    {
        $this->db->select("*");
        $this->db->from(TOOL_DB_NAME.'.traffic');
        $this->db->where(array('traffic.user_api_key '=> $user_api_key, 'DATE(traffic.data_created_on)>' => $start_date, 'DATE(traffic.data_created_on)<' => $end_date ));
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
/* End of file export_model.php */
?>