<?php
  include('studentsession.php');
  $todo_id= $_GET['id'];
  $_SESSION['testname'] = $todo_id;
?>

<!DOCTYPE html>
<html>
<head>
  <title>Quiz Started</title>
  <link rel="stylesheet" type="text/css" href="bootstrap.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
   <link href="https://fonts.googleapis.com/css?family=Montserrat|Open+Sans" rel="stylesheet">
</head>
<body>
<div class="container">

   <div class="page-header">
      <h2 style="text-align:right;color: rgb(255,255,255);"><a href="studentlogout.php">Sign Out</a></h2>
        <h2 style="text-align:right;color: rgb(255,255,255);"><a href="studenthome.php">Go Back</a></h2>
    </div>
  <br> <h1 class="text-center text-primary"> Your Test is underway</h1><br>
  
  <h2 class="text-center text-success"> Welcome <?php echo $user_name;?> </h2> <br>

<div class="col-lg-8 m-auto d-block">
  <div class="card" >


    <h3 class="text-center card-header">  You have to select only one out of 4options given. Best of Luck :)  </h3>

   </div><br>

   <form action="evaluatetest.php" method="post" autocomplete="off">

   <?php

   
   $q = " SELECT * from test where testname = '$todo_id' ";
   $query = mysqli_query($conn, $q);
     $x=1;$y=1;
   while ($rows = mysqli_fetch_array($query) ) {
    $y=1;
    ?>
    
    <div class="card">
      <h4 class="card-header"> <?php echo $x.")".$rows['question']  ?>  </h4>

                <div class="card-body">
            
            <input type="radio" name="quizcheck[<?php echo $rows['id']; ?>]" value="<?php echo $y++; ?>"><?php echo $rows['option1']  ?><br>
                        <input type="radio" name="quizcheck[<?php echo $rows['id']; ?>]" value="<?php echo $y++; ?>"><?php echo $rows['option2']  ?><br>
                        <input type="radio" name="quizcheck[<?php echo $rows['id']; ?>]" value="<?php echo $y++; ?>"><?php echo $rows['option3']  ?><br>
                        <input type="radio" name="quizcheck[<?php echo $rows['id']; ?>]" value="<?php echo $y++; ?>"><?php echo $rows['option4']  ?><br>
            

          </div>

<?php
    $x++;
   }?>

     <input type="text" name="feedback" placeholder="FEEDBACK" autocomplete="off"><br>
   <input type="submit" name="submit" value="Submit" class="btn btn-success m-auto d-block">

</form>
</div>
</div><br><br>
</body>
</html>