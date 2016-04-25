$(function() {
    /*
     625982426571-cdlve945k3eonv5hp7lhg7oikh2hprgp.apps.googleusercontent.com
    */
    //trigger when page has loaded 
    var auth2; // The Sign-In object.
    var googleUser; // The current user.

    //Call Google API
    //var myGapi = gapiAppStart();

    /******************* Event Driven functions *******************/
    
            
     $( ".navlink" ).click(function(e) {
       e.preventDefault();
        strInputs = {actn: $(this).attr('href')};
        loadPageContent(strInputs);

   });   

    function loadPageContent(addr) {
       $.get( "./inc/loader.php", strInputs)
            .done(function( data ) {
            $("maincontainer").html(data); 
        }); 
    }
    
    
    
    
    
    $( ".logout-but" ).click(function(e) {
       e.preventDefault();
       signOut();
       signOutLocal();
       window.location = "./index.php";
   });
});

    /******************* Global functions *******************/
    

    function gapiAppStart(){
       gapi.load('auth2', function() {
        auth2 = gapi.auth2.init({client_id:'625982426571-cdlve945k3eonv5hp7lhg7oikh2hprgp.apps.googleusercontent.com'});
        console.log('Google API "gapi" loaded with gapiAppStart');
        console.log(auth2.currentUser);
            if (auth2.isSignedIn.get()) {
              var profile = auth2.currentUser.get().getBasicProfile();
              console.log('ID: ' + profile.getId());
              console.log('Full Name: ' + profile.getName());
              console.log('Given Name: ' + profile.getGivenName());
              console.log('Family Name: ' + profile.getFamilyName());
              console.log('Image URL: ' + profile.getImageUrl());
              console.log('Email: ' + profile.getEmail());
            }

      });       
    }

    function onSignIn(googleUser) {
      var profile = googleUser.getBasicProfile();
      var gInfoStr = "";
      var id_token = googleUser.getAuthResponse().id_token;
      
        $.post( "https://www.googleapis.com/oauth2/v3/tokeninfo?", { id_token: id_token }, function() {
          //console.log("Called Ticket auth");
      })
          .error(function() { 
                console.log("Error authenticating with Google");
                signOut();
                signOutLocal();  
          })
          .success(function(gdata) { 
            $.post( "./inc/user/act_validate_ticket.php", {id_ticket: gdata.aud })
            .done(function( localdata ) {
                 var retValidate = jQuery.parseJSON(localdata);  
                 if (retValidate.result == true) {
                     //console.log('Auth Validated');
                 }
                 else {
                 console.log("Error authenticating with Google");
                 signOut();
                 signOutLocal();                      
                 }
            });
        });        
      
      gInfoStr += '<div id="g-card">';
      gInfoStr += '<a href="#profile" id="signout-but" class="logout-but"><img src="' +profile.getImageUrl() +'" class="g-picture" />';
      gInfoStr += '<div id="g-person">';
      gInfoStr += profile.getName();
      gInfoStr += '</div>';
      gInfoStr += '</a></div>';

        $.post( "./inc/user/act_login_ext.php", {
            username: profile.getEmail(),
            id_token: id_token, 
            picture: profile.getImageUrl(),
            full_name: profile.getName()
            
         })
         .done(function( data ) {
           $("#debug-div pre").html($.trim(data));
           var retLogin = jQuery.parseJSON(data);
    
            if (retLogin.result === true) {
                $(".g-info").show(); 
                $(".g-info").html(gInfoStr);
                $("#g-info-holder").hide();          
                $("#login-container").html("<h4>debug: Logged in</h4>");
                dislayUserPanel(profile);
             }
                else {
                   alert('Sorry: login failed'); 
                }
        });

    }
  function signOut() {
    var auth2 = gapi.auth2.getAuthInstance();
    auth2.signOut().then(function () {
    });
  }
  function signOutLocal() {
    $.post( "./inc/user/act_logout.php")
    .done(function( data ) {
      var retLogout = data;
    });      
  }

/******************* Per page functions ***********************/





function dislayUserPanel(profile) {
    $("#user-div").hide();
    $.post( "./inc/user/dsp_user.php", profile)
    .done(function( data ) {
      var retLogout = data;
      $("#user-div").html(data);
      $("#user-div").fadeIn( 400 );
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