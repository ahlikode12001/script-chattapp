/**
 *
 * ChattApp
 *
 * never change this ChattApp.js file because this is the default template
 * because it can make you difficult in updating this site
 *
 */

"use strict";


//Scoollup
var mybutton = document.getElementById("myBtn");
window.onscroll = function() {scrollFunction()};
function scrollFunction() {
  if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
    mybutton.style.display = "block";
  } else {
    mybutton.style.display = "none";
  }
}
function topFunction() {
  document.body.scrollTop = 0;
  document.documentElement.scrollTop = 0;
}
//End Scoollup


//Password Show Dan Hide
$(document).ready(function(){
$('.pass_show').append('<span class="ptxt">Show</span>');
});
$(document).on('click','.pass_show .ptxt', function(){
$(this).text($(this).text() == "show" ? "Hide" : "show");
$(this).prev().attr('type', function(index, attr){return attr == 'password' ? 'text' : 'password'; });
});
//End Password Show Dan Hide
