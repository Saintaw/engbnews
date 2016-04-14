<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<div class="row" style="border: solid 1px #f0f;">
<form class="form-horizontal">
<fieldset>
<!-- Text input-->
<div class="form-group">
  <label class="col-md-3 control-label" for="emSubject" style="border: solid 1px #f0f;">Subject</label>  
  <div class="col-md-8">
  <input id="emSubject" name="emSubject" type="text" placeholder="Subject" class="form-control input-md" required="">
  <span class="help-block">Type in an email subject here</span>  
  </div>
</div>

<!-- Textarea -->
<div class="form-group">
  <label class="col-md-3 control-label" for="mainContent">Content</label>
  <div class="col-md-8">                     
    <textarea class="form-control" id="mainContent" name="mainContent">This is where you put the body of your message...</textarea>
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-3 control-label" for="datepicker">Deadline</label>  
  <div class="col-md-8">
  <input id="datepicker" name="datepicker" type="text" placeholder="Date or ASAP" class="form-control input-md">
    
  </div>
</div>

<!-- Button (Double) -->
<div class="form-group">
  <label class="col-md-3 control-label" for="butSave"></label>
  <div class="col-md-8">
    <button id="butSave" name="butSave" class="btn btn-success">Send</button>
    <button id="butCancel" name="butCancel" class="btn btn-danger">Reset</button>
  </div>
</div>

</fieldset>
</form>
</div>

<script>
$(function() {
    //trigger when page has loaded 

   //datepicker
   $( "#datepicker" ).datepicker();
   
  });
</script>


