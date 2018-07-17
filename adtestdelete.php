<?php 
   include('adminsession.php');
   $todo_id= $_GET['id']; 
   $ses_note = mysqli_query($conn,"DELETE from test where testname = '$todo_id' ");
   $we = mysqli_query($conn,"DELETE from createtest where testname = '$todo_id' ");
   if(!$ses_note&&!$we)
   {
   	echo "Delete unsuccessful";
   }
  header("Location: adtestshow.php");
    
?>