<?php
include('studentsession.php');
$toname=$_SESSION["testname"];
$feed=$_POST['feedback'];
   ?>
<!DOCTYPE html>
<html>
   <head>
      <title>Quiz Check</title>
      <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<style type="text/css">
    .animateuse{
            animation: leelaanimate 0.5s infinite;
        }

@keyframes leelaanimate{
            0% { color: red },
            10% { color: yellow },
            20%{ color: blue }
            40% {color: green },
            50% { color: pink }
            60% { color: orange },
            80% {  color: black },
            100% {  color: brown }
        }
</style>

   </head>
   <body>
     <div class="container text-center" >
      <div class="page-header">
        <h2 style="text-align:right;color: rgb(255,255,255);"><a href="studentlogout.php">Sign Out</a></h2>
        <h2 style="text-align:right;color: rgb(255,255,255);"><a href="studenthome.php">Go To Home</a></h2>
        <h1 style="font-size:40px;font-weight: bold; color:brown">Your Results are Here</h1>
     </div>
        <br><br>
        <h1 class="text-center text-success text-uppercase animateuse" >Quiz Summary </h1>
        <br><br><br><br>
      <table class="table text-center table-bordered table-hover">
        <tr>
            <th colspan="2" class="bg-dark"> <h1 class="text-white"> Results </h1></th>
            
        </tr>
        <tr>
                <td>
                    Questions Attempted
                </td>

             <?php
         // $counter = 0;
         $Resultans = 0;
            if(isset($_POST['submit'])){
            if(!empty($_POST['quizcheck'])) {
            // Counting number of checked checkboxes.
            $checked_count = count($_POST['quizcheck']);
            // print_r($_POST);
            ?>

            <td>
            <?php
            echo "You have attempted ".$checked_count." Questions"; ?>
            </td>
        
            
            <?php
            // Loop to store and display values of individual checked checkbox.
            $selected = $_POST['quizcheck'];
            
            $q1= " SELECT * from test where testname = '$toname' ";
            $ansresults = mysqli_query($conn,$q1);
            $i = 1;
            while($rows = mysqli_fetch_array($ansresults)) {
                $flag = $rows['correctoption'] == $selected[$i];
                
                        if($flag){
                            // echo "correct ans is ".$rows['ans']."<br>";              
                            // $counter++;
                            $Resultans++;
                            // echo "Well Done! your ". $counter ." answer is correct <br><br>";
                        }else{
                            // $counter++;
                            // echo "Sorry! your ". $counter ." answer is innncorrect <br><br>";
                        }                   
                    $i++;       
                }
                ?>
                
            
            <tr>
                <td>
                    Your Total score
                </td>
                <td colspan="2">
            <?php 
                echo " Your score is ". $Resultans.".";
                }
                else{
                echo "<b>Please Select Atleast One Option.</b>";
                }
                } 
              ?>
              </td>
            </tr>

            <?php 

            $finalresult = " INSERT into result(name,subject,score,feedback,testtime) values ('$user_name','$toname','$Resultans','$feed',now()) ";
            $queryresult= mysqli_query($conn,$finalresult); 
            if($queryresult){
            //  echo "successssss";
            }
            ?>
      </table>
      </div>
   </body>
</html>
