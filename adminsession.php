<?php
   include('adminconfig.php');
   session_start();
   $user_check = $_SESSION['login_user'];
   $ses_sql = mysqli_query($conn,"SELECT username from admin where name = '$user_check' ");
   $id = mysqli_query($conn,"SELECT id from admin where name = '$user_check' ");   
   if(!isset($_SESSION['login_user'])){
      header("location:adminlogin.php");
   }
?>