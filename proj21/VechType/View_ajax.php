<?php
include '../common/dbconne.php';
$sql = "SELECT * FROM vechtype";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
	while ($row = $result->fetch_assoc()) {
		//	<td><?= $row['RoundT']; ?></td>
?>
		<tr>
			<td><button type="button"  id="<?= $row['VehicleID']; ?>" class="btn btn-link" onclick="updateRecord(this.id)"> <?= $row['VehicleType']; ?></button></td>
			<td><?= $row['VehDesc']; ?></td>
			<td><?= $row['VehMaxVol']; ?></td>
			<td><?= $row['VehMaxWeight']; ?></td>
			<td>
		<button type="button" name="delete" id="<?= $row['VehicleID']; ?>" class="btn btn-danger btn-xs delete" onclick="deleteRecord(this.id)" >
<i class="fa fa-trash"></i></td>
		</tr>
<?php
	}
} else {
	echo "0 results";
}
mysqli_close($conn);


?>