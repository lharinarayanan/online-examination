<?php 
   include('adminsession.php');
   
   $todo_id= $_GET['id']; 
   $ses_note = mysqli_query($conn,"DELETE from student where name = '$todo_id' ");
   $we = mysqli_query($conn,"DELETE from result where name = '$todo_id' ");
   if(!$ses_note&&!$we)
   {
   	echo "Delete unsuccessful";
   }
  header("Location: studentremove.php");
    
?>