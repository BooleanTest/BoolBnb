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

    // dd($request);

    $services = Service::all();

    $bathrooms =$request -> bathrooms;
    $rooms = $request -> rooms;
    $srvcs = $request -> services;
    $distance = $request -> distance;
    $lat = $request -> lat;
    $lng = $request -> long;
    $q = $request -> q;


    // $new_services = [];

  //   foreach ($srvcs as $value) {
  //
  //     array_push($new_services, $value);
  //   }
  //
  //
  // dd($new_services);

    // dd($srvcs);
    // query ricerca bagni e stanze
    // SELECT * from apartments where rooms = 1 and bathrooms = 1

    // SELECT * FROM apartment_service JOIN apartments ON apartments.id = apartment_service.apartment_id where service_id in (1,2,3,4) and rooms > 3 and bathrooms > 1
    //
    // SELECT ( 3959 * acos( cos( radians(40.5) ) * cos( radians( latitude ) ) * cos( radians( longitude ) - radians(14.5) ) + sin( radians(40.5) ) * sin( radians( latitude ) ) ) ) AS distance, rooms, bathrooms, service_id, apartment_id
    // FROM apartments JOIN apartment_service on apartment_service.apartment_id = apartments.id WHERE rooms = 1 and bathrooms = 1 and service_id in (1,3)  HAVING distance < 10000 ORDER BY distance LIMIT 0 , 20


    //
    // $myArray = explode(',', $srvcs);
    //
    // dd($myArray);

    if(isset($lat) && isset($lng) && isset($distance)) {

      $apartments = Apartment::selectRaw('title, rooms, bathrooms, service_id, apartment_id, (
        3959 * acos (
        cos ( radians(' . $lat . ') )
        * cos( radians( latitude ) )
        * cos( radians( longitude ) - radians(' . $lng . ') )
        + sin ( radians(' . $lat . ') )
        * sin( radians( latitude ) )
        )
        ) AS distance')

        ->join('apartment_service', 'apartment_service.apartment_id', '=', 'apartments.id')
        ->where('rooms', $rooms)
        ->where('bathrooms', $bathrooms)
        ->whereIn('service_id', $srvcs )
        ->orderBy('distance')->having('distance', '<', $distance)->paginate(50);



      } else if (isset($lat) && isset($lng) && !isset($distance)){
        $apartments = Apartment::selectRaw('id AS apartment_id, title, (
          3959 * acos (
          cos ( radians(' . $lat . ') )
          * cos( radians( latitude ) )
          * cos( radians( longitude ) - radians(' . $lng . ') )
          + sin ( radians(' . $lat . ') )
          * sin( radians( latitude ) )
          )
          ) AS distance')->orderBy('distance')->having('distance', '<', 20)->paginate(50);
      }
      // else if(!isset($lat) || !isset($lng))
      // $apartments = Apartment::selectRaw('id AS apartment_id, title, rooms, bathrooms, service_id, apartment_id')
      //               ->join('apartment_service', 'apartment_service.apartment_id', '=', 'apartments.id')
      //               ->where('rooms', $rooms)
      //               ->where('bathrooms', $bathrooms)
      //               ->whereIn('service_id', $srvcs );

        else {
          $apartments = [];
        }



    if(count($apartments) > 0){

      return view('search-apartment', compact('apartments', 'services'));

    } else {

      return view ('search-apartment', compact('services'))->withMessage('No Details found. Try to search again !');

    };


  }


}
