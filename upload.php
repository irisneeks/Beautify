<!--JS SDK-->

<link rel="stylesheet" type="text/css" href="upload.css">
   <?php
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    $uploadOk = 1;
    $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
    // Check if image file is a actual image or fake image
    if(isset($_POST["submit"])) {
        $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
        if($check !== false) {
            //echo "File is an image - " . $check["mime"] . ".";
            $uploadOk = 1;
        } else {
            //echo "File is not an image.";
            $uploadOk = 0;
        }
    }
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
    // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
            $numOfUploads = count(glob($target_dir . "*png"));
            $imgId = $numOfUploads + 1;
            rename($target_dir . basename( $_FILES["fileToUpload"]["name"]), $target_dir . "img_$imgId." . $imageFileType);
            
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
    $use = true;
    // Custom overlay, if the user selected the option
    if($_POST["choice"] == "make") {
        $use = false;
        $filter_dir = "useroverlays/";
        $filter_file = $filter_dir . basename($_FILES["filterToUpload"]["name"]);
        $filterOk = 1;
        $filterFileType = pathinfo($filter_file,PATHINFO_EXTENSION);
        // Check if image file is a actual image or fake image
        if(isset($_POST["submit"])) {
            $check = getimagesize($_FILES["filterToUpload"]["tmp_name"]);
            if($check !== false) {
                //echo "File is an image - " . $check["mime"] . ".";
                $filterOk = 1;
            } else {
                //echo "File is not an image.";
                $filterOk = 0;
            }
        }
        if ($filterOk == 0) {
            echo "Sorry, your filter was not uploaded.";
        // if everything is ok, try to upload file
        } else {
            if (move_uploaded_file($_FILES["filterToUpload"]["tmp_name"], $filter_file)) {
                $numOfUploads = count(glob($filter_dir . "*png"));
                $filterId = $numOfUploads + 1;
                rename($filter_dir . basename( $_FILES["filterToUpload"]["name"]), $filter_dir . "img_$filterId." . $filterFileType);
                
            } else {
                echo "Sorry, there was an error uploading your filter.";
            }
        }
    } else {
        // This block happens if the user wishes to use our filters
        // $use will be true
        $filterSelectValue = ($_POST["filterSelect"]);
        $filter_dir = "Filters/";
        if($filterSelectValue == 1) {
            $filterId = "1";
            $filterFileType = "jpg";
        } 
        if($filterSelectValue == 2) {
            $filterId = "2";
            $filterFileType = "jpeg";
        }
        if($filterSelectValue == 3) {
            $filterId = "3";
            $filterFileType = "jpg";
        }
    }
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"></meta>
<title>Add Overlays</title>



<script type="text/javascript" src="./jquery.js"></script>
<script type="text/javascript" src="./jstest.js"></script>
<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
<script src="https://code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
</head>
<body bgcolor="#CEFFFF" onload="init()">
    <script>
      window.fbAsyncInit = function() {
          FB.init({
              appId      : '779417025514394',
              //cookie     : true,  // enable cookies to allow the server to access 
                                // the session
              xfbml      : true,  // parse social plugins on this page
              version    : 'v2.5' // use version 2.2
          });
      };
  
    (function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) {return;}
    js = d.createElement(s); js.id = id;
    js.src = "//connect.facebook.net/en_US/sdk.js";
    fjs.parentNode.insertBefore(js, fjs);
  }(document, 'script', 'facebook-jssdk'));
  </script>
  <script>
  // This is called with the results from from FB.getLoginStatus().
  function statusChangeCallback(response) {
    console.log('statusChangeCallback');
    console.log(response);
    // The response object is returned with a status field that lets the
    // app know the current login status of the person.
    // Full docs on the response object can be found in the documentation
    // for FB.getLoginStatus().
    if (response.status === 'connected') {
      // Logged into your app and Facebook.
      testAPI();
    } else if (response.status === 'not_authorized') {
      // The person is logged into Facebook, but not your app.
      document.getElementById('status').innerHTML = 'Please log ' +
        'into this app.';
    } else {
      // The person is not logged into Facebook, so we're not sure if
      // they are logged into this app or not.
      document.getElementById('status').innerHTML = 'Please log ' +
        'into Facebook.';
    }
  }

  // This function is called when someone finishes with the Login
  // Button.  See the onlogin handler attached to it in the sample
  // code below.
  function checkLoginState() {
    FB.getLoginStatus(function(response) {
      statusChangeCallback(response);
    });
  }



  // Now that we've initialized the JavaScript SDK, we call 
  // FB.getLoginStatus().  This function gets the state of the
  // person visiting this page and can return one of three states to
  // the callback you provide.  They can be:
  //
  // 1. Logged into your app ('connected')
  // 2. Logged into Facebook, but not your app ('not_authorized')
  // 3. Not logged into Facebook and can't tell if they are logged into
  //    your app or not.
  //
  // These three cases are handled in the callback function.

  FB.getLoginStatus(function(response) {
    statusChangeCallback(response);
  });




  // Here we run a very simple test of the Graph API after login is
  // successful.  See statusChangeCallback() for when this call is made.
  function testAPI() {
    console.log('Welcome!  Fetching your information.... ');
    FB.api('/me', function(response) {
      console.log('Successful login for: ' + response.name);
      document.getElementById('status').innerHTML =
        'Thanks for logging in, ' + response.name + '!';
    });
  }
</script>
    <div id="page">
        <div id="topwrapper">
            <div id="filter">
                <h1>Add Overlays to an Image</h1>
                <p class="poverlay">Click the button below the image to overlay it.</p>
            </div>
            <a id="scroll"><div class="downbutton">
                <img src="929(1).png" id="down">
                <script>
                     $('#scroll').on('click', function(e){
                        e.preventDefault();
                         $('html, body').stop().animate({
                            scrollTop: $('#bottomwrapper').offset().top
                    }, 750);
                        });
              </script>
            </div></a>
            </div>
        
        
        
        
        
        
        <!--LEAVE THIS GIANT SPACE RIGHT HERE FOR NOW THANKS-->
        
        
        
        
        
        
        
    <div id="bottomwrapper">
        <div class="overlayedited">
            <div class="overlaysec">
            <p class="lobster">
                <strong>Overlay Image:</strong><br/>
                <?php echo "<img src='" . $filter_dir . "img_$filterId.$filterFileType" . "' id='image1'>"; ?>
            </p>
            </div>
            <div class="editedsec">
            <p class="lobster">
                <strong>Edited Image:</strong><br/>
	            <?php echo "<img src='" . $target_dir . "img_$imgId.$imageFileType" . "' id='image'>"; ?>
            </p>
            </div>
        </div>
        
                    </div>
       
        <div class="buttons">
        
            <section class="border">
                <form><a id="toggleDesaturate" class="btn" type="button">Overlay</a></form><br/>
                <form><a id="reload" class="btn" type="button">Revert</a></form><br/>
                <a class="btn" a href="http://www.google.com/" style="text-decoration:none;color:white;" download="beautified.png" id="download">Download</a><br/>
            </section>
        
        </div>
        
             <p>
        <label for="amount">Opacity:</label>
        <input type="text" id="amount" readonly style="border:0; color:#f6931f; font-weight:bold;"><br/>
        <div id="slider"></div>
    </p>
        
           <br/><br/>
        <div class="fb-login-button" data-max-rows="1" data-size="medium" data-show-faces="false" data-auto-logout-link="true"></div>
           <br/>
        <div class="fb-share-button" data-href="https://www.facebook.com/BeautifyWebService" data-layout="button_count"></div>
    </div>
        
            
</body>
</html>