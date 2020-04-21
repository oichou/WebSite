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
