<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Game;
use App\Cart;

use Session;

class TictactoeController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $game     = Session::has('Game') ? Session::get('Game') : null;
    if($game){
      $try = $game->getTry();

      if($try >= 2 || $game->getWinner() != null )
        return redirect()->route('error',['whichone' => 'gameover' ]);

      $game->setTry($try++);
    }
    else {
      $game     = new Game($game);
      $game->setTry(1);
    }
    Session::put('Game',$game);
    return view('tictactoe');
  }

  public function newgame(){
    try {
      $game     = Session::has('Game') ? Session::get('Game') : null;
      if($game){
        $try = $game->getTry();

        if($try >= 2 || $game->getWinner() != null )
          return redirect()->route('home');

        $game->setTry($try++);
      }
      else {
        $game     = new Game($game);
      }
      Session::put('Game',$game);
      return redirect()->route('game.index');
    } catch (\Exception $e) {
      return [
        'error' => 'something went wrong sorry ! ',
      ];
    }

  }



  public function getdiscount(){
    $game     = Session::has('Game') ? Session::get('Game') : null;
    if($game){

    if($game->getTry() >= 2)
      return redirect()->route('home');
    else{
      $game->setWinner(request()->winner);
      Session::put('Game',$game);
      switch ($game->getWinner()) {
        case 'O':
            $cart     = Session::has('cart') ? Session::get('cart') : null;
            $cart = new Cart($cart);
            $code     = array_rand($cart->discounts);
            return [
              'title'   => "Congratulation",
              'message' => "Here is your coupon ".$code." for ".$cart->discounts[$code]."% off",
              'icon'    => "success",
              'succes'  => "thank you!",
            ];
          break;
        case 'X':
            return [
              'title'   => "Unfortunately",
              'message' => "Maybe next time you will win who knows,enjoy shopping",
              'icon'    => "error",
              'succes'  => "ouppss!",
            ];
          break;
        case 'noone':
        return [
          'title'   => "Because you've tried",
          'message' => "Here is your coupon n7bkrbk for 5 %off",
          'icon'    => "info",
          'button'  => "thank you!",
        ];
          break;

        default:
          return [
            'title'   => "Something went wrong ",
            'message' => "Please try later",
            'icon'    => "error",
            'button'  => "sorry",
          ];
          break;
      }
    }
  }
  }
}
