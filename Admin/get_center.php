<?php
	require_once '../includes/config.php';
	$id=$_POST["ward_id"];
	$result = $conn->query("SELECT * FROM centre where ward_id=$id");
?>
<option value="">Select Center</option>
<?php
while($row = mysqli_fetch_array($result)) {
?>
	<option value="<?php echo $row["center_id"];?>"><?php echo $row["center_name"];?></option>
<?php
}
?>