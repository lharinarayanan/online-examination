<?php 
   include('adminsession.php');
   $todo_id= $_GET['id']; 
   $ses_note = mysqli_query($conn,"DELETE from test where question = '$todo_id' ");
   if(!$ses_note)
   {
   	echo "Delete unsuccessful";
   }
  header("Location: adtestqmodify.php");
    
?>