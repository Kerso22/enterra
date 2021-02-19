<?php
  
  // Include database file
  include 'lib/news.php';

  $newsObj = new News();
     
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
  <h2>News</h2>
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
			
        </tr>
      <?php } ?>
    </tbody>
  </table>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>