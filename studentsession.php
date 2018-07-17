<?php
   include('studentconfig.php');
   session_start();
   $user_name = $_SESSION['user'];
   $ses_sql = mysqli_query($conn,"SELECT name from student where name = '$user_name' ");
   $id = mysqli_query($conn,"SELECT id from student where name = '$user_name' ");  
   $emi = mysqli_query($conn,"SELECT email from student where name = '$user_name' ");
   $Ph  = mysqli_query($conn,"SELECT phone from student where name = '$user_name' ");
   $pas = mysqli_query($conn,"SELECT password from student where name = '$user_name' ");
   $row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
   $rowid =  mysqli_fetch_array($id,MYSQLI_ASSOC);
   $emid = mysqli_fetch_array($emi,MYSQLI_ASSOC);
   $ph = mysqli_fetch_array($Ph,MYSQLI_ASSOC);
   $pass = mysqli_fetch_array($pas,MYSQLI_ASSOC);
   $passwor = $pass['password'];
   $pho = $ph['phone'];
   $userid = $rowid['id']; 
   $login_session = $row['name'];
   $emiid = $emid['email']; 
   if(!isset($_SESSION['user'])){
      header("location:studentlogin.php");
   }
?>