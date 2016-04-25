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
    <meta name="google-signin-client_id" content="625982426571-cdlve945k3eonv5hp7lhg7oikh2hprgp.apps.googleusercontent.com">
    <script src="js/lib/jquery.min.js"></script>
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

<navigation>
<?php
require_once '/inc/nav/inc_nav.php';
?>
</navigation>    
<maincontainer>
<!-- Main Content goes here -->

</maincontainer>    
<div class="row">
    <div id="user-div"></div>
</div>

<div class="row">
    
    <div id="debug-be-div" class="col-md-6">
        <h2>Debug window (Server)</h2>
 <?php
if (!isset($_SESSION['auth']) or $_SESSION['auth'] == "") {
    require_once '/inc/user/login.php';
    }
else {
    echo "<pre>Debug: Logged in.";
    echo "\nAction: $actn\n";
    print_r($_SESSION);
   echo "</pre>\n";
}    
?>       
    </div>
    
    <div id="debug-div" class="col-md-6">
        <h2>Debug window (Client)</h2>
        <pre></pre>
    </div>
</div>

</div>

<script src="js/bootstrap.min.js"></script>
<script src="js/lib/jquery-ui/jquery-ui.js"></script>
<script src="https://apis.google.com/js/platform.js" async defer></script>
<script src="js/lib/local.js"></script> 
</body>
</html>
