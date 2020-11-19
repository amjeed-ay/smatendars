<?php 


 
 date_default_timezone_set('GMT');


# ******************** #
# ***** SETTINGS ***** #


// Errors are emailed here.
$contact_email = 'ay_amjeed@outlook.com'; 


// Determine whether we're working on a local server
 // or on the real server:'
 if (stristr($_SERVER['HTTP_HOST'], 'local') || (substr($_SERVER['HTTP_HOST'], 0, 7) ==
'192.168')) {
 $local = TRUE;
 } else {
 $local = FALSE;
 }

 // Determine location of files and the URL of the site:
 // Allow for development on different servers.
 if ($local) {

 // Always debug when running locally:
 $debug = TRUE;

 // Define the constants:
 //The line of code below define the absolute path for the URI
 define ('BASE_URI', 'C:/AppServ/www/attapp');
 // The line of code below define the absolute path for the URL
 define ('BASE_URL', 'http://localhost/attapp/');

 } else {

 define ('BASE_URI', '/public_html/');
define ('BASE_URL', 'http://www.smavators.com/');

 }

 
# ************************** #
# ***** DATABASE STUFF ***** #

 $dbcn = mysql_connect('localhost','root','onetwoten');
		if (!$dbcn){
					exit('<div> unable to connect to server </div>');
				}
				
		if (!mysql_select_db('eas')){
			exit('<div> unable to connect to the database </div>');
			}
		
@session_start();
?>
