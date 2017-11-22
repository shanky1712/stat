<?php	 		 	
/**
 * The Country model
 *
 * @category Users
 * @package  None
 * @author   Vijayaragavan Sivagurusamy
 * @license  myanalytics
 * @link     models/site_models.php
 *
 */
 
class Site_Model extends CI_Model
{
        public $_dataMap = ''; 
    function Site_Model()
    {
        parent::__construct();        
         $this->load->database();  
    }
        function AddNewSite( $data )
        {
         $this->db->insert(TOOL_DB_NAME.'.sites', $data);
         return $this->db->insert_id(); 
         }

        function AddSiteAccess( $data )
        {
         $this->db->insert(TOOL_DB_NAME.'.site_access', $data);
         return $this->db->insert_id(); 
         }

         function managesites( $user_id )
         {
        $this->db->select("site_id, site_api_key, site_name, site_url, site_created_on");
        $this->db->from(TOOL_DB_NAME.'.sites');
        $query = $this->db->get();
        $db_results = $query->result_array();    
        if (count($db_results) > 0 )
        {   
            return $db_results;
        } else {            
            return 0;
        } 
     }

     function GetSiteInfo( $site_id )
     {
        $this->db->select("site_id, site_name, site_url, site_created_on");
        $this->db->from(TOOL_DB_NAME.'.sites');
        $this->db->where(array('sites.site_id'=>$site_id));
       $query = $this->db->get();
        $db_results = $query->result_array();    
        if (count($db_results) > 0 )
        {   
            return $db_results[0];
        } else {            
            return 0;
        } 
     }

     function UpdateInfo( $arg, $site_id )
     {
             $this->db->where('sites.site_id', $site_id);
            $this->db->update(TOOL_DB_NAME.'.sites', $arg);
    	return 1;
     }

     function DeleteTraffic( $api_key )
     {
    	$this->db->where('traffic.user_api_key', $api_key);
            $this->db->delete(TOOL_DB_NAME.'.traffic');
    	return 1;     	
     }

     function DeleteSite( $api_key )
     {
    	$this->db->where('sites.site_api_key', $api_key);
            $this->db->delete(TOOL_DB_NAME.'.sites');
    	return 1;     	
     }
}
/* End of file site_model.php */
?>