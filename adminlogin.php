<?php
    $error="";
    $dbhost='localhost';
    $dbuser='root';
    $conn= mysqli_connect($dbhost,$dbuser);
    $myusername="";
    $year= time() + 31536000;
     if(!$conn)
    {
      die('could not connect'.mysql_error());
    }
     mysqli_select_db($conn,'quiz-project');
     session_start();
   //setcookie('remember_me','', $year);
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 
      $myusername = mysqli_real_escape_string($conn,$_POST['uname']);
      $mypassword = mysqli_real_escape_string($conn,$_POST['psw']);
      // Encryption of Password
      //$mypassword = hash('sha512', $mypassword); 
      $sql = "SELECT id FROM admin WHERE username = '$myusername' and password = '$mypassword'";
      $result = mysqli_query($conn,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      $uid = $row['id'];
      //$active = $row['active'];
      $count = mysqli_num_rows($result);
      // If result matched $myusername and $mypassword, table row must be 1 row
      if($count == 1) {
         //session_register("myusername");
          $_SESSION['login_user'] = $myusername;
          $_SESSION['login_id'] = $uid;
          $year = time() + 31536000;
          setcookie('remember_me', $myusername, $year);
          header("location: adminhome.php");
      }
      else {
         $error = "Your User Name or Password is invalid";
      }
   }
?>  

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {font-family: Arial, Helvetica, sans-serif;}
form {border: 3px solid #f1f1f1;}

input[type=text], input[type=password] {
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    box-sizing: border-box;
}

button {
    background-color: #4CAF50;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    cursor: pointer;
    width: 100%;
}

button:hover {
    opacity: 0.8;
}

.cancelbtn {
    width: auto;
    padding: 10px 18px;
    background-color: #f44336;
}

.imgcontainer {
    text-align: center;
    margin: 24px 0 12px 0;
}

img.avatar {
    width: 20%;
    border-radius: 50%;
}

.container {
    padding: 16px;
    font-size: 10px;
}

span.psw {
    float: right;
    padding-top: 16px;
}

/* Change styles for span and cancel button on extra small screens */
@media screen and (max-width: 300px) {
    span.psw {
       display: block;
       float: none;
    }
    .cancelbtn {
       width: 100%;
    }
}
</style>
</head>
<body>

<h2>Admin Login Page</h2>

<form action="" method="post">
  <div class="imgcontainer">
    <img src="img_avatar2.png" alt="Avatar" class="avatar">
  </div>

  <div class="container">
    <label for="uname" style="font-size: 20px;"><b>Username</b></label>
    <input type="text" placeholder="Enter Username" name="uname" autocomplete="off" required>

    <label for="psw" style="font-size: 20px;"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="psw" autocomplete="off" required>
        
    <button type="submit">Login</button><span id="sa" style="color: red; font-style: bold;"><?php echo $error?></span>
    <label>
      <input type="checkbox" checked="checked" name="remember"><strong style="font-size: 20px;">Remember Me</strong>
    </label>
  </div>

  <div class="container" style="background-color:#f1f1f1">
    <strong style="text-align: center">All rights reserved</strong>
  </div>
</form>

</body>
</html>
