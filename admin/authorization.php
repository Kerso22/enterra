<?php
  
    // Include authorization class
    include '../lib/auth.php';
	if($_SESSION['admin']){
		header("Location: index.php");
		exit;
	}


	
  
  
?>
<!DOCTYPE html>
<html lang="ru">
<head>
  <title>Newslist for testwork</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"/>
</head>
<body>

<div class="card text-center" style="padding:15px;">
  <h4>Newslist for testwork</h4>
</div><br><br> 

<div class="container">
  <h2>Authorization form</h2>
  <?php
    if (isset($_GET['msg1']) == "denied") {
      echo "<div class='alert alert-danger alert-dismissible'>
              <button type='button' class='close' data-dismiss='alert'>&times;</button>
              Wrong data! Access denied.
            </div>";
      } 
  ?>
 
  <form action="authorization.php" method="POST">
    <div class="form-group">
      <label for="login">Login:</label>
      <input type="text" class="form-control" name="login" placeholder="Enter login" required="">
    </div>
    <div class="form-group">
      <label for="pass">Password:</label>
      <input type="password" class="form-control" name="pass" placeholder="Enter password" required="">
    </div>
    <input type="submit" name="submit" class="btn btn-primary" style="float:right;" value="Submit">
  </form>

</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>