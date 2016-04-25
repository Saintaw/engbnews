      <!-- Static navbar -->
      <nav class="navbar navbar-default navbar-fixed-top">
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
    //echo "<li id=\"g-info-holder\">"
    //."<div class= \"g-signin2\" data-onsuccess=\"onSignIn\"></div>"
    //."</li>\n";

    
}
else {
    echo "<li><a class=\"navlink\" href=\"dsp_form\">Form</a></li>\n";
    echo "<li><a class=\"navlink\" href=\"test\">Test</a></li>\n";
    echo "<li><a class=\"navlink\" href=\"history\">History</a></li>\n";
    echo "<li><a class=\"navlink\" href=\"contacts\">Contacts</a></li>\n";
    echo "<li><a class=\"logout-but\" href=\"?actn=logout&logout=1\">Logout</a></li>\n";
    
}   


    echo "<li id=\"g-info-holder\">"
    ."<div id=\"my-signin2\" class= \"g-signin2\" data-onsuccess=\"onSignIn\"></div>"
    ."</li>\n";
    echo '<div class="g-info"></div>';


?>
            </ul>

          </div><!--/.nav-collapse -->
        </div><!--/.container-fluid -->
      </nav>

