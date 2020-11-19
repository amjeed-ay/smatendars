<?php
	include '../includes/config.php';
	$id=$_POST["lga_id"];
	$result = mysql_query("SELECT * FROM ward where lga_id=$id");
?>
<option value="">Select Ward</option>
<?php
while($row = mysql_fetch_array($result)) {
?>
	<option value="<?php echo $row["ward_id"];?>"><?php echo $row["ward_name"];?></option>
<?php
}
?>