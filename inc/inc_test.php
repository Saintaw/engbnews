<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<swnav>
    <ul id="sw-init-list" class="list-inline">
        <li>
            <button id="sw-master" data-sw="http://swapi.co/api/" type="button" class="btn btn-danger btn-sw">Star Wars!</button>
        </li>
    </ul>
    
</swnav>

<div class="row">
  <div class="col-sm-4">
      <ul id="sw-listing" class="list-group"></ul>
      
  </div>
  <div class="col-sm-4"  id="swapi-detail">//details here</div> 
  <div class="col-sm-4" id="swapi-canvas">//canvas here</div>
</div>


<script>
var rootApi = "http://swapi.co/api/";    
loadSW(rootApi);    
    
   $( "body" ).on( "click", ".btn-sw", function(e) {
      e.preventDefault();
      linkurl = $(this).data("sw");
      loadSW(linkurl);
    });


function loadSW(linkurl) {
  var swApi = linkurl;
  $.getJSON( swApi, {
    format: "json"
  })
    .done(function( data ) {
          console.clear(); 
        if (rootApi == linkurl) {
            //use only for root links
            $.each( data, function( key, val ) {
             $("#sw-init-list").append('<li><button type="button" class="btn btn-danger btn-sw" data-sw="'+val +'">'+key +'</button></li>');
             });              
            }
        else {
            var film_c = linkurl.indexOf("films");
            if (film_c > 0) {
                 listMovies();
                }
            else
                {
                //not covered yet
                console.log('Feature not covered yet');
                $.each( data.results, function( key, val ) {
                       console.log(data.results[key]);
                   });                    
                }
        }
            

    $("#debug-div pre").append('\n' + JSON.stringify(data));
    //console.log('call complete');
    });
}

function listMovies() {
 console.clear(); 
 console.log('Movie Listing Start');
  var swApi = "http://swapi.co/api/films/";
  
  $.getJSON( swApi, {
    format: "json"
  })
    .done(function( data ) {
    //console.log('results: ',data.results);
        $('#sw-listing').prepend("<h1>Movie listing: </h1>");
        $('#sw-listing').empty();
        $(data.results).each(function(index, Element) {
            
        $butn =   $('<button/>')
            .text(Element.title)
            .addClass('btn btn-default')
            .click(function () { showMovie(Element.episode_id);}
            );            
            
            $("<li />").html($butn).addClass('list-group-item').appendTo($('#sw-listing'));

 
        });

    });    
    
}

function showMovie(movieId) {
    console.clear(); 
    console.log('Movie Detail Start');
    var swApi = "http://swapi.co/api/films/";
  
}

/*
 $("#debug-div pre").html(JSON.stringify(data)); 

 */
</script>


