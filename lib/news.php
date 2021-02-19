<?php
	
	class News
	{
		private $servername = "localhost";
		private $username   = "admin";
		private $password   = "root";
		private $database   = "test";
		public  $con;


		// Database Connection 
		public function __construct()
		{
		    $this->con = new mysqli($this->servername, $this->username,$this->password,$this->database);
		    if(mysqli_connect_error()) {
			 trigger_error("Failed to connect to MySQL: " . mysqli_connect_error());
		    }else{
			return $this->con;
		    }
		}

		// Insert news data into news table
		public function addNews($post)
		{
			$newstitle = $this->con->real_escape_string($_POST['newstitle']);
			$newsbody = $this->con->real_escape_string($_POST['newsbody']);
			$query="INSERT INTO news(newstitle,newsbody,newsdate) VALUES('$newstitle','$newsbody',NOW())";
			$sql = $this->con->query($query);
			if ($sql==true) {
			    header("Location:index.php?msg1=insert");
			}else{
			    echo "News does not added!!";
			}
		}

		// Fetch news records for show listing
		public function displayNewsList()
		{
		    $query = "SELECT * FROM news";
		    $result = $this->con->query($query);
		if ($result->num_rows > 0) {
		    $newslist = array();
		    while ($row = $result->fetch_assoc()) {
		           $newslist[] = $row;
		    }
			 return $newslist;
		    }else{
			 echo "No found records";
		    }
		}

		// Fetch single news for edit from news table
		public function displyaRecordById($id)
		{
		    $query = "SELECT * FROM news WHERE id = '$id'";
		    $result = $this->con->query($query);
		if ($result->num_rows > 0) {
			$row = $result->fetch_assoc();
			return $row;
		    }else{
			echo "Record not found";
		    }
		}

		// Update news data into news table
		public function updateNews($postData)
		{
		    $newstitle = $this->con->real_escape_string($_POST['newstitle']);
		    $newsbody = $this->con->real_escape_string($_POST['newsbody']);
		    $id = $this->con->real_escape_string($_POST['id']);
		if (!empty($id) && !empty($postData)) {
			$query = "UPDATE news SET newstitle = '$newstitle', newsbody = '$newsbody', newsdate = NOW() WHERE id = '$id'";
			$sql = $this->con->query($query);
			if ($sql==true) {
			    header("Location:index.php?msg2=update");
			}else{
			    echo "News editing failed try again!";
			}
		    }
			
		}


		// Delete news data from news table
		public function deleteNews($id)
		{
		    $query = "DELETE FROM news WHERE id = '$id'";
		    $sql = $this->con->query($query);
		if ($sql==true) {
			header("Location:index.php?msg3=delete");
		}else{
			echo "News does not delete try again";
		    }
		}

	}
?>