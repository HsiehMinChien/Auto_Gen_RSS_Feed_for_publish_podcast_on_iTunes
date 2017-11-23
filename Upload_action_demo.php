<!DOCTYPE HTML>
<html>
	<head>
	</head>
	<body class="subpage">
    	<?php
		require('config.php');
		include('RSS_auto_gen.php');

		// Get info from Upload_demo.php page
		$title = $_POST['title'];
		$description = $_POST['description'];
		$duration = $_POST['duration'];
		$type = $_POST['type'];
		$show = $_POST['show'];
		$feed = $_POST['FC'];
		$target_file = $_POST['filename'];
		$uploadOk = 0;

		$con = mysqli_connect($db_host,$db_user,$db_pass,$db_name); 
						
		// Check connect 
		if (!$con) 
		{ 
    		die("Could not connect: " . mysqli_connect_error()); 
		}

		if(isset($_POST["filename"]) && isset($_POST["title"]) && isset($_POST["description"]) && isset($_POST["duration"])) {
       		echo "File location is " . $target_file . ".<br>";
        	$uploadOk = 1;
		}

		// Check if $uploadOk is set to 0 by an error
		if ($uploadOk == 0) {
    		echo "Sorry, your file was not uploaded.<br>";
			// if everything is ok, try to upload file
		} else {

			$query = "INSERT INTO ".$tb_name3." (serial, title, description, file_location, duration, time, type, display, feed)
			VALUES (NULL, '".$title."', '".$description."', '".$target_file."', '".$duration."', NULL, ".$type.", ".$show.", ".$feed.");";
	
	    	$result = mysqli_query($con,$query) or die('Error in query');
       		//$result = mysql_query($query, $con) or die('Error in query');
        
    	if ($result){
        	echo "Update to database success!!<br>";
			create_RSS_feed(); //Create Feed!!
		} else {
        	echo "Update to database fail!!<br>";
    	}

		}
		?>
	</body>
</html>