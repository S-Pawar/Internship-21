
<?php 

// Include config file
require '../common/dbconne.php';

$updateid = intval($_GET['vid']);

//echo '<script>alert("' . $updateid . '")</script>'; 
$sql = "SELECT * FROM vechtype WHERE VehicleID =$updateid";
$result = $conn->query($sql);
$rows = array();
if ($result->num_rows > 0) {
while ($r = $result->fetch_assoc()) {
    $rows = $r;
}
}
echo json_encode($rows);

?>
