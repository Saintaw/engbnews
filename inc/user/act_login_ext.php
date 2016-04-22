<?php
session_start();
//header('Content-Type: application/json');
include_once '../inc_setup.php';
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$errMsg = '';
$message = "";
$username = trim($_POST['username']);

if($errMsg == ''){
        $records = $conn->prepare('SELECT user_id FROM users WHERE active = 1 and user_login = :username');
        $records->bindParam(':username', $username);
        $records->execute();
        $results = $records->fetch(PDO::FETCH_ASSOC);
        if(count($results) > 0 ){
            $_SESSION['auth'] = true;
            $_SESSION['username'] = $username;
            $auth_str = 'true';
            $message = 'You have successully logged in with google';
        }else{
            $auth_str = 'false';
            $message = 'Username and Password are not found';
        }
    }
?>
{
    "result": <?php echo $auth_str; ?>,
    "email": "<?php echo $username;?>",
    "message": "<?php echo trim($message);?>"
}





