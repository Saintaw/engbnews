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
$id_token = trim($_POST['id_token']);
$picture = trim($_POST['picture']);
$full_name= trim($_POST['full_name']);


if (isset($_SESSION['auth']) and ($_SESSION['auth'] == true)) {
    $auth_str = 'true';
    $username = $_SESSION['username'];
    $message = "Already logged in with active session";
}
else {
    if($errMsg == ''){
            $records = $conn->prepare('SELECT user_id FROM users WHERE active = 1 and user_login = :username');
            $records->bindParam(':username', $username);
            $records->execute();
            $results = $records->fetch(PDO::FETCH_ASSOC);
            if(count($results) > 0 ){
                $_SESSION['auth'] = true;
                $_SESSION['username'] = $username;
                $_SESSION['id_token'] = $id_token;
                $_SESSION['profile_picture'] = $picture;
                $_SESSION['full_name'] = $full_name;

                $auth_str = 'true';
                $message = 'You have successully logged in with google';
            }else{
                $auth_str = 'false';
                $message = 'Username and Password are not found';
            }
        }    
}
?>
{
    "result": <?php echo $auth_str; ?>,
    "email": "<?php echo $username;?>",
    "message": "<?php echo trim($message);?>"
}





