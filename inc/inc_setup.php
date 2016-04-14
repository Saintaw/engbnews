<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$appName = "EngB - Position Mailer";
$actn = "home";
if ((isset($_GET['actn']))&&(trim($_GET['actn']) !== "")) {
    $actn = trim($_GET['actn']);
}

$servername = "localhost";
$username = "www";
$password = "www";

try {
    $conn = new PDO("mysql:host=$servername;dbname=engbnews", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //echo "Connected successfully";
    }
catch(PDOException $e)
    {
    die("Connection failed: " . $e->getMessage());
    }

?>


