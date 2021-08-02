<?php
	include '../common/dbconne.php';
	session_start();
	
	
		$username=$_POST['username'];
		$password=$_POST['password'];
		$check=mysqli_query($conn,"select * from userdata where username='$username' and password='$password'");
		if (mysqli_num_rows($check)>0)
		{
			$_SESSION['username']=$username;
			echo json_encode(array("statusCode"=>200));
			$_SESSION["loggedin"] = true;
        
                            $_SESSION["username"] = $username;
		}
		else{
			echo json_encode(array("statusCode"=>201));
		}
		mysqli_close($conn);
	
?>
