<?php
   include('adminsession.php');
   //$ses_empho = mysqli_query($conn,"SELECT * FROM student");
 ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" content="viewtest" description="viewatest">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>View a test</title>
	<style type="text/css">
		body {
               font-family: "Lato", sans-serif;
               background-color: pink;
             }
       .header{
       	background-color: green;
       }
	</style>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
  <div class="container bg-danger">
  	<div class="page-header">
  		<h2 style="text-align: right;color: rgb(255,255,255);"><a href="adminlogout.php">Sign Out</a></h2>
        <h2 style="text-align: right;color: rgb(255,255,255);"><a href="adminhome.php">Go To Home</a></h2>
        <h1 style="font-size: 40px;font-weight: bold; color:brown">Manage your Test Settings Here</h1>
    </div>
    <table class="table table-striped">
    <thead style="font-weight: bold;color:purple;font-size: 20px;">
    <tr>
      <th scope="col">Action</th>
      <th scope="col">Process</th>
    </tr>
  </thead>
    <tbody style="font-weight: bold;color: orange;">
    <tr>
      <td>CREATE A NEW TEST SUBJECT</td>
      <td><button class="btn btn-success" onclick="location.href = 'adtestadd.php';">Start</button></td>
    </tr>
    <tr>
      <td>SHOW/DELETE/EDIT QUIZ EXAMS</td>
      <td><button class="btn btn-success" onclick="location.href = 'adtestshow.php';">Start</button></td>
    </tr>
    <tr>
      <td>INSERT NEW QUESTIONS</td>
      <td><button class="btn btn-success" onclick="location.href = 'adtestqins.php';">Start</button></td>
    </tr>
    <tr>
      <td>SHOW/DELETE/MODIFY QUESTIONS</td>
      <td><button class="btn btn-success" onclick="location.href = 'adtestqmodify.php';" >Start</button></td>
    </tr>
   </tbody>
  </table>

</body>
</html>