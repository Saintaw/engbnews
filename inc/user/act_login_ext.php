<?php
session_start();
include_once '../inc_setup.php';
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$errMsg = '';
$username = trim($_POST['username']);
if($errMsg == ''){
        $records = $conn->prepare('SELECT user_id FROM users WHERE active = 1 and user_login = :username');
        $records->bindParam(':username', $username);
        $records->execute();
        $results = $records->fetch(PDO::FETCH_ASSOC);
        if(count($results) > 0 ){
                echo "Success";
            /* Success */
        }else{
            /* Fail */
            
            $errMsg .= 'Username and Password are not found<br>';
            echo "$errMsg";
        }
    }


?>





