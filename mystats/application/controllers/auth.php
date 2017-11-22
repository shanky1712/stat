<?php    if ( ! defined('BASEPATH')) exit('No direct script access allowed');

    /**
     * Controller  : For Google Graph
     * Created on  : 20-03-2014
     * Created By  : Vijayaragavan Sivagurusamy
     * Contact Me  : vijay@haiinteractive.com
     * Project     : mySTATS
     * powered By    : www.haiinteractive.com
     * Version       : 1.0
     */

class Auth extends CI_Controller 
{
    function __construct()
    {
        parent::__construct();                    
        // load the necessary libraries
        $this->load->config('install');
        $this->load->helper(array('form', 'url', 'cookie'));           
    }
    
    /*
     * Function: Index 
     * Purpose : Loading the landing page
     */    
    
    public function Index()
    {
        if( $this->config->item('status') === 0 ){
            $usage = $this->security->xss_clean( $this->input->post('for') );
            if( $usage == 'install')
            {
                    $useremail = $this->security->xss_clean( $this->input->post('useremail') );
                    $userpassword = $this->security->xss_clean( $this->input->post('userpassword') );
                    $credentials = array(
                                'hostname' => $this->security->xss_clean( $this->input->post('hostname') ),
                                'dbname' => $this->security->xss_clean( $this->input->post('dbname') ),
                                'dbusername' => $this->security->xss_clean( $this->input->post('dbusername') ),
                                'dbpassword' => $this->security->xss_clean( $this->input->post('dbpassword') )
                        );
                    foreach( $credentials as $key => $value) {
                            //              STARTS Database.php
                                $Installation_path= $this->config->item('path');
                                $str=implode("",file( $Installation_path[$key]['url'] ));
                                $handle = fopen($Installation_path[$key]['url'], 'w') or die('Cannot open file:  '.$Installation_path[$key]['url']);
                                $str=str_replace($Installation_path[$key]['variable'], "$value",$str);
                                fwrite($handle,$str,strlen($str));
                            // ENDS 

                            //              STARTS SUBTAG Database.php
                                $subtag_path= $this->config->item('subtagpath');
                                $str1=implode("",file( $subtag_path[$key]['url'] ));
                                $handle = fopen($subtag_path[$key]['url'], 'w') or die('Cannot open file:  '.$subtag_path[$key]['url']);
                                $str1=str_replace($subtag_path[$key]['variable'], "$value",$str1);
                                fwrite($handle,$str1,strlen($str1));
                            // ENDS 

                            // STARTS SUBTAG CONFIG.php
                                $url = str_replace('http://', '', base_url() );
                            $subtagjsvariable = $this->config->item('variable');
                                $string2=implode("",file( $this->config->item('subtagjspath') ));
                                $handle2 = fopen($this->config->item('subtagjspath'), 'w') or die('Cannot open file:  '.$subtagjsvariable );
                                $string2=str_replace($subtagjsvariable, $url."subtag",$string2);
                                fwrite($handle2,$string2,strlen($string2));
                            // ENDS
                    }

                        // STARTS -- FINAL STATUS CHANGES
                            $installation_status = $this->config->item('status');
                                $string=implode("",file( $this->config->item('dbpath') ));
                                $handle1 = fopen($this->config->item('dbpath'), 'w') or die('Cannot open file:  '.$installation_status );
                                $string=str_replace($installation_status, "1",$string);
                                fwrite($handle1,$string,strlen($string));
                        // ENDS STATUS CHANGES
                                $this->load->library('core/users');   
                                $created_user = $this->users->CreateNewUser( 2, $useremail, $userpassword );

                                echo 1;
                    die;
            }

        }else{
          redirect(SITE_URL.'home/index');
        }
               $file = 'site/auth/install.html';
               $this->mysmarty->assign('filename',$file);            
               $this->mysmarty->display('home.html'); 

    }
}

/* End of file graph.php */
?>