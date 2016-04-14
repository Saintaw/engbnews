<?php
session_start();
/* fake login */
$auth = 0;
$message = "";
if ((isset($_POST['inputEmail']))&&(trim($_POST['inputEmail']) === "a@a.com"))
    {
    $auth = $auth +1;
    }
if ((isset($_POST['inputPassword']))&&(trim($_POST['inputPassword']) === "aaa"))
    {
    $auth = $auth +1;
    }
if ($auth < 2) {
    //failed
    $auth_str = "false";
    $message = "Sorry, either your login or password was wrong...";
    }
else {
    //success
     $auth_str = "true";
     $_SESSION['auth'] = true;
}
//header('Content-Type: application/json');
?>
{
    "result": <?php echo $auth_str; ?>,
    "email": "<?php echo trim($_POST['inputEmail']);?>",
    "message": "<?php echo trim($message);?>"
}