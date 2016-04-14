$(function() {
    //trigger when page has loaded 

   
  });



/******************* Per page functions ***********************/
$( "#form-login" ).submit(function(e) {
  e.preventDefault();
  var strInputs = $( "#form-login" ).serialize();
  
  $("#errLogin").html('');
  $("#errLogin").hide();
  
  
  $.post( "./inc/act_login.php", strInputs)
  .done(function( data ) {
    var retLogin = jQuery.parseJSON(data);
    
    if (retLogin.result === true) {
       //login success 
       window.location = './index.php?=SID';
    }
    else {
       //login failed
      $("#errLogin").html(retLogin.message);
      $("#errLogin").show('slow');
       
    }
    
    
    
  });
  
  
  
});

/*
 {
    "result": true,
    "email": a@a.com",
    "ts": "Monday 4th of April 2016 11:44:19 AM"
}

 
 */