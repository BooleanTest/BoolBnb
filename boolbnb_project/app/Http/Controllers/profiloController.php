<?php

namespace App\Http\Controllers;


use Auth;
use App\User;
use App\Apartment;
use App\Service;

use Illuminate\Http\Request;

class profiloController extends Controller
{
    // autentificazione
    public function __construct()
      {
        $this->middleware('auth');
      }

    // show profilo utente
    public function profilo($id){

      $user = User::findOrFail($id);

      return view('profilo', compact('user'));
    }

    // modifica appartamento
    public function edit($id){
        $apartments = Apartment::findOrFail($id);

        return view('edit-apartment', compact('apartments'));
    }

    // per modifica appartamento
    public function update(Request $request, $id){

      $validateData = $request -> validate([
        "title" => "required",
        "rooms" => "required|integer|min:0",
        "bathrooms" => "required|integer|min:0",
        "meters" => "required|integer|min:0",
        "address" => "required",
        "number" => "required",
        'city' => 'required',
        'nation' => 'required',
        "image" => "required"
        // 'latitude' => 'required',
        // 'longitude' => 'required'
      ]);

      Apartment::whereId($id) -> update($validateData);

      return redirect() -> route("show-apartment", $id)
                        -> withSuccess("Appartamento " . $validateData["title"] . " correttamente aggiornato");
    }

    //per eliminazione
    public function delete($id){
      $apartment = Apartment::findOrFail($id);
      $apartment -> delete();
      return redirect() -> route("home")
                        -> withSuccess("Appartamento " . $apartment["title"] . " correttamente eliminato");
    }

    // nuovo appartamento (create)
    public function create(){

      $services = Service::all();
      $apartments = Apartment::all();
      return view('create-apartment', compact("apartments", 'services'));
    }

    // per nuovo appartamento (store)
    public function store(Request $request){

      $userId = Auth::id();

      $validateData = $request -> validate([
        "title" => "required",
        "rooms" => "required|integer|min:0",
        "bathrooms" => "required|integer|min:0",
        "meters" => "required|integer|min:0",
        "address" => "required",
        "number" => "required",
        "image" => "required",
        "nation" => 'required',
        "city" => 'required',
        'services' => 'nullable'
        // 'latitude' => 'required',
        // 'longitude' => 'required'
      ]);

      // dd($validateData);

      // TODO: sistemare con TomTom latitudine e longitudine

      $apartments = new Apartment;

      $apartments -> title  = $validateData["title"];
      $apartments -> rooms  = $validateData["rooms"];
      $apartments -> bathrooms  = $validateData["bathrooms"];
      $apartments -> meters  = $validateData["meters"];
      $apartments -> address  = $validateData["address"];
      $apartments -> number  = $validateData["number"];
      $apartments -> latitude  = '111.11111';
      $apartments -> longitude  = '111.11111';
      $apartments -> image  = $validateData["image"];
      $apartments -> city  = $validateData["city"];
      $apartments -> nation  = $validateData["nation"];
      $apartments -> user_id = $userId;


      $apartments -> save();


      $apartments -> services() -> attach($validateData['services']);

      return redirect() -> route("home")
                        -> withSuccess("Appartamento " . $apartments["title"] . " correttamente aggiunto");
    }

    //rotta per statistiche appartamento
    public function stats($id){
      $apartments = Apartment::findOrFail($id);

      return view('stats_apartment', compact('apartments'));

    }

}
