<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;


use App\User;
use App\Apartment;
use App\Service;
use App\Message;

class apartmentController extends Controller
{
  public function index(){
    $apartments = Apartment::all();

    return view('welcome', compact('apartments'));
  }


  public function welcome(){
    $apartments = Apartment::all();

    return view('welcome', compact('apartments'));
  }

  public function show($id){
      $apartments = Apartment::findOrFail($id);


      return view('show-apartment', compact('apartments'));
  }

  //rotta per salvare i messaggio
  public function messagges(Request $request, $id){

    $validateData = $request -> validate([
      'mail' => 'required',
      'text' => 'required'

    ]);

    $messagge = new Message;

    $messagge -> mail = $validateData['mail'];
    $messagge -> text = $validateData['text'];
    $messagge -> apartment_id = $id;

    $messagge -> save();

    // redirect

  }


}
