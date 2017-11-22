<?php	 
$config['path'] = array(    
                'hostname'              => array('variable'=>'[%HOSTNAME%]','url'=>DIR_NAME.'/application/config/database.php'),
                'dbname'              => array('variable'=>'[%DBNAME%]','url'=>DIR_NAME.'/application/config/database.php'),
                'dbusername'              => array('variable'=>'[%USERNAME%]','url'=>DIR_NAME.'/application/config/database.php'),
                'dbpassword'              => array('variable'=>'[%USERPASSWORD%]','url'=>DIR_NAME.'/application/config/database.php'),
        ); 

$config['status'] = 1;
$config['dbpath'] = DIR_NAME.'/application/config/install.php';

$config['subtagpath'] = array(    
                'hostname'              => array('variable'=>'[%HOSTNAME%]','url'=>DIR_NAME.'/subtag/config/config.php'),
                'dbname'              => array('variable'=>'[%DBNAME%]','url'=>DIR_NAME.'/subtag/config/config.php'),
                'dbusername'              => array('variable'=>'[%USERNAME%]','url'=>DIR_NAME.'/subtag/config/config.php'),
                'dbpassword'              => array('variable'=>'[%USERPASSWORD%]','url'=>DIR_NAME.'/subtag/config/config.php'),
        ); 

$config['variable'] = '[%DEFAULT_PATH%]';
$config['subtagjspath'] = DIR_NAME.'/subtag/hii.js';
