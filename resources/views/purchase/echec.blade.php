<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>We heave a problem</title>
    <link href="{{ asset('css/purchase/echec.css') }}" rel="stylesheet">
  </head>
  <body>
    <div id="container">
      <div id="error-box">
        <div class="dot"></div>
        <div class="dot two"></div>
        <div class="face2">
          <div class="eye"></div>
          <div class="eye right"></div>
          <div class="mouth sad"></div>
        </div>
        <div class="shadow move"></div>
        <div class="message">
          <h1 class="alert">Something went wrooooong with your payment!</h1>
          <p><b>Please try again later</b> </p>
        </div>
        <div class="row">
          <div class="col">
            <a href="{{ route('home') }}">
              <button class="button-box1">
                <h1 class="red">Home</h1>
              </button>
            </a>
          </div>

          <div class="col">
            <a href="{{ route('cart.index') }}">
              <button class="button-box2">
                <h1 class="red">Check Your cart</h1>
              </button>
            </a>
          </div>
        </div>

      </div>
    </div>

  </body>
</html>
