<?php

// Process delete operation after confirmation
if(isset($_POST["id"]) && !empty($_POST["id"])){
    // Include config file
    require '../common/dbconne.php';
$deleteid = $_POST["id"];
    
    // Prepare a delete statement

    $stmt = $conn->prepare('DELETE FROM uom WHERE UomID = ?');
    $stmt->bind_param('i',$deleteid);
    
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
        echo json_encode(array("id"=>$deleteid));
       // echo json_encode(array("statusCode"=>200));
        $conn->close();
}
?>