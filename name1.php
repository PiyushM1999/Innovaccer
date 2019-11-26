<?php

$link = mysqli_connect("localhost", "root", "", "drdo");
$number = count($_POST["name"]);
echo $number;
if($number > 1)
{
	for($i=0; $i<$number; $i++)
	{
		if(trim($_POST["name"][$i] != ''))
		{
            $sql = "INSERT INTO details1(name1) VALUES('".mysqli_real_escape_string($link, $_POST["name"][$i])."')";
            
			mysqli_query($link, $sql);
		}
	}
	echo "Data Inserted";
}
else
{
  echo "enter your name";
}
?>