<?php
	include '../includes/config.php';
	$id=$_POST["ward_id"];
	$result = mysql_query("SELECT * FROM centre where ward_id=$id");
?>
<option value="">Select Center</option>
<?php
while($row = mysql_fetch_array($result)) {
?>
	<option value="<?php echo $row["center_id"];?>"><?php echo $row["center_name"];?></option>
<?php
}
?>