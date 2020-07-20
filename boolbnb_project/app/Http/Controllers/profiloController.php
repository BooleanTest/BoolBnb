<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

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

      return view('profilo', compact('user', 'messagge'));
    }

    // modifica appartamento
    public function edit($id){
        $services = Service::all();
        $apartments = Apartment::findOrFail($id);

        return view('edit-apartment', compact('apartments', 'services'));
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
      // $apartments -> view = 1;

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

      // dd($filePath);

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

      return view('stats_apartment', compact('apartments'));

    }

    //messaggi
    public function view($id){

      $apartments = Apartment::all();
      // SELECT user_id, mail, text FROM apartments join messages ON messages.apartment_id = apartments.id JOIN users ON users.id = apartments.user_id WHERE user_id = 5


      $messages = Apartment::selectRaw('user_id, mail, text')
                  ->join('messages', 'messages.apartment_id', '=', 'apartments.id')
                  ->join('users', 'users.id', '=', 'apartments.user_id')
                  ->where('user_id', $id) -> get();

      return view('view-messagges', compact('messages'));
    }



    // inizio prove statistiche----------------------------------------
    public function statistics($id){

      // $user = Auth::user();

      $apartment = Apartment::findOrFail($id);

      $views = View::all() -> where('apartment_id', $id);
      $messages = Message::all() -> where('apartment_id', $id);

      $count_messages = count($apartment -> messages);
      $count_views = count($apartment -> views);
      // dd($count_messages,$count_views);

      foreach ($views as $view) {
        $views_created = $view -> created_at;
        $month_views[] = date( "F",  strtotime( $views_created) );
      }
      // dd($month_views);

      $prev = 0;
      sort($month_views);
      for ($i = 0; $i < count($month_views); $i++ ) {
        if ( $month_views[$i] !== $prev ) {
          $monthsOrdered_v[] = $month_views[$i];
          $viewsFrequency[] = 1;
        } else {
          $viewsFrequency[count($viewsFrequency) - 1]++;
        }
        $prev = $month_views[$i];
      }

      foreach ($messages as $message) {
        $messages_created = $message -> created_at;
        $month_messages[] = date( "F",  strtotime($messages_created) );
      }
      dd($month_messages);

      $prev = 0;
      sort($month_messages);
      for ($i = 0; $i < count($month_messages); $i++ ) {
        if ( $month_messages[$i] !== $prev ) {
          $monthsOrdered_m[] = $month_messages[$i];
          $messagesFrequency[] = 1;
        } else {
          $messagesFrequency[count($messagesFrequency) - 1]++;
        }
        $prev = $month_messages[$i];
      }


      return view('statistics', compact('month_messages', 'count_messages', 'month_views', 'count_views'));

      // ..................fine prove conteggio statistiche
    }



}
