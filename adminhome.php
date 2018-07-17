<?php
  include('adminsession.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" content="adminhome" description="adminpage">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminHomePage</title>
<style>

body {
       font-family: "Lato", sans-serif;
       background-color: red;
     }

.sidenav {
    padding-top: 50px;
    height: 100%;
    width: 280px;
    position: fixed;
    z-index: 1;
    top: 0;
    left: 0;
    background-color: #111;
    overflow-x: hidden;
  }

.sidenav button {
    padding: 6px 6px 6px 32px;
    text-decoration: none;
    font-size: 25px;
    color: #818181;
    display: block;
    width: 270px;
}

.sidenav button:hover {
    color: #f1f1f1;
}

.main {
    margin-left: 280px; /* Same as the width of the sidenav */
    background-color: orange;
}

@media screen and (max-height: 450px) {
  
  .sidenav button {font-size: 18px;}
}
.page-header{
  background-color: green;

}
.adhe{
  font-size: 40px;
  font-style: italic;
  font-stretch: expanded;
  color: white;
  position: relative;
  text-align: center;
}
.pad{
  padding-top: 20px;
  padding-bottom: 30px;
}
.des{
  font-size:35px;
  color:white;
}

</style>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>

<div class="sidenav">
  <div class="pad">
     <button class="btn btn-info" id="add" onclick="location.href = 'studentremove.php';">Remove Students</button>
  </div>
  <div class="pad">
     <button class="btn btn-info" id="manage" onclick="location.href = 'admanagestudent.php';">Manage Students</button>
  </div>
  <div class="pad">
    <button class="btn btn-info" id="view" onclick="location.href = 'admtestview.php';">View Test Details</button>
  </div>
  <div class="pad">
    <button class="btn btn-info" id="edit" onclick="location.href = 'adminstudentedit.php';">Student Notifications</button>
  </div>
  <div class="pad">
    <button class="btn btn-info" onclick="location.href = 'adminlogout.php';">Log Out</button>
  </div>
</div>
<div class="container">
<div class="main">
    <div class="page-header">
       <img src="Administrator.png" style="width: 50px;height: 50px; float: left;">
       <h1 class="adhe">Welcome to your Dashboard Admin</h1>
    </div>
      <div class="des">
       <h2 style="padding-bottom: 15px;">This is Your control Page Admin.You are allowed to do the following:</h2>
       <ol>
        <li>Remove a Student</li>
        <li>View test performance of students</li>
        <li>View , assign and moniter tests taken by students</li>
        <li>Edit a student's details</li>
      </ol>
     </div>
   <div class="content">
   </div>
  
</div>
</div>
</body>
</html> 
