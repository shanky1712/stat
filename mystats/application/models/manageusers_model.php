<?php    	    	
/**
 * The ManageUsers model
 *
 * @category Users
 * @package  None
 * @author   Vijayaragavan Sivagurusamy
 * @license  myanalytics
 * @link     models/manageusers_model.php
 *
 */
class ManageUsers_Model extends CI_Model
{
    public $_dataMap = ''; 
    function City_Model()
    {
        parent::__construct();        
         $this->load->database();  
    }
    function ManageUsers(  )
    {
        $this->db->select(" * ");
        $this->db->from(TOOL_DB_NAME.'.users');
        $query = $this->db->get();
        $db_results = $query->result_array();   
         if (count($db_results) > 0 )
        {   
            return $db_results;
        } else {
             return false;
        } 
    }
    function UpdateUserInfo( $arg, $user_id )
    {
            $this->db->where('users.user_id', $user_id);
            $this->db->update(TOOL_DB_NAME.'.users', $arg);
            return $this->db->last_query();
    }
    function DeleteManageSites( $id )
    {
        $this->db->where('site_access.user_id', $id);
            $this->db->delete(TOOL_DB_NAME.'.site_access');
        return 1;       
    }
    function DeleteUser( $id )
    {
        $this->db->where('users.user_id', $id);
            $this->db->delete(TOOL_DB_NAME.'.users');
        return 1;       
    }

    function GetUserTypes()
    {
        $this->db->select(" * ");
        $this->db->from(TOOL_DB_NAME.'.user_type');
        $query = $this->db->get();
        $db_results = $query->result_array();   
         if (count($db_results) > 0 )
        {   
            return $db_results;
        } else {
             return false;
        } 
    }
    function GetAllSites()
    {
        $this->db->select(" * ");
        $this->db->from(TOOL_DB_NAME.'.sites');
        $query = $this->db->get();
        $db_results = $query->result_array();   
         if (count($db_results) > 0 )
        {   
            return $db_results;
        } else {
             return false;
        } 
    }
    function GetUserInfo( $user_id )
    {
           $this->db->select("*");
           $this->db->from(TOOL_DB_NAME.'.users');
           $this->db->join(TOOL_DB_NAME.'.user_type', 'user_type.user_type_id = users.user_type', 'left'); 
           $this->db->where(array('users.user_id '=>$user_id));
           $this->db->limit(1);
        $query = $this->db->get();
        $db_results = $query->result_array();   
         if (count($db_results) > 0 )
        {   
            return $db_results[0];
        } else {
             return false;
        } 
       }

       function GetAccessableSites( $user_id )
       {
           $this->db->select("CONCAT_WS (',', site_id) as site_id", false );
           $this->db->from(TOOL_DB_NAME.'.site_access');
           $this->db->where(array('site_access.user_id '=>$user_id));
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
/* End of file manageusers_model.php */
?>