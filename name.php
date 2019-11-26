<?php
//insert.php
$connect = mysqli_connect("localhost", "root", "", "drdo");
if(isset($_POST["name"]))
{
 $item_name = $_POST["name"];
 $item_dept = $_POST["department"];
 $item_purpose = $_POST["purpose"];
 $item_date = $_POST["date"];
 $item_dateto = $_POST["dateto"];
 $item_gadget = $_POST["gadget"];
 $query = "INSERT INTO details(name) 
 VALUES($item_name)";
$result=mysqli_query($link,$query);
}
?>
