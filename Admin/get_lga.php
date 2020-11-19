<?php
	include '../includes/config.php';
	$state_id=$_POST["state_id"];
	
	$result = mysql_query("SELECT * FROM lga where state_id=$state_id");
?>
<option value="">Select LGA</option>
<?php
while($row = mysql_fetch_array($result)) {
?>
	<option   value="<?php echo $row["lga_id"];?>"><?php echo $row["lga_name"];?></option>
<?php
}
?>