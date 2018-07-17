<?php
   include('adminsession.php');
   $ses_empho = mysqli_query($conn,"SELECT * FROM test ORDER BY testname ASC");
 ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" content="studremove" description="removeastudent">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Delete a Question</title>
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
  xmlhttp.open("GET","quiztopic.php?q="+str,true);
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
        <h2 style="text-align: right;color: rgb(255,255,255);"><a href="admtestview.php">Go Back</a></h2>
        <h1 style="font-size: 40px;font-weight: bold; color:brown">Modify/Delete Questions Here</h1>
    </div>
    <form>
       <div class="form-group">
        <label for="test name">Test Name</label>
        <input type="text" class="form-control" id="testname" onkeyup="showResult(this.value)" placeholder="Test Name">
       <div id="livesearch"></div>
      </div>
    </form>
    <table class="table table-striped">
    <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Test Name</th>
      <th scope="col">Question</th>
      <th scope="col">Option 1</th>
      <th scope="col">Option 2</th>
      <th scope="col">Option 3</th>
      <th scope="col">Option 4</th>
      <th scope="col">Correct Option</th>
      <th scope="col">Delete</th>
      <th scope="col">Modify</th>
    </tr>
  </thead>
    <?php
       $i=1;
      while ($row = mysqli_fetch_array($ses_empho,MYSQLI_ASSOC)){
        if(mysqli_num_rows($ses_empho) ==0)
        {
          echo "<h1 style='font-style: bold; color:red; font-size:30px'>"."No questions currently"."</h1>";
        }
                   
    ?> 
    
  <tbody>
    <tr>
      <th scope="row"><?php echo $i?></th>
      <td><?php echo $row['testname']?></td>
      <td><?php echo $row['question']?></td>
      <td><?php echo $row['option1']?></td>
      <td><?php echo $row['option2']?></td>
      <td><?php echo $row['option3']?></td>
      <td><?php echo $row['option4']?></td>
      <td><?php echo $row['correctoption']?></td>
      <td><a href="adremquestion.php?id=<?php echo $row['question']; ?>">
          <span class="glyphicon glyphicon-remove"></span>
        </a></td>
      <td><a href="admodquestion.php?id=<?php echo $row['question']; ?>">
          <span class="glyphicon glyphicon-pencil"></span>
        </a></td>
    </tr>
<?php $i++; } ?>
   </tbody>
  </table>

</body>
</html>