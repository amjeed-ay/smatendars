<?
$action = $_GET['action'];
$logout = $_GET['logout'];
$bug = $_GET['bug'];
$u_state = $_SESSION['state'];
$u_lg = $_SESSION['lga'];
$u_ward = $_SESSION['ward'];

$acctype = $_SESSION['acctype'];
$logged = $_SESSION['logged'];
function randomString($randStringLength)
	{
	$timestring = microtime();
	$secondsSinceEpoch=(integer) substr($timestring, strrpos($timestring, " "), 100);
	$microseconds=(double) $timestring;
	$seed = mt_rand(0,1000000000) + 10000000 * $microseconds + $secondsSinceEpoch;
	mt_srand($seed);
	$randstring = "";
	for($i=0; $i < $randStringLength; $i++)
		{
		$randstring .= mt_rand(0, 9);
		}
	return($randstring);
	}

if(isset($logout) && $logout=="yes"){
doLogout();
}
function doLogout()
{
session_destroy();
header("location:../index.php");
die();
}


function GetAny ($table, $value, $where, $the_output, $debug = 0) {

	$query = "SELECT *
		FROM $table
		WHERE $where='$value'
		LIMIT 1";
	$result = mysql_query($query);
	if($result){
		$row = mysql_fetch_array($result);
		$num = mysql_num_rows($result);

		// $programme_id = $row["programme_id"];
		$the_output = $row["$the_output"]; 

		$the_output = stripslashes($the_output);

		return $the_output;
	}
	else{
		if($debug){
			return "Debugging . .".mysql_error()." . .".$query ;
		}
		else{
			return "The Query Failed";
		}
	}
}


function GetMany ($table, $value, $where) {

$query = "SELECT *
	FROM $table
	WHERE $where='$value'
	LIMIT 1";
$result = mysql_query($query);
$row = mysql_fetch_array($result);
$num = mysql_num_rows($result);

/* $programme_id = $row["programme_id"];
$the_output = $row["$the_output"]; 

$the_output = stripslashes($the_output);
*/
return $row;
}


function insertPrivilege($privtype, $dept_user, $privdept){
	
	global $err_msg ; //u this to send in case of errors
	
	if($privtype and $dept_user and $privdept){
		//do check
		$sql = "SELECT * FROM privileges WHERE priv_type = '$privtype' AND dept_user = '$dept_user' AND priv_dept = '$privdept' " ;
		$res = mysql_query($sql) ; 
		
		if(mysql_num_rows($res)){		
			return 0 ;
		}
		else{
			$sql2  = "INSERT INTO privileges (priv_type, dept_user, priv_dept) VALUES('$privtype','$dept_user','$privdept') " ; 
			if(mysql_query($sql2)){
				
				return 1 ;
			}
			else{
				return 0 ;
			}
		}
	
	}
	
}


function getDeptPrivileges($dept_id) {
	$sql = "SELECT priv_dept FROM privileges WHERE dept_user = '$dept_id' AND priv_type = 'dept' " ;
	$res = mysql_query($sql) ;
	
	if(mysql_num_rows($res)){
		while($row =  mysql_fetch_array($res) ){
			$ret_arr[] = $row['priv_dept'] ;
		}
	}
	else{
		$ret_arr = array(0) ;
	}
	
	return $ret_arr ;
}



function getUserPrivileges($user_id, $limits) {
	$sql = "SELECT priv_dept FROM privileges WHERE dept_user = '$user_id' AND priv_type = 'user' " ;
	$res = mysql_query($sql) ;
	echo mysql_error() ;
	if(mysql_num_rows($res)){
		while($row =  mysql_fetch_array($res) ){
			$ret_arr[] = $row['priv_dept'] ;
		}
	}
	else{
		if($limits == 'user_only'){
			$ret_arr = array(0) ;
		}
		elseif($limits == 'all'){
			$ddept = GetAny('user', $user_id, 'user_id','dept_id') ; 
			$sql2 = "SELECT priv_dept FROM privileges WHERE dept_user = '$ddept' AND priv_type = 'dept' " ;
			$res2 = mysql_query($sql2) ; //echo $sql2 ;
			
			if(mysql_num_rows($res2)){
				while($row2 =  mysql_fetch_array($res2) ){
					$ret_arr[] = $row2['priv_dept'] ;
				}
			}
			else{
				$ret_arr = array(0) ;
			}
			
			
		}
	}
	
	return $ret_arr ;
}


function additional_query_condition($priv_arr){
	if(is_array($priv_arr)){
		
		$qry_add = "" ;
		if(count($priv_arr) > 1){
			$comma = 0 ;
			foreach($priv_arr as $val){
				if($comma){
					$qry_add .= "," ;
				}
				$qry_add .= "$val" ;
				$comma = 1 ;
			}
		}
		else{
			$qry_add = $priv_arr[0] ;
		}	
	}
	else{
		$qry_add = $priv_arr[0] ;
	}
	
	return $qry_add ;
}



function getUserPrivileges_mysqli($user_id, $limits, $conn) {
	$sql = "SELECT priv_dept FROM privileges WHERE dept_user = '$user_id' AND priv_type = 'user' " ;
	$res = $conn->query($sql) ;
	//echo $sql ;
	if($res->num_rows){
		while($row =  $res->fetch_array() ){
			//print_r($row) ;
			$ret_arr[] = $row['priv_dept'] ;
		}
	}
	else{
		if($limits == 'user_only'){
			$ret_arr = array(0) ;
		}
		elseif($limits == 'all'){
			//$ddept = GetAny('user', $user_id, 'user_id','dept_id') ; 
			$res3 = $conn->query("SELECT dept_id FROM user WHERE user_id = '$user_id' " ) ;
			$row3 = $res3->fetch_array() ;
			$ddept = $row3['dept_id'] ;
			
			$sql2 = "SELECT priv_dept FROM privileges WHERE dept_user = '$ddept' AND priv_type = 'dept' " ;
			$res2 = $conn->query($sql2) ; //echo $sql2 ;
			
			if($res2->num_rows){
				while($row2 =  $res2->fetch_array() ){
					$ret_arr[] = $row2['priv_dept'] ;
				}
			}
			else{
				$ret_arr = array(0) ;
			}
			
			
		}
	}
	
	return $ret_arr ;
}


function doLog($logtype, $action, $subject, $ipadd ){
	$sql = "INSERT INTO biglog (logtype, action, date_time, subject, ipaddy) VALUES('$logtype', '$action', NOW(), '$subject', '$ipadd')" ;
	if ( mysql_query($sql) ){ 
		return 1 ;
	}
	else{
		return 0 ;
	}
}

function space_string($dstr, $per_grp){
	$j = 0 ;
	$retstr = "" ;
	$dlen = strlen($dstr) ;
	for($i = 0; $i < $dlen; $i++ ) {
		$j++ ;
		$retstr .= $dstr[$i] ;
		if($j == $per_grp){
			$retstr .= " " ;
			$j = 0 ;
		}
	}
	return $retstr ;
}


function checkSimilarProduct($dept, $prod) {
	$sql = "SELECT * FROM products WHERE pd_name LIKE '$prod' AND dept_id = '$dept' " ;
	$res = mysql_query($sql) ;
	
	return mysql_num_rows($res) ;
}


function checkSimilarNhis($name, $num) {
	$sql = "SELECT * FROM nhis_list WHERE nl_names LIKE '$name' AND nl_num LIKE '$num' " ;
	$res = mysql_query($sql) ;
	
	return mysql_num_rows($res) ;
}

function multi_units($dept){
	$sql = "SELECT * FROM sub_unit WHERE su_dept = '$dept' " ;
	$res = mysql_query($sql) ; //echo mysql_error() ;
	$num_units = mysql_num_rows($res) ;
	 if( $num_units > 1){
		 return $num_units ;
	 }
	 else{
		 return 0 ;
	 }
}
?>