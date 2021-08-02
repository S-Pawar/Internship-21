
<?php
require '../common/dbconne.php';

ini_set('display_errors', 'On');
error_reporting(E_ALL);

    $VNumber = $_POST['VNumber'];
    $VehicleTypeID = $_POST['VehicleTypeID'];


    $sql = "SELECT * FROM vehicle WHERE VNumber = '$VNumber'";
$result = $conn->query($sql);

    if ($result->num_rows > 0) {

        die(json_encode("Already exists"));


    }
else{
    
    $conn->autocommit(FALSE);
  //  echo json_encode(array("code"=>$code,"desc"=>$desc,"RoundT"=>$Rnd,"Rupto"=>$RUpto));
   // $conn->query("INSERT INTO `uom`( `UomCode`, `UomDesc`, `RoundT`,'RoundUpto') 
    //VALUES ($code,$desc,$Rnd,$RUpto)");


$stmt = $conn->prepare('INSERT INTO vehicle (VehicleTypeID,VNumber) VALUES (?,?)');
$stmt->bind_param('is', $VehicleTypeID, $VNumber);


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
}
?>
