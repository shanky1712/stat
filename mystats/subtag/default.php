<?php	

	header('Access-Control-Allow-Origin: *'); 
	
	error_reporting(0);
	require_once 'config/config.php';
	include("lib/geo_lib.inc");
	
	$current_date = date("Y-m-d H:i:s");
	
	$current_pause_date = date("Y-m-d");
	
	if(isset($_GET['k'])){
	
		$key 			= $_REQUEST['k'];
		$event_name 	= $_REQUEST['evtnm'];
		
		$page_label 	= $_REQUEST['response'];
		$sid 			= session_id(); 
		
		$q = mysqli_query($connect, "CALL Check_User_Api('$key')"); 

		$response 		= mysqli_fetch_row($q);
		
		mysqli_free_result($q);   
		mysqli_next_result($connect);   
		
		$scrnsiz 		= $_REQUEST['scrnsiz'];
		$bsiz 			= $_REQUEST['bsiz'];
		$url 			= urldecode( str_replace( array( '%26dot%3B' ), array( '.' ) , $_REQUEST['url']) );
		$lang 			= $_REQUEST['lang'];
		$action_label  	= $_REQUEST['al'];
		$action_value  	= $_REQUEST['av'];
		$bro_name		= $_REQUEST['broname'];		
		$bro_version	= $_REQUEST['brover'];
		$gene_key	= $_REQUEST['gene_key'];
		$referrer		= $_SERVER['HTTP_REFERER'];
		$useragent		= $_REQUEST['useragent'];
		$platform		= $_REQUEST['platform'];
		$cookieset		= $_REQUEST['cookieset'];
		
		
		$s_name			= $_SERVER['SERVER_NAME'];

		$ip				= $_SERVER['REMOTE_ADDR'];
		
		$gi 			= geoip_open("lib/GeoLiteCity.dat", GEOIP_STANDARD);
		
		$record 		= geoip_record_by_addr($gi,$ip);
		
		$country_name	= $record->country_name;
		$country_code	= $record->country_code;
		$region_name	= $record->region_name;
		$region_code	= $record->region_code;
		$latitude	= $record->latitude;
		$longitude	= $record->longitude;
		$time_zone	= $record->time_zone;
		$postal_code	= $record->postal_code;
		$continent_code	= $record->continent_code;
		$city			= $record->city;

		if($response[0] > 0)
		{
			
			$results = mysqli_query($connect, "CALL Check_Pause_Status('$key', '$current_pause_date')");
			
			$pause_id = mysqli_fetch_array($results);
			
			mysqli_free_result($results);   
			mysqli_next_result($connect);   
			
			if($pause_id[0] == 0 || $pause_id[0] == '')
			{
			
				
				
				$tag_query = mysqli_query( $connect, "CALL Check_Events('$event_name')");
				
				$row = mysqli_fetch_row( $tag_query );
				
				mysqli_free_result($tag_query); 
				mysqli_next_result($connect);   
				
				$updat = mysqli_query($connect, "CALL INSERT_TRAFFIC('$key', '$scrnsiz', '$bsiz', '$url', '$lang', '$ip', '$gene_key', '$sid', '$city', '$country_name', '$bro_name', '$bro_version', '$referrer', '$useragent', '$cookieset', '$platform', '$s_name', '$country_code', '$region_name', '$region_code', '$latitude', '$longitude', '$time_zone','$postal_code', '$continent_code', '$current_date')");
								
				mysqli_free_result($updat); 
				mysqli_next_result($connect);   
								
				$traffic_id = mysqli_query($connect, "SELECT max(traffic_id) as ids from traffic");
				
				$rows = mysqli_fetch_row($traffic_id);

				mysqli_free_result($traffic_id); 
				mysqli_next_result($connect);   

				if($action_label !=''){

					$tags = mysqli_query($connect, "CALL Insert_Actions('$rows[0]', '$row[0]', '$key', '$page_label', '$action_label', '$action_value', '$current_date')") or mysqli_error( $tags );
					
					mysqli_free_result($tags); 
					mysqli_next_result($connect);   
				}
				
				echo 1;
				die;
				
			}
			echo mysqli_error();
			die;
		}
		
	}
?>