<?php
    
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
	<title>Beautify</title>
	  <link rel="stylesheet" type="text/css" href="/hacks.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="http://www.w3schools.com/lib/w3.css">
    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Lobster+Two" />
    <script type="text/javascript" src="jquery.js"></script>
    <script type="text/javascript" src="fbapi.js"></script>
	<meta http-equiv="content-type" content="text/html;charset=utf-8" />
	<meta name="generator" content="Geany 1.24" />
</head>

<body>
<div id="wrapper">
  <div id="filter">
    <div id="content"><h1 class="beginning"><i>Beautify</i></h1></div>
  </div>
  <a id="scroll"><div class="downbutton">
    <img src="929(1).png" id="down">
      <script>
        $('#scroll').on('click', function(e){
          e.preventDefault();
          $('html, body').stop().animate({
            scrollTop: $('#upload').offset().top
          }, 750);
        });
      </script>
    </div></a>
</div>
<div id="upload">
<br/><br/>
  <div class="sectionheader"><h2 class="section">Select images to upload:</h2></div>
    <form action="/upload.php" method="post" enctype="multipart/form-data">
        <div class="options">
          <input type="radio" name="choice" checked="checked" id="Use" value="use" onclick="">Use our filters&nbsp;&nbsp;&nbsp;
        <input type="radio" name="choice" id="Make" value="make">Make your own filter<br/>
        </div>
        <span style="color:#388bff;">Upload Image:</span><br/> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="file" name="fileToUpload" id="make">
        <div id="makeform"><input type='radio' name='filterSelect' value='1' checked>Ancient</input>&nbsp;&nbsp;&nbsp;<input type='radio' name='filterSelect' value='2'>Sunset</input>&nbsp;&nbsp;&nbsp;<input type='radio' name='filterSelect' value='3'>Warmth</input></div>
        <input type="submit" value="Upload Image" name="submit">
    </form>
  <script type="text/javascript">
    window.onload = function() {
      var use = document.getElementById("Use");
      var make = document.getElementById("Make");
      
      use.onclick = function() {
        document.getElementById("makeform").innerHTML = "<input type='radio' name='filterSelect' value='1' checked>Ancient</input>&nbsp;&nbsp;&nbsp;<input type='radio' name='filterSelect' value='2'>Sunset</input>&nbsp;&nbsp;&nbsp;<input type='radio' name='filterSelect' value='3'>Warmth</input>";
      };
      make.onclick = function() {
        document.getElementById("makeform").innerHTML = "<span style='color:#388bff;'>Upload Filter:</span><br/> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type='file' name='filterToUpload' id='filterToUpload'>";
      };
    }
  </script>
  <br/><br/>
</div>
</body>

</html>
