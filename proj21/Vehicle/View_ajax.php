<?php
include '../common/dbconne.php';
$sql = "SELECT vehicle.VehicleID,vehicle.VNumber,vehicle.Approve,vechtype.VehicleType FROM vehicle INNER JOIN vechtype ON vehicle.VehicleTypeID=vechtype.VehicleID ";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
	while ($row = $result->fetch_assoc()) {
		//	<td><?= $row['RoundT']; ?></td>
?>
		<tr>
			<td><button type="button"  id="<?= $row['VehicleID']; ?>" class="btn btn-link" onclick="updateRecord(this.id)"> <?= $row['VNumber']; ?></button></td>
			<td><?= $row['VehicleType']; ?></td>
		
		
		
		<td><?php if(is_null($row['Approve'])) { echo '<i style="color: green;" class="fa fa-check" aria-hidden="true"></i>
' ;} else { echo '<i  style="color: red;" class="fa fa-times" aria-hidden="true"></i>
	' ;}  ?></td>
<td><?php if($row['Approve']=='1') { echo '<i style="color: green;" class="fa fa-check" aria-hidden="true"></i>
' ;} else { echo '<i  style="color: red;" class="fa fa-times" aria-hidden="true"></i>
	' ;}  ?></td>


<td><?php if($row['Approve']=='0') { echo '<i style="color: green;" class="fa fa-check" aria-hidden="true"></i>
' ;} else { echo '<i  style="color: red;" class="fa fa-times" aria-hidden="true"></i>
	' ;}  ?></td>


			
				
	
		</tr>
<?php
	}
} else {
	echo "0 results";
}
mysqli_close($conn);


?>

