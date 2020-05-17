var myboard;
const client = 'O';
const oussafa = 'X';
const winCombos = [
    [0, 1, 2],
    [3, 4, 5],
    [6, 7, 8],
    [0, 3, 6],
    [1, 4, 7],
    [2, 5, 8],
    [0, 4, 8],
    [6, 4, 2]
];

const cells = $('.space');

function newgame() {
 myboard = Array.from(Array(9).keys())
 cells.each(function(){
 $(this).text('');
 $(this).on('click',clientplay);
});
}


function clientplay () {
    play($(this).attr('id'), client);
    if (checkPossibilities()) play(bestMove(), oussafa);
}


function play(id, player) {
  var cell = $('#'+id);
  if($(cell).text() != '' || typeof myboard[id] != 'number'){
    alert('you cant do this')
    $(cell).off('click')
  }
  else {
    myboard[id] = player;
    cell.text(player);
    // let gameWon = checkWin(myboard, player)
    // if (gameWon) gameOver(gameWon)
    let end = checkWinner(player);
    if (end)  gameOver(end)
  }
  $(cell).off('click')
}

function checkWinner(player) {

    //check horizontal
    if ((myboard[0] == myboard[1] && myboard[1] == myboard[2]) && myboard[1] != undefined && myboard[2] != undefined && myboard[0] != undefined)
      return player;
    if ((myboard[3] == myboard[4] && myboard[4] == myboard[5]) && myboard[3] != undefined && myboard[4] != undefined && myboard[5] != undefined)
      return player;
    if ((myboard[7] == myboard[8] && myboard[7] == myboard[6]) && myboard[7] != undefined && myboard[8] != undefined && myboard[6] != undefined)
      return player;

    //check vertical
    if ((myboard[0] == myboard[3] && myboard[3] == myboard[6]) && myboard[0] != undefined && myboard[3] != undefined && myboard[6] != undefined)
      return player;
    if ((myboard[1] == myboard[4] && myboard[4] == myboard[7]) && myboard[1] != undefined && myboard[4] != undefined && myboard[7] != undefined)
      return player;
    if ((myboard[2] == myboard[5] && myboard[5] == myboard[8]) && myboard[2] != undefined && myboard[5] != undefined && myboard[8] != undefined)
      return player;


    //check diagonal
    if (((myboard[0] == myboard[4] && myboard[4] == myboard[8]) || (myboard[2] == myboard[4] && myboard[6] == myboard[2])) && myboard[4] != undefined)
      return player;
    // check end game
    if(!checkPossibilities())
      return 'noone';

    return null;
}

function checkWin(board, player) {
  let plays = board.reduce((a, e, i) =>
  (e === player) ? a.concat(i) : a, []);
  let gameWon = null;
  for (let [index, win] of winCombos.entries()) {
    if (win.every(elem => plays.indexOf(elem) > -1)) {
      gameWon = {player: player};
      break;
    }
    // if(!checkPossibilities()) gameWon='end';
}
// console.log(gameWon);
return gameWon;
}

function getPossibilities() {
  return myboard.filter(s => typeof s == 'number');
}

function checkPossibilities() {
  if (getPossibilities().length > 0)
    return true;
}

function gameOver(won){
  $(cells).off( "click")
    getdiscount(won);
}

function getdiscount(winner){
  $.ajax({
      url:`/game/winner`,
      method: 'post',
      data: { winner},
      headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
      success : function(data){
            swal({
                    title: data.title,
                    text: data.message,
                    icon: data.icon,
                    button: data.button,
                    closeOnClickOutside: false
                  }).then((value) => {
                    var url = "/home";
                    // url = url.replace(':slug', slug);

                    window.location.href=url;


                    });
             return;
      }
  })
}

function getPossibilities() {
    return myboard.filter(s => typeof s === 'number');
}


function bestMove() {
    return minmax(myboard, oussafa).index;
}


function checkTie() {
    if (getPossibilities().length === 0) {
        $(cells).off('click')
        alert("Tie Game!")
        return true;
    }
    return false;
}


function minmax(newBoard, player) {
    var availSpots = getPossibilities(newBoard);

    if(checkWin(newBoard, player)) {
        return {score: -10};
    } else if (checkWin(newBoard, oussafa)) {
        return {score: 10}
    } else if (availSpots.length === 0) {
        return {score: 0}
    }
    var moves = [];
    for (var i = 0; i < availSpots.length; i++) {
        var move = {};
        move.index = newBoard[availSpots[i]];
        newBoard[availSpots[i]] = player;

        if (player === oussafa) {
            var result = minmax(newBoard, client);
            move.score = result.score;
        } else {
            var result = minmax(newBoard, oussafa);
            move.score = result.score;
        }

        newBoard[availSpots[i]] = move.index;

        moves.push(move);
        }

        var bestMove;
        if(player === oussafa) {
            var bestScore = -123456789;
            for (var i = 0; i < moves.length; i++) {
                if (moves[i].score > bestScore) {
                    bestScore = moves[i].score;
                    bestMove = i;
                }
            }
        } else {
            var bestScore = 123456789;
            for(var i = 0; i < moves.length; i++) {
                if (moves[i].score < bestScore) {
                    bestScore = moves[i].score;
                    bestMove = i;
                }
            }
        }
        return moves[bestMove];
    }

$('#start').on('click',function(){

  $('.grid').css('display','grid');
  $(this).css('display','none');
  $('.text').css('display','none');
  $.ajax({
      url:`/game/newgame`,
      method: 'post',
      headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
      success : function(data){
        if(data.error)
        {
          swal({
                  title: data.error,
                  icon: 'error',
                  closeOnClickOutside: false
                }).then((value) => {
                  var url = "/home";
                  // url = url.replace(':slug', slug);

                  window.location.href=url;


                  });
           return;
        }
        newgame();
      }
  })
})
