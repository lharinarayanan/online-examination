<?php
include('adminsession.php');
$todo_id= $_GET['id'];
$ses_empho = mysqli_query($conn,"SELECT testname,timestart,timeend FROM createtest where testname='$todo_id'");
$row = mysqli_fetch_array($ses_empho,MYSQLI_ASSOC);
$name=$row['testname'];
$st=explode(' ',$row['timestart'],2);
$start=$st[0].'T'.$st[1];
$et=explode(' ',$row['timeend'],2);
$end=$et[0].'T'.$et[1];
$tname=$tstart=$tend="";
if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 
      $tname = mysqli_real_escape_string($conn,$_POST['uname']);
      $tstart = mysqli_real_escape_string($conn,$_POST['start']);
      $tend = mysqli_real_escape_string($conn,$_POST['end']);
      $sql = "UPDATE createtest SET testname='$tname',timestart='$tstart',timeend='$tend' WHERE testname='$todo_id'  ";
      $sq = "UPDATE test SET testname='$tname' WHERE testname='$todo_id' ";
       $er=mysqli_query($conn, $sql);
       $fr=mysqli_query($conn, $sq);
       if (!$er&&!$fr) {
     echo "Error updating record: " . mysqli_error($conn); 	
    } 
 else {
     header("location: adtestshow.php");
     
      }
                                 }  
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" content="studremove" description="removeastudent">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Edit Test details</title>
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
        <h2 style="text-align: right;color: rgb(255,255,255);"><a href="adtestshow.php">Go Back</a></h2>
        <h1 style="font-size: 40px;font-weight: bold; color:brown;">Edit Student Details Here</h1>
        <form method="post" action="">
      
         <div class="form-group">
           <label for="testname">Test Name</label>
            <input type="text" name="uname" class="form-control" id="name" placeholder="Test Name" value="<?php echo $name?>"required autocomplete="off">
      <div class="form-group">
         <label for="start-time">Start Time</label>
          <input type="datetime-local" name="start" class="form-control" id="starttime" placeholder="Start-time" value="<?php echo $start?>" required>
      </div>
         <div class="form-group">
          <label for="end-time">End Time</label>
          <input type="datetime-local" name="end" class="form-control" id="endtime" placeholder="End-time" value="<?php echo $end?>" required>
    </div>
  </div>
  <input type="submit" name="Submit">
   </form>

  </div>
    </div>
</body>