<?php
  // Include authorization class
  include '../lib/auth.php';
  // Include database file
  include '../lib/news.php';
  
  
  if(!$_SESSION['admin'])
		header("Location:authorization.php");

  $newsObj = new News();

  // Edit news record
  if(isset($_GET['editId']) && !empty($_GET['editId'])) {
    $editId = $_GET['editId'];
    $news = $newsObj->displyaRecordById($editId);
  }

  // Update Record in news table
  if(isset($_POST['update'])) {
    $newsObj->updateNews($_POST);
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
</div><br> 

<div class="container">
  <form action="editnews.php" method="POST">
    <div class="form-group">
      <label for="name">Title:</label>
      <input type="text" class="form-control" name="newstitle" value="<?php echo $news['newstitle']; ?>" required="">
    </div>
    <div class="form-group">
      <label for="newsbody">News body:</label>
      <textarea class="form-control" name="newsbody" placeholder="Enter news body" required=""><?php echo $news['newsbody']; ?></textarea>
    </div>
    <div class="form-group">
      <input type="hidden" name="id" value="<?php echo $news['id']; ?>">
      <input type="submit" name="update" class="btn btn-primary" style="float:right;" value="Update">
    </div>
  </form>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>