<?php
   include('studentsession.php');
   $ses_empho = mysqli_query($conn,"SELECT * FROM createtest");
 ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" content="studremove" description="removeastudent">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Take the test</title>
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
  		<h2 style="text-align:right;color: rgb(255,255,255);"><a href="studentlogout.php">Sign Out</a></h2>
        <h2 style="text-align:right;color: rgb(255,255,255);"><a href="studenthome.php">Go Back</a></h2>
        <h1 style="font-size:40px;font-weight: bold; color:brown">View Tests Here</h1>
    </div>
    <table class="table table-striped">
    <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Test</th>
      <th scope="col">Start-Time</th>
      <th scope="col">End-Time</th>
      <th scope="col">TakeTest</th>
    </tr>
  </thead>
    <?php
       $i=1;
        while ($row = mysqli_fetch_array($ses_empho,MYSQLI_ASSOC)){
          if(mysqli_num_rows($ses_empho) ==0)
          {
            echo "<h1 style='font-style: bold; color:red; font-size:30px'>"."No tests currently"."</h1>";
          }
                   
    ?> 
    
  <tbody>
    <tr>
      <th scope="row"><?php echo $i?></th>
      <td><?php echo $row['testname']?></td>
      <td><?php echo $row['timestart']?></td>
      <td><?php echo $row['timeend']?></td>
      <td><a href="testdisplay.php?id=<?php echo $row['testname']; ?>">
          <span class="glyphicon glyphicon-ok"></span>
        </a></td>
    </tr>
<?php $i++; } ?>
   </tbody>
  </table>
</body>
</html>