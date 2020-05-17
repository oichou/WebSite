$('#cc').on('dblclick',function(){
  let see  = $('*[id="see"]');
  let hide = $('*[id="hide"]');
  $(hide).css({"-moz-transform": "rotateY(0deg)", "-webkit-transform": "rotateY(0deg)"});
  $(see).css({"-moz-transform": "rotateY(180deg)", "-webkit-transform": "rotateY(180deg)"});
  $('#change').text('Double click to enter '+$(see).data('part'))
  $(hide).attr('id','see')
  $(see).attr('id','hide')
})

//
$('.card-number').on("keypress", function(e) {
  if (e.charCode < "0".charCodeAt(0) || e.charCode > "9".charCodeAt(0))
    e.preventDefault();
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
$('#card_number').on('blur',function(){
  if(!Stripe.card.validateCardNumber($(this).val()))
    $('#stripe-errors').text('invalide card number');
})


$('#card_number').on('focus',function(){
    $('#stripe-errors').text('');
})

//
$('#expire').on("keypress", function(e) {
  if (e.charCode < "0".charCodeAt(0) || e.charCode > "9".charCodeAt(0))
    e.preventDefault();
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
$('#expire').on('focus',function(){
    $('#stripe-errors').text('');
})
$('#expire').on('blur',function(){
  const m = parseInt($(this).val()[0]+$(this).val()[1]);
  const y = parseInt($(this).val()[3]+$(this).val()[4]);
  if(!Stripe.card.validateExpiry(m,y))
    $('#stripe-errors').text('invalide Expiry date');
})
//
$('#ccv').on("keypress", function(e) {
  if (e.charCode < "0".charCodeAt(0) || e.charCode > "9".charCodeAt(0))
    e.preventDefault();
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
$('#ccv').on('focus',function(){
    $('#stripe-errors').text('');
})
$('#ccv').on('blur',function(){
  if(!Stripe.card.validateCVC($(this).val()))
    $('#stripe-errors').text('invalide CVC');
})
//




$('.method').each(function(){
  $(this).on('click',function(){
    const method = $(this).data('payement')
      $('#purchase').attr('value',method)
      if(method == 'cc')
        $('#cc input').attr('required','');
      else if(method == 'paypal')
        $('#cc input').removeAttr('required');
  });
});

// $('#btnval').on('click',)
// Stripe
// var stripe = Stripe('votre_cle_publique');
// var elements = stripe.elements();
// var card = elements.create('card', {
//         style: {
//             base: {
//                 iconColor: '#666EE8',
//                 color: '#31325F',
//                 lineHeight: '40px',
//                 fontWeight: 300,
//                 fontFamily: 'Helvetica Neue',
//                 fontSize: '15px',
//
//                 '::placeholder': {
//                     color: '#CFD7E0',
//                 },
//             },
//         }
//     });
// card.mount('#card-element');
// function setOutcome(result) {
//         var errorElement = document.querySelector('.error');
//         errorElement.classList.remove('visible');
//
//         if (result.token) {
//             $('#stripeToken').val(result.token.id);
//             $('#formPayment').submit();
//         } else if (result.error) {
//             errorElement.textContent = result.error.message;
//             errorElement.classList.add('visible');
//         }
//     }
// card.on('change', function(event) {
//         setOutcome(event);
//     });
// document.getElementById('formPayment').addEventListener('submit', function(e) {
//     e.preventDefault();
//
//     var form = document.getElementById('formPayment');
//     stripe.createPaymentMethod('card', card, {
//       billing_details: {name: form.querySelector('input[name=holder]').value}
//     }).then(function(result) {
//       if (result.error) {
//         var errorElement = document.querySelector('.error');
//         errorElement.textContent = result.error.message;
//         errorElement.classList.add('visible');
//       } else {
//           $('#buttonPayment').hide();
//           $('#spanWaitPayement').show();
//           // Otherwise send paymentMethod.id to your server (see Step 2)
//           fetch('/api/paiement', {
//               method: 'POST',
//               headers: {
//                   'Content-Type': 'application/json',
//                   'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
//               },
//               body: JSON.stringify({ payment_method_id: result.paymentMethod.id })
//           }).then(function(result) {
//                 result.json().then(function(json) {
//                     handleServerResponse(json);
//                 })
//               });
//         }
//     });
// });
//
// function handleServerResponse(response) {
//         if (response.error) {
//             $('#buttonPayment').show();
//             $('#spanWaitPayement').hide();
//             var errorElement = document.querySelector('.error');
//             errorElement.textContent = result.error.message;
//             errorElement.classList.add('visible');
//         } else if (response.requires_action) {
//             // Use Stripe.js to handle required card action
//             stripe.handleCardAction(
//                 response.payment_intent_client_secret
//             ).then(function(result) {
//                 if (result.error) {
//                     $('#buttonPayment').show();
//                     $('#spanWaitPayement').hide();
//                     var errorElement = document.querySelector('.error');
//                     errorElement.textContent = result.error.message;
//                     errorElement.classList.add('visible');
//                 } else {
//                     // The card action has been handled
//                     // The PaymentIntent can be confirmed again on the server
//                     fetch('/api/paiement', {
//                         method: 'POST',
//                         headers: {
//                             'Content-Type': 'application/json',
//                             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
//                         },
//                         body: JSON.stringify({ payment_intent_id: result.paymentIntent.id })
//                     }).then(function(confirmResult) {
//                         return confirmResult.json();
//                     }).then(handleServerResponse);
//                 }
//             });
//         } else {
//             window.location.replace('/paiement-ok');
//         }
//     }




// $(document).ready(function(){
  // var stripe = Stripe('pk_test_I0nrh7mc7F42ikMqu88Ff3za00etVYg0BT');
  Stripe.setPublishableKey('pk_test_VarfriwlmLQEyxOGTmiJCL8E00fFFbOPpz');
  // var elements = stripe.elements();

  $('#purchase').on('click',function(e){
    e.preventDefault();

    // var submitbutton = $('#purchase');
    $('#purchase').css('display','none');
    $('#load').css('display','block');

    if($('#purchase').val()=='paypal'){
      $('#formPayment').append($('<input type="hidden" name="method" />').val('paypal'))
      $('#formPayment')[0].submit().att('name','jjj')
    }

    else {

      Stripe.card.createToken({
        number: $('#card_number').val(),
        exp_month: parseInt($('#expire').val()[0]+$('#expire').val()[1]),
        exp_year: parseInt($('#expire').val()[3]+$('#expire').val()[4]),
        cvc: $('#ccv').val(),
        name: $('#holer').val(),
      },stripeResponseHandler);
    }
  // });
});
  function stripeResponseHandler(status, response) {

    // Grab the form:
    var form = $('#formPayment');

    if (response.error) { // Problem!

      // Show the errors on the form
      // console.log(response.error.param+' is invalide please check it before submit');
      if(response.error.code == 'parameter_missing')
        swal({
               title: 'Expiry date is missing !',
               icon: "error",
             });
      else
        swal({
               title: response.error.message,
               icon: "error",
             });
      // $('.stripe-errors').text(response.error.message).show();
      // $('#formPayment button').attr('disabled',false).text('buy');
      // $('#purchase').attr('disabled',false);
      $('#purchase').css('display','block');
      $('#load').css('display','none');

      } else {

       // Token was created!
      console.log(response);

      // Insert the token ID into the form so it gets submitted to the server:
      form.append($('<input type="hidden" name="stripeToken" />').val(response.id));
      form.append($('<input type="hidden" name="method" />').val('cc'))
      // form.append($('<input type="hidden" name="stripeToken" />').val(token));
      // Add Stripe Token to hidden input
      // var hiddenInput = document.createElement('input');
      // hiddenInput.setAttribute('type', 'hidden');
      // hiddenInput.setAttribute('name', 'stripeToken');
      // hiddenInput.setAttribute('value', response.id);
      // form.append(hiddenInput);

      // Submit the form:
      form[0].submit()

    }
  }
