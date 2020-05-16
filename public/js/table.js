$('.promo').each(function(){
  $(this).on('click',function(){
    let elem = $(this)
    let price = $(elem).parents('td').prev()
    let percentage = $(elem).parents('td').next()
    let id = $(elem).data('id');
    var type = $(elem).data('type');
    changepromo(elem,id,price,percentage,type)
      })
    })
function changepromo(elem,id,price,percentage,type) {
  if(type === "true" || type == true) {
    //   swal({
    //     title: "Are you sure you want to remove promotion?",
    //     icon: "warning",
    //     buttons: true,
    //     dangerMode: true,
    //   })
    //   .then((change) => {
    //     console.log(change);
    //     if(!change) {
    //       console.log(!change);
    //       elem.prop('checked',true)
    //       return;
    //       console.log("1")
    //     };
    // });

    var remove = confirm("Are you sure you want to remove promotion");
    if(remove == false) {
      elem.prop('checked',true)
      return ;
    }
  }

  else if(type === "false" || type == false) {
    var promo = prompt("Please enter promo percentage : ", 10);
    if (promo == null || promo == "") {
        elem.prop('checked',false)
        return ;
      }
    }
    else {
      return;
    }

  $.ajax({
      url:`/product/discount`,
      method: 'post',
      data: { id,promo,type },
      headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
      success : function(data){

             if (data.error) {
                 $(elem).prop('checked',false);
                 swal({
                        title: data.error,
                        text: "Please try again",
                        icon: "error",
                        button: "Sorry!",
                      });
                 return;
             }

             $(elem).data('type', data.type);
             $(elem).attr('data-type',data.type)
             $(price).text("$".concat(data.new_price));
             $(percentage).text(data.promo.concat("%"));
      }
  })
}


$('.admin').each(function() {
    $(this).on('click',function() {
      let type = $(this).data('type');
      let elem = $(this);
      let id = $(this).data('id');
      chmod(elem,type,id);
    })
})

function chmod(elem,type,id) {
    swal({
      title: "Are you sure you want to change rights?",
      icon: "warning",
      buttons: true,
      dangerMode: true,
    })

// if(type === "true" || type == true)

    .then((change) => {
      console.log(change);
      if (change) {
        // console.log(code);
        swal({
            content: {
              element: "input",
              attributes: {
                placeholder: "Please enter verification code",
                type: "password",
              },
            },
          })
            .then((code) => {
              if(code){
                $.ajax({
                  url:`/admin/chmod`,
                  method: 'post',
                  data: { id,type,code },
                  headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                  success : function(data){

                         if (data.error) {
                             $(elem).prop('checked',type);
                             swal({
                                    title: data.error,
                                    text: "Maybe you don't have the right finally !",
                                    icon: "error",
                                    button: "Sorry!",
                                  });
                            return ;
                          }
                          console.log(data.type);
                           if(data.type === "true" || data.type == true)
                           swal({
                                  title: "Congratulation !!",
                                  text: "You have now a new admin in your team",
                                  icon: "success",
                                  button: "oh yes",
                                });
                            else
                            swal({
                                   title: "Unfortunately !!",
                                   text: "You have now less admin in your team",
                                   icon: "success",
                                   button: "oh oups",
                                 });
                           $(elem).data('type', data.type);
                         }
                   });
                 }
                 else {
                   $(elem).prop('checked',type);
                   return;
                 }
            })
          }
            else {
               $(elem).prop('checked',type);
               return;
            }
    });
  }
