$('.promo').each(function(){
  $(this).on('click',function(){
    let price = $(this).parents('td').prev()
    let elem = $(this)
    // alert(price)
    let percentage = $(this).parents('td').next()
    let id = $(this).data('id');
    let type = $(this).data('type')
    changepromo(elem,id,price,percentage,type)
      })
    })
    function changepromo(elem,id,price,percentage,type) {
        // if(type == true)
        // {
        //   var hello = confirm("Are you sure you want to remove promotion");
        //   if(hello == false)
        //     return ;
        //   else
        //     let promo = 0;
        // }
        // else {
          var promo = prompt("Please enter promo percentage :", 10);
          if (promo == null || promo == "")
              return;
        // }

        $.ajax({
            url:`/product/discount`,
            method: 'post',
            data: { id,promo,type },
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            success : function(data){

                   if (data.error) {
                       alert(data.error);
                       return;
                   }
                   $(elem).data('type', data.type);
                   $(price).text("$".concat(data.new_price));
                   $(percentage).text(data.promo.concat("%"));
            }
        })
      }


$('.admin').each(function(){
    $(this).on('click',function(){
      let type = $(this).data('type');
      let elem = $(this);
      let id = $(this).data('id');
      chmod(elem,type,id);
    })
})

function chmod(elem,type,id){
  var r = confirm("Are you sure you want to change rights");
  if(r == true){
    var code = prompt("enter your code","0000");
      $.ajax({
          url:`/admin/chmod`,
          method: 'post',
          data: { id,type,code },
          headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
          success : function(data){

                 if (data.error) {
                     alert(data.error);
                     return;
                   }
                   $(elem).data('type', data.type);
                 }
               })
             }
  else
    return ;
}
