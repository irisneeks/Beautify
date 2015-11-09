<?php
    
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
	<title>Beautify</title>
	 <link rel="stylesheet" type="text/css" href="/ui/hacks.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="http://www.w3schools.com/lib/w3.css">
    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Lobster+Two" />
	<meta http-equiv="content-type" content="text/html;charset=utf-8" />
	<meta name="generator" content="Geany 1.24" />
</head>

<body>
<div id="wrapper">
  <div id="filter">
    <h1 class="beginning"><i>Beautify</i></h1>
  </div>
  <div class="downbutton"><img src="/ui/929(1).png" id="down">
    </div>
</div>
<form action="/upload.php" method="post" enctype="multipart/form-data">
        Select image to upload:
        <input type="file" name="fileToUpload" id="fileToUpload">
        <input type="submit" value="Upload Image" name="submit">
    </form>
</body>

</html>
