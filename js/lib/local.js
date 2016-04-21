$(function() {
    //trigger when page has loaded 
    var auth2; // The Sign-In object.
    var googleUser; // The current user.
    
    /*
    var appStart = function() {
      gapi.load('auth2', function() {
        gapi.auth2.init();
        console.log('"gapi" loaded');
      });
    }
    */
       gapiAppStart();

    /*Event Driven */
    $( ".logout-but" ).click(function(e) {
       e.preventDefault();
       signOut();
       signOutLocal();
   });

    
    
    
    
  });

/*
 625982426571-cdlve945k3eonv5hp7lhg7oikh2hprgp.apps.googleusercontent.com
*/


    function gapiAppStart(auth2){
       gapi.load('auth2', function() {
        gapi.auth2.init({client_id:'625982426571-cdlve945k3eonv5hp7lhg7oikh2hprgp.apps.googleusercontent.com'});
        console.log('Google API "gapi" loaded');
        


      });       
    }

    function gapiUserDetail() {

            if (auth2.isSignedIn.get()) {
            var profile = auth2.currentUser.get().getBasicProfile();
            console.log('ID: ' + profile.getId());
            console.log('Full Name: ' + profile.getName());
            console.log('Given Name: ' + profile.getGivenName());
            console.log('Family Name: ' + profile.getFamilyName());
            console.log('Image URL: ' + profile.getImageUrl());
            console.log('Email: ' + profile.getEmail());
        }
        else {
            console.log('User NOT Signed in');

        }     
       
        
    }
    function onSignIn(googleUser) {
      var profile = googleUser.getBasicProfile();
      var gInfoStr = "";
      
      console.log(profile);
      
      gInfoStr += '<div id="g-card">';
      gInfoStr += '<a href="#profile" id="signout-but" class="logout-but"><img src="' +profile.getImageUrl() +'" class="g-picture" />';
      gInfoStr += '<div id="g-person">';
      gInfoStr += profile.getName();
      gInfoStr += '</div>';
      
      gInfoStr += '</a></div>';

        $.post( "./inc/user/act_login_ext.php", { username: profile.getEmail() })
         .done(function( data ) {
           //console.log( "Data Loaded: \n");
           //console.log($.trim(data));
           $("#debug-div").html($.trim(data));
           var retLogin = jQuery.parseJSON(data);
    
            if (retLogin.result === true) {
                $(".g-info").show(); 
                $(".g-info").html(gInfoStr);
                $("#g-info-holder").hide();          
                 
                 $("#login-container").html("<h4>debug: Logged in</h4>");
                 dislayUserPanel(profile);
             }
                else {
                   alert('login failed'); 
                }
            
        });

    }
  function signOut() {
    var auth2 = gapi.auth2.getAuthInstance();
    auth2.signOut().then(function () {
      console.log('User signed out from Google.');
    });
  }
  function signOutLocal() {
    $.post( "./inc/user/act_logout.php")
    .done(function( data ) {
      var retLogout = data;
      alert(retLogout);
    });      
  }


/******************* Per page functions ***********************/


function dislayUserPanel(profile) {
    $.post( "./inc/user/dsp_user.php", profile)
    .done(function( data ) {
      var retLogout = data;
      $("#debug-div").html(data);
      
    });     
}



$( "#form-login" ).submit(function(e) {
  e.preventDefault();
  var strInputs = $( "#form-login" ).serialize();
  
  $("#errLogin").html('');
  $("#errLogin").hide();
  
  
  $.post( "./inc/user/act_login.php", strInputs)
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