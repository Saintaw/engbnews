requirejs.config({
    baseUrl: 'js/lib',
    paths: {
        jquery: 'jquery-2.2.2'
    }
});

require(['jquery'], function ($) {

});

requirejs(["local"], function(local) {
   
    
});
requirejs(["bootstrap.min"], function(bootstrap) {
  
    
});


