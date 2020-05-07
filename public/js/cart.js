$('.plus').each(function(){
  $(this).on('click',function(){
        const elem = $(this).prev();
        // const elem_id = elem["id"];
        let quantity = elem.data('quantity');
        const id = elem.data('id');
        if(elem["value"] == parseInt(elem["max"]))
            alert("No more product like this!!");
        else{
          change_quantity(elem, id, quantity,'p');
        }
      })
    })

$('.minus').each(function(){
      $(this).on('click',function(){
        const elem = $(this).next();
        // const elem_id = elem["id"];
        let quantity = elem.data('quantity');
        const id = elem.data('id');

        // if( quantity == 1 )
        // {
        //   var choice = confirm("Are you sure you want to remove the product ?");
        //   if( choice == true )
        //   {
        //
        //       // var url = '{{ route("cart.removeProduct", ":slug") }}';
        //       //
        //       // url = url.replace(':slug', $("#"+elem_id).data('product'));
        //       //
        //       // document.location.href=url;
        //       alert('f')
        //   }
        // }
        // else{
          change_quantity(elem, id, quantity,'m');
        // }
      })
})
function change_quantity(elem, id, quantity,c) {
    $.ajax({
        url:`/cart/change`,
        method: 'post',
        data: { quantity,id,c },
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        success : function(data){

               if (data.error) {
                 swal({
                        title: data.error,
                        icon: "error",
                      });
                   return;
               }

               $(elem).data('quantity', data.quantity);
               elem.val(data.quantity);
               $('.total').next().text("$"+data.total_price);
               $("#cart").text(data.total_product);
               $('#discount').text('$'+data.discount)
        }
    })
}


$("#button-addon3").on('click',function(){
    let discount = $('#coupon').val()
    $.ajax({
      url:`/cart/discount`,
      method: 'post',
      data: { discount },
      headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
      success : function(data){
        if (data.error) {
          swal({
                 title: data.error,
                 icon: "error",
               });
            return;
        }
        $('.total').next().text("$"+data.total_price);
        var li = $("<li></li>");
        li.attr("class","d-flex justify-content-between py-3 border-bottom");
        // var licl = document.createAttribute("class");
        // licl.value = "d-flex justify-content-between py-3 border-bottom";
        // li.setAttributeNode(licl);
        var strong1 = $("<strong></strong>");
        strong1.attr("class","text-muted")
        // var stcl = document.createAttribute("class");
        // stcl.value = "text-muted";
        // strong1.setAttributeNode(stcl);
        // var coupon = document.createTextNode("discount "+data.coupon+" %");
        strong1.text("discount "+data.coupon+" %")
        // var discount = document.createTextNode(data.discount);
        var strong2 = $("<strong></strong>");
        strong2.attr("id","discount");
        strong2.text("$"+data.discount)
        li.append(strong1);
        li.append(strong2);
        $("#li-check").children('li').last().before(li);
        swal({
               title: "you have now a discount of "+data.coupon+"%",
               icon: "success",
             });
           }
         })
});
