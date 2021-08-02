
<?php
require '../common/dbconne.php';

ini_set('display_errors', 'On');
error_reporting(E_ALL);

    $code = $_POST['UomCode'];
    $desc = $_POST['UOMDesc'];
    $Rnd = $_POST['Round'];
    if($Rnd=="") $Rnd='0';
    $RUpto = $_POST['RoundUpto'];
    if($RUpto=="") $RUpto='0';


    $sql = "SELECT * FROM uom WHERE UomCode = '$code'";
$result = $conn->query($sql);

    if ($result->num_rows > 0) {

        die(json_encode("Already exists"));


    }
else{
    
    $conn->autocommit(FALSE);
  //  echo json_encode(array("code"=>$code,"desc"=>$desc,"RoundT"=>$Rnd,"Rupto"=>$RUpto));
   // $conn->query("INSERT INTO `uom`( `UomCode`, `UomDesc`, `RoundT`,'RoundUpto') 
    //VALUES ($code,$desc,$Rnd,$RUpto)");


$stmt = $conn->prepare('INSERT INTO uom (UomCode,UomDesc,RoundT,RoundUpto) VALUES (?,?,?,?)');
$stmt->bind_param('ssii', $code, $desc, $Rnd,$RUpto);

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
