<?php
//fetch.php
$connect = mysqli_connect("localhost", "root", "", "drdo");
$output = '';
$query = "SELECT * FROM details ORDER BY id DESC";
$result = mysqli_query($connect, $query);

while($row = mysqli_fetch_array($result))
{

 echo "<tr>";
 echo "<th >".$row["id"]."</th>";
 echo "<td>".$row["name1"]."</td>";
 echo "<td>".$row["cmpny"]."</td>";
 echo "<td>".$row["purpose"]."</td>";
 echo "<td>".$row["datefrom"]."</td>";
 echo "<td>".$row["dateto"]."</td>";
 echo "<td>".$row["special"]."</td>";
 echo "<tr>";
 
 
}

?>
