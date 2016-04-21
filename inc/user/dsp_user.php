<?php
$g_name = "No Name";
$g_email = "No Email";
$g_photo = "No Photo";

if (isset($_POST["wc"])&&(trim($_POST["wc"]) !== ""))
    {
    $g_name = trim($_POST["wc"]);
    }
if (isset($_POST["hg"])&&(trim($_POST["hg"]) !== ""))
    {
    $g_email = trim($_POST["hg"]);
    }
if (isset($_POST["Ph"])&&(trim($_POST["Ph"]) !== ""))
    {
    $m_photo = trim($_POST["Ph"]);
    $g_photo = '<img src="' .$m_photo .'"></img>';
    }    
?>
<div id="user-panel">
    <div class="panel-name"><?php echo $g_name; ?></div>
    <div class="panel-email"><?php echo $g_email; ?></div>
    <div class="panel-photo"><?php echo $g_photo; ?></div>
</div>



