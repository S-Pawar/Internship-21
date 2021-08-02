<?php
include '../common/dbconne.php';
$sql = "SELECT vehicle.VehicleID,vehicle.VNumber,vehicle.Approve,vechtype.VehicleType FROM vehicle INNER JOIN vechtype ON vehicle.VehicleTypeID=vechtype.VehicleID AND vehicle.Approve IS NULL   ";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
	while ($row = $result->fetch_assoc()) {
		//	<td><?= $row['RoundT']; ?></td>
?>
		<tr>
			<td><button type="button"  id="<?= $row['VehicleID']; ?>" class="btn btn-link" onclick="updateRecord(this.id)"> <?= $row['VNumber']; ?></button></td>
			<td><?= $row['VehicleType']; ?></td>
		
			

            <td><input name="pendingchk" class="form-check-input" type="checkbox" value="<?= $row['VehicleID']; ?>"></td>
		</tr>
<?php
	}
} else {
	echo "0 results";
}
mysqli_close($conn);


?>

