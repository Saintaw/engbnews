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
    <script src="https://apis.google.com/js/platform.js"></script>
    
    <script type="text/javascript">
 
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
        //require_once '/inc/user/dsp_user.php';
        break;
    case "dsp_form":
        require_once '/inc/inc_mailer_form.php';
        break;
}   
   
   
   
   
   
}    
?>

<div class="row">
    <h2>Debug window</h2>
    <div id="debug-div" style="background-color: #ccc; color: #000;"></div>
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
