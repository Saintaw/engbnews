<?php
/*Login display*/
?>
<style>
    #errLogin {
        display: none;
        border: solid 1px #ccc;
        padding: 6px;
        margin-bottom: 4px;
    }
    
</style>


<!-- 
<br />//LinkedIn
<script type="in/Login"></script>
-->

<div class="row">
    <div class="col-md-2"> </div>  
    <div class="col-md-6">
        <form class="form-signin" id="form-login">
        <h2 class="form-signin-heading">Please sign in</h2>
        <div id="errLogin" class="bg-danger">
            //Error message visible here
        </div>
        
        
        
        <label for="inputEmail" class="sr-only">Email address</label>
        <input type="email" name="inputEmail" id="inputEmail" class="form-control" placeholder="Email address" required autofocus>
        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" name="inputPassword" id="inputPassword" class="form-control" placeholder="Password" required>
        <button id="btn-login" class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
      </form>
    </div>
    <div class="col-md-2"> </div>  
</div>
