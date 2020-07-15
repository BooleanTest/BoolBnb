<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

use App\User;
use App\Apartment;
use App\Service;
use App\Message;
use App\Payment;
use Braintree\Transaction;

class apartmentController extends Controller
{
  public function index(){
    $apartments = Apartment::all();

    $apartments_time = $apartments -> where('time', '<', time());
    $apartments_pay = $apartments -> where('time', '>=', time());

    return view('welcome', compact('apartments_time', 'apartments_pay'));
    // return view('welcome', compact('apartments'));
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

    $services = Service::all();

    $bathrooms = $request -> bathrooms;
    $rooms = $request -> rooms;
    $srvcs = $request -> services;
    $distance = $request -> distance;
    $lat = $request -> lat;
    $lng = $request -> long;
    $q = $request -> q;
    $appartamenti = [];


    if (!isset($srvcs)){
      $srvcs = [];
    }

    if ($q == null){
      return view ('search-apartment', compact('services'));

    } else {

      if(!isset($distance)){
        $apartments = Apartment::selectRaw('apartments.id AS apartment_id, title, city, image, rooms, bathrooms, (
            3959 * acos (
            cos ( radians(' . $lat . ') )
            * cos( radians( latitude ) )
            * cos( radians( longitude ) - radians(' . $lng . ') )
            + sin ( radians(' . $lat . ') )
            * sin( radians( latitude ) )
            )
            ) AS distance')
            ->orderBy('distance')
            ->having('distance', '<', 20)
            ->paginate(50);
      } else {
        $apartments = Apartment::selectRaw('apartments.id AS apartment_id, title, city, image, rooms, bathrooms, (
            3959 * acos (
            cos ( radians(' . $lat . ') )
            * cos( radians( latitude ) )
            * cos( radians( longitude ) - radians(' . $lng . ') )
            + sin ( radians(' . $lat . ') )
            * sin( radians( latitude ) )
            )
            ) AS distance')
            ->where('rooms', '>=', $rooms)
            ->where('bathrooms', '>=',  $bathrooms)
            ->orderBy('distance')
            ->having('distance', '<', $distance)
            ->paginate(50);
      }

      foreach ($apartments as $apartment) {

        $services_apartment = Apartment::selectRaw('name, apartments.id AS id_apartment, services.id AS service_id')
                      ->join('apartment_service', 'apartment_service.apartment_id', '=', 'apartments.id')
                      ->join('services', 'services.id', '=', 'apartment_service.service_id')
                      ->where('apartments.id', $apartment -> apartment_id)
                      ->get();

                      $thisService = $services_apartment -> toarray();
                      $thisApartment = $apartment -> toarray();
                      $apartmentService = [];
                      for ($i=0; $i < count($thisService) ; $i++) {

                        array_push($apartmentService, $thisService[$i]['name']);

                      }

        $result = array_intersect($apartmentService, $srvcs);

        if(!count($srvcs) == 0){

          if($result){
            $appartamenti[] = [

              'stats' => $thisApartment,
              'services' => $apartmentService

            ];
          }

        } else {
          $appartamenti[] = [

            'stats' => $thisApartment,
            'services' => $apartmentService

          ];
        }

      }


      if(count($appartamenti) > 0){

        return view('search-apartment', compact('apartments', 'services', 'appartamenti'));

      } else {

        return view ('search-apartment', compact('services'));

      }


    }


  }

}


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


// SELECT ( 3959 * acos( cos( radians(40.5) ) * cos( radians( latitude ) ) * cos( radians( longitude ) - radians(14.5) ) + sin( radians(40.5) ) * sin( radians( latitude ) ) ) ) AS distance, rooms, bathrooms, service_id, apartment_id FROM apartments JOIN apartment_service on apartment_service.apartment_id = apartments.id WHERE rooms = 1 and bathrooms = 1 and service_id in (1,3)  HAVING distance < 10000 ORDER BY distance LIMIT 0 , 20

    };
  }

//
// $myArray = explode(',', $srvcs);
//
// dd($myArray);

// if(isset($lat) && isset($lng) && isset($distance) && !count($srvcs) == 0) {
//
//   $apartments = Apartment::selectRaw('title, name AS service_name, image, rooms, bathrooms, city, service_id, name, apartment_id, (
//     3959 * acos (
//     cos ( radians(' . $lat . ') )
//     * cos( radians( latitude ) )
//     * cos( radians( longitude ) - radians(' . $lng . ') )
//     + sin ( radians(' . $lat . ') )
//     * sin( radians( latitude ) )
//     )
//     ) AS distance')
//
//     ->join('apartment_service', 'apartment_service.apartment_id', '=', 'apartments.id')
//     ->join('services', 'services.id', '=', 'apartment_service.service_id')
//     ->where('rooms', '>=', $rooms)
//     ->where('bathrooms', '>=',  $bathrooms)
//     ->whereIn('service_id', $srvcs )
//     ->orderBy('distance')
//     ->having('distance', '<', $distance)
//     ->paginate(50);
//
//
//
//   } else if (isset($lat) && isset($lng) && count($srvcs) == 0){
//     $apartments = Apartment::selectRaw('apartments.id AS apartment_id, name AS service_name, title, city, image, rooms, bathrooms, (
//       3959 * acos (
//       cos ( radians(' . $lat . ') )
//       * cos( radians( latitude ) )
//       * cos( radians( longitude ) - radians(' . $lng . ') )
//       + sin ( radians(' . $lat . ') )
//       * sin( radians( latitude ) )
//       )
//       ) AS distance')
//       ->join('apartment_service', 'apartment_service.apartment_id', '=', 'apartments.id')
//       ->join('services', 'services.id', '=', 'apartment_service.service_id')
//       ->orderBy('distance')
//       ->having('distance', '<', 100)
//       ->paginate(50);
//   } else {
//     $apartments = [];
//   }
  public function payment($id){
    $apartment = Apartment::findOrFail($id);
    $payments = Payment::all();
    return view('payments', compact('apartment', "payments"));
  }

  public function paid (Request $request) {

    $apartment_id = $request->input('ApartmentId');
    $apartment = Apartment::findOrFail($apartment_id);
    $payments = Payment::all();

    $payload = $request->input('payload', false);
    $nonce = $payload['nonce'];


    $paymentType = $request->input("paymentType");
    $var = false;
    $paymentId = 0;
    foreach ($payments as $payment) {
      if ($payment["name"]==$paymentType) {
        $duration = $payment["duration"];
        $paymentId = $payment["id"];
        $amount = $payment["price"];
      }
    }

    $status = Transaction::sale([
                            'amount' => 0,
                            'paymentMethodNonce' => $nonce,
                            'options' => [
                                       'submitForSettlement' => False
                                         ]
              ]);

              if ($apartment -> time) {
                if ($apartment -> time <= time()){
                  $apartment -> time = time() + $duration;
                  $apartment -> save();
                  $apartment -> payment() -> attach($paymentId);
                  $var = true;
                  $status = Transaction::sale([
                                          'amount' => $amount,
                                          'paymentMethodNonce' => $nonce,
                                          'options' => [
                                                     'submitForSettlement' => True
                                                       ]
                            ]);
                }
              } else {
                $apartment -> time = time() + $duration;
                $apartment -> save();
                $apartment -> payment() -> attach($paymentId);
                $var = true;
                $status = Transaction::sale([
                                        'amount' => $amount,
                                        'paymentMethodNonce' => $nonce,
                                        'options' => [
                                                   'submitForSettlement' => True
                                                     ]
                          ]);
              }




    return response()->json($status);
  }
}

  // else if(!isset($lat) || !isset($lng))
  // $apartments = Apartment::selectRaw('id AS apartment_id, title, rooms, bathrooms, service_id, apartment_id')
  //               ->join('apartment_service', 'apartment_service.apartment_id', '=', 'apartments.id')
  //               ->where('rooms', $rooms)
  //               ->where('bathrooms', $bathrooms)
  //               ->whereIn('service_id', $srvcs );



  // SELECT name, apartments.id, services.id FROM apartments
  // JOIN apartment_service
  // ON apartment_service.apartment_id = apartments.id
  // JOIN services
  // ON services.id = apartment_service.service_id
  // WHERE apartments.id = 102
