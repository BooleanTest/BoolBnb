<?php

use App\User;
use App\Apartment;
use App\Service;

use Illuminate\Database\Seeder;

class ApartmentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // factory(Apartment::class, 40)
        //                   ->make()
        //                   ->each(function ($apartment){
        //     $user = User::inRandomOrder()-> first();
        //     $apartment -> user() -> associate($user);
        //     $apartment -> save();
        // });


      $apartments = [
        [
          'Un delizioso appartamento',  //title
          '4',  //rooms
          '2', //bathrooms
          '90', //meters
          'Italia', //nation
          'Terracina', //city
          'Viale Circe', //address
          '2', //number
          '41.28711', //latitude
          '13.24920', //longitude
          '/uploads/images/mare1.jpg', //image
          '1595516499', //time
          '1', //visibility
          '1' //user_id
        ],
        [
          'Romantica Gemma',
          '2',
          '1',
          '40',
          'Italia',
          'Podere Butelli',
          'Via delle Collacchie',
          '11',
          '42.89890',
          '10.78590',
          '/uploads/images/mare2.jpg',
          '0',
          '1',
          '1'
        ],
        [
          'La Tua Casa',
          '2',
          '1',
          '35',
          'Italia',
          'Livorno',
          'Via degli Alpini',
          '32',
          '43.54175',
          '10.29226',
          '/uploads/images/mare3.jpg',
          '1595516499',
          '1',
          '2'
        ],
        [
          'Appartamento moderno.',
          '5',
          '3',
          '120',
          'Italia',
          'Massa',
          'Viale Amerigo Vespucci',
          '23',
          '43.98764',
          '10.12936',
          '/uploads/images/mare5.jpg',
          '0',
          '1',
          '2'
        ],
        [
          'Casetta Nova',
          '1',
          '1',
          '30',
          'Italia',
          'Napoli',
          'Via Francesco Caracciolo',
          '12',
          '40.83160',
          '14.22843',
          '/uploads/images/mare5.jpg',
          '1595516499',
          '1',
          '3'
        ],
        [
          'Casa Sant Angelo',
          '2',
          '1',
          '40',
          'Italia',
          'Ravenna',
          'Viale dei navigatori',
          '9',
          '43.10186',
          '12.38337',
          '/uploads/images/mare6.jpg',
          '0',
          '1',
          '3'
        ],
        [
          'Casa mare',
          '6',
          '4',
          '180',
          'Italia',
          'Casalborsetti',
          'Via Marcabò',
          '1',
          '44.55517',
          '12.28228',
          '/uploads/images/mare7.jpg',
          '0',
          '1',
          '4'
        ],
        [
          'B&B casa e amore',
          '2',
          '1',
          '40',
          'Italia',
          'Trieste',
          'Via Miramare',
          '28',
          '45.66980',
          '13.75938',
          '/uploads/images/mare8.jpg',
          '0',
          '1',
          '4'
        ]
      ];

      foreach ($apartments as $apartment) {
        $newApartment = new Apartment;
        $newApartment-> title = $apartment[0];
        $newApartment-> rooms = $apartment[1];
        $newApartment-> bathrooms = $apartment[2];
        $newApartment-> meters = $apartment[3];
        $newApartment-> nation = $apartment[4];
        $newApartment-> city = $apartment[5];
        $newApartment-> address = $apartment[6];
        $newApartment-> number = $apartment[7];
        $newApartment-> latitude = $apartment[8];
        $newApartment-> longitude = $apartment[9];
        $newApartment-> image = $apartment[10];
        $newApartment-> time = $apartment[11];
        $newApartment-> visibility = $apartment[12];
        $newApartment-> user_id = $apartment[13];
        $newApartment->save();
      }




    }
}
