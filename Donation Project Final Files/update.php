


<?php

	DEFINE ('DB_USER', 'cs319_1_spr2019_group6_db');
	DEFINE ('DB_PASSWORD', 'cs319$@z@Jd');
	DEFINE ('DB_HOST', 'localhost');
	DEFINE ('DB_NAME', 'cs319_1_spr2019_group6_db');
	
	
	 $_GET['num'];
	 $_GET['im'];
	 $_GET['tx'];
	// Create database connection
  $db = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME) OR die ('Could not connect to MySQL: ' . mysqli_connect_error() );

  // Initialize message variable
	$msg = "";
	
	// If upload button is clicked ...
  if (isset($_POST['upload'])) {
  	
  }
 
  
 
?>
<!DOCTYPE html>
<html>
<head>
	

<title>Image Upload</title>

<style type="text/css">
	
	
   #content{
   	width: 80%;
   	margin: 20px auto;
	background-color:#eee;
		
	
   }
   form{
   	width: 50%;
   	margin: 20px auto;
   }
   form div{
   	margin-top: 5px;
		 
   }
   #img_div{
   	width: 80%;
   	padding: 5px;
   	margin: 15px auto;
   	border: 2px solid black;
		 background-color:white;
	
   }
   #img_div:after{
   	content: "";
   	display: block;
   	clear: both;
		 background-color:grey; 
   }
   img{
   	float: left;
   	margin: 5px;
   	width: 250px;
   	height: 140px;
		background-color:white;
   }
</style>
</head>
<body>
<div id="content">
<?php
    while ($row = mysqli_fetch_array($result)) {
      echo "<div id='img_div'>";
      	echo "<img src='images/".$row['image']."' >";
      	echo "<p>".$row['image_text']."</p>";
      echo "</div>";
	  echo "<tr>
	<td><a href='update.php?id=$row[id]&im=$row[image]&tx=$row[image_text]'>Edit</a></td>
	<td><a href='delete.php?id=$row[id]'>Delete</a></td>
	 </tr> ";
    }
  ?>
  <form method="POST" action="create.php" enctype="multipart/form-data">
  	<input type="hidden" name="size" value="1000000">
  	<div>
  	  <input type="file" name="image" value="<?php echo $_GET['im'];?>">
  	</div>
  	<div>
			
      <textarea id="text" cols="40" rows="40" name="image_text" placeholder="Tell your Story" value="<?php echo $_GET['tx'];?>"></textarea>
  	</div>
  	<div>
  		<button type="submit" name="upload">Update</button>
  	</div>
  </form>
  

  
</div>
</body>
<footer>
 <div id="footer">
        <p>Presentation <a href="aaaaa"></a> </p>
    </div>
</footer>
</html>