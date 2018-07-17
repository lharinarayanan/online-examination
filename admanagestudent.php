<?php
   include('adminsession.php');
   $ses_empho = mysqli_query($conn,"SELECT name,subject,score,feedback,testtime FROM result ORDER BY testtime asc");
   $ab="";
 ?>

<!-- Use for delete <a href="#">
          <span class="glyphicon glyphicon-remove"></span>
        </a>-->
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" content="studremove" description="removeastudent">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Manage a student's details</title>
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
        <h1 style="font-size: 40px;font-weight: bold; color:brown;">View Student Details Here</h1>
    </div>
    <table class="table table-striped">
    <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Student Name</th>
      <th scope="col">Test Name</th>
      <th scope="col">Test Time</th>
      <th scope="col">Test Score</th>
      <th scope="col">Feedback</th>
    </tr>
  </thead>
    <?php
       $i=1;
        while ($row = mysqli_fetch_array($ses_empho,MYSQLI_ASSOC)){
          if(mysqli_num_rows($ses_empho) ==0)
          {
            echo "<h1 style='font-style: bold; color:red; font-size:30px'>"."No users currently"."</h1>";
          }
          ?>
    
  <tbody>
    <tr>
      <th scope="row"><?php echo $i?></th>
      <td><?php echo $row['name']?></td>
      <td><?php echo $row['subject']?></td>
      <td><?php echo $row['testtime'];?></td>
      <td><?php echo $row['score'];?></td>
      <td><?php echo $row['feedback'];?></td>                 
    </tr>
<?php $i++;} ?>
   </tbody>
  </table>

</body>
</html>