<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tic Tac Toe</title>
    <link rel="stylesheet" href="style.css">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <script defer src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <style media="screen">
      body {
              background: #3A1C71;
              background: -webkit-linear-gradient(to left, #FFAF7B, #D76D77, #3A1C71);
              background: linear-gradient(to left, #FFAF7B, #D76D77, #3A1C71);
            }

            .grid {
              background-color: rgba(0,0,0,.2);
              margin: 50px auto;
              vertical-align: center;
              width: 400px;
              height: 400px;
              /* display: grid; */
              grid-template-columns: 1fr 1fr 1fr;
              grid-template rows: 1fr 1fr 1fr;
              grid-gap: 2px;
              border-radius: 4px;
              box-shadow: rgba(0, 0, 0, 0.3) 0px 17px 50px;
              display: none;
            }

            .space {
              background-color: white;
              transition: background-color .5s;
              display: flex;
              justify-content: center;
              align-items: center;
            }

            .space:hover {
              background-color: rgba(0,0,0,0);
              transition: background-color .5s;
              cursor: pointer;
            }

            .x, .o {
             font-family: 'arial';
             font-size: 70px;
             position: absolute;
            }

            .x {
              color: tomato;
            }

            .o {
              color: #33DBFF;
            }

            .header {
              font-family: 'IBM Plex Sans Condensed', sans-serif;
              font-family: 'Montserrat', sans-serif;
              font-size: 35px;
              color: tomato;
              text-align: center;
              margin-top: 50px;
            }

            .reset {
              font-size: 20px;
              font-family: 'IBM Plex Sans Condensed', sans-serif;
              font-family: 'Montserrat', sans-serif;
              color: tomato;
              background-color: white;
              border: 1px solid tomato;
              padding: 5px;
              transition: border, color, .5s;
            }

            .reset:hover {
              cursor: pointer;
              color: #33DBFF;
              border: 1px solid #33DBFF;
              transition: border, color, .5s;
            }

            .reset:focus {
              outline: none;
            }

            .wrapper {
              display: flex;
              justify-content: center;
              margin-bottom: 50px;
            }

            .p1, .p2 {
              font-family: 'IBM Plex Sans Condensed', sans-serif;
              font-family: 'Montserrat', sans-serif;
              font-size: 20px;
            }

            .p1 {
              color: tomato;
              margin-left: 20px;
            }

            .p2 {
              color: #33DBFF;
              margin-right: 20px;
            }

            .flex {
              display: flex;
              flex-direction: row;
              justify-content: space-between;
            }
            button{
              background-color: rgba(0,0,0,.2);
              margin: 50px auto;
              vertical-align: center;
              width: 150px;
              height: 55px;
              display: grid;
              grid-template-columns: 1fr 1fr 1fr;
              grid-template rows: 1fr 1fr 1fr;
              grid-gap: 2px;
              border-radius: 4px;
              box-shadow: rgba(0, 0, 0, 0.3) 0px 17px 50px;
              text-align:center;
            }
            .text{
              text-align:center;
              position: center;
              grid-template-columns: 1fr 1fr 1fr;
              grid-template rows: 1fr 1fr 1fr;
              width: 700px;
            }
            .game--title{
              text-align:center;
              position: center;
            }
    </style>
</head>
<body>
    <section>
        <h1 class="game--title">Tic Tac Toe</h1>
        <div class='grid'>
          <div class='space' id='0'></div>
          <div class='space' id='1'></div>
          <div class='space' id='2'></div>
          <div class='space' id='3'></div>
          <div class='space' id='4'></div>
          <div class='space' id='5'></div>
          <div class='space' id='6'></div>
          <div class='space' id='7'></div>
          <div class='space' id='8'></div>
        </div>
        <div class="text">
          Once you click the button you will only have one chance so be samrt,Good luck
        </div>
        <button type="button" id='start'>Let's start</button>
    </section>
<script src="js/tictactoe.js"></script>
</body>
</html>
