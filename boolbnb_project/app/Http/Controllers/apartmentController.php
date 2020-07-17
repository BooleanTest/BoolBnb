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
    Apartment::where('id', $id)->increment('view');

    // ---------------------- prove
    // $apartment = Apartment::findOrFail($id);
    $views = $apartments -> views;

    $ipAddress = $_SERVER['REMOTE_ADDR'];
    // dd($ipAddress);

    $var = false;
    foreach ($views as $view) {
      if ($ipAddress == $view['ip'] ) {
          $var = true;
      }
    }

    if ($var == false) {
        $view = new View;
        $view['ip'] = $ipAddress;
        $view['apartment_id'] = $id;
        $view->save();
    }


    return view('show-apartment', compact('apartments',"views"));
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
    $sponsoredApp = Apartment::all();

    $bathrooms = $request -> bathrooms;
    $rooms = $request -> rooms;
    $srvcs = $request -> services;
    $distance = $request -> distance;
    $lat = $request -> lat;
    $lng = $request -> long;
    $q = $request -> q;
    $appartamenti = [];




    $apartments_pay = $sponsoredApp -> where('time', '>=', time());


    if (!isset($srvcs)){
      $srvcs = [];
    }


    if ($q == null || $lat == null|| $lng == null ){
      return view ('search-apartment', compact('services'));

    } else {

      if(!isset($distance)){
        $apartments = Apartment::selectRaw('apartments.id AS apartment_id, title, city, image, rooms, bathrooms, latitude, longitude, (
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
        $apartments = Apartment::selectRaw('apartments.id AS apartment_id, title, city, image, rooms, bathrooms, latitude, longitude, (
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

        return view('search-apartment', compact('services', 'appartamenti', 'apartments_pay'));

      } else {

        return view ('search-apartment', compact('services'));

      }


    }


  }


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
                            'options' => ['submitForSettlement' => False]
                            ]);

    if ($apartment -> time) {
      if ($apartment -> time <= time()){
        $apartment -> time = time() + $duration;
        $apartment -> save();
        $apartment -> payment() -> attach($paymentId);
        $status = Transaction::sale([
                                'amount' => $amount,
                                'paymentMethodNonce' => $nonce,
                                'options' => ['submitForSettlement' => True]
                                ]);
      }
    } else {
      $apartment -> time = time() + $duration;
      $apartment -> save();
      $apartment -> payment() -> attach($paymentId);
      $status = Transaction::sale([
                              'amount' => $amount,
                              'paymentMethodNonce' => $nonce,
                              'options' => ['submitForSettlement' => True]
                              ]);
    }

    return response()->json($status);
  }

}
