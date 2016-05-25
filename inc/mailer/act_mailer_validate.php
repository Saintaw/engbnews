<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
foreach($_POST as $key=>$value)
{
  if (is_array($value)) {
      print_r($value); 
  }
 else {
     $value = htmlspecialchars($value);
     echo "<br />$key => $value ";     
  }

}
?>


