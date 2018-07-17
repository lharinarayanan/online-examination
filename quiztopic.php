<?php
include ('adminsession.php');
$q = $_GET['q'];
$sql="SELECT testname FROM createtest WHERE testname = '".$q."' ";
$result = mysqli_query($conn,$sql);
while($row = mysqli_fetch_array($result)) {
	echo "<strong style='color:blue;'>"."Name:".$row['testname']."<br>";
}
?>