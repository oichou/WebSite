// alert('ff')
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
        var promo = prompt("Please enter promo percentage :", 10);
        if (promo == null || promo == "") {
                  return;
                }
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
