<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ErrorController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index($whichone) {

      switch ($whichone) {
        case '403':
          return view('errors/403');
          break;
        case '504':
          return view('errors/504');
          break;
        case 'outofstock':
          return view('errors/outofstock');
          break;
        case 'gameover':
          return view('errors/gameover');
          break;
        case '403':
          // code...
          break;

        default:
          // code...
          break;
      }
  }
}
