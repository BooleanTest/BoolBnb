<?php

namespace App\Http\Controllers;

use App\Apartment;
use App\User;
use Illuminate\Http\Request;

class apartmentController extends Controller
{
  public function index(){
    $apartments = Apartment::all();

    return view('index', compact('apartments'));
  }

  public function show($id){
      $apartments = Apartment::findOrFail($id);


      return view('show-apartment', compact('apartments'));
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
      "rooms" => "required",
      "bathrooms" => "required",
      "meters" => "required",
      "address" => "required",
      "number" => "required",
      "latitude" => "required",
      "longitude" => "required",
      "image" => "required"
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

  // nuovo appartamento
  public function create(){
    $apartments = Apartment::all();
    return view('create-apartment', compact("apartments"));
  }

  // per nuovo appartamento
  public function store(Request $request){
    $validateData = $request -> validate([
      "title" => "required",
      "rooms" => "required",
      "bathrooms" => "required",
      "meters" => "required",
      "address" => "required",
      "number" => "required",
      "latitude" => "required",
      "longitude" => "required",
      "image" => "required"
    ]);

    $apartments = new Apartment;

    $apartments -> title  = $validateData["title"];
    $apartments -> rooms  = $validateData["rooms"];
    $apartments -> bathrooms  = $validateData["bathrooms"];
    $apartments -> meters  = $validateData["meters"];
    $apartments -> address  = $validateData["address"];
    $apartments -> number  = $validateData["number"];
    $apartments -> latitude  = $validateData["latitude"];
    $apartments -> longitude  = $validateData["longitude"];
    $apartments -> image  = $validateData["image"];

    $apartments -> save();

    return redirect() -> route("home")
                      -> withSuccess("Appartamento " . $apartment["title"] . " correttamente aggiunto");
  }
}
