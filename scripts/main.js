requirejs.config({
});
requirejs(['jquery'], function( $ ) {});


requirejs(["lib/jquery-ui"], function(jui) {});
requirejs(["lib/bootstrap"], function(bootstrap) {});


requirejs(["lib/summernote.min"], function(summernotemin) {});
requirejs(["lib/bootstrap-switch"], function(bootstrapswitch) {});


requirejs(['local'], function( ) {});

