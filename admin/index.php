<?php
    // Include authorization class
  include '../lib/auth.php';
  // Include database file
  include '../lib/news.php';
  
	if(!$_SESSION['admin']){
		header("Location:authorization.php");
		exit;
	}

  $newsObj = new News();

  // Delete record from table
  if(isset($_GET['deleteId']) && !empty($_GET['deleteId'])) {
      $deleteId = $_GET['deleteId'];
      $newsObj->deleteNews($deleteId);
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
  <h2>News
    <a href="addnews.php" class="btn btn-primary" style="float:right;">Add New News</a>
	<a href="authorization.php?do=logout" class="btn btn-primary" style="float:right;">logout</a>
  </h2>
  <table class="table table-hover">
    
    <tbody>
        <?php 
          $newslist = $newsObj->displayNewsList(); 
          foreach ($newslist as $news) {
        ?>
        <tr>
          <td><a href="detailnews.php?openId=<?php echo $news['id'] ?>"><?php echo $news['newstitle'] ?></a>
			<p><?php echo mb_strimwidth($news['newsbody'], 0, 80, "...");?></p>
			<p><?php echo $news['newsdate'] ?></p></td>
          <td>
            <a href="editnews.php?editId=<?php echo $news['id'] ?>" style="color:green">
              <i class="fa fa-pencil" aria-hidden="true"></i></a>&nbsp
            <a href="index.php?deleteId=<?php echo $news['id'] ?>" style="color:red" onclick="confirm('Are you sure want to delete this record')">
              <i class="fa fa-trash" aria-hidden="true"></i>
            </a>
          </td>
        </tr>
      <?php } ?>
    </tbody>
  </table>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>