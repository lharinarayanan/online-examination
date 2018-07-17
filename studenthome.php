<?php
  include('studentsession.php');
  $ses_empho = mysqli_query($conn,"select name,email,phone,picture from student where name = '$user_name' ");
   $row = mysqli_fetch_array($ses_empho,MYSQLI_ASSOC);
   $name =  $row['name'];
   $email = $row['email'];
   $telep = $row['phone'];
   //$sq = "SELECT image FROM user WHERE name = '$user_check'";
   //$result = mysqli_query($conn,"$sq");
  
   $img   = $row['picture'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" content="adminhome" description="adminpage">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>StudentHomePage</title>
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
    background-color: purple;
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
    background-color: red;
}

@media screen and (max-height: 450px) {
  
  .sidenav button {font-size: 18px;}
}
.page-header{
  background-color: blue;

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
     <button class="btn btn-warning" id="add" onclick="location.href = 'showtest.php';">Take Test</button>
  </div>
  <div class="pad">
     <button class="btn btn-warning" id="manage" onclick="location.href = 'viewinstructions.html';">Instructions</button>
  </div>
  <div class="pad">
    <button class="btn btn-warning" id="view" onclick="location.href = 'studenttestview.php';">View Test Details</button>
  </div>
  <div class="pad">
    <button class="btn btn-warning" id="edit" onclick="location.href = 'studentedit.php';">Edit My Profile</button>
  </div>
  <div class="pad">
    <button class="btn btn-warning" onclick="location.href = 'studentlogout.php';">Log Out</button>
  </div>
  <div class="pad">
    <button class="btn btn-warning" id="ping" onclick="location.href = '#';">Notify Admin</button>
  </div>
</div>
<div class="container">
<div class="main">
    <div class="page-header">
       <img src="<?php echo $img; ?>" style="width: 50px;height: 60px; float: left;">
       <h1 class="adhe">Welcome to your Dashboard <?php echo $name;?></h1>
    </div>
      <div class="des">
       <h2 style="padding-bottom: 15px;">This is Your control Page <?php echo $name;?> .You are allowed to do the following:</h2>
       <ol>
        <li>View Instructions</li>
        <li>View Test performance</li>
        <li>Take a Test</li>
        <li>Edit your details</li>
      </ol>
     </div>
   <div class="content">
   </div>
  
</div>
</div>
</body>
</html> 
