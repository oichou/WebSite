<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;
use App\Mail\contactus;
use App\Contact;

class contactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('contact');
    }

    public function send(Request $request)
    {
      $this->validate($request, [
          'name'       =>    'required',
          'email'      =>    'required|email',
          'message'    =>    'required'
      ]);

      $client = $request->input('email');
      $name = $request->input('name');
      $message = $request->input('message');

      $admins = DB::table('users')
                ->where('is_admin','=',true)
                ->select('email')
                ->get()
                ->toArray();

      $data = [
        'name'        =>    $name,
        'message'     =>    $message,
        'email'       =>    $client
      ];

      $contact = new Contact;

      $contact->name = $name;
      $contact->email = $client;
      $contact->message = $message;

      $contact->save();

      $result = array_map(function ($value) {
        return (array)$value;
      }, $admins);

      for ($i=0; $i <count($result) ; $i++) {
        \Mail::to($result[$i]['email'])
        ->send(new contactus($data));

      }

      // foreach ($admins as $admin) {
      // }
    //   foreach ($admins as $admin) {
    //   echo "Email has been sent to $admin";
    // }

      // );
    return back()->with('success', 'Thank you for contacting us, we will be treating your message very soon !');
    // $array = [];
    //
    // foreach ($admins as $key => $value) {
    //
    //   $array[$key][] = $value;
    // }

    // return $result[0]['email'];
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
