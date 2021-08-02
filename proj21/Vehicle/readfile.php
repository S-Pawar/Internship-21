<?php


if(isset($_POST["submit"])) {

 // $file = fopen($_FILES("filename"),"r");

 
echo file_get_contents($_FILES['filename']['tmp_name']); 
}






?> 