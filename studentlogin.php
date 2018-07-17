<?php
    $error="";
    $dbhost='localhost';
    $dbuser='root';
    $conn= mysqli_connect($dbhost,$dbuser);
    $myusername="";
    $rand=substr(rand(),0,4);
    
     if(!$conn)
    {
      die('could not connect'.mysql_error());
    }
     mysqli_select_db($conn,'quiz-project');
     session_start();
   
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 
      
      $myusername = mysqli_real_escape_string($conn,$_POST['username']);
      $mypassword = mysqli_real_escape_string($conn,$_POST['password']);
      $mycaptcha  = $_POST['captcha'];
      $mypassword = hash('sha512', $mypassword); 
      
      $sql = "SELECT id FROM student WHERE name = '$myusername' and password = '$mypassword'";
      $result = mysqli_query($conn,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      $uid = $row['id'];
      //$active = $row['active'];
      
      $count = mysqli_num_rows($result);
      
      // If result matched $myusername and $mypassword, table row must be 1 ro

      if($count == 1 && $_SESSION['r']==$mycaptcha ) {
    
         //session_register("myusername");
         $_SESSION['user'] = $myusername;
         $_SESSION['id'] = $uid;
         $year = time() + 31536000;
         setcookie('remember', $myusername, $year);
         header("location: studenthome.php");
      }
      else if($count == 1 && $_SESSION['r']!=$mycaptcha)
        {
          $error = "Your captcha is invalid  ";
        }
        else if($count != 1&& $_SESSION['r']==$mycaptcha)
        {
          $error = "Your User Name or Password is invalid  ";
        }
      else {
         $error = "Your User Name or Password and captcha is invalid";
      }
   }
  
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta content="Loginpage">
    <title>Login Page</title>
<link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<script type="text/javascript">
    function isNumber(evt) {
                            evt = (evt) ? evt : window.event;
                            var charCode = (evt.which) ? evt.which : evt.keyCode;
                            if (charCode > 31 && (charCode < 48 || charCode > 57)) {
                                       return false;
                                   }
                               return true;
                         }
</script>
</head>
 <body style="background-color: black">
    <div class="container">    
        <div id="loginbox" style="margin-top:50px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">                    
            <div class="panel panel-info" >
                    <div class="panel-heading">
                        <div class="panel-title">Sign In To Take a Test</div>
                        <?php $_SESSION['r'] = $rand;?>
                             
                  <div style="padding-top:30px" class="panel-body" >

                        <div style="display:none" id="login-alert" class="alert alert-danger col-sm-12"></div>
                            
                        <form id="loginform" class="form-horizontal" role="form" method="post" action="">
                                    
                            <div style="margin-bottom: 25px" class="input-group">
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                        <input id="login-username" type="text" class="form-control" name="username" value="" placeholder="username" autocomplete="off">                                        
                                    </div>
                                
                            <div style="margin-bottom: 25px" class="input-group">
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                                        <input id="login-password" type="password" class="form-control" name="password" placeholder="password" autocomplete="off">
                                    </div>

                                    <div style="margin-bottom: 25px" class="input-group">
                                       <input type="text" name="discaptcha" value="<?php echo $rand?>" style="background-color: grey; text-align: center; font-weight: bold; font-size: 15px; " readonly="readonly" required><br>
                                       <input type="text" name="captcha" placeholder="Enter Captcha" onkeypress="return isNumber(event)" maxlength="4" required autocomplete="off"><br> 
                                        
                                    </div>

                                <div class="input-group">
                                      <div class="checkbox">
                                        <label>
                                          <input id="login-remember" checked="checked" type="checkbox" name="remember" value="1"> Remember me
                                        </label>
                                      </div>
                                    </div>


                                <div style="margin-top:10px" class="form-group">
                                    <!-- Button -->
                                 <div class="col-sm-12 controls">
                                     <span><input type="submit"><span id="sa" style="color: red; font-style: bold;"><?php echo $error?></span>

                                    </div>
                                </div>


                                <div class="form-group">
                                    <div class="col-md-12 control">
                                        <div style="border-top: 1px solid#888; padding-top:15px; font-size:85%" >
                                            Don't have an account! 
                                        <a href="studentregister.html">Sign Up Here</a>
                                        </div>
                                    </div>
                                </div>    
                            </form>     



                        </div>                     
                    </div>  
        </div>
                    </div>
     </div>
 </body>