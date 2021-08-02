
<?php
require '../common/dbconne.php';

ini_set('display_errors', 'On');
error_reporting(E_ALL);

    $VehicleType = $_POST['VehicleType'];
    $desc = $_POST['VehDes'];
    $MaxVol = $_POST['VehMaxVol'];

    $MaxWeight = $_POST['VehMaxWeight'];



    $sql = "SELECT * FROM vechtype WHERE VehicleType = '$VehicleType'";
$result = $conn->query($sql);

    if ($result->num_rows > 0) {

        die(json_encode("Already exists"));


    }
else{
    
    $conn->autocommit(FALSE);
  //  echo json_encode(array("code"=>$code,"desc"=>$desc,"RoundT"=>$Rnd,"Rupto"=>$RUpto));
   // $conn->query("INSERT INTO `uom`( `UomCode`, `UomDesc`, `RoundT`,'RoundUpto') 
    //VALUES ($code,$desc,$Rnd,$RUpto)");


$stmt = $conn->prepare('INSERT INTO vechtype (VehicleType,VehDesc,VehMaxVol,VehMaxWeight) VALUES (?,?,?,?)');
$stmt->bind_param('ssdd', $VehicleType, $desc, $MaxVol,$MaxWeight);
try{

    if (!$stmt->execute()) {
        echo "Commit transaction failed";
        echo $stmt->error;
    
        $conn->rollback();
        exit();

    }
  
    // commit transaction
    $conn->commit();
}
catch(Exception $e) {
    echo 'Message: ' .$e->getMessage();
  }
    // close connection
    
    echo json_encode(array("statusCode"=>200));
    $conn->close();
}
?>
