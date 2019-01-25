console.log('Hello Webpack Encore! Edit me in assets/js/enable-bootstrap-tooltip.js');

const $ = require('jquery');

$(function() {
    console.log($('*[data-toggle="tooltip"]').tooltip());
    window.$ = $;
});
