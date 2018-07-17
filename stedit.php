<?php
include('studentsession.php');
$todo_id= $_GET['id'];
$ses_empho = mysqli_query($conn,"SELECT name,email,phone,city FROM student where name='$todo_id'");
$row = mysqli_fetch_array($ses_empho,MYSQLI_ASSOC);
$name=$row['name'];
$email=$row['email'];
$phone=$row['phone'];
$city=$row['city'];
$mycity=$myusername=$myemail=$mytelephone="";
if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 
      $myusername = mysqli_real_escape_string($conn,$_POST['uname']);
      $myemail = mysqli_real_escape_string($conn,$_POST['email']);
      $mytelephone = mysqli_real_escape_string($conn,$_POST['tel']);
      $mycity = mysqli_real_escape_string($conn,$_POST['city']);
      $sql = "UPDATE student SET name='$myusername',email='$myemail',phone='$mytelephone',city='$mycity' WHERE name='$name'  ";
      $sq = "UPDATE result SET name='$myusername' WHERE name='$name' ";
      $_SESSION['login_user'] = $myusername;
       if (mysqli_query($conn, $sql)) {
      	header("location: studentedit.php");
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
	<title>Edit my details</title>
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
  		<h2 style="text-align: right;color: rgb(255,255,255);"><a href="studentedit.php">Goback</a></h2>
        <h2 style="text-align: right;color: rgb(255,255,255);"><a href="studenthome.php">Go To Home</a></h2>
        <h1 style="font-size: 40px;font-weight: bold; color:brown;">Edit my Here</h1>
        <form method="post" action="">
      <div class="form-row">
         <div class="form-group col-md-3">
           <label for="inputEmail4">Name</label>
            <input type="text" name="uname" class="form-control" id="name" placeholder="Name" value="<?php echo $name?>">
         </div>
      <div class="form-group col-md-3">
         <label for="inputPassword4">Email</label>
          <input type="email" name="email" class="form-control" id="inputemail" placeholder="Email" value="<?php echo $email?>">
      </div>
         <div class="form-group col-md-3">
          <label for="Phone">Phone</label>
          <input type="tel" name="tel" class="form-control" id="inputtel" placeholder="Telephone" value="<?php echo $phone?>">
    </div>
    <div class="form-group col-md-3">
          <label for="city">City</label>
          <input type="city" name="city" class="form-control" id="inputcity" placeholder="City" value="<?php echo $city?>">
    </div>
  </div>
  <input type="submit" name="Submit">
   </form>

  </div>
    </div>
</body>