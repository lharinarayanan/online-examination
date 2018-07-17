<?php
   include('adminsession.php');
   $ses_empho = mysqli_query($conn,"SELECT * FROM student");
 ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" content="studremove" description="removeastudent">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Edit a Student's Details</title>
	<style type="text/css">
		body {
               font-family: "Lato", sans-serif;
               background-color: pink;
             }
       .header{
       	background-color: green;
       }
	</style>
  <script type="text/javascript">
    function showResult(str) {
      if (str.length==0) { 
              document.getElementById("livesearch").innerHTML="";
              document.getElementById("livesearch").style.border="0px";
              return;
           }
     xmlhttp=new XMLHttpRequest();
     xmlhttp.onreadystatechange=function() {
    if (this.readyState==4 && this.status==200) {
      document.getElementById("livesearch").innerHTML=this.responseText;
      document.getElementById("livesearch").style.border="1px solid #A5ACB2";
    }
  }
  xmlhttp.open("GET","livesearch.php?q="+str,true);
  xmlhttp.send();
}
</script>
  </script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
  <div class="container bg-danger">
  	<div class="page-header">
  		<h2 style="text-align: right;color: rgb(255,255,255);"><a href="adminlogout.php">Sign Out</a></h2>
        <h2 style="text-align: right;color: rgb(255,255,255);"><a href="adminhome.php">Go To Home</a></h2>
        <h1 style="font-size: 40px;font-weight: bold; color:brown">Edit Student's Details Here</h1>
    </div>
    <form>
       <div class="form-group">
       <label for="exampleFormControlInput1">Student Name</label>
       <input type="text" class="form-control" id="exampleFormControlInput1" onkeyup="showResult(this.value)" placeholder="Search Name">
       <div id="livesearch"></div>
      </div>
    </form>
    <table class="table table-striped">
    <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">Telephone</th>
      <th scope="col">Edit</th>
    </tr>
  </thead>
    <?php
       $i=1;
        while ($row = mysqli_fetch_array($ses_empho,MYSQLI_ASSOC)){
          if(mysqli_num_rows($ses_empho) ==0)
          {
            echo "<h1 style='font-style: bold; color:red; font-size:30px'>"."No users currently"."</h1>";
          }
                   
    ?> 
    
  <tbody>
    <tr>
      <th scope="row"><?php echo $i?></th>
      <td><?php echo $row['name']?></td>
      <td><?php echo $row['email']?></td>
      <td><?php echo $row['phone']?></td>
      <td><a href="adstedit.php?id=<?php echo $row['name']; ?>">
          <span class="glyphicon glyphicon-pencil"></span>
        </a></td>
    </tr>
<?php $i++; } ?>
   </tbody>
  </table>

</body>
</html>