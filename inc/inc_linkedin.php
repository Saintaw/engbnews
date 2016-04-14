<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

?>

<script type="text/javascript" src="//platform.linkedin.com/in.js">
    api_key:   77qbyk6th5b4ua
    onLoad: onLinkedInLoad   
    authorize: false
    lang:      en_UK
</script>
<script type="text/javascript">
    
    // Setup an event listener to make an API call once auth is complete
    function onLinkedInLoad() {
        IN.Event.on(IN, "auth", getProfileData);
    }

    // Handle the successful return from the API call
    function onSuccess(data) {
        console.log(data);
    }

    // Handle an error response from the API call
    function onError(error) {
        console.log(error);
    }

    // Use the API call wrapper to request the member's basic profile data
    function getProfileData() {
        IN.API.Raw("/people/~").result(onSuccess).error(onError);
    }

</script>