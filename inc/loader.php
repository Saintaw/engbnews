<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$actn = "";

if (isset($_GET['actn'])) {
    echo "Action => '" .trim($_GET['actn']) ."'";
    $actn = trim($_GET['actn']);
    
}   
switch ($actn) {
    case "home":
        //require_once '/inc/user/dsp_user.php';
        break;
    case "dsp_form":
        require_once 'inc_mailer_form.php';
        break;
}      

?>

