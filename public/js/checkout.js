$('#here').on('dblclick',function(){
  let see  = $('*[id="see"]');
  let hide = $('*[id="hide"]');
  $(hide).css({"-moz-transform": "rotateY(0deg)", "-webkit-transform": "rotateY(0deg)"});
  $(see).css({"-moz-transform": "rotateY(180deg)", "-webkit-transform": "rotateY(180deg)"});
  // see.removeAttr('id')
  // hide.attr('id','here')
  $('#change').text('Double click to enter '+$(see).data('part'))
  $(hide).attr('id','see')
  $(see).attr('id','hide')
})
$('.card-number').keypress(function(){
  if($(this).val().length >=16 ){
    swal({
         title: '16 max a lhmar',
         icon: 'error',
       });
    return false;
  }
})
$('#ccv').keypress(function(){
  if($(this).val().length >=3 ){
    swal({
         title: '3 max a lhmar',
         icon: 'error',
       });
    return false;
  }
})
$('#expire').keyup(function(){
  if($(this).val().length == 2)
    $(this).val($(this).val()+"/");
})
$('#expire').keypress(function(){
  if($(this).val().length >=5 ){
    swal({
         title: '4 max a lhmar',
         icon: 'error',
       });
    return false;
  }
})
// Stripe
