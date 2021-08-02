
<?php
require '../common/dbconne.php';

ini_set('display_errors', 'On');
error_reporting(E_ALL);
    $VechicleID = $_POST['VechicleID'];
    $VehicleType = $_POST['VehicleType'];
    $VehDes = $_POST['VehDes'];
    $VehMaxVol = $_POST['VehMaxVol'];

    $VehMaxWeight = $_POST['VehMaxWeight'];

    $conn->autocommit(FALSE);
  //  echo json_encode(array("code"=>$code,"desc"=>$desc,"RoundT"=>$Rnd,"Rupto"=>$RUpto));
   // $conn->query("INSERT INTO `uom`( `UomCode`, `UomDesc`, `RoundT`,'RoundUpto') 
    //VALUES ($code,$desc,$Rnd,$RUpto)");


$stmt = $conn->prepare('UPDATE vechtype SET VehicleType=?,VehDesc=?,VehMaxVol=?,VehMaxWeight=? WHERE VehicleID=?') ;
$stmt->bind_param('ssddi', $VehicleType, $VehDes, $VehMaxVol,$VehMaxWeight,$VechicleID);

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
?>
