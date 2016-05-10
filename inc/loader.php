<?php
session_start();
$actn = "";
if (!isset($_SESSION["actn"])) {
   $_SESSION["actn"] = "home"; 
}
echo '<div class="bg-warning">';
if (isset($_GET['actn'])) {
    echo "Action => GET: '" .trim($_GET['actn']) ."'";
    $actn = trim($_GET['actn']);
    $_SESSION["actn"] = $actn;
}   
else {
    $actn = $_SESSION["actn"];
    echo "Action => Session: '" .$actn ."'";
}
echo '</div>';



switch ($actn) {
    case "home":
        echo "Home Page";
        break;
    case "dsp_form":
        require_once '/mailer/inc_mailer_form.php';
        break;
    case "test":
        require_once '/inc_test.php';
        break;    
}      

?>

