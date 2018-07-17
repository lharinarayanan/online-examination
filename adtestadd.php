<?php
include('adminsession.php');
$myusername=$start=$end="";
if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 
      $myusername = mysqli_real_escape_string($conn,$_POST['uname']);
      $start = mysqli_real_escape_string($conn,$_POST['start']);
      $end = mysqli_real_escape_string($conn,$_POST['end']);
      $sql = "INSERT INTO createtest (testname,timestart,timeend) VALUES ('$myusername', '$start', '$end')";
       if (mysqli_query($conn, $sql)) {
      	header("location: admtestview.php");
    } 
 else {
    echo "Error creating a test: " . mysqli_error($conn);
      }
                                 }  
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" content="studremove" description="removeastudent">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Add a test</title>
	<style type="text/css">
		body {
               font-family: "Lato", sans-serif;
               background-color: pink;
             }
       .header{
       	background-color: green;
       }
       input[type=submit] {
                     width: 19%;
                     background-color: blue;
                     color: white;
                     padding: 14px 20px;
                     margin: 8px 0;
                     border: 3px solid;
                     border-radius: 4px;
                     cursor: pointer;
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
        <h2 style="text-align: right;color: rgb(255,255,255);"><a href="admtestview.php">Go Back</a></h2>
         <h1 style="font-size: 40px;font-weight: bold; color:brown;">Add a Test</h1>
        </div>
         <form method="post" action="">
           <div class="form-group">
               <label for="subject">Subject</label>
                 <input type="text" name="uname" class="form-control" id="name" placeholder="Name" autocomplete="off" style="width: 35%; height:60px; padding-bottom: 10px; padding-top: 10px">
           </div>
           <div class="form-group">
            <label for="starttime">Start Time</label><br>
            <input type="datetime-local" id="start-time" name="start" step="1" style="padding-top: 10px; padding-left: 23px; padding-right: 23px; padding-bottom: 10px; font-size: 25px;" />
           </div>
         <div class="form-group">
            <label for="endtime">End Time</label><br>
            <input type="datetime-local" id="end-time" name="end" step="1" style="padding-top: 12px; padding-left: 23px; padding-right: 23px; padding-bottom: 12px; font-size: 25px;"/>
           </div>
  <input type="submit" name="Submit">
   </form>

  </div>
</body>