<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>



<div class="row">
    <form class="form-horizontal" id="mailer-form">
<fieldset>
<!-- Text input-->
<div class="form-group">
  <label class="col-md-3 control-label" for="emSubject">Subject</label>  
  <div class="col-md-8">
  <input id="emSubject" name="emSubject" type="text" placeholder="Subject" class="form-control input-md" required="">

  </div>
</div>

<!-- Textarea -->
<div class="form-group">
  <label class="col-md-3 control-label" for="mainContent">Content</label>
  <div class="col-md-8">                     
    <textarea class="form-control" id="mainContent" name="mainContent"></textarea>
  </div>
</div>

<div class="form-group">
    <div class="col-md-3">
    </div>
  <div class="col-md-8">
      <input type="checkbox" name="input_switcher" id="input_switcher" class="form-control input-md" data-on-text="Formated"data-off-text="Free" checked>
  </div>
</div>


<!-- Text input-->
<div class="form-group">
  <label class="col-md-3 control-label" for="datepicker">Deadline / Free</label>  
  <div class="col-md-4">
  <input id="datepicker" name="datepicker" type="text" placeholder="Date" class="form-control input-md">
  <input id="deadline_str" name="deadline_str" type="text" placeholder="ASAP" class="form-control input-md" style="display:none;">
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
$("#input_switcher").bootstrapSwitch();


$('#input_switcher').on('switchChange.bootstrapSwitch', function(event, state) {
  
  //datepicker
  //deadline_str
  
  $("#input_switcher").fadeIn(100).fadeOut(100).fadeIn(100).fadeOut(100).fadeIn(100);
  
  
  if (state == true) {
     console.log('Show it');
     $('#datepicker').show();
     $('#deadline_str').hide();
  }
  else {
     console.log('Hide it'); 
     $('#datepicker').hide();
     $('#deadline_str').show();     
  }
});



$( "#butSave" ).click(function(e) {
      e.preventDefault();
      $formEl = $("#mailer-form").serialize();
      console.log('Parameters :' +$formEl);
     $.post( "./inc/mailer/act_mailer_validate.php", $formEl)
        .done(function( data ) {
        var retResponse = $.trim(data);
        console.log(retResponse);
        $("#debug-div pre").html(retResponse);
        });     

});

    //Date Picker
    $( "#datepicker" ).datepicker();
    
    //Rich Editor
    $('#mainContent').summernote({
        dialogsInBody: true,
        height: 350,
        minHeight: 350,
        focus: true      
        });


});
</script>
