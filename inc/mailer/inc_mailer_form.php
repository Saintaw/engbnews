<?php 
require_once '../inc/inc_setup.php';
$templatecontent =  file_get_contents('C:\Users\poiteal\Documents\GitHub\engbnews\inc\mailer\template_1.html');
?>
<div class="row">
    <form class="form-horizontal" id="mailer-form">
<fieldset>
    
<div class="form-group">
  <label class="col-md-3 control-label" for="emrecips">Recipients</label>  
  <div class="col-md-4">
<?php
drawRecipient($conn);
?>  
  </div>
  <div class="col-md-4">
  <input id="extra_recip" name="extra_recip" type="text" placeholder="Extra Recipients" class="form-control input-md">
  <small>(Coma separated values)</small>

  </div>
</div>
    
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

<!-- Text input-->
<div class="form-group">
    <label class="col-md-3 control-label" for="datepicker" id="dp-label">Deadline / Free</label>  
   <div class="col-md-2">
      <input type="checkbox" name="input_switcher" id="input_switcher" class="form-control input-md" data-on-text="Formated"data-off-text="Free" checked>
  </div> 
    
    <div class="col-md-2">
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
<script type="text/javascript">
$(function() {
$("#input_switcher").bootstrapSwitch();


$('#input_switcher').on('switchChange.bootstrapSwitch', function(event, state) {
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
        $.get( "../inc/mailer/template_1.html", function( data ) {
         $( ".result" ).html( data );
         alert(data);
         $('#mainContent').val(data);
         
        //Rich Editor
           $('#mainContent').summernote({
               dialogsInBody: true,
               height: 300,
               minHeight: 300,
               focus: true
               });        
       });   
});
</script>



<?php
function getRecipients($conn) {
    $recipients = [];
    $sql = 'SELECT id, email FROM `recipients` WHERE core = 1 ORDER BY LOWER(email) ASC';
    foreach ($conn->query($sql) as $row) {
    $recipients[$row['id']] =  $row['email'];
    }
    return $recipients;
}

function drawRecipient($conn) {
    $recipients = getRecipients($conn);
    
    echo '<div class="list-group">';
    foreach($recipients as $key => $val) {
       echo '<div class="list-group-item list-group-item-success checkbox">';
       echo '<label><input name="recipients[]" type="checkbox" value="' .$key .'" checked> ' .$val .'</label>';
       echo '</div>'; 
    }
    echo '</div>';    

}


?>