<?php
session_start();
$actn = "";
if (!isset($_SESSION["actn"])) {
   $_SESSION["actn"] = ""; 
}


if (isset($_GET['actn'])) {
    echo "Action => GET: '" .trim($_GET['actn']) ."'";
    $actn = trim($_GET['actn']);
    $_SESSION["actn"] = $actn;
}   
else {
    $actn = $_SESSION["actn"];
    echo "Action => Session: '" .$actn ."'";
}

switch ($actn) {
    case "home":
        echo "<h1>Home Page...</h1>";
        break;
    case "dsp_form":
        require_once '/mailer/inc_mailer_form.php';
        break;
}      

?>

