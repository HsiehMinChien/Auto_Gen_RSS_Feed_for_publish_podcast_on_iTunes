<!DOCTYPE HTML>
<html>
	<head>
	</head>
	<body class="subpage">
		<div id="main">
			<section class="wrapper style1">
				<div class="inner">
                    <form name="reg" action="upload3.php" method="post" enctype="multipart/form-data">
                    - Title<br>
                    <input type="text" name="title" class="form-control" placeholder="Type Title"><br>
                    - Description<br>
                    <input type="text" name="description" class="form-control" placeholder="Type description"><br>
                    - The Duration of Audio File (e.g. 16:13) <br>
                    <input type="text" name="duration" class="form-control" placeholder="Type duration"><br>
                    <br>- RSS Feed Category
                    <div class="4u 12u$(small)">
                    <input type="radio" name="FC" id="None" value="0">
                    <label for="None">None</label>
                    <input type="radio" name="FC" id="AMiC" value="1" checked>
                    <label for="AMiC">1</label>
                    <input type="radio" name="FC" id="MwM" value="2">
                    <label for="MwM">2</label>
                    <input type="radio" name="FC" id="BF" value="3">
                    <label for="BF">3</label>
                    </div>
					<br>- File Type
					<div class="4u 12u">
                    <input type="radio" name="type" id="mp3" value="0" checked>
                    <label for="mp3">MP3</label>
                    <input type="radio" name="type" id="mp4" value="1">
                    <label for="mp4">MP4</label>
                    </div>
                    <br>- File location <br>
                    <input type="text" name="filename" placeholder="Type file name"><br><br>
                    <input type="submit" value="Upload Audio Information" name="submit">
                    <input type="reset" value="Reset">
                    <input type="hidden" name="show" class="form-control" value="1">
                    </form>
				</div>
			</section>
		</div>
	</body>
</html>