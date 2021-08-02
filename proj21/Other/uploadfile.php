
<?php include "../common/session.php" ?>
<?php
 global $name;
 $something="";
 if(isset($_POST["submit"])) {

    // $file = fopen($_FILES("filename"),"r");

   
     
$something=nl2br(file_get_contents($_FILES['filename']['tmp_name'])); 
}



?>

<!DOCTYPE html>
<html lang="en">

    <meta charset="UTF-8">



<head>


    <?php include "../common/comHeader.html" ?>

    

</head>


<body>

<?php include "../common/nav.html" ?>
<?php include "../common/comSidebar.html" ?>




<div id="mainContent">
<h2 class="mt-5">Read File</h2>

<form action=""  method=POST enctype=multipart/form-data> 
<input type="file" id="myFile" name="filename" accept=".txt,.csv">
<input type="submit" name="submit" value="submit">
</form>
<hr>
<div><?php echo $something; ?></div>




    </div>



<?php include "../common/comScript.html" ?>


</body>
</html>