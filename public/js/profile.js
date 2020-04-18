/* JS Document */



$(document).ready(function(){

  "use strict";

  var button = $(".btn.btn-dark.rounded-pill.py-2.btn-block");
  var inp = $('.form-control-hh');
  var sub = $(".btn-new");
  var parent = $('.col-md-10.col-sm-9.col-xs-12')

  inp.hide();
  sub.hide();

  // About the username :

  $('#busername').click(function(){
    $('#tusername').show();
    $('#susername').show();
    return false;
  })

  // About the first_name :

  $('#bfname').click(function(){
    $('#tfname').show();
    $('#sfname').show();
    return false;
  })

  // About the last_name :

  $('#blname').click(function(){
    $('#tlname').show();
    $('#slname').show();
    return false;
  })

  // About the email :

  $('#bemail').click(function(){
    $('#temail').show();
    $('#semail').show();
    return false;
  })

  // About the Phone Number :

  $('#bphone').click(function(){
    $('#tphone').show();
    $('#sphone').show();
    return false;
  })

   // About the Birthday :

   $('#bbirth').click(function(){
     $('#tbirth').show();
     $('#sbirth').show();
     return false;
   })


});
