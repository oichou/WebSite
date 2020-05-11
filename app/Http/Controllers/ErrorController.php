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
        case '500':
          // code...
          break;
        case '403':
          // code...
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
