
<?php
require '../common/dbconne.php';

ini_set('display_errors', 'On');
error_reporting(E_ALL);
header("Content-Type: application/json", true);
$json_str = file_get_contents('php://input');
$json_obj = json_decode($json_str ,TRUE) ;

   // echo json_encode($json_obj['approve']);
   // $conn->query("INSERT INTO `uom`( `UomCode`, `UomDesc`, `RoundT`,'RoundUpto') 
    //VALUES ($code,$desc,$Rnd,$RUpto)");
    $approve =  $json_obj['approve'];
    unset($json_obj['approve']);
   // echo $approve;
$conn->autocommit(FALSE);
foreach ($json_obj as $value) {

    $stmt = $conn->prepare('UPDATE vehicle SET Approve=? WHERE VehicleID=?') ;
$stmt->bind_param('ii', $approve,$value);

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
}
echo json_encode(array("statusCode"=>200,"approve"=>$approve));
$conn->close();
?>
