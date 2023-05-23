
/*
 * Welcome to your app's main JavaScript file!
 *
 * We recommend including the built version of this JavaScript file
 * (and its CSS file) in your base layout (base.html.twig).
 */

// any CSS you import will output into a single css file (app.scss in this case)
import './styles/./app.scss';

// start the Stimulus application
import './bootstrap';

//Referencing images from Inside a Webpacked Javascript file from Symfony.com
//ADDED by developper CaroL33FR
import logoPath from './images/Logo_Road_Trip.jpg';

let html = `<img src="${logoPath}" alt="ACME logo">`;
//END of referencing

console.log('Hello Webpack Encore !');

//COPIED-PASTED FROM https://symfony.com/doc/current/frontend/encore/bootstrap.html
//ADDED by developper CaroL33FR

// app.js


// this "modifies" the jquery module: adding behavior to it
// the bootstrap module doesn't export/return anything
require('bootstrap');

// or you can include specific pieces
// require('bootstrap/js/dist/tooltip');
// require('bootstrap/js/dist/popover');

$(document).ready(function() {
    $('[data-toggle="popover"]').popover();
});

//END OF ADDITION by developper CaroL33FR