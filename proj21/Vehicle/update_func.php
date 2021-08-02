
<?php
require '../common/dbconne.php';

ini_set('display_errors', 'On');
error_reporting(E_ALL);
    $VehicleID = $_POST['VehicleID'];
    $VNumber = $_POST['VNumber'];
    $VehicleTypeID = $_POST['VehicleTypeID'];


;

    $conn->autocommit(FALSE);
  //  echo json_encode(array("code"=>$code,"desc"=>$desc,"RoundT"=>$Rnd,"Rupto"=>$RUpto));
   // $conn->query("INSERT INTO `uom`( `UomCode`, `UomDesc`, `RoundT`,'RoundUpto') 
    //VALUES ($code,$desc,$Rnd,$RUpto)");


$stmt = $conn->prepare('UPDATE vehicle SET VNumber=?,VehicleTypeID=? WHERE VehicleID=?') ;
$stmt->bind_param('iii', $VNumber, $VehicleTypeID,$VehicleID);


    if (!$stmt->execute()) {
        echo "Commit transaction failed";
        echo $stmt->error;

        $conn->rollback();
        exit();

    }

    // commit transaction
    $conn->commit();
    
    // close connection
    
    echo json_encode(array("statusCode"=>200));
    $conn->close();
?>
