<?php 
session_start();
require_once '/inc/inc_setup.php';
?>
<!DOCTYPE html>
<html lang="en" >
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <script src="js/lib/jquery.min.js"></script>
    <meta name="google-signin-client_id" content="625982426571-cdlve945k3eonv5hp7lhg7oikh2hprgp.apps.googleusercontent.com">
    <script src="https://apis.google.com/js/platform.js?onload=onLoadCallback"></script>
    
    <script>
window.onLoadCallback = function(){
gapi.auth2.getAuthInstance()({
      client_id: '625982426571-cdlve945k3eonv5hp7lhg7oikh2hprgp.apps.googleusercontent.com'
    });
   console.log('Google api loaded');
    console.log(gapi.auth2);
}
    
    
    /* Google sign in*/
    function onSignIn(googleUser) {
      var profile = googleUser.getBasicProfile();
      var gInfoStr = "";
      
      gInfoStr += '<div id="g-card">';
      gInfoStr += '<a href="?actn=logout&logout=1#profile"><img src="' +profile.getImageUrl() +'" class="g-picture" />';
      
      gInfoStr += '<div id="g-person">';
      gInfoStr += profile.getName();
      gInfoStr += '</div>';
      
      gInfoStr += '</a></div>';
      
      /*
      console.log('ID: ' + profile.getId()); // Do not send to your backend! Use an ID token instead.
      console.log('Name: ' + profile.getName());
      console.log('Image URL: ' + profile.getImageUrl());
      console.log('Email: ' + profile.getEmail());
      */
 
        $.post( "./inc/user/act_login_ext.php", { username: profile.getEmail() })
         .done(function( data ) {
           console.log( "Data Loaded: ");
           console.log(data);
           $("#debug-div").html(data);
         });
 
 
 
 
 
      $(".g-info").show(); 
      $(".g-info").html(gInfoStr);
      $("#g-info-holder").hide();
    }

    </script>



    <title><?php echo $appName;?></title>

    <!-- Style -->
    <link href="css/sh-bootstrap.min.css" rel="stylesheet">
    <link href="css/jquery-ui.min.css" rel="stylesheet">
    <link href="css/local.css" rel="stylesheet">
    <style>
   
    </style>

   </head>
<?php
if ((isset($_GET['logout']))&&($_GET['logout'] == 1)) {
    require_once '/inc/user/act_logout.php';
}
?>
   
<body>
<div class="container">
<!-- <div ng-app="myApp" ng-controller="myCtrl">
User: {{ firstName + " " + lastName }}
</div>
-->
<?php
require_once '/inc/inc_nav.php';




if (!isset($_SESSION['auth']) or $_SESSION['auth'] == "") {
    require_once '/inc/user/login.php';
    }
else {
    echo "<pre>Debug: Logged in.";
    echo "\nAction: $actn\n";
    print_r($_SESSION);
   echo "</pre>\n";

/* MAIN SWITCHCASE */
switch ($actn) {
    case "home":
        require_once '/inc/inc_mailer_form.php';
        break;

}   
   
   
   
   
   
}    
?>

<div class="row">
    <h2>Debug</h2>
    <div id="debug-div"></div>
</div>

</div>

<script src="js/bootstrap.min.js"></script>
<script src="js/lib/jquery-ui/jquery-ui.js"></script>

<script src="js/lib/local.js"></script> 



<!--
<script src="js/angular.js"></script>
<script src="js/myApp.js"></script>
<script src="js/myCtrl.js"></script>
-->

</body>
</html>
