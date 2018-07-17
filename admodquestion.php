<?php
include('adminsession.php');
$todo_id= $_GET['id'];
$ses_empho = mysqli_query($conn,"SELECT testname,question,option1,option2,option3,option4,correctoption FROM test where question='$todo_id'");
$row = mysqli_fetch_array($ses_empho,MYSQLI_ASSOC);
$name=$row['question'];
$op1=$row['option1'];
$op2=$row['option2'];
$op3=$row['option3'];
$op4=$row['option4'];
$cop=$row['correctoption'];
$tname=$top1=$top2=$top3=$top4=$tcop="";
if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 
      $tname = mysqli_real_escape_string($conn,$_POST['uname']);
      $top1 = mysqli_real_escape_string($conn,$_POST['op1']);
      $top2 = mysqli_real_escape_string($conn,$_POST['op2']);
      $top3 = mysqli_real_escape_string($conn,$_POST['op3']);
      $top4 = mysqli_real_escape_string($conn,$_POST['op4']);
      $tcop = mysqli_real_escape_string($conn,$_POST['cop']);
      
      $sq = "UPDATE test SET question='$tname',option1='$top1',option2='$top2',option3='$top3',option4='$top4',correctoption='$tcop' WHERE question='$todo_id' ";
       $fr=mysqli_query($conn, $sq);
       if (!$fr) {
     echo "Error updating record: " . mysqli_error($conn); 	
    } 
 else {
     header("location: adtestqmodify.php");
     
      }
                                 }  
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" content="studremove" description="removeastudent">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Edit Question details</title>
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
        <h2 style="text-align: right;color: rgb(255,255,255);"><a href="adtestqmodify.php">Go Back</a></h2>
         <h1 style="font-size: 40px;font-weight: bold; color:brown;">Edit Questions Here</h1>
       </div>
        <form method="post" action="">
      
         <div class="form-group">
           <label for="testname">Question</label>
            <input type="text" name="uname" class="form-control" id="name" placeholder="question" value="<?php echo $name?>"required autocomplete="off">
          </div>
      <div class="form-group">
         <label for="option1">Option 1</label>
          <input type="text" name="op1" class="form-control" id="op1" placeholder="option1" value="<?php echo $op1?>" required>
      </div>
      <div class="form-group">
          <label for="option2">Option 2</label>
          <input type="text" name="op2" class="form-control" id="op2" placeholder="option2" value="<?php echo $op2?>" required>
      </div>
      <div class="form-group">
          <label for="option3">Option 3</label>
          <input type="text" name="op3" class="form-control" id="op3" placeholder="option3" value="<?php echo $op3?>" required>
      </div>
      <div class="form-group">
          <label for="option2">Option 4</label>
          <input type="text" name="op4" class="form-control" id="op4" placeholder="option4" value="<?php echo $op4?>" required>
      </div>
      <div class="form-group">
          <label for="option2">Correct Option</label>
          <input type="text" name="cop" class="form-control" id="cop" placeholder="correctoption" value="<?php echo $cop?>" required>
      </div>
  <input type="submit" name="Submit">
   </form>
  </div>
</body>