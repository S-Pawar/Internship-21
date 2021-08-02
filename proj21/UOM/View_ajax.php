<?php
include '../common/dbconne.php';
$sql = "SELECT * FROM uom";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
	while ($row = $result->fetch_assoc()) {
		//	<td><?= $row['RoundT']; ?></td>
?>
		<tr>
			<td><button type="button"  id="<?= $row['UomID']; ?>" class="btn btn-link" onclick="updateRecord(this.id)"> <?= $row['UomCode']; ?></button></td>
			<td><?= $row['UomDesc']; ?></td>
			<td><input type="checkbox" disabled  <?php if($row['RoundT'] === '1') echo 'checked="checked"';?>></td>
		
			<td><?= $row['RoundUpto']; ?></td>
			<td>
		<button type="button" name="delete" id="<?= $row['UomID']; ?>" class="btn btn-danger btn-xs delete" onclick="deleteRecord(this.id)" >
<i class="fa fa-trash"></i></td>
		</tr>
<?php
	}
} else {
	echo "0 results";
}
mysqli_close($conn);


?>