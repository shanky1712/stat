<?php     if ( ! defined('BASEPATH')) exit('No direct script access allowed');
    /**
     * Controller  : For Overview
     * Created on  : 20-03-2014
     * Created By  : Vijayaragavan Sivagurusamy
     * Contact Me  : vijay@haiinteractive.com
     * Project     : mySTATS
     * powered By    : www.haiinteractive.com
     * Version       : 1.0
     */
class ManageUsers extends CI_Controller 
{
    function __construct()
    {
        parent::__construct();                    
        // load the necessary libraries
        $this->load->library('form_validation');   
        $this->load->helper(array('form', 'url', 'cookie'));           
        $this->load->library('core/users');   
        $this->load->library('core/sh_manageusers');   
    }
    /*
     * Function: Index 
     * Purpose : Loading the landing page
     */    
    public function Index()
    {
       $userdata = $this->session->userdata('mystat');
        $file = 'site/manageusers.html';
        $manageusers = $this->sh_manageusers->ManageUsers(  );
        $this->mysmarty->assign('user', $userdata);
        $this->mysmarty->assign('manageusers', $manageusers);
        $this->mysmarty->assign('filename',$file);
        $this->mysmarty->display('home.html'); 
    }

    public function Add()
    {
       $userdata = $this->session->userdata('mystat');
        $usertypes = $this->sh_manageusers->GetUserTypes(  );
        $list_out_sites = $this->sh_manageusers->GetAllSites(  );
        $usuage = $this->security->xss_clean( $this->input->post('for') );
        if($usuage == 'add_new_user')
        {
                $user_type =  $this->security->xss_clean( $this->input->post('user_type') );
                $user_email =  $this->security->xss_clean( $this->input->post('input_username') );
                $user_password =  $this->security->xss_clean( $this->input->post('input_password') ) ;
               $created_user = $this->users->CreateNewUser( $user_type, $user_email, $user_password );
                if( isset($created_user) && $created_user != 'exist')
                {
                        $sites =  explode(',', $this->security->xss_clean( $this->input->post('sites') ) );
                        $arg = array();
                        foreach( $sites as $key => $value )
                        {
                            $arg[$key]['site_id'] = $value;
                            $arg[$key]['user_id'] = $created_user;
                            $arg[$key]['created_on'] = date('Y-m-d H:i:s');
                        }
                            $outcome = $this->users->CreateManageSites( $arg );
                        echo $created_user;
                        die;
                }else{
                    echo $created_user;
                    die;
                }
        }

        $file = 'site/add_new_user.html';
        $this->mysmarty->assign('user', $userdata);
        $this->mysmarty->assign('usertypes', $usertypes);
        $this->mysmarty->assign('list_out_sites', $list_out_sites);
        $this->mysmarty->assign('filename',$file);
        $this->mysmarty->display('home.html'); 
    }
    public function edit( $id )
    {
       $userdata = $this->session->userdata('mystat');
        $info = $this->sh_manageusers->GetUserInfo( $id  );
        $usuage = $this->security->xss_clean( $this->input->post('for') );
        if($usuage == 'edit_user')
        {
                $user_type = $this->security->xss_clean( $this->input->post('user_type') );
                $input_username = $this->security->xss_clean( $this->input->post('input_username') );
                $input_password = $this->security->xss_clean( $this->input->post('input_password') );
                $update = $this->sh_manageusers->UpdateUserInfo( $user_type, $input_username, $input_password, $id );
                if( $update )
                {
                       $delete = $this->sh_manageusers->DeleteManageSites( $id );
                        $sites =  explode(',', $this->security->xss_clean( $this->input->post('sites') ) );
                        $arg = array();
                        foreach( $sites as $key => $value )
                        {
                            $arg[$key]['site_id'] = $value;
                            $arg[$key]['user_id'] = $id;
                            $arg[$key]['created_on'] = date('Y-m-d H:i:s');
                        }
                            $outcome = $this->users->CreateManageSites( $arg );                    
                            print_r($outcome) ;
                            die;
                }else{
                        echo 'error';
                        die;
                }
        }
        $user_types = $this->sh_manageusers->GetUserTypes( );
        $sites = $this->sh_manageusers->GetAllSites( );
        $accessable_sites = $this->sh_manageusers->GetAccessableSites( $id );
        $arg_sites = array();
            foreach( $accessable_sites as $acc_sites){
                $arg_sites[] = $acc_sites['site_id'];
            }
           $file = 'site/edit_user.html';
            $this->mysmarty->assign('user_types', $user_types);
            $this->mysmarty->assign('user', $userdata);
            $this->mysmarty->assign('accessable_sites', $arg_sites);
            $this->mysmarty->assign('sites', $sites);
           $this->mysmarty->assign('info',$info);            
           $this->mysmarty->assign('filename',$file);
        $this->mysmarty->display('home.html'); 

    }
    public function delete( )
    {
            $user_id = $this->security->xss_clean( $this->input->post('user_id') );
        $usuage = $this->security->xss_clean( $this->input->post('for') );
        if($usuage == 'del')
        {
                $delete_user = $this->sh_manageusers->DeleteUser( $user_id );
                echo 1;
                die;
        }   
    }
 }
/* End of file manageusers.php */
?>