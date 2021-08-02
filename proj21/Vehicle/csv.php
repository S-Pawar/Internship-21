<?php 
require '../common/dbconne.php';
$sql = "SELECT * FROM Vehicle";
//$qry = mysqli_query("SELECT * FROM tablename");
$data = "";



$colname = "SHOW COLUMNS FROM Vehicle";
$colnameres = mysqli_query($conn,$colname);
while($row = mysqli_fetch_array($colnameres)){

    $data .= $row['Field']."|";

}


$result = $conn->query($sql);


if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
$data .= "\n".$row['VehicleID']."|".$row['VehicleTypeID']."|".$row['VNumber']."|".$row['Approve'];

   // echo print_r($row);    
}
}
header('Content-Type: application/csv');
header('Content-Disposition: attachment; filename="Vehicle.csv"');
echo $data;
exit();
//print_r($result);
?>
