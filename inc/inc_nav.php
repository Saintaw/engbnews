<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
      <!-- Static navbar -->
      <nav class="navbar navbar-default">
        <div class="container-fluid">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#"><?php echo $appName;?></a>
          </div>
          <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
              <li class="active"><a href="./index.php">Home</a></li>

<?php
if (!isset($_SESSION['auth']) or $_SESSION['auth'] == "") {
  
    
}
else {
    echo "<li><a href=\"?actn=test\">Test</a></li>\n";
    echo "<li><a href=\"?actn=history\">History</a></li>\n";
    echo "<li><a href=\"?actn=contacts\">Contacts</a></li>\n";
    echo "<li><a href=\"?actn=logout&logout=1\">Logout</a></li>\n";
    
}   


    echo "<li id=\"g-info-holder\"><div class= \"g-signin2\" data-onsuccess=\"onSignIn\"></div></li>\n";
    echo '<div class="g-info"></div>';
?>
            </ul>

          </div><!--/.nav-collapse -->
        </div><!--/.container-fluid -->
      </nav>

