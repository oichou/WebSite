$('.readonly').each(function(){
    $(this).on('click',function(){
      $(this).next().css('display','block');
      $(this).next().on('blur',function(){
        if($(this).val() == ""){
          $(this).css('display','none');
          $(this).removeAttr("name");
          $(this).prev().attr('name',$(this).prev().data('name'));
        }
        else {
          $(this).attr('name',$(this).prev().data('name'));
          $(this).prev().removeAttr("name");
        }
      })

    })
})

// $('.nan').on("keypress", function(e) {
//   // console.log($(this).val());
//   // if($(this).val().includes(e))
//   //   alert('rr')
//   // if(e.charCode == 44 )
//   //   return ;
//   if (e.charCode < "0".charCodeAt(0) || e.charCode > "9".charCodeAt(0))
//     e.preventDefault();
// })
