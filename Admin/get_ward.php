<?php
	require_once '../includes/config.php';
	$id=$_POST["lga_id"];
	$result = $conn->query("SELECT * FROM ward where lga_id=$id");
?>
<option value="">Select Ward</option>
<?php
while($row = mysqli_fetch_array($result)) {
?>
	<option value="<?php echo $row["ward_id"];?>"><?php echo $row["ward_name"];?></option>
<?php
}
?>