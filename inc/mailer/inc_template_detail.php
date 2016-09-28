<?php
session_start();
require_once '../../inc/inc_setup.php';
function getTemplateContent($conn, $tid) {
    $sql = 'SELECT t_content FROM `templates` WHERE t_id = ' .intval($tid);
    foreach ($conn->query($sql) as $row) {
    $tContent =  $row['t_content'];
    }
    return $tContent;      
}
$tid = intval($_GET["tid"]);
echo getTemplateContent($conn, $tid);
?>
