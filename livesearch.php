<?php
include ('adminsession.php');
$q = $_GET['q'];
$sql="SELECT id,name FROM student WHERE name = '".$q."' ";
$result = mysqli_query($conn,$sql);
while($row = mysqli_fetch_array($result)) {
	echo "<strong style='color:blue;'>"."Id:".$row['id']."    Name:".$row['name']."<br>";
}
?>