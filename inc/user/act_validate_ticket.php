<?php
/*validate ticket*/
session_start();
$sess_ticket = '625982426571-cdlve945k3eonv5hp7lhg7oikh2hprgp.apps.googleusercontent.com';
$process_ticket = trim($_POST['id_ticket']);
$res =  'false'; 

if (strpos($sess_ticket, $process_ticket) !== false) {
    $res = 'true';
}
else {
     $res =  'false';   
}
?>
{
    "result": <?php echo $res; ?>,
    "email": "<?php echo $_SESSION['username'];?>"
}