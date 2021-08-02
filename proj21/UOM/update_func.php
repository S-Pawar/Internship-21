
<?php
require '../common/dbconne.php';

ini_set('display_errors', 'On');
error_reporting(E_ALL);
    $UomID = $_POST['UomID'];
    $code = $_POST['UomCode'];
    $desc = $_POST['UOMDesc'];
    $Rnd = $_POST['Round'];
    if($Rnd=="") $Rnd='0';
    $RUpto = $_POST['RoundUpto'];
    if($RUpto=="") $RUpto='0';
    $conn->autocommit(FALSE);
  //  echo json_encode(array("code"=>$code,"desc"=>$desc,"RoundT"=>$Rnd,"Rupto"=>$RUpto));
   // $conn->query("INSERT INTO `uom`( `UomCode`, `UomDesc`, `RoundT`,'RoundUpto') 
    //VALUES ($code,$desc,$Rnd,$RUpto)");


$stmt = $conn->prepare('UPDATE uom SET UomCode=?,UomDesc=?,RoundT=?,RoundUpto=? WHERE UomID=?') ;
$stmt->bind_param('ssiii', $code, $desc, $Rnd,$RUpto,$UomID);

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
