
<?php 

// Include config file
require '../common/dbconne.php';



//echo '<script>alert("' . $updateid . '")</script>'; 
$sql = "SELECT vehicleid,vehicletype from vechtype";
$result = $conn->query($sql);
$rows = array();
if ($result->num_rows > 0) {
while ($r = $result->fetch_assoc()) {
    $rows[] = $r;
}
}
echo json_encode($rows);

?>
