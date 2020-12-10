<?php 


$dat = date('Y-m-d');
$u_state = $_SESSION['state'];
$u_lg = $_SESSION['lga'];
$u_ward = $_SESSION['ward'];
$acctype = $_SESSION['acctype'];
$logged = $_SESSION['logged'];

if(isset($_GET['logout']) && $_GET['logout'] =="yes"){
doLogout();
}
function doLogout()
{
session_destroy();
header("location:../index.php");
die();
}

function getRecord($table,$where,$value,$record,$conn) { 
    $sql = "SELECT * FROM $table WHERE $where = '$value' ";
    $result = mysqli_fetch_array($conn->query($sql));
    return $result[$record];
}


function countAll($table,$countid,$conn) {
    $sql = "SELECT count($countid) FROM $table";
    $result = mysqli_fetch_array($conn->query($sql));
    return $result[0];
}

function countAny($table,$countid,$where,$value,$conn) {
    $sql = "SELECT count($countid) FROM $table WHERE $where = '$value' ";
    $result = mysqli_fetch_array($conn->query($sql));
    return $result[0];
}



function delData($dtbl,$delid,$bug,$conn,$current){
    $delt = $conn->query("DELETE FROM $dtbl WHERE $delid=$bug");
    if(!$delt){
        return 'error';
    }
    $conn->close();
    header("location:".$current);   
}

if(isset($_GET['action'])){
    $dtbl = $_GET['blet'];
    $bug = $_GET['bug'];
    $delid = $_GET['dis'];
    delData($dtbl,$delid,$bug,$conn,$current);
}

// $resc = mysql_query("select count(student_id) FROM attendance WHERE status = 'present' AND date BETWEEN '$dat 00:00:00' AND '$dat 23:59:59' ");



// function doLog($logtype, $action, $subject, $ipadd ){
// 	$sql = "INSERT INTO biglog (logtype, action, date_time, subject, ipaddy) VALUES('$logtype', '$action', NOW(), '$subject', '$ipadd')" ;
// 	if ( mysql_query($sql) ){ 
// 		return 1 ;
// 	}
// 	else{
// 		return 0 ;
// 	}
// }

?>