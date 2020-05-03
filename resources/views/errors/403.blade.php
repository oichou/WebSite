<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <style media="screen">
    body {
      width: 99%;
      height: 98vh;
      display: flex;
      align-items: center;
      justify-content: center;
      flex-direction: column;
      family: $font;
      background-image: linear-gradient(45deg, #f6d200 25%, #181617 25%, #181617 50%, #f6d200 50%, #f6d200 75%, #181617 75%, #181617 100%);
    }
    h1 {
    	text-transform: uppercase;
    	background: repeating-linear-gradient(
      45deg,
      #f6d200 ,
      #f6d200  10px,
      #181617  10px,
      #181617  20px
    );
    -webkit-background-clip: text;
	  -webkit-text-fill-color: transparent;
	/*animation: move 5s ease infinite;*/
	font-size: 500px;
	margin: 0;
	line-height: .7;
	position: relative;
	/* &:before, */
}
	.petite {
			background-color: #f6d200;
			color: #181617;
			border-radius: 10px;
			font-size: 40px;
			position: absolute;
			padding: 31px;
			text-transform: uppercase;
			font-weight: bold;
			-webkit-text-fill-color: #181617;
			left: 50%;
			top: 50%;
			transform: translate(-50%, -50%) rotate(0deg);
      box-shadow: 0px 0px 10px #181617;
	}
  .g{
    height: 10px;
    width: 15px;
    padding: 70px 130px;
    /* padding: 31px; */
    border-radius: 10px;
    font-size: 60px;
    position: absolute;
    background: repeating-linear-gradient(45deg, #f6d200, #f6d200 10px, #181617 10px, #181617 20px);
    left: 50%;
    top: 50%;
    transform: translate(-50%, -50%) rotate(20deg);
    box-shadow: 0px 0px 10px #181617;
  }
    </style>
  </head>
  <body>
    <div class="">

    <h1 class="text">
      <span>403</span>
    </h1>
    <div class="g">
      <span class='petite'>Caution</span>
    </div>

  </div>
  </body>
</html>
