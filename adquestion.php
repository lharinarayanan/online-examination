<?php
include('adminsession.php');
$todo_id= $_GET['id'];
$op1=$op2=$op3=$op4=$cop=$qu="";
if($_SERVER["REQUEST_METHOD"] == "POST") {
      // question and password sent from form
      $qu  = mysqli_real_escape_string($conn,$_POST['uname']);
      $op1 = mysqli_real_escape_string($conn,$_POST['op1']);
      $op2 = mysqli_real_escape_string($conn,$_POST['op2']);
      $op3 = mysqli_real_escape_string($conn,$_POST['op3']);
      $op4 = mysqli_real_escape_string($conn,$_POST['op4']);
      $cop = mysqli_real_escape_string($conn,$_POST['cop']);
      $sql = "INSERT INTO test (testname,question,option1,option2,option3,option4,correctoption) VALUES ('$todo_id', '$qu', '$op1','$op2','$op3','$op4','$cop')";
       if (mysqli_query($conn, $sql)) {
      	header("location: admtestview.php");
    } 
 else {
    echo "Error updating record: " . mysqli_error($conn);
      }
                                 }  
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" content="studremove" description="removeastudent">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>ADD QUESTION</title>
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
        <h2 style="text-align: right;color: rgb(255,255,255);"><a href="admtestview.php">Go back</a></h2>
        <h1 style="font-size: 40px;font-weight: bold; color:brown;">Add Qustion Here</h1>
       </div>
        <form method="post" action="">
         <div class="form-group">
           <label for="question">Question</label>
            <input type="text" name="uname" class="form-control" id="name" placeholder="Name" autocomplete="off">
         </div>
      <div class="form-group">
         <label for="option1">Option 1</label>
          <input type="text" name="op1" class="form-control" id="inputop1" placeholder="option1" autocomplete="off">
      </div>
         <div class="form-group">
           <label for="option2">Option 2</label>
           <input type="text" name="op2" class="form-control" id="inputop2" placeholder="option2" autocomplete="off">
         </div>
         <div class="form-group">
           <label for="option3">Option 3</label>
           <input type="text" name="op3" class="form-control" id="inputop3" placeholder="option3" autocomplete="off">
         </div>
         <div class="form-group">
           <label for="option4">Option 4</label>
           <input type="text" name="op4" class="form-control" id="inputop4" placeholder="option4" autocomplete="off">
         </div>
         <div class="form-group">
           <label for="correct">Correct Option</label>
           <input type="number" name="cop" class="form-control" id="inputop4" placeholder="correctoption" autocomplete="off" maxlength="1" min="1" max="4">
         </div>  
  <input type="submit" name="Submit">
   </form>

  </div>
</body>