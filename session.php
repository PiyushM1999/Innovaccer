<?php
session_start();

if(array_key_exists("id",$_COOKIE)){
	$_SESSION['id']=$_COOKIE['id'];
}
if(array_key_exists("id",$_SESSION)){
      $idm=$_SESSION['id'];
header("Location:index.php?id=$idm");
}
   

else{
	header("Location:loginpg.php");
}
?>