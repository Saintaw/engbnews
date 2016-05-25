requirejs.config({
    baseUrl: './js/lib',
    paths: {
        jquery: 'jquery.min',
        local: './scripts/local',
        bootstrap: 'bootstrap.min'
    }
});

require(['jquery'], function ($) {
    console.log('jQuery loaded');

});

requirejs(["local"], function(local) {
    console.log('Local files loaded');   
    
});
requirejs(["bootstrap.min"], function(bootstrap) {
      console.log('Bootstrap loaded');
    
});


