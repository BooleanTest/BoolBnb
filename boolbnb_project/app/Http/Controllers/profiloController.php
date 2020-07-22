<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

// use Illuminate\Support\Facades\DB;

use Str;
use Auth;
use App\User;
use App\Apartment;
use App\Service;
use App\Message;
use App\View;

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
      $messagge = Message::all();

      $users = Auth::user();
      if ($user -> id === $users -> id) {
        return view('profilo', compact('user', 'messagge'));
      } else {
        return view("not_found");
      }
    }

    // modifica appartamento
    public function edit($id){
        $services = Service::all();
        $apartments = Apartment::findOrFail($id);

        $user = Auth::user();
        if ($apartments -> user_id === $user -> id) {
          return view('edit-apartment', compact('apartments', 'services'));
        } else {
          return view("not_found");
        }
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
        "image" => "required",
        'services' => 'nullable',
        'latitude' => 'required',
        'longitude' => 'required'
      ]);

      $image = $request->file('image');
      $folder = '/uploads/images/';
      $name = Str::slug($request -> input('title')). '_' .time();
      $format = $image->getClientOriginalExtension();
      $filePath = $folder . $name . '.' . $format;

      $apartments = Apartment::findOrFail($id);

      $apartments -> title  = $validateData["title"];
      $apartments -> rooms  = $validateData["rooms"];
      $apartments -> bathrooms  = $validateData["bathrooms"];
      $apartments -> meters  = $validateData["meters"];
      $apartments -> address  = $validateData["address"];
      $apartments -> number  = $validateData["number"];
      $apartments -> latitude  = $validateData["latitude"];
      $apartments -> longitude  = $validateData["longitude"];
      $apartments -> image  = $filePath;
      $apartments -> city  = $validateData["city"];
      $apartments -> nation  = $validateData["nation"];

      $image -> storeAs($folder , $name . '.' . $format , 'public');

      $apartments -> save();

      if (isset($validateData['services'])) {
        $apartments -> services() -> sync($validateData['services']);
      }
      // Apartment::whereId($id) -> update($validateData);

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
        'services' => 'nullable',
        'latitude' => 'required',
        'longitude' => 'required'
      ]);

      $image = $request->file('image');
      $folder = '/uploads/images/';
      $name = Str::slug($request -> input('title')). '_' .time();
      $format = $image->getClientOriginalExtension();
      $filePath = $folder . $name . '.' . $format;

      $apartments = new Apartment;

      $apartments -> title  = $validateData["title"];
      $apartments -> rooms  = $validateData["rooms"];
      $apartments -> bathrooms  = $validateData["bathrooms"];
      $apartments -> meters  = $validateData["meters"];
      $apartments -> address  = $validateData["address"];
      $apartments -> number  = $validateData["number"];
      $apartments -> latitude  =  $request["latitude"];  //$validateData["latitude"];
      $apartments -> longitude  = $request["longitude"]; //$validateData["longitude"];
      $apartments -> image  = $filePath;
      $apartments -> city  = $validateData["city"];
      $apartments -> nation  = $validateData["nation"];
      $apartments -> view = 1;
      $apartments -> user_id = $userId;
      $image -> storeAs($folder , $name . '.' . $format , 'public');
      $apartments -> visibility = 1;

      $apartments -> save();

      if (isset($validateData['services'])) {
        $apartments -> services() -> attach($validateData['services']);
      }

      return redirect() -> route("profilo", $userId)
                        -> withSuccess("Appartamento " . $apartments["title"] . " correttamente aggiunto");

    }

    //rotta per statistiche appartamento
    public function stats($id){

      $apartments = Apartment::findOrFail($id);

      $total_view_20 = View::selectRaw('COUNT("apartment_id") as tot_view')
                    ->where('apartment_id', $id)
                    ->where('created_at', 'like', '%2020%')
                    -> get();

      $total_view_19 = View::selectRaw('COUNT("apartment_id") as tot_view')
                    ->where('apartment_id', $id)
                    ->where('created_at', 'like', '%2019%')
                    -> get();

      $visual_mesi = [];
      $visual_messaggi = [];

      for ($i=1; $i <= 12; $i++) {
        $months_view = View::selectRaw('COUNT("apartment_id") as mese')
                      ->where('created_at', 'like', '%2020-0' . $i . '%')
                      ->where('apartment_id', $id)
                      -> get();

        array_push($visual_mesi, $months_view -> toarray()[0]['mese']);

      }

      // SELECT COUNT(apartment_id) FROM messages WHERE apartment_id = 1

      $total_messages_2020 = Message::selectRaw('COUNT("apartment_id") as tot_messages')
                        ->where('apartment_id', $id)
                        ->where('created_at', 'like', '%2020%')
                        -> get();

      $total_messages_2019 = Message::selectRaw('COUNT("apartment_id") as tot_messages')
                        ->where('apartment_id', $id)
                        ->where('created_at', 'like', '%2019%')
                        -> get();

      for ($i=1; $i <= 12; $i++) {
        $message_view = Message::selectRaw('COUNT("apartment_id") as messaggi')
                      ->where('created_at', 'like', '%2020-0' . $i . '%')
                      ->where('apartment_id', $id)
                      -> get();

        array_push($visual_messaggi, $message_view -> toarray()[0]['messaggi']);

      }

      $user = Auth::user();
      if ($apartments -> user_id === $user -> id) {
        return view('stats_apartment', compact('total_view_20', 'total_view_19', 'total_messages_2020', 'total_messages_2019', 'visual_mesi', 'visual_messaggi', 'apartments'));
      } else {
        return view("not_found");
      }
    }

    //messaggi
    public function view($id){

      $apartments = Apartment::all();

      $messages = Apartment::selectRaw('user_id, mail, text, apartments.title as title, users.id as utente_id, apartments.id as apartment_id')
                  ->join('messages', 'messages.apartment_id', '=', 'apartments.id')
                  ->join('users', 'users.id', '=', 'apartments.user_id')
                  ->where('user_id', $id) -> get();


      $user = Auth::user();

      if ($id == $user -> id) {
        return view('view-messagges', compact('messages'));
      } else {
        return view("not_found");
      }


    }

    //visibility
    public function visibility($id){

      $user_id = Auth::user();
      $apartments = Apartment::findOrFail($id);
      $user = User::findOrFail($user_id -> id);
      $messagge = Message::all();

      if($apartments -> visibility){
        $apartments -> visibility = 0;
        $apartments -> save();
        return view('profilo', compact('user', 'messagge'));
      } else {
        $apartments -> visibility = 1;
        $apartments -> save();
        return view('profilo', compact('user', 'messagge'));
      }

    }

}
