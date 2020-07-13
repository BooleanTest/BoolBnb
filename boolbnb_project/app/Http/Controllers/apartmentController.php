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

  //rotta per salvare il messaggio
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
    return redirect()->route('show-apartment', [$id]) ->withSuccess("Messaggio correttamente inviato");

    // return back()->withInput()-> withSuccess("Messaggio correttamente inviato");



  }


  // rotta search
  public function search(Request $request){




    $lat = $request -> lat;
    $lng = $request -> long;
    $q = $request -> q;

    $apartments = Apartment::selectRaw('id, title, (
   3959 * acos (
     cos ( radians(' . $lat . ') )
     * cos( radians( latitude ) )
     * cos( radians( longitude ) - radians(' . $lng . ') )
     + sin ( radians(' . $lat . ') )
     * sin( radians( latitude ) )
   )
 ) AS distance')->orderBy('distance')->having('distance', '<', 100)->paginate(50);



    if(count($apartments) > 0){
      // return view('search-apartment')->withDetails('apartments')->withQuery ( $q );
      return view('search-apartment', compact('apartments'));




    } else {
      return view ('search-apartment')->withMessage('No Details found. Try to search again !');
    };

     // return view('search-apartment', compact('apartments'));
  }


}
